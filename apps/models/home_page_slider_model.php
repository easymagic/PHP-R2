<?php
 class home_page_slider_model extends model{
  

   
   
   
   function get_slides(){
    $query = $this->db->get('home_page_slider');
    //print_r($query);
    return $this->db->result_object($query);
   }

   function get_home_page_slider($id){ //
    $query = $this->db->get_where("home_page_slider",array("id"=>$id));
    return $this->db->result_object($query);
   }

   function get_home_page_sliders(){
    return $this->get_slides();
   }


   function create($post){
     return $this->db->insert('home_page_slider',$post);
   }

   function update($id,$post){
    $this->db->where(array("id"=>$id));
    $this->db->update('home_page_slider',$post);
   }

   function delete($id){
    $this->db->where(array("id"=>$id));
    $this->db->delete('home_page_slider');
   }



 }

?>