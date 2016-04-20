<?php
 class product extends controller{
  
 

  function show(){
     
     $products = $this->model->product_model->get_products();

     return $this->view->load('foo',array("products"=>$products));

  }

  function featured(){
   $data = array();
   $data['products'] = $this->model->product_model->featured(); 
   return $this->view->load('product/featured_products',$data);
  }

  function deal(){
   $data = array();
   $data['products'] = $this->model->product_model->deal(); 
   return $this->view->load('product/deal_products',$data);
  }

  function best_sellers(){
   $data = array();
   $data['products'] = $this->model->product_model->best_sellers(); 
   return $this->view->load('product/best_sellers_products',$data);
  }

  function new_arrival(){
   $data = array();
   $data['products'] = $this->model->product_model->new_arrival(); 
   return $this->view->load('product/new_arrival_products',$data);
  }

  function new_products(){
   $data = array();
   $data['products'] = $this->model->product_model->new_products(); 
   return $this->view->load('product/new_products',$data);
  }

  function product_detail($id=''){
  	$data = array();
  	$data['product_detail'] = $this->model->product_model->get_detail($id);
  	$data['category_id'] = $this->model->product_model->get_product_category_id($id);
    $data['product_id'] = $id;
  	return $this->view->load("product/product_detail",$data);
  }



  function suggested_products($id=''){
  	$data = array();
  	$data['products'] = $this->model->product_model->suggested_products($id);
  	return $this->view->load("product/suggested_products",$data);  	
  }

  function get_similar_products($category_id){
   $data = array();
   $data['products'] = $this->model->product_model->get_similar_products($category_id);
   $data['product'] = $this->app->controller->product;
   return $this->view->load("product/get_similar_products",$data);  	
  }


  function filter_by_tags($tag,$title){
   $data = array();
   $data['products']= $this->model->product_model->filter_by_tags($tag);
   $data['title'] = $title;
   $data['product'] = $this->app->controller->product;
   return $this->view->load("product/filter_by_tags",$data);
  }

  function detail($name,$id){
   $content = $this->product_detail($id);
   return $this->controller->home->index($content,$name='');
  }

  function product_search($search_text){
    return $this->product_search_template("Search results ...",$search_text);
  }

  ///induce search filters here
  function induce_search_filters($key='',$value=''){
   $_SESSION[$key] = $value;
   //print_r($_SESSION);
   die('ok');
  }

  function product_search_template($title,$search_text){
   $data = array();
   $data['product'] = $this->app->controller->product;

   $data['dial_type'] = (isset($_SESSION['dial_type']))? $_SESSION['dial_type'] : 'null';
   $data['strap_type'] = (isset($_SESSION['strap_type']))? $_SESSION['strap_type'] : 'null';
   $data['dial_color'] = (isset($_SESSION['dial_color']))? $_SESSION['dial_color'] : 'null';
   $data['strap_color'] = (isset($_SESSION['strap_color']))? $_SESSION['strap_color'] : 'null';


   //echo 'Called ...';
   $data['products'] = $this->model->product_model->search($search_text,$data);
   $data['categories'] = $this->model->category_model->get_parent_categories();
   $data['brands'] = $this->model->brand_model->get_brands();
   $data['title'] = $title;
   $data['naira'] = $this->app->plugin->currency->get_currency();


    $data['dial_types'] = $this->app->model->filter_groups_model->get_by_parent_id('1');
    $data['strap_types'] = $this->app->model->filter_groups_model->get_by_parent_id('2');
    $data['dial_colors'] = $this->app->model->filter_groups_model->get_by_parent_id('3');
    $data['strap_colors'] = $this->app->model->filter_groups_model->get_by_parent_id('4');



   //$data['search_text'] = $search_text;
   return $this->view->load("product/product_search",$data);
  }

  function search($search_text){
    $content = $this->product_search($search_text);
    return $this->controller->home->index($content,$search_text);
  }

  function product_search_by_tag($search_text=''){
    $tag_code = $this->app->lib->request->tag_code;
    //echo $tag_code;
    $r = 'TRENDING TAGS';
    if ($tag_code !== _NULL_){
      $tag = $this->app->model->tag_model->get_tag($tag_code);  
      //print_r($tag);
      if (count($tag) > 0){
        $tag = $tag[0];
        $r = $tag->name;
      }
    }

    //echo $r;

    return $this->product_search_template($r,$tag_code);
  }

  function search_by_tags($search_text=''){
    $content = $this->product_search_by_tag($search_text);
    return $this->controller->home->index($content,$search_text);
  }


  
    function view_basket(){

      $content = $this->controller->cart_controller->get_view_basket();
      return $this->controller->home->index($content,$name='');
    }

    function remove_from_cart($id){
     $this->app->plugin->cart->remove_from_cart($id);
     $this->app->message->message = 'Item removed.';
     //return 'Item removed';
    }

    function  update_cart($id,$price,$qty){
      //echo $qty;
      $this->controller->cart_controller->add($id,$price,$qty);
    }


    function checkout(){
     
      //check if logged in 
      if (!$this->app->lib->auth->isLive()){
        $this->app->lib->sess->reason_message = 'Please login to complete checkout';
        $this->app->lib->sess->reason_intent = 'product/checkout';
        $this->app->lib->url->redirect('home/signin');
       //die('...');
      }


      $id = $this->model->cart_checkout->do_check_out();
      $data = array();
      $data['item_order_id'] = $id;
      
      //echo $id;
      if ($id !== _NULL_){
        $this->app->lib->sess->item_order_id = $id; 
      }

      $data['cart'] = $this->app->plugin->cart->get_cart();
      $data['table'] = $this->model->product_model->get_cart_products();
      $data['cart_total'] = $this->app->plugin->cart->get_count();
      
      $data['order_form'] = $this->app->controller->item_order_controller->get_order_form();

      $content = $this->view->load('cart/get_check_out',$data);
      
      return $this->controller->home->index($content);
    }

    function profile($product_id='',$cls='3'){
      $data = array();
      $data['profile'] = $this->app->model->product_model->get_product($product_id);
      $data['cls'] = $cls;
      return $this->view->load('product/profile',$data);
    }



 

 }

?>