<style type="text/css">
	.media-box{
		margin-bottom: 33px;
	}
</style>
<section class="content">
	

<form method="post">
<div class="panel panel-primary">
	<div class="panel-heading">
		<b>Create Category</b>
		<?php 
         if ($parent_id !== 0){
        ?>
          <a href="<?php echo BASE_URL; ?>admin/panel/category/edit/<?php echo $parent_id; ?>" class="pull-right" style="color:white;">Back</a>
        <?php 
         }else{
        ?>
          <a href="<?php echo BASE_URL; ?>admin/panel/category/manage_category/0" class="pull-right" style="color:white;">Back</a>
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
				<input class="form-control" name="category_name" />
			</div>



			<div class="col-xs-12">
				<label>Category Parent</label>
			</div>
			<div class="col-xs-12">
				<select name="parent" id="parent" class="form-control">
					<?php echo $category_select; ?>
				</select>
			</div>

              
              <script type="text/javascript">
              	(function($){
              		$(function(){

                       var parent_id = '<?php echo $parent_id; ?>';
                       
                       $('#parent').val(parent_id);


              		});
              	})(jQuery);
              </script>


		</div>
	</div>

	<div class="panel-footer clearfix">
		<div class="pull-right">
			<button class="btn btn-success" type="submit">Create</button>
			<input type="hidden" name="cmd" value="category-create" />
		</div>
	</div>
</div>
</form>



</section>




<div style="clear: both;"></div>