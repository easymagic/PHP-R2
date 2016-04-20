<style type="text/css">
  
.pr-prc:hover .prc{
  color: white;
}


</style>
<?php 
 foreach ($profile as $k=>$v){

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
        <div class="prdt_wrap col-xs-12 col-md-<?php echo $cls; ?> item">
            <!--<a href="<?php echo BASE_URL. 'product/detail/' .$pname.'/'.$v->id;?>"></a>//-->
            <div class="prdt_wrap_ins">
                <a style="font-size: 11px;" href="<?php echo BASE_URL. 'product/detail/' .$pname.'/'.$v->id;?>" title="<?php echo $v->product_name;?>">
                <div class="prdt_wrap_ins_img col-xs-12" style="padding: 0;">
                 
                  <img style="max-width: 100%;height: 208.063px;" src="<?php echo BASE_URL.$img;?>" />

                </div>
                </a>
                
                <div class="proo col-xs-12" style="padding: 0;">

                 

                  <div class=" col-xs-12 col-md-7" style="width: 100%; padding: 0 5px; font-size: 12px;margin-bottom: 4px;margin-top: 4px;">

                    <?php echo substr(ucwords(strtolower($v->product_name)),0,30); 
                        if(strlen($v->product_name) >20){
                          echo "...";
                        }
                    ?><br />
                  </div>

                    <div class=" col-xs-12 col-md-7" style=" width: 100%; padding: 0 5px; font-size: 15px; line-height: 35px; margin-bottom: 4px;margin-top: 4px;">
                    <?php 
                      if (!empty($v->discount_price)){
                     ?><span style="text-decoration: line-through;color:#ccc;">
                       &#x20a6;
                        <?php echo $currencyS1."&nbsp;".number_format($v->product_price);?>
                      </span>
                      &nbsp;/&nbsp;&#x20a6;<span class="prc"  style="font-weight: bolder;"><?php echo  number_format($v->discount_price);?></span><?php 
                      }else{
                      ?>
                      &#x20a6;<span class="prc" style="font-weight: bolder;"><?php echo "&nbsp;".number_format($v->product_price);?></span>
                     <?php
                      }
                   ?>
                   <div class="col-xs-12 col-md-4 pull-right" style="padding: 0; margin-top: 4px;margin-bottom: 4px; ">
                   <a style="font-size: 12px; color: white; " href="<?php echo BASE_URL. 'product/detail/' .$pname.'/'.$v->id;?>" class="btn btn-warning form-control">Buy Now</a>
                  </div>
                     
                   </div>

                 	
                  <div style="clear: both;"></div>
                 

                 <div style="clear: both;"></div>

                  
                  <!-- ($main->ShowPrice($AllPrdData->product_price))//-->

                </div>
            </div>
            
        </div>

<?php 
 }
?>