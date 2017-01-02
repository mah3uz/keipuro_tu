<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	
	function __Construct(){
	parent::__Construct ();
	  
	   //$this->load->model('Pack_model'); // load offer model 
	  // $this->load->model('Booking_model'); // load booking model
	 //  $this->load->model('Site_info_model'); // load booking model
	 //$this->load->library('session');

	  }
	

	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			 $session_data = $this->session->userdata('logged_in');
				$this->data['username'] = $session_data['username'];
				$this->data['id_user'] = $session_data['id_users'];
			 
				$this->data['title']='Home :: Keipuro Tu';
				$this->data['page']='home';
				$this->load->view('home_view',$this->data);
			
		}
		
		
		else
		{
				//If no session, redirect to login page
				redirect('user', 'refresh');
		}
	
	
	}
	


	
	
	

	

}



