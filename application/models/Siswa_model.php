<?php
class Siswa_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function save($data){
		$queryString = 'create (a:siswa{nama:{nama},jenis_kelamin:{jenisKelamin},tempat_lahir:{tempatLahir},tanggal_lahir:{tanggalLahir},agama:{agama},anakKe:{anakKe},dari:{dari},alamat:{alamat},kota:{kota},telepon:{telepon},email:{email},ayah:{ayah},ibu:{ibu},alamat_ortu:{alamatOrtu},telepon_ortu:{teleponOrtu},pekerjaan_ayah:{pekerjaanAyah},pekerjaan_ibu:{pekerjaanIbu}}) return a';
        return $this->neo->execute_query($queryString,$data);
	}

	public function edit($id,$data){
        return $this->neo->update($id,$data);
	}

	public function delete($id){
		return $this->neo->remove_node($id);
	}

	public function read(){
		$queryString = 'Match (n:siswa) return ID(n) as id, n.nama as nama, n.jenis_kelamin as kelamin, n.tempat_lahir as lahir, n.tanggal_lahir as tanggal, n.agama as agama, n.anakKe as anak_ke, n.dari as dari, n.alamat as alamat, n.kota as kota, n.telepon as telepon, n.email as email,n.ayah as ayah, n.ibu as ibu, n.alamat_ortu as alamat_ortu, n.telepon_ortu as telepon_ortu, n.pekerjaan_ayah as pekerjaan_ayah, n.pekerjaan_ibu as pekerjaan_ibu';
        return $this->neo->execute_query($queryString);
	}

}
?>