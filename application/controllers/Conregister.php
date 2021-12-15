<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conregister extends CI_Controller {

	function __construct() {
		parent::__construct();
        $this->load->model('Model_peserta');
        $this->load->model('login_model');
	}

	public function index($message = "") {

        $result = array(
            'action' => 'conregister/regist',
            'message' => $message
        );
		$this->load->view('register',$result);

	}

    public function regist()
    {
        if ($this->input->post('nim') != null && $this->input->post('password') != null && $this->input->post('nama') != null && $this->input->post('kelas') != null) {
            $data_user = array(
                'username' => $this->input->post('nim'),
                'password' => $this->input->post('password'),
                'akses' => 2,
            );
            $username = $this->input->post('username');
            $insert_user = $this->Model_peserta->save_user($data_user);
            $user_id = $this->Model_peserta->get_user_id($this->input->post('nim'))->id_user;

            $data_peserta = array(
                'peserta_user_id' => $user_id,
                'peserta_nim' => $this->input->post('nim'),
                'peserta_nama' => $this->input->post('nama'),
                'peserta_kelas' => $this->input->post('kelas'),
            );
            $insert = $this->Model_peserta->save_peserta($data_peserta);

            $this->cekRegist($this->input->post('nim'),$this->input->post('password'));
        }else {
            redirect('conregister/index/gagal');
        }
    }

    public function cekRegist($user,$password)
    {
        $data = array(
                    'user' => $user,
                'password' => $password
            );
        $message = $this->login_model->cek_model($data);

        if ($message['error']==0) {
            redirect('conregister/index/gagal');
        }elseif ($message['akses']==2) {
            $nama = $this->login_model->get_peserta($message['id'])->peserta_nama;
            $id_peserta = $this->login_model->get_peserta($message['id'])->peserta_id;
            $data = array('username' => $message['username'],
                        'nama' => $nama,
                        'id_peserta' => $id_peserta,
                        'akses' => $message['akses'], 
                    );
            $this->session->set_userdata($data);
            redirect('conujian');
        }else{
            redirect('conregister/index/gagal');
        }
    }
	
	
}