<style type="text/css">
	form input{
		margin-bottom: 3px;
	}
</style>

<form method="post">
<div class="col-xs-12">
 
  <div class="col-xs-12">

   <div class="col-xs-12">


  <?php 
  if (!empty($message)){
  ?>
  <div class="alert alert-info">
  	<?php echo $message; ?>
  </div>
  <?php 
   }
  ?>


   	<h2>Change Password</h2>
   </div>

    

	<div class="col-xs-12">
		<input name="password" class="form-control"  placeholder="New Password" type="password"/>
	</div>

	<div class="col-xs-12">
		<input name="password2" class="form-control" type="password" placeholder="Confirm Password" />
	</div>

    
    <div class="col-xs-12">
    	<button class="btn btn-primary">Change Password</button>
    	<input type="hidden" name="cmd" value="member-change_password_action" />
    </div>

    </div>

</div>
</form>
