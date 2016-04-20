<style type="text/css">
	.media-box{
		margin-bottom: 33px;
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
		<b>Edit Brand</b>
		<a href="<?php echo BASE_URL; ?>admin/panel/brand/manage_brand" class="pull-right" style="color:white;">Back</a>
	</div>
	<div class="panel-body">
		<div class="col-xs-12">
			
			<div class="col-xs-12">
				<label>Brand Name</label>
			</div>
			<div class="col-xs-12">
				<input class="form-control" name="brand_name" value="<?php echo $v->brand_name; ?>" />
			</div>

		</div>
	</div>

	<div class="panel-footer clearfix">
		<div class="pull-right">
			<button class="btn btn-success" type="submit">Save</button>
			<input type="hidden" name="cmd" value="brand-update-<?php echo $v->id; ?>" />
		</div>
	</div>
</div>
</form>

<?php
 }
?>

</section>




<div style="clear: both;"></div>