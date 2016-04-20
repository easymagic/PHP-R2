<?php 
 class breadcrumb extends controller{


   function table(){
   	$data = array();

   	$data['table'] = $this->model->breadcrumb_model->table();

   	return $this->view->load('breadcrumb/table',$data);

   }


   function create(){
   	$data = array();
    $data['categories'] = $this->model->category_model->get_parent_categories();
    $data['all_categories'] = $this->model->category_model->get_categories();
   	return $this->view->load('breadcrumb/create',$data);
   }

   function create_action(){
   	//print_r($this->model->breadcrumb_model);
   	$this->model->breadcrumb_model->create($_REQUEST);
   }

   function update_action($id){
    $this->app->model->breadcrumb_model->update($id,$_REQUEST);
   }

   function delete_action($id){
     $this->app->model->breadcrumb_model->delete($id);
   }


   function update($id=''){
    $data = array();
    $data['breadcrumb'] = $this->model->breadcrumb_model->get_by_id($id);
    $data['breadcrumb_id'] = $id;
    $data['categories'] = $this->model->category_model->get_parent_categories();
    $data['all_categories'] = $this->model->category_model->get_categories();
    return $this->view->load('breadcrumb/update',$data);
   }


   function get_breadcrumbs($parent_id=''){ //parent_id is the category-id.
    $data = array();
    $data['bread_crumb'] = $this->model->breadcrumb_model->get_by_parent_id($parent_id);
   	return $this->view->load('breadcrumb/get_breadcrumbs',$data);
   }

 	
 }

?>