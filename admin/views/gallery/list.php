<?php
    include("../../../require_inc.php");
    $gal_id = $_POST['gal_id'];
    $table = "galleries";
    if ($gal_id == 1) {
        $gallery_name = $lang['gimage'];
        $text_add = $lang['add_gallery_image'];
        $text_update = $lang['update_gallery_image'];
    } else {
        $gallery_name = $lang['gvideo'];
        $text_add = $lang['add_gallery_video'];
        $text_update = $lang['update_gallery_video'];
    }
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
                            _e($lang['manage'] . ' '.$gallery_name); 
                        ?>
                    </h3>
                    <div class="col-md-6">
                        <a class="float-right btn btn-success add_gallery" rel="<?php _e($gal_id)?>"><i class="fas fa-plus"></i> <?php _e($lang['addnew']) ?></a><a class="float-right btn btn-success mr-2 reload_gallery"><i class="fas fa-sync"></i> <?php _e($lang['reload']) ?></a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="galleries" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th width="7%" class="text-center"><?php _e($lang['no.']) ?></th>
                    <th width="35%" class="text-center"><?php _e($lang['name_gallery'].' (Vie)') ?></th>
                    <th width="35%" class="text-center"><?php _e($lang['name_gallery'].' (Eng)') ?></th>
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
    <div class="modal fade" id="modal-add-gallery">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-uppercase"><?php _e($text_add) ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php _e($def['link_process_add_gallery']) ?>" id="form_add_gallery" enctype="multipart/form-data">
                    
                    <div class="modal-body container-fluid">
                        <div class="row" id="gallery_add"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="add_gallery" class="btn btn-success"><?php _e($lang['save']) ?> <i class="fas fa-save"></i></button><button type="reset" class="btn btn-info"><?php _e($lang['reset']) ?> <i class="fas fa-undo"></i></button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- update -->
    <div class="modal fade" id="modal-update-gallery">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-uppercase"><?php _e($text_update) ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php _e($def['link_process_update_gallery']) ?>" id="form_update_gallery" enctype="multipart/form-data">
                    <div class="modal-body container-fluid">
                        <div class="row" id="gallery_update"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="update_gallery" class="btn btn-success"><?php _e($lang['update']) ?> <i class="fas fa-edit"></i></button>
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
        var gal_id = <?php _e($gal_id) ?>;
        var backend_list = "views/gallery/data.php";
        var table_id = "#galleries";
        var all_page = "<?php _e($lang['all']) ?>";
        var link_delete = "<?php _e($def['link_process_delete_gallery']) ?>";
        var link_active = "<?php _e($def['link_process_active_gallery']) ?>";
        var link_update = "<?php _e($def['link_update_gallery']) ?>";
        var link_update_sort = "<?php _e($def['link_process_sort_gallery']) ?>";
        var link_add = "<?php _e($def['link_add_gallery']) ?>";
        var session_timeout = '<?php _e($lang['session_timeout']) ?>';
        var system_error = '<?php _e($lang['system_error']) ?>';
        var not_name_gallery_vi = "<?php _e($lang['not_name_gallery_vi']) ?>";
        var not_name_gallery_en = "<?php _e($lang['not_name_gallery_en']) ?>";
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
    </script>
    <script src="views/gallery/data.js"></script>
</div>
