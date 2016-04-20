<?php 
 class breadcrumb_model extends model{
  
   
    const PATH = 'breadcrumb_media';


    function table(){
     $sql = "select *,breadcrumb.id as breadcrumb_id from breadcrumb join category on breadcrumb.parent_id = category.id";	
     $query = $this->db->query($sql);
     return $query->result_object();
    }

    function get_by_id($id){
    	//secho $id;
     $query = $this->db->get_where('breadcrumb',array("id"=>$id));
     return $query->row_object();
    }

    function get_by_parent_id($parent_id=''){
     $query = $this->db->get_where('breadcrumb',array("parent_id"=>$parent_id));
     return $query->row_object();
    }

    function update($id='',$post=array()){
      $this->db->where(array("id"=>$id));
     
      $this->change_upload($post,'image1');
      $this->change_upload($post,'image2');
      $this->change_upload($post,'image3');
      $this->change_upload($post,'image4');
      $this->change_upload($post,'image5');
      $this->change_upload($post,'image6');

      $this->db->update('breadcrumb',$post);
      $this->app->lib->message->message = 'Saved.';
    }

    function delete($id){
     $obj = $this->get_by_id($id);
     
     $this->remove_upload($obj->image1);
     $this->remove_upload($obj->image2);
     $this->remove_upload($obj->image3);
     $this->remove_upload($obj->image4);
     $this->remove_upload($obj->image5);
     $this->remove_upload($obj->image6);

     $this->db->where(array("id"=>$id));
     $this->db->delete('breadcrumb');
     $this->app->lib->message->message = 'Removed.';
    }

    function create($post=array()){

     $this->do_upload($post,'image1');
     $this->do_upload($post,'image2');
     $this->do_upload($post,'image3');
     $this->do_upload($post,'image4');
     $this->do_upload($post,'image5');
     $this->do_upload($post,'image6');


     $this->db->insert('breadcrumb',$post);

     $this->app->lib->message->message = 'Breadcrumb created';
    }


    private function get_hash($r){
      $t = md5($r . microtime());
      return substr($t, -7);
    }
   
    function do_upload(&$post,$needle=''){
     $tmp = $_FILES[$needle]['tmp_name'];
     $name = $_FILES[$needle]['name'];
     
     $hash_name = $this->get_hash($name) . $name;

     
     
     $destination = self::PATH . '/' . $hash_name;

     if (move_uploaded_file($tmp, $destination)){
       $post[$needle] = $hash_name;
     }else{
       //$post[$needle] = 'null';
     }

    }


    function change_upload(&$post,$needle){
      $old = $post[$needle];
      $this->do_upload($post,$needle);
       if ($post[$needle] != $old){
        $this->remove_upload($old);
       }
    }

    function remove_upload($file){
     $file = self::PATH . '/' . $file;
     @unlink($file);
    }




 }
?>