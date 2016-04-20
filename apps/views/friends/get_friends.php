<?php 
 //$cls = array('#eee','#ccc');
?>
<div class="col-xs-12" style="background-color: #fff;">
 
 <div class="col-xs-12" style="border-bottom: 1px solid #ccc;">
 	<h4 align="center">Connections <span class="badge"><?php echo count($friends); ?></span></h4>
 </div>
	
 <div class="col-xs-12" style="min-height: 300px;padding: 0;">
 	<?php 
     foreach ($friends as $k=>$v){
 	?>
   <a href="<?php echo BASE_URL; ?>member/general_profile/<?php echo $v->request_id; ?>">
   <div class="col-xs-12" style="margin-top: 11px;padding: 0;">
   <?php 
     if (empty($member->get_field($v->request_id,'profile_picture'))){
   ?>
    <span class="glyphicon glyphicon-user" style="font-size: 18px;color: #777;"></span>
   <?php 
     }else{
   ?>
   <span style="display: inline-block;width: 32px;">
   	<img style="border-radius: 5px;max-height: 100%;max-width: 100%;" src="<?php echo BASE_URL; ?>profile_pictures/<?php echo $member->get_field($v->request_id,'profile_picture'); ?>" />   	
   </span>
   <?php 
     }
   ?>
   	&nbsp;
    <span style="white-space: nowrap;text-overflow: ellipsis;display: inline-block;">
   	 <?php echo $member->get_field($v->request_id,'first_name'); ?> , <?php echo $member->get_field($v->request_id,'last_name'); ?>
   	</span>
   </div>
   </a>

 	<?php 
     }
 	?>
 </div>

</div>