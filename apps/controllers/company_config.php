<?php 
 class company_config extends controller{
 

  const ID = '1';

   
   function edit(){
    $id = self::ID;
    $data = array();
    $data['table'] = $this->app->model->company_config_model->get_rec();
    $data['images'] = $this->app->plugin->fileio->get_select_options('assets');

    return $this->view->load('company_config/edit',$data);
   } 

   function update(){
    $this->app->model->company_config_model->update(self::ID,$_REQUEST);
    $this->app->lib->message->message = 'Profile updated...';
   }
  

 }
?>