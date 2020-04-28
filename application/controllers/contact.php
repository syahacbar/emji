<?php
class Contact extends CI_Controller{
	function __construct(){
		parent::__construct();
	}


	function index(){
		$this->load->view('customer/header');
		$this->load->view('customer/contact');
		$this->load->view('customer/footer');
	}

}