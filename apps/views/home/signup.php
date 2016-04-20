<style type="text/css">
	.member-signup input,.member-signup textarea{
		margin-bottom: 3px;
	}
</style>
<form method="post" class="member-signup">
<div class="col-xs-12 col-md-4 col-md-offset-4" style="margin-top: 16px;padding: 10px;border: 1px solid #ccc;">
  <?php 
  if ($error){
    $cls = 'danger';
  }else{
    $cls = 'success';
  }
  if (!empty($message)){
  ?>
  <div class="alert alert-<?php echo $cls; ?>">
  	<?php echo $message; ?>
  </div>
  <?php 
   }
  ?>

 <h2 align="center">Member Signup (Free)</h2>
 <div class="col-xs-12">
 	<input class="form-control" placeholder="First Name" name="first_name" required/>
 </div>

 <div class="col-xs-12">
 	<input class="form-control" placeholder="Last Name" name="last_name" required/>
 </div>

 <div class="col-xs-12">
 	<input class="form-control" placeholder="E-mail" name="email" type="email" required/>
 </div>

 <div class="col-xs-12">
 	<input class="form-control" placeholder="Phone Number" name="phone_number" required/>
 </div>

 <div class="col-xs-12">
  <textarea name="address" placeholder="Address 1" class="form-control" required></textarea>
 </div>

 <div class="col-xs-12">
  <textarea name="address2" placeholder="Address 2" class="form-control" required></textarea>
 </div>


  <div class="col-xs-12">
    <input name="city" placeholder="City" class="form-control" required/>
  </div>



 <div class="col-xs-12">
 	<input class="form-control" placeholder="Password" name="password" type="password" required/>
 </div>

 <div class="col-xs-12">
 	<input class="form-control" placeholder="Confirm Password" name="password2" type="password" required/>
 </div>


 <div class="col-xs-12" style="margin-top: 4px;">
 	<button class="btn btn-primary">Signup</button> 
 	<input name="cmd" value="home-signup_action" type="hidden" />
 </div>

</div>
</form>