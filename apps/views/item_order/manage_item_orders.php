<style type="text/css">
	.media-box{
		margin-bottom: 33px;
	}
</style>
<section class="content">
	

<div class="panel panel-primary">
	<div class="panel-heading">
		<b>Manage Item Orders </b>
		<!--<a href="<?php echo BASE_URL; ?>admin/panel/products/add" class="pull-right" style="color:white;">Add Product</a> //-->
	</div>
	<div class="panel-body">
		<div class="col-xs-12">

		  <table class="table no-margin">
		  	<tr>
		  		<th>Transaction Date/Time</th>
		  		<th>Transaction Reference Number</th>
		  		<th>Approved Amount</th>
		  		<th>Qty</th>
		  		<th>Response Description</th>
		  		<th>Response Code</th>
		  		<th>Transaction Amount</th>
		  		<th>Customer Name</th>
		  		<th>Preferred Delivery</th>
		  		<th>Gateway Type</th>
		  		<!--<th>Payment Status</th> //-->
		  	</tr>
		  	<?php 
             foreach ($table as $k=>$v){
		  	?>
		  	<tr>
		  		<td><?php echo $v->date_created; ?></td>
		  		<td><?php echo $v->transaction_id; ?></td>
		  		<td><?php echo $v->grand_total; ?></td>
		  		<td><?php echo $v->total_qty; ?></td>
		  		<td><?php echo $v->payment_response; ?></td>
		  		<td>
		  		 <?php
		  		  if ($v->payment_status == 'pending'){
                    echo '---';
		  		  }else{
                    echo $v->payment_status; 
		  		  }
		  		   
		  		 ?>
		  		</td>
		  		<td><?php echo $v->grand_total; ?></td>
		  		<td><?php echo $v->full_name; ?></td>
		  		<td><?php echo $v->preferred_delivery; ?></td>
		  		<td><?php echo $v->gway_type; ?></td>
		  		<!--<td><?php //echo $v->payment_response; ?></td>//-->
        

		  		<td><a href="<?php echo BASE_URL; ?>admin/panel/item_order/preview/<?php echo $v->id; ?>" class="btn btn-sm btn-primary">Preview Order</a></td>
		  		<!--<td><a href="?cmd=products-delete-<?php echo $v->id; ?>" class="btn btn-sm btn-danger confirm">Remove</a></td> //-->
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