<?php
 class home extends controller{
  
 
   
    function index(){
      $data = array();
      $data['version'] = '1.0.0';
      $data['author'] = 'Akamukali Nnamdi Alexander';
      $data['time_of_release'] = '20 April 2016';
      return $this->view->load('home/index',$data);
    }

 }

?>