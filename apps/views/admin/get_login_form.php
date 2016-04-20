  <body class="hold-transition login-page">

  <div class="login-box">
      <div class="login-logo">
         <img src="<?php echo BASE_URL; ?>images/admin/logo.png" width="250" height="80">
      </div><!-- /.login-logo -->
      <div class="login-box-body">
       <?php 
        if (isset($message) && !empty($message)){
       ?>
        <div id="msg-status" class="alert alert-danger"><?php echo $message; ?></div>
        <script type="text/javascript">
          (function($){
            $(function(){

               setTimeout(function(){
                $('#msg-status').slideUp();
               },5000);

            });
          })(jQuery);
        </script>
      <?php 
        }
      ?>
        <p class="login-box-msg">Login as Admin</p>
        <form action="" method="post">
          <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
              <input type="hidden" name="cmd" value="admin-login_action"  />
            </div><!-- /.col -->
          </div>
        </form>


        <a href="#">I forgot my password</a><br>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo BASE_URL; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo BASE_URL; ?>bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo BASE_URL; ?>plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
</body>