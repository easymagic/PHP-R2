<?php 
 class message_controller extends controller{

   function get_message(){
   	return $this->view->load('message_controller/get_message');
   }

 }
?>