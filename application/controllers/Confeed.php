<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confeed extends CI_Controller {

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
        
		$this->load->model('model_feed');
	}

	public function index($error = "")
	{
		$data = array(
			'error' => $error,
			'feed' => $this->model_feed->get_datatables_post(),
		);
		
		$this->mylib->load_view_peserta('FEED','feed', $data);
	}

	public function saveComment()
	{
		$data = array(
                    'idPost' => $this->input->post('idPost'),
                    'idUser' => $this->input->post('idUser'),
                    'comment' => $this->input->post('comment')
                );
        $insert = $this->model_feed->save_comment($data);
        redirect("confeed");
	}

	public function getFeed()
	{
		$feed = array();
		$post = $this->model_feed->get_datatables_post();
		foreach ($post as $post) {
			$feed['idPost'] = $post->id;
			$feed['source'] = $post->source;
			$feed['caption'] = $post->caption;
			$comment = $this->model_feed->get_datatables_comment($post->id);
			foreach ($comment as $comment) {
				$feed['comment']['idUser'] = $comment->idUser;
				$feed['comment']['comment'] = $comment->comment;
			}
		}
        return $feed;
	}
	
}
