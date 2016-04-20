<style type="text/css">
	.media-box{
		margin-bottom: 33px;
	}
</style>
<section class="content">
	
<form method="post" enctype="multipart/form-data">
<div class="panel panel-primary">
	<div class="panel-heading">
		<b>Select Media Files To Upload (<?php echo $dir; ?>)</b>
	</div>
	<div class="panel-body">
		<div class="col-xs-12">
			<input type="file" name="media"></input>
		</div>
	</div>
	<div class="panel-footer clearfix">
		<div class="pull-right">
			<button type="submit" class="btn btn-success">Upload</button>
			<input type="hidden" name="cmd" value="media_uploader-upload_file-<?php echo $dir; ?>"></input>
		</div>
	</div>
</div>
</form>


</section>


<section class="content">

<div class="col-xs-12">
  <div class="col-xs-12">
	<h2>Uploaded Media Files</h2>
  </div>	
</div>
<div class="col-xs-12">
	
	<?php 
      foreach ($files as $k=>$v){
	?>
	<div class="col-xs-12 col-md-4 media-box" style="height: 128px;">
	<span class="image-holder" data-src="<?php echo BASE_URL . $dir . '/' . $v; ?>">
	 <!--<img src="<?php echo BASE_URL . $dir . '/' . $v; ?>" style="max-width: 100%;max-height: 100%" />//-->
	  Loading ... 
	</span>
	  <?php echo $v; ?>&nbsp;/&nbsp;<b><a href="?cmd=media_uploader-remove_file-<?php echo base64_encode($v); ?>-<?php echo $dir; ?>">Remove</a></b>	
	  <div style="clear: both;">&nbsp;</div>
	</div>
	<?php 
     }
	?>

</div>

<script type="text/javascript">
	(function($){
		$(function(){

               $('.image-holder').each(function(){

                    var $obj = $(this);
                    var url = $(this).attr('data-src');
                    var img_obj = new Image();
                        img_obj.onload = function(){
                          $obj.html('<img src="' + this.src + '" style="max-width: 100%;max-height: 100%" />');
                        };
                        img_obj.src = url;

               });

		});
	})(jQuery);
</script>

	
</section>


<div style="clear: both;"></div>