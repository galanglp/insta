<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conpembagiankelas extends CI_Controller {

	function __construct() {
		parent::__construct();
        if ($this->session->userdata('akses')==2) {
            redirect('conujian');
        }elseif ($this->session->userdata('akses')==1) {
            
        }elseif ($this->session->userdata('akses')==null) {
            redirect('login');
        }
        
		$this->load->model('model_metode');
        $this->load->model('Model_peserta');
		$this->load->library('ahp');
		$this->load->library('topsis');

		$this->ahp->setKriteria("Reading");
		$this->ahp->setKriteria("Listening");
		$this->ahp->setKriteria("Structure & written expression");
	}

    private $rl = 0;
    private $sr = 0;
    private $ls = 0;

	public function index() {

		$this->mylib->load_view('Pembagian Kelas','pembagiankelas');

	}

	public function ajax_list($kelasA=0,$kelasB=0,$kelasC=0,$kelasD=0){
        $top = $this->model_metode->getAhp();

		$list = $this->model_metode->get_datatables();
		$data = array();
        $no = $_POST['start'];

        foreach ($list as $model) {
            $no++;
            $row = array();
            $reading=$this->mylib->nilai_reading($model->reading);
            $listening=$this->mylib->nilai_listening($model->listening);
            $structure=$this->mylib->nilai_structure($model->structure);
            $row[] = $no;
            $row[] = $model->nim;
            $row[] = $model->nama;
            $row[] = $model->reading;
            $row[] = $model->listening;
            $row[] = $model->structure;
            $row[] = $model->kelas;
            // $row[] = $model->kelas_toefl != "" ? $model->kelas_toefl : "Belum Dapat Kelas";
            $row[] = $model->kelas_topsis != "" ? $model->kelas_topsis : "Belum Dapat Kelas";
            // $row[] = (int) (($reading+$listening+$structure)*10/3);s
            $row[] = 0;
        
            $data[] = $row;
        }

        if (is_object($this->model_metode->getAhp()) AND count($data) > 0) {
            $this->rl = $top->reading_listening;
            $this->sr = $top->structure_reading;
            $this->ls = $top->listening_structure;

            $this->hitungAHP($this->rl,$this->sr,$this->ls);
            $this->hitungTopsis($data);

            if ($_POST['order']['0']['column'] == 9 || $_POST['order']['0']['column'] == 10) {
                $data = $this->model_metode->order_by_metode($this->topsis->getData(),$_POST['order']['0']['dir'],$_POST['order']['0']['column']);
            }else{
                $data = $this->topsis->getData();
            }

            if ($kelasA != 0 && $kelasB != 0 && $kelasC !=0 && $kelasD !=0) {
                $data = $this->bagiKelas($kelasA,$kelasB,$kelasC,$kelasD,$data,9);
                $data = $this->bagiKelas($kelasA,$kelasB,$kelasC,$kelasD,$data,10);
            }
        }


        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->model_metode->count_all(),
                        "recordsFiltered" => $this->model_metode->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

    public function bagiKelas($kelasA,$kelasB,$kelasC,$kelasD,$data,$col)
    {
        $dataTemp = $this->model_metode->order_by_metode($data,"desc",$col);
        for ($i=0; $i < count($dataTemp); $i++) { 
            switch (true) {
                case $i < $kelasA && $col == 9:
                    $dataTemp[$i][7] = "A";
                    $this->editKelas($dataTemp[$i][1],"A","peserta_kelas_toefl");
                    break;
                case $i >= $kelasA && $i < ($kelasB+$kelasA) && $col == 9:
                    $dataTemp[$i][7] = "B";
                    $this->editKelas($dataTemp[$i][1],"B","peserta_kelas_toefl");
                    break;
                case $i >= ($kelasB+$kelasA) && $i < ($kelasC+$kelasB+$kelasA) && $col == 9:
                    $dataTemp[$i][7] = "C";
                    $this->editKelas($dataTemp[$i][1],"C","peserta_kelas_toefl");
                    break;
                case $i >= ($kelasC+$kelasB+$kelasA) && $col == 9:
                    $dataTemp[$i][7] = "D";
                    $this->editKelas($dataTemp[$i][1],"D","peserta_kelas_toefl");
                    break;
                case $i < $kelasA && $col == 10:
                    $dataTemp[$i][8] = "A";
                    $this->editKelas($dataTemp[$i][1],"A","peserta_kelas_topsis");
                    break;
                case $i >= $kelasA && $i < ($kelasB+$kelasA) && $col == 10:
                    $dataTemp[$i][8] = "B";
                    $this->editKelas($dataTemp[$i][1],"B","peserta_kelas_topsis");
                    break;
                case $i >= ($kelasB+$kelasA) && $i < ($kelasC+$kelasB+$kelasA) && $col == 10:
                    $dataTemp[$i][8] = "C";
                    $this->editKelas($dataTemp[$i][1],"C","peserta_kelas_topsis");
                    break;
                case $i >= ($kelasC+$kelasB+$kelasA) && $col == 10:
                    $dataTemp[$i][8] = "D";
                    $this->editKelas($dataTemp[$i][1],"D","peserta_kelas_topsis");
                    break;
                
                default:
                    $dataTemp[$i][7] = "Belum dapat kelas";
                    $dataTemp[$i][8] = "Belum dapat kelas";
                    break;
            }
        }

        return $dataTemp;
    }

    public function editKelas($nim,$kelas,$berdasarkan)
    {
        $data_peserta = array(
            $berdasarkan => $kelas,
        );
        $insert = $this->Model_peserta->edit_peserta(array('peserta_nim' => $nim),$data_peserta);
    }
	
    public function resetKelas()
    {
        $list = $this->model_metode->get_datatables();
        foreach ($list as $model) {
            $data_peserta = array(
                "peserta_kelas_topsis" => "Belum Dapat Kelas",
                "peserta_kelas_toefl" => "Belum Dapat Kelas",
            );
            $insert = $this->Model_peserta->edit_peserta(array('peserta_id' => $model->id),$data_peserta);
        }
    }

    public function hitungTopsis($data)
    {
        $this->topsis->setData($data);
        $this->topsis->setNilaiAwal();
        $this->topsis->hitungJumlah();
        $this->topsis->hitungNormalisasi();
        $this->topsis->hitungNormTerbobot($this->ahp->getVektorPrioritas());
        $this->topsis->setMaxMin();
        $this->topsis->hitungSeparationMeasure();
        $this->topsis->hitungNilaiPreferensi();
        $this->topsis->setNilaiPreferensiToData(8);
    }

    public function hitungAHP($readingListening,$structureReading,$listeningStructure)
    {
        $this->ahp->setNilaiKepentingan("Reading",$readingListening,"Listening");
        $this->ahp->setNilaiKepentingan("Structure & written expression",$structureReading,"Reading");
        $this->ahp->setNilaiKepentingan("Listening",$listeningStructure,"Structure & written expression");
        $this->ahp->setMatriksPerbandingan();
        $this->ahp->hitungJumlah();
        $this->ahp->hitungNormalisasi();
        $this->ahp->hitungJumlahNorm();
        $this->ahp->hitungVektorPrioritas();
        $this->ahp->setHasilKali();
        $this->ahp->setHasilBagi();
        $this->ahp->setLambda();
        $this->ahp->setConsistencyIndex();
        $this->ahp->setIndexRandom();
        $this->ahp->setConsistencyRatio();
    }
	
}