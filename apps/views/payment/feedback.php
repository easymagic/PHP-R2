<div class="col-xs-12">
	<div class="container">
		<div class="col-xs-12" style="margin-top: 24px;">
			<?php 
             //print_r($response);
			?>
			<div class="col-xs-12 col-md-6 col-md-offset-3">
			<div class="panel panel-<?php echo $cls; ?>">
				<div class="panel-heading" align="center">
					<b style="font-weight: bold;">Payment Gateway Response</b>
				</div>

				<div class="panel-body">
					

					<div class="alert alert-<?php echo $cls; ?>" align="center">
					  
					  <div class="col-xs-12" style="margin-bottom: 5px;">
					  	<b style="font-weight: bold;">
               <?php 
                if ($response->ResponseCode == 'Z6'){
                  echo 'Transaction Cancelled.';
                }else if ($response->ResponseCode == '91'){
                  echo 'System/Network Error';
                }else{
                  echo $message;
                }
               ?>
              

              </b>
					  </div>
					  <div class="col-xs-12">
					  	<?php 
                         if ($this->app->lib->sess->success_detail !== 'null'){
                         	$success_detail = $this->app->lib->sess->success_detail;
                            extract($success_detail);
                        ?>
                         <div class="col-xs-12">
                         	<b style="font-weight: bold;margin-bottom: 6px;display: inline-block;">
                         	 Transaction-ID:&nbsp;
                         	</b>
                         	 <?php echo $transaction_id; ?>
                         </div>
                         <div class="col-xs-12">
                          <b style="font-weight: bold;margin-bottom: 6px;display: inline-block;">
                           Amount:&nbsp;
                          </b> 
                          <?php echo $grand_total; ?>
                         </div>

                         <div class="col-xs-12">
                          <b style="font-weight: bold;margin-bottom: 6px;display: inline-block;">
                           Full Name:&nbsp;
                          </b> 
                          <?php echo $full_name; ?>
                         </div>


                        <?php 
                          //print_r($success_detail);
                        ?>
                        <?php  	
                         }
					  	?>
					  </div>
						
            <div style="clear: both;">&nbsp;</div>
					</div>


				</div>
			</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	(function($){
		$(function(){

/*
     $data['mertid'] = self::MERCHANT_ID;
     $data['amount'] = $amount*100;
     $data['tranxid']  = $transaction_id;
     $data['hash'] = $this->compute_hash_for_requery($data['mertid'],$data['tranxid']);
     $data['url'] = self::GATEWAY_TRANX_CHECK_URL;
*/
           

 var mertid = '<?php echo $mertid; ?>';
 var amount = '<?php echo $amount; ?>';
 var tranxid = '<?php echo $tranxid; ?>';
 var hash = '<?php echo $hash; ?>';

/* 
 var response = '<?php echo $response; ?>';
*/

 var req = {
 	mertid:mertid,
 	amount:amount,
 	tranxid:tranxid,
 	hash:hash
 };

/*
 $.ajax({
 	url:url,
 	type:'get',
 	data:req,
 	success:function(dt){
      console.log(dt);
 	}
 });
 */



		});
	})(jQuery);
</script>