<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<style>
    body{
      background-image: url('<?php echo base_url("assets/dist/img/FC.jpg")?>');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .login-logo a{
      color: black;
      font-size: 4rem;
    }
  </style>
  <body>
  <div class="login-box">

    <!-- /.login-logo -->
    <div class="login-box-body">
    <div class="login-logo">
      <a href="#"><b>Ferndale Colleges</b> EMS</a>
    </div>
      <p class="login-box-msg">REGISTER FORM</p>

      <?php echo form_open('Home/register'); ?>
        <div class="form-group has-feedback">
          <input type="text" name="txtempid" class="form-control" placeholder="Employee ID">
          <span class="glyphicon ion-pound form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" name="txtfirstname" class="form-control" placeholder="First Name">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" name="txtlastname" class="form-control" placeholder="Last Name">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" name="txtphonenumber" class="form-control" placeholder="Phone Number">
          <span class="glyphicon ion-ios-telephone form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" name="txtusername" class="form-control" placeholder="Username/Staff Email">
          <span class="glyphicon ion-at form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="txtpassword" class="form-control" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <?php echo $this->session->flashdata('login_error'); ?>
        <div class="row">
          <!-- /.col -->
          <div class="col-xs-4 pull-left">
            <button type="submit" class="btn btn-success btn-block btn-flat">Sign In</button>
            <p class="">Have already Account? Click</p>
          </div>
          <!-- /.col -->
        </div>
      </form>  
      <a href="<?php echo base_url(); ?>login">Login</a>         
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery 3 -->
  <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script>
  </body>
</html>

