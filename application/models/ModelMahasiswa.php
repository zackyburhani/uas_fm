<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ModelMahasiswa extends CI_Model {

    public function __construct(){
		parent::__construct();
	}

 	public function fakultas($fakultas){
    	$query = $this->db->query("SELECT * FROM dosen where fakultas = '$fakultas'");
    	return $query->result();
  	}

 	public function simpanHasil($data){

		$checkinsert = false;
		try{
			$this->db->insert('nilai',$data);
			$checkinsert = true;
		}catch (Exception $ex) {
			$checkinsert = false;
		}
		return $checkinsert;
	}

	public function selesai($nik,$username){
    	$query = $this->db->query("SELECT status FROM nilai,user where user.username = nilai.mahasiswa and user.level_user = '2' and nik = '$nik' and nilai.mahasiswa = '$username'");
    	return $query->row();
  	}

	


}
