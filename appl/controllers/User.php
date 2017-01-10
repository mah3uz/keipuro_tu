<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	
	function __Construct(){
	parent::__Construct ();

	   $this->load->model('user_model'); // Load User Model

	  }
	
	//Defult user login
	public function index()
	{
		$this->data['title']='Login :: Keipuro Tu';
		$this->load->view('login_view',$this->data);
	}
	
	

	
	
	//User login check
	public function userAuthorication()
	{
		//This method will have the credentials validation
	   $this->load->library('form_validation');
	 
	   $this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');
	   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
	 
	   if($this->form_validation->run() == FALSE)
	   {
		   $this->session->set_flashdata('success_msg', 'Login info not matched');
		 //Field validation failed.  User redirected to login page
		 redirect('user', 'refresh');
	   }
	   else
	   {
		 //Go to private area
		 redirect('home', 'refresh');
	   }
	 
	 }
	 
	 
	 //User login check
	 function check_database($password)
	 {
	   //Field validation succeeded.  Validate against database
	   $phone = $this->input->post('phone');
	 
	   //query the database
	   $result = $this->user_model->login($phone, $password);
	 
	   if($result)
	   {
		 $sess_array = array();
		 foreach($result as $row)
		 {
		   $sess_array = array(
			 'id_users' => $row->id_users,
			 'username' => $row->phonenumber
		   );
		   $this->session->set_userdata('logged_in', $sess_array);
		 }
		 return TRUE;
	   }
	   else
	   {
		 $this->form_validation->set_message('check_database', 'Invalid username or password');
		 return false;
	   }
	 }
	 
	 
	 
	 
	 	public function signup()
	{

			
			$this->user_model->signup(array(
			'phonenumber' => $this->input->post('phone'),
			'password' => md5($this->input->post('password')),

			));
						 
				$this->data['mgs']='Signup successfully';
				$this->load->view('login_view',$this->data);

	}
	
	
	
	//logout
	function logout()
	{
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   $this->session->set_flashdata('success_msg', 'Logout successfully');
	   redirect('user', 'refresh');
	}

	
	



}



