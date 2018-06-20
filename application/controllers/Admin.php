<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*---------------------------UTS/GENAP/2017/2018---------------------------------/*
| NIM  : 1512502707			    | MATKUL  : PEMROGRAMAN WEB BERBASIS FRAMEWORK   |
| NAMA : ZACKY BURHANI HOTIB	| DOSEN   : GALIH NABIHI						 |
| KEL. : SI 					| TGL 	  : 6/04/2018							 |
/*-------------------------------------------------------------------------------*/

class Admin extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('ModelAdmin');
		$this->load->model('ModelDosen');
		$this->load->model('ModelPertanyaan');

		$username = $this->session->username;

		if($username == null){
			redirect('Login');
		} 
	}

	public function index()
	{
		$username = $this->session->username;
		$level_user = $this->session->level_user;
		$totalDosen = $this->ModelAdmin->jumlahDosen();
		$totalPertanyaan = $this->ModelAdmin->jumlahPertanyaan();
		$totalUser = $this->ModelAdmin->jumlahUser();
		$data = [
			'totalUser' => $totalUser,
			'totalDosen' => $totalDosen,
			'totalPertanyaan' => $totalPertanyaan,
			'username' => $username,
			'level_user' => $level_user
		];
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/template/sidebar',$data);
		$this->load->view('admin/template/index',$data);
		$this->load->view('admin/template/footer',$data);
	}


///////////////////////////Dosen//////////////////////////////// 
	public function Dosen()
	{
		$username 	  = $this->session->username;
		$level_user	  = $this->session->level_user;
		$getAllDosen  = $this->ModelDosen->getAllDosen();
		$getKodeDosen = $this->ModelDosen->getKodeDosen(); 
		$data 	  = [
			'getKodeDosen' => $getKodeDosen,
			'getAllDosen' => $getAllDosen,
			'username' => $username,
			'level_user' => $level_user
		];
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/template/sidebar',$data);
		$this->load->view('admin/v_dosen',$data);
		$this->load->view('admin/template/footer',$data);
	}

	public function tambahDosen()
	{
		$nik 	  = $this->input->post('nik');
		$nm_dosen = $this->input->post('nm_dosen');
		$fakultas = $this->input->post('fakultas');
		$jk 	  = $this->input->post('jk');
		$alamat   = $this->input->post('alamat');

		$data = [
			'nik' 		=> $nik,
			'nm_dosen' 	=> $nm_dosen,
			'fakultas'	=> $fakultas,
			'jk'		=> $jk,
			'alamat'	=> $alamat
		];

		$result = $this->ModelDosen->InsertDosen($data);
			if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('Admin/Dosen');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('Admin/Dosen');
		}
	}

	public function updateDosen	()
	{
		$nik 	  = $this->input->post('nik');
		$nm_dosen = $this->input->post('nm_dosen');
		$fakultas = $this->input->post('fakultas');
		$jk 	  = $this->input->post('jk');
		$alamat   = $this->input->post('alamat');

		$data = [
			'nm_dosen' 	=> $nm_dosen,
			'fakultas'	=> $fakultas,
			'jk'		=> $jk,
			'alamat'	=> $alamat
		];

		$result = $this->ModelDosen->update_data($data,$nik,'dosen');
		if (!$result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('Admin/Dosen');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('Admin/Dosen');
		}
	}

	public function hapusDosen()
	{
		$nik = $this->input->post('nik');
		$this->ModelDosen->delete($nik);
		if (!$result){
			$this->session->set_flashdata('pesan','Data Berhasil Dihapus');
	   		redirect('Admin/Dosen');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Dihapus');
    		redirect('Admin/Dosen');
		}
	}


///////////////////////////Pertanyaan//////////////////////////////// 
	public function Pertanyaan()
	{
		$username 	       = $this->session->username;
		$level_user   	   = $this->session->level_user;
		$getAllPertanyaan  = $this->ModelPertanyaan->getAllPertanyaan(); 
		$data 	  = [
			'username'		   => $username,	
			'getAllPertanyaan' => $getAllPertanyaan,
			'level_user' => $level_user
		];
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/template/sidebar',$data);
		$this->load->view('admin/v_pertanyaan',$data);
		$this->load->view('admin/template/footer',$data);
	}

	public function tambahPertanyaan()
	{
		$nm_pertanyaan = $this->input->post('nm_pertanyaan');

		$data = [
			'nm_pertanyaan' => $nm_pertanyaan
		];

		$result = $this->ModelPertanyaan->InsertPertanyaan($data);
		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('Admin/Pertanyaan');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('Admin/Pertanyaan');
		}
	}

	public function updatePertanyaan()
	{
		$id_pertanyaan = $this->input->post('id_pertanyaan');
		$nm_pertanyaan = $this->input->post('nm_pertanyaan');

		$data = [
			'nm_pertanyaan' => $nm_pertanyaan
		];

		$result = $this->ModelPertanyaan->update_data($data,$id_pertanyaan,'pertanyaan');
		if (!$result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('Admin/Pertanyaan');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('Admin/Pertanyaan');
		}
	}

	public function hapusPertanyaan()
	{
		$id_pertanyaan = $this->input->post('id_pertanyaan');
		$this->ModelPertanyaan->delete($id_pertanyaan);
		if (!$result){
			$this->session->set_flashdata('pesan','Data Berhasil Dihapus');
	   		redirect('Admin/Pertanyaan');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Dihapus');
    		redirect('Admin/Pertanyaan');
		}
	}

	public function user()
	{
		$username = $this->session->username;
		$level_user = $this->session->level_user;
		$semuaData = $this->ModelAdmin->getAllUser();
		$data = [
			'dataUser' => $semuaData,
			'username' => $username,
			'level_user' => $level_user
		];
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/template/sidebar',$data);
		$this->load->view('admin/users',$data);
		$this->load->view('admin/template/footer',$data);
	}


	public function tambahUser()
	{
		$username = $this->input->post('username');
		$nm_user = $this->input->post('nm_user');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$level_user = $this->input->post('level_user');

		$data = [
			'username' => $username,
			'nm_user' => $nm_user,
			'email' => $email,
			'password' => md5($password),
			'level_user' => $level_user
		];
		$result = $this->ModelAdmin->InsertUsername($data);
		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('Admin/user');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('Admin/user');
		}
	}

	public function hapusUsername()
	{
		$username = $this->input->post('username');
		$result = $this->ModelAdmin->deleteUsername($username);
		if (!$result){
			$this->session->set_flashdata('pesan','Data Berhasil Dihapus');
	   		redirect('Admin/user');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Dihapus');
    		redirect('Admin/user');
		}
	}

	public function updateUsername()
	{
		$username = $this->input->post('username');
		$nm_user = $this->input->post('nm_user');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$level_user = $this->input->post('level_user');

		if($password == null){
			$data = [
				'username' => $username,
				'nm_user' => $nm_user,
				'email' => $email,
				'level_user' => $level_user
			];
		} else {
			$data = [
				'username' => $username,
				'nm_user' => $nm_user,
				'email' => $email,
				'password' => md5($password),
				'level_user' => $level_user
			];
		}

		$result = $this->ModelAdmin->updateUsername($data,$username,'user');
		if (!$result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('Admin/user');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('Admin/user');
		}
	}


}