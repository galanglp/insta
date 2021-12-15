<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conujian extends CI_Controller {

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
		if ($this->session->userdata('akses')==2) {
            
        }elseif ($this->session->userdata('akses')==1) {
        	redirect('consoal');
        }elseif ($this->session->userdata('akses')==null) {
        	redirect('login');
        }
        
		$this->load->model('model_ujian');
		$this->peserta_id = $this->session->userdata('id_peserta');
		// $this->peserta_id=3;
	}

	public $peserta_id;

	public function index($error = "")
	{
		$data = array('error' => $error);
		
		$this->mylib->load_view_peserta('Ujian','ujian', $data);
	}

	public function kertasUjian($row = 0, $nav = 1)
	{
		$data = $this->get_soal_jawaban($row,$nav);
		$this->mylib->load_view_peserta('Kertas ujian','kertasujian', $data);
	}

	public function hasilUjian()
	{
		$data = $this->getHasilUjian($this->peserta_id);
		$this->mylib->load_view_peserta('Hasil ujian','hasilujian',$data);
	}

	public function get_soal_jawaban($row,$nav){

		$soal = $this->model_ujian->get_datatables_soal($row);
		$jawaban = $this->model_ujian->get_datatables_jawaban($soal['id']);
		$jumlahJawaban = $this->model_ujian->count_jawaban($soal['id']);
		$jumlahSoal = $this->model_ujian->count_soal();
        $data = array();
        $no = $row+1;
        $iJawab = 0;

        $jenis_soal;
        switch ($soal['jenis_soal']) {
        	case '1':
        	$jenis_soal = "Reading";
        	break;
        	case '2':
        	$jenis_soal = "Listening";
        	break;
        	case '3':
        	$jenis_soal = "Structure & written expression";
        	break;

        	default:
        	$jenis_soal = "Reading";
        	break;
        }

        $navigasi=$row;
        $selanjutnya;
        $sebelumnya;
        switch (true) {
        	case $navigasi == 0:
        		$sebelumnya=0;
        		$selanjutnya=$row+1;
        		break;
        	case $navigasi < ($jumlahSoal-1) AND $nav == 1:
        		$sebelumnya=$row-1;
        		$selanjutnya=$row+1;
        		break;
        	case $navigasi > 0 AND $nav == 0:
        		$sebelumnya=$row-1;
        		$selanjutnya=$row+1;
        		break;
        	
        	default:
        		$sebelumnya=$no-2;
        		$selanjutnya=0;
        		break;
        }

        $data['no'] = $no;
        $data['id'] = $soal['id'];
        $data['jenis_soal'] = $jenis_soal;
        $data['soal'] = $soal['soal'];
        $data['audio'] = $soal['audio'];
        $data['jmlJawaban'] = $jumlahJawaban;
        $data['jmlSoal'] = $jumlahSoal;
        $data['list_soal'] = $this->model_ujian->get_all_soal();
        $data['sebelumnya'] = $sebelumnya;
        $data['selanjutnya'] = $selanjutnya;

        foreach ($jawaban as $jawab) {
        	$data['id_jawaban'][$iJawab] = $jawab->id;
        	$data['jawaban'][$iJawab] = $jawab->jawab;
        	$data['kunci'][$iJawab] = $jawab->kunci;
        	$iJawab++;
        }

        $ujianAll = $this->model_ujian->get_all_ujian_peserta($this->peserta_id);
        if (isset($ujianAll)) {
        	$data['list_ujian'] = $ujianAll;
        }else {
        	$data['list_ujian'] = "";
        }

        // $ujian = $this->model_ujian->get_ujian_id($this->session->userdata('nama'),$soal['id']);
        $ujian = $this->model_ujian->get_ujian_id($this->peserta_id,$soal['id']);
        if (isset($ujian)) {
        	$data['hasilJawab'] = $ujian->jawaban;
        	$data['ragu'] = $ujian->ragu;
        }else{
        	$data['hasilJawab'] = '';
        	$data['ragu'] = '';
        }

        $cekWaktu = $this->model_ujian->get_waktu_ujian_id($this->peserta_id);
        if (isset($cekWaktu)) {
        	$waktu = $this->model_ujian->get_waktu_ujian_id($this->peserta_id);
        	if ($waktu->selesai==1) {
        		redirect('conujian/hasilujian');
        	}else {
        		$data['id_waktu'] = $waktu->waktu_ujian_id;
	        	$data['sekarang'] = $waktu->sekarang;
        	}
        }else {
        	$this->saveWaktuAwal();
        	$waktu = $this->model_ujian->get_waktu_ujian_id($this->peserta_id);
        	$data['id_waktu'] = $waktu->waktu_ujian_id;
	        $data['sekarang'] = $waktu->sekarang;
        }


        //output to json format
        return $data;
	}

	public function getHasilUjian($id_peserta)
	{
		$hasilUjian = $this->model_ujian->get_hasil_ujian($id_peserta);
		$data = array();
		$reading = 0;
		$listening = 0;
		$structure = 0;
		if (isset($hasilUjian)) {
			$data['nama'] = $this->session->userdata('nama');
			$data['ujian'] = 'TOEFL';
			$data['reading'] = 0;
			$data['listening'] = 0;
			$data['structure'] = 0;
			foreach ($hasilUjian as $ujian) {
				switch ($ujian->jenis_soal) {
					case '1':
						$reading += $ujian->jawaban_benar;
						$data['reading'] = $reading;
						break;
					case '2':
						$listening += $ujian->jawaban_benar;
						$data['listening'] = $listening;
						break;
					case '3':
						$structure += $ujian->jawaban_benar;
						$data['structure'] = $structure;
						break;
					
					default:
						"tidak ada";
						break;
				}
			}

		}else {
			$data['nama'] = $this->session->userdata('nama');
			$data['ujian'] = 'TOEFL';
			$data['reading'] = '';
			$data['listening'] = '';
			$data['structure'] = '';
			$data['total'] = '';
		}

		return $data;
	}

	public function save()
	{
		$ujian = $this->model_ujian->get_ujian_id($this->peserta_id,$this->input->post('id_soal'));
		if (isset($ujian)) {
			$data = array(
                'ujian_jawaban_id' => $this->input->post('id_jawaban'),
            );
        	$insert = $this->model_ujian->edit(array('ujian_id' => $ujian->id),$data);
        	echo json_encode(array("status" => TRUE, "save" =>FALSE));
        }else {
        	$data = array(
        		'ujian_peserta_id' => $this->peserta_id,
        		'ujian_soal_id' => $this->input->post('id_soal'),
        		'ujian_jawaban_id' => $this->input->post('id_jawaban'),
        		'ujian_ragu' => 0,
        	);
        	$insert = $this->model_ujian->save($data);
        	$ujian = $this->model_ujian->get_ujian_id($this->peserta_id,$this->input->post('id_soal'));
        	echo json_encode(array("status" => TRUE, "save" =>TRUE, "id_ujian" => $ujian->id));
        }
	}

	public function ragu()
	{
		$data = array(
                'ujian_ragu' => $this->input->post('ragu'),
            );
        	$insert = $this->model_ujian->edit(array('ujian_id' => $this->input->post('id_ujian')),$data);
        	echo json_encode(array("status" => TRUE));
	}

	public function jumlahIsi()
	{
		$allSoal = count($this->model_ujian->get_all_soal());
		$allUjian = count($this->model_ujian->get_all_ujian_peserta($this->peserta_id));
		$allRagu = count($this->model_ujian->get_all_ujian_ragu($this->peserta_id));

		echo json_encode(array("status" => TRUE, 'allSoal' => $allSoal, 'allUjian' => $allUjian, 'allRagu' => $allRagu));
	}

	public function saveWaktuAwal()
	{
		$data = array(
			'waktu_ujian_peserta_id' => $this->peserta_id,
			'awal' => "01:30:00",
			'sekarang' => "01:30:00",
			'berhenti' => "00:00:00",
		);
		$insert = $this->model_ujian->save_waktu_awal($data);
	}

	public function editWaktu()
	{
		$data = array(
                'sekarang' => $this->input->post('sekarang'),
            );
        $insert = $this->model_ujian->edit_waktu(array('waktu_ujian_id' => $this->input->post('id_waktu')),$data);
        $waktu = $this->model_ujian->get_waktu_ujian_id($this->peserta_id);
        echo json_encode(array('status' => TRUE, 'sekarang' => $waktu->sekarang));
	}

	public function hentikanUjian()
	{
		$data = array(
                'sekarang' => $this->input->post('sekarang'),
                'berhenti' => $this->input->post('berhenti'),
                'selesai' => 1,
            );
        $insert = $this->model_ujian->edit_waktu(array('waktu_ujian_id' => $this->input->post('id_waktu')),$data);
        echo json_encode(array('status' => TRUE));
	}
}
