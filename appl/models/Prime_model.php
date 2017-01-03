<?php
class Prime_model extends CI_Model {
 
	 function getWords($id_user, $item, $segment){
	  $this->db->select("id_word,text,name_word,id_users"); 
	  $this->db->from('word');
	  $this->db->where('id_users', $id_user);
	  // $this->db->limit($item, $segment)
	  $query = $this->db->get();
	  
	  return $query->result();
	 }
	 
	 
	 function getWordByID($id_word){
	  $this->db->select("id_word,text,name_word"); 
	  $this->db->from('word');
	  $this->db->where('id_word',$id_word);
	  $query = $this->db->get();
	  return $query->result();
	 }
	 
	 
	 /*
	 function getNews(){
	  $this->db->select("id,title,details,date"); 
	  $this->db->from('news_event');
	  $query = $this->db->get();
	  return $query->result();
	 }*/
	 
	//insert word
	
	
	
	function WordInsert($data){
		
		$this->db->insert('word',$data);
	}
	
	
	
	function deleteWordByID($id_word){
	$this->db->where('id_word', $id_word);
	$this->db->delete('word');
	}
   
   
   
 
}
?>