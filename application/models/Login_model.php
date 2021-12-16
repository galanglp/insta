<?php
class Login_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function cek_model($data){
		$this->db->from('user');
		$this->db->where('username', $data['username']);
		$this->db->where('password', $data['password']);
		$query = $this->db->get()->row();

        if (isset($query))
		{
		    return array('error' => 1, 'username' => $query->username, 'iduser' => $query->id_user);
		}else{
			return array('error' => 0);
		}
	}

	public function save_user($data){
		$this->db->insert('user', $data);
		return $this->db->insert_id();
	}

}
?>