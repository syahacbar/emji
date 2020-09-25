<?php
class M_menu extends CI_Model{

	function get_all_menu(){
		$hsl=$this->db->query("SELECT menu_id,menu_nama,LEFT(menu_harga_lama,2) AS harga_lama,LEFT(menu_harga_baru,2) AS harga_baru,menu_harga_lama,menu_harga_baru,menu_likes,menu_kategori_id,menu_kategori_nama,menu_gambar, menu_status FROM tbl_menu");
		return $hsl;	
	}
 
	function get_all_menu_by_stand(){
		$hsl=$this->db->query("SELECT tm.menu_id,tm.menu_nama,LEFT(tm.menu_harga_lama,2) AS harga_lama,LEFT(tm.menu_harga_baru,2) AS harga_baru,tm.menu_harga_lama,tm.menu_harga_baru,tm.menu_likes,tm.menu_kategori_id,tm.menu_kategori_nama,tm.menu_gambar, tm.menu_status, ts.stand_nama FROM tbl_menu tm, tbl_stand ts WHERE tm.menu_stand_id=ts.stand_id");
		return $hsl;	
	}

	function get_all_stand(){
		$hsl=$this->db->query("SELECT * FROM tbl_stand");
		return $hsl;	
	}

	function simpan_menu($nama,$harga,$kategori,$kat_nama,$gambar,$idstand){
		$hsl=$this->db->query("INSERT INTO tbl_menu (menu_nama,menu_harga_baru,menu_kategori_id,menu_kategori_nama,menu_gambar,menu_stand_id) VALUES ('$nama','$harga','$kategori','$kat_nama','$gambar','$idstand')");
		return $hsl;
	}

	//UPDATE MENU DENGAN GAMBAR //
	function update_menu_tanpa_harga_baru($kode,$nama,$harga_lama,$kategori,$kat_nama,$gambar){
		$hsl=$this->db->query("UPDATE tbl_menu set menu_nama='$nama',menu_harga_baru='$harga_lama',menu_kategori_id='$kategori',menu_kategori_nama='$kat_nama',menu_gambar='$gambar' where menu_id='$kode'");
		return $hsl;
	}
	function update_menu_dengan_harga_baru($kode,$nama,$harga_lama,$harga_baru,$kategori,$kat_nama,$gambar){
		$hsl=$this->db->query("UPDATE tbl_menu set menu_nama='$nama',menu_harga_lama='$harga_lama',menu_harga_baru='$harga_baru',menu_kategori_id='$kategori',menu_kategori_nama='$kat_nama',menu_gambar='$gambar' where menu_id='$kode'");
		return $hsl;
	}
	//END EDIT MENU DENGAN GAMBAR//

	//UPDATE MENU TANPA GAMBAR//
	function update_menu_tanpa_harga_baru_tanpa_gambar($kode,$nama,$harga_lama,$kategori,$kat_nama){
		$hsl=$this->db->query("UPDATE tbl_menu set menu_nama='$nama',menu_harga_baru='$harga_lama',menu_kategori_id='$kategori',menu_kategori_nama='$kat_nama' where menu_id='$kode'");
		return $hsl;
	}
	function update_menu_dengan_harga_baru_tanpa_gambar($kode,$nama,$harga_lama,$harga_baru,$kategori,$kat_nama){
		$hsl=$this->db->query("UPDATE tbl_menu set menu_nama='$nama',menu_harga_lama='$harga_lama',menu_harga_baru='$harga_baru',menu_kategori_id='$kategori',menu_kategori_nama='$kat_nama' where menu_id='$kode'");
		return $hsl;
	}
	//END UPDATE MENU TANPA GAMBAR//

	function hapus_menu($kode){
		$hsl=$this->db->query("DELETE FROM tbl_menu where menu_id='$kode'");
		return $hsl;
	}


	//MODEL UNTUK MOBILE
	function hot_promo(){
		$hsl=$this->db->query("SELECT menu_id,menu_nama,LEFT(menu_harga_lama,2) AS harga_lama,LEFT(menu_harga_baru,2) AS harga_baru,menu_harga_lama,menu_harga_baru,menu_likes,menu_kategori_id,menu_kategori_nama,menu_gambar FROM tbl_menu WHERE (menu_harga_lama-menu_harga_baru)>=0 ORDER BY (menu_harga_lama-menu_harga_baru) DESC");
		return $hsl;
	}
	function makanan(){
		$hsl=$this->db->query("SELECT menu_id,menu_nama,LEFT(menu_harga_lama,2) AS harga_lama,LEFT(menu_harga_baru,2) AS harga_baru,menu_harga_lama,menu_harga_baru,menu_likes,menu_kategori_id,menu_kategori_nama,menu_gambar FROM tbl_menu WHERE menu_kategori_id='1' ORDER BY menu_id DESC");
		return $hsl;
	}
	function minuman(){
		$hsl=$this->db->query("SELECT menu_id,menu_nama,LEFT(menu_harga_lama,2) AS harga_lama,LEFT(menu_harga_baru,2) AS harga_baru,menu_harga_lama,menu_harga_baru,menu_likes,menu_kategori_id,menu_kategori_nama,menu_gambar FROM tbl_menu WHERE menu_kategori_id='2' ORDER BY menu_id DESC");
		return $hsl;
	}
	function snack(){
		$hsl=$this->db->query("SELECT menu_id,menu_nama,LEFT(menu_harga_lama,2) AS harga_lama,LEFT(menu_harga_baru,2) AS harga_baru,menu_harga_lama,menu_harga_baru,menu_likes,menu_kategori_id,menu_kategori_nama,menu_gambar FROM tbl_menu WHERE menu_kategori_id='3' ORDER BY menu_id DESC");
		return $hsl;
	}
	function favorite(){
		$hsl=$this->db->query("SELECT menu_id,menu_nama,LEFT(menu_harga_lama,2) AS harga_lama,LEFT(menu_harga_baru,2) AS harga_baru,menu_harga_lama,menu_harga_baru,menu_likes,menu_kategori_id,menu_kategori_nama,menu_gambar FROM tbl_menu WHERE menu_likes <> 0 ORDER BY menu_likes DESC");
		return $hsl;
	}

	function detail_menu($kode){
		$hsl=$this->db->query("SELECT tbl_menu.*,LEFT(menu_harga_lama,2) AS harga_lama,LEFT(menu_harga_baru,2) AS harga_baru FROM tbl_menu where menu_id='$kode'");
		return $hsl;	
	}

	function add_like($kode){
		$hsl=$this->db->query("UPDATE tbl_menu SET menu_likes=menu_likes+1 where menu_id='$kode'");
		return $hsl;	
	}

	function get_menu_stand($stand_id){
		$hsl=$this->db->query("SELECT menu_id,menu_nama,LEFT(menu_harga_lama,2) AS harga_lama,LEFT(menu_harga_baru,2) AS harga_baru,menu_harga_lama,menu_harga_baru,menu_likes,menu_kategori_id,menu_kategori_nama,menu_gambar,menu_status FROM tbl_menu WHERE menu_stand_id='$stand_id' ORDER BY menu_id DESC");
		return $hsl;
	}


	//END MODEL UNTUK MOBILE

}