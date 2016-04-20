<style type="text/css">
	.media-box{
		margin-bottom: 33px;
	}

	#img-preview{
		width: 128px;
		height: 128px;
		margin-top: 6px;
	}
</style>
<section class="content">

<?php 
 //print_r($table);
 foreach ($table as $k=>$v){
 	//print_r($v);
 	//print_r($item_order_details);
 	//print_r($indexed_products);

?>	


<?php //include("header.php") ?>

      <!-- Content Wrapper. Contains page content -->
      
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Invoice
            <small>#<?php echo $v->transaction_id; ?></small>
          </h1>
          <!--
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Transaction records</a></li>
            <li class="active">Invoice</li>
          </ol>
          //-->
        </section>

        

        <!-- Main content -->
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> Vanbed, Enterprise.
                <small class="pull-right">Date: <?php echo date('d/m/y',$v->date_created) ; ?></small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              From
              <address>
                <strong><?php echo $company[0]->company_name; ?></strong><br>
                <?php echo $company[0]->company_address; ?><br>
                Phone: <?php echo $company[0]->company_phone; ?><br>
                Email: <?php echo $company[0]->company_email; ?>
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              To
              <address>
                <strong><?php echo $v->full_name; ?></strong><br>
                <?php echo $v->delivery_address1; ?><br>
                <?php echo $v->delivery_address2; ?><br>
                Phone: <?php echo $v->phone; ?><br>
                Email: <?php echo $v->email; ?>
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>Invoice #<?php echo $v->transaction_id; ?></b><br>
              <br>
              
              <b>Payment Due:</b> <?php echo date('d/m/y',$v->date_created) ; ?><br>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Qty</th>
                    <th>Product</th>
                    <!--<th>Serial #</th>//-->
                    <th>Description</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                 <?php 
                  foreach ($item_order_details as $k1=>$v1){
                    //print_r($indexed_products[$v1->product_id]);
                 ?>
                  <tr>
                    <td><?php echo $v1->qty; ?></td>
                    <td><?php echo $indexed_products[$v1->product_id]->product_name;// $v1->product_id; ?></td>
                    <!--<td>455-981-221</td>//-->
                    <td><?php echo $indexed_products[$v1->product_id]->product_detail;// $v1->product_id; ?></td>
                    <td><?php echo $this->app->plugin->currency->get_currency(); ?><?php echo number_format($v1->price_tot); ?></td>
                  </tr>
                 <?php 
                  }
                 ?> 
                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            
            <div class="col-xs-6">
              <p class="lead">Amount Due <?php echo $this->app->plugin->currency->get_currency(); ?>
                        <?php echo number_format($v1->price_tot); ?></p>
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:50%">Subtotal:</th>
                    <td><?php echo $this->app->plugin->currency->get_currency(); ?>
                        <?php echo number_format($v1->price_tot); ?></td>
                  </tr>
                .
                  
                  <!--
                  <tr>
                    <th>Shipping:</th>
                    <td>$5.80</td>
                  </tr>
                  //-->

                  <tr>
                    <th>Total:</th>
                    <td><?php echo $this->app->plugin->currency->get_currency(); ?>
                        <?php echo number_format($v1->price_tot); ?></td>
                  </tr>

                </table>

              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              <a href="<?php echo BASE_URL; ?>item_order/preview_print/<?php echo $item_order_id; ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
              
            </div>
          </div>
        </section><!-- /.content -->
        <div class="clearfix"></div>
      




<?php
 }
?>

</section>




<div style="clear: both;"></div>
<script type="text/javascript">
	(function($){
		$(function(){
			$('.img-group').each(function(){

				var $obj = $(this).find('#img-preview');

				$(this).find('#img-picker').on('change',function(){
				  $obj.html('loading ... ');	
                  var img_obj = new Image();
                      img_obj.onload = function(){
                        $obj.html('<img src="' + this.src + '" style="mmax-width:100%;max-height:100%;" />');
                      };
                      img_obj.src = "<?php echo BASE_URL; ?>/product_images/" + $(this).val();

				});

				$(this).find('#img-picker').trigger('change');

				



			});
		});
	})(jQuery);
</script>