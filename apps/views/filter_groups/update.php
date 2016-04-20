<form method="post">
<div class="col-xs-12" style="background-color: #fff;">
	<div class="col-xs-12">
		<h3>
			Update Filter Group
		</h3>
	</div>

	<div class="col-xs-12" align="right">
	  <?php 
        if ($data->parent_id == '0'){
      ?>
       <a href="<?php echo BASE_URL; ?>admin/panel/filter_groups/table/<?php echo $data->parent_id; ?>" class="btn btn-default btn-sm">Back</a>
      <?php    
        }else{
      ?>
      <a href="<?php echo BASE_URL; ?>admin/panel/filter_groups/update/<?php echo $data->parent_id; ?>" class="btn btn-default btn-sm">Back</a>
      <?php  
        }
	  ?>
		
	</div>



	<div class="col-xs-12">
		
        <div class="col-xs-12 col-md-5">
        	<input placeholder="Filter Name" name="filter_name" class="form-control" value="<?php echo $data->filter_name; ?>" />
        </div>


<!--         <div class="col-xs-12 col-md-5">
        	<input placeholder="Filter Value" name="filter_value" class="form-control" />
        </div>
 -->
        <input type="hidden" name="parent_id" value="<?php echo $data->parent_id; ?>" />
      

        <div class="col-xs-12">
        	<button class="btn btn-default">Update Filter Group</button>
        	<input type="hidden" name="cmd" value="filter_groups-update_action-<?php echo $filter_groups_id; ?>" />
        </div>



	</div>
</div>
</form>


<div class="col-xs-12" style="border-top: 1px solid #ccc;margin-top: 5px;">
  <?php echo $me->table($data->id); ?>
</div>