<style type="text/css">
	.media-box{
		margin-bottom: 33px;
	}

	#img-preview{
		width: 128px;
		height: 128px;
		margin-top: 6px;
	}
</style>
<section class="content">

<?php 
 //print_r($table);
 foreach ($table as $k=>$v){
?>	

<form method="post">
<div class="panel panel-primary">
	<div class="panel-heading">
		<b>Edit Company Profile</b>
	</div>
	<div class="panel-body">
		<div class="col-xs-12">
	
	  <div class="col-xs-12">
	  	<label>Company Name</label>
	  </div>		
	  <div class="col-xs-12">
	  	<input class="form-control" name="company_name" value="<?php echo $v->company_name; ?>" />
	  </div>

	  <div class="col-xs-12">
	  	<label>Company Address</label>
	  </div>		
	  <div class="col-xs-12">
	  	<input class="form-control" name="company_address" value="<?php echo $v->company_address; ?>" />
	  </div>


	  <div class="col-xs-12">
	  	<label>Company Phone</label>
	  </div>		
	  <div class="col-xs-12">
	  	<input class="form-control" name="company_phone" value="<?php echo $v->company_phone; ?>" />
	  </div>

	  <div class="col-xs-12">
	  	<label>Company E-mail</label>
	  </div>		
	  <div class="col-xs-12">
	  	<input class="form-control" name="company_email" value="<?php echo $v->company_email; ?>" />
	  </div>


	  <div class="col-xs-12">
	  	<label>Company Logo</label>
	  </div>		
			<div class="col-xs-12 img-group">
			  <select class="form-control" id="img-picker" name="company_logo">
			  	<?php 
                 foreach ($images as $k=>$v1){
                 	if ($v->image == $v1['value']){
                     $r = ' selected="selected" ';
                 	}else{
                     $r = '';
                 	}                 	
			  	?>
                  <option <?php echo $r; ?> value="<?php echo $v1['value']; ?>"><?php echo $v1['label']; ?></option>
			  	<?php 
                 }
			  	?>			  				  	
			  </select>

			  <div style="width: 128px;height: 128px;">
			    <div class="col-xs-12" id="img-preview"></div>
			  </div>


			</div>






		</div>
	</div>

	<div class="panel-footer clearfix">
		<div class="pull-right">
			<button class="btn btn-success" type="submit">Save</button>
			<input type="hidden" name="cmd" value="company_config-update" />
		</div>
	</div>
</div>
</form>

<?php
 }
?>

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
                        $obj.html('<img src="' + this.src + '" style="mmax-width:100%;max-height:100%;" />');
                      };
                      img_obj.src = "<?php echo BASE_URL; ?>/assets/" + $(this).val();

				});

				$(this).find('#img-picker').trigger('change');

				



			});
		});
	})(jQuery);
</script>