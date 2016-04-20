<?php 
 class friends_model extends model{
  


   function make_connection($grant_id,$request_id,$request_message=''){
    
    if ($this->is_friend($grant_id,$request_id)){
      throw new Exception("You are already connected to this person!");
    }

    if ($this->already_made_connection($grant_id,$request_id)){
      throw new Exception("Connection request already sent!");
    }

    if ($this->has_recieved_request($request_id,$grant_id)){
      throw new Exception("A connection request has already been sent to you from this individual, please confirm your connection request!");
    }

    $this->complete_other_cycle($grant_id,$request_id,$acceptance_status='0',$request_message);

    $this->app->lib->message->message = 'Connection request successfully sent...';
    
    //send mail to the grant_id .....
    $member_object = $this->app->model->member_model->get_member_by_id($grant_id);

    $member_object_request = $this->app->model->member_model->get_member_by_id($request_id);
    
    if (count($member_object) > 0){
     $member_object = $member_object[0];
     $member_object_request = $member_object_request[0];
     $this->send_connection_request_mail($member_object,$member_object_request);
    }


   }

   function send_connection_request_mail($member_object,$member_object_request){
     $to = $member_object->email;
     $subject = 'CONNECTION REQUEST FROM SCHOOL ARENA';
     $msg = '
        Dear <b>' . $member_object->first_name .'</b>,<br />
        <b>' . $member_object_request->first_name . '</b> want\'s to connect with you , click on the link below<br />
        to <a href="' . BASE_URL . 'friends/get_connection_requests/' . $member_object->id . '">confirm</a> connection requests. <br />
        <div align="right"><b>Thank You for choosing schoolarena</b></div>
     ';
     $from = 'info@magsonic.com.ng ';

     $this->app->lib->vmail->to = $to;
     $this->app->lib->vmail->from = $from;
     $this->app->lib->vmail->subject = $subject;
     $this->app->lib->vmail->msg = $msg;

     $this->app->lib->vmail->send();

   }

   function already_made_connection($grant_id,$request_id){
     $r = false;
     $query = $this->db->get_where('friends',array("grant_id"=>$grant_id,"request_id"=>$request_id));
     if ($this->db->num_rows($query) > 0){
       $result = $this->db->result_object($query);
       $result = $result[0];
       $r = true;
     }    
     return $r;
   }

   function is_friend($grant_id,$request_id){
     $query = $this->db->get_where('friends',array("grant_id"=>$grant_id,"request_id"=>$request_id));
     if ($this->db->num_rows($query) > 0){
       $result = $this->db->result_object($query);
       $result = $result[0];
       return ($result->acceptance_status == '1');
     }else{
       return false;
     }
   }

   function has_recieved_request($grant_id,$request_id){
   	$filter = array("grant_id"=>$grant_id,"request_id"=>$request_id);
   	$query = $this->db->get_where('friends',$filter);
   	return ($this->db->num_rows($query) > 0);
   }

   function complete_other_cycle($grant_id,$request_id,$acceptance_status='0',$request_message=''){
     $post = array();
     $post['grant_id'] = $grant_id;
     $post['request_id'] = $request_id;
     $post['acceptance_status'] = $acceptance_status;
     $post['request_message'] = $request_message;

     if ($this->_exists($grant_id,$request_id)){
       $this->db->where(array("grant_id"=>$grant_id,"request_id"=>$request_id));
       $this->db->update('friends',$post);
     }else{
       $this->db->insert('friends',$post);
     }

     
   }

   function _exists($grant_id,$request_id){
   	 $query = $this->db->get_where('friends',array("grant_id"=>$grant_id,"request_id"=>$request_id));
   	 if ($this->db->num_rows($query) > 0){
      return true;
   	 }else{
   	  return false;	
   	 }
   }

   //get_pending_requests
   function get_pending_requests($member_id=''){
     $query = $this->db->get_where('friends',array("grant_id"=>$member_id,"acceptance_status"=>"0"));
     return $this->db->result_object($query);
   }


   function confirm_connection_request($request_id=''){

     $grant_id = $this->app->lib->auth->id;

     $query = $this->db->get_where('friends',array("grant_id"=>$grant_id,"request_id"=>$request_id));

     if ($this->db->num_rows($query) <= 0){
       throw new Exception("Invalid call, please login!");
     }

     if ($grant_id == 'null'){
       throw new Exception("Please login to confirm connection requests!");
     }

     $post = array();
     $post['acceptance_status'] = '1';

     $this->db->where(array("grant_id"=>$grant_id,"request_id"=>$request_id));
     $this->db->update('friends',$post);

     $grant_id = $request_id;
     $request_id = $this->app->lib->auth->id;

     $this->complete_other_cycle($grant_id,$request_id,$acceptance_status='1',$request_message='cycle message confirmed.');

     $this->app->lib->message->message = 'Connection request confirmed.';

     //send mail to that effect.
    
    $grant_object = $this->app->model->member_model->get_member_by_id($request_id);
    $request_object = $this->app->model->member_model->get_member_by_id($grant_id);
    
    $grant_object = $grant_object[0];
    $request_object = $request_object[0];

    $this->send_connection_confirmation_mail($grant_object,$request_object); 

   }

   function send_connection_confirmation_mail($grant_object,$request_object){
     $to = $request_object->email;
     $subject = 'CONNECTION CONFIRMATION FROM SCHOOL ARENA';
     $from = 'info@magsonic.com.ng';
     $msg = 'Dear <b>' . $request_object->first_name . '</b><br />
       Your connection request has just been confirmed by <b>' . $grant_object->first_name . '</b><br />
       You can now share content and interact .....<br />
       <div align="right"><b>Thank You for choosing schoolarena</b></div>
     ';

     $this->app->lib->vmail->to = $to;
     $this->app->lib->vmail->subject = $subject;
     $this->app->lib->vmail->msg = $msg;
     $this->app->lib->vmail->from = $from;

     $this->app->lib->vmail->send();

   }


   function get_friends($grant_id=''){
     $query = $this->db->get_where('friends',array("grant_id"=>$grant_id,"acceptance_status"=>"1"));
     return $this->db->result_object($query);
   }





 }
?>
