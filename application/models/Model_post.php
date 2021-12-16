<?php
class Model_post extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	var $table = 'post';
	var $column = array('post.idPost as id', 'post.source as source', 'post.caption as caption');

	public function save($data){
		$this->db->insert('post', $data);
		return $this->db->insert_id();
	}

	public function edit($where,$data){
        $this->db->update('post', $data, $where);
		return $this->db->affected_rows();
	}

}
?>