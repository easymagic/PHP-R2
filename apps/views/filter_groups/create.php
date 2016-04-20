<form method="post">
<div class="col-xs-12" style="background-color: #fff;">
	<div class="col-xs-12">
		<h3>
			Create Filter Groups
		</h3>
	</div>

	<div class="col-xs-12" align="right">
	  <?php 
        if ($parent_id == '0'){
      ?>
       <a href="<?php echo BASE_URL; ?>admin/panel/filter_groups/table/<?php echo $parent_id; ?>" class="btn btn-default btn-sm">Back</a>
      <?php    
        }else{
      ?>
      <a href="<?php echo BASE_URL; ?>admin/panel/filter_groups/update/<?php echo $parent_id; ?>" class="btn btn-default btn-sm">Back</a>
      <?php  
        }
	  ?>
		
	</div>



	<div class="col-xs-12">
		
        <div class="col-xs-12 col-md-5">
        	<input placeholder="Filter Name" name="filter_name" class="form-control" />
        </div>


<!--         <div class="col-xs-12 col-md-5">
        	<input placeholder="Filter Value" name="filter_value" class="form-control" />
        </div>
 -->
        <input type="hidden" name="parent_id" value="<?php echo $parent_id; ?>" />
      

        <div class="col-xs-12">
        	<button class="btn btn-default">Create Filter Group</button>
        	<input type="hidden" name="cmd" value="filter_groups-create_action" />
        </div>



	</div>
</div>
</form>