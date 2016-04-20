<?php 
 //print_r($request_array);
 foreach ($request_array as $k=>$v){
?>
	<form method="post">

  <?php echo $message; ?>
	
	<div class="col-xs-12">
	 <h4 style="margin-bottom: 0;margin-top: 4px;">Change Password</h4>	
	</div>
	 


		<div class="col-xs-12">
			<input class="form-control" name="new_password" placeholder="Password" type="password"  value="<?php echo $v->new_password; ?>"/>
		</div>


		<div class="col-xs-12">
			<input class="form-control" name="confirm_password" placeholder="Confirm Password" type="password"  value="<?php echo $v->confirm_password; ?>"/>
		</div>



		<div class="col-xs-12">
			<button class="btn btn-default login-button">Change Password&nbsp;
                <span class="glyphicon glyphicon-user"></span>
			</button>
			<input type="hidden" name="cmd" value="member-change_pass_action" />
		</div>

	</form>
<?php 
 }
?>