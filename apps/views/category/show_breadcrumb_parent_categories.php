 <style type="text/css">
  .breadcrumb-container{
  	 border: 1px solid #ddd;
   	 margin-top: 5px;
   	 margin-bottom: 5px;  	 
  }

   .breadcrumb-container  .breadcrumb-slot1,.breadcrumb-container  .breadcrumb-slot2,.breadcrumb-container  .breadcrumb-slot3{
   	 min-height: 394px !important;
   }


   .breadcrumb-title{
    padding-top: 11px !important;
    padding-bottom: 11px !important;
    background-color: #4868B1;
    color: #fff;
    /*text-align: center;*/
    text-transform: uppercase;
    font-size: 15px !important;  
    font-weight: bold;

    /*font-size: 19px;  */   	
   }

   .breadcrumb-title a{
   	padding-left: 11px;
   }

   .breadcrumb-category-link-container{
     /*text-align: center;*/
   }

   .breadcrumb-category-link-container a{
      margin-top: 18px;
      margin-bottom: 5px;
      display: inline-block;
      /*font-weight: bold;*/
      font-size: 15px !important;
      color: #222;
   }

    .breadcrumb-category-link-container a:hover{
      color: #F72525;
   }

   .breadcrumb-slot2{
   	 border-left: 1px solid #ddd;
   	 border-right: 1px solid #ddd;
   }

   .breadcrumb-slot3-row{
     height: 197px;
   }

   .breadcrumb-slot3-row:hover{
   	box-shadow: 2px 2px 2px #ddd;
   }


   @media(min-width: 768px){
    
     .correct-breadcrumb-category{
       /*width: 13% !important;*/
     }

   }

 </style>
 <div class="col-xs-12">
   <div class="container">
 	

 	<?php 
 	 
 	 $parent_categories = array_reverse($parent_categories);

     foreach ($parent_categories as $k=>$v){
 	?>
    <div class="col-xs-12 breadcrumb-container" style="padding: 0;border-top: 4px solid #4868B1;">
      
      <div class="col-xs-12 col-md-2 breadcrumb-slot1 correct-breadcrumb-category" style="padding:0;">
        <div class="col-xs-12 breadcrumb-title" style="padding: 0;">
          <a style="display: inline-block;" href="<?php echo BASE_URL; ?>product/search_by_tags?category_id=<?php echo $v->id; ?>">
          <?php echo $v->category_name; ?>	
          </a>
        </div>
        <div class="col-xs-12">
          <?php echo $category_controller->show_breadcrumb_child_categories($v->id); ?>	
        </div>
      	
      </div>

       <?php 
         echo $category_controller->app->controller->breadcrumb->get_breadcrumbs($v->id);
       ?>
    </div>

   <?php 
     if ($k < count($parent_categories) - 1){
   ?>
    <div class="col-xs-12" style="padding: 0;border-bottom: 1px dashed #ccc;margin-bottom: 21px;margin-top: 21px;"></div>   
    <?php 
     }
    ?>
 
 	<?php 
    }
 	?>
   
   </div>
 </div>

<div class="col-xs-12" style="margin-top: 30px;">
  &nbsp;
</div>