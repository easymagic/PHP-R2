<style type="text/css">
  
  a.a_demo_four:before{
    content: none;
  }

  a.a_demo_four{
    padding-right: 15px;
  }

  b.make-bold{
    font-weight: bold;
  }

  .text{
    min-height: 64px !important;
  }

</style>

<?php 
 $qtys = array(1,2,3,4,5,6,7,8,9,10);
?>

<div id="content" >
  <div class="cont border_top_solid">
    
    <div class="shopping">

       <?php 
        if (!empty($message)){
       ?>
        <div id="cart-status">
          <div class="alert alert-success"><b class="make-bold"><?php echo $message; ?></b></div>
        </div>
        <script type="text/javascript">
           (function($){
            $(function(){
              setTimeout(function(){
                $('#cart-status').slideUp();
              },3000);
            });
           })(jQuery);
        </script>
       <?php 
        }
       ?> 

      <div class="sh-cart">
       <?php 
        if (count($table) <= 0){
       ?>

<div class="alert alert-warning" style="margin-top:34px;" align="center">
  Your cart is empty, <a href="<?php echo BASE_URL; ?>product/search/" class="btn btn-success" style="color:#fff;">Continue Shopping...</a>
</div>


       <?php 
        }else{
       ?>

        <div class="shopping-2">
          <h5> shopping cart</h5>
          <div class="sh1 m-b-20"> Item</div>
        </div>


        <div class="shopping-3">
          <h5 >Order Summary</h5>
          <div class="sh1"> <span style="color:white;">Your option</span> <span  class="f-ri-text">Price</span></div>
        </div>
        <div class="clear"></div>
        <?php 
        //}
        foreach ($table as $k=>$v){
        ?>
        <div class=" shopping-2">
          <div class="0item item-close">
            <div class="imgiecss" style="display:inline-block;"> <img src="<?php echo BASE_URL; ?>product_images/<?php echo $v->image; ?>" /></div>
            <div class="text"> 
            <span class="item-h">
              <?php echo $v->product_name; ?>
            </span>
        <div class="item-hh m-t-50"><span class="item-h"><a  href="?cmd=product-remove_from_cart-<?php echo $v->id; ?>" class="DeleteFromCart" id="">
            <b class="make-bold">Remove Item</b></a></span></div>
            </div>
          </div>
        </div>
        <div  class=" shopping-3">
          <div class="os1 ">
            
            <?php 
             if (!empty($v->color)){
            ?>
            <div class="item-d">
              <div class="o-s-size">color :</div>
              <div class="o-s-size"><?php echo $v->color; ?></div>
            </div>
            <?php 
             }
            ?>
            
            <div class="item-d" style=" padding-left:10px;">
              <div class="o-s-size"><b class="make-bold">Quantity :</b></div>
              <div class="o-s-size">
               <select id="qty<?php echo $v->id; ?>" item-id="<?php echo $v->id; ?>" item-price="<?php echo $cart[$v->id]['price']; ?>">
                 <?php 
                  //$this->plugin->cart->add_to_cart($id,$price,$qty);
                  
                  $arr_cmd = array();

                  foreach ($qtys as $k1=>$v1){
                    if ($cart[$v->id]['qty']*1 === $v1*1){
                     $r = " selected=selected ";
                    }else{
                     $r = '';
                    }

                    $code = 'product-update_cart-' . $v->id . '-' . $cart[$v->id]['price'] . '-' . $v1;
    
                    $this->app->sess->cmd = $cmd;
                    //$code = base64_encode($code);
                 ?>
                 <option <?php echo $r; ?> value="<?php echo $v1; ?>"><?php echo $v1; ?></option>
                 <?php 
                  }
                 ?>
               </select>&nbsp;X&nbsp;<b style="font-weight:bold;"><?php echo number_format($cart[$v->id]['price']); ?></b>
               &nbsp;
               <script type="text/javascript">
                 (function($){
                  $(function(){

                    $('#qty<?php echo $v->id; ?>').on('change',function(){
                        
                        ///$this->plugin->cart->add_to_cart($id,$price,$qty);
                        //add($id,$price,$qty=1)
                        var price = $(this).attr('item-price');
                        var id = $(this).attr('item-id');
                        var url = '<?php echo BASE_URL; ?>';
                        //var url2 = 'product/view_basket?cmd=' + $(this).val();
                        var url2 = 'product/view_basket?cmd=product-update_cart-' + id + '-' + price + '-' + $(this).val();
                        var $stat = $('#stat<?php echo $v->id; ?>');
                        //var url2 = 'product/view_basket?cmd=product-update_cart-' + id + '-' + price + '-' + $(this).val();

                        //location.href = url + url2;
                        $stat.html('Updating ... ');
                        $.ajax({
                          url:url+url2,
                          type:'post',
                          success:function(dt){
                            location.href = location.href;
                          }
                        });


                    });

                  });
                 })(jQuery);
               </script>

                <b class="make-bold"><?php //echo $cart[$v->id]['qty']; ?></b>

              </div>
            </div>
            
          </div>
          <div class="os2 m-b-20">
            <div class="item-pg" style=" padding-left:10px;">
              <div class="o-p-size">
                <b class="make-bold">₦ <?php echo number_format($cart[$v->id]['price_tot']); ?></b>
                <br />
                <span id="stat<?php echo $v->id; ?>"></span>
              </div>
            </div>
          </div>
        </div>

        <?php 
         }
        ?>

        <div class="clear"></div>
      </div>
    </div>



    <div  class="shopping">
      <div class="sh-cart" style=" border:0px; margin-bottom:15px;">
        <div class="shopping-2 m-t-10 m-b-10">
          <div class="0item">
            <!-- <div style=" margin-top:152px;"> <a href="/slot/">
              <button type="button" class="btn-1">Continue Shopping</button>
              </a> </div> -->
          </div>
        </div>
        <div class="shopping-3 m-t-10 m-b-10">
          <div  style=" border-bottom:2px solid #333; min-height:90px; ">
            <div class="os11 ">
              <div class="item-d" style=" padding-left:10px;">
                <div class="o-sub-size">Sub total before delivery charges</div>
              </div>
            </div>
            <div class="os12 m-b-20">
              <div class="item-p" style=" padding-left:10px;">
                <div class="o-p-size"><b class="make-bold"> ₦ <?php echo number_format($tot_price); ?></b></div>
              </div>
            </div>
          </div>
          <div  style=" border-bottom:0px solid #333; min-height:90px; ">
            <div class="os11 ">
              <div class="item-d" style=" padding-left:10px;">
                <div class="o-sub-size" style=" font-size:18px;">Total cost</div>
              </div>
            </div>
            <div class="os12 m-b-20">
              <div class="item-p" style=" padding-left:10px;">
                <div class="o-p-size"><b class="make-bold"> ₦ <?php echo number_format($tot_price); ?></b></div>
              </div>
            </div>
            <div style=" margin-top:10px;">
              <a class="a_demo_four" id="" href="<?php echo BASE_URL; ?>product/checkout" style="color:#fff;">Proceed to checkout</a>
            </div>
          </div>
        </div>
      </div>
    </div>


    <?php 
      }
    ?>
    
    
  </div>
</div>



<script type="text/javascript">
   
   (function($){

    $(function(){


                $('.update_cart').each(function(){
                  $(this).on('click',function(){
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



          });


    });

   })(jQuery);

</script>




