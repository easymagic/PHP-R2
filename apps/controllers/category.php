<?php 
 //enctype="multipart/form-data"
 class category extends controller{
   
   function manage_category($parent_id=0){
   	$data = array();
    $data['parent_id'] = $parent_id;
   	$data['table'] = $this->app->model->category_model->get_grouped_categories($parent_id);
    return $this->view->load('category/manage_category',$data);
   }

   function add($parent_id='0'){
    $data = array();
    $data['category_select'] = $this->dropdown();
    $data['parent_id'] = $parent_id * 1;
    return $this->view->load('category/add',$data);
   }

   function create(){
   	$this->app->model->category_model->create($_REQUEST);
   	$this->app->lib->message->message = 'Category added ... ';
   }

   function delete($id){
     $this->app->model->category_model->delete($id);
     $this->app->lib->message->message = 'Category removed ... ';
   }

   function edit($id=''){
   	$data = array();
   	$data['table'] = $this->app->model->category_model->get_category($id);
    $data['manage_sub_category'] = $this->controller->category->manage_category($id);
   	return $this->view->load('category/edit',$data);
   }

   function update($id=''){
    $this->app->model->category_model->update($id,$_REQUEST);
    $this->app->lib->message->message = 'Category updated ... ';
   }

   function dropdown(){
    $data = array();
    $data['dropdown'] = $this->app->model->category_model->get_all();
    return $this->view->load('category/dropdown',$data);
   }

   function ajax_dropdown($parent_id=''){
     $data = array();
     $data['categories'] = $this->app->model->category_model->get_child_categories($parent_id);

     return $this->view->load('category/ajax_dropdown',$data);
   }


   function demo_url(){
     $this->app->plugin->httprequest->url = 'http://goole.com'; // 'http://goole.com';
     $this->app->plugin->httprequest->set_data(array("debug"=>"on"));
     return $this->app->plugin->httprequest->post();
   }

   function recieve_payload(){
    $r = file_get_contents('php://input');
    $r = json_encode($r);
    //print_r($r);
    return $r;

   }

   function demo_payload(){
     $this->app->plugin->httprequest->enable_payload();
     $this->app->plugin->httprequest->url = 'http://www.vanbedng.com/category/recieve_payload'; // 'http://goole.com';
     $this->app->plugin->httprequest->set_data(array("debug"=>"on","fname"=>"AKL"));
     return $this->app->plugin->httprequest->post();    
   }


   function show_breadcrumb_parent_categories(){
    $data = array();
    $data['parent_categories'] = $this->app->model->category_model->get_parent_categories();
    $data['category_controller'] = $this;
    return $this->view->load('category/show_breadcrumb_parent_categories',$data);
   }

   function show_breadcrumb_child_categories($parent_id=''){
     $data = array();
     $data['child_categories'] = $this->app->model->category_model->get_child_categories($parent_id);
     return $this->view->load('category/show_breadcrumb_child_categories',$data);
   }


   function get_nav(){
    $data = array();
    $data['nav'] = $this->app->model->category_model->get_grouped_categories($parent_id='0');
    return $this->view->load('category/get_nav',$data);
   }

 }
?>