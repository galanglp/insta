<?php
class Model_feed extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	var $table = 'post';
	var $column = array('post.idPost as id', 'post.source as source', 'post.caption as caption');

	public function get_datatables_post()
	{
		$this->db->select($this->column);
		$this->db->from($this->table);
		$this->db->order_by('post.idPost', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function countPost()
	{
		$this->db->from('post');
		return $this->db->count_all_results();
	}

	public function get_datatables_comment($idPost)
	{
		$this->db->select('comment.idPost as idPost, comment.idUser as idUser, comment.comment as comment');
		$this->db->from('comment');
		$this->db->where('comment.idPost='.$idPost);
		$this->db->order_by('comment.idComment', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function save_comment($data){
		$this->db->insert('comment', $data);
		return $this->db->insert_id();
	}

}
?>