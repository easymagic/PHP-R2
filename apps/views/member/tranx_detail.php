<?php 
 //print_r($table);
?>
<table class="table">
	<tr>
		<th>Product</th>
		<th>Qty</th>
		<th>Price</th>
		<th>Price Tot</th>
		<th>Date Created</th>
	</tr>
	<?php 
     foreach ($table as $k=>$v){
	?>
    <tr>
    	<td style="width: 128px;">
          <img src="<?php echo BASE_URL; ?>product_images/<?php echo $v->image ?>" style="max-width: 100%;max-height: 100%;"/>
    	</td>
    	<td><?php echo $v->qty; ?></td>
    	<td><?php echo number_format($v->price); ?></td>
    	<td><?php echo number_format($v->price_tot); ?></td>
    	<td><?php echo $v->date_created; ?></td>
    </tr>
	<?php 
	 }
	?>
</table>