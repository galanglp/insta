<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Condaftarsoal extends CI_Controller {

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
            redirect('conujian');
        }elseif ($this->session->userdata('akses')==1) {
            
        }elseif ($this->session->userdata('akses')==null) {
            redirect('login');
        }
        
		$this->load->model('Model_daftar_soal');
	}

	public function index()
	{	
		$this->mylib->load_view('Daftar soal','daftarsoal');
	}

	public function ajax_list(){

		$list = $this->Model_daftar_soal->get_datatables_soal();
        $data = array();
        $no = $_POST['start'];
        $setting_table = '';
        $jenis_soal;
        foreach ($list as $model) {
            $no++;
            $row = array();
            $id_sebelum = 0;
            $soal_table = '';

            switch ($model->jenis_soal) {
            	case '1':
            		$jenis_soal = "Reading";
            		break;
            	case '2':
            		$jenis_soal = "Listening";
            		break;
            	case '3':
            		$jenis_soal = "Structure & Written expression";
            		break;
            	
            	default:
            		$jenis_soal = "";
            		break;
            }

            $audio;
            if ($model->audio!='') {
                $audio = '<audio controls><source src="'.base_url('assets').'/uploads/'.$model->audio.'" type="audio/mpeg">Your browser does not support the audio element.</audio>';
            }else{
                $audio = '';
            }

            $aksi_edit_soal = '<a title="Edit Soal" href="'.base_url("consoal/editsoal/").$model->id.'"><i class="fa fa-pencil"></i>&nbsp;Edit Soal</a>';

            $soal_table .= '<tr><td colspan="3">'.$model->soal.'</br>'.$audio.'</td>';
            $soal_table .= '<td width="15%">'.$aksi_edit_soal.'</td></tr>';

            $jawaban_list = $this->Model_daftar_soal->get_datatables_jawaban($model->id);
            $nomer=1;

            foreach ($jawaban_list as $jawaban) {
            	$kunci;
            	switch ($jawaban->kunci) {
            		case '1':
            		$kunci = "<b>Benar</b>";
            		break;
            		case '0':
            		$kunci = "Salah";
            		break;

            		default:
            		$kunci = "Salah";
            		break;
            	}

            	$aksi_edit_jawaban = '<a title="Edit Jawaban" href="'.base_url("conjawaban/editjawaban/").$model->id.'/'.$jawaban->id.'"><i class="fa fa-pencil"></i>&nbsp;Edit Jawaban</a>';

            	$soal_table .='<tr><td width="5%" align="center"><p>'.$nomer++.'.</p></td><td width="5%"><p>'.$kunci.'</p></td><td width="75%">'.$jawaban->jawab.'</td>';
            	$soal_table .= '<td width="15%">'.$aksi_edit_jawaban.'</td></tr>';
            }

            $row[] = $no;
            $row[] = $jenis_soal;
            $row[] = '<table class="table table-striped table-hover table-condensed" height="100%"><tbody>'.$soal_table.'</tbody></table>';
        
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Model_daftar_soal->count_all(),
                        "recordsFiltered" => $this->Model_daftar_soal->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}
}
