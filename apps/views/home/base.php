<!DOCTYPE html>
<html>
<head>
  <title>Welcome To School Arena</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, height=device-height, target-densitydpi=device-dpi" />
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>css/base.css" />
  <script type="text/javascript" src="<?php echo BASE_URL; ?>js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo BASE_URL; ?>js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo BASE_URL; ?>js/moment.js"></script>
  
</head>
<body>
<?php 
 echo $header;
 ?>
 <div class="col-xs-12 content">
   <div class="container">
     <div class="col-xs-12">

        <?php  
         echo $content;
        ?>
       
     </div>
   </div>
 </div>
<?php  
 echo $footer;
?>
</body>
</html>