<form method="post" action="<?php echo BASE_URL; ?>home/login">
    
<div class="col-xs-12 col-md-5" style="padding-right: 0;">
    <input class="form-control" placeholder="Email" name="email" />
</div>    

<div class="col-xs-12 col-md-5" style="padding-right: 0;">
    <input class="form-control" placeholder="Password" name="password" type="password" />
</div>    


<div class="col-xs-12 col-md-2" style="padding-right: 0;">
    <button class="btn btn-default">Login&nbsp;
     <span class="glyphicon glyphicon-lock"></span>
    </button>
    <input type="hidden" name="cmd" value="home-login_action" />
</div>    

<div class="col-xs-12">
 <label style="font-weight: 100;margin: 0;"><input type="checkbox"  />&nbsp;Keep me signed in</label>&nbsp;/&nbsp;<a href="<?php echo BASE_URL ?>home/forgotpass">Forgot Password?</a>
</div>

</form>    
