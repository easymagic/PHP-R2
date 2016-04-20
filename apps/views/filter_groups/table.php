<div class="col-xs-12" style="background-color: #fff;">
	
     <div class="col-xs-12">
     	<h3>
     		Manage Group Filters
     	</h3>
     </div>

     <div class="col-xs-12" style="margin-bottom: 5px;">
     	<a href="<?php echo BASE_URL; ?>admin/panel/filter_groups/create/<?php echo $parent_id; ?>" class="btn btn-default">Create Group Filter</a>
     </div>


     <div class="col-xs-12">
     	

     	<table class="table">
     		<tr>
     			<th>
     				Filter Name
     			</th>
<!--      			<th>
     				Filter Value
     			</th>
 -->     		</tr>
     		<?php 
             foreach ($table as $k=>$v){
     		?>
             <tr>
             	<td>
             		<?php echo $v->filter_name; ?>
             	</td>
<!--              	<td>
             		<?php //echo $v->filter_value; ?>
             	</td>
 -->             	<td>
                 <?php 
                  if ($parent_id == '0'){
                 ?>
                 <a href="<?php echo BASE_URL; ?>admin/panel/filter_groups/update/<?php echo $v->id; ?>" class="btn btn-info btn-sm">Update</a>
                 <?php 
                  }
                 ?>

                 <?php 
                  if ($parent_id != '0'){
                 ?>
                 <a href="?cmd=filter_groups-delete_action-<?php echo $v->id; ?>" class="confirm btn btn-danger btn-sm">Delete</a>
                 <?php 
                  }
                 ?>
             	</td>
             </tr>
     		<?php 
             }
     		?>
     	</table>



     </div>



</div>