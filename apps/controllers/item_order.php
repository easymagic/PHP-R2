<?php 
 class item_order extends controller{
   
   function manage_item_orders(){
   	$data = array();
   	$data['table'] = $this->app->model->item_order_model->get_item_orders();
    return $this->view->load('item_order/manage_item_orders',$data);
   }

   //function add(){
    //$data = array();
    //$data['images'] = $this->app->plugin->fileio->get_select_options('product_images');
    //$data['brands'] = $this->app->model->brand_model->get_brands();
    //$data['categories'] = $this->app->model->category_model->get_categories();

    //return $this->view->load('item_oder/add',$data);
   //}

   //function create(){
    //$this->app->model->tag_model->check_code($_REQUEST['code']);
   	//$this->app->model->item_order_model->create($_REQUEST);
   	//$this->app->message->message = 'Product added ... ';
   //}

   //function delete($id){
     //$this->app->model->item_order_model->delete($id);
     //$this->app->message->message = 'Item order removed ... ';
   //}

   function preview($id=''){
   	$data = array();
   	$data['table'] = $this->app->model->item_order_model->get_item_order($id);
    $data['item_order_details'] = $this->app->model->item_order_detail_model->get_item_order_detail($id);
    $data['indexed_products'] = $this->app->model->product_model->get_indexed_products();
    $data['item_order_id'] = $id;
    $data['company'] = $this->app->model->company_config_model->get_rec();

    //$data['images'] = $this->app->plugin->fileio->get_select_options('product_images');
    //$data['brands'] = $this->app->model->brand_model->get_brands();
    //$data['categories'] = $this->app->model->category_model->get_categories();

   	return $this->view->load('item_order/preview',$data);
   }

   function preview_print($id=''){
    $js_print = $this->view->load('item_order/js_print');
    $content = $this->preview($id) . $js_print;
    return $this->app->controller->admin->base($content);
   } 

   function update($id=''){
    $this->app->model->item_order_model->update_manual($id,$_REQUEST);
    $this->app->message->message = 'Item order updated ... ';
   }

 }
?>