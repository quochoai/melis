<?php
	include("../../../require_inc.php");
	$table = "partners";
	$text_add = $lang['add_partner'];
	$text_update = $lang['update_partner'];
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
							_e($lang['manage_partner']); 
						?>
					</h3>
					<div class="col-md-6">
						<a class="float-right btn btn-success add_partner" rel="<?php _e($ld_id)?>"><i class="fas fa-plus"></i> <?php _e($lang['addnew']) ?></a><a class="float-right btn btn-success mr-2 reload_partner"><i class="fas fa-sync"></i> <?php _e($lang['reload']) ?></a>
					</div>
				</div>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="partners" class="table table-bordered table-hover">
				<thead>
				<tr>
					<th width="7%" class="text-center"><?php _e($lang['no.']) ?></th>
					<th width="27%" class="text-center"><?php _e($lang['title_news'].' (Vie)') ?></th>
					<th width="27%" class="text-center"><?php _e($lang['title_news'].' (Eng)') ?></th>
					<th width="16%" class="text-center"><?php _e($lang['image_partner']) ?></th>
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
	<div class="modal fade" id="modal-add-partner">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-success">
					<h5 class="modal-title text-uppercase"><?php _e($text_add) ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true" class="text-white">&times;</span>
					</button>
				</div>
				<form method="post" action="<?php _e($def['link_process_add_partner']) ?>" id="form_add_partner" enctype="multipart/form-data">
					
					<div class="modal-body container-fluid">
						<div class="row" id="partner_add"></div>
					</div>
					<div class="modal-footer">
						<button type="submit" id="add_partner" class="btn btn-success"><?php _e($lang['save']) ?> <i class="fas fa-save"></i></button><button type="reset" class="btn btn-info"><?php _e($lang['reset']) ?> <i class="fas fa-undo"></i></button>
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- update -->
	<div class="modal fade" id="modal-update-partner">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-success">
					<h5 class="modal-title text-uppercase"><?php _e($text_update) ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true" class="text-white">&times;</span>
					</button>
				</div>
				<form method="post" action="<?php _e($def['link_process_update_partner']) ?>" id="form_update_partner" enctype="multipart/form-data">
					<div class="modal-body container-fluid">
						<div class="row" id="partner_update"></div>
					</div>
					<div class="modal-footer">
						<button type="submit" id="update_partner" class="btn btn-success"><?php _e($lang['update']) ?> <i class="fas fa-edit"></i></button>
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
		var backend_list_partner = "views/partner/data.php";
		var table_id_partner = "#partners";
		var all_page = "<?php _e($lang['all']) ?>";
		var link_delete = "<?php _e($def['link_process_delete']) ?>";
		var link_active = "<?php _e($def['link_process_active']) ?>";
		var link_update_partner = "<?php _e($def['link_update_partner']) ?>";
		var link_update_sort = "<?php _e($def['link_process_sort']) ?>";
		var link_add_partner = "<?php _e($def['link_add_partner']) ?>";
		var session_timeout = '<?php _e($lang['session_timeout']) ?>';
		var system_error = '<?php _e($lang['system_error']) ?>';
		var not_enter_name_partner_vi = "<?php _e($lang['not_enter_name_partner_vi']) ?>";
		var not_enter_name_partner_en = "<?php _e($lang['not_enter_name_partner_en']) ?>";
		var not_choose_image_partner = "<?php _e($lang['not_choose_image_partner']) ?>";
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
		var table_partner = "partners";
	</script>
	<script src="views/partner/data_partner.js"></script>
</div>
