<?php
	Class User_model extends CI_Model
	{

		function login($phone, $password){
			$this -> db -> select('id_users, phonenumber, password');
			$this -> db -> from('users');
			$this -> db -> where('phonenumber', $phone);
			$this -> db -> where('password', md5($password));
			$this -> db -> limit(1);

			$query = $this -> db -> get();

			if($query -> num_rows() == 1)
				{
					return $query->result();
				}
			else
				{
					return false;
				}
		}
		
		
		
		function signup($data){
			$this->db->insert('users',$data);
		}
		


	}
?>