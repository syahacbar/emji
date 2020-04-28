<?php
class Stand extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_menu');
		$this->load->model('m_order');
		$this->load->model('m_kategori');
        $this->load->library('upload');
        $this->load->helper('text');
    }
    
    function index(){
		$x['get_all_stand']=$this->m_menu->get_all_stand();
        $x['get_all_menu']=$this->m_menu->get_all_menu();
		$x['get_menu_stand']=$this->m_menu;
		$this->load->view('customer/header');
		$this->load->view('customer/stand',$x);
		$this->load->view('customer/footer');
	}
}