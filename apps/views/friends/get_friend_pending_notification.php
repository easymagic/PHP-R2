<div class="col-xs-12 col-md-1">
  <span class="glyphicon glyphicon-bell" style="font-size: 20px;color: #2192CA;">

  <a style="position: relative;top: -24px;left: 14px;" href="<?php echo BASE_URL; ?>friends/get_connection_requests/<?php echo $member_id; ?>"><span class="badge"><?php echo count($pending); ?></span></a>

  	
  </span>
</div>
<script type="text/javascript">
	(function($){
		$(function(){
			//#notifiaction
			setTimeout(function(){

              $.ajax({
              	url:'<?php echo BASE_URL; ?>friends/get_friend_pending_notification/<?php echo $member_id; ?>',
              	success:function(dt){
                 $('#notifiaction').html(dt);
              	}
              });

			},60000);
		});
	})(jQuery);
</script>
