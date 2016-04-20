<style type="text/css">
	.member-signin input{
		margin-bottom: 3px;
	}
</style>
<form method="post" class="member-signin">
<div class="col-xs-12 col-md-4 col-md-offset-4" style="margin-top: 16px;padding: 10px;border: 1px solid #ccc;">
 
  <?php 
  if (!empty($message)){
  ?>
  <div class="alert alert-danger">
  	<?php echo $message; ?>
  </div>
  <?php 
   }
  ?>

  <?php
    if ($reason_message != 'null'){
  ?>
  <div class="alert alert-warning">
    <?php echo $reason_message; ?>
  </div>
  <?php 
    } 
     //echo $reason_message;
     //echo $test_tmp;
  ?>

 <h2 align="center">Member Signin</h2>
 <div class="col-xs-12">
 	<input class="form-control" placeholder="Email" name="email" />
 </div>
 <div class="col-xs-12">
 	<input class="form-control" placeholder="Password" name="password" type="password" />
 </div>

 <div class="col-xs-12" style="margin-top: 4px;">
 	<button class="btn btn-primary">Signin</button>
 	<input name="cmd" value="home-signin_action" type="hidden" />
 	<a href="<?php echo BASE_URL; ?>home/passrecover">Forgot password?</a>&nbsp;/&nbsp;
  <a href="<?php echo BASE_URL; ?>home/signup">Register if not a member</a>
 </div>

</div>
</form>