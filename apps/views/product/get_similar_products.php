  <!-- similar products -->
    <div class="section">
        <div class="sidebar_title">Similar Products</div>
        
        
                <div class="box1">
                    <?php
                    //$PrdData1 = mysql_query("select * from products  where category=$category limit 4");
                    //while($AllPrdData = mysql_fetch_object($PrdData1))
                    //echo 'debug';
                    //print_r($products);

                     foreach ($products as $k=>$v)   
                    {
                        ?>
                       <div class="col-xs-12 col-md-3" style="padding: 0;">
                        <?php
                      
                      echo $product->profile($v->id);

                      ?>
                       </div>
                      <?php 
                    
                    }
                    ?>

                    <br class="clearfix" />

                    <div class="customNavigation">
                        <a id="products-prev" class="prev"></a>
                        <a id="products-next" class="next"></a>
                    </div>

                </div>
            
        
    </div>
  <!-- similar products end-->
