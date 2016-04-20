<?php 
// echo $header;
?>

<?php //include('includes/header.php') ?>

<?php 
 //echo app()->controller->product_controller->show();
?>
<script>
/*$(document).ready(function(){
  $.colorbox({inline:true,speed:500,href:"#splashscreen"});
  setTimeout(function () {
      $.colorbox({inline:true,speed:500,href:"#splashscreen"});
    }, 50000);
});*/
</script>

  <div id="content">

  <?php 
   
   echo $this->app->controller->home_page_controller->get_slides();

   

  ?>



    
    <?php    
      echo $tags;
    ?>

    <?php 
     echo $breadcrumbs;
    ?>
    

    <script type="text/javascript">
      (function($){
        $(function(){

           
           $('#hot-deals').insertBefore('#swap1');


        });
      })(jQuery);
    </script>



    
    
    <!-- <div class="col-xs-12">
      <div class="col-xs-12">
        <h2 style="font-size: 28px;text-align: center;border-bottom: 1px solid #ddd;padding-bottom: 3px;margin-bottom: 5px;">About Vanbed</h2>
      </div>

      <div class="col-xs-12">
       
       <div class="col-xs-12" align="center">
        Vanbedng.com is operated by Vanbed Enterprises with RC No. 2322367 is an online wristwatch shop in Nigeria designed to satisfy all 
         
       </div>
       <div class="col-xs-12" align="center">
        segment of the society an affordable, quality, and value for money time piece with our large collection of 

       </div>
       <div class="col-xs-12" align="center">

        male and female watches best online deals. Vanbed is number one top seller on KONGA Nigeria.         
         
       </div>
       <div class="col-xs-12" align="center">
         
        <h2 style="font-size: 28px;text-align: center;border-bottom: 1px solid #ddd;padding-bottom: 3px;margin-bottom: 5px;">Mission</h2>
        <div class="col-xs-12">
         To introduce broad range of watches to satisfy all segment of the society
        </div>

       </div>

       <div class="col-xs-12" align="center">
         
        <h2 style="font-size: 28px;text-align: center;border-bottom: 1px solid #ddd;padding-bottom: 3px;margin-bottom: 5px;">Vision</h2>
        <div class="col-xs-12">
         To be the number one online watch shop to create long lasting<br />
         impression on customers
        </div>
         
       </div>

       <div class="col-xs-12" align="center">
        
        <h2 style="font-size: 28px;text-align: center;border-bottom: 1px solid #ddd;padding-bottom: 3px;margin-bottom: 5px;">Values</h2>
        <div class="col-xs-12">
         Integrity, Speed, Veracity.
        </div>

       </div>




      </div>
    </div> -->



      
    

    <br class="clearfix" />

  </div>

<script type="text/javascript">
  
  (function($){
    $(function(){


                var URL2 = '<?php echo BASE_URL; ?>cart_controller/get_cart_count';


                function _update_cart_count(){
                   
                  //$('#cart_count').html('0');                   
                  $.ajax({
                    url:URL2,
                    success:function(dt){
                     $('#cart_count').html(dt);                   
                    }
                  });

                }


                _update_cart_count();



    });
  })(jQuery);

</script>

  <?php //include('includes/footer.php') ?>
  <?php 
    //echo $footer;
  ?>
</body>
</html>