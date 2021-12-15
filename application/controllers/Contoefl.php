<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contoefl extends CI_Controller {

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
        
		$this->load->model('model_metode');
	}

	public function index()
	{
		$this->mylib->load_view('Metode toefl','toefl');
	}

	public function ajax_list(){
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
            $row[] = $reading;
            $row[] = $listening;
            $row[] = $structure;
            $row[] = (int) (($reading+$listening+$structure)*10/3);
        
            $data[] = $row;
        }



        if ($_POST['order']['0']['column'] > 4) {
        	$data = $this->model_metode->order_by_metode($data,$_POST['order']['0']['dir'],$_POST['order']['0']['column']);
        }else{
        	$data;
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
}
