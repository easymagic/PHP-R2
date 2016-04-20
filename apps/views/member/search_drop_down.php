<?php 
 foreach ($members as $k=>$v){
?>
 <div style="padding: 0;padding-top: 7px;padding-bottom: 7px;padding-left: 4px;" class="col-xs-12 drp">
  <a href="<?php echo BASE_URL; ?>member/general_profile/<?php echo $v->id; ?>">
  <span style="display: inline-block;width: 32px;">
   <?php 
   if (!empty($v->profile_picture)){
   ?>
  	<img src="<?php echo BASE_URL; ?>profile_pictures/<?php echo $v->profile_picture; ?>" style="max-height: 100%;max-width: 100%;">
  <?php 
   }else{
  ?>	
   <span class="glyphicon glyphicon-user" style="font-size: 20px;padding-left: 6px;color: #777;"></span>
  <?php 
   }
  ?>
  </span>&nbsp;
   <?php echo $v->first_name ?> , <?php echo $v->last_name;  ?>
  </a> 
 </div>
<?php 
 }
?>