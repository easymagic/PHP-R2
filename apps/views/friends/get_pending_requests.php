<div class="col-xs-12" style="margin-top: 11px;">

<div class="col-xs-12 col-md-8" style="background-color: #fff;">

<div class="col-xs-12">
	<h4><u>Pending Connection Requests</u>&nbsp;(<?php echo count($pending); ?>)</h4>
</div>
<div class="col-xs-12"><?php echo $message; ?></div>
<div class="col-xs-12">
	<?php 
     //print_r($pending);
	?>
	<?php 
     foreach ($pending as $k=>$v){
	?>
    <div class="col-xs-12" style="padding-bottom: 11px;">

    <?php 
     if (!empty($member->get_field($v->request_id,'profile_picture'))){
    ?>
     <span style="width: 32px;display: inline-block;">
     	<img style="max-width: 100%;max-height: 100%;" src="<?php echo BASE_URL; ?>profile_pictures/<?php echo $member->get_field($v->request_id,'profile_picture') ?>" />
     </span>
    <?php 
     }else{
    ?>
    <span class="glyphicon glyphicon-user" style="font-size: 20px;color: #999;"></span>
    <?php 
     }
    ?>
    &nbsp;
    	<?php echo $member->get_field($v->request_id,'first_name'); ?>,
    	<?php echo $member->get_field($v->request_id,'last_name'); ?>
    	&nbsp;
    	<a href="?cmd=friends-confirm_connection_request_action-<?php echo $v->request_id; ?>" class="btn btn-sm btn-info">
    	 <span class="glyphicon glyphicon-ok"></span>
    	 Confirm Connection Request
    	</a>
    </div>
	<?php 
     }
	?>
</div>



</div>


<div class="col-xs-12 col-md-4"><?php echo $friends; ?></div>

</div>