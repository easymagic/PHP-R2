    <?php 
      //echo BASE_URL;
    $id = strtolower($title);
    $id = explode(' ', $id);
    $id = implode('-', $id);
    $id = explode("'", $id);
    $id = implode('', $id);
    ?>
    <div class="cont border_top_dash" id="<?php echo $id; ?>" style="position: relative;border-top: 0 solid #fff;">
        <div class="cont_top">
        <div class="cont_tag"><?php echo $title; ?></div>
        </div>
        <div class="box1" id="owl-<?php echo $id; ?>" style="white-space: nowrap;overflow-x: hidden;overflow-y: hidden;">
        
        <div style="min-width: 100%;position: relative;" id="mover-<?php echo $id; ?>">

        <?php
        //owl-carousel
    //$PrdData = mysql_query("select * from products  where id!='' AND FIND_IN_SET('FEATURED PRODUCTS', tags) limit 4");
        foreach ($products as $k=>$v)    
        {
            ?>


            <div style="display: inline-block;width: 267px;" class="scroll-item">

            <?php
             echo $product->profile($v->id,'12');
            ?>

            </div>



            <?php 
        }
        ?>




        </div>
        

    <div class="col-xs-12" align="center" id="controls" style="position: relative;">
        <span id="left-control" class="glyphicon glyphicon-chevron-left" style="font-size: 40px;cursor: pointer;position: absolute;left: 2%;top: -325%;"></span>
        <span style="font-size: 50px;cursor: pointer;">&nbsp</span>
        <span id="right-control" class="glyphicon glyphicon-chevron-right" style="font-size: 40px;cursor: pointer;position: absolute;left: 95.5%;top: -325%;"></span>
    </div>


        <br class="clearfix" />
      </div>



    </div>
    <br class="clearfix" />


   <?php 
    if (count($products) > 0){
   ?>
    <script type="text/javascript">
        var times = times || 4000;

            times+=  1000;
        (function($){

            $(function(){

               var obj = new hscroll({
                parent:'#owl-<?php echo $id; ?>',
                mover:'#mover-<?php echo $id; ?>',
                total_slide: '<?php echo count($products); ?>',
                number_per_display:4
               });

               obj.new_time();

               obj.start_animation();

               //obj.do_animation(); //owl-<?php echo $id; ?>
               
            });
        })(jQuery);

    </script>

  <?php 
   }
  ?>

<div style="clear: both;">&nbsp;</div>


