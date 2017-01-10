<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	
	function __Construct(){
	parent::__Construct ();
	  
	    
         
		 $this->load->model('Prime_model'); // load prime model
		 /*if($this->session->userdata('logged_in'))
			{
					$session_data = $this->session->userdata('logged_in');
					$id=$session_data['id_users'];
					$this->data['word_lists'] = $this->Prime_model-> getWords($id);
			}*/
		
		 //$this->word_lists();
		

	  }
	

	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			 $session_data = $this->session->userdata('logged_in');
				$this->data['username'] = $session_data['username'];
				$this->data['id_user'] = $session_data['id_users'];
				
				$this->data['title']='Home :: Keipuro Tu';
				
				//$abc = $this->Prime_model->LastElement();
			
				//$this->load->view('home_view',$this->data);
				redirect('home/add_new_text', 'refresh');
			
		}
		
		
		else
		{
				//If no session, redirect to login page
				redirect('user', 'refresh');
		}
	
	
	}
	

	public function add_new_text()
	{
		if($this->session->userdata('logged_in'))
		{
			//initialize flag session
			$_SESSION['flag']='insert';
				
			 $session_data = $this->session->userdata('logged_in');
				$this->data['username'] = $session_data['username'];
				$this->data['id_user'] = $session_data['id_users'];
			 
				$this->data['title']='Add New Word :: Keipuro Tu';
				$this->load->view('new_text_view',$this->data);
				
				
			
		}
		
		
		else
		{
				//If no session, redirect to login page
				redirect('user', 'refresh');
		}
	
	
	}
	
	
	
	public function add_word()
	{
		
		 $count = mb_strlen(strip_tags($this->input->post('word')));
		 if ($count>11) { 
		//do insert & update
		
		
		if($this->session->userdata('logged_in'))
		{
			
			
				$session_data = $this->session->userdata('logged_in');
				$this->data['username'] = $session_data['username'];
				$this->data['id_user'] = $session_data['id_users'];
				
				$this->data['title']='Add New Word :: Keipuro Tu';
				
				//initialize flag session
				//$_SESSION['flag']='insert';
				
				if($_SESSION['flag']=='insert')
				{
					//changes to session update
					$_SESSION['flag']='update';
					$userid= $this->input->post('id_user');
					$this->Prime_model->WordInsert(array(
					'text' => $this->input->post('word'),
					'name_word' => str_replace(' ', '', preg_replace('/<[^>]*>/', '',  $this->input->post('word'))),
					'id_users' => $this->input->post('id_user'),
					
					));
					
					
					$_SESSION['id'] = $this->Prime_model->LastElement($userid);
					
				}
				
				
				if($_SESSION['flag']=='update')
				{
					
					$this->Prime_model->UpdateWord($_SESSION['id'],array(
					'text' => $this->input->post('word'),
					'name_word' => str_replace(' ', '', preg_replace('/<[^>]*>/', '',  $this->input->post('word'))),
					'modify'=>date('y/m/d h:i:s a', time()),

			));
					
				}
					
			
			
		}
		
		
		else
		{
				//If no session, redirect to login page
				redirect('user', 'refresh');
		}
		
		
		
		
		
	}	
		
		
		
}
	
	//update Word
	
		public function update_word($id_word)
	{
		
		
		 $count = mb_strlen(strip_tags($this->input->post('word')));
		 if ($count>11) { 
		
		
		if($this->session->userdata('logged_in'))
		{
			
			
			$this->Prime_model->UpdateWord($id_word,array(
			'text' => $this->input->post('word'),
			'name_word' => str_replace(' ', '', preg_replace('/<[^>]*>/', '',  $this->input->post('word'))),
			'modify'=>date('y/m/d h:i:s a', time()),

			));
			
			
			
				$session_data = $this->session->userdata('logged_in');
				$this->data['username'] = $session_data['username'];
				$this->data['id_user'] = $session_data['id_users'];
			 
				$this->data['title']='Add New Word :: Keipuro Tu';
				//$this->load->view('content_list_view',$this->data);
				redirect('home/word_lists', 'refresh');
		}
		
		
		else
		{
				//If no session, redirect to login page
				redirect('user', 'refresh');
		}
	
	}
	
	
}



public function word_lists() {

 if($this->session->userdata('logged_in'))
	{
		
		$session_data = $this->session->userdata('logged_in');
		
		$this->data['username'] = $session_data['username'];
		$this->data['id_user'] = $session_data['id_users'];
		$id=$session_data['id_users'];
		$this->data['title']='Home :: Keipuro Tu';			
			
        $config['base_url'] = site_url('home/word_lists/');
        $config['total_rows'] = $this->db->get('word')->num_rows();
        $config['per_page'] = 10;
        $config['num_links'] = 5;
        $config['full_tag_open'] = '<ul class="pagination no-margin">';
        $config['full_tag_close'] = '</ul>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['next_link'] = 'Next >';
        $config['prev_link'] = '< Prev';
        if ($this->uri->segment(3)) {
            $this->data['segment'] = $this->uri->segment(3);
        } else {
            $this->data['segment'] = 0;
        }

        $this->pagination->initialize($config);
        
		
        //$query = $this->db->limit($config['per_page'], $this->data['segment'])->where('id_users', $id)->order_by('modify','desc')->get('word');
		
		
		$query = $this->db->where('id_users', $id)->limit($config['per_page'], $this->data['segment'])->order_by('modify','desc')->get('word');
        $this->data['word_lists'] = $query->result_array();
		
        //$this->data['word_lists'] = $query->result_array();
        $this->load->view('content_list_view', $this->data);

	}
   }	
	
		public function word_view($id)
	{
		if($this->session->userdata('logged_in'))
		{
				$session_data = $this->session->userdata('logged_in');
				$this->data['username'] = $session_data['username'];
				$this->data['id_user'] = $session_data['id_users'];
			 
				$this->data['title']='Add New Word :: Keipuro Tu';
				
				$this->data['words'] = $this->Prime_model->getWordByID($id);
				$this->load->view('word_view',$this->data);
			
		}
		
		
		else
		{
				//If no session, redirect to login page
				redirect('user', 'refresh');
		}
	
	
	}
	
	//Edit word
		public function word_edit($id)
	{
		if($this->session->userdata('logged_in'))
		{
				$session_data = $this->session->userdata('logged_in');
				$this->data['username'] = $session_data['username'];
				$this->data['id_user'] = $session_data['id_users'];
			 
				$this->data['title']='Add New Word :: Keipuro Tu';
				
				$this->data['words'] = $this->Prime_model->getWordByID($id);
				$this->load->view('edit_view',$this->data);
			
		}
		
		
		else
		{
				//If no session, redirect to login page
				redirect('user', 'refresh');
		}
	
	
	}
	
		public function delete_word($id)
	{
		if($this->session->userdata('logged_in'))
		{
				$session_data = $this->session->userdata('logged_in');
				$this->data['username'] = $session_data['username'];
				$this->data['id_user'] = $session_data['id_users'];
			 
				$this->data['title']='Add New Word :: Keipuro Tu';
				
				$this->data['words'] = $this->Prime_model->deleteWordByID($id);
				redirect('/home/word_lists', 'refresh');
				//$this->load->view('home_view',$this->data);
			
		}
		
		
		else
		{
				//If no session, redirect to login page
				redirect('user', 'refresh');
		}
	
	
	}
	

}



