<?php
	include("../../../require_inc.php");
	$cate_id = $_POST['cate_id'];
?>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
	<div class="row">
	  <div class="col-12">
		<div class="card">
		  <div class="card-header container-fluid">
			<div class="row">
				<h3 class="col-md-7 card-title">
					<?php _e($lang['manage_category_service']) ?>
				</h3>
				<div class="col-md-5">
					<a class="float-right btn btn-success add_cate_service"><i class="fas fa-plus"></i><?php _e($lang['addnew']) ?></a><a class="float-right btn btn-success mr-2 reload_cate_service"><i class="fas fa-sync"></i> <?php _e($lang['reload']) ?></a>
				</div>
			</div>
		  </div>
		  <!-- /.card-header -->
		  <div class="card-body">
			<table id="categories_services" class="table table-bordered table-hover">
			  <thead>
			  <tr>
				<th width="7%" class="text-center"><?php _e($lang['no.']) ?></th>
				<th width="28%" class="text-center"><?php _e($lang['name_category'].' (Vie)') ?></th>
				<th width="28%" class="text-center"><?php _e($lang['name_category'].' (Eng)') ?></th>
				<th width="14%" class="text-center"><?php _e($lang['manage_service_short']) ?></th>
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
<div class="modal fade" id="modal-add-cate-service">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-success">
				<h5 class="modal-title text-uppercase"><?php _e($lang['add_category_service']) ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="text-white">&times;</span>
				</button>
			</div>
			<form method="post" action="<?php _e($def['link_process_add_category_service']) ?>" id="form_add_cate_service" enctype="multipart/form-data">
				<div class="modal-body container-fluid" id="add_cate_service"></div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success add_cate"><?php _e($lang['save']) ?> <i class="fas fa-save"></i></button><button type="reset" class="btn btn-info"><?php _e($lang['reset']) ?> <i class="fas fa-undo"></i></button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- update -->
<div class="modal fade" id="modal-update-cate-service">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-success">
				<h5 class="modal-title text-uppercase"><?php _e($lang['update_category_service']) ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="text-white">&times;</span>
				</button>
			</div>
			<form method="post" action="<?php _e($def['link_process_update_category_service']) ?>" id="form_update_category_service" enctype="multipart/form-data">
				<div class="modal-body container-fluid" id="update_cate_service"></div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success update_cate"><?php _e($lang['update']) ?> <i class="fas fa-edit"></i></button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<script type="text/javascript">
	var lang_url = "<?php _e($def['theme'].'plugins/datatables/vn.json') ?>";
	var backend_categories_services_list = "views/services/data_cate.php";
	var table_id_cate_services = "#categories_services";
	var all_page = "<?php _e($lang['all']) ?>";
	var link_cate_service_delete = "<?php _e($def['link_process_delete_category_service']) ?>";
	var link_cate_service_active = "<?php _e($def['link_process_active']) ?>";
	var link_update_sort = "<?php _e($def['link_process_sort']) ?>";
	var link_cate_service_add = "<?php _e($def['link_category_service_add']) ?>";
	var link_cate_service_update = "<?php _e($def['link_category_service_update']) ?>";
	var session_timeout = '<?php _e($lang['session_timeout']) ?>';
	var system_error = '<?php _e($lang['system_error']) ?>';
	var text_add_cate_service = "<?php _e($lang['add_category_service']) ?>";
	var text_update_cate_service = "<?php _e($lang['update_category_service']) ?>";
	var not_name_category_service_vi = "<?php _e($lang['not_name_category_service_vi']) ?>";
	var not_name_category_service_en = "<?php _e($lang['not_name_category_service_en']) ?>";
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
	var manage_service = "<?php _e($lang['manage_service']) ?>";
	var manage = "<?php _e($lang['manage']) ?>";
	var cate_id = "<?php _e($cate_id) ?>";
	var table_cate_service = "categories";
</script>
<script src="views/services/data_cate_service.js"></script>
