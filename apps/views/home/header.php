<?php
 //require_once('main_header.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Vanbed Watches, Shop Now ...</title>
<link rel="shortcut icon" type="image/png" href="images/icon.png"/>

<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>css/bootstrap.min.css">

<link href="<?php echo BASE_URL;?>css/reset.css" rel="stylesheet" type="text/css">
<link href="<?php echo BASE_URL;?>css/main.css" rel="stylesheet" type="text/css">
<link href="<?php echo BASE_URL;?>css/responsive.css" rel="stylesheet" type="text/css">
<link href="<?php echo BASE_URL;?>css/nivo-slider.css" rel="stylesheet" type="text/css">
<link href="<?php echo BASE_URL;?>themes/default/default.css" rel="stylesheet" type="text/css" media="screen" />
<link href='https://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>

<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- quickview product -->
<link rel="stylesheet" href="<?php echo BASE_URL;?>css/quickview-reset.css"> <!-- CSS reset -->
<link rel="stylesheet" href="<?php echo BASE_URL;?>css/quick-view.css"> <!-- Resource style -->
<script src="<?php echo BASE_URL;?>js/modernizr.js"></script> <!-- Modernizr -->

<script src="<?php echo BASE_URL;?>js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL;?>js/jquery.nivo.slider.js" type="text/javascript"></script>

<script src="<?php echo BASE_URL;?>js/jquery.canvasjs.min.js" type="text/javascript"></script>

<!-- splash screen -->
<link href="<?php echo BASE_URL;?>css/colorbox.css" rel="stylesheet" type="text/css">


<!-- Carousel()//-->
<link rel="stylesheet" href="<?php echo BASE_URL;?>css/owl.carousel.css"> <!-- CSS reset -->


<!-- Carousel//-->
<script src="<?php echo BASE_URL;?>js/owl.carousel.js" type="text/javascript"></script>


<!-- hscroll//-->
<script src="<?php echo BASE_URL;?>js/hscroll.js" type="text/javascript"></script>


<style type="text/css">
  
@media(max-width: 768px){
  
  .prdt_wrap{
    width: 100% !important;
  }

}  

</style>


<style type="text/css">
 a:hover{
    text-decoration: none;
 }    

 nav>ul>li>a:hover{
    color: #fff;
 }

 *:before,*:after{
    content: none;
 }

.glyphicon {
    position: relative;
    top: 1px;
    display: inline-block;
    font-family: 'Glyphicons Halflings' !important;
}     

button,input{
  border-radius: 0 !important;
}

.r2-nav-fixed{
  position: fixed;
  z-index: 1000;
  background-color: rgba(10,10,10,0.4) !important;
}

.r2-nav-fixed .user-icon{
  color: #fff !important;
}

.r2-nav-fixed .user-drop-down-icon{
   color: #fff !important; 
}

.user-drop-down-box{
  display: none !important;
}

.user-drop-down-icon:hover .user-drop-down-box{
  display: inline-block !important;
}

.user-drop-down-box input{
  margin-bottom: 2px;
}



@media(min-width: 768px){

  .is-mobile{
    display: none; 
  }

}


@media(max-width: 768px){
  
  .is-desktop{
    display: none;
  }

  .correct-user-drop-down-box{
    margin-left: 96px;
  }


}




.box1 {
    min-height: 253px !important;
    margin-bottom: -119px !important;
}    


</style>

<script src="<?php echo BASE_URL;?>js/jquery.colorbox.js" type="text/javascript"></script>



<style type="text/css">
  .nivoSlider{
    height: 260px !important;
  }

  .nivoSlider img{
    max-height: 100% !important;
    /*max-width: 100% !important;*/
  }
</style>



<script type="text/javascript">
$(window).load(function() {
  $('#slider').nivoSlider();
});
</script>


</head>

<body>

<header>
<?php 
 //print_r($this->app->plugin->cart->get_cart());
?>

<style type="text/css">
    
    @media(max-width: 768px){
  
      .correct-cart{
        width: 100px !important;
      }

      .correct-search{
        margin-top: 1px !important;
      }

    }

    .r2-nav-fixed>div>div>div#tlogo{
      height: 56px;
    }

    .r2-nav-fixed>div>div>div#tsearch{
     margin-top: 0 !important;
     height: 56px;
    }



</style>

<!-- header logo start //-->
<div id="main-head" class="col-xs-12" style="background-color: #fff;padding:7px;">
  
  <div class="container">
    
    <div class="col-xs-12">
      


      <div class="col-xs-12" align="right" style="color: #aaa;"> 
        <span class="glyphicon glyphicon-earphone" style="color: #aaa; font-size: 12px;"></span>
        <span style="color: #444; font-size: 12px;">+234 809 999 9904 | +234 809 944 4383</span>
        <span class="glyphicon glyphicon-envelope"  style="color: #aaa; font-size: 12px;"></span>
        <span style="color: #444; font-size: 12px;">info@vanbedng.com</span>
      </div>


       <div class="col-xs-12 col-md-3" id="tlogo">
         <a href="<?php echo BASE_URL;?>"><img style="max-width: 100%;max-height: 100%" src="<?php echo BASE_URL;?>assets/<?php echo $logo; ?>" alt="home" /></a>
       </div>

       <div class="col-xs-12 col-md-9" style="margin-top: 22px;padding:0;" id="tsearch">
          
          <div class="col-xs-8 col-md-8" style="padding: 0;">
            
            <!-- search box start//-->  
<div class="input-group"> <input value="<?php echo $search_text; ?>" id="search_text" style="font-size: 15px;height: 35px;" type="text" class="form-control" placeholder="Search for..."> <span class="input-group-btn"> 
<button id="do_search" style="background-color: #4868B1;color: #fff;font-weight: 400;font-size: 15px;" class="btn btn-default" type="button">Go!</button> </span> </div>
            <!-- search box stop //-->
          
            <!-- search filter start //-->
<!--             <div class="col-xs-12" style="padding: 0;font-size: 14px;color: #555;text-align: right;">
              Filter by: Color&nbsp;<input type="checkbox" name="color" id="color" />&nbsp;
              Size&nbsp;<input type="checkbox" name="size" id="size" />              
            </div>
 -->            <!-- search filter stop //-->
          </div>


          <!-- cart start//-->
          <div class="col-xs-4 col-md-2" style="padding-right: 12px;padding-right: 0;">
            
           <!-- <span class="cart" id="cart_count" style="height: 11px;display: inline;color: #fff;font-weight: bold;">0</span> //-->
           <!-- glyphicon glyphicon-shopping-cart//-->     
           <a href="<?php echo BASE_URL; ?>product/view_basket">
            <span class="glyphicon glyphicon-shopping-cart" style="font-size: 26px;color: #F12C29;"></span>
            <span id="cart_count" class="badge" style="font-size: 13px;margin-top: -14px;"></span>
           </a>       

          </div>
          <!-- cart stop //-->

<style type="text/css">
  
  @media(min-width: 768px){
     
     .correct-signup-drop-down{
       left: -47px;
     }


  }

</style>

          <!-- member section (signin / signup) start//-->
          <div class="correct-signup-drop-down col-xs-12 col-md-2" style="margin-top: 4px;position: relative;padding: 0;">
            <!--<a href=""> //-->

             <a href="<?php echo BASE_URL; ?>home/dashboard/member/profile">
              <span class="glyphicon glyphicon-user user-icon" style="color: #4868B1;"></span>
             </a>

             <span class="glyphicon glyphicon-triangle-bottom user-drop-down-icon" style="display: inline-block;font-size: 11px;color: #777;position: relative;">
               
                   <form method="post" action="<?php echo BASE_URL; ?>home/signin">
                   <div class="user-drop-down-box correct-user-drop-down-box" style="position: absolute;display: inline-block;width: 200px;height: auto;;z-index: 900;left:-173px;top: 12px;padding:5px;border:1px solid #ccc;background-color: #fff;">

                      <?php 
                       if (!$is_logged){
                      ?>

                      <div class="col-xs-12" style="padding:0;">
                        <input class="form-control" placeholder="Email" name="email" />
                      </div>
                      <div class="col-xs-12" style="padding:0;">
                        <input class="form-control" placeholder="Password" type="password" name="password" />
                      </div>
                      <div class="col-xs-12" style="padding: 0;">
                        <button class="btn btn-primary form-control">Signin</button>
                        <input name="cmd" value="home-signin_action" type="hidden" />
                      </div>

                      <div class="col-xs-12" style="padding: 0;" align="center">
                        OR
                      </div>


                      <div class="col-xs-12" style="padding: 0;">
                        <a href="<?php echo BASE_URL; ?>home/signup" class="btn btn-primary form-control">Register</a>
                      </div>

                      <div class="col-xs-12" style="padding: 0;">
                        <a href="<?php echo BASE_URL; ?>home/passrecover">Forgot password?</a>
                      </div>

                      <?php 
                       }else{
                      ?>
                       <a href="<?php echo BASE_URL; ?>home/dashboard/member/profile" class="btn btn-default form-control" style="margin-bottom: 3px;">Dashboard</a>
                       <a href="?cmd=member-logout_action" class="btn btn-danger form-control">Log-Out</a>
                      <?php 
                       }
                      ?>
                     
                     
                   </div>
                   </form>

             </span>
            <!-- </a> //-->
          </div>

          <!-- member section (signin / signup) stop //-->





       </div>


    </div>


  </div>


</div>
<!-- header logo stop //-->


<!-- responsive bar start//-->
<div class="col-xs-12 is-mobile" style="background-color: #333;height: 32px;">
  <div class="container">
    <div class="col-xs-12">
      <span id="menu-toggle" class="pull-right glyphicon glyphicon-menu-hamburger" style="color: #fff;font-size: 24px;padding: 4px;"></span>
    </div>
  </div>
</div>
<script type="text/javascript">
  (function($){
    $(function(){
      var up = true;
      $('#menu-toggle').on('click',function(){
        
        if (up){
         up = false;
         $('.is-desktop').slideDown();
        }else{
         up = true;
         $('.is-desktop').slideUp(); 
        }

      });
    });
  })(jQuery);
</script>
<!-- responsive bar stop//-->


<!-- navigation/header start //-->


<div class="col-xs-12 is-desktop" style="background-color: #333333;border-bottom: 2px solid #f72525;">
  
  <div class="container">
    
    <div class="col-xs-12">
      
     <?php echo $nav; // $tags; ?>

    </div>


  </div>


</div>

<!-- navigation/header stop //-->

<div style="clear: both;"></div>


<!-- mobile coding header -->


<!--
<div class="mobile">
    <div class="header_top">
            <div class="section1">

                <div class="logo1">
                    <a href="<?php echo BASE_URL;?>"><img src="<?php echo BASE_URL;?>images/logo2.jpg" alt="home" /></a>
                </div>

                <div class="sec_nav1">
                    <div class="cart_link">
                    <span class="cart">0 Item(s)</span>
                </div>
                </div>

                

                <div class="search_wrap2">

                </div>

                <br class="clearfix" />
            </div>
    </div>
</div>
//-->
<!-- mobile coding header -->


    
    
   <!--
    <div class="header_nav">
        <div class="section">
            <div class="main_nav">
                <nav>
                    <ul>
                      <?php echo $tags; ?>

                    </ul>
            <div class="handle">Menu<img src="<?php echo BASE_URL;?>images/menu.png"/></div>

                </nav>
            </div>

            
        </div>
    </div>
    //-->

</header>

<script>
        $('.handle').on('click', function(){
            $('nav ul').toggleClass('showing');
        })
    </script>



                    <script type="text/javascript">
                      (function($){
                        $(function(){

                           var url = '<?php echo BASE_URL; ?>product/search/';

                           function _do_search(){
                             var search_text = $('#search_text').val();
                             
                             var color = ($('#color').is(':checked'))? true : false;
                             var size = ($('#size').is(':checked'))? true : false;

                             var query = '?';

                             if (color){
                               query+='color=on&';
                             }


                             if (size){
                               query+='size=on';
                             }


                             location.href = url + search_text + query;
                           }
                            
                            $('#search_text').on('keyup',function(e){
                                
                                
                                //console.log(e);
                                if (e.keyCode === 13){ //enter key was pressed
                                    
                                    _do_search();

                                }

                            });

                            
                            $('#do_search').on('click',function(){
                                _do_search();
                            });


                   

                         /*
                         position: fixed;z-index: 1000
                         */

                          var $obj_main_head = $('#main-head');
                          var $win = $(window);


                          // setInterval(function(){

                          //   if ($win.width() > 768){

                          //     //waiting for code edit...
                          //      if ($win.scrollTop() >= 152){
                          //         $obj_main_head.addClass('r2-nav-fixed'); 
                          //      }else{
                          //         $obj_main_head.removeClass('r2-nav-fixed'); 
                          //      }

                          //   }
                           

                          // },100);







                      
                      ///check for initializations ... 
                      <?php 
                        if (isset($_REQUEST['color'])){
                          $color = 1;
                        }else{
                          $color = 0;  
                        }


                        if (isset($_REQUEST['size'])){
                          $size = 1;
                        }else{
                          $size = 0;  
                        }
                      ?>

                      var size = '<?php echo $size; ?>';
                      var color = '<?php echo $color; ?>';

                      if (size == '1'){
                       $('#size').trigger('click');
                      }

                      if (color == '1'){
                       $('#color').trigger('click');
                      }








                        });
                      })(jQuery);
                    </script>
