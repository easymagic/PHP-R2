<form method="post" enctype="multipart/form-data">
<div class="col-xs-12" style="background-color: #fff">
	
	<div class="col-xs-12">
		<h3>
			Create Breadcrumb
		</h3>
	</div>


	<div class="col-xs-12" align="right" style="margin-bottom: 5px;">
		 <a class="btn btn-default btn-sm" href="<?php echo BASE_URL; ?>admin/panel/breadcrumb/table">Back</a>
	</div>


	<div class="col-xs-12">
		
		<div class="col-xs-4">
			<select class="form-control" name="parent_id">
				<?php 
                  foreach ($categories as $k=>$v){
				?>
                 <option value="<?php echo $v->id; ?>"><?php echo $v->category_name; ?></option>
				<?php 
                 }
				?>
			</select>
		</div>


		<div class="col-xs-12">
			<input type="file" name="image1"  class="form-control" />
		</div>

		<div class="col-xs-12 col-md-5">
		   <select name="link1" class="form-control">
		    <option value="">Link</option>
		   	<?php 
              foreach ($all_categories as $k=>$v){
		   	?>
             <option value="<?php echo $v->id; ?>"><?php echo $v->category_name; ?></option>
		   	<?php 
             }
		   	?>
		   </select>
		</div>



		<div class="col-xs-12">
			<input type="file" name="image2"  class="form-control" />
		</div>
		<div class="col-xs-12 col-md-5">
		   <select name="link2" class="form-control">
		    <option value="">Link</option>
		   	<?php 
              foreach ($all_categories as $k=>$v){
		   	?>
             <option value="<?php echo $v->id; ?>"><?php echo $v->category_name; ?></option>
		   	<?php 
             }
		   	?>
		   </select>
		</div>


		<div class="col-xs-12">
			<input type="file" name="image3"  class="form-control" />
		</div>
		<div class="col-xs-12 col-md-5">
		   <select name="link3" class="form-control">
		    <option value="">Link</option>
		   	<?php 
              foreach ($all_categories as $k=>$v){
		   	?>
             <option value="<?php echo $v->id; ?>"><?php echo $v->category_name; ?></option>
		   	<?php 
             }
		   	?>
		   </select>
		</div>




		<div class="col-xs-12">
			<input type="file" name="image4"  class="form-control" />
		</div>
		<div class="col-xs-12 col-md-5">
		   <select name="link4" class="form-control">
		    <option value="">Link</option>
		   	<?php 
              foreach ($all_categories as $k=>$v){
		   	?>
             <option value="<?php echo $v->id; ?>"><?php echo $v->category_name; ?></option>
		   	<?php 
             }
		   	?>
		   </select>
		</div>



		<div class="col-xs-12">
			<input type="file" name="image5"  class="form-control" />
		</div>
		<div class="col-xs-12 col-md-5">
		   <select name="link5" class="form-control">
		    <option value="">Link</option>
		   	<?php 
              foreach ($all_categories as $k=>$v){
		   	?>
             <option value="<?php echo $v->id; ?>"><?php echo $v->category_name; ?></option>
		   	<?php 
             }
		   	?>
		   </select>
		</div>



		<div class="col-xs-12">
			<input type="file" name="image6"  class="form-control" />
		</div>
		<div class="col-xs-12 col-md-5">
		   <select name="link6" class="form-control">
		    <option value="">Link</option>
		   	<?php 
              foreach ($all_categories as $k=>$v){
		   	?>
             <option value="<?php echo $v->id; ?>"><?php echo $v->category_name; ?></option>
		   	<?php 
             }
		   	?>
		   </select>
		</div>

   

      <!-- Button Section//-->
      <div class="col-xs-12">
      	<button class="btn btn-default">Create Breadcrumb</button>
      	<input type="hidden" name="cmd" value="breadcrumb-create_action" />
      </div>

	</div>



</div>
</form>