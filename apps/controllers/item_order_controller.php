<?php
 class item_order_controller extends controller{
  
 

    function get_order_form(){
     $data = array(); 
     
     $data['delivery_time'] = $this->app->plugin->util->get_delivery_time();
     $data['delivery_area'] = $this->app->plugin->util->get_location_area();
     //print_r($this->app->lib->auth->all());
     $data['profile'] = $this->app->lib->auth;
     $data['country'] = $this->app->plugin->util->get_country();
     $data['preferred_delivery'] = $this->app->plugin->util->get_preferred_delivery();
     $data['cart_total'] = $this->app->plugin->cart->get_count();

     $data['transaction_id'] = $this->app->lib->sess->transaction_id;


     return $this->view->load('item_order/get_order_form',$data);
    }


    function update(){
      return $this->app->model->item_order_model->update($_REQUEST);
    }

 

 }

?>