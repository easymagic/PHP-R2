<?php 
 class admin extends controller{
   
     
     function base($content=''){
       $data = array();
       $data['content'] = $content;
       return $this->view->load('admin/base',$data);
     }


     function panel($a='item_order',$b='manage_item_orders'){ // item_order/manage_item_orders
       //$this->app->url->redirect('admin/login');	
	     if (!$this->app->lib->auth->isLive()){
          $this->app->lib->url->redirect('admin/login');
	     }	

       $args = func_get_args();
       $panel = call_user_func_array(array($this,'account_panel'), $args);  //$this->account_panel();	
       return $this->base($panel);
     }

     function account_panel(){ //get_left_panel
      
      $args = func_get_args();

      $data = array();
      $data['header'] = $this->get_header();
      $data['footer'] = $this->get_footer();
      $data['left'] = $this->get_left_panel();
      
      if (count($args) > 1){
       //$controller = $args[0];
       //$method = $args[1];
       //$args = array_slice($args, 2);
       $data['content'] = $this->app->lib->onion->exec($args); //call_user_func_array(array($this->app->controller->$controller,$method), $args);
      }else{
       $data['content'] = '';
      }
      //$data['content'] = $this->controller->$controller->me;
      return $this->view->load('admin/account_panel',$data);
     }

     function get_left_panel(){
       return $this->view->load('admin/get_left_panel');
     }

     function get_header(){
      $data = array();	
      $data['auth'] = $this->app->lib->auth->all();
      return $this->view->load('admin/get_header',$data);	
     }

     function get_footer(){
     	return $this->view->load('admin/get_footer');
     }

     function login(){ //get_login_form
      if ($this->app->lib->auth->isLive()){
      	//echo 'ok';
        $this->app->lib->url->redirect('admin/panel/dashboard/get_dashboard');  // item_order/manage_item_orders');
      }else{
      	//echo 'nok';
      }	
      //print_r($this->app->auth->all());

      $content = $this->view->load('admin/get_login_form');	
      return $this->base($content);
     }

     function login_action(){
       $email = $_REQUEST['email'];
       $password = $_REQUEST['password'];
       if ($this->app->model->admin_model->login($email,$password)){
         $this->app->lib->message->message = 'Access granted.';  
         //$this->app->url->redirect('admin/panel/item_order/manage_item_orders');
       }else{
         $this->app->lib->message->message = 'Access Denied!!!';
       }
     }

     function logout_action(){
     	$this->app->lib->message->message = $this->app->model->admin_model->logout();
     }


     function foo(){
     	return 'Foo greeting ... ';
     }




 }
?>