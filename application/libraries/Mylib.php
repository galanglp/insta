<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mylib {
    protected $ci;
    public function __construct() 
    {
        $this->ci =& get_instance();
    }

    public function load_view($page_title, $view_file, $data=false)
    {
        $this->ci->load->view('header/Header', array('title'=>$this->set_title($page_title), 'kertas' => 1));
        $this->ci->load->view('menu/Menu');
        if ($data) {
            $this->ci->load->view($view_file, $data);
        }else{
            $this->ci->load->view($view_file);
        }
        $this->ci->load->view('footer/footer');
    }
    public function load_view_peserta($page_title, $view_file, $data=false)
    {
        if ($view_file == 'kertasujian') {
            $this->ci->load->view('header/Header', array('title'=>$this->set_title($page_title), 'kertas' => 0));
        }else {
            $this->ci->load->view('header/Header', array('title'=>$this->set_title($page_title), 'kertas' => 1));
        }
        if ($data) {
            $this->ci->load->view($view_file, $data);
        }else{
            $this->ci->load->view($view_file);
        }
        $this->ci->load->view('footer/footer');
    }
    public function set_title($value)
    {
        $site_name = $this->get_site_title();
        $page_title = $value." | ".$site_name;
        return $page_title;
    }
    public function get_site_title()
    {
        $site_name = "Computer Based-Test";
        return $site_name;
    }

    public function nilai_reading($jawaban_benar)
    {
        $reading = array(21,22,23,23,24,25,26,27,28,28,29,30,31,32,34,35,36,37,38,39,40,41,42,43,43,44,45,46,46,47,48,48,49,50,51,52,52,53,54,54,55,56,57,58,59,60,61,63,65,66,67);
        return $reading[$jawaban_benar];
    }

    public function nilai_listening($jawaban_benar)
    {
        $listening = array(24,25,26,27,28,29,30,31,32,32,33,35,37,38,39,41,41,42,43,44,45,45,46,47,47,48,48,49,49,50,51,51,52,52,53,54,54,55,56,57,57,58,59,60,61,62,63,65,66,67,68);
        return $listening[$jawaban_benar];
    }

    public function nilai_structure($jawaban_benar)
    {
        $structure = array(20,20,21,22,23,25,26,27,29,31,33,35,36,37,38,40,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,60,61,63,65,67,68);
        return $structure[$jawaban_benar];
    }
}