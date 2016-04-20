    <?php 
      //echo BASE_URL;
    ?>
    <div class="cont border_top_dash">
        <div class="cont_top">
        <div class="cont_tag">NEW PRODUCTS</div>
        </div>
        <div class="box1">
        <?php
    //$PrdData = mysql_query("select * from products  where id!='' AND FIND_IN_SET('FEATURED PRODUCTS', tags) limit 4");
        foreach ($products as $k=>$v)    
    {
      $currencyS1= '';//$main->getCurrency($AllPrdData->currency);
      //$pname = $main->FormatPr($AllPrdData->product_name);
            $pname = $v->product_name;
            $pname = explode(' ', $pname);
            $pname = implode('-', $pname);

      if($v->image=='')
      {
        $img = 'images/_no_image.png';
      }
      else
      {
        $img = "product_images/".$v->image;
      }

      ?>
        <div class="prdt_wrap">
            <a href="<?php echo BASE_URL.$pname.'/'.$v->id;?>">
            <div class="prdt_wrap_ins">
                <div class="prdt_wrap_ins_img"><img src="<?php echo BASE_URL.$img;?>" /></div>
                <div class="proo">
                  <p class="normal" style="text-align:center;"><?php echo ucwords(strtolower($v->product_name)); ?></p>
                  <p class="price" style="text-align:center;">&#x20a6;<?php echo $currencyS1."&nbsp;".number_format($v->product_price);?></p>
                  <!-- ($main->ShowPrice($AllPrdData->product_price))//-->
                </div>
            </div>
            </a>
        </div>
        <?php
        }
        ?>
        <br class="clearfix" />
      </div>

    </div>
    <br class="clearfix" />
