<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conpeserta extends CI_Controller {

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
		
		$this->load->model('Model_peserta');
	}

	public function index($error = "")
	{
		$data = array('error' => $error);
		
		$this->mylib->load_view('Peserta','peserta', $data);
	}

	public function save(){
		if ($this->input->post('method') == "save") {

			$data_user = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'akses' => 2,
			);
			$username = $this->input->post('username');
			$insert_user = $this->Model_peserta->save_user($data_user);
			$user_id = $this->Model_peserta->get_user_id($username)->id_user;

			$data_peserta = array(
				'peserta_user_id' => $user_id,
				'peserta_nim' => $this->input->post('nim'),
				'peserta_nama' => $this->input->post('nama'),
				'peserta_kelas' => $this->input->post('kelas')
			);
			$insert = $this->Model_peserta->save_peserta($data_peserta);

			redirect("conpeserta/index/0");
		}elseif ($this->input->post('method') == "edit") {
			$data_user = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'akses' => 2,
			);
			$insert_user = $this->Model_peserta->edit_user(array('id_user' => $this->input->post('user_id')),$data_user);

			$data_peserta = array(
				'peserta_nim' => $this->input->post('nim'),
				'peserta_nama' => $this->input->post('nama'),
				'peserta_kelas' => $this->input->post('kelas'),
			);
			$insert = $this->Model_peserta->edit_peserta(array('peserta_id' => $this->input->post('id')),$data_peserta);

			redirect("conpeserta/index/1");
		}
	}

	public function delete($id){
		$this->Model_peserta->delete($id);
		redirect('conpeserta/index/2');
	}

	public function ajax_list(){

		$list = $this->Model_peserta->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $model) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $model->username;
            $row[] = $model->nim;
            $row[] = $model->nama;
            $row[] = $model->kelas;

            $aksi_edit = ' <button class="btn btn-warning btn-sm rounded" title="Edit Peserta" data-id="'.$model->id.'" data-user_id="'.$model->user_id.'" data-username="'.$model->username.'" data-password="'.$model->password.'" data-nim="'.$model->nim.'" data-nama="'.$model->nama.'" data-kelas="'.$model->kelas.'"  onclick="edit_peserta(this)"><i class="fa fa-pencil"></i></i></button>';
			$aksi_hapus = ' <a class="btn btn-danger btn-sm rounded" title="Hapus Peserta" href="'.base_url("conpeserta/delete/").$model->user_id.'"><i class="fa fa-trash"></i></a>';

            //add html for action
            $row[] = $aksi_edit.$aksi_hapus;
        
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Model_peserta->count_all(),
                        "recordsFiltered" => $this->Model_peserta->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}
}
