<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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