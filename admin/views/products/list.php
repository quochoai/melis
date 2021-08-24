<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header container-fluid">
            <div class="row">
                <h3 class="col-md-8 card-title">
                    <?php 
                        $product_id = $pqh[1];
                        $_SESSION['pid'] = $product_id;
                        $cate = $h->getById("name_vi, name_en", "products", $product_id, "and deleted_at is null");
                        $allcates = $h->getAll("id, name_vi, name_en", "products", "cm = 1 and deleted_at is null and active = 1", "id asc");
                        echo $lang['manage_product'] . ' &raquo; '.$cate['name_vi']; 
                    ?>
                </h3>
                <div class="col-md-2"><a class="float-right btn btn-success" id="sort"><i class="fas fa-sort"></i> <?php echo $lang['update_sort'] ?></a></div>
                <div class="col-md-2"><a class="float-right btn btn-success" data-toggle="modal" data-target="#modal-add-product"><i class="fas fa-plus"></i> <?php echo $lang['addnew'] ?></a></div>
                
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="products" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th width="7%" class="text-center"><?php echo $lang['no.'] ?></th>
                <th width="33%" class="text-center"><?php echo $lang['name_product'].' (Vie)' ?></th>
                <th width="33%" class="text-center"><?php echo $lang['name_product'].' (Eng)' ?></th>
                <th width="12%" class="text-center"><?php echo $lang['sort'] ?></th>
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
<div class="modal fade" id="modal-add-product">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-uppercase"><?php echo $lang['add_product'].' &raquo; '.$cate['name_vi'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo $def['link_process_add_product'] ?>" id="form_add" enctype="multipart/form-data">
                <input type="hidden" name="data[product_id]" id="product_id" value="<?php echo $product_id ?>" />
                <div class="modal-body container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="name"><?php echo $lang['name_product'].' (Vie)' ?></label>
                                <input type="text" class="form-control" name="data[name_vi]" id="name_vi" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="name"><?php echo $lang['name_product'].' (Eng)' ?></label>
                                <input type="text" class="form-control" name="data[name_en]" id="name_en" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="name"><?php echo $lang['avatar'] ?></label>
                                <input type="file" class="form-control" name="image" id="image" />
                                <div id="show_image" class="d-none"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="name"><?php echo $lang['image_detail'] ?></label>
                                <input type="file" class="form-control" name="image_detail" id="image_detail" />
                                <div id="show_image_detail" class="d-none"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="name"><?php echo $lang['thumbfb'] ?></label>
                                <input type="file" class="form-control" name="thumbfb" id="thumbfb" />
                                <div id="show_thumbfb" class="d-none"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-form-label" for="name"><?php echo $lang['uudiem'].' (Vie)' ?></label>
                                <textarea name="data[uudiem_vi]" id="uudiem_vi" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-form-label" for="name"><?php echo $lang['uudiem'].' (Eng)' ?></label>
                                <textarea name="data[uudiem_en]" id="uudiem_en" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-form-label" for="name"><?php echo $lang['thanhphan'].' (Vie)' ?></label>
                                <textarea name="data[thanhphan_vi]" id="thanhphan_vi" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-form-label" for="name"><?php echo $lang['thanhphan'].' (Eng)' ?></label>
                                <textarea name="data[thanhphan_en]" id="thanhphan_en" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-form-label" for="name"><?php echo $lang['congdung'].' (Vie)' ?></label>
                                <textarea name="data[congdung_vi]" id="congdung_vi" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-form-label" for="name"><?php echo $lang['congdung'].' (Eng)' ?></label>
                                <textarea name="data[congdung_en]" id="congdung_en" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-form-label" for="name"><?php echo $lang['huongdansudung'].' (Vie)' ?></label>
                                <textarea name="data[hdsd_vi]" id="hdsd_vi" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-form-label" for="name"><?php echo $lang['huongdansudung'].' (Eng)' ?></label>
                                <textarea name="data[hdsd_en]" id="hdsd_en" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-form-label" for="name"><?php echo $lang['khachhangtrainghiem'].' (Vie)' ?></label>
                                <textarea name="data[khtn_vi]" id="khtn_vi" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-form-label" for="name"><?php echo $lang['khachhangtrainghiem'].' (Eng)' ?></label>
                                <textarea name="data[khtn_en]" id="khtn_en" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-form-label" for="name"><?php echo $lang['uudiemkhimuataimelis'].' (Vie)' ?></label>
                                <textarea name="data[udmuahang_vi]" id="udmuahang_vi" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-form-label" for="name"><?php echo $lang['uudiemkhimuataimelis'].' (Eng)' ?></label>
                                <textarea name="data[udmuahang_en]" id="udmuahang_en" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="name"><?php echo $lang['tag'].' (Vie)' ?></label>
                                <textarea class="form-control" name="data[tag_vi]" id="tag_vi" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="name"><?php echo $lang['tag'].' (Eng)' ?></label>
                                <textarea class="form-control" name="data[tag_en]" id="tag_en" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="name"><?php echo $lang['show_home'] ?></label>
                                <div class="form-group clearfix">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="show_home1" name="data[show_home]" value="1" />
                                    <label for="show_home1"><?php echo $lang['active'] ?></label>
                                </div>
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="show_home2" name="data[show_home]" checked />
                                    <label for="show_home2"><?php echo $lang['hidden'] ?></label>
                                </div>
                                </div>
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
<div class="modal fade" id="modal-update-product">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-uppercase"><?php echo $lang['update_product'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo $def['link_process_update_product'] ?>" id="form_update" enctype="multipart/form-data">
                <div class="modal-body container-fluid" id="product_update"></div>
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
    var backend_products_list = "views/products/data.php";
    var table_id = "#products";
    var all_page = "<?php echo $lang['all'] ?>";
    var link_delete = "<?php echo $def['link_process_delete_product'] ?>";
    var link_active_product = "<?php echo $def['link_active_product'] ?>";
    var link_get_product = "<?php echo $def['link_get_product'] ?>";
    var link_update_sort = "<?php echo $def['link_process_sort_product'] ?>";
    var session_timeout = '<?php echo $lang['session_timeout'] ?>';
    var system_error = '<?php echo $lang['system_error'] ?>';
    var not_name_product_vi = "<?php echo $lang['not_name_product_vi'] ?>";
    var not_name_product_en = "<?php echo $lang['not_name_product_en'] ?>";
    var processing = "<?php echo $lang['processing'] ?>";
    var text_save = "<?php echo $lang['save'] ?>";
    var add_success = '<?php echo $lang['add_success'] ?>';
    var text_update = "<?php echo $lang['update'] ?>";
    var update_success = '<?php echo $lang['update_success'] ?>';
    var conf = "<?php echo $lang['confirm_delete'] ?>";
    var hidden = "<?php echo $lang['hidden'] ?>";
    var shows = "<?php echo $lang['active'] ?>";
</script>
<script src="views/products/data.js"></script>
