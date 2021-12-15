<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contopsis extends CI_Controller {

	function __construct() {
		parent::__construct();
        if ($this->session->userdata('akses')==2) {
            redirect('conujian');
        }elseif ($this->session->userdata('akses')==1) {
            
        }elseif ($this->session->userdata('akses')==null) {
            redirect('login');
        }
        
		$this->load->model('model_metode');
		$this->load->library('ahp');
		$this->load->library('topsis');

		$this->ahp->setKriteria("Reading");
		$this->ahp->setKriteria("Listening");
		$this->ahp->setKriteria("Structure & written expression");
	}

	public function index() {
        $top = $this->model_metode->getAhp();
        $data = array();
		
		if (is_object($this->model_metode->getAhp())) {
            $this->rl = $top->reading_listening;
            $this->sr = $top->structure_reading;
            $this->ls = $top->listening_structure;

            $this->hitungAHP($this->rl,$this->sr,$this->ls);

            $bobot = $this->ahp->getVektorPrioritas();

            $data = array(
                "kriteria" => $this->ahp->getKriteria(), 
                "nilai" => $this->ahp->getNilaiKepentingan(),
                "matriksPerbandingan" => $this->ahp->getMatriksPerbandingan(),
                "jumlah" => $this->ahp->getJumlah(),
                "normalisasi" => $this->ahp->getMatriksNormalisasi(),
                "jumlahNorm" => $this->ahp->getJumlahNorm(),
                "vektorPrioritas" => $this->ahp->getVektorPrioritas(),
                "hasilKali" => $this->ahp->getHasilKali(),
                "hasilBagi" => $this->ahp->getHasilBagi(),
                "lambda" => $this->ahp->getLambda(),
                "consistencyIndex" => $this->ahp->getConsistencyIndex(),
                "indexRandom" => $this->ahp->getIndexRandom(),
                "consistencyRatio" => $this->ahp->getConsistencyRatio(),
                "bobotReading" => $bobot[0],
                "bobotListening" => $bobot[1],
                "bobotStructure" => $bobot[2],
                "readingListening" => $this->rl,
                "structureReading" => $this->sr,
                "listeningStructure" => $this->ls,
            );
        }else {
            $data = array(
            "kriteria" => 0, 
            "nilai" => 0,
            "matriksPerbandingan" => 0,
            "jumlah" => 0,
            "normalisasi" => 0,
            "jumlahNorm" => 0,
            "vektorPrioritas" => 0,
            "hasilKali" => 0,
            "hasilBagi" => 0,
            "lambda" => 0,
            "consistencyIndex" => 0,
            "indexRandom" => 0,
            "consistencyRatio" => 0,
            "bobotReading" => 0,
            "bobotListening" => 0,
            "bobotStructure" => 0,
            "readingListening" => $this->rl,
            "structureReading" => $this->sr,
            "listeningStructure" => $this->ls,
        );
        }

		$this->mylib->load_view('Metode AHP Topsis','topsis',$data);

	}

	public function ajax_list(){
        $top = $this->model_metode->getAhp();

		$list = $this->model_metode->get_datatables();
		$data = array();
        $no = $_POST['start'];

        foreach ($list as $model) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $model->nim;
            $row[] = $model->nama;
            $row[] = $model->reading;
            $row[] = $model->listening;
            $row[] = $model->structure;
        
            $data[] = $row;
        }

        if (is_object($this->model_metode->getAhp()) AND count($data) > 0) {
            $this->rl = $top->reading_listening;
            $this->sr = $top->structure_reading;
            $this->ls = $top->listening_structure;

            $this->hitungAHP($this->rl,$this->sr,$this->ls);
            $this->hitungTopsis($data);

            if ($_POST['order']['0']['column'] > 4) {
                $data = $this->model_metode->order_by_metode($this->topsis->getData(),$_POST['order']['0']['dir'],$_POST['order']['0']['column']);
            }else{
                $data = $this->topsis->getData();
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

        $this->topsis->setNormToData(6,7,8);
        $this->topsis->setNormBToData(9,10,11);
        $this->topsis->setMaxMinToData(12,13,14,15,16,17);
        $this->topsis->setSMToData(18,19);
        $this->topsis->setNilaiPreferensiToData(20);
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