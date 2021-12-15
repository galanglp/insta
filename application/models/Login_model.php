<?php
class Login_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function cek_model($data){
		$this->db->from('user');
		$this->db->where('username', $data['user']);
		$this->db->where('password', $data['password']);
		$query = $this->db->get()->row();

        if (isset($query))
		{
		    return array('error' => 1, 'akses' => $query->akses, 'username' => $query->username, 'id' => $query->id_user);
		}else{
			return array('error' => 0);
		}
	}

	public function get_peserta($id)
	{
		$this->db->from('peserta');
		$this->db->where('peserta_user_id',$id);
		$query = $this->db->get();

		return $query->row();
	}

}
?>