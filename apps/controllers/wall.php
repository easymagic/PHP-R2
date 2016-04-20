<?php 
 class wall extends controller{


  function my_wall(){
    $member_id = $this->app->lib->auth->id;
  	return $this->user_wall($member_id);
  }

  function user_wall($member_id){
   //$member_id = $this->app->lib->auth->id;
   $data = array();
   $data['my_wall'] = $this->model->wall_model->get_my_wall($member_id);
   $data['message'] = $this->controller->message_controller->get_message();
   $data['member'] = $this->controller->member;
   $data['member_id'] = $member_id;
   $data['post_id'] = $this->app->lib->auth->id;

   $data['is_friend'] = $this->model->friends_model->is_friend($member_id,$data['post_id']); //grant_id,request_id


   return $this->view->load('wall/my_wall',$data);  	
  }

  function create_action($member_id='',$post_id=''){
   //$member_id = $this->app->lib->auth->id;	
   $this->model->wall_model->create($member_id,$post_id,$_REQUEST);
  }

  function remove_action($wall_id=''){
   $member_id = $this->app->lib->auth->id; 
   $this->model->wall_model->remove($member_id,$wall_id);
  }



 }
?>