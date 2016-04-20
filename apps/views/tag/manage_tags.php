<style type="text/css">
	.media-box{
		margin-bottom: 33px;
	}
</style>
<section class="content">
	

<div class="panel panel-primary">
	<div class="panel-heading">
		<b>Manage Tag </b>
		<a href="<?php echo BASE_URL; ?>admin/panel/tag/add" class="pull-right" style="color:white;">Add Tag</a>
	</div>
	<div class="panel-body">
		<div class="col-xs-12">

		  <table class="table">
		  	<tr>
		  		<th>ID</th>
		  		<th>Tag Name</th>
		  		<th>Code</th>
		  		<th>Sort Order (Alphabetic)</th>
		  	</tr>
		  	<?php 
             foreach ($table as $k=>$v){
		  	?>
		  	<tr>
		  		<td><?php echo $v->id; ?></td>
		  		<td><?php echo $v->name; ?></td>
		  		<td><?php echo $v->code; ?></td>
		  		<td><?php echo $v->sort_order; ?></td>
		  		<td><a href="<?php echo BASE_URL; ?>admin/panel/tag/edit/<?php echo $v->code; ?>" class="btn btn-sm btn-primary">Edit</a></td>
		  		<td><a href="?cmd=tag-delete-<?php echo $v->id; ?>" class="btn btn-sm btn-danger confirm">Remove</a></td>
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