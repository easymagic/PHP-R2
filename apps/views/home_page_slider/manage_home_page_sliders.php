<style type="text/css">
	.media-box{
		margin-bottom: 33px;
	}
</style>
<section class="content">
	

<div class="panel panel-primary">
	<div class="panel-heading">
		<b>Manage Home Page Sliders </b>
		<a href="<?php echo BASE_URL; ?>admin/panel/home_page_slider/add" class="pull-right" style="color:white;">Add Slider</a>
	</div>
	<div class="panel-body">
		<div class="col-xs-12">

		  <table class="table">
		  	<tr>
		  		<th>ID</th>
		  		<th>Caption</th>
		  		<th>Image</th>
		  		<!--<th>Sort Order (Alphabetic)</th>//-->
		  	</tr>
		  	<?php 
             foreach ($table as $k=>$v){
		  	?>
		  	<tr>
		  		<td><?php echo $v->id; ?></td>
		  		<td><?php echo $v->caption; ?></td>
		  		<td style="width: 512px;">

		  		<img src="<?php echo BASE_URL; ?>home_slider_image/<?php echo $v->image; ?>" style="max-width:100%; max-height: 100%;" />
		  		<?php echo $v->image; ?></td>
		  		<!--<td><?php echo $v->sort_order; ?></td>//-->
		  <td><a href="<?php echo BASE_URL; ?>admin/panel/home_page_slider/edit/<?php echo $v->id; ?>" class="btn btn-sm btn-primary">Edit</a></td>
		  <td><a href="?cmd=home_page_slider-delete-<?php echo $v->id; ?>" class="btn btn-sm btn-danger confirm">Remove</a></td>

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