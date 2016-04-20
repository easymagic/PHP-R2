 <body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">
<?php 
 echo $header;
 echo $left;
?>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">


<?php 
 if (isset($message) && !empty($message)){
?>

<div class="col-xs-12" style="margin-top: 4px;">
 <div class="alert alert-info" style="margin-bottom: 0;" id="upload-status">
 	<?php echo $message; ?>
 </div>
</div>
<div style="clear: both;"></div>
 <script type="text/javascript">
 	(function($){
 		$(function(){
 			//$()
 			setTimeout(function(){
 				$('#upload-status').slideUp();
 			},5000);
 		});
 	})(jQuery);
 </script>
<?php  
 }
?>





        <?php 
          echo $content;
        ?>
      </div><!-- /.content-wrapper -->


<div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->
<?php 
 echo $footer;
?>

    <!-- REQUIRED JS SCRIPTS -->

    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo BASE_URL; ?>bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo BASE_URL; ?>dist/js/app.min.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
<script type="text/javascript">
	(function($){
		$(function(){
			$('.confirm').each(function(){
				$(this).on('click',function(){
					return confirm("Do you want to perform this action?");
				});
			});
	
	      $('button[data-cmd]').each(function(){ //other params include data-label, data-success, data-waiting & data-cmd
            $(this).on('click',function(){
                
                var url = '<?php echo BASE_URL; ?>?cmd=' +  $(this).attr('data-cmd');  
                var data = $('form').serialize();
                var label = $(this).attr('data-label');
                var waiting = $(this).attr('data-waiting');
                var success_ = $(this).attr('data-success');

                var $obj = $(this);

                $obj.html(waiting);

                $obj.attr('disabled');

                $.ajax({
                	url:url,
                	type:'post',
                	data:data,
                	success:function(dt){
                		$obj.html(success_);
                        $obj.removeAttr('disabled');

                        setTimeout(function(){
                        	$obj.html(label);
                        },5000);

                	}
                });
            
            	return false;
            });
	      });


		});
	})(jQuery);
</script>
</body>


