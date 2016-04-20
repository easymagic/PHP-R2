<?php 
 echo $header;
?>
<?php 
 echo $content;
?>
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
    echo $footer;
  ?>
</body>
</html>