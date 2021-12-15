<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->model('login_model');
	}

	public function index($message = "")
	{
		if ($this->session->userdata('akses')==2) {
            redirect('conujian');
        }elseif ($this->session->userdata('akses')==1) {
        	redirect('consoal');
        }elseif ($this->session->userdata('akses')==null) {
        	
        }

		$result = array(
			'action' => 'login/cek',
			'message' => $message
		);
		$this->load->view('login',$result);
	}

	public function cek()
	{
		$data = array(
                    'user' => $this->input->post('user'),
                'password' => $this->input->post('password')
            );
		$message = $this->login_model->cek_model($data);
		if ($message['error']==0) {
			redirect('login/index/gagal');
		}elseif ($message['akses']==1) {
			$data = array('username' => $message['username'],
						'akses' => $message['akses']
					);
			$this->session->set_userdata($data);
			redirect('consoal');
		}elseif ($message['akses']==2) {
			$nama = $this->login_model->get_peserta($message['id'])->peserta_nama;
			$id_peserta = $this->login_model->get_peserta($message['id'])->peserta_id;
			$data = array('username' => $message['username'],
						'nama' => $nama,
						'id_peserta' => $id_peserta, 
						'akses' => $message['akses']
					);
			$this->session->set_userdata($data);
			redirect('conujian');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}