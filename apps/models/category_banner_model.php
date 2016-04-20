<?php 
 class category_banner_model extends model{

  
  
   function create($post){
      $this->db->insert('category_banner',$post);
      
      $this->do_silent_upload('banner1');
      $this->do_silent_upload('banner2');
      $this->do_silent_upload('banner3');
      $this->do_silent_upload('banner4');
      $this->do_silent_upload('banner5');

      $this->app->lib->message->message = 'Category banner uploaded.';
   }

   function do_silent_upload($file_index_name){

   }

   function edit($id,$post){
     $this->db->where(array("id"=>$id));
     $this->db->update('category_banner',$post);
     $this->app->lib->message->message = 'Category banner saved';
   }

   function remove($id){
     $this->db->where(array("id"=>$id));
     $this->db->delete('category_banner');
     $this->app->lib->message->message = 'Category banner removed.';
   }

   function get_all(){
   	$query = $this->db->get('category_banner');
   	return $query->result_object();
   }



 }
?>