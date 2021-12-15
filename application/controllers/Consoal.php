<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consoal extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *

	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct() {
		parent::__construct();
		if ($this->session->userdata('akses')==2) {
            redirect('conujian');
        }elseif ($this->session->userdata('akses')==1) {
        	
        }elseif ($this->session->userdata('akses')==null) {
        	redirect('login');
        }

		$this->load->model('model_soal');
	}

	public function index($error = "")
	{
		$data = array('soal_id' => null, 'soal' => null, 'audio' => null, 'jenis_soal' => null, 'error' => $error);
		$this->mylib->load_view('Soal','soal', $data);
	}

	public function editSoal($soal_id,$error="")
	{
		$get_soal = $this->model_soal->get_soal($soal_id);
		$jenis_soal = $get_soal->soal_jenis;
		$soal = $get_soal->soal_text;
		$audio = $get_soal->soal_audio;
		$data = array('edit' => 'edit', 'soal_id' => $soal_id, 'soal' => $soal, 'audio' => $audio, 'jenis_soal' => $jenis_soal, 'error' => $error);
		$this->mylib->load_view('Soal','soal', $data);
	}

	public function save(){
		$config['upload_path']          = 'assets/uploads/';
		$config['allowed_types']        = 'wav|wv|m4a|m4b|m4p|m4v|m4r|3gp|mp4|aac|mp3|ogg|wma';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('audio'))
		{
			$error = $this->upload->display_errors("Upload Error, ");
			if ($this->input->post('method') == "edit") {
				$data = array(
	                'soal_jenis' => $this->input->post('jenis_soal'),
	                'soal_text' => $this->input->post('soal'),
	                'soal_audio' => $this->input->post('namaAudio'),
	            );
	            $insert = $this->model_soal->edit(array('soal_id' => $this->input->post('id')),$data);

				redirect("consoal/index/1");
			}elseif ($this->input->post('method') == "save") {
				$data = array(
	                'soal_jenis' => $this->input->post('jenis_soal'),
	                'soal_text' => $this->input->post('soal')
	            );
	            $insert = $this->model_soal->save($data);

				redirect("consoal/index/0");
			}else{
				redirect("consoal/index/3");
			}

		}
		else
		{
			if ($this->input->post('method') == "save") {
				$audioName = $this->upload->data('file_name');
				$data = array(
	                'soal_jenis' => $this->input->post('jenis_soal'),
	                'soal_text' => $this->input->post('soal'),
	                'soal_audio' => $audioName,
	            );
	            $insert = $this->model_soal->save($data);

				redirect("consoal/index/0");
			}elseif ($this->input->post('method') == "edit") {

				$audioName = $this->upload->data('file_name');

				$data = array(
	                'soal_jenis' => $this->input->post('jenis_soal'),
	                'soal_text' => $this->input->post('soal'),
	                'soal_audio' => $audioName,
	            );
	            $insert = $this->model_soal->edit(array('soal_id' => $this->input->post('id')),$data);

				redirect("consoal/index/1");
			}
		}
	}

	public function delete($id){
		$this->model_soal->delete($id);
		redirect('consoal/index/2');
	}

	public function ajax_list(){

		$list = $this->model_soal->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $model) {
            $no++;
            $row = array();
            $jenis_soal;
            switch ($model->jenis_soal) {
            	case '1':
            		$jenis_soal = "Reading";
            		break;
            	case '2':
            		$jenis_soal = "Listening";
            		break;
            	case '3':
            		$jenis_soal = "Structure & Written expression";
            		break;
            	
            	default:
            		$jenis_soal = "";
            		break;
            }

            $audio;
            if ($model->audio!='') {
            	$audio = '<audio controls><source src="'.base_url('assets').'/uploads/'.$model->audio.'" type="audio/mpeg">Your browser does not support the audio element.</audio>';
            }else{
            	$audio = '';
            }

            $row[] = $no;
            $row[] = $jenis_soal;
            $row[] = $model->soal.'</br>'.$audio;
            $row[] = '<div class="row"><div class="col-md-2">'.$model->jumlah_jawaban.'</div><div class="col-md-8" align="right"><a title="Tambah Jawaban" href="'.base_url("conjawaban/index/").$model->id.'"><i class="fa fa-plus"></i>&nbsp;Tambah Jawaban</a></div></div>';

            $aksi_edit = ' <button class="btn btn-warning btn-sm rounded" title="Edit Soal" data-id="'.$model->id.'" data-soal="'.$model->soal.'" data-jenis_soal="'.$model->jenis_soal.'" data-audio="'.$model->audio.'" data-jawaban="'.$model->jumlah_jawaban.'" onclick="edit_soal(this)"> <i class="fa fa-pencil"></i></i></button>';
			$aksi_hapus = ' <a class="btn btn-danger btn-sm rounded" title="Hapus SOal" href="'.base_url("consoal/delete/").$model->id.'"><i class="fa fa-trash"></i></a>';

            //add html for action
            $row[] = $aksi_edit.$aksi_hapus;
        
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->model_soal->count_all(),
                        "recordsFiltered" => $this->model_soal->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}
}
