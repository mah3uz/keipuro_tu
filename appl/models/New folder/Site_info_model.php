<?php
class Site_info_model extends CI_Model {
 
	 function getSiteInfo(){
	  $this->db->select("id,about_us_heading,about_us_h1,about_us_p,address,facebook,twitter,google,mobile,email"); 
	  $this->db->from('site_info');
	  $query = $this->db->get();
	  return $query->result();
	 }
	 
	 

	function Packinsert($data){
		
		$this->db->insert('tour_packages',$data);
	}
	
	
	
	function deletePack($id){
	$this->db->where('package_id', $id);
	$this->db->delete('tour_packages');
	}
   
   
   
 
}
?>