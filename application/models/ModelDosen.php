<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ModelDosen extends CI_Model {

    public function __construct(){
		parent::__construct();
	}

	public function InsertDosen($data){

		$checkinsert = false;
		try{
			$this->db->insert('dosen',$data);
			$checkinsert = true;
		}catch (Exception $ex) {
			$checkinsert = false;
		}
		return $checkinsert;
	}

  public function jumlahDosen()
  {
    $query = $this->db->query("SELECT * FROM dosen");
    return $query->num_rows();
  }

  public function hasilKuesioner()
  {
    $query = $this->db->query("SELECT nik,nm_user,mahasiswa,feedback FROM nilai,user WHERE user.username = nilai.mahasiswa and level_user = '2' GROUP by mahasiswa");
    return $query->result();
  }

  public function total($mahasiswa,$nik)
  {
    $query = $this->db->query("SELECT (SUM(nilai) / COUNT(nilai)) as total FROM nilai where mahasiswa = '$mahasiswa' and nik = '$nik'");
    return $query->row();
  }

  public function hasilKuesioner_detail($mahasiswa,$nik)
  {
    $query = $this->db->query("SELECT * FROM nilai,pertanyaan where mahasiswa = '$mahasiswa' and nilai.id_pertanyaan = pertanyaan.id_pertanyaan and nik = '$nik'");
    return $query->result();
  }

  public function getAllDosen()
  {
		$result = $this->db->get('dosen');
		return $result->result();
	}

  //fungsi ambil ID dari database
  function get_id($nik)
  {
    $this->db->select("*");
    $this->db->where('nik', $nik);
    $this->db->from("nik");
    return $this->db->get();
  }

    //update data, coded by zacky
    function update_data($data,$where,$table)
    {
      $this->db->where('nik',$where);
      $this->db->update($table,$data);
    }

    public function delete($nik){
      $this->db->where('nik', $nik);
      $this->db->delete('dosen');
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

public function getKodeDosen()
{
  $q = $this->db->query("select MAX(RIGHT(nik,3)) as kd_max from dosen");
  $kd = "";
  if($q->num_rows() > 0)
  {
    foreach ($q->result() as $k) {
      $tmp = ((int)$k->kd_max)+1;
      $kd = sprintf("%03s",$tmp);
    }
  } else
    {
      $kd = "001";
    }
  return "ID".$kd;
}


}
