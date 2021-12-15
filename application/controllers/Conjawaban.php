<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conjawaban extends CI_Controller {

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
		
		$this->load->model('model_jawaban');
	}

	public function index($id, $error = "")
	{
		$soal_id=$id;
		$data = array('id_soal' => $soal_id, 'jawaban_id' => null, 'jawaban' => null, 'kunci' => null, 'error' => $error);
		
		$this->mylib->load_view('Jawaban','jawaban', $data);
	}

	public function editJawaban($soal_id,$jawaban_id,$error="")
	{
		$get_jawaban = $this->model_jawaban->get_jawaban($jawaban_id);
		$jawaban = $get_jawaban->jawaban_text;
		$kunci = $get_jawaban->jawaban_kunci;
		$data = array('id_soal' => $soal_id, 'jawaban_id' => $jawaban_id, 'jawaban' => $jawaban, 'kunci' => $kunci, 'error' => $error);
		$this->mylib->load_view('Jawaban','jawaban', $data);
	}

	public function save(){
		if ($this->input->post('method') == "save") {
			$data = array(
				'jawaban_id' => $this->input->post('id'),
				'jawaban_soal_id' => $this->input->post('soal_id'),
				'jawaban_text' => $this->input->post('jawaban'),
				'jawaban_kunci' => $this->input->post('kunci'),
			);
			$insert = $this->model_jawaban->save($data);

			redirect("conjawaban/index/".$this->input->post('soal_id')."/0");
		}elseif ($this->input->post('method') == "edit") {
			$data = array(
				'jawaban_id' => $this->input->post('id'),
				'jawaban_soal_id' => $this->input->post('soal_id'),
				'jawaban_text' => $this->input->post('jawaban'),
				'jawaban_kunci' => $this->input->post('kunci'),
			);
			$insert = $this->model_jawaban->edit(array('jawaban_id' => $this->input->post('id')),$data);

			redirect("conjawaban/index/".$this->input->post('soal_id')."/1");
		}
	}

	public function delete($id,$id_soal){
		$this->model_jawaban->delete($id);
		redirect('conjawaban/index/'.$id_soal.'/2');
	}

	public function ajax_list($soal_id){

		$list = $this->model_jawaban->get_datatables($soal_id);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $model) {
            $no++;
            $row = array();
            $kunci;
            switch ($model->kunci) {
            	case '1':
            		$kunci = "Benar";
            		break;
            	case '0':
            		$kunci = "Salah";
            		break;
            	
            	default:
            		$kunci = "Salah";
            		break;
            }
            $row[] = $no;
            $row[] = $model->jawaban;
            $row[] = $kunci;

            $aksi_edit = ' <button class="btn btn-warning btn-sm rounded" title="Edit Jawaban" data-id="'.$model->id.'" data-jawaban="'.$model->jawaban.'" data-kunci="'.$model->kunci.'" onclick="edit_jawaban(this)"> <i class="fa fa-pencil"></i></i></button>';
			$aksi_hapus = ' <a class="btn btn-danger btn-sm rounded" title="Hapus Jawaban" href="'.base_url("conjawaban/delete/").$model->id.'/'.$model->soal_id.'"><i class="fa fa-trash"></i></a>';

            //add html for action
            $row[] = $aksi_edit.$aksi_hapus;
        
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->model_jawaban->count_all($soal_id),
                        "recordsFiltered" => $this->model_jawaban->count_filtered($soal_id),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}
}
