<?php
    include("../../../require_inc.php");
    $service_id = $_POST['service_id'];
    $table = "services";
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
                    <h3 class="col-md-6 card-title">
                        <?php 
                            $cate = $h->getById("service_id, name_vi, name_en", $table, $service_id, "and deleted_at is null");
                            _e($lang['manage_price'].' &raquo; '.$cate['name_vi']); 
                        ?>
                    </h3>
                    <div class="col-md-6">
                        <a class="float-right btn btn-success add_price_service" rel="<?php _e($service_id)?>"><i class="fas fa-plus"></i> <?php _e($lang['addnew']) ?></a><a class="float-right btn btn-success mr-2 reload_price_service"><i class="fas fa-sync"></i> <?php _e($lang['reload']) ?></a><a class="float-right btn btn-success mr-2 manage_service" rel="<?php _e($cate['service_id']) ?>"><i class="fas fa-undo"></i> <?php _e($lang['back']) ?></a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="price_services" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th width="7%" class="text-center"><?php _e($lang['no.']) ?></th>
                    <th width="35%" class="text-center"><?php _e($lang['name_service'].' (Vie)') ?></th>
                    <th width="35%" class="text-center"><?php _e($lang['name_service'].' (Eng)') ?></th>
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
    <div class="modal fade" id="modal-add-price-service">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-uppercase"><?php _e($lang['add_price'].' &raquo; '.$cate['name_vi']) ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php _e($def['link_process_add_price_service']) ?>" id="form_add_price_service" enctype="multipart/form-data">
                    
                    <div class="modal-body container-fluid">
                        <div class="row" id="price_service_add"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="add_price_service" class="btn btn-success"><?php _e($lang['save']) ?> <i class="fas fa-save"></i></button><button type="reset" class="btn btn-info"><?php _e($lang['reset']) ?> <i class="fas fa-undo"></i></button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- update -->
    <div class="modal fade" id="modal-update-price-service">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-uppercase"><?php _e($lang['update_price']) ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php _e($def['link_process_update_price_service']) ?>" id="form_update_price_service" enctype="multipart/form-data">
                    <div class="modal-body container-fluid">
                        <div class="row" id="price_service_update"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="update_price_service" class="btn btn-success"><?php _e($lang['update']) ?> <i class="fas fa-edit"></i></button>
                        <button type="reset" class="btn btn-info"><?php _e($lang['reset']) ?> <i class="fas fa-undo"></i></button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <script type="text/javascript">
        var lang_url = "<?php _e($def['theme'].'plugins/datatables/vn.json') ?>";
        var service_id = <?php _e($service_id) ?>;
        var backend_list = "views/services/data_price.php";
        var table_id = "#price_services";
        var all_page = "<?php _e($lang['all']) ?>";
        var link_delete = "<?php _e($def['link_process_delete']) ?>";
        var link_active = "<?php _e($def['link_process_active']) ?>";
        var link_update = "<?php _e($def['link_price_service_update']) ?>";
        var link_update_sort = "<?php _e($def['link_process_sort']) ?>";
        var link_add = "<?php _e($def['link_price_service_add']) ?>";
        var session_timeout = '<?php _e($lang['session_timeout']) ?>';
        var system_error = '<?php _e($lang['system_error']) ?>';
        var text_manage_price_table = "<?php _e($lang['manage_price'].' &raquo; '.$cate['name_vi']); ?>";
        var text_add_price_table = "<?php _e($lang['add_price'].' &raquo; '.$cate['name_vi']) ?>";
        var text_update_price_table = "<?php _e($lang['update_price']) ?>";
        var not_name_service_vi = "<?php _e($lang['not_name_service_vi']) ?>";
        var not_name_service_en = "<?php _e($lang['not_name_service_en']) ?>";
        var processing = "<?php _e($lang['processing']) ?>";
        var text_save = "<?php _e($lang['save']) ?>";
        var add_success = '<?php _e($lang['add_success']) ?>';
        var text_update = "<?php _e($lang['update']) ?>";
        var update_success = '<?php _e($lang['update_success']) ?>';
        var conf = "<?php _e($lang['confirm_delete']) ?>";
        var hidden = "<?php _e($lang['hidden']) ?>";
        var shows = "<?php _e($lang['active']) ?>";
        var text_delete = "<?php _e($lang['delete']) ?>";
        var sort_success = "<?php _e($lang['sort_success']) ?>";
        var manage_price = "<?php _e($lang['manage_price']) ?>";
        var manage = "<?php _e($lang['manage']) ?>";
        var tables = "price_tables";
    </script>
    <script src="views/services/data_price.js"></script>
</div>
