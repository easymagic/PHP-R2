<?php 
 class media_uploader extends controller{

  
   
     function select_files($dir){
     	$data = array();
     	$data['files'] = $this->app->plugin->fileio->scan_dir_for_files($dir);
     	$data['dir'] = $dir;
     	return $this->view->load('media_uploader/select_files',$data);
     }

     function upload_file($dir){
     	if ($this->app->plugin->fileio->upload_file('media',$dir)){
          $this->app->lib->message->message = 'File uploaded successfully ..';
     	}else{
          $this->app->lib->message->message = 'File upload failed!!!';
     	}
       
     }

     function remove_file($name,$dir){
      $this->app->plugin->fileio->remove_file($name,$dir);
      $this->app->lib->message->message = 'File removed ...';
     }

     function get_select_options($path){
      return $this->app->plugin->fileio->get_select_options($path);
     }


 }

?>