<?php
class Gallery extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_gallery');
	}

	function index(){
		$x['data']=$this->m_gallery->get_all_gallery();
		$this->load->view('customer/header');
		$this->load->view('customer/gallery',$x);
		$this->load->view('customer/footer');
	}
}