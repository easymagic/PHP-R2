<?php 

  
  //print_r($months);
  
  function grouper($arr){

  $months = array();

  $months['01'] = 'Jan';
  $months['02'] = 'Feb';
  $months['03'] = 'Mar';
  $months['04'] = 'Apr';
  $months['05'] = 'May';
  $months['06'] = 'Jun';
  $months['07'] = 'Jul';
  $months['08'] = 'Aug';
  $months['09'] = 'Sep';
  $months['10'] = 'Oct';
  $months['11'] = 'Nov';
  $months['12'] = 'Dec';

    //global $months;

    //print_r($months);

    //print_r(array());

    $track = array();
    $r = array();

    foreach ($arr as $k=>$v){
      $t = explode(' ', $v->date_created);
      $t = $t[0];
      $t = explode('-', $t);
      
      $m = $t[1]; //extract the month data.

      //$t = trim($t[0]);

      if (in_array($m, $track)){
        $r[$m]["total_amount"]+= ($v->grand_total);
      }else{
        $track[] = $m;
        $r[$m] = array("month"=>$months[$m],"total_amount"=>$v->grand_total);
      }


    }

    return $r;
  } 


  //print_r($item_orders); 

  $item_orders = grouper($item_orders);

  //print_r($item_orders);

?>

          <section class="content" style="min-height: 0;">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-android-watch"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Products</span>
                  <span class="info-box-number"><?php echo $total_products; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Orders</span>
                  <span class="info-box-number"><?php echo $total_order; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-checkmark"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Completed Orders</span>
                  <span class="info-box-number"><?php echo $completed_orders; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->




            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-checkmark"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Members</span>
                  <span class="info-box-number"><?php echo $member_count; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->




          </div><!-- /.row -->

          </section>






  
  <section class="content" style="padding-right:11px;">
    <div class="col-xs-12" id="chartContainer" style="height: 300px; width: 90%;">
      Graph...
    </div>
    <script type="text/javascript">
      var plots = [];

      //var 

      (function($){
        $(function(){

          
          <?php 
           foreach ($item_orders as $k=>$v){
          ?>
           plots.push({
            label:'<?php echo $v['month']; ?>',
            y:<?php echo $v['total_amount']; ?>
           });
          <?php 
           }
          ?>




          var tot_sale = 0;
          var new_plot = [];

          $.each(plots,function(k,v){
             
             


          });
         

//Better to construct options first and then pass it as a parameter
/*

        { label: 'Jan', y: 10 },
        { label: 'Feb', y: 12 },
        { label: 'Mar', y: 8 },
        { label: 'Apr', y: 14 },
        { label: 'May', y: 6 },
        { label: 'Jun', y: 24 },
        { label: 'Jul', y: -4 },
        { label: 'Aug', y: 10 }


*/
  var options = {
    title: {
      text: "Transaction/Sales Trend"
    },
   animationEnabled: true,
   axisX: {
        labelAngle: -45
      },                
    data: [
    {
      type: "spline", //change it to line, area, column, pie, etc
      dataPoints: plots
    }
    ]
  };

  $("#chartContainer").CanvasJSChart(options);


        });
      })(jQuery);
    </script>
    <div style="clear: both;">&nbsp;</div>
  </section>













