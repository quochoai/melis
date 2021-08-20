<!-- Main content -->
<?php
    $id = $pqh[1];
    $html = $h->getById("*", "htmls", $id);
    $arrayone = array(2, 3, 4);
    $arraytwo = array(5, 6, 7);
?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header container-fluid">
            <div class="row">
                <h3 class="card-title col-md-10">
                    <?php echo $lang['update_html'] ?>
                </h3>
                <div class="col-md-2"><a class="float-right" href="<?php echo $def['link_html'] ?>" title="<?php echo $lang['back'] ?>"><i class="fas fa-undo-alt"></i></a></div>
            </div>
          </div>
          <!-- /.card-header -->
          <form action="<?php echo $def['link_process_update_html'] ?>" method="post" id="form_jquery" role="form">
              <input type="hidden" name="id" value="<?php echo $id ?>" />  
              <div class="card-body container-fluid">
                <div class="row">
                    <?php
                        if ($id == 1 || $id == 8) {
                    ?>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $html['tieude'] ?></label>
                            <input type="file" class="form-control" name="noidung_vi" id="noidung_vi" />
                            <?php
                                if ($html['noidung_vi'] != '') {
                                    echo '<img src="'.URL.'upload/'.$html['noidung_vi'].'" />';
                                }
                            ?>
                        </div>
                    </div>
                    <?php } 
                            elseif (in_array($id, $arrayone)) { 
                    ?>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $html['tieude'] ?></label>
                            <input type="text" class="form-control" name="noidung_vi" id="noidung_vi" value="<?php echo $html['noidung_vi'] ?>" />
                        </div>
                    </div>  
                    <?php }
                            elseif (in_array($id, $arraytwo)) { 
                    ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $html['tieude'] ?> (VIE)</label>
                            <textarea class="form-control" name="noidung_vi" id="noidung_vi" rows="3"><?php echo $html['noidung_vi'] ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $html['tieude'] ?> (ENG)</label>
                            <textarea class="form-control" name="noidung_en" id="noidung_en" rows="3"><?php echo $html['noidung_en'] ?></textarea>
                        </div>
                    </div>
                    <?php } ?>
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
            $('#form_jquery').ajaxForm({
                beforeSend: function() {
                    $('#update').attr("disabled",true);
                    $('#update').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Ðang x? lý'); 
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
                       setTimeout(function(){
                           window.location.replace("<?php echo $def['link_html'] ?>");
                       }, 1000);
                   } else {           
                       toastr.error('<?php echo $lang['system_error'] ?>');
                       return false;
                   }
     			}
            });
        });
    });
</script>
