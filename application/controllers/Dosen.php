<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*---------------------------UAS/GENAP/2017/2018---------------------------------/*
| NIM  : 1512502707			    | MATKUL  : PEMROGRAMAN WEB BERBASIS FRAMEWORK   |
| NAMA : ZACKY BURHANI HOTIB	| DOSEN   : GALIH NABIHI						 |
| KEL. : SI 					| TGL 	  : 26/05/2018							 |
/*-------------------------------------------------------------------------------*/

class Dosen extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('ModelDosen');

		$username = $this->session->username;
		if($username == null){
			redirect('Login');
		} 
	}

	public function index()
	{
		$username = $this->session->username;
		$getAllHasil = $this->ModelDosen->hasilKuesioner();
		$level_user = $this->session->level_user;
		$data = [
			'level_user' => $level_user,
			'getAllHasil' => $getAllHasil,
			'username' => $username
		];
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/template/sidebar',$data);
		$this->load->view('v_hasilkuesioner',$data);
		$this->load->view('admin/template/footer',$data);
	}

	


}
