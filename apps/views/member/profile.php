<style type="text/css">
	form input, form textarea, form select{
		margin-bottom: 3px;
	}
</style>
<?php 
 foreach ($table as $k=>$v){
?>
<form method="post">
<div class="col-xs-12" style="padding: 0;">
 
  <div class="col-xs-12" style="padding: 0;">

   <div class="col-xs-12" style="padding: 0;">


  <?php 
  if (!empty($message)){
  ?>
  <div class="alert alert-info">
  	<?php echo $message; ?>
  </div>
  <?php 
   }
  ?>


   	<h2>Edit Profile</h2>
   </div>

    

	<div class="col-xs-12" style="padding: 0;">
		<input name="first_name" class="form-control"  value="<?php echo $v->first_name; ?>" />
	</div>


	<div class="col-xs-12" style="padding: 0;">
		<input name="last_name" class="form-control"  value="<?php echo $v->last_name; ?>" />
	</div>


	<div class="col-xs-12" style="padding: 0;">
		<input name="email" class="form-control"  value="<?php echo $v->email; ?>" />
	</div>


	<div class="col-xs-12" style="padding: 0;">
		<input name="phone_number" class="form-control"  value="<?php echo $v->phone_number; ?>" />
	</div>



  <div class="col-xs-12" style="padding: 0;">
    <textarea class="form-control" name="address" placeholder="Address 1"><?php echo $v->address; ?></textarea>
  </div>

  <div class="col-xs-12" style="padding: 0;">
    <textarea class="form-control" name="address2" placeholder="Address 2"><?php echo $v->address2; ?></textarea>
  </div>


  <div class="col-xs-12" style="padding: 0;">
    <input name="city" placeholder="City" class="form-control"  value="<?php echo $v->city; ?>" />
  </div>







    
    <div class="col-xs-12" style="padding: 0;">
    	<button class="btn btn-primary">Update Profile</button>
    	<input type="hidden" name="cmd" value="member-update_action" />
    </div>

    </div>

</div>
</form>
<?php 
 }
?>