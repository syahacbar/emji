<?php
class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_menu');
		$this->load->model('m_kategori');
		$this->load->library('upload');
		$this->load->model('m_gallery');
	}


	function index(){
		$x['get_all_menu']=$this->m_menu->get_all_menu();
		$x['data']=$this->m_gallery->get_all_gallery();
		$this->load->view('customer/header');
		$this->load->view('customer/home',$x);
		$this->load->view('customer/footer'); 
	}

}