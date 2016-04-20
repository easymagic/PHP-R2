<style type="text/css">
	
	form{
		margin-top: 5px;
	}

	form input{
		margin: 4px;
	}

</style>

<div class="col-xs-12">


 <div class="col-md-4 col-md-offset-4" style="margin-top:5px;border:1px solid #ccc;padding-bottom: 8px;background-color: #fff;">
 	
<?php echo $message; ?>

 	<div class="col-xs-12">
 	  <h3 style="margin-top: 5px;">Password Recovery</h3>
 	</div>

<form method="post">
    
<div class="col-xs-12" style="padding-right: 0;">
    <input class="form-control" placeholder="Email" name="email" />
</div>    

<div class="col-xs-12" style="padding-right: 0;padding-left: 20px;">
  
    <button class="btn btn-default">Recover&nbsp;
     <span class="glyphicon glyphicon-lock"></span>
    </button>
    <input type="hidden" name="cmd" value="home-forgotpass_action" />
  
</div>    

</form>    



 </div>

	

</div>
