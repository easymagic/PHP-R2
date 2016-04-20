<div id="content">
  
    <div class="extra_body">
      <div class="extra_commands">
        <div class="menu_header">Order Summary</div>
        <div class="clear"></div>
      </div>
    </div>
    <div id="page-wrap">

<?php 
 if ($item_order_id === _NULL_){
?>
<div class="alert alert-warning" style="margin-top:70px;" align="center">
  Your cart is empty, <?php //echo $this->app->sess->item_order_id; ?><a href="<?php echo BASE_URL; ?>product/search/" class="btn btn-success" style="color:#fff;">Continue Shopping...</a>
</div>
<?php 
 }else{
?>

<style type="text/css">
  table.table tr  th{
    background-color: #484452;
    color: #fff;
  }
</style>
<table class="table table-striped" style="margin-top:25px;">
  <tr>
    <th>Product Name</th>
    <th>Qty</th>
    <th>&nbsp;</th>
    <th>Unit Price</th>
    <th>Totals</th>
  </tr>
  <?php 
    foreach ($table as $k=>$v){
  ?>
  <tr>
    <td><?php echo $v->product_name; ?></td>
    <td><?php echo $cart[$v->id]['qty']; ?></td>
    <td>&nbsp;X&nbsp;</td>
    <td><?php echo number_format($cart[$v->id]['price']); ?></td>
    <td><?php echo number_format($cart[$v->id]['price_tot']); ?></td>
  </tr>
  <?php 
    }
  ?>

  <tr>
    <td style="font-weight: bold;">Grand Total</td>
    <td style="font-weight: bold;"><?php echo $cart_total['tot']; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td style="font-weight: bold;"><?php echo $this->app->plugin->currency->get_currency() . number_format($cart_total['tot_price']); ?></td>
  </tr>

</table>


<div class="col-xs-12">
  <?php echo $order_form; ?>
</div>

<?php 
 }
?>



    </div>
    </div>


<div style="clear:both;">&nbsp;</div>
<div style="clear:both;">&nbsp;</div>
