<?php
class Model_peserta extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	var $table = 'peserta,user';
	var $column = array('peserta.peserta_id as id', 'user.username as username', 'peserta.peserta_nim as nim', 'peserta.peserta_nama as nama', 'peserta.peserta_kelas as kelas','user.id_user as user_id', 'peserta.peserta_user_id','user.password as password');
	var $columnas = array('peserta.peserta_id', 'user.username', 'peserta.peserta_nim', 'peserta.peserta_nama', 'peserta.peserta_kelas');
	var $order = array('id' => 'desc');

	public function save_peserta($data){
		$this->db->insert('peserta', $data);
		return $this->db->insert_id();
	}

	public function save_user($data){
		$this->db->insert('user', $data);
		return $this->db->insert_id();
	}

	public function edit_peserta($where,$data){
        $this->db->update('peserta', $data, $where);
		return $this->db->affected_rows();
	}

	public function edit_user($where,$data){
        $this->db->update('user', $data, $where);
		return $this->db->affected_rows();
	}

	public function delete($id){
		$this->db->where('id_user', $id);
		$this->db->delete('user');
	}

	public function get_user_id($username)
	{
		$this->db->from('user');
		$this->db->where('username',$username);
		$query = $this->db->get();

		return $query->row();
	}

	public function get_datatables_query(){
		$this->db->select($this->column);
		$this->db->from($this->table);
		$this->db->where('id_user=peserta_user_id');

		$i = 0;

		foreach ($this->columnas as $item)
		{
			if($_POST['search']['value'])
				($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
			$column[$i] = $item;
			$i++;
		}

		if(isset($_POST['order']))
		{
			$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('peserta');
		return $this->db->count_all_results();
	}

}
?>