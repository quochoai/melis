<!-- Main content -->
<?php
    include("../../../require_inc.php");
    $config = $h->getById("*", "configs", 1);
?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header container-fluid">
            <div class="row">
                <h3 class="card-title col-md-12">
                    <?php echo $lang['config_website'] ?>
                </h3>
            </div>
          </div>
          <!-- /.card-header -->
          <form action="<?php echo $def['link_process_config_edit'] ?>" method="post" id="form_jquery" role="form">
              <div class="card-body container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['title_website'] ?> (VIE)</label>
                            <input type="text" class="form-control" name="data[tieude_vi]" id="tieude_vi" value="<?php echo $config['tieude_vi'] ?>" autofocus="" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['title_website'] ?> (ENG)</label>
                            <input type="text" class="form-control" name="data[tieude_en]" id="tieude_en" value="<?php echo $config['tieude_en'] ?>" />
                        </div>
                    </div>  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['description'] ?> (VIE)</label>
                            <textarea class="form-control" name="data[mota_vi]" id="mota_vi" rows="3"><?php echo $config['mota_vi'] ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['description'] ?> (ENG)</label>
                            <textarea class="form-control" name="data[mota_en]" id="mota_en" rows="3"><?php echo $config['mota_en'] ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['keyword'] ?> (VIE)</label>
                            <textarea class="form-control" name="data[tukhoa_vi]" id="tukhoa_vi" rows="3"><?php echo $config['tukhoa_vi'] ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['keyword'] ?> (ENG)</label>
                            <textarea class="form-control" name="data[tukhoa_en]" id="tukhoa_en" rows="3"><?php echo $config['tukhoa_en'] ?></textarea>
                        </div>
                    </div>   
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['ga'] ?></label>
                            <textarea class="form-control lined" name="data[ga]" id="ga" rows="4"><?php echo $config['ga'] ?></textarea>
                          </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <button type="submit" id="update" class="btn btn-success"><?php echo $lang['update']; ?> <i class="fas fa-edit"></i></button>
                  <button type="reset" id="cancel" class="btn btn-default ml-2"><?php echo $lang['cancel'] ?> <i class="fas fa-undo"></i></button>
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
        $(document).on('click', '#update', function(){
            var tieude_vi = $('#tieude_vi').val();
            var tieude_en = $('#tieude_en').val();
            if (tieude_vi == '') {
                toastr.error("<?php echo $lang['not_title_website_vi'] ?>");
                $('#tieude_vi').addClass('is-invalid');
                $('#tieude_vi').focus();
                return false;
            } else {
                $('#tieude_vi').removeClass('is-invalid');
                $('#tieude_vi').addClass('is-valid');
            }
            if (tieude_en == '') {
                toastr.error("<?php echo $lang['not_title_website_en'] ?>");
                $('#tieude_en').addClass('is-invalid');
                $('#tieude_en').focus();
                return false;
            } else {
                $('#tieude_en').removeClass('is-invalid');
                $('#tieude_en').addClass('is-valid');
            }
            $('#form_jquery').ajaxForm({
                beforeSend: function() {
                    $('#update').attr("disabled",true);
                    $('#update').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> �ang x? l�'); 
                },
                uploadProgress: function(event, position, total, percentComplete) {
                                    
                },
                success: function() {
                    /*var percentVal = '100%';
                    bar.width(percentVal);
                    percent.html(percentVal);*/
                },
               	complete: function(xhr) {
            	   $('#update').html('<?php echo $lang['update']; ?> <i class="fas fa-edit">');
                   $('#update').removeAttr('disabled');
                   var text = xhr.responseText;
                   console.log(text);
                   if(text == '1'){
                       toastr.success('<?php echo $lang['update_success'] ?>');
                       return false;
                   } else {           
                       toastr.error('<?php echo $lang['system_error'] ?>');
                       return false;
                   }
     			}
            });
        });
    });
</script>
