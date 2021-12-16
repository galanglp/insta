<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mylib {
    protected $ci;
    public function __construct() 
    {
        $this->ci =& get_instance();
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
        $site_name = "INSTA";
        return $site_name;
    }
}