<?php 
 //print_r($breadcrumb);
?>
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
                  	if ($v->id == $breadcrumb->parent_id){ 
                     $r = ' selected=selected ';
                  	}else{
                  	 $r = '';	
                  	}
				?>
                 <option <?php echo $r; ?> value="<?php echo $v->id; ?>"><?php echo $v->category_name; ?></option>
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
              	if ($v->id == $breadcrumb->link1){
                  $r = ' selected=selected ';
              	}else{
              	  $r = '';	
              	}
		   	?>
             <option <?php echo $r; ?> value="<?php echo $v->id; ?>"><?php echo $v->category_name; ?></option>
		   	<?php 
             }
		   	?>
		   </select>
		</div>

		<div class="col-xs-12">
		    <input type="hidden" name="image1" value="<?php echo $breadcrumb->image1; ?>" />
			<img src="<?php echo BASE_URL; ?>breadcrumb_media/<?php echo $breadcrumb->image1; ?>" style="max-height: 13%;max-width: 13%;" />
		</div>






		<div class="col-xs-12">
			<input type="file" name="image2"  class="form-control" />
		</div>
		<div class="col-xs-12 col-md-5">
		   <select name="link2" class="form-control">
		    <option value="">Link</option>
		   	<?php 
              foreach ($all_categories as $k=>$v){
              	if ($v->id == $breadcrumb->link2){
                  $r = ' selected=selected ';
              	}else{
              	  $r = '';	
              	}
		   	?>
             <option <?php echo $r; ?> value="<?php echo $v->id; ?>"><?php echo $v->category_name; ?></option>
		   	<?php 
             }
		   	?>
		   </select>
		</div>
		<div class="col-xs-12">
		    <input type="hidden" name="image2" value="<?php echo $breadcrumb->image2; ?>" />
			<img src="<?php echo BASE_URL; ?>breadcrumb_media/<?php echo $breadcrumb->image2; ?>" style="max-height: 13%;max-width: 13%;" />
		</div>



		<div class="col-xs-12">
			<input type="file" name="image3"  class="form-control" />
		</div>
		<div class="col-xs-12 col-md-5">
		   <select name="link3" class="form-control">
		    <option value="">Link</option>
		   	<?php 
              foreach ($all_categories as $k=>$v){
              	if ($v->id == $breadcrumb->link3){
                  $r = ' selected=selected ';
              	}else{
              	  $r = '';	
              	}
		   	?>
             <option <?php echo $r; ?> value="<?php echo $v->id; ?>"><?php echo $v->category_name; ?></option>
		   	<?php 
             }
		   	?>
		   </select>
		</div>
		<div class="col-xs-12">
		    <input type="hidden" name="image3" value="<?php echo $breadcrumb->image3; ?>" />
			<img src="<?php echo BASE_URL; ?>breadcrumb_media/<?php echo $breadcrumb->image3; ?>" style="max-height: 13%;max-width: 13%;" />
		</div>




		<div class="col-xs-12">
			<input type="file" name="image4"  class="form-control" />
		</div>
		<div class="col-xs-12 col-md-5">
		   <select name="link4" class="form-control">
		    <option value="">Link</option>
		   	<?php 
              foreach ($all_categories as $k=>$v){
              	if ($v->id == $breadcrumb->link4){
                  $r = ' selected=selected ';
              	}else{
              	  $r = '';	
              	}
		   	?>
             <option <?php echo $r; ?> value="<?php echo $v->id; ?>"><?php echo $v->category_name; ?></option>
		   	<?php 
             }
		   	?>
		   </select>
		</div>
		<div class="col-xs-12">
		    <input type="hidden" name="image4" value="<?php echo $breadcrumb->image4; ?>" />
			<img src="<?php echo BASE_URL; ?>breadcrumb_media/<?php echo $breadcrumb->image4; ?>" style="max-height: 13%;max-width: 13%;" />
		</div>



		<div class="col-xs-12">
			<input type="file" name="image5"  class="form-control" />
		</div>
		<div class="col-xs-12 col-md-5">
		   <select name="link5" class="form-control">
		    <option value="">Link</option>
		   	<?php 
              foreach ($all_categories as $k=>$v){
              	if ($v->id == $breadcrumb->link5){
                  $r = ' selected=selected ';
              	}else{
              	  $r = '';	
              	}
		   	?>
             <option <?php echo $r; ?> value="<?php echo $v->id; ?>"><?php echo $v->category_name; ?></option>
		   	<?php 
             }
		   	?>
		   </select>
		</div>
		<div class="col-xs-12">
		    <input type="hidden" name="image5" value="<?php echo $breadcrumb->image5; ?>" />
			<img src="<?php echo BASE_URL; ?>breadcrumb_media/<?php echo $breadcrumb->image5; ?>" style="max-height: 13%;max-width: 13%;" />
		</div>



		<div class="col-xs-12">
			<input type="file" name="image6"  class="form-control" />
		</div>
		<div class="col-xs-12 col-md-5">
		   <select name="link6" class="form-control">
		    <option value="">Link</option>
		   	<?php 
              foreach ($all_categories as $k=>$v){
              	if ($v->id == $breadcrumb->link6){
                  $r = ' selected=selected ';
              	}else{
              	  $r = '';	
              	}
		   	?>
             <option <?php echo $r; ?> value="<?php echo $v->id; ?>"><?php echo $v->category_name; ?></option>
		   	<?php 
             }
		   	?>
		   </select>
		</div>
		<div class="col-xs-12">
		    <input type="hidden" name="image6" value="<?php echo $breadcrumb->image6; ?>" />
			<img src="<?php echo BASE_URL; ?>breadcrumb_media/<?php echo $breadcrumb->image6; ?>" style="max-height: 13%;max-width: 13%;" />
		</div>

   

      <!-- Button Section//-->
      <div class="col-xs-12">
      	<button class="btn btn-default">Save Breadcrumb</button>
      	<input type="hidden" name="cmd" value="breadcrumb-update_action-<?php echo $breadcrumb_id; ?>" />
      </div>

	</div>



</div>
</form>