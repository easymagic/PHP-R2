<?php
 class home_page_controller extends controller{
  
 

  function get_slides(){
     
     $slides =  $this->model->home_page_slider_model->get_slides();

     return $this->view->load('home/get_slides',array("slides"=>$slides));

  }

 

 }

?>