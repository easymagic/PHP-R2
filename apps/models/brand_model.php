<?php
 class brand_model extends model{
  

   
   
   
   function get_brands(){
    $query = $this->db->get('brand');
    return $this->db->result_object($query);
   }



   function create($post){
     return $this->db->insert('brand',$post);
   }

   function update($id,$post){
    $this->db->where(array("id"=>$id));
    $this->db->update('brand',$post);
   }

   function delete($id){
    $this->db->where(array("id"=>$id));
    $this->db->delete('brand');
   }
   

   function get_brand($id=''){
    $query = $this->db->get_where('brand',array("id"=>$id));
    return $this->db->result_object($query);
   }

 

 }

?>