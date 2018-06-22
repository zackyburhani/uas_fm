<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*---------------------------UAS/GENAP/2017/2018---------------------------------/*
| NIM  : 1512502707         | MATKUL  : PEMROGRAMAN WEB BERBASIS FRAMEWORK   |
| NAMA : ZACKY BURHANI HOTIB  | DOSEN   : GALIH NABIHI             |
| KEL. : SI           | TGL     : 26/05/2018               |
/*-------------------------------------------------------------------------------*/

class ModelPertanyaan extends CI_Model {

    public function __construct(){
		parent::__construct();
	}

	public function InsertPertanyaan($data){

		$checkinsert = false;
		try{
			$this->db->insert('pertanyaan',$data);
			$checkinsert = true;
		}catch (Exception $ex) {
			$checkinsert = false;
		}
		return $checkinsert;
	}

  public function jumlahPertanyaan()
  {
    $query = $this->db->query("SELECT * FROM pertanyaan");
    return $query->num_rows();
  }

  public function getAllPertanyaan()
  {
		$result = $this->db->get('pertanyaan');
		return $result->result();
	}

    //update data, coded by zacky
    function update_data($data,$where,$table)
    {
      $this->db->where('id_pertanyaan',$where);
      $this->db->update($table,$data);
    }

    public function delete($id_pertanyaan){
      $this->db->where('id_pertanyaan', $id_pertanyaan);
      $this->db->delete('pertanyaan');
    }
    

}
