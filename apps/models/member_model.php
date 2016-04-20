<?php 
 class member_model extends model{


 	function create($post){
     $email = $post['email'];
     $this->check_email_existence($email);
     $this->check_password($post['password'],$post['password2']);
     $this->db->insert('member',$post);
     $this->app->lib->message->message = 'Your account has been successfuly created ...';
     $password = $post['password'];
     $this->login($email,$password);
 	}

 	function update($member_id,$post){
     $this->db->where(array("id"=>$member_id));
     $this->db->update('member',$post);
     $this->app->lib->message->message = 'Account updated.';
 	}

 	function change_password($member_id,$old_password,$new_password){
     $this->db->where(array("id"=>$member_id));
     //$this->db->update('member',$post);
     //$this->app->message->message = 'Account updated.';
     $post = array();
     $post['password'] = $new_password;
     if (strlen($old_password) >= 4 && $old_password == $new_password){
       $this->db->update('member',$post);
       $this->app->lib->message->message = 'Password changed.';
     }else{
     	throw new Exception("Passwords do not match! (<b>Should be at least 4 characters</b>)");
     }
 	}

 	function check_password($password1,$password2){
     if (strlen($password1) >= 4 && $password1 == $password2){
       //$this->db->update('member',$post);
       //$this->app->message->message = 'Password changed.';
     }else{
     	throw new Exception("Passwords do not match! (<b>Should be at least 4 characters</b>)");
     }     
 	}

 	function recover_password($email){
     $query = $this->db->get_where('member',array("email"=>$email));
     if ($this->db->num_rows($query) > 0){
       $record = $this->db->result_object();
       $record = $record[0]; 	
       $password = $record->password;
       //send mail here...
     }

 	}

 	private function check_email($email){
     
 	}

 	private function check_email_existence($email){
     $query = $this->db->get_where('member',array("email"=>$email));
     if ($this->db->num_rows($query)){
        throw new Exception("An account with this email already exists!");
     }
 	}

 	private function check_member_id(){
 
 	}

 	function login($email,$password){
     $query = $this->db->get_where('member',array("email"=>$email,"password"=>$password));
     if ($this->db->num_rows($query)){
       $record = $this->db->result($query);   
       $record = $record[0];
       $this->app->lib->auth->syncIn($record);
       $this->app->lib->message->message = 'Access granted...';


       //$this->app->message->login_ok = 'ok';
       //print_r($record);
     }else{
     	throw new Exception("Please use your right login credentials!");
     }

 	}


    function recoverpass($email){
     $query = $this->db->get_where('member',array("email"=>$email));
     if ($this->db->num_rows($query)){
       $record = $this->db->result_object($query);
       $record = $record[0];

       //send the mail to the user containing the forgotten password.
       $this->app->lib->vmail->to = $record->email;
       $this->app->lib->vmail->subject = 'PASSWORD RECOVERY';
       $this->app->lib->vmail->msg = '
        Dear <b>' . $record->first_name . '</b>,<br />
        Your lost password is: <b>' . $record->password . '</b>.<br />
        Please endeavour to change your password if compromised.<br />
        Thank You for choosing vanbedng.com
       ';
       //echo $this->app->lib->vmail->to;
       $this->app->lib->vmail->from = 'info@vanbedng.com';
       $this->app->lib->vmail->send();

       $this->app->lib->message->message = 'Your password has been sent to your mail.';




     }else{
     	throw new Exception("This email is not registerred on our platform!");
     }
    }

    function get_single($id){
     $query = $this->db->get_where('member',array("id"=>$id));
     return $this->db->result_object($query);
    }

    function logout(){
      $this->app->lib->auth->kill();
    }




    function get_item_order($member_id){
      $query = $this->db->get_where('item_order',array("member_id"=>$member_id));

      return $this->db->result_object($query);
    }


    function get_members(){
    	$query = $this->db->get('member');
    	return $this->db->result_object($query);
    }



 }
?>