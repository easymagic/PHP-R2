<?php
 class cart_controller extends controller{
  


    function add($id,$price,$qty=1){
     $this->app->plugin->cart->add_to_cart($id,$price,$qty);
     //echo $id;
     return $this->get_added_item_preview($id);
    } 

    function get_added_item_preview($id){
     $data = array();
     $data['products'] = $this->model->product_model->get_product($id);
     $data['cart_metta'] = $this->app->plugin->cart->get_count();  

     return $this->view->load('cart/add_product_preview',$data);
    }

    function update($id,$qty){
      $this->app->plugin->cart->update_cart($id,$qty);
      return 'Cart updated.';
    } 

    function remove($id){
     $this->app->plugin->cart->remove_from_cart($id);
     return 'Item removed from cart.';
    }

    function get_cart_count(){
     //get_count
      $data = $this->app->plugin->cart->get_count();  

      return $data['tot'];
    }



    function get_view_basket(){
        $data = array();
        $data['table'] = $this->model->product_model->get_cart_products();
        $data['cart'] = $this->app->plugin->cart->get_cart();
        $r = $this->app->plugin->cart->get_count();          
        $data['tot_price'] = $r['tot_price'];
        return $this->view->load('cart/get_view_basket',$data);
    }

    function get_cart_popup_items(){

    }

    function get_cart_table_items(){

    }


 



 

 }

?>