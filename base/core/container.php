<?php
 class container{
  

   protected $app = null;

   private $data = array();

   function __construct(&$app){
    $this->app =& $app;
   }   

   function __set($k,$v){
    if (!isset($this->data[$k])){
     $this->data[$k] = $v;
    }
   }

   function __get($k){
    if (isset($this->data[$k])){
     return $this->data[$k];
    }else{
     return 'null';
    }
   }

   function all(){
    return $this->data;
   }



 

 }

?>