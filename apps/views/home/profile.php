<style type="text/css">
	form input{
		margin-bottom: 3px;
	}
</style>
<?php 
 foreach ($table as $k=>$v){
?>
<form method="post">
<div class="col-xs-12" style="padding: 0;">
 
  <div class="col-xs-12 col-md-4 col-md-offset-4" style="padding:0;">

   <div class="col-xs-12">
   	<h2>Edit Profile</h2>
   </div>

    

	<div class="col-xs-12">
		<input name="first_name" class="form-control"  value="<?php echo $v->first_name; ?>" />
	</div>


	<div class="col-xs-12">
		<input name="last_name" class="form-control"  value="<?php echo $v->last_name; ?>" />
	</div>


	<div class="col-xs-12">
		<input name="email" class="form-control"  value="<?php echo $v->email; ?>" />
	</div>


	<div class="col-xs-12">
		<input name="phone_number" class="form-control"  value="<?php echo $v->phone_number; ?>" />
	</div>

    
    <div class="col-xs-12">
    	<button class="btn btn-primary">Save</button>
    </div>

    </div>

</div>
</form>
<?php 
 }
?>