<?php 
 class member_search_model extends model{
 


   function do_search($name=''){
   	 if (!empty($name)){
	     $sql = "select * from member where ((first_name like '%$name%' or last_name like '%$name%') and activation_status='1' )";
	     $query = $this->db->query($sql);
	     return $this->db->result_object($query);
   	 }else{
   	  return array();	
   	 }
   }



 }
?>