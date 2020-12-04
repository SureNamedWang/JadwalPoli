<?php
class Home extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dokter_model','doktor');
	}
	public function index()
	{	
		$data['halaman']='home';
		$data['dokter']=$this->doktor->getAll();
		$this->load->view('templates/header',$data);
		$this->load->view('home');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/footer');
	}

}