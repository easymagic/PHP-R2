<style type="text/css">
	.media-box{
		margin-bottom: 33px;
	}
</style>
<section class="content">
	

<div class="panel panel-primary">
	<div class="panel-heading">
		<b>Manage Products </b>
		<a href="<?php echo BASE_URL; ?>admin/panel/products/add" class="pull-right" style="color:white;">Add Product</a>
	</div>
	<div class="panel-body">
		<div class="col-xs-12">

		  <table class="table no-margin">
		  	<tr>
		  		<th>ID</th>
		  		<th>Product Name</th>
		  		<th>Product Price</th>
		  		<th>Discount Price</th>
		  		<th>Product Qty</th>
		  		<th>Viewed</th>
		  		<th>Last Modified</th>
		  	</tr>
		  	<?php 
             foreach ($table as $k=>$v){
		  	?>
		  	<tr>
		  		<td><?php echo $v->id; ?></td>
		  		<td><?php echo $v->product_name; ?></td>
		  		<td><?php echo $v->product_price; ?></td>
		  		<td><?php echo $v->discount_price; ?></td>
		  		<td><?php echo $v->product_quantity; ?></td>
		  		<td><?php echo $v->viewed; ?></td>
		  		<td><?php echo $v->last_modified; ?></td>
		  		<td><a href="<?php echo BASE_URL; ?>admin/panel/products/edit/<?php echo $v->id; ?>" class="btn btn-sm btn-primary">Edit</a></td>
		  		<td><a href="?cmd=products-delete-<?php echo $v->id; ?>" class="btn btn-sm btn-danger confirm">Remove</a></td>
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