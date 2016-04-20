<style type="text/css">
 .added-preview > div, .added-preview  div.added-preview{
   height: 44px;

 }

 .added-preview > div > div > div{
  padding-top: 12px;		
 }

@media(max-width: 768px){
 .correct-added-noti{
   margin-top: 3px;
   margin-bottom: 3px;
 }
}
 
</style>
<?php
 //product_images
//$v->image
foreach ($products as $k=>$v){
?>
<div class="col-xs-12 added-preview" style=";border:1px solid  #ccc;padding:0;">
	
   
   	 <div class="col-md-1 col-xs-12 correct-added-noti" style="padding:0;">

   	  <div style="width:53px;" class="added-preview">
   	 	
   	 	 <img style="max-width:100%;max-height:100%;" src="<?php echo BASE_URL; ?>product_images/<?php echo $v->image; ?>">


   	  </div>


   	 </div> 

   	 <div class="col-xs-12 col-md-7" style="border-left: 1px solid #ccc;padding:0;background-color:#ccc;">
   	   <div>
   	    <div>
   	 	&nbsp;<span style="color:green;font-weight:bold;">Added to your cart</span>&nbsp;/&nbsp;Sub-Total&nbsp;&#x20a6;<b style="font-weight:bold;"><?php echo number_format($cart_metta['tot_price']); ?>&nbsp;(<?php echo $cart_metta['tot']; ?>)</b>
   	 	</div>
   	   </div>	
   	 </div>

   	 <div class="col-xs-12 col-md-4" style="border-left: 1px solid #ccc;">
   	   <div>
   	    <div style="padding-top:6px;">
   	 	 &nbsp;
   	 	 <button class="btn btn-error" id="added_preview_cancel">Cancel</button>
   	 	 &nbsp;
          <a href="<?php echo BASE_URL; ?>product/view_basket" class="btn btn-primary" style="color:#fff;">View Basket</a>
          &nbsp;
   	 	 <a href="<?php echo BASE_URL; ?>product/checkout" class="btn btn-warning">Check out</a>
   	 	</div>
   	   </div>
   	 </div>
   

</div>
<?php 
 }
?>