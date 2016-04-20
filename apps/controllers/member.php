<?php 
 class member extends controller{



    function profile(){
     
      if (!$this->app->lib->auth->isLive()){
        $this->app->lib->url->redirect('');
      }

      $data = array();
      $user_id = $this->app->lib->auth->id;
      //echo $user_id;
      //die('..ok..');
      $data['table'] = $this->app->model->member_model->get_single($user_id);
      return $this->view->load('member/profile',$data);

      //return $this->app->controller->home->index($content);
    }

    function change_password(){

      if (!$this->app->lib->auth->isLive()){
        $this->app->lib->url->redirect('');
      }

      $data = array();
      //$user_id = $this->app->lib->auth->id;
      //$data['table'] = $this->app->model->member_model->get_single($user_id);
      return $this->view->load('member/change_password',$data);

    }

    function update_action(){
    	$this->app->model->member_model->update($this->app->lib->auth->id,$_REQUEST);
    }



    function change_password_action(){
    	$password = $_REQUEST['password'];
    	$password2 = $_REQUEST['password2'];

    	$member_id = $this->app->lib->auth->id;

    	$this->app->model->member_model->change_password($member_id,$password,$password2);
    }


    function tranx(){
    	$member_id = $this->app->lib->auth->id;
        $data = array();
        $data['table'] = $this->app->model->member_model->get_item_order($member_id);
        return $this->view->load('member/tranx',$data);
    }

    function tranx_detail($item_order_id){
      $data = array();
      //$data['table'] = $this->app->model->item_order_detail_model->get_item_order_detail($item_order_id);
      $data['table'] = $this->app->model->product_model->get_order_detail_products($item_order_id);  //get_cart_products();
      return $this->view->load('member/tranx_detail',$data);
    }

    function logout_action(){
    	$this->app->model->member_model->logout();
    }


    //function get_item_order



 }
?>