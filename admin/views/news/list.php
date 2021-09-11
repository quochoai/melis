<?php
    include("../../../require_inc.php");
    $news_id = $_POST['news_id'];
    $table = "news";
    if ($news_id == 1) {
        $news_name = $lang['n_news'];
        $text_add = $lang['add_news'];
        $text_update = $lang['update_news'];
    } elseif (news_id == 2) {
        $news_name = $lang['n_knowledge'];
        $text_add = $lang['add_knowledge'];
        $text_update = $lang['update_knowledge'];
    } else {
        $news_name = $lang['n_promotion'];
        $text_add = $lang['add_promotion'];
        $text_update = $lang['update_promotion'];
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
                            _e($lang['manage'] . ' '.$news_name); 
                        ?>
                    </h3>
                    <div class="col-md-6">
                        <a class="float-right btn btn-success add_news" rel="<?php _e($news_id)?>"><i class="fas fa-plus"></i> <?php _e($lang['addnew']) ?></a><a class="float-right btn btn-success mr-2 reload_news"><i class="fas fa-sync"></i> <?php _e($lang['reload']) ?></a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="newss" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th width="7%" class="text-center"><?php _e($lang['no.']) ?></th>
                    <th width="27%" class="text-center"><?php _e($lang['title_news'].' (Vie)') ?></th>
                    <th width="27%" class="text-center"><?php _e($lang['title_news'].' (Eng)') ?></th>
                    <th width="16%" class="text-center"><?php _e($lang['post_date']) ?></th>
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
    <div class="modal fade" id="modal-add-news">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-uppercase"><?php _e($text_add) ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php _e($def['link_process_add_news']) ?>" id="form_add_news" enctype="multipart/form-data">
                    
                    <div class="modal-body container-fluid">
                        <div class="row" id="news_add"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="add_news" class="btn btn-success"><?php _e($lang['save']) ?> <i class="fas fa-save"></i></button><button type="reset" class="btn btn-info"><?php _e($lang['reset']) ?> <i class="fas fa-undo"></i></button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- update -->
    <div class="modal fade" id="modal-update-news">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-uppercase"><?php _e($text_update) ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php _e($def['link_process_update_news']) ?>" id="form_update_news" enctype="multipart/form-data">
                    <div class="modal-body container-fluid">
                        <div class="row" id="news_update"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="update_news" class="btn btn-success"><?php _e($lang['update']) ?> <i class="fas fa-edit"></i></button>
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
        var news_id = <?php _e($news_id) ?>;
        var backend_list = "views/news/data.php";
        var table_id = "#newss";
        var all_page = "<?php _e($lang['all']) ?>";
        var link_delete = "<?php _e($def['link_process_delete']) ?>";
        var link_active = "<?php _e($def['link_process_active']) ?>";
        var link_update = "<?php _e($def['link_update_news']) ?>";
        var link_update_sort = "<?php _e($def['link_process_sort']) ?>";
        var link_add = "<?php _e($def['link_add_news']) ?>";
        var session_timeout = '<?php _e($lang['session_timeout']) ?>';
        var system_error = '<?php _e($lang['system_error']) ?>';
        var not_enter_title_news_vi = "<?php _e($lang['not_enter_title_news_vi']) ?>";
        var not_enter_title_news_en = "<?php _e($lang['not_enter_title_news_en']) ?>";
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
        var tables = "news";
    </script>
    <script src="views/news/data.js"></script>
</div>
