<?php
class M_pengguna extends CI_Model{

	function get_all_pengguna(){
		$hsl=$this->db->query("SELECT tbl_pengguna.* FROM tbl_pengguna WHERE pengguna_level!=1");
		return $hsl;	
	}

	function simpan_pengguna($nama,$username,$password,$nohp,$gambar){
		$hsl=$this->db->query("INSERT INTO tbl_pengguna (pengguna_nama,pengguna_username,pengguna_password,,pengguna_nohp,pengguna_level,pengguna_photo) VALUES ('$nama','$username',md5('$password'),'$nohp','2','$gambar')");
		return $hsl;
	}

	function simpan_pengguna_tanpa_gambar($nama,$username,$password,$nohp){
		$hsl=$this->db->query("INSERT INTO tbl_pengguna (pengguna_nama,pengguna_username,pengguna_password,pengguna_nohp,pengguna_level) VALUES ('$nama','$username',md5('$password'),'$nohp','2')");
		return $hsl;
	}

	function simpan_stand($namastand,$idpengguna){
		$hsl=$this->db->query("INSERT INTO tbl_stand (stand_nama,stand_pengguna_id) VALUES ('$namastand','$idpengguna')");
		return $hsl;
	}

	//UPDATE PENGGUNA //
	function update_pengguna_tanpa_pass($kode,$nama,$username,$password,$nohp,$gambar){
		$hsl=$this->db->query("UPDATE tbl_pengguna set pengguna_nama='$nama',pengguna_username='$username',pengguna_nohp='$nohp',pengguna_photo='$gambar' where pengguna_id='$kode'");
		return $hsl;
	}
	function update_pengguna($kode,$nama,$username,$password,$nohp,$gambar){
		$hsl=$this->db->query("UPDATE tbl_pengguna set pengguna_nama='$nama',pengguna_username='$username',pengguna_password='$password',pengguna_nohp='$nohp',pengguna_photo='$gambar' where pengguna_id='$kode'");
		return $hsl;
	}

	function update_pengguna_tanpa_pass_dan_gambar($kode,$nama,$username,$password,$nohp){
		$hsl=$this->db->query("UPDATE tbl_pengguna set pengguna_nama='$nama',pengguna_username='$username',pengguna_nohp='$nohp' where pengguna_id='$kode'");
		return $hsl;
	}
	function update_pengguna_tanpa_gambar($kode,$nama,$username,$password,$nohp){
		$hsl=$this->db->query("UPDATE tbl_pengguna set pengguna_nama='$nama',pengguna_username='$username',pengguna_password='$password',pengguna_nohp='$nohp' where pengguna_id='$kode'");
		return $hsl;
	}
	//END UPDATE PENGGUNA//

	function hapus_pengguna($kode){
		$hsl=$this->db->query("DELETE FROM tbl_pengguna where pengguna_id='$kode'");
		return $hsl;
	}
	function getusername($id){
		$hsl=$this->db->query("SELECT * FROM tbl_pengguna where pengguna_id='$id'");
		return $hsl;
	}
	function resetpass($id,$pass){
		$hsl=$this->db->query("UPDATE tbl_pengguna set pengguna_password=md5('$pass') where pengguna_id='$id'");
		return $hsl;
	}

	function get_pengguna_login($kode){
		$hsl=$this->db->query("SELECT * FROM tbl_pengguna where pengguna_id='$kode'");
		return $hsl;
	}

	function get_stand_id($id){
		$hsl=$this->db->query("SELECT * FROM tbl_stand where stand_pengguna_id='$id'");
		return $hsl->row();
	}

}