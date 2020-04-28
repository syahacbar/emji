<?php
class About extends CI_Controller{
	function __construct(){
		parent::__construct();
	}


	function index(){
		$this->load->view('customer/header');
		$this->load->view('customer/about');
		$this->load->view('customer/footer');
	}

}