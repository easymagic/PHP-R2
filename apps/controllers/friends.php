<?php 
 class friends extends controller{
  


   function get_friends($member_id=''){

   	$data = array();
   	$data['friends'] = $this->model->friends_model->get_friends($member_id);
   	$data['member'] = $this->model->member_model;
   	return $this->view->load('friends/get_friends',$data);
   	
   }

   function get_friend_pending_notification($member_id=''){
   	$data = array();
   	$data['pending'] = $this->model->friends_model->get_pending_requests($member_id);
   	$data['member_id'] = $member_id;
    return $this->view->load('friends/get_friend_pending_notification',$data);
   }

   function make_connection_action($member_id=''){
   	$request_message = $_REQUEST['request_message'];
   	$request_id = $this->app->lib->auth->id;
   	$grant_id = $member_id;
    $this->model->friends_model->make_connection($grant_id,$request_id,$request_message);
   }

   function get_connection_requests($member_id=''){
    $data = array();
    $data['pending'] = $this->model->friends_model->get_pending_requests($member_id);
    $data['member'] =  $this->model->member_model;
    $data['message'] = $this->controller->message_controller->get_message();
    $data['friends'] = $this->get_friends($member_id);
    //echo $member_id;
   	$content = $this->view->load('friends/get_pending_requests',$data);
    return $this->controller->home->index($content);
   }

   function confirm_connection_request_action($request_id=''){
     $this->model->friends_model->confirm_connection_request($request_id);
   }


 }
?>