<?php 
 $gender = array('M'=>"Male",'F'=>"Female");
 foreach ($profile as $k=>$v){
?>

<ul class="list-group">
	<li class="list-group-item">
	 <?php 
      if (!empty($v->profile_picture)){
	 ?>
	  <img src="<?php echo BASE_URL; ?>profile_pictures/<?php echo $v->profile_picture;  ?>" style="max-width: 100%;max-height: 100%;" />
	<?php 
     }else{
    ?>
     <span class="glyphicon glyphicon-user" style="font-size: 120px;padding-left: 40px;color: #aaa;"></span>
    <?php  	
     }
	?>
	</li>

	<li class="list-group-item">
	  <b><?php echo $v->first_name;  ?> , <?php echo $v->last_name;  ?></b>
	</li>
    
	<?php 
     if ($is_logged && $v->id !== $request_id && !$is_friend){//also ensure that you are not making a connection request to yourself.
	?>
	<li class="list-group-item">
	  <form method="post">
	    <div class="col-xs-12" style="padding:0"><?php echo $message; ?></div>
	  	 <input type="text" name="request_message" class="form-control" placeholder="Type in a messsage ..." />
	  	 <button class="btn btn-primary form-control">
	  	  <span class="glyphicon glyphicon-flash"></span>
	  	  Make Connection
	  	 </button>
	  	 <input type="hidden" name="cmd" value="friends-make_connection_action-<?php echo $v->id; ?>" /> 
	  </form>
	</li>
	<?php 
     }else if (!$is_logged){
	?>
    
    <li class="list-group-item" align="center">
    	<a href="<?php echo BASE_URL; ?>home/login" class="btn btn-info">
    	 <span class="glyphicon glyphicon-alert"></span>
    	  Please login to <i>Connect</i>
    	</a>
    </li>

	<?php 
     }
	?>
	


</ul>


<?php 
 //print_r($profile);
?>
<?php 
 }
?>