<?php 
 class model extends container{
   
   //protected $view = null;
   protected $db = null;
   private $current_model = '';
   private $table_name = '';

   function __construct(&$app){
    parent::__construct($app);
    $this->db = $this->app->lib->db;
    $this->current_model = get_called_class();
    $table = explode('_', $this->current_model);
    $this->table_name = $table[0];
    //echo $this->current_model;
    //$this->model = $this->app->model;
   }   


   
   //decorators

   private function has_permission($permission){

   	 if (!isset($_SESSION['permissions'])){
        $_SESSION['permissions'] = array();
   	 }
     
     $permissions = $_SESSION['permissions']; 
     $seed_check = $this->current_model . '_' . $permission;

     $admin_overall = '*_permission'; //this checks for overall admin access.

     if (isset($permissions[$admin_overall])){
       return true;
     }else{
       return (isset($permissions[$seed_check]));
     }
     

   }

   private function get_error_msg_template($perm=''){
     return "You do not have the permission '<b>$perm</b>' over this model &nbsp;(<b><i>'{$this->current_model}'</i></b>)!";
   }

   function query($sql=''){
     if ($this->has_permission('query')){
       return $this->db->query($sql)->result_object();
     }else{
     	$this->app->lib->message->error_message = $this->get_error_msg_template('query'); // "You do not have the permission '<b>query</b>'' over this model!";
     	return array();
     }
   }

   function get_where($crit=array(),$row=false){
     if ($this->has_permission('get_where')){
       if ($row){
         return $this->db->get_where($this->table_name,$crit)->row_object();
       }else{
         return $this->db->get_where($this->table_name,$crit)->result_object();
       }
     }else{
     	$this->app->lib->message->error_message = $this->get_error_msg_template('get_where'); //  "You do not have the permission to <b>get_where</b>' over this model!";
     	return array();
     }
   }

   function where($crit=array()){
     $this->db->where($crit);
   }

   function get(){
     if ($this->has_permission('get_where')){
       return $this->db->get($this->table_name)->result_object();
     }else{
     	$this->app->lib->message->error_message = $this->get_error_msg_template('get_where'); //  "You do not have the permission to <b>get_where</b> this model!";
     	return array();
     }
   }

   function create($post=array()){
     if ($this->has_permission('create')){
       return $this->db->insert($this->table_name,$post);
     }else{
     	$this->app->lib->message->error_message = $this->get_error_msg_template('create'); // "You do not have the permission to <b>create</b> this model!";
     	return -1;
     }
   }

   function delete(){
     if ($this->has_permission('delete')){
       $this->db->delete($this->table_name);
     }else{
     	$this->app->lib->message->error_message = $this->get_error_msg_template('delete'); // "You do not have the permission to <b>delete</b> this model!";
     }
   } 


   function update($post=array()){
     if ($this->has_permission('update')){
        $this->db->update($this->table_name,$post);
     }else{
     	$this->app->lib->message->error_message = $this->get_error_msg_template('update'); // "You do not have the permission to <b>delete</b> this model!";
     }
   } 


 }
?>
