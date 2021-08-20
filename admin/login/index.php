<?php
    //include("../../require_inc.php");
    if(!isset($_SESSION['is_logined']) && !isset($_COOKIE['islogined'])) { //   
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title><?php echo $lang['admin_login']; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $def['theme']; ?>plugins/fontawesome-free/css/all.min.css" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
  <!--<link rel="icon" href="<?php echo $def['theme']; ?>plugins/bvhvIcon.png" />-->
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo $def['theme']; ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo $def['theme']; ?>plugins/toastr/toastr.min.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $def['theme']; ?>dist/css/adminlte.min.css" />
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo"><?php echo $lang['admin_login']; ?></div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><?php echo $lang['signin_to_start_session']; ?></p>
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="username" placeholder="<?php echo $lang['username'] ?>" autofocus />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" placeholder="<?php echo $lang['password']; ?>" />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="icheck-success">
              <input type="checkbox" id="remember" />
              <label for="remember"><?php echo $lang['remember'] ?></label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-6">
            <button type="button" id="login" class="btn btn-success btn-block"><?php echo $lang['sign_in']; ?></button>
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
<!-- Toastr -->
<script src="<?php echo $def['theme']; ?>plugins/toastr/toastr.min.js"></script>
<!-- login -->
<script type="text/javascript">
    function redirecturl(link) {
        window.location.replace(link);
    }
    $(document).ready(function(){
        function login(){
           var username = $('#username').val();
           var password = $('#password').val(); 
           if(username == "") {
                toastr.error('<?php echo $lang['not_input_profile_code'] ?>');
                $('#username').addClass('is-invalid');
                $('#username').focus();
                return false;
           } else {
                $('#username').addClass('is-valid');
                $('#username').removeClass('is-invalid');
           }
           if(password == "") {
                toastr.error('<?php echo $lang['not_input_password'] ?>');
                $('#password').addClass('is-invalid');
                $('#password').focus();
                return false;
           } else {
                $('#password').addClass('is-valid');
                $('#password').removeClass('is-invalid');
           }
           var remember = 0;
            if($('input#remember').prop("checked") == true){
                remember = 1;
            } else if($('input#remember').prop("checked") == false){
                remember = 0;
            }

           $('button#login').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <?php echo $lang['processing'] ?>');
           $.post("<?php echo $def['link_process_login']; ?>", {
                username: username,
                password: password,
                remember: remember
           }, function(response){
                console.log(response);
                $('button#login').html('<?php echo $lang['sign_in']; ?>');
                if(response == '2'){
                    toastr.error('<?php echo $lang['invalid_profile_code'] ?>');
                    $('#username').addClass('is-invalid');
                    $('#username').focus();
                    return false;
                } else {
                    $('#username').addClass('is-valid');
                    $('#username').removeClass('is-invalid');
                    if(response == '3') {
                        toastr.error('<?php echo $lang['password_wrong'] ?>');
                        $('#password').addClass('is-invalid');
                        $('#password').focus();
                        return false;
                    } else {
                        if(response == '1') {
                            $('#password').addClass('is-valid');
                            $('#password').removeClass('is-invalid');
                            toastr.success('<?php echo $lang['login_successful'] ?>');
                            redirecturl("<?php echo $def['admin_url']; ?>");
                        } else {
                            toastr.success('<?php echo $lang['system_error'] ?>');
                        }
                    }
                }
           });

        }
        $('#login').click(function(){
            login();
        });
        $('input#username').keydown(function(e) {
        	if (e.keyCode == 13) {
        	    login();
        	}
        });
        $('input#password').keydown(function(e) {
        	if (e.keyCode == 13) {
        		login();
        	}
        });
    });
</script>
</body>
</html>
<?php
    } else 
        header("Location: ".$def['admin_url']);
