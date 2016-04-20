<?php 
 //print_r($request_array);
 foreach ($request_array as $k=>$v){
?>
	<form method="post" action="<?php echo BASE_URL; ?>home/register">

<?php echo $message; ?>
	
	<div class="col-xs-12">
	 <h2 style="margin-bottom: 0;margin-top: 4px;">Member Signup</h2>	
	 <p style="color: #fff;">0% Fee attached ...</p>
	</div>
	 
		<div class="col-xs-12">
			<input class="form-control" name="first_name" placeholder="First Name" value="<?php echo $v->first_name; ?>" />
		</div>
		<div class="col-xs-12">
			<input class="form-control" name="last_name" placeholder="Last Name"  value="<?php echo $v->last_name; ?>"/>
		</div>

		<div class="col-xs-12">
			<input class="form-control" name="email" placeholder="E-mail"  value="<?php echo $v->email; ?>"/>
		</div>


		<div class="col-xs-12">
			<input class="form-control" name="phone_number" placeholder="Phone Number"  value="<?php echo $v->phone_number; ?>"/>
		</div>


		<div class="col-xs-12">
			<input class="form-control" name="password" placeholder="Password" type="password"  value="<?php echo $v->password; ?>"/>
		</div>


		<div class="col-xs-12">
			<input class="form-control" name="password2" placeholder="Confirm Password" type="password"  value="<?php echo $v->password2; ?>"/>
		</div>


		<div class="col-xs-12">
			<select name="day_of_birth" placeholder="Day Of Birth"><?php echo $days; ?></select>
			<select name="month_of_birth"><?php echo $months; ?></select>
			<select name="year_of_birth"><?php echo $years; ?></select>
			&nbsp;<span style="color:#000;">(Date Of Birth)</span>
		</div>


		<div class="col-xs-12">
			<select name="gender"><?php echo $gender; ?></select>
		</div>

		<div class="col-xs-12">
			<button class="btn btn-default login-button">Sign Up&nbsp;
                <span class="glyphicon glyphicon-user"></span>
			</button>
			<input type="hidden" name="cmd" value="home-register_action" />
		</div>

	</form>
<?php 
 }
?>