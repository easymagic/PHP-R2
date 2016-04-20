<?php
 class cart_checkout extends model{
  
   

    function do_check_out(){
      $_REQUEST['full_name'] = '';
      $r = $this->app->plugin->cart->get_count();

      $_REQUEST['grand_total'] = $r['tot_price'];
      $_REQUEST['total_qty'] = $r['tot'];
      $_REQUEST['payment_status'] = STATUS_PENDING;
      //payment_response
      $_REQUEST['payment_response'] = STATUS_PENDING;



      $_REQUEST['member_id'] = $this->app->lib->auth->id;

      $cart_items = $this->app->plugin->cart->get_cart();
      if (count($cart_items) > 0){
       $item_order_id = $this->app->model->item_order_model->create($_REQUEST);

       $this->app->lib->sess->item_order_id = $item_order_id;

       $this->app->model->item_order_model->update_transaction_id($item_order_id);
       
       $this->app->model->item_order_detail_model->batch_create_order_detail($item_order_id,$cart_items); //batch create the item order detail items here
       //echo 'ok' . $item_order_id;
       return $item_order_id;
      }else{
       return _NULL_;
      }
    }
   
   
   
 

 }

?>
