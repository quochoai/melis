<?php
	include("../../../require_inc.php");
	$rv_id = $_POST['rv_id'];
	$table = "reviews";
	if ($rv_id == 1) {
		$review_name = $lang['customer_review'];
		$text_add = $lang['add_customer_review'];
		$text_update = $lang['update_customer_review'];
	} else {
		$review_name = $lang['star_review'];
		$text_add = $lang['add_star_review'];
		$text_update = $lang['update_star_review'];
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
							_e($lang['manage_review'] . ' '.$review_name); 
						?>
					</h3>
					<div class="col-md-6">
						<a class="float-right btn btn-success add_review" rel="<?php _e($rv_id)?>"><i class="fas fa-plus"></i> <?php _e($lang['addnew']) ?></a><a class="float-right btn btn-success mr-2 reload_review"><i class="fas fa-sync"></i> <?php _e($lang['reload']) ?></a>
					</div>
				</div>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="reviews" class="table table-bordered table-hover">
				<thead>
				<tr>
					<th width="7%" class="text-center"><?php _e($lang['no.']) ?></th>
					<th width="27%" class="text-center"><?php _e($lang['customer_name'].' (Vie)') ?></th>
					<th width="27%" class="text-center"><?php _e($lang['customer_name'].' (Eng)') ?></th>
					<th width="16%" class="text-center"><?php _e($lang['customer_image']) ?></th>
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
	<div class="modal fade" id="modal-add-review">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-success">
					<h5 class="modal-title text-uppercase"><?php _e($text_add) ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true" class="text-white">&times;</span>
					</button>
				</div>
				<form method="post" action="<?php _e($def['link_process_add_review']) ?>" id="form_add_review" enctype="multipart/form-data">
					
					<div class="modal-body container-fluid">
						<div class="row" id="review_add"></div>
					</div>
					<div class="modal-footer">
						<button type="submit" id="add_review" class="btn btn-success"><?php _e($lang['save']) ?> <i class="fas fa-save"></i></button><button type="reset" class="btn btn-info"><?php _e($lang['reset']) ?> <i class="fas fa-undo"></i></button>
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- update -->
	<div class="modal fade" id="modal-update-review">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-success">
					<h5 class="modal-title text-uppercase"><?php _e($text_update) ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true" class="text-white">&times;</span>
					</button>
				</div>
				<form method="post" action="<?php _e($def['link_process_update_review']) ?>" id="form_update_review" enctype="multipart/form-data">
					<div class="modal-body container-fluid">
						<div class="row" id="review_update"></div>
					</div>
					<div class="modal-footer">
						<button type="submit" id="update_review" class="btn btn-success"><?php _e($lang['update']) ?> <i class="fas fa-edit"></i></button>
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
		var rv_id = <?php _e($rv_id) ?>;
		var backend_list_review = "views/review/data.php";
		var table_id_review = "#reviews";
		var all_page = "<?php _e($lang['all']) ?>";
		var link_delete = "<?php _e($def['link_process_delete']) ?>";
		var link_active = "<?php _e($def['link_process_active']) ?>";
		var link_update_review = "<?php _e($def['link_update_review']) ?>";
		var link_update_sort = "<?php _e($def['link_process_sort']) ?>";
		var link_add_review = "<?php _e($def['link_add_review']) ?>";
		var session_timeout = '<?php _e($lang['session_timeout']) ?>';
		var system_error = '<?php _e($lang['system_error']) ?>';
		var not_enter_customer_vi = "<?php _e($lang['not_enter_customer_vi']) ?>";
		var not_enter_customer_en = "<?php _e($lang['not_enter_customer_en']) ?>";
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
		var table_review = "reviews";
	</script>
	<script src="views/review/data_review.js"></script>
</div>
