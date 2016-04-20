<?php 
 class brand extends controller{
   
   function manage_brand(){
   	$data = array();
   	$data['table'] = $this->app->model->brand_model->get_brands();
    return $this->view->load('brand/manage_brand',$data);
   }

   function add(){
    return $this->view->load('brand/add');
   }

   function create(){
   	$this->app->model->brand_model->create($_REQUEST);
   	$this->app->lib->message->message = 'Brand added ... ';
   }

   function delete($id){
     $this->app->model->brand_model->delete($id);
     $this->app->lib->message->message = 'Brand removed ... ';
   }

   function edit($id=''){
   	$data = array();
   	$data['table'] = $this->app->model->brand_model->get_brand($id);
   	return $this->view->load('brand/edit',$data);
   }

   function update($id=''){
    $this->app->model->brand_model->update($id,$_REQUEST);
    $this->app->lib->message->message = 'Brand updated ... ';
   }

 }
?>