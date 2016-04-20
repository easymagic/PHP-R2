<?php 
 class member_picture_model extends model{

   const PATH = 'profile_pictures/';
   
    function change_picture($code){
    	$pix = $this->app->lib->auth->profile_picture;
    	$this->check_old_pix($pix);
    	$tmp = $_FILES['picture']['tmp_name'];
    	$target = $code . $_FILES['picture']['name'];
    	if (move_uploaded_file($tmp, self::PATH . $target)){
           $this->db->where(array("activation_code"=>$code));
           $post['profile_picture'] = $target;
           $this->app->lib->auth->profile_picture = $target;
           $this->db->update('member',$post);
           $this->app->lib->message->message = 'Successfully changed profile pix...';
    	}else{
    		throw new Exception("Picture upload failed!");
    	}
    }


    function check_old_pix($pix){
      $file = self::PATH . $pix;
      if (!empty($pix) && file_exists($file)){
        @unlink($file);
      }
    }

 }
?>