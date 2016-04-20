<style type="text/css">
	.media-box{
		margin-bottom: 33px;
	}
</style>
<section class="content">
	

<form method="post">
<div class="panel panel-primary">
	<div class="panel-heading">
		<b>Create Tag</b>
		<a href="<?php echo BASE_URL; ?>admin/panel/tag/manage_tags" class="pull-right" style="color:white;">Back</a>
	</div>
	<div class="panel-body">
		<div class="col-xs-12">
			
			<div class="col-xs-12">
				<label>Tag Name</label>
			</div>
			<div class="col-xs-12">
				<input class="form-control" name="name" />
			</div>


			<div class="col-xs-12">
				<label>Tag Code</label>
			</div>
			<div class="col-xs-12">
				<input class="form-control" name="code" />
			</div>

			<div class="col-xs-12">
				<label>Sort Order</label>
			</div>
			<div class="col-xs-12">
				<input class="form-control" name="sort_order" />
			</div>



		</div>
	</div>

	<div class="panel-footer clearfix">
		<div class="pull-right">
			<button class="btn btn-success" type="submit">Create</button>
			<input type="hidden" name="cmd" value="tag-create" />
		</div>
	</div>
</div>
</form>



</section>




<div style="clear: both;"></div>