<?php
class Model_soal extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	var $table = 'soal_cbt';
	var $column = array('soal_cbt.soal_id as id', 'soal_cbt.soal_jenis as jenis_soal', 'soal_cbt.soal_text as soal', 'soal_cbt.soal_audio as audio', '(SELECT COUNT(jawaban_cbt.jawaban_soal_id) FROM jawaban_cbt WHERE jawaban_cbt.jawaban_soal_id=soal_cbt.soal_id) as jumlah_jawaban');
	var $columnas = array('soal_cbt.soal_id', 'soal_cbt.soal_jenis', 'soal_cbt.soal_text', '(SELECT COUNT(jawaban_cbt.jawaban_soal_id) FROM jawaban_cbt WHERE jawaban_cbt.jawaban_soal_id=soal_cbt.soal_id)' );
	var $order = array('id' => 'desc');

	public function save($data){
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function edit($where,$data){
        $this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete($id){
		$this->db->where('soal_id', $id);
		$this->db->delete($this->table);
	}

	public function get_soal($id)
	{
		$this->db->from($this->table);
		$this->db->where('soal_id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function get_datatables_query(){
		$this->db->select($this->column);
		$this->db->from($this->table);
		
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
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

}
?>