<style type="text/css">
  .thumbs_itm{
    cursor: pointer;
  }

  #content{
    min-height: 965px;
  }

</style>
<div id="content">



    <div class="cont border_top_solid">

    <div id="added_preview" align="center" style="margin-bottom:15px;">
     
     
    </div>    

  <?php 
    
    //if (isset($_REQUEST['ProductId'])){
     //echo app()->controller->product_controller->product_detail($_REQUEST['ProductId']);
    //}

  ?>


<?php 
 //main product details.
 foreach ($product_detail as $k=>$v){

//


  if($v->image==''){
    $img    =   'images/_no_image.png';
  }else{
    $img    =   "product_images/".$v->image;
  }



?>



        <div class="prdt_detail">
          <div class="prdt_detail_lft">
            <div class="main_img"> <img id="main_preview" src="<?php echo BASE_URL.$img; ?>" /> </div>

            <div class="thumbs">
            <?php 
             if (!empty($v->image)){
            ?>
              <div class="thumbs_itm" data-src="<?php echo BASE_URL."product_images/".$v->image; ?>"><img src="<?php echo BASE_URL."product_images/".$v->image; ?>" /></div>
            <?php 
             }
            ?>  
            <?php 
             if (!empty($v->image2)){
            ?>
              <div class="thumbs_itm"  data-src="<?php echo BASE_URL."product_images/".$v->image2; ?>"><img src="<?php echo BASE_URL."product_images/".$v->image2; ?>" /></div>
            <?php 
             }
            ?>  

            <?php 
             if (!empty($v->image3)){
            ?>
              <div class="thumbs_itm" data-src="<?php echo BASE_URL."product_images/".$v->image3; ?>"><img src="<?php echo BASE_URL."product_images/".$v->image3; ?>" /></div>
            <?php 
             }
            ?>  

             <!--
              <div class="thumbs_itm"><img src="<?php //echo BASE_URL."product_images/".$v->image2; ?>" /></div>
              <div class="thumbs_itm"><img src="<?php //echo BASE_URL."product_images/".$v->image3; ?>" /></div>
              <div class="thumbs_itm"><img src="<?php //echo BASE_URL."product_images/".$v->image4; ?>" /></div>
             //--> 
            </div>
          </div>

          <div class="prdt_detail_rgt">
            <h3 class="normal" ><?php echo $v->product_name; ?></h3>
            <br />
            <p class="red">&#x20a6;<?php echo "&nbsp;".number_format($v->product_price);?></p>
            <p>
              <label>Quantity Available: </label>
              <?php echo $v->product_quantity; ?></p>
            <form role="form" id="ProductForm" name="ProductForm">
              <input type="hidden" id="product_id" value="<?php echo $v->id;?>"/>
              <input type="hidden" id="product_price" value="<?php echo $v->product_price;?>"/>
              <p>
                <label>Select Quantity: </label>
                <select name="quantity" id="qty" class="selection">
                  <?php for($i=1;$i<=10;$i++){?>
                  <option value="<?php echo $i;?>"><?php echo $i;?></option>
                  <?php } ?>
                </select>
              </p>
              <p><span class="bold">Shipping:</span> Calculated at Checkout</p>
              <p>
              <div class="cart_btn">
                <button type="button" class="AddToCart" id="add_to_cart" style="width:155px;">Add to Cart</button>
              </div>

              <!--<div class="wishlist"><a href="#">Add to Wishlist</a></div>-->
              </p>
            </form>

            <div class="col-xs-12" style="margin-top: 18px; padding: 0;"><h2><b>Product Description:</b></h2></div>
            
            <div class="col-xs-12" style="height:200px; overflow-y: auto; margin-top: 5px; font-size: 12px; padding: 0; line-height: 1.5;">
              <?php echo $v->product_detail; ?>
            </div>


          </div>

          <br class="clearfix" />
        </div>

        <script type="text/javascript">
          (function($){
            $(function(){
                
                var URL1 = '<?php echo BASE_URL; ?>cart_controller/add';

                function _get_loading(){
                  var r = '<?php echo BASE_URL; ?>images/loading.gif';
                  return '<img src="' + r + '" style="width:32px;height:32px;margin-bottom: -11px;margin-left: -36px;" />';
                }
                
                $('#add_to_cart').on('click',function(){
                   //$id,$price,$qty=1
                   var $obj = $(this);
                   var old_label = $(this).html();
                   var url_ = URL1 + '/' + $('#product_id').val() + '/' + $('#product_price').val() + '/' + $('#qty').val();
                   $(this).html(_get_loading() + '&nbsp;Adding ...');
                   $(this).attr('disabled','disabled');
                   $.ajax({
                    url:url_,
                    success:function(dt){
                      //alert(dt);
                      //$('#cart_msg').html(dt);
                      $('#added_preview').html(dt);
                      $('#added_preview').slideDown();

                      var already_clicked = false;

                      $('#added_preview_cancel').on('click',function(){
                        already_clicked = true;
                        $('#added_preview').slideUp();
                      });
                      //$('#added_preview').fadeOut('slow',function(){
                        //$(this).html(dt);
                        //$(this).fadeIn('slow');
                      //});

                      //$('#added_preview').html(dt);
                       $obj.html(old_label);  
                       _update_cart_count();                      
                      //$.colorbox({inline:true,width:550,speed:400, href:"#ShowafterProduct"}); 
                      setTimeout(function(){
                         if (already_clicked)return;
                         $('#added_preview').slideUp();
                      },5000);
                      
                      //$obj.html(dt);
                      $obj.removeAttr('disabled');
                      
                    }
                   });




                });

    
                $('#added_preview').slideUp();

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





 
           $('.thumbs_itm').each(function(){
            $(this).on('click',function(){
              var src = $(this).data('src');
              $('#main_preview').attr('src',src);
            });
           });



            });
          })(jQuery);
        </script>
<?php   
 }
?>

    


    


<?php 
  //if (isset($_REQUEST['ProductId'])){
    echo $this->app->controller->product->suggested_products($product_id);
  //} 

  //category_id
  

  //get_product_category_id

  $category_id = $this->app->model->product_model->get_product_category_id($product_id);

  //echo $category_id . 'cat';
?>






    </div>


<?php 
  echo $this->app->controller->product->get_similar_products($category_id);
?>




</div>




