<?php
 class home extends controller{
  
 
   
    function index($content=_NULL_,$search_text=''){
      $data = array();

      if ($content === _NULL_){
       $content = $this->get_default_content();
      }

      $data['header'] = $this->get_header(array("search_text"=>$search_text));
      $data['footer'] = $this->get_footer();
      $data['content'] = $content;
      //$data['search_text'] = $search_text;
      return $this->view->load('home/basic_layout',$data);
    }

    function get_default_content($dt=array()){
      $dt['tags'] = $this->app->controller->tag_controller->get_home_page_tags();
      $dt['breadcrumbs'] = $this->app->controller->category->show_breadcrumb_parent_categories();
      return $this->view->load('home/index',$dt);
    }

    function get_header($dt=array("search_text"=>"")){
      $dt['tags'] = $this->app->controller->tag_controller->get_tags();
      $dt['nav'] = $this->app->controller->category->get_nav();
      $dt['logo'] = $this->app->model->company_config_model->get_logo();
      $dt['is_logged'] = $this->app->lib->auth->isLive();
      return $this->view->load('home/header',$dt);
    }

    function get_footer(){
     return $this->view->load('home/footer');
    }

    function action(){
      return 'Action<br />';
    }


   function induce_intent(){
          if ($this->app->lib->auth->isLive()){

              if ($this->app->lib->sess->reason_message !== 'null'){
                $this->app->lib->sess->reason_message = 'null';
                $this->app->lib->url->redirect($this->app->lib->sess->reason_intent);
              }else{
               $this->app->lib->url->redirect('home/dashboard/member/profile');
              }
            
          }    
   }

    function signin(){

       
       //$this->app->lib->sess->reason_intent = 'product/checkout';

          //echo $this->app->message->error . '.....'; 
        $this->induce_intent();
      


      if (!$this->app->lib->message->error && !empty($this->app->lib->message->message)){
        //echo $this->app->message->message . '...OK'; 
       $this->app->lib->url->redirect('home/dashboard/member/profile');
      }
      $data = array();
      $data['reason_message'] = $this->app->lib->sess->reason_message;
      $data['reason_intent'] = $this->app->lib->sess->reason_intent;
      $data['test_tmp'] = $this->app->lib->sess->test_tmp;
      $content = $this->view->load('home/signin',$data);
      return $this->index($content);
    }

    function signin_action(){
      $email = $_REQUEST['email'];
      $password = $_REQUEST['password'];
      $this->app->model->member_model->login($email,$password);
    }

    function signup(){
     
      $this->induce_intent();

      //if ($this->app->lib->auth->isLive()){
       // $this->app->lib->url->redirect('');
     // }

      if (!$this->app->lib->message->error && !empty($this->app->lib->message->message)){
       $this->app->lib->url->redirect('');
      }
      $content = $this->view->load('home/signup');
      return $this->index($content);
    }

    function signup_action(){
      $this->app->model->member_model->create($_REQUEST);
    }

    function passrecover(){
      
      if ($this->app->lib->auth->isLive()){
        $this->app->lib->url->redirect('');
      }

      $content = $this->view->load('home/forgot_password');
      return $this->index($content);
    }

    function passrecover_action(){
      $this->app->model->member_model->recoverpass($_REQUEST['email']);
    }

    function profile(){

      if (!$this->app->lib->auth->isLive()){
        $this->app->lib->url->redirect('');
      }

      $data = array();
      $user_id = $this->app->lib->auth->id;
      $data['table'] = $this->app->model->member_model->get_single($user_id);
      return $content = $this->view->load('home/profile',$data);
      //return $this->index($content);
    }

    function dashboard(){

      if (!$this->app->lib->auth->isLive()){
        $this->app->lib->url->redirect('');
      }

     $args = func_get_args();
     $data = array();
     $data['content'] = $this->app->lib->onion->exec($args);

     $content = $this->view->load('home/dashboard',$data);

     return $this->index($content);

    }


    function return_policy(){

      $content = $this->view->load('home/return_policy');;

      return $this->index($content);
    }





 }

?>