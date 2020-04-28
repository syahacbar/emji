<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_pelanggan');
		$this->load->library('upload');
	}

	function index(){
		
		$this->load->view('customer/header');
		$this->load->view('customer/login');
		$this->load->view('customer/footer');
	}

	public function meja($meja)
	{
		$this->load->model('m_pelanggan');

		$uniqueId = uniqid(rand(1,100), TRUE);

		$this->session->set_userdata('nomor_meja',$meja); 
		$this->session->set_userdata('session_id',md5($uniqueId)); 

		$nomor_meja = $this->session->userdata('nomor_meja');
		$session_id = $this->session->userdata('session_id');

		$plg_nama = "Meja".$nomor_meja."-".$session_id;

		$this->session->set_userdata('plg_nama',$plg_nama); 

		$this->m_pelanggan->simpan_customer($plg_nama);

		redirect('home');
	}

	
	function auth(){
        $plg_nama = $this->session->userdata('plg_nama');
        $cadmin=$this->m_pelanggan->cek_pelanggan($plg_nama);
        if($cadmin->num_rows > 0){
         $this->session->set_userdata('online',true);
         $xcadmin=$cadmin->row_array();
         $this->session->set_userdata('nama_pel',$xcadmin['plg_nama']); 
         $this->session->set_userdata('kopel',$xcadmin['plg_id']); 
        }else{
                $this->session->set_userdata('online',false);
        }
        
        if($this->session->userdata('online')==true){
            redirect('customer/berhasillogin');
        }else{
            redirect('customer/gagallogin');
        }
    } 

    function berhasillogin(){
            if(empty($this->cart->total_items())){
                $kopel=$this->session->userdata('kopel');
                $this->db->query("update tbl_pelanggan set plg_status='1' where plg_id='$kopel'");
                redirect('home');
            }else{
                redirect('menu/cart');
            }
            
    }

    function gagallogin(){
            $url=base_url('customer');
            echo $this->session->set_flashdata('msg','<div class="notifications error"><i class="fa fa-exclamation-circle"></i> Email atau Password yang anda masukan salah. Mohon Check Kembali!</div>');
            redirect($url);
    }
    
    function logout(){
            $kopel=$this->session->userdata('kopel');
            $this->db->query("update tbl_pelanggan set plg_status='0' where plg_id='$kopel'");
			$this->session->sess_destroy();
			$this->cart->destroy();
            $url=base_url('home');
            redirect($url);
    }
}
