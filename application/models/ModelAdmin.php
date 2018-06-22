<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ModelAdmin extends CI_Model {

    public function __construct(){
		parent::__construct();
	}

  //read semua data
  public function readUsername($username,$password)
  {
    $result = $this->db->where('UPPER(username)', strtoupper($username))->where('password',md5($password))->limit(1)->get('user');
		return $result->row();
	}

    public function login($username,$password)
  	{
  		$this->db->select('*');
  		$this->db->from('users');
  		$this->db->where('username',$username);
  		$this->db->where('password',MD5($password));
  		$this->db->limit(1);

  		$query = $this->db->get();
  		if($query->num_rows() == 1)
  		{
  			return $query->result();
  		} else
  		{
  			return false;
  		}
  	}


  public function getAllUser()
  {
    $result = $this->db->get('user');
    return $result->result();
  }

  public function getchained($fakultas)
  {
    $query = $this->db->query("SELECT * FROM dosen where fakultas = '$fakultas'");
    return $query->result();
  }

  public function InsertUsername($data){

    $checkinsert = false;
    try{
      $this->db->insert('user',$data);
      $checkinsert = true;
    }catch (Exception $ex) {
      $checkinsert = false;
    }
    return $checkinsert;
  }

  public function deleteUsername($id){
      $this->db->where('username', $id);
      $this->db->delete('user');
  }

  public  function updateUsername($data,$where,$table)
  {
    $this->db->where('username',$where);
    $this->db->update($table,$data);
  }

  public function jumlahUser()
  {
    $query = $this->db->query("SELECT * FROM user");
    return $query->num_rows();
  }

  public function jumlahDosen()
  {
    $query = $this->db->query("SELECT * FROM dosen");
    return $query->num_rows();
  }

  public function jumlahPertanyaan()
  {
    $query = $this->db->query("SELECT * FROM pertanyaan");
    return $query->num_rows();
  }

  //top 5 dosen terbaik
  public function topdosen()
  {
    $query = $this->db->query("SELECT COUNT(*) as jumlah ,dosen.nik,nm_dosen from nilai,dosen where nilai.nik = dosen.nik and status = 'sangat baik' or status = 'baik' GROUP by nik ORDER by COUNT(*) desc limit 5");
    return $query->result();
  }

  //jumah feedback fakultas
  public function fakultas()
  {
    $query = $this->db->query("SELECT fakultas,COUNT(*) as jumlah FROM (SELECT dosen.nik,mahasiswa,fakultas,nm_dosen FROM nilai,dosen WHERE dosen.nik = nilai.nik GROUP by mahasiswa, dosen.nik) as x GROUP by fakultas");
    return $query->result();
  }

  //hasil
  public function hasilDosen($nm_dosen)
  {
    $query = $this->db->query("SELECT nm_pertanyaan, nm_user, status FROM user,nilai,dosen,pertanyaan where pertanyaan.id_pertanyaan = nilai.id_pertanyaan and dosen.nik = nilai.nik and dosen.nm_dosen = '$nm_dosen' and user.username = nilai.mahasiswa  order by mahasiswa");
    return $query;
  }

  public function hasilDosen2($nik)
  {
    $query = $this->db->query("SELECT nm_pertanyaan, nm_user, status FROM user,nilai,dosen,pertanyaan where pertanyaan.id_pertanyaan = nilai.id_pertanyaan and dosen.nik = nilai.nik and dosen.nik = '$nik' and user.username = nilai.mahasiswa  order by mahasiswa");
    return $query;
  }

}
