
  
        <div class="prdt_detail_side">
          <div class="sidebar_title">Suggested Products</div>
          <?php
             foreach ($products as $k=>$v) 
            {
            $pname = $v->product_name;
            $pname = explode(' ', $pname);
            $pname = implode('-', $pname);              
            ?>
          <a href="<?php echo BASE_URL; ?>product/detail/<?php echo $pname; ?>/<?php echo $v->id; ?>">         
          <div class="prdt_side_itm"> <img src="<?php echo BASE_URL."product_images/".$v->image?>" />
            <p style="font-size: 12px;"><?php echo substr(ucwords(strtolower($v->product_name)),0,30); 
                        if(strlen($v->product_name) >20){
                          echo "...";
                        }
                    ?>
            <p class="red">


                   <?php 
                    if (!empty($v->discount_price)){
                   ?>
                    
                    <span style="text-decoration: line-through;color: #ccc;">
                      &#x20a6;
                      <?php echo $currencyS1."&nbsp;".number_format($v->product_price);?>
                    </span><br />
                    &nbsp;&nbsp;&#x20a6;<?php echo number_format($v->discount_price);?>
                   <?php 
                    }else{
                    ?>
                    &#x20a6;<?php echo $currencyS1."&nbsp;".number_format($v->product_price);?>
                   <?php
                    }
                   ?>                    


            </p>
          </div>
          </a>
          <?php
            }
          ?>
        </div>

        <br class="clearfix" />
