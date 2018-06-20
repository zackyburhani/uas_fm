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


SELECT COUNT(nik) as jumlah ,nik, status from nilai where status = 'sangat baik' GROUP by nik

SELECT max(jumlah) as terbesar FROM (SELECT COUNT(*) as jumlah ,nik from nilai where status = 'sangat baik' or status = 'baik' GROUP by nik) as a


}
