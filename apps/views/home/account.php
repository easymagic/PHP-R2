<div class="col-xs-12" style="margin-top: 11px;">
	

	<div class="col-xs-12 col-md-3">
		
		<ul class="list-group">
			

			<li class="list-group-item">
				   <span style="display: inline-block;height: 90px;width: 90px;border: 1px solid #ccc;">
                     <?php 
                      if (empty($auth->profile_picture)){
                     ?>
                      <span class="glyphicon glyphicon-user" style="font-size: 66px;padding: 12px;color: #ccc;"></span>
                     <?php 
                      }else{
                     ?>
                     
                      <img src="<?php echo BASE_URL; ?>profile_pictures/<?php echo $auth->profile_picture; ?>" style="max-width: 100%;max-height: 100%;" />
                     
                      
                     <?php 
                      }
                     ?>				   	
				   </span>
			</li>



			<li class="list-group-item">
				<a href="<?php echo BASE_URL; ?>home/account/member/profile">
                 <span class="glyphicon glyphicon-user"></span>
				   Profile&nbsp;
				</a>
			</li>


			<li class="list-group-item">
				<a href="<?php echo BASE_URL; ?>home/account/member/change_picture">
                 <span class="glyphicon glyphicon-camera"></span>
				   Change Profile Picture
				</a>
			</li>


			<li class="list-group-item">
				<a href="<?php echo BASE_URL; ?>home/account/member/change_pass">
				 <span class="glyphicon glyphicon-lock"></span>
				 Change Password
			    </a>
			</li>


			<li class="list-group-item">
				<a href="">
				 <span class="glyphicon glyphicon-briefcase"></span>
				 Primary School Profile
				</a>
			</li>


			<li class="list-group-item">
				<a href="">
				 <span class="glyphicon glyphicon-briefcase"></span>
				 Secondary School Profile
				</a>
			</li>

			<li class="list-group-item">
				<a href="">
				 <span class="glyphicon glyphicon-globe"></span>
				 University Profile
				</a>
			</li>


			<li class="list-group-item">
				<a href="<?php echo BASE_URL; ?>home/account/wall/my_wall">
                  <span class="glyphicon glyphicon-pushpin"></span>
				  My Wall

				</a>
			</li>			



			<li class="list-group-item">
				<a href="?cmd=member-log_out_action" style="color: red;">
				 <span class="glyphicon glyphicon-off"></span>
				 Log-Out
				</a>
			</li>

		</ul>

	</div>


	<div class="col-xs-12 col-md-6" style="padding:0;background-color: #fff;padding-bottom: 5px;;padding-top: 3px;">
		<?php echo $content; ?>
	</div>

	<div class="col-xs-12 col-md-3">
		<?php echo $friends; ?>
	</div>

   

    <div style="clear: both;">&nbsp;</div>





</div>

<script type="text/javascript">
 (function($){
 	$(function(){

      $('select').each(function(){
        console.log($(this).attr('data-value'));
      	$(this).val($(this).attr('data-value'));
      });
 

 	});
 })(jQuery);	
</script>



