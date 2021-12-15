<?php
class Model_metode extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	var $table = 'peserta';
	var $column = array('peserta.peserta_id as id', 
		'peserta.peserta_nim as nim',
		'peserta.peserta_nama as nama', 
		'(SELECT COUNT(jawaban_cbt.jawaban_id) FROM jawaban_cbt, ujian, soal_cbt WHERE jawaban_cbt.jawaban_id=ujian.ujian_jawaban_id AND ujian.ujian_peserta_id=peserta.peserta_id AND soal_cbt.soal_id=ujian.ujian_soal_id AND soal_cbt.soal_jenis=1 AND jawaban_cbt.jawaban_kunci=1) as reading', 
		'(SELECT COUNT(jawaban_cbt.jawaban_id) FROM jawaban_cbt, ujian, soal_cbt WHERE jawaban_cbt.jawaban_id=ujian.ujian_jawaban_id AND ujian.ujian_peserta_id=peserta.peserta_id AND soal_cbt.soal_id=ujian.ujian_soal_id AND soal_cbt.soal_jenis=2 AND jawaban_cbt.jawaban_kunci=1) as listening', 
		'(SELECT COUNT(jawaban_cbt.jawaban_id) FROM jawaban_cbt, ujian, soal_cbt WHERE jawaban_cbt.jawaban_id=ujian.ujian_jawaban_id AND ujian.ujian_peserta_id=peserta.peserta_id AND soal_cbt.soal_id=ujian.ujian_soal_id AND soal_cbt.soal_jenis=3 AND jawaban_cbt.jawaban_kunci=1) as structure',
		'peserta.peserta_kelas as kelas','peserta.peserta_kelas_toefl as kelas_toefl',
		'peserta.peserta_kelas_topsis as kelas_topsis'
	);
	var $columnas = array('peserta.peserta_id',
		'peserta.peserta_nim',
		'peserta.peserta_nama', 
		'(SELECT COUNT(jawaban_cbt.jawaban_id) FROM jawaban_cbt, ujian, soal_cbt WHERE jawaban_cbt.jawaban_id=ujian.ujian_jawaban_id AND ujian.ujian_peserta_id=peserta.peserta_id AND soal_cbt.soal_id=ujian.ujian_soal_id AND soal_cbt.soal_jenis=1 AND jawaban_cbt.jawaban_kunci=1)', 
		'(SELECT COUNT(jawaban_cbt.jawaban_id) FROM jawaban_cbt, ujian, soal_cbt WHERE jawaban_cbt.jawaban_id=ujian.ujian_jawaban_id AND ujian.ujian_peserta_id=peserta.peserta_id AND soal_cbt.soal_id=ujian.ujian_soal_id AND soal_cbt.soal_jenis=2 AND jawaban_cbt.jawaban_kunci=1)', 
		'(SELECT COUNT(jawaban_cbt.jawaban_id) FROM jawaban_cbt, ujian, soal_cbt WHERE jawaban_cbt.jawaban_id=ujian.ujian_jawaban_id AND ujian.ujian_peserta_id=peserta.peserta_id AND soal_cbt.soal_id=ujian.ujian_soal_id AND soal_cbt.soal_jenis=3 AND jawaban_cbt.jawaban_kunci=1)',
		'peserta.peserta_kelas','peserta.peserta_kelas_toefl',
		'peserta.peserta_kelas_topsis',
	);
	var $column_order = array('id', 'nim', 'nama', 'reading', 'listening', 'structure', 'kelas', 'kelas_toefl', 'kelas_topsis');
	var $order = array('id' => 'desc');

	// SELECT peserta.peserta_nama as nama, (SELECT COUNT(jawaban_cbt.jawaban_id) FROM jawaban_cbt, ujian, soal_cbt WHERE jawaban_cbt.jawaban_id=ujian.ujian_jawaban_id AND ujian.ujian_peserta_id=peserta.peserta_id AND soal_cbt.soal_id=ujian.ujian_soal_id AND soal_cbt.soal_jenis=1 AND jawaban_cbt.jawaban_kunci=1) AS reading, (SELECT COUNT(jawaban_cbt.jawaban_id) FROM jawaban_cbt, ujian, soal_cbt WHERE jawaban_cbt.jawaban_id=ujian.ujian_jawaban_id AND ujian.ujian_peserta_id=peserta.peserta_id AND soal_cbt.soal_id=ujian.ujian_soal_id AND soal_cbt.soal_jenis=2 AND jawaban_cbt.jawaban_kunci=1) AS listening, (SELECT COUNT(jawaban_cbt.jawaban_id) FROM jawaban_cbt, ujian, soal_cbt WHERE jawaban_cbt.jawaban_id=ujian.ujian_jawaban_id AND ujian.ujian_peserta_id=peserta.peserta_id AND soal_cbt.soal_id=ujian.ujian_soal_id AND soal_cbt.soal_jenis=3 AND jawaban_cbt.jawaban_kunci=1) AS structure FROM peserta

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
			if ($_POST['order']['0']['column']>8) {
				$order = $this->order;
				$this->db->order_by(key($order), $order[key($order)]);
			}else{
				$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			}
		}
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function order_by_metode($data,$dengan,$column)
	{
		$n = count($data);
		switch (TRUE) {
			case $dengan == "asc" && $n == 2:
				if ($data[0][$column] > $data[1][$column]) {
					$data = $this->swap_order($data,0,1);
				}else {
					$data = $data;
				}
				break;
			case $dengan == "desc" && $n == 2:
				if ($data[0][$column] < $data[1][$column]) {
					$data = $this->swap_order($data,0,1);
				}else {
					$data = $data;
				}
				break;
			case $dengan == "asc":
				for ($i=0; $i < $n; $i++) { 
					for ($j=1; $j < ($n-$i); $j++) { 
						if ($data[$j-1][$column] > $data[$j][$column]) {
							$data = $this->swap_order($data,($j-1),($j));
						}
					}
				}

				break;
			case $dengan == "desc":
				for ($i=0; $i < $n; $i++) { 
					for ($j=1; $j < ($n-$i); $j++) { 
						if ($data[$j-1][$column] < $data[$j][$column]) {
							$data = $this->swap_order($data,($j-1),($j));
						}
					}
				}

				break;
			
			default:
				$data = $data;
				break;
		}

		return $this->aturNomer($data);
	}

	public function aturNomer($data)
	{
		$no = 1;
		for ($i=0; $i < count($data); $i++) { 
			$data[$i][0] = $no;
			$no++;
		}

		return $data;
	}

	public function swap_order($data, $i, $j)
	{
		$temparray = array();
		$nKolom = count($data[0]);

		for ($k=0; $k < $nKolom; $k++) { 
			$temparray[0][$k] = $data[$i][$k];

			$data[$i][$k] = $data[$j][$k];

			$data[$j][$k] = $temparray[0][$k];
		}

		return $data;
	}

	function get_datatables()
	{
		$this->get_datatables_query();
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

	public function getAhp()
	{
		$this->db->from("ahp");
		$query = $this->db->get();
		return $query->row();
	}

	public function save_ahp($data){
		$this->db->insert('ahp', $data);
		return $this->db->insert_id();
	}

	public function edit_ahp($where,$data){
        $this->db->update('ahp', $data, $where);
		return $this->db->affected_rows();
	}

}
?>