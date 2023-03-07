<!DOCTYPE html>
<html>
<head>
  <!--<link rel="shortcut icon" href="dist/img/siaka.png">-->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LOGIN USER</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="login-box-body">	
            <div class="form-group has-feedback" align="center">
                <img src="image/logo.png" width="250px" height="120px">
            </div>
            <p align="middle"><b><font size="5%">PT. MAGA PUTRA MANDIRI (Maga Swalayan)</font></b></p>
            <form action="proses_login.php" method="post">
                <div align="left" class="form-group has-feedback" >
                    <b><u>LOGIN USER</u></b><p>
                        <div>
                            <div class="form-group has-feedback">
                                <input type="username" autocomplete="off" name="username" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" autocomplete="off" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-success btn-block btn-flat">Login</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
             <!-- /.login-box-body -->
            </div>
            <!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
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
