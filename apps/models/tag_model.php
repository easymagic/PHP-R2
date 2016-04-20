<?php
 class tag_model extends model{




   function create($post){
     return $this->db->insert('tag',$post);
   }

   function update($id,$post){
    $this->db->where(array("id"=>$id));
    $this->db->update('tag',$post);
   }

   function delete($id){
    $this->db->where(array("id"=>$id));
    $this->db->delete('tag');
   }
   
   function check_code($code){
     $query = $this->db->get_where('tag',array("code"=>$code));

     if (count($this->db->result_object($query)) >= 1){
       throw new Exception("This tag code cannot be added twice!");
     }

   }
   
   
   
   function get_tags(){
   	$sql = "select * from tag order by sort_order asc";
    $query = $this->db->query($sql);
    return $this->db->result_object($query);
   }

   function get_tag($code){
   	//echo $code;
    $query = $this->db->get_where('tag',array("code"=>$code));
    return $this->db->result_object($query);
   }


 

 }

?>