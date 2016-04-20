<?php 
 class category_banner extends controller{
  


   function add(){
    $data = array();
    return $this->view->load('category_banner/add',$data);
   }

   function edit(){
    $data = array();
    return $this->view->load('category_banner/edit',$data);
   }
   
   function add_action(){
    $post = $_REQUEST;
    $this->model->category_banner_model->create($post);
   }

   function edit_action($id){
    $post = $_REQUEST;
    $this->model->category_banner_model->edit($id,$post);
   }

   function remove_action($id){
    $this->model->category_banner_model->remove($id);
   }

   function manage(){
   	$data = array();
   	$data['category_banners'] = $this->model->category_banner_model->get_all();
   	return $this->view->load('category_banner/manage',$data);
   }




 }
?>