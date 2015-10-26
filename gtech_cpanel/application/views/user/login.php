<html>
     <head>
          <meta charset="UTF-8">
          <title>General Tech | Log in</title>
          <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
          <!-- Bootstrap 3.3.2 -->
          <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
          <!-- Font Awesome Icons -->
          <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
          <!-- Theme style -->
          <link href="<?php echo base_url('assets/css/cpanel.min.css'); ?>" rel="stylesheet" type="text/css" />
          <!-- iCheck -->
          <link href="<?php echo base_url('assets/css/blue.css'); ?>" rel="stylesheet" type="text/css" />
     </head>
     <body class="login-page">
          <div class="login-box">
               <div class="login-logo">
                    <a href="../../index2.html"><b>General Tech</b></a>
               </div>
               <!-- /.login-logo -->
               <div class="login-box-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    <?php echo form_open('login', array('class' => 'form-signin')) ?>
                         <div class="form-group has-feedback">
                              <!--<input type="text" class="form-control" placeholder="Email"/>-->
                              <?php echo form_input($identity) ?>
                              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                         </div>
                         <div class="form-group has-feedback">
                              <!--<input type="password" class="form-control" placeholder="Password"/>-->
                              <?php echo form_input($password) ?>
                              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                         </div>
                         <div class="row">
                              <div class="col-xs-8">    
                                   <div class="checkbox icheck" style="margin-left: 20px;">
                                        <label>
                                             <input type="checkbox" name="remember" value="1"> Remember Me
                                        </label>
                                   </div>                        
                              </div><!-- .col -->
                              <div class="col-xs-4">
                                   <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                              </div><!-- .col -->
                         </div>
                    <?php echo form_close() ?>
<!--                    <a href="#">I forgot my password</a><br>
                    <a href="register.html" class="text-center">Register a new membership</a>-->
               </div><!-- login-box-body -->
          </div><!-- login-box -->
          <!-- Bootstrap 3.3.2 JS -->
          <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
          <!-- iCheck -->
          <script src="<?php echo base_url('assets/js/icheck.min.js'); ?>" type="text/javascript"></script>
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
</html>