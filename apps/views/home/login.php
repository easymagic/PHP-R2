<style type="text/css">
	
	form{
		margin-top: 5px;
	}

	form input{
		margin: 4px;
	}

</style>

<div class="col-xs-12">


 <div class="col-md-4 col-md-offset-4" style="margin-top:11px;border:1px solid #ccc;background-color: #fff;">
 	
    <?php echo $message; ?>

 	<div class="col-xs-12">
 	  <h3 style="margin-top: 5px;">Member Login</h3>
 	</div>

<form method="post" action="<?php echo BASE_URL; ?>home/login">
    
<div class="col-xs-12" style="padding: 0;">
    <input class="form-control" placeholder="Email" name="email" />
</div>    

<div class="col-xs-12" style="padding: 0;">
    <input class="form-control" placeholder="Password" name="password" type="password" />
</div>    


<div class="col-xs-12" style="padding: 0;padding-left: 2px;">
  
    <button class="btn btn-default">Login&nbsp;
     <span class="glyphicon glyphicon-lock"></span>
    </button>
    <input type="hidden" name="cmd" value="home-login_action" />
  
</div>    

<div class="col-xs-12">
 <label style="font-weight: 100;margin: 0;"><input type="checkbox"  />&nbsp;Keep me signed in</label>&nbsp;/&nbsp;
 <a href="<?php echo BASE_URL; ?>home/forgotpass" style="color: #000;">Forgot Password?</a>
 
</div>

</form>    



 </div>

	

</div>



