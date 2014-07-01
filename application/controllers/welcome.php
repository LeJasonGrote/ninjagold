<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->output->enable_profiler(TRUE);
		$this->load->model('activity');

		if($this->session->userdata('total_gold') == FALSE){
			$this->session->set_userdata('total_gold', 0);
		}	
		$this->load->view('index', array(
			'activities' => $this->activity->read_activities()));
	}

	public function process_money(){

		if($this->input->post('farm')){
			$gold = rand(10, 20);
			$location = "farm";
		}
		else if ($this->input->post('cave')){
			$gold = rand(5, 10);
			$location = "cave";
		}
		else if ($this->input->post('house')){
			$gold = rand(2, 5);
			$location = "house";
		}
		else if ($this->input->post('casino')){
			$gold = rand(-50, 50);
			$location = "casino";
		}
		$temp_gold = $this->session->userdata('total_gold');
		$this->session->set_userdata('total_gold', $temp_gold+$gold);
		
		if($gold >= 0){
			$message = "Earned $gold gold from the $location!";
		}
		else{
			$message = "Entered a $location and lost " . abs($gold) ." gold...Ouch..";
		}
			
		$this->load->model('activity');
		$this->activity->create_activity($message);

		redirect('/');
	}

	public function destroy(){
		$this->session->sess_destroy();
		// $this->session->set_userdata('total_gold', 0);
		redirect('/');
	}

}

