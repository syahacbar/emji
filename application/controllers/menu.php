<?php
class Menu extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_menu');
		$this->load->model('m_order');
		$this->load->model('m_kategori');
        $this->load->library('upload');
        $this->load->helper('text');
	}


	function index(){
		$x['judul']="HOT PROMO";
		$x['get_all_menu']=$this->m_menu->get_all_menu();
		$x['makanan']=$this->m_menu->makanan();
		$x['minuman']=$this->m_menu->minuman();
		$x['snack']=$this->m_menu->snack();
		$x['promo']=$this->m_menu->hot_promo();
		$x['favorite']=$this->m_menu->favorite();
		$this->load->view('customer/header');
		$this->load->view('customer/menu',$x);
		$this->load->view('customer/footer');
	}
	function makanan(){
		$x['judul']="MAKANAN";
		$x['data']=$this->m_menu->makanan();
		$this->load->view('mobile/v_menu',$x);
	}
	function minuman(){
		$x['judul']="MINUMAN";
		$x['data']=$this->m_menu->minuman();
		$this->load->view('mobile/v_menu',$x);
	}
	function favorite(){
		$x['judul']="FAVORITE";
		$x['data']=$this->m_menu->favorite();
		$this->load->view('mobile/v_menu',$x);
	}
	function detail_menu(){
		$kode=$this->uri->segment(3);
		$x['data']=$this->m_menu->detail_menu($kode);
		$this->load->view('customer/header');
		$this->load->view('customer/detail_menu',$x);
		$this->load->view('customer/footer');
	}

	function like(){
		$kode=$this->uri->segment(4);
		$this->m_menu->add_like($kode);
		$x['data']=$this->m_menu->detail_menu($kode);
		$this->load->view('v_detail_menu',$x);
	}

	function add_to_cart(){
		$kode=$this->uri->segment(3);
		$produk=$this->m_menu->detail_menu($kode);
		$i=$produk->row_array();
		$data = array(
               'id'      => $i['menu_id'],
               'qty'     => 1,
               'price'   => $i['menu_harga_baru'],
               'name'    => $i['menu_nama'],
               'image'	=> $i['menu_gambar']
               
            );

		$this->cart->insert($data); 
		redirect('menu/cart');
	}

	function cart(){
		$this->load->view('customer/header');
		$this->load->view('customer/cart');
		$this->load->view('customer/footer');
	}

	function remove(){
		$row_id=$this->uri->segment(3);
		$this->cart->update(array(
               'rowid'      => $row_id,
               'qty'     => 0
            ));
		redirect('menu/cart');
	}
	function update(){ 
		$this->cart->update($_POST);
        redirect('menu/cart');
	}

	function check_out()
	{
		if($this->session->userdata('online') !=TRUE)
		{
	       	$url=base_url('customer/auth');
	    	redirect($url);
        } else {
           	$no_invoice=$this->m_order->get_invoice();
			$total=$this->cart->total();
			$this->session->set_userdata('no_invoice',$no_invoice);
			$order_proses=$this->m_order->order_produk($no_invoice,$total);
			if($order_proses){
				$this->cart->destroy();
				redirect('menu/sukses');
			}else{
				redirect('menu/cart');
			}
        }
		
	}
	function sukses(){
		$this->load->view('customer/header');
        $this->load->view('customer/sukses');
		$this->load->view('customer/footer');
        
	}
	function cod(){
		$no_invoice=$this->session->userdata('no_invoice');
		
		$this->m_order->set_pembayaran_cod($no_invoice);
		$x['data']=$this->m_order->get_checkout($no_invoice);
		
		$this->load->view('customer/invoice',$x);
		
	}

	function transfer_bank(){
		$x['data']=$this->m_order->get_all_rekening();
		
		$this->load->view('customer/rekening',$x);
	}

	function set_pembayaran(){
		$no_invoice=$this->session->userdata('no_invoice');
		
		$pem_id=$this->uri->segment(4);
		$d=$this->m_order->get_rekening($pem_id);
		$q=$d->row_array();
		$rek_id=$q['rek_id'];
		$rek_no=$q['rek_no'];
		$rek_bank=$q['rek_bank'];
		$rek_nama=$q['rek_nama'];
		$rek_cabang=$q['rek_cabang'];
		$this->m_order->set_pembayaran_transfer($no_invoice,$rek_id,$rek_no,$rek_bank,$rek_nama,$rek_cabang);
		redirect('menu/cetak_invoice');
	}
	function cetak_invoice(){
		$no_invoice=$this->session->userdata('no_invoice');
		$x['data']=$this->m_order->get_checkout($no_invoice);
		
		$this->load->view('customer/invoice',$x);
	}


}