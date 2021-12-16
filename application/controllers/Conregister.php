<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conregister extends CI_Controller {

	function __construct() {
		parent::__construct();
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
        if ($this->input->post('username') != null && $this->input->post('password') != null && $this->input->post('email') != null) {
            $data_user = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'email' => $this->input->post('email'),
            );

            $insert_user = $this->login_model->save_user($data_user);

            $this->cekRegist($this->input->post('username'),$this->input->post('password'));
        }else {
            redirect('conregister/index/gagal');
        }
    }

    public function cekRegist($username,$password)
    {
        $data = array(
                'username' => $username,
                'password' => $password
            );
        $message = $this->login_model->cek_model($data);

        if ($message['error']==0) {
            redirect('conregister/index/gagal');
        }else{
            redirect('conujian');
        }
    }
	
	
}