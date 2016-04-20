<?php 
 class tag extends controller{
   
   function manage_tags(){
   	$data = array();
   	$data['table'] = $this->app->model->tag_model->get_tags();
    return $this->view->load('tag/manage_tags',$data);
   }

   function add(){
    return $this->view->load('tag/add');
   }

   function create(){
    $this->app->model->tag_model->check_code($_REQUEST['code']);
   	$this->app->model->tag_model->create($_REQUEST);
   	$this->app->lib->message->message = 'Tag added ... ';
   }

   function delete($id){
     $this->app->model->tag_model->delete($id);
     $this->app->lib->message->message = 'Tag removed ... ';
   }

   function edit($code=''){
   	$data = array();
   	$data['table'] = $this->app->model->tag_model->get_tag($code);
   	return $this->view->load('tag/edit',$data);
   }

   function update($id=''){
    $this->app->model->tag_model->update($id,$_REQUEST);
    $this->app->lib->message->message = 'Tag updated ... ';
   }

 }
?>