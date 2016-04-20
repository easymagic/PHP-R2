<?php 
 class model extends container{
   
   //protected $view = null;
   protected $db = null;

   function __construct(&$app){
    parent::__construct($app);
    $this->db = $this->app->lib->db;
    //$this->model = $this->app->model;
   }    


 }
?>