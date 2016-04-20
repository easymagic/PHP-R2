<?php 
 class admin_model extends model{


     function login($email='',$password=''){
      $sql = "select * from admin where (email='$email' and password='$password')";
      $query = $this->db->query($sql);
      
      if ($this->db->num_rows($query) == 1){
       $this->app->lib->auth->syncIn($this->db->result($query));  
       return true;
      }else{
       return false;	
      }
      
     }

     function logout(){
      $this->app->lib->auth->kill();
      return 'Just logged out!';
     }


 }
?>