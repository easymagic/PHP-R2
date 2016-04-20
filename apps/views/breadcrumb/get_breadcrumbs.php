<style type="text/css">
	.breadcrumb-title a{
      color: #fff;
	}


  @media(min-width: 768px){
    
    .correct-3-9{
/*      display: inline-block;
      width: 87%;      
*/    }
  }

</style>
<?php 
 //$bread_crumb
 //print_r($bread_crumb);
//100-13
//87
 if (!empty($bread_crumb)){
?>
<div class="correct-3-9" style="padding: 0;">
      <div class="col-xs-12 col-md-3 breadcrumb-slot2" style="padding: 0;"> 
      	<a href="<?php echo BASE_URL; ?>product/search_by_tags?category_id=<?php echo $bread_crumb->link1; ?>"> 
      	 <img src="<?php echo BASE_URL; ?>breadcrumb_media/<?php echo $bread_crumb->image1; ?>"  style="max-height: 100%;max-width: 100%" />
        </a>	
      </div>

      <div class="col-xs-12 col-md-7 breadcrumb-slot3" style="padding: 0;margin-bottom: 16px;">

      	<div class="col-xs-12 col-md-4 breadcrumb-slot3-row" style="padding: 0;border-right: 1px solid #eee;">
      	  <a href="<?php echo BASE_URL; ?>product/search_by_tags?category_id=<?php echo $bread_crumb->link2; ?>"> 
      		<img src="<?php echo BASE_URL; ?>breadcrumb_media/<?php echo $bread_crumb->image2; ?>"  style="max-height: 100%;max-width: 100%" />
      	  </a>	
      	</div> 
      	<div class="col-xs-12 col-md-4 breadcrumb-slot3-row" style="padding: 0;border-right: 1px solid #eee;">
      	   <a href="<?php echo BASE_URL; ?>product/search_by_tags?category_id=<?php echo $bread_crumb->link3; ?>"> 	
      		<img src="<?php echo BASE_URL; ?>breadcrumb_media/<?php echo $bread_crumb->image3; ?>"  style="max-height: 100%;max-width: 100%" />
      	   </a>	
      	</div>
      	<div class="col-xs-12 col-md-4 breadcrumb-slot3-row" style="padding: 0">
           <a href="<?php echo BASE_URL; ?>product/search_by_tags?category_id=<?php echo $bread_crumb->link4; ?>"> 	
      		<img src="<?php echo BASE_URL; ?>breadcrumb_media/<?php echo $bread_crumb->image4; ?>"  style="max-height: 100%;max-width: 100%" />
      	   </a>	
      	</div>



      	<div class="col-xs-12 col-md-6 breadcrumb-slot3-row" style="padding: 0;border-top: 1px solid #eee;border-right:1px solid #eee;">
           <a href="<?php echo BASE_URL; ?>product/search_by_tags?category_id=<?php echo $bread_crumb->link5; ?>"> 	
      		<img src="<?php echo BASE_URL; ?>breadcrumb_media/<?php echo $bread_crumb->image5; ?>"  style="max-height: 99%;" />
           </a>      		
      	</div>

      	<div class="col-xs-12 col-md-6 breadcrumb-slot3-row" style="padding: 0;border-top: 1px solid #eee;">
      	  <a href="<?php echo BASE_URL; ?>product/search_by_tags?category_id=<?php echo $bread_crumb->link6; ?>"> 
      		<img src="<?php echo BASE_URL; ?>breadcrumb_media/<?php echo $bread_crumb->image6; ?>"  style="max-height: 99%;" />
          </a>      		
      	</div>



      </div>

</div>
<?php 
 }
?>