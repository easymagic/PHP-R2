
<?php echo $message; ?>

<?php 
 if ($post_id !== 'null' && !empty($post_id) && ($is_friend || $member_id == $post_id)){ //if the user is logged , we will also add privacy soon.
?>
<form method="post" enctype="multipart/form-data">
<div class="col-xs-12" style="padding:0;margin-top: 4px;">

	
		
			<div class="col-xs-12">
			   <h4>Wall</h4>
				<textarea style="border-radius: 0;" class="form-control" name="content" placeholder="What's on your intellectual mind?"></textarea>
			</div>
		
		
			 <div class="col-xs-12" style="margin-top: 10px;border-top: 1px solid #ccc;padding-top: 6px;background-color: #eee;" align="right">


<div class="col-xs-12 col-md-2" style="padding-right: 0;">
 <span class="glyphicon glyphicon-camera" style="font-size: 35px;color: #aaa;"></span>
</div>

<div class="col-xs-12 col-md-4">
 <input type="file" name="wall_image" class="form-control" />	
</div>



<div class="btn-group"> 
 <button type="button" class="btn btn-default" id="wall_type">Visible To</button> 

 <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> 
  <span class="caret"></span>
  <span class="sr-only">Toggle Dropdown</span> 
 </button> 

 <ul class="dropdown-menu"> 
  <li>
   <a href="#" class="wall_type" data-text="Friends">
     <span class="glyphicon glyphicon-eye-open"></span>
     Friends
   </a>
  </li>
  <li>
   <a href="#" class="wall_type"  data-text="Private">
    <span class="glyphicon glyphicon-eye-close"></span>
    Only me (Private)
   </a>
  </li>
  <li role="separator" class="divider"></li>
  <li>
    <a href="#" class="wall_type"  data-text="Everyone">
     <span class="glyphicon glyphicon-globe"></span>
     Everyone
    </a>
  </li> 
 </ul> 
</div>

<input type="hidden" name="wall_type" id="wall_type_store" value="everyone" />



<script type="text/javascript">
	(function($){
		$(function(){

           $('.wall_type').each(function(){

             $(this).on('click',function(){
              var text = $(this).attr('data-text');
              $('#wall_type').html(text);
              $('#wall_type_store').val(text.toLowerCase());
              return false;
             });
            

           });

		});
	})(jQuery);
</script>


			 	&nbsp;<button class="btn btn-default">POST</button>
			 	<input type="hidden" name="cmd" value="wall-create_action-<?php echo $member_id; ?>-<?php echo $post_id; ?>" />
			 </div>
		
	
</div>

</form>
<?php 
 }
?>


<?php 
 $my_wall = array_reverse($my_wall);
 foreach ($my_wall as $k=>$v){

?>
<div class="remove-action col-xs-12" style="padding:0;border-top: 1px dashed #ccc;padding-top: 11px;padding-bottom: 11px;">

  <div class="col-xs-2">
<?php 
       if (!empty($v->post_id)){
?>

    <?php 
     //print_r($member);
     if (empty($member->get_profile_picture($v->post_id))){
    ?>
     <span class="glyphicon glyphicon-user" style="font-size: 36px;color: #ccc;padding-left: 9px;"></span>
    <?php 
     }else{
    ?>
    <img src="<?php echo BASE_URL;  ?>profile_pictures/<?php echo $member->get_profile_picture($v->post_id); ?>" style="max-width: 100%;max-height: 100%;border-radius: 11px;" /> 
    <?php 
     }
    ?>



<?php 
       }else{
       ?>

    <?php 
     //print_r($member);
     if (empty($member->get_profile_picture($v->member_id))){
    ?>
     <span class="glyphicon glyphicon-user" style="font-size: 24px;color: #ccc;"></span>
    <?php 
     }else{
    ?>
    <img src="<?php echo BASE_URL;  ?>profile_pictures/<?php echo $member->get_profile_picture($v->member_id); ?>" style="max-width: 100%;max-height: 100%;border-radius: 11px;" /> 
    <?php 
     }
    ?>

       <?php 
       }
?>

  </div>	

  <div class="col-xs-10">
  	<?php echo $v->content; ?>
  </div>

  <div class="col-xs-12" align="right">
  	<small style="font-size: 10px;color: #aaa;" data-date-now="<?php echo date('Y-m-d H:i:s'); ?>" class="date-created" data-date-created="<?php echo $v->date_created; ?>"><?php echo $v->date_created; ?></small>
  </div>	
  
  <?php 
    if (!empty($v->wall_image)){
  ?>
  <div class="col-xs-10">
   <img src="<?php echo BASE_URL;  ?>wall_images/<?php echo $v->wall_image; ?>" style="max-width: 100%;max-height: 100%;border-radius: 11px;" />
  </div>
 <?php 
   }
 ?> 

 <?php 
  if ($v->member_id == $post_id){
 ?>
 <div class="col-xs-12" align="right">
  &nbsp;
   <a href="?cmd=wall-remove_action-<?php echo $v->id; ?>" id="remove-action" href="" class="wall-remove-confirm btn btn-sm btn-danger" style="display: none;font-size: 9px;background-color: #2192CA;border: 1px solid #888;">
    <span class="glyphicon glyphicon-trash"></span>
    Remove Post
   </a>
 </div>
 <?php 
  }
 ?>


</div>
<?php 
 }
?>

<div style="clear: both;">&nbsp;</div>

<script type="text/javascript">
  (function($){
    $(function(){

       $('.date-created').each(function(){
        var date_ = $(this).attr('data-date-created');
        var now_ = $(this).attr('data-date-now');
        var time_ = moment(date_).from(moment(now_));
        $(this).html(time_);
       });


       $('.remove-action').each(function(){
        
        var $child = $(this).find('#remove-action');

        $(this).hover(function(){
           $child.show();
        },function(){
           $child.hide(); 
        });

       });


       $('.wall-remove-confirm').each(function(){
        $(this).on('click',function(){
          return confirm('Do you want to remove this post?');
        });
       });
   

    });
  })(jQuery);
</script>