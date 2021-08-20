<?php

    include("../../require_inc.php");

?>

<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title><?php echo $lang['admin_login']; ?></title>

  <!-- Tell the browser to be responsive to screen width -->

  <meta name="viewport" content="width=device-width, initial-scale=1">



  <!-- Font Awesome -->

  <link rel="stylesheet" href="<?php echo $def['theme']; ?>plugins/fontawesome-free/css/all.min.css">

  <!-- Ionicons -->

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="icon" href="<?php echo $def['theme']; ?>plugins/bvhvIcon.png">

  <!-- icheck bootstrap -->

  <link rel="stylesheet" href="<?php echo $def['theme']; ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <!-- Theme style -->

  <link rel="stylesheet" href="<?php echo $def['theme']; ?>dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition login-page">

<div class="login-box">

  <div class="login-logo"><?php echo $lang['admin_login']; ?></div>

  <!-- /.login-logo -->

  <div class="card">

    <div class="card-body login-card-body">

      <p class="login-box-msg"><?php echo $lang['signin_to_start_session']; ?></p>



      <form action="<?php echo $def['url'].$def['link_process_login']; ?>" method="post">

        <div class="input-group mb-3">

          <input type="email" class="form-control error" placeholder="<?php echo $lang['profile_code'] ?>" />

          <div class="input-group-append">

            <div class="input-group-text">

              <span class="fas fa-envelope"></span>

            </div>

          </div>

        </div>

        <div class="input-group mb-3">

          <input type="password" class="form-control" placeholder="<?php echo $lang['password']; ?>" />

          <div class="input-group-append">

            <div class="input-group-text">

              <span class="fas fa-lock"></span>

            </div>

          </div>

        </div>

        <div class="row">

          <div class="col-6">

            <div class="icheck-primary">

              <input type="checkbox" id="remember" />

              <label for="remember"><?php echo $lang['remember'] ?></label>

            </div>

          </div>

          <!-- /.col -->

          <div class="col-6">

            <button type="submit" class="btn btn-primary btn-block"><?php echo $lang['sign_in']; ?></button>

          </div>

          <!-- /.col -->

        </div>

      </form>

    </div>

    <!-- /.login-card-body -->

  </div>

</div>

<!-- /.login-box -->



<!-- jQuery -->

<script src="<?php echo $def['theme']; ?>plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->

<script src="<?php echo $def['theme']; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->

<!--<script src="../dist/js/adminlte.min.js"></script>-->

    <script type="text/javascript">

        $(document).ready(function(){

            

        });

    </script>

</body>

</html>

