<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header container-fluid">
            <div class="row">
                <h3 class="col-md-10 card-title">
                    <?php echo $lang['manage_category_product'] ?>
                </h3>
                <div class="col-md-2"><a class="float-right btn btn-success" data-toggle="modal" data-target="#modal-add-cate"><i class="fas fa-plus"></i><?php echo $lang['addnew'] ?></a></div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="categories" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th width="7%" class="text-center"><?php echo $lang['no.'] ?></th>
                <th width="32%" class="text-center"><?php echo $lang['name_category'].' (Vie)' ?></th>
                <th width="32%" class="text-center"><?php echo $lang['name_category'].' (Eng)' ?></th>
                <th width="14%" class="text-center"><?php echo $lang['manage_product_short'] ?></th>
                <th width="15%" class="text-center"><?php echo $lang['actions'] ?></th>
              </tr>
              </thead>
            </table>
          </div>
          <!-- /.card-body -->
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
<!-- add -->
<div class="modal fade" id="modal-add-cate">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-uppercase"><?php echo $lang['add_category_product'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo $def['link_process_add_category_product'] ?>" id="form_add" enctype="multipart/form-data">
                <div class="modal-body container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="name"><?php echo $lang['name_category'].' (Vie)' ?></label>
                                <input type="text" class="form-control" name="data[name_vi]" id="name_vi" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="name"><?php echo $lang['name_category'].' (Eng)' ?></label>
                                <input type="text" class="form-control" name="data[name_en]" id="name_en" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="name"><?php echo $lang['title_website'].' (Vie)' ?></label>
                                <input type="text" class="form-control" name="data[title_vi]" id="title_vi" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="name"><?php echo $lang['title_website'].' (Eng)' ?></label>
                                <input type="text" class="form-control" name="data[title_en]" id="title_en" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="name"><?php echo $lang['description'].' (Vie)' ?></label>
                                <textarea class="form-control" name="data[desc_vi]" id="desc_vi" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="name"><?php echo $lang['description'].' (Eng)' ?></label>
                                <textarea class="form-control" name="data[desc_en]" id="desc_en" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="name"><?php echo $lang['keyword'].' (Vie)' ?></label>
                                <textarea class="form-control" name="data[keyw_vi]" id="keyw_vi" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="name"><?php echo $lang['keyword'].' (Eng)' ?></label>
                                <textarea class="form-control" name="data[keyw_en]" id="keyw_en" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add" class="btn btn-success"><?php echo $lang['save'] ?> <i class="fas fa-save"></i></button><button type="reset" class="btn btn-info"><?php echo $lang['reset'] ?> <i class="fas fa-undo"></i></button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- update -->
<div class="modal fade" id="modal-update-cate">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-uppercase"><?php echo $lang['update_category_product'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo $def['link_process_update_category_product'] ?>" id="form_update" enctype="multipart/form-data">
                <div class="modal-body container-fluid" id="cate_update"></div>
                <div class="modal-footer">
                    <button type="submit" id="update" class="btn btn-success"><?php echo $lang['update'] ?> <i class="fas fa-edit"></i></button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script type="text/javascript">
    var lang_url = "<?php echo $def['theme'].'plugins/datatables/vn.json' ?>";
    var column_not_sort = "3, 4";
    var backend_categories_list = "views/products/data_cate.php";
    var table_id = "#categories";
    var all_page = "<?php echo $lang['all'] ?>";
    var link_delete = "<?php echo $def['link_process_delete_category_product'] ?>";
    var link_active_category = "<?php echo $def['link_active_category_product'] ?>";
    var link_get_category_product = "<?php echo $def['link_get_category_product'] ?>";
    var session_timeout = '<?php echo $lang['session_timeout'] ?>';
    var system_error = '<?php echo $lang['system_error'] ?>';
    var not_name_category_product_vi = "<?php echo $lang['not_name_category_product_vi'] ?>";
    var not_name_category_product_en = "<?php echo $lang['not_name_category_product_en'] ?>";
    var processing = "<?php echo $lang['processing'] ?>";
    var text_save = "<?php echo $lang['save'] ?>";
    var add_success = '<?php echo $lang['add_success'] ?>';
    var text_update = "<?php echo $lang['update'] ?>";
    var update_success = '<?php echo $lang['update_success'] ?>';
    var conf = "<?php echo $lang['confirm_delete'] ?>";
    var hidden = "<?php echo $lang['hidden'] ?>";
    var shows = "<?php echo $lang['active'] ?>";
</script>
<script src="views/products/data_cate.js"></script>
