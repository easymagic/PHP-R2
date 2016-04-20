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
		<b>Edit Category</b>
		<?php 
         if ($v->parent*1 !== 0){
        ?>
        <a href="<?php echo BASE_URL; ?>admin/panel/category/edit/<?php echo $v->parent; ?>" class="pull-right" style="color:white;">Back</a>
        <?php 
         }else{
        ?>
        <a href="<?php echo BASE_URL; ?>admin/panel/category/manage_category" class="pull-right" style="color:white;">Back</a>
        <?php 
         }
		?>
		
	</div>
	<div class="panel-body">
		<div class="col-xs-12">
			
			<div class="col-xs-12">
				<label>Category Name</label>
			</div>
			<div class="col-xs-12">
				<input class="form-control" name="category_name" value="<?php echo $v->category_name; ?>" />
			</div>


			<div class="col-xs-12">
				<label>Category Parent</label>
			</div>
			<div class="col-xs-12">
				<input class="form-control" name="parent" value="<?php echo $v->parent; ?>" />
			</div>




		</div>
	</div>

	<div class="panel-footer clearfix">
		<div class="pull-right">
			<button class="btn btn-success" type="submit">Save</button>
			<input type="hidden" name="cmd" value="category-update-<?php echo $v->id; ?>" />
		</div>
	</div>
</div>
</form>

<?php
 }
?>

</section>


<div class="col-xs-12">
	<?php echo $manage_sub_category; ?>
</div>



<div style="clear: both;"></div>