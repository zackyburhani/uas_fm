<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*---------------------------UAS/GENAP/2017/2018---------------------------------/*
| NIM  : 1512502707			    | MATKUL  : PEMROGRAMAN WEB BERBASIS FRAMEWORK   |
| NAMA : ZACKY BURHANI HOTIB	| DOSEN   : GALIH NABIHI						 |
| KEL. : SI 					| TGL 	  : 26/05/2018							 |
/*-------------------------------------------------------------------------------*/

class Mahasiswa extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('ModelDosen');
		$this->load->model('ModelMahasiswa');
		$this->load->model('ModelPertanyaan');

		$username = $this->session->username;
		if($username == null){
			redirect('Login');
		} 
	}

	public function index()
	{
		$username = $this->session->username;
		$getAllDosen = $this->ModelDosen->getAllDosen();
		$level_user = $this->session->level_user;
		$data = [
			'level_user' => $level_user,
			'getAllDosen' => $getAllDosen,
			'username' => $username
		];
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/template/sidebar',$data);
		$this->load->view('v_kuesioner',$data);
		$this->load->view('admin/template/footer',$data);
	}

	public function Fakultas()
	{
		$fakultas = $this->input->get('fakultas');

		$username = $this->session->username;
		$level_user = $this->session->level_user;
		$getAllPertanyaan = $this->ModelPertanyaan->getAllPertanyaan(); 
		$getFakultas = $this->ModelMahasiswa->fakultas($fakultas);

		$data = [
			'username' => $username,
			'getAllPertanyaan' => $getAllPertanyaan,
			'getDosenFakultas' =>$getFakultas,
			'username' => $username,
			'level_user' => $level_user
		];

		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/template/sidebar');
		$this->load->view('v_kuesioner');
		$this->load->view('admin/template/footer');
	}

	public function prosesKuesioner()
	{
		$username = $this->session->username;
		$jumlahPertanyaan = $this->ModelPertanyaan->jumlahPertanyaan();

		$nik = $this->input->post('nik');
		$feedback = $this->input->post('feedback');
		$fakultas = $this->input->post('fakultas');
		// $b  = "buruk";
		// $kb = "kurangBaik";
		// $bk = "baik";
		// $sb = "sangatBaik";
		$p = "id_pertanyaan"; 
		$b = "b";
		$total = 0;
		$status = array();
		for($i=1; $i<=$jumlahPertanyaan; $i++){

			$nilai = $this->input->post($b.$i);
			// $kurangBaik = $this->input->post($kb.$i);
			// $baik = $this->input->post($bk.$i);
			// $sangatBaik = $this->input->post($sb.$i);			
			// $pertanyaan = $this->input->post($p.$i);

			$status[] = $nilai;
			// $tampung[] = $kurangBaik;
			// $tampung[] = $baik;
			// $tampung[] = $sangatBaik;
		}

		$status = array_filter($status);
		// $total = array_sum($tampung);

		$arrays =$status;
		$status=array();
		$i=1;
		foreach($arrays as $k => $item) {
			$status[$i]=$item;
		    unset($arrays[$k]);
		    $i++;
		}

		// $hasil = $total/$jumlahPertanyaan;
		
		for($i=1; $i<=$jumlahPertanyaan; $i++){

			if($status[$i] == "Sangat Baik"){
				$nilai = 100;
			} else if($status[$i] == "Baik"){
				$nilai = 80;
			} else if($status[$i] == "Kurang Baik"){
				$nilai = 60;
			} else if($status[$i] == "Buruk"){
				$nilai = 40;
			}

			$pertanyaan = $this->input->post($p.$i);
			$data = [
				'id_pertanyaan' => $pertanyaan,
				'nik' => $nik,
				'feedback	' => $feedback,
				'status' => $status[$i],
				'nilai' => $nilai,
				'mahasiswa' => $username
			];
			$result = $this->ModelMahasiswa->simpanHasil($data);
		}

		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('Mahasiswa/Fakultas?fakultas='.$fakultas);
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('Mahasiswa/Fakultas?fakultas='.$fakultas);
		}
	}

}
