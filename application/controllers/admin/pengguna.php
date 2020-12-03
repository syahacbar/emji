<?php
class Pengguna extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index(){
		$kode=$this->session->userdata('idadmin');
		$x['user']=$this->m_pengguna->get_pengguna_login($kode);
		$x['data']=$this->m_pengguna->get_all_pengguna();
		$this->load->view('admin/v_pengguna',$x);
	}

	function simpan_pengguna(){
				$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
	            $config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['max_size'] = '3024'; //maksimum besar file 1M
	            //$config['max_width']  = '900'; //lebar maksimum 1288 px
	            //$config['max_height']  = '800'; //tinggi maksimu 1000 px
	            $config['file_name'] = $nmfile; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        $gambar=$gbr['file_name'];
	                        $nama=str_replace("'", "", $this->input->post('nama'));
	                        $username=str_replace("'", "", $this->input->post('username'));
	                        $password=str_replace("'", "", $this->input->post('password'));
                            $konfirm_password=str_replace("'", "", $this->input->post('password2'));
                            $nohp=str_replace("'", "", $this->input->post('kontak'));
     						if ($password <> $konfirm_password) {
     							echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Password dan Ulangi Password yang Anda masukan tidak sama.</div>');
	               				redirect('admin/pengguna');
     						}else{
								$cekstand = $this->m_pengguna->cek_nama_stand($nama);
								if($cekstand->num_rows()>0){
								 echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Nama Stand <b>'.$nama.'</b> Sudah Ada, Silahkan Pakai Nama Lain.</div>');
								} else {
	               				   $this->m_pengguna->simpan_pengguna($nama,$username,$password,$nohp,$gambar);
								   $idpengguna = $this->db->insert_id();
								   $this->m_pengguna->simpan_stand($nama,$idpengguna);
	                    		echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Pengguna <b>'.$nama.'</b> Berhasil ditambahkan ke database.</div>');
								}
								redirect('admin/pengguna');
	               			}
	                     
	                }else{
	                    echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Pengguna tidak dapat ditambahkan, file gambar yang Anda masukkan terlalu besar.</div>');
	                    redirect('admin/pengguna');
	                }
	                 redirect('admin/pengguna');
	            }else{
	            	$nama=str_replace("'", "", $this->input->post('nama'));
	                $username=str_replace("'", "", $this->input->post('username'));
	                $password=str_replace("'", "", $this->input->post('password'));
                    $konfirm_password=str_replace("'", "", $this->input->post('password2'));
                    $nohp=str_replace("'", "", $this->input->post('kontak'));
	            	if ($password <> $konfirm_password) {
     					echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Password dan Ulangi Password yang Anda masukan tidak sama.</div>');
	               		redirect('admin/pengguna');
     				}else{
						   $cekstand = $this->m_pengguna->cek_nama_stand($nama);
						   if($cekstand->num_rows()>0){
							echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Nama Stand <b>'.$nama.'</b> Sudah Ada, Silahkan Pakai Nama Lain.</div>');
						   } else {
						   $this->m_pengguna->simpan_pengguna_tanpa_gambar($nama,$username,$password,$nohp);
						   $idpengguna = $this->db->insert_id();
						   $this->m_pengguna->simpan_stand($nama,$idpengguna);
	                    echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Pengguna <b>'.$nama.'</b> Berhasil ditambahkan ke database.</div>');
						  } 
						  redirect('admin/pengguna');
						   
	               	}
	            } 

	}

	function update_pengguna(){
				$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
	            $config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['max_size'] = '3024'; //maksimum besar file 2M
	            //$config['max_width']  = '900'; //lebar maksimum 1288 px
	            //$config['max_height']  = '800'; //tinggi maksimu 1000 px
	            $config['file_name'] = $nmfile; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        $gambar=$gbr['file_name'];
	                        $kode=str_replace("'", "", $this->input->post('kode'));
	                        $nama=str_replace("'", "", $this->input->post('nama'));
	                        $username=str_replace("'", "", $this->input->post('username'));
	                        $password=str_replace("'", "", $this->input->post('password'));
                            $konfirm_password=str_replace("'", "", $this->input->post('password2'));
                            $nohp=str_replace("'", "", $this->input->post('kontak'));

                            if (empty($password) && empty($konfirm_password)) {
                            	$this->m_pengguna->update_pengguna_tanpa_pass($kode,$nama,$username,$password,$nohp,$gambar);
	                    		echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Pengguna <b>'.$nama.'</b> Berhasil diupdate.</div>');
	               				redirect('admin/pengguna');
     						}elseif ($password <> $konfirm_password) {
     							echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Password dan Ulangi Password yang Anda masukan tidak sama.</div>');
	               				redirect('admin/pengguna');
     						}else{
	               				$this->m_pengguna->update_pengguna($kode,$nama,$username,$password,$nohp,$gambar);
	                    		echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Pengguna <b>'.$nama.'</b> Berhasil diupdate.</div>');
	               				redirect('admin/pengguna');
	               			}
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Pengguna tidak dapat diupdate, file gambar yang Anda masukkan terlalu besar.</div>');
	                    redirect('admin/pengguna');
	                }
	                 redirect('admin/pengguna');
	            }else{
	            	$kode=str_replace("'", "", $this->input->post('kode'));
	            	$nama=str_replace("'", "", $this->input->post('nama'));
	                $username=str_replace("'", "", $this->input->post('username'));
	                $password=str_replace("'", "", $this->input->post('password'));
                    $konfirm_password=str_replace("'", "", $this->input->post('password2'));
                    $nohp=str_replace("'", "", $this->input->post('kontak'));
	            	if (empty($password) && empty($konfirm_password)) {
                       	$this->m_pengguna->update_pengguna_tanpa_pass_dan_gambar($kode,$nama,$username,$password,$nohp);
	                    echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Pengguna <b>'.$nama.'</b> Berhasil diupdate.</div>');
	               		redirect('admin/pengguna');
     				}elseif ($password <> $konfirm_password) {
     					echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Password dan Ulangi Password yang Anda masukan tidak sama.</div>');
	               		redirect('admin/pengguna');
     				}else{
	               		$this->m_pengguna->update_pengguna_tanpa_gambar($kode,$nama,$username,$password,$nohp);
	                    echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Pengguna <b>'.$nama.'</b> Berhasil diupdate.</div>');
	               		redirect('admin/pengguna');
	               	}
	            } 

	}

	function hapus_pengguna(){
		$kode=$this->input->post('kode');
		$nama=$this->input->post('nama');
		$this->m_pengguna->hapus_stand($kode);
		$this->m_pengguna->hapus_pengguna($kode);
	    echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Pengguna <b>'.$nama.'</b> Berhasil dihapus dari database.</div>');
	    redirect('admin/pengguna');
	}

	function reset_password(){
   
        $id=$this->uri->segment(4);
        $get=$this->m_pengguna->getusername($id);
        if($get->num_rows()>0){
            $a=$get->row_array();
            $b=$a['pengguna_username'];
        }
        $pass="123456";
        $this->m_pengguna->resetpass($id,$pass);
        echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Username : <b>'.$b.'</b> <br/> Password baru : <b>'.$pass.'</b></div>');
	    redirect('admin/pengguna');
   
    }


}