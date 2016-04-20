<style type="text/css">
  .prdt_wrap{
    width: 31%;
  }
</style>

<div class="col-xs-12">
	<div class="container">
		<div class="col-xs-12" style="margin-top: 11px;">
			

        <!-- Left-panel start//-->
         <div class="col-xs-12 col-md-3" style="padding-left: 0">
         	 
         	 <div class="col-xs-12" style="background-color: #333333;color: #fff;padding-bottom: 10px;padding-top: 10px;">
         	 	Shop By Category
         	 </div>


            <?php 
                
                foreach ($categories as $k=>$v)
                {
                  $name = $v->category_name;
                  $name = explode(' ', $name);
                  $name = implode('-', $name);
               ?>
            <div class="col-xs-12" style="border-bottom: dashed 1px #ccc;padding-top: 10px;padding-bottom: 10px;">
            
               <a href="?category_id=<?php echo $v->id; ?>&<?php echo $name; ?>" class="category" id="" style="color: #777;">
                 <?php echo $v->category_name;?>
               </a>
            
            
            </div>
            <?php }?>






         	 <div class="col-xs-12" style="background-color: #333333;color: #fff;padding-bottom: 10px;padding-top: 10px;margin-top: 11px;">
         	 	Shop By Brand
         	 </div>


            <?php
             foreach ($brands as $k=>$v)
             {

                  $name = $v->brand_name;
                  $name = explode(' ', $name);
                  $name = implode('-', $name);

               ?>
            <div class="col-xs-12" style="border-bottom: dashed 1px #ccc;padding-top: 10px;padding-bottom: 10px;">
              <a href="?brand_id=<?php echo $v->id; ?>&<?php echo $name; ?>" class="brand" style="color: #777;"><?php echo $v->brand_name;?></a>
            </div>
            <?php }?>


         	 




         </div>

        <!-- Left-panel stop//-->




        <!-- mid-panel start //-->


        <!-- Product filter section here //-->

        <div class="col-xs-12 col-md-9">
           
           <div class="col-xs-12" style="padding: 0;">

            <h4 style="text-decoration: underline;">Filters:</h4>

            <span style="font-size: 14px;display: inline-block;background-color: #ccc;padding: 15px;border: 1px solid #777;">

             <select id="dial_type">
               <option value="null">Dial Types</option>
               <?php 
                foreach ($dial_types as $k=>$v){
                  if ($v->id == $dial_type){
                    $r = ' selected=selected ';
                  }else{
                    $r = '';
                  }
               ?>
                <option <?php echo $r; ?> value="<?php echo $v->id; ?>"><?php echo $v->filter_name; ?></option>
               <?php 
                }
               ?>
             </select>
             <select id="strap_type">
               <option value="null">Strap Type</option>
               <?php 
                foreach ($strap_types as $k=>$v){
                  if ($v->id == $strap_type){
                    $r = ' selected=selected ';
                  }else{
                    $r = '';
                  }

               ?>
                <option <?php echo $r; ?> value="<?php echo $v->id; ?>"><?php echo $v->filter_name; ?></option>
               <?php 
                }
               ?>
             </select>
             <select id="dial_color">
               <option value="null">Dial Color</option>
               <?php 
                 foreach ($dial_colors as $k=>$v){
                  if ($v->id == $dial_color){
                    $r = ' selected=selected ';
                  }else{
                    $r = '';
                  }                  
               ?>
                <option <?php echo $r; ?> value="<?php echo $v->id; ?>"><?php echo $v->filter_name; ?></option>
               <?php 
                }
               ?>

             </select>


             <select id="strap_color">
               <option value="null">Strap Color</option>
               <?php 
                 foreach ($strap_colors as $k=>$v){
                  if ($v->id == $strap_color){
                    $r = ' selected=selected ';
                  }else{
                    $r = '';
                  }                  
               ?>
                <option <?php echo $r; ?> value="<?php echo $v->id; ?>"><?php echo $v->filter_name; ?></option>
               <?php 
                }
               ?>

             </select>
             </span>




           </div>

        </div>

        <div class="col-xs-12 col-md-9" style="padding: 0;">

                <?php
                foreach ($products as $k=>$v) 
                {
                  echo $product->profile($v->id,'4'); //4 is the parameter for the col-md-(4)
                }
                ?>
        </div>                
        

        <!-- mid-panel stop//-->





		</div>
	</div>
</div>



















  
  <br class="clearfix" />


  <script type="text/javascript">
    (function($){
      $(function(){



        function _hook_filter(sel,k){
          $(sel).on('change',function(){
            var v = $(this).val();
            _induce_search_filter(k,v);
          });
        }
 


         function _induce_search_filter(ky,vl){
          $.ajax({
            url:'<?php echo BASE_URL; ?>product/induce_search_filters/' + ky + '/' + vl,
            type:'get',
            success:function(dt){
              //console.log(dt);
              if (dt == 'ok'){
               location.href = location.href;
              }

            }
          });
         }


        ///init dom bindings here
        _hook_filter('#dial_type','dial_type');
        _hook_filter('#strap_type','strap_type');
        _hook_filter('#dial_color','dial_color');
        _hook_filter('#strap_color','strap_color');

      });
    })(jQuery);
  </script>
