<?php
class Home extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Schedule_model','schedule');
	}

	public function index()
	{	
		$data['halaman']='home';
		$this->load->view('templates/header',$data);
		$this->load->view('home');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/footer');
	}

	public function listSchedule(){
		// print_r($this->input->post());
		$limit = $this->input->post('length');
		$start = $this->input->post('start');
		// print_r($limit."///".$start);
		$totalData = $this->schedule->allposts_count();
		$totalFiltered = $totalData;

		if(empty($this->input->post('search')['value']))
		{
			$posts = $this->schedule->allposts($limit,$start);
		}
		
		$data = array();
		$counter=0;
		if(!empty($posts))
		{
			foreach ($posts as $post)
			{
				if(strlen($post->paramedicname)>50){
					$namadr=substr($post->paramedicname,0,50)."...";
				}
				else{
					$namadr=$post->paramedicname;
				}
				$nestedData['paramedicname'] = $namadr;
				$nestedData['doctor_speciality'] = $post->doctor_speciality;
				$nestedData['time_slot'] = $post->time_slot;
				$nestedData['room'] = $post->room;
				$nestedData['status'] = $post->status;
				
				$data[] = $nestedData;
				$counter++;
			}
			if($counter%$limit>0){
				$cl=$limit-($counter%$limit);
				for($ii=0;$ii<$cl;$ii++){
					$nestedData['paramedicname'] = "";
					$nestedData['doctor_speciality'] = "";
					$nestedData['time_slot'] = "";
					$nestedData['room'] = "";
					$nestedData['status'] = "";
					
					$data[] = $nestedData;
				}
			}
		}
		// print_r($data);
		$json_data = array(
				"draw"            => intval($this->input->post('draw')),
				"recordsTotal"    => intval($totalData),
				"recordsFiltered" => intval($totalFiltered),
				"data"            => $data,
				"token"           => $this->security->get_csrf_hash()
		);

		echo json_encode($json_data);
	}
}