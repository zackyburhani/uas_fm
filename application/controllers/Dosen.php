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
		$this->load->model('ModelAdmin');
		$this->load->library('Excel_generator');

		$username = $this->session->username;
		if($username == null){
			redirect('Login');
		} 
	}

	public function index()
	{
		$username = $this->session->username;
		$name = $this->session->nama;
		$getAllHasil = $this->ModelDosen->hasilKuesioner();
		$level_user = $this->session->level_user;
		$data = [
			'name' => $name,
			'level_user' => $level_user,
			'getAllHasil' => $getAllHasil,
			'username' => $username
		];
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/template/sidebar',$data);
		$this->load->view('v_hasilkuesioner',$data);
		$this->load->view('admin/template/footer',$data);
	}

	public function Eksport()
	{
		$graph 	      = $this->ModelAdmin->topdosen();
		$fakultas 	  = $this->ModelAdmin->fakultas();
		$nm_dosen     = $this->session->name;
		$feedback 	  = $this->ModelAdmin->hasilDosen($nm_dosen);
		$username 	  = $this->session->username;
		$level_user	  = $this->session->level_user;
		$getAllDosen  = $this->ModelDosen->getAllDosen();
		$getKodeDosen = $this->ModelDosen->getKodeDosen(); 
		$data 	  = [
			'fakultas' => $fakultas,
			'feedback' => $feedback,
			'getKodeDosen' => $getKodeDosen,
			'getAllDosen' => $getAllDosen,
			'username' => $username,
			'level_user' => $level_user,
			'graph' => $graph
		];
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/template/sidebar',$data);
		$this->load->view('admin/v_chart_dosen',$data);
		$this->load->view('admin/template/footer',$data);
	}


	 public function cetak() {
	 	$nama = $this->session->name;
        $query = $this->ModelAdmin->hasilDosen($nama);
        $this->excel_generator->set_query($query);
        $this->excel_generator->set_header(array('PERTANYAAN', 'NAMA MAHASISWA', 'FEEDBACK'));
        $this->excel_generator->set_column(array('nm_pertanyaan', 'nm_user', 'status'));
        $this->excel_generator->set_width(array(25, 15, 30, 15));
        $this->excel_generator->exportTo2007('Laporan Feedback');
    }	


}
