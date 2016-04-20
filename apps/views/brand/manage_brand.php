<style type="text/css">
	.media-box{
		margin-bottom: 33px;
	}
</style>
<section class="content">
	

<div class="panel panel-primary">
	<div class="panel-heading">
		<b>Manage Brand </b>
		<a href="<?php echo BASE_URL; ?>admin/panel/brand/add" class="pull-right" style="color:white;">Add Brand</a>
	</div>
	<div class="panel-body">
		<div class="col-xs-12">

		  <table class="table">
		  	<tr>
		  		<th>ID</th>
		  		<th>Brand Name</th>
		  	</tr>
		  	<?php 
             foreach ($table as $k=>$v){
		  	?>
		  	<tr>
		  		<td><?php echo $v->id; ?></td>
		  		<td><?php echo $v->brand_name; ?></td>
		  		<td><a href="<?php echo BASE_URL; ?>admin/panel/brand/edit/<?php echo $v->id; ?>" class="btn btn-sm btn-primary">Edit</a></td>
		  		<td><a href="?cmd=brand-delete-<?php echo $v->id; ?>" class="btn btn-sm btn-danger confirm">Remove</a></td>
		  	</tr>   
		  	<?php 
             }
		  	?>
		  </table>
			



		</div>
	</div>
</div>



</section>




<div style="clear: both;"></div>