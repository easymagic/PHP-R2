<?php 
// print_r($table);
?>

<table class="table">
 
 <tr>
	<th>
		Total Price
	</th>

	<th>
		Total Qty
	</th>

	<th>
		Payment Status
	</th>

	<th>Status Msg</th>

	<th>
		Delivery Type
	</th>

	<th>
		Gateway Type
	</th>

	<th>
		Date Of Transaction
	</th>

 	
 </tr>

 <?php 
  foreach ($table as $k=>$v){
 ?>


 <tr>
	<td>
		<?php echo number_format($v->grand_total); ?>
	</td>

	<td>
		<?php echo $v->total_qty; ?>
	</td>

	<td>
		<?php echo $v->payment_status; ?>
	</td>

	<td>
	 <?php 
      if (strtolower($v->payment_status)  == 'z6'){
        echo 'Cancelled';
      }else if ($v->payment_status == '91'){
      	echo 'Network Error!';
      }else{
      	echo $v->payment_response;
      }
	 ?>
		<?php //echo $v->payment_response; ?>
	</td>


	<td>
		<?php echo $v->preferred_delivery; ?>
	</td>


	<td>
		<?php echo $v->gway_type; ?>
	</td>


	<td>
		<?php echo $v->date_created; ?>
	</td>

	<td>
		<a href="<?php echo BASE_URL; ?>home/dashboard/member/tranx_detail/<?php echo $v->id; ?>" class="btn btn-success">View Detail</a>
	</td>
 	
 </tr>

 <?php 
  }
 ?>

</table>