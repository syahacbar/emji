<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_pengguna');
		$this->load->model('m_pelanggan'); 
		$this->load->model('m_order');
	}

	function index(){
		$kode=$this->session->userdata('idadmin');
		$standid = $this->m_pengguna->get_stand_id($this->session->userdata('idadmin'));
		$x['user']=$this->m_pengguna->get_pengguna_login($kode);
		$x['plg']=$this->m_pelanggan->get_all_pelanggan_terbaru();
		$x['odr']=$this->m_order->get_all_order();
		$x['statistik']=$this->m_order->get_grafik_penjualan();
		$x['statistikplg']=$this->m_pelanggan->get_grafik_pelanggan();
		$x['pen_now']=$this->m_order->get_total_penjualan_sekarang_by_stand($standid->stand_id);
		$x['pen_last']=$this->m_order->get_total_penjualan_bulan_lalu_by_stand($standid->stand_id);
		$x['tot_porsi']=$this->m_order->get_total_porsi_terjual_bulan_ini_by_stand($standid->stand_id);
		$x['tot_plg']=$this->m_order->get_tatal_pelanggan();
		$this->load->view('admin/v_dashboard',$x);
	}

}