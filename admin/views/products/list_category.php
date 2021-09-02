<?php
    include("../../../require_inc.php");
?>
<!-- Main content -->
<div class="main_content">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header container-fluid">
              <div class="row">
                  <h3 class="col-md-7 card-title">
                      <?php _e($lang['manage_category_product']) ?>
                  </h3>
                  <div class="col-md-5"><a class="float-right btn btn-success add"><i class="fas fa-plus"></i> <?php _e($lang['addnew']) ?></a></a><a class="float-right btn btn-success mr-2 reload"><i class="fas fa-sync"></i> <?php _e($lang['reload']) ?></a></div>
                  <!--<div class="col-md-2"></div>-->
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="categories" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="7%" class="text-center"><?php _e($lang['no.']) ?></th>
                  <th width="28%" class="text-center"><?php _e($lang['name_category'].' (Vie)') ?></th>
                  <th width="28%" class="text-center"><?php _e($lang['name_category'].' (Eng)') ?></th>
                  <th width="14%" class="text-center"><?php _e($lang['manage_product_short']) ?></th>
                  <th width="10%" class="text-center"><?php _e($lang['sort']) ?></th>
                  <th width="13%" class="text-center"><?php _e($lang['actions']) ?></th>
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
                  <h5 class="modal-title text-uppercase"><?php _e($lang['add_category_product']) ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" class="text-white">&times;</span>
                  </button>
              </div>
              <form method="post" action="<?php _e($def['link_process_add_category_product']) ?>" id="form_add" enctype="multipart/form-data">
                  <div class="modal-body container-fluid" id="add_cate"></div>
                  <div class="modal-footer">
                      <button type="submit" id="add" class="btn btn-success"><?php _e($lang['save']) ?> <i class="fas fa-save"></i></button><button type="reset" class="btn btn-info"><?php _e($lang['reset']) ?> <i class="fas fa-undo"></i></button>
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
                  <h5 class="modal-title text-uppercase"><?php _e($lang['update_category_product']) ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" class="text-white">&times;</span>
                  </button>
              </div>
              <form method="post" action="<?php _e($def['link_process_update_category_product']) ?>" id="form_update" enctype="multipart/form-data">
                  <div class="modal-body container-fluid" id="cate_update"></div>
                  <div class="modal-footer">
                      <button type="submit" id="update" class="btn btn-success"><?php _e($lang['update']) ?> <i class="fas fa-edit"></i></button><button type="reset" class="btn btn-info"><?php _e($lang['reset']) ?> <i class="fas fa-undo"></i></button>
                  </div>
              </form>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  <script type="text/javascript">
      var lang_url = "<?php _e($def['theme'].'plugins/datatables/vn.json') ?>";
      var column_not_sort = "3, 4, 5";
      var backend_list = "views/products/data_cate.php";
      var table_id = "#categories";
      var all_page = "<?php _e($lang['all']) ?>";
      var link_delete = "<?php _e($def['link_process_delete_category_product']) ?>";
      var link_active = "<?php _e($def['link_active_category_product']) ?>";
      var link_add = "<?php _e($def['link_add_category_product']) ?>";
      var link_update = "<?php _e($def['link_get_category_product']) ?>";
      var link_update_sort = "<?php _e($def['link_process_sort_product']) ?>";
      var session_timeout = '<?php _e($lang['session_timeout']) ?>';
      var system_error = '<?php _e($lang['system_error']) ?>';
      var not_name_category_product_vi = "<?php _e($lang['not_name_category_product_vi']) ?>";
      var not_name_category_product_en = "<?php _e($lang['not_name_category_product_en']) ?>";
      var processing = "<?php _e($lang['processing']) ?>";
      var text_save = "<?php _e($lang['save']) ?>";
      var add_success = '<?php _e($lang['add_success']) ?>';
      var text_update = "<?php _e($lang['update']) ?>";
      var update_success = '<?php _e($lang['update_success']) ?>';
      var conf = "<?php _e($lang['confirm_delete']) ?>";
      var hidden = "<?php _e($lang['hidden']) ?>";
      var shows = "<?php _e($lang['active']) ?>";
      var title_add_category_product = "<?php _e($lang['add_category_product']) ?>";
      var title_update_category_product = "<?php _e($lang['update_category_product']) ?>";
      var text_delete = "<?php _e($lang['delete']) ?>";
      var sort_success = "<?php _e($lang['sort_success']) ?>";
      var manage_product = "<?php _e($lang['manage_product']) ?>";
      var manage = "<?php _e($lang['manage']) ?>";
  </script>
  <script src="views/products/data_cate.js"></script>
</div>
