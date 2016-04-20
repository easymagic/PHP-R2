<style type="text/css">
	.member-pass-recover input{
		margin-bottom: 3px;
	}
</style>
<form method="post" class="member-pass-recover">
<div class="col-xs-12 col-md-4 col-md-offset-4" style="margin-top: 16px;padding: 10px;border: 1px solid #ccc;">
 

  <?php 
  if (!empty($message)){
  ?>
  <div class="alert alert-info">
  	<?php echo $message; ?>
  </div>
  <?php 
   }
  ?>


 <h2 align="center">Recover Password</h2>
 <div class="col-xs-12">
 	<input class="form-control" placeholder="Email" name="email" type="email" required />
 </div>

 <div class="col-xs-12" style="margin-top: 4px;">
 	<button class="btn btn-primary">Recover</button>
 	<input type="hidden" name="cmd" value="home-passrecover_action" />
 </div>

</div>
</form>