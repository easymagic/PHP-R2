<?php 
 class wall_model extends model{

    
    const PATH = 'wall_images/';


    function create($member_id,$post_id,$post){
      
      if (empty($post['content'])){
        throw new Exception("Please type in an entry!");
      }

      $this->check_member($member_id);
      $post['member_id'] = $member_id;
      $post['post_id'] = $post_id;
      $new_wall_id = $this->db->insert('wall',$post);
      $this->check_for_image_transfer($new_wall_id); //check if an image is sent along side with the wall-post
      $this->app->lib->message->message= 'New post created.';
    }

    function check_for_image_transfer($wall_id){
      $salt = substr(md5(time() . microtime() . $wall_id), -5);
      $tmp = $_FILES['wall_image']['tmp_name'];
      $target = $salt . $_FILES['wall_image']['name'];
      if (move_uploaded_file($tmp, self::PATH . $target)){
        $post = array();
        $post['wall_image'] = $target;
        $this->db->where(array("id"=>$wall_id));
        $this->db->update('wall',$post);
        $this->app->lib->message->message = 'Attachment posted..';
      }else{
      	//$this->app->lib->message->message = '';
      }
    }

    function check_member($member_id){
     $query = $this->db->get_where('member',array("id"=>$member_id));
     if ($this->db->num_rows($query) <= 0){
        throw new Exception("You are not authorised to create wall post!");
     }
    }

    function remove($member_id,$wall_id){
      $query = $this->db->get_where('wall',array("id"=>$wall_id));
      if ($this->db->num_rows($query) > 0){
        $result = $this->db->result_object($query);
        $result = $result[0];
        if ($result->member_id == $member_id){
          $this->remove_wall_image($result->wall_image);
          $this->db->where(array("id"=>$wall_id)); 
          $this->db->delete('wall');
          $this->app->lib->message->message = 'Wall post removed ...';
        }else{
        	throw new Exception("This wall was not created by you, you can't delete it!");
        }
      }else{
      	throw new Exception("This wall does not exist!");
      }
    }

    private function remove_wall_image($wall_image=''){
      //wall_images
      //wall_image
      $file = 'wall_images/' . $wall_image;
      if (file_exists($file)){
       @unlink($file);
      }
    }

    function get_my_wall($member_id){
     $query = $this->db->get_where('wall',array("member_id"=>$member_id));
     return $this->db->result_object($query);
    }



 }
?>