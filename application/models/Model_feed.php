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

	public function get_all_soal()
	{
		$this->db->select($this->column);
		$this->db->from($this->table);
		$this->db->order_by('soal_cbt.soal_jenis', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_datatables_jawaban($id)
	{
		$this->db->select('jawaban_cbt.jawaban_id as id, jawaban_cbt.jawaban_text as jawab, jawaban_cbt.jawaban_kunci as kunci');
		$this->db->from('jawaban_cbt');
		$this->db->where('jawaban_cbt.jawaban_soal_id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_ujian_id($id_peserta,$id)
	{
		$this->db->select('ujian.ujian_id as id, ujian.ujian_peserta_id as peserta, ujian.ujian_soal_id as soal, ujian.ujian_jawaban_id as jawaban, ujian.ujian_ragu as ragu');
		$this->db->from('ujian');
		$this->db->where('ujian.ujian_peserta_id', $id_peserta);
		$this->db->where('ujian.ujian_soal_id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_all_ujian_peserta($id_peserta)
	{
		$this->db->select('ujian.ujian_id as id, ujian.ujian_peserta_id as peserta, ujian.ujian_soal_id as soal, ujian.ujian_jawaban_id as jawaban, ujian.ujian_ragu as ragu');
		$this->db->from('ujian');
		$this->db->where('ujian.ujian_peserta_id', $id_peserta);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_all_ujian_ragu($id_peserta)
	{
		$this->db->select('ujian.ujian_id as id, ujian.ujian_peserta_id as peserta, ujian.ujian_soal_id as soal, ujian.ujian_jawaban_id as jawaban, ujian.ujian_ragu as ragu');
		$this->db->from('ujian');
		$this->db->where('ujian.ujian_peserta_id', $id_peserta);
		$this->db->where('ujian.ujian_ragu', 1);
		$query = $this->db->get();
		return $query->result();
	}

	public function count_jawaban($id)
	{
		$this->db->from('jawaban_cbt');
		$this->db->where('jawaban_cbt.jawaban_soal_id', $id);
		$query = $this->db->count_all_results();
		return $query;
	}

	public function count_soal()
	{
		$this->db->from('soal_cbt');
		$query = $this->db->count_all_results();
		return $query;
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

	public function save($data){
		$this->db->insert('ujian', $data);
		return $this->db->insert_id();
	}

	public function edit($where,$data){
        $this->db->update('ujian', $data, $where);
		return $this->db->affected_rows();
	}

	public function save_waktu_awal($data){
		$this->db->insert('waktu_ujian', $data);
		return $this->db->insert_id();
	}

	public function edit_waktu($where,$data){
        $this->db->update('waktu_ujian', $data, $where);
		return $this->db->affected_rows();
	}

	public function get_waktu_ujian_id($id_peserta)
	{
		$this->db->from('waktu_ujian');
		$this->db->where('waktu_ujian.waktu_ujian_peserta_id', $id_peserta);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_hasil_ujian($id_peserta)
	{
		$query = $this->db->query('SELECT (SELECT soal_cbt.soal_jenis FROM soal_cbt WHERE soal_cbt.soal_id=ujian.ujian_soal_id) as jenis_soal, (SELECT COUNT(jawaban_cbt.jawaban_id) FROM jawaban_cbt WHERE jawaban_cbt.jawaban_id=ujian.ujian_jawaban_id AND jawaban_cbt.jawaban_kunci=1) as jawaban_benar FROM `ujian` WHERE ujian.ujian_peserta_id='.$id_peserta.' ORDER BY jenis_soal');
		return $query->result();
	}

}
?>