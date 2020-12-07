<?php
class Doktor extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Doktor_model','doktor');
	}

	public function index()
	{	
        $data['halaman']='doktor';
        $data['doktor']=$this->doktor->getAll();
		$this->load->view('templates/header',$data);
		$this->load->view('doktor');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/footer');
    }
}