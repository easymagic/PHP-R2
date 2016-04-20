   <?php 
    if (!empty($message)){
    	if ($error){
          $cls = 'danger';
    	}else{
          $cls = 'success';
    	}
   ?>
    <div class="col-xs-12" style="margin-top: 8px;" id="data-message">
    	<div class="alert alert-<?php echo $cls; ?>"><?php echo $message; ?></div>
    </div>
   <?php 
     }
   ?>

   <script type="text/javascript">
     (function($){
      $(function(){
        setTimeout(function(){
          $('#data-message').slideUp();
        },5000);
      });
     })(jQuery);
   </script>
