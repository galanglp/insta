<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conaddpost extends CI_Controller {

	function __construct() {
		parent::__construct();
        $this->load->model('model_post');
	}

	public function index($message = "") {

		$this->mylib->load_view_peserta('Add Post','addpost');

	}

    public function save(){
        $config['upload_path']          = 'assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('imgPost'))
        {
            $error = $this->upload->display_errors("Upload Error, ");
            redirect("confeed/error");
        }
        else
        {
            if ($this->input->post('method') == "save") {
                $imageName = $this->upload->data('file_name');
                $data = array(
                    'source' => $imageName,
                    'caption' => $this->input->post('caption'),
                );
                $insert = $this->model_post->save($data);

                redirect("confeed");
            }
        }
    }

    public function delete($id){
        $this->model_soal->delete($id);
        redirect('consoal/index/2');
    }
	
}