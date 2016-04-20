<?php 
 class home_page_slider extends controller{

   function add(){
   	$data =  array();
   	$data['images'] = $this->app->plugin->fileio->get_select_options('home_slider_image');
    return $this->view->load('home_page_slider/add',$data);
   }

   function create(){
    //$this->app->model->tag_model->check_code($_REQUEST['code']);
   	$this->app->model->home_page_slider_model->create($_REQUEST);
   	$this->app->message->message = 'New slider created added ... ';
   }

   function delete($id){
     $this->app->model->home_page_slider_model->delete($id);
     $this->app->message->message = 'Slider removed ... ';
   }

   function edit($id=''){
   	$data = array();
   	$data['table'] = $this->app->model->home_page_slider_model->get_home_page_slider($id);
    $data['images'] = $this->app->plugin->fileio->get_select_options('home_slider_image');   	
   	return $this->view->load('home_page_slider/edit',$data);
   }

   function update($id=''){
    $this->app->model->home_page_slider_model->update($id,$_REQUEST);
    $this->app->message->message = 'Slider updated ... ';
   }

   function manage_home_page_sliders(){
   	$data = array();
   	$data['table'] = $this->app->model->home_page_slider_model->get_home_page_sliders();
   	return $this->view->load('home_page_slider/manage_home_page_sliders',$data);
   }

 	
 }

?>