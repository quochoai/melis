<?php
	include("../../../require_inc.php");
	$ld_id = $_POST['ld_id'];
	$table = "landings";
	if ($ld_id == 1) {
		$landing_name = $lang['landing_about'];
		$text_add = $lang['add_about'];
		$text_update = $lang['update_about'];
	} else {
		$landing_name = $lang['landing_branch'];
		$text_add = $lang['add_branch'];
		$text_update = $lang['update_branch'];
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
							_e($lang['manage_landing'] . ' '.$landing_name); 
						?>
					</h3>
					<div class="col-md-6">
						<!--<a class="float-right btn btn-success add_landing" rel="<?php _e($ld_id)?>"><i class="fas fa-plus"></i> <?php _e($lang['addnew']) ?></a>--><a class="float-right btn btn-success mr-2 reload_landing"><i class="fas fa-sync"></i> <?php _e($lang['reload']) ?></a>
					</div>
				</div>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="landings" class="table table-bordered table-hover">
				<thead>
				<tr>
					<th width="7%" class="text-center"><?php _e($lang['no.']) ?></th>
					<th width="27%" class="text-center"><?php _e($lang['title_news'].' (Vie)') ?></th>
					<th width="27%" class="text-center"><?php _e($lang['title_news'].' (Eng)') ?></th>
					<th width="16%" class="text-center"><?php _e($lang['image_landing']) ?></th>
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
	<div class="modal fade" id="modal-add-landing">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-success">
					<h5 class="modal-title text-uppercase"><?php _e($text_add) ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true" class="text-white">&times;</span>
					</button>
				</div>
				<form method="post" action="<?php _e($def['link_process_add_landing']) ?>" id="form_add_landing" enctype="multipart/form-data">
					
					<div class="modal-body container-fluid">
						<div class="row" id="landing_add"></div>
					</div>
					<div class="modal-footer">
						<button type="submit" id="add_landing" class="btn btn-success"><?php _e($lang['save']) ?> <i class="fas fa-save"></i></button><button type="reset" class="btn btn-info"><?php _e($lang['reset']) ?> <i class="fas fa-undo"></i></button>
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- update -->
	<div class="modal fade" id="modal-update-landing">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-success">
					<h5 class="modal-title text-uppercase"><?php _e($text_update) ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true" class="text-white">&times;</span>
					</button>
				</div>
				<form method="post" action="<?php _e($def['link_process_update_landing']) ?>" id="form_update_landing" enctype="multipart/form-data">
					<div class="modal-body container-fluid">
						<div class="row" id="landing_update"></div>
					</div>
					<div class="modal-footer">
						<button type="submit" id="update_landing" class="btn btn-success"><?php _e($lang['update']) ?> <i class="fas fa-edit"></i></button>
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
		var ld_id = <?php _e($ld_id) ?>;
		var backend_list_landing = "views/landing/data.php";
		var table_id_landing = "#landings";
		var all_page = "<?php _e($lang['all']) ?>";
		var link_delete = "<?php _e($def['link_process_delete']) ?>";
		var link_active = "<?php _e($def['link_process_active']) ?>";
		var link_update_landing = "<?php _e($def['link_update_landing']) ?>";
		var link_update_sort = "<?php _e($def['link_process_sort']) ?>";
		var link_add_landing = "<?php _e($def['link_add_landing']) ?>";
		var session_timeout = '<?php _e($lang['session_timeout']) ?>';
		var system_error = '<?php _e($lang['system_error']) ?>';
		var not_enter_landing_name_vi = "<?php _e($lang['not_enter_landing_name_vi']) ?>";
		var not_enter_landing_name_en = "<?php _e($lang['not_enter_landing_name_en']) ?>";
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
		var table_landing = "landings";
	</script>
	<script src="views/landing/data_landing.js"></script>
</div>
