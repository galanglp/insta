<?php
class Model_jawaban extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	var $table = 'jawaban_cbt';
	var $column = array('jawaban_cbt.jawaban_id as id', 'jawaban_cbt.jawaban_soal_id as soal_id', 'jawaban_cbt.jawaban_text as jawaban', 'jawaban_cbt.jawaban_kunci as kunci');
	var $columnas = array('jawaban_cbt.jawaban_id', 'jawaban_cbt.jawaban_text', 'jawaban_cbt.jawaban_kunci');
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
		$this->db->where('jawaban_id', $id);
		$this->db->delete($this->table);
	}

	public function get_jawaban($id)
	{
		$this->db->from($this->table);
		$this->db->where('jawaban_id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function get_datatables_query($soal_id){
		$this->db->select($this->column);
		$this->db->from($this->table);
		$this->db->where('jawaban_cbt.jawaban_soal_id', $soal_id);

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

	function get_datatables($soal_id)
	{
		$this->get_datatables_query($soal_id);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered($soal_id)
	{
		$this->get_datatables_query($soal_id);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($soal_id)
	{
		$this->db->from($this->table);
		$this->db->where('jawaban_soal_id', $soal_id);
		return $this->db->count_all_results();
	}

}
?>