<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header container-fluid">
              <div class="row">
                <h3 class="card-title col-md-12">
                    <?php echo $lang['change_password'] ?>
                </h3>
              </div>
          </div>
          <!-- /.card-header -->
          <form action="<?php echo $def['link_process_change_password'] ?>" method="post" id="form_jquery" role="form">
              <div class="card-body container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['old_password'] ?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="oldpassword" id="oldpassword" class="form-control" />
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['new_password'] ?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="password" id="password" class="form-control" />
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['confirm_password'] ?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="password_confirm" id="password_confirm" class="form-control" />
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <button type="submit" id="changepass" class="btn btn-success"><?php echo $lang['save']; ?> <i class="fas fa-save"></i></button>
                  <button type="reset" class="btn btn-default ml-2"><?php echo $lang['reset'] ?> <i class="fas fa-undo"></i></button>
              </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click', '#changepass', function(){
            let oldpassword = $.trim($('#oldpassword').val());
            let password = $.trim($('#password').val());
            let password_confirm = $.trim($('#password_confirm').val());
            if (oldpassword == '') {
                toastr.error("<?php echo $lang['not_old_password'] ?>");
                $('#oldpassword').focus();
                $('#oldpassword').addClass('is-invalid');
                return false;
            } else {
                $('#oldpassword').removeClass('is-invalid');
                $('#oldpassword').addClass('is-valid');
            }
            if (password == '') {
                toastr.error("<?php echo $lang['not_new_password'] ?>");
                $('#password').focus();
                $('#password').addClass('is-invalid');
                return false;
            } else {
                $('#password').removeClass('is-invalid');
                $('#password').addClass('is-valid');
            }
            if (password_confirm == '') {
                toastr.error("<?php echo $lang['not_password_confirm'] ?>");
                $('#password_confirm').focus();
                $('#password_confirm').addClass('is-invalid');
                return false;
            } else {
                $('#password_confirm').removeClass('is-invalid');
                $('#password_confirm').addClass('is-valid');
            }
            if (password_confirm !== password) {
                toastr.error("<?php echo $lang['password_not_match'] ?>");
                $('#password_confirm').focus();
                $('#password_confirm').addClass('is-invalid');
                return false;
            } else {
                $('#password_confirm').removeClass('is-invalid');
                $('#password_confirm').addClass('is-valid');
            }
            $('#form_jquery').ajaxForm({
                beforeSend: function() {
                    $('#changepass').attr("disabled",true);
                    $('#changepass').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <?php echo $lang['processing'] ?>'); 
                },
                uploadProgress: function(event, position, total, percentComplete) {
                                    
                },
                success: function() {
                    /*var percentVal = '100%';
                    bar.width(percentVal);
                    percent.html(percentVal);*/
                },
               	complete: function(xhr) {
            	   $('#changepass').html('<?php echo $lang['update']; ?> <i class="fas fa-edit">');
                   $('#changepass').removeAttr('disabled');
                   var text = xhr.responseText;
                   console.log(text);
                   var n = text.split(";");
                   if(n[0] == '1'){
                       toastr.success('<?php echo $lang['change_password_success'] ?>');
                       $('#oldpassword').val('');
                       $('#password').val('');
                       $('#password_confirm').val('');
                       $('#oldpassword').removeClass('is-valid');
                       $('#password').removeClass('is-valid');
                       $('#password_confirm').removeClass('is-valid');
                       return false;
                   } else {
                        if (n[0] == '2') { 
                           toastr.error('<?php echo $lang['system_error'] ?>');
                           return false;
                        } else {
                            if (n[0] == '3') {
                                toastr.error('<?php echo $lang['incorrect_old_password'] ?>');
                                $('#oldpassword').focus();
                                return false;
                            } else {
                                toastr.error('<?php echo $lang['session_timeout'] ?>');
                                setTimeout(function(){
                                    window.location.reload();
                                }, 1000);
                            }
                        }
                   }
     			}
            });
        });
    });
</script>