<div class="col-xs-12 col-md-8 col-md-offset-2" style="margin-top: 11px;">
	
 <?php 
  if ($error){
   $cls = 'danger';
  }else{
   $cls = 'success';
  }
 ?>
  
  <?php
    if (!empty($message)){
?>
 <div class="alert alert-<?php echo $cls; ?>"><?php echo $message; ?></div>
<?php 
    }
  ?> 

</div>


<div style="clear: both;">&nbsp</div>



