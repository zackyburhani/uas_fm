<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*---------------------------UAS/GENAP/2017/2018---------------------------------/*
| NIM  : 1512502707			    | MATKUL  : PEMROGRAMAN WEB BERBASIS FRAMEWORK   |
| NAMA : ZACKY BURHANI HOTIB	| DOSEN   : GALIH NABIHI						 |
| KEL. : SI 					| TGL 	  : 26/05/2018							 |
/*-------------------------------------------------------------------------------*/

class Chart extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('ModelBuku');

		$username = $this->session->username;

		if($username == null){
			redirect('Login');
		} 
	}

	public function index(){

		$username = $this->session->username;
		$level_user = $this->session->level_user;
		$totalBuku = $this->ModelBuku->jumlahBuku();
		$totalUser = $this->ModelBuku->jumlahUser();
		$data = [
			'level_user' => $level_user,
			'totalBuku' => $totalBuku,
			'totalUser' => $totalUser,
			'username' => $username
		];

		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/template/sidebar',$data);
        $this->load->view('admin/chart',$data);
    }

}