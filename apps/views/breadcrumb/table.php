<style type="text/css">
	table tr td{
		width: 32px;
	}
</style>
<div class="col-xs-12" style="background-color: #fff;">
	
   <div class="col-xs-12">
	<h3>Manage Breadcrumbs</h3>
   </div>	


   <div class="col-xs-12" style="margin-bottom: 5px;">
   	  <a href="<?php echo BASE_URL; ?>admin/panel/breadcrumb/create" class="btn btn-default btn-sm">Create Breadcrumb</a>
   </div>

   <div class="col-xs-12">
   	<table class="table">
   		<tr>
   			<th>
   				Category
   			</th>
   			<th>
   				Banner
   			</th>
   			<th>
   				Slot-1 
   			</th>
   			<th>
   				Slot-2
   			</th>
   			<th>
   				Slot-3
   			</th>
   			<th>
   				Slot-4
   			</th>
   			<th>
   				Slot-5
   			</th>
   		</tr>
   		<?php 
   		 //print_r($table);
         foreach ($table as $k=>$v){
   		?>
        <tr>
        	<td>
        	  
        		<?php echo $v->category_name; ?>
        	</td>
        	<td>
        	   <img src="<?php echo BASE_URL; ?>breadcrumb_media/<?php echo $v->image1; ?>" style="max-width: 80%;max-height: 80%;">
        	</td>
        	<td>
        	  <img src="<?php echo BASE_URL; ?>breadcrumb_media/<?php echo $v->image2; ?>" style="max-width: 80%;max-height: 80%;">
        	</td>
        	<td>
        		<img src="<?php echo BASE_URL; ?>breadcrumb_media/<?php echo $v->image3; ?>" style="max-width: 80%;max-height: 80%;">
        	</td>
        	<td>
        		<img src="<?php echo BASE_URL; ?>breadcrumb_media/<?php echo $v->image4; ?>" style="max-width: 80%;max-height: 80%;">
        	</td>
        	<td>
        		<img src="<?php echo BASE_URL; ?>breadcrumb_media/<?php echo $v->image5; ?>" style="max-width: 80%;max-height: 80%;">
        	</td>
        	<td>
        		<img src="<?php echo BASE_URL; ?>breadcrumb_media/<?php echo $v->image6; ?>" style="max-width: 80%;max-height: 80%;">
        	</td>


           <td>
           	 <a href="<?php echo BASE_URL; ?>admin/panel/breadcrumb/update/<?php echo $v->breadcrumb_id; ?>" class="btn btn-info btn-sm">Update</a>
           	 <a href="?cmd=breadcrumb-delete_action-<?php echo $v->breadcrumb_id; ?>" class="confirm btn btn-danger btn-sm">Remove</a>
           </td>
        </tr>
   		<?php 
         }
   		?>
   	</table>
   </div>


</div>