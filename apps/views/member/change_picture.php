<div class="col-xs-12" style="min-height: 300px;">
	<form method="post" enctype="multipart/form-data">
		
		<?php echo $message; ?>

		<div class="col-xs-12">
			<h4>Change Profile Picture</h4>
		</div>

		<div class="col-xs-12" style="border-bottom: 1px solid #ccc;padding-bottom: 3px;padding-left: 0;padding-right: 0;">
			<div class="col-xs-7">
				<input type="file" class="form-control" name="picture" />
			</div>

			<div class="col-xs-3">
				<button class="btn btn-primary">
				  <span class="glyphicon glyphicon-camera"></span>
				  Upload
				</button>			
				<input type="hidden" name="cmd" value="member-change_picture_action"  />
			</div>
		</div>


		<div class="col-xs-12" style="margin-top: 5px;" align="center">
			 

			 <div style="height: 256px;width: 256px;border: 1px solid #ccc;background-color: #eee;">
			 	<?php 
                  if (!empty($profile_picture)){
                ?>
                 <img src="<?php echo BASE_URL; ?>profile_pictures/<?php echo $profile_picture; ?>" style="max-width: 100%;max-height: 100%;">
                <?php 
                  }else{
                ?> 	
                <span class="glyphicon glyphicon-user" style="font-size: 203px;padding-top: 17px;color: #aaa;"></span>
                <?php 
                  }
			 	?>
			 	

			 </div>


		</div>



	</form>
</div>