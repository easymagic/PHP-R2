<?php 
 function control_null($v){
  if ($v == 'null'){
    return '';
  }else{
  	return $v;
  }
 }
?>
<style type="text/css">
	div label{
		margin-top: 8px;
	}
</style>
<div class="col-xs-12">
	<div class="col-xs-12">
      <h2 style="margin-bottom: 11px;text-transform: uppercase;font-weight: bold;color: #484452;">Order Form</h2>		
	</div>
	<div class="col-xs-12" align="right">
		<b style="font-size: 23px;font-weight: bold;">Transaction-ID:&nbsp;#<?php echo $transaction_id; ?></b>
	</div>
</div>

<div class="col-xs-12" style="padding: 14px;border: 1px solid #ccc;background-color: #F9F9F9;">
<form method="post" id="form_order">

 <div class="col-xs-6">
	<div class="col-xs-12">
		<label>Full Name</label>
	</div>
	<div class="col-xs-12">
		<input class="form-control" name="full_name" value="<?php echo control_null($profile->first_name); ?>  <?php echo control_null($profile->last_name); ?>" />
	</div> 	
 </div>	

 <div class="col-xs-6">
	<div class="col-xs-12">
		<label>Delivery Area</label>
	</div>
	<div class="col-xs-12">
		<select class="form-control" name="delivery_area"><?php echo $delivery_area; ?></select>
	</div> 	
 </div>	


 <div class="col-xs-6">
	<div class="col-xs-12">
		<label>Delivery Address 1</label>
	</div>
	<div class="col-xs-12">
		<input class="form-control" name="delivery_address1" value="<?php echo $profile->address; ?>" />
	</div> 	
 </div>	


 <div class="col-xs-6">
	<div class="col-xs-12">
		<label>Delivery Address 2</label>
	</div>
	<div class="col-xs-12">
		<input class="form-control" name="delivery_address2" value="<?php echo $profile->address2; ?>"/>
	</div> 	
 </div>	


 <div class="col-xs-6">
	<div class="col-xs-12">
		<label>Country</label>
	</div>
	<div class="col-xs-12">
	    <select class="form-control" name="country"><?php echo $country; ?></select>
	</div> 	
 </div>	


 <div class="col-xs-6">
	<div class="col-xs-12">
		<label>City</label>
	</div>
	<div class="col-xs-12">
		<input class="form-control" name="city" value="<?php echo $profile->city; ?>" />
	</div> 	
 </div>	


 <div class="col-xs-6">
	<div class="col-xs-12">
		<label>Phone</label>
	</div>
	<div class="col-xs-12">
		<input class="form-control" name="phone" value="<?php echo control_null($profile->phone_number); ?>" />
	</div> 	
 </div>	


 <div class="col-xs-6">
	<div class="col-xs-12">
		<label>E-mail</label>
	</div>
	<div class="col-xs-12">
		<input class="form-control" name="email" value="<?php echo control_null($profile->email); ?>" />
	</div> 	
 </div>	


 <div class="col-xs-6">
	<div class="col-xs-12">
		<label>Delivery Time</label>
	</div>
	<div class="col-xs-12">
	  <select class="form-control" name="delivery_time"><?php echo $delivery_time; ?></select>
	</div> 	
 </div>	



 <div class="col-xs-6">
	<div class="col-xs-12">
		<label>Preferred Delivery</label>
	</div>
	<div class="col-xs-12">
	    <select class="form-control" name="preferred_delivery"><?php echo $preferred_delivery; ?></select>
	</div> 	
 </div>	



<style type="text/css">
	.fl *{
      float: left !important;
      margin-top: 10px;
      display: inline-block;
	}
</style>


 <div class="col-xs-12">
	<div class="col-xs-12 fl">


  

   <select id="pmt_type" style="padding: 12px;margin-right: 4px;">
   	<option value="null">--Select Payment Type ---</option>
   	<option value="gtpay">GTPay</option>
   	<option value="netpluspay">NetPlusPay</option>
   </select>



	    <button type="button" id="make-payment" class="btn btn-success" style="display: none;color: #fff;font-size: 23px;">Proceed To Pay <?php echo $this->app->plugin->currency->get_currency() . number_format($cart_total['tot_price']); ?>&nbsp;<span id="with_who" style="float: right !important;margin-top: 0;color: #333;text-shadow: 2px 2px 2px #777;"></span></button>


    
    <!--
     <span style="display: none;" id="gtpay">
       <img src="<?php echo BASE_URL; ?>images/pmt/gtpay_logo.png" style="height: 45px;max-width: 100%;max-height: 100%;margin-top: 0;border-radius: 11px;" />	
     </span>

     <span style="display: none;" id="netpluspay">
       <img src="<?php echo BASE_URL; ?>images/pmt/netpluspay_logo.jpg" style="height: 45px;max-width: 100%;max-height: 100%;margin-top: 0;border-radius: 11px;margin-left: 3px;"/>	
     </span>
     //-->
     


     


	</div> 	
 </div>	

<script type="text/javascript">
  var payment_type = 'gtpay';
	(function($){
      $(function(){
        
        var $gtpay = $('#gtpay');
        var $netpluspay = $('#netpluspay');
        var $make_payment = $('#make-payment');

        function _hide_all(){
        	$gtpay.hide();
        	$netpluspay.hide();
        	$make_payment.hide();
        }

     
       var with_ = {};
            with_['gtpay'] = ' With GTPay';
            with_['netpluspay'] = ' With NetPlusPay';


 
        $('#pmt_type').on('change',function(){
          _hide_all();

          if ($(this).val() !== 'null'){
            $('#' + $(this).val()).show();
            $('#with_who').html(with_[$(this).val()]);
            payment_type = $(this).val();
            $make_payment.show();
          }
        });



      });
	})(jQuery);
</script>



<!-- Payment gateway start//-->
 <div class="col-xs-12">
	    <span id="status" style="display: none;">
	    	<!--<img src="<?php echo BASE_URL; ?>images/loading.gif" style="width:32px;height:32px;" />//-->
	    	Loading Payment Gateway ...
	    </span> 	
 </div>
 <!-- Payment gateway stop//-->


</form>
</div>


<div style="clear:both;">&nbsp;</div>

<span id="payment-poll"></span>

<script type="text/javascript">
	(function($){
		$(function(){
          
         function load_gtpay(){
               var data = $('#form_order').serialize();
               var $ref = $(this);

               $ref.attr('disabled','disabled');

               $('#status').show();
             
               $.ajax({
                url:'<?php echo BASE_URL; ?>item_order_controller/update',
                data:data,
                type:'post',
                success:function(dt){
                  if (dt === 'ok'){
                     //redirect to payment gway
                     $ref.removeAttr('disabled');
                     $('#status').hide();

                     $.ajax({
                     	url:'<?php echo BASE_URL; ?>payment/get_payment_gateway',
                     	data:data,
                     	type:'post',
                     	success:function(dt){
                     		
                     		$('#payment-poll').html(dt);

                     		$('#gtpay-id').trigger('submit');

                     	}
                     });

                     //location.href = '<?php echo BASE_URL; ?>payment/choose_payment_option';

                  }
                }
               });

         }

         function load_netplus_pay(){

               var data = $('#form_order').serialize();
               var $ref = $(this);

               $ref.attr('disabled','disabled');

               $('#status').show();
             
               $.ajax({
                url:'<?php echo BASE_URL; ?>item_order_controller/update',
                data:data,
                type:'post',
                success:function(dt){
                  if (dt === 'ok'){
                     //redirect to payment gway
                     $ref.removeAttr('disabled');
                     $('#status').hide();

                     $.ajax({
                     	url:'<?php echo BASE_URL; ?>payment/get_payment_gateway_netplus', //get_payment_gateway_netplus
                     	data:data,
                     	type:'post',
                     	success:function(dt){
                     		
                     		$('#payment-poll').html(dt);

                     		$('#netplus-pay-id').trigger('submit');

                     	}
                     });

                     //location.href = '<?php echo BASE_URL; ?>payment/choose_payment_option';

                  }
                }
               });


         }

         //payment_type

           //$('form').serialize()
           $('#make-payment').on('click',function(){
               

              if (payment_type == 'gtpay'){
                load_gtpay.apply(this,[]);
              }else if (payment_type == 'netpluspay'){
                load_netplus_pay.apply(this,[]);
              }

              return false;

           
           });

		});
	})(jQuery);
</script>
