<style type="text/css">
	.media-box{
		margin-bottom: 33px;
	}
</style>
<section class="content">
	

<form method="post">
<div class="panel panel-primary">
	<div class="panel-heading">
		<b>Create Home Page Slide</b>
		<a href="<?php echo BASE_URL; ?>admin/panel/home_page_slider/manage_home_page_sliders" class="pull-right" style="color:white;">Back</a>
	</div>
	<div class="panel-body">
		<div class="col-xs-12">
			
			<div class="col-xs-12">
				<label>Caption</label>
			</div>
			<div class="col-xs-12">
				<input class="form-control" name="caption" value="<?php echo $v->caption; ?>" />
			</div>


			<div class="col-xs-12">
				<label>Select Image</label>
			</div>

			<div class="col-xs-12 img-group">
			  <select class="form-control" id="img-picker" name="image">
			  	<?php 
                 foreach ($images as $k1=>$v1){
			  	?>
                  <option  value="<?php echo $v1['value']; ?>"><?php echo $v1['label']; ?></option>
			  	<?php 
                 }
			  	?>
			  </select>
			  <div style="width: 512px;">
			    <div class="col-xs-12" id="img-preview"></div>
			  </div>
			</div>





		</div>
	</div>

	<div class="panel-footer clearfix">
		<div class="pull-right">
			<button class="btn btn-success" type="submit">Create</button>
			<input type="hidden" name="cmd" value="home_page_slider-create" />
		</div>
	</div>
</div>
</form>



</section>


<div style="clear: both;"></div>
<script type="text/javascript">
	(function($){
		$(function(){
			$('.img-group').each(function(){

				var $obj = $(this).find('#img-preview');

				$(this).find('#img-picker').on('change',function(){
				  $obj.html('loading ... ');	
                  var img_obj = new Image();
                      img_obj.onload = function(){
                        $obj.html('<img src="' + this.src + '" style="max-width:100%;max-height:100%;" />');
                      };
                      img_obj.src = "<?php echo BASE_URL; ?>/home_slider_image/" + $(this).val();

				});

				$(this).find('#img-picker').trigger('change');

				



			});
		});
	})(jQuery);
</script>