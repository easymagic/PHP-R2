<?php 
 class products extends controller{
   
   function manage_products(){
   	$data = array();
   	$data['table'] = $this->app->model->products_model->get_products();
    return $this->view->load('products/manage_products',$data);
   }

   function add(){
    $data = array();
    $data['images'] = $this->app->plugin->fileio->get_select_options('product_images');
    $data['brands'] = $this->app->model->brand_model->get_brands();
    $data['tags'] = $this->app->model->tag_model->get_tags();
    $data['categories'] = $this->app->model->category_model->get_parent_categories();

    $data['dial_types'] = $this->app->model->filter_groups_model->get_by_parent_id('1');
    $data['strap_types'] = $this->app->model->filter_groups_model->get_by_parent_id('2');
    $data['dial_colors'] = $this->app->model->filter_groups_model->get_by_parent_id('3');
    $data['strap_colors'] = $this->app->model->filter_groups_model->get_by_parent_id('4');

    return $this->view->load('products/add',$data);
   }

   function create(){
    //$this->app->model->tag_model->check_code($_REQUEST['code']);


   	$this->app->model->products_model->create($_REQUEST);
   	$this->app->lib->message->message = 'Product added ... ';
   }

   function delete($id){
     $this->app->model->products_model->delete($id);
     $this->app->lib->message->message = 'Product removed ... ';
   }

   function edit($id=''){
   	$data = array();
   	$data['table'] = $this->app->model->products_model->get_product($id);
    $data['tags'] = $this->app->model->tag_model->get_tags();
    $data['images'] = $this->app->plugin->fileio->get_select_options('product_images');
    $data['brands'] = $this->app->model->brand_model->get_brands();
    $data['categories'] = $this->app->model->category_model->get_parent_categories();

    $data['dial_types'] = $this->app->model->filter_groups_model->get_by_parent_id('1');
    $data['strap_types'] = $this->app->model->filter_groups_model->get_by_parent_id('2');
    $data['dial_colors'] = $this->app->model->filter_groups_model->get_by_parent_id('3');
    $data['strap_colors'] = $this->app->model->filter_groups_model->get_by_parent_id('4');

   	return $this->view->load('products/edit',$data);
   }

   function update($id=''){
    $this->app->model->products_model->update($id,$_REQUEST);
    $this->app->lib->message->message = 'Product updated ... ';
   }

 }
?>