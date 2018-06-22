<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*---------------------------UAS/GENAP/2017/2018---------------------------------/*
| NIM  : 1512502707			    | MATKUL  : PEMROGRAMAN WEB BERBASIS FRAMEWORK   |
| NAMA : ZACKY BURHANI HOTIB	| DOSEN   : GALIH NABIHI						 |
| KEL. : SI 					| TGL 	  : 26/05/2018							 |
/*-------------------------------------------------------------------------------*/

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('ModelAdmin');
	}

	public function index()
	{
		$username = $this->session->username;

		if($username != null){
			redirect('Dosen');
		} 

		$this->load->view('admin/login');
	}

	public function auth()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$checkUsername = $this->ModelAdmin->readUsername($username,$password);

		if($checkUsername==NULL){

			echo "<script type='text/javascript'>
               alert ('Maaf Username Dan Password Anda Salah !');
               window.location.replace('index');
      			</script>";

		}else{
			$newdata = array(
				'username'  => $checkUsername->username,
				'name'  => $checkUsername->nm_user,
				'email'  => $checkUsername->email,
				'level_user' =>$checkUsername->level_user
			  );
			//set seassion
			$this->session->set_userdata($newdata);
			redirect('Admin');
		}
	}

function logout(){
	$this->session->sess_destroy();
	redirect('Login');
}


}
