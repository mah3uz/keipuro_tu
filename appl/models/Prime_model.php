<?php
	class Prime_model extends CI_Model {
	 
	 
		//Get all words by user
		function getWords($id_user){
			$this->db->select("id_word,text,name_word,id_users"); 
			$this->db->from('word');
			$this->db->where('id_users', $id_user);
			$query = $this->db->get();
			return $query->result();
		}
		 
		//Get word by ID
		function getWordByID($id_word){
			$this->db->select("id_word,text,name_word"); 
			$this->db->from('word');
			$this->db->where('id_word',$id_word);
			$query = $this->db->get();
			return $query->result();
		 }
		 
		 
		//Insert Word
		function WordInsert($data){
			
			$this->db->insert('word',$data);
		}
		
		
		//Last Element
		function LastElement($id_user){
			$this->db->select("id_word"); 
			$this->db->from('word');
			$this->db->where('id_users',$id_user);
			$this->db->order_by("id_word", "desc");
			$this->db->limit(1);
			//$query = $this->db->get();
			//return $query->result(); 
			
			
			$query = $this->db->get();
			$ret = $query->row();
			return $ret->id_word;

		}
		
		
		//Update Word by ID
		function UpdateWord($id_word,$data){
			$this->db->where('id_word',$id_word);
			$this->db->update('word', $data); 

		}
		
		
		//Delete Word by ID
		function deleteWordByID($id_word){
			$this->db->where('id_word', $id_word);
			$this->db->delete('word');
		}
	   
	   
	 
	}
?>