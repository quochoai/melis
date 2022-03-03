jQuery(document).ready(function($) {
	fill_datatable();

	function fill_datatable() {
		$(table_id_cate_services).DataTable({
			"aoColumnDefs": [{ "bSortable": false, "aTargets": [3, 4] }],
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
			//stateSave: true,
			"lengthMenu": [
				[20, 25, 30, 50, 100, -1],
				[20, 25, 30, 50, 100, all_page]
			],
			scrollX: true,
			scrollCollapse: true,
			fixedColumns: {
				leftColumns: 0
			},
			"language": {
				"url": lang_url
			},
			processing: true,
			serverSide: true,
			ajax: {
				"url": backend_categories_services_list,
				"dataType": "json",
				"type": "GET",
				"data": {cate_id: cate_id},
				error: function(xhr, error, code) {
					//alert('error'+parse(xhr));
					//location.reload();
				}
			},
			"footerCallback": function(row, data, start, end, display) {
				var api = this.api(),
					data;
			},
			"fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
				$(nRow).attr("data-id", aData[1]);
				return nRow;
			},
			columns: [
				{ data: 'no', name: 'no', className: "text-center text-nowrap small_text" },
				{ data: 'name_vi', name: 'name_vi', className: "text-left small_text" },
				{ data: 'name_en', name: 'name_en', className: "text-left small_text" },
				{
					data: null,
					className: "text-center",
					"bSortable": false,
					render: function(data, type, row) {
						let html = '<a rel="' + data.id + '" class="small_text manage_service" title="' + manage_service + '"><i class="fas fa-tasks"></i> ' + manage + '</a>';
						return html;
					}
				},
				{ data: 'update_sort', name: 'update_sort', className: "text-center text-nowrap small_text" },
				{
					data: null,
					className: "text-center",
					"bSortable": false,
					render: function(data, type, row) {
						if (data.active == 1) {
							var fontaw = 'eye';
							var tte = hidden;
						} else {
							var fontaw = 'eye-slash';
							var tte = shows;
						}
						var html = '<a data-id="' + data.id + '" rel="' + data.active + '" class="btn btn-success btn-sm active_cate_service mr-1" id="htcateservice' + data.id + '" title="' + tte + '"><i id="hscateservice' + data.id + '" class="fas fa-' + fontaw + '"></i></a>';
						html += '<a rel="' + data.id + '" class="btn btn-success btn-sm update_cate_service mr-1" title="' + text_update + '"><i class="fas fa-edit"></i></a>';
						html += '<a class="btn btn-danger btn-sm delete_cate_service" rel="' + data.id + '" title="' + text_delete + '"><i class="fas fa-trash"></i></a>';
						return html;
					}
				},
			]
		});
	}

	// reload
	$(document).on('click', '.reload_cate_service', function() {
		$(table_id_cate_services).DataTable().destroy();
		//$(table_id_cate_services).DataTable().state.clear();
		fill_datatable();
	});

	// delete
	$(document).on('click', '.delete_cate_service', function() {
		var id = $(this).attr('rel');
		if (confirm(conf)) {
			$(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
			$.post(link_cate_service_delete, { id: id }, function(data) {
				if (data == '1')
					$('tr#cate_service' + id).hide();
				else {
					if (data == '5') {
						toastr.error(session_timeout);
						setTimeout(function() {
							window.location.reload();
						}, 1000);
					} else {
						toastr.error(system_error);
						return false;
					}
				}
			});
		}
	});
	// .active
	$(document).on('click', '.active_cate_service', function() {
		var id = $(this).attr('data-id');
		var acti = $(this).attr('rel');
		if (acti == '0') {
			var activ = 1;
			var removeC = 'fa-eye-slash';
			var addC = 'fa-eye';
			var tit = hidden;
		} else {
			var activ = 0;
			var removeC = 'fa-eye';
			var addC = 'fa-eye-slash';
			var tit = shows;
		}
		$.post(link_cate_service_active, { id: id, acti: activ, table: table_cate_service }, function(html) {
			if (html == '1') {
				$('#htcateservice' + id).attr('rel', activ);
				$('#htcateservice' + id).attr('title', tit);
				$('#hscateservice' + id).removeClass(removeC);
				$('#hscateservice' + id).addClass(addC);
			} else {
				if (text == '5') {
					toastr.error(session_timeout);
					setTimeout(function() {
						window.location.reload();
					}, 1000);
				} else {
					toastr.error(system_error);
					return false;
				}
			}
		});
	});
	// sort
	$(document).on('change', '.sort_cs', function() {
		var id = $(this).attr('id');
		var sapxep = $(this).val();
		$.post(link_update_sort, { id: id, sapxep: sapxep, table: table_cate_service }, function(data) {
			if (data == '5') {
				toastr.error(session_timeout);
				setTimeout(function() {
					window.location.reload();
				}, 1000);
			} else {
				if (data == '2') {
					toastr.error(system_error);
					return false;
				} else {
					toastr.success(sort_success);
					return false;
				}
			}
		});
	}).change();
	// hide modal add
	$('#modal-add-cate-service').on('hidden.bs.modal', function(e) {
		$('#add_cate_service').empty();
	});
	// hide modal update

	$('#modal-update-cate-service').on('hidden.bs.modal', function(e) {
		$('#update_cate_service').empty();
	});
	// add
	$(document).on('click', '.add_cate_service', function() {
		let id = $(this).attr('rel');
		$.post(link_cate_service_add, {cate_id: cate_id}, function(html) {
			$('#add_cate_service').html(html);
			$('#modal-add-cate-service').modal('show');
			$('title').html(text_add_cate_service);
		});
	});
	$(document).on('click', '.add_cate', function() {
		let eNameCateServiceVi = $('#name_vi_cate_service');
		let eNameCateServiceEn = $('#name_en_cate_service');
		let name_vi = $.trim(eNameCateServiceVi.val());
		let name_en = $.trim(eNameCateServiceEn.val());
		if (name_vi == '') {
			toastr.error(not_name_category_product_vi);
			eNameCateServiceVi.focus();
			eNameCateServiceVi.addClass("is-invalid");
			return false;
		} else {
			eNameCateServiceVi.removeClass("is-invalid");
			eNameCateServiceVi.addClass("is-valid");
		}
		if (name_en == '') {
			toastr.error(not_name_category_product_en);
			eNameCateServiceEn.focus();
			eNameCateServiceEn.addClass("is-invalid");
			return false;
		} else {
			eNameCateServiceEn.removeClass("is-invalid");
			eNameCateServiceEn.addClass("is-valid");
		}
		$('#form_add_cate_service').ajaxForm({
			beforeSend: function() {
				$('.add_cate').attr("disabled", true);
				$('.add_cate').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ' + processing);
			},
			uploadProgress: function(event, position, total, percentComplete) {

			},
			success: function() {
				/*var percentVal = '100%';
				bar.width(percentVal);
				percent.html(percentVal);*/
			},
			complete: function(xhr) {
				$('.add_cate').html(text_save + ' <i class="fas fa-save">');
				$('.add_cate').removeAttr('disabled');
				var text = xhr.responseText;
				if (text == '1') {
					toastr.success(add_success);
					$('#modal-add-cate-service').modal('hide');
					$(table_id_cate_services).DataTable().destroy();
					//$(table_id_cate_services).DataTable().state.clear();
					fill_datatable();
				} else {
					if (text == '5') {
						toastr.error(session_timeout);
						setTimeout(function() {
							window.location.reload();
						}, 1000);
					} else {
						toastr.error(system_error);
						return false;
					}
				}
			}
		});
	});

	// update
	$(document).on('click', '.update_cate_service', function() {
		let id = $(this).attr('rel');
		$.post(link_cate_service_update, { id: id }, function(html) {
			$('#update_cate_service').html(html);
			$('#modal-update-cate-service').modal('show');
			$('title').html(text_update_cate_service);
		});
	});
	$(document).on('click', '.update_cate', function() {
		let eNameCateServiceVi = $('#name_vi_cate_service_e');
		let eNameCateServiceEn = $('#name_en_cate_service_e');
		let name_vi = $.trim(eNameCateServiceVi.val());
		let name_en = $.trim(eNameCateServiceEn.val());
		if (name_vi == '') {
			toastr.error(not_name_category_service_vi);
			eNameCateServiceVi.focus();
			eNameCateServiceVi.addClass("is-invalid");
			return false;
		} else {
			eNameCateServiceVi.removeClass("is-invalid");
			eNameCateServiceVi.addClass("is-valid");
		}
		if (name_en == '') {
			toastr.error(not_name_category_service_en);
			eNameCateServiceEn.focus();
			eNameCateServiceEn.addClass("is-invalid");
			return false;
		} else {
			eNameCateServiceEn.removeClass("is-invalid");
			eNameCateServiceEn.addClass("is-valid");
		}
		$('#form_update_category_service').ajaxForm({
			beforeSend: function() {
				$('.update_cate').attr("disabled", true);
				$('.update_cate').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ' + processing);
			},
			uploadProgress: function(event, position, total, percentComplete) {

			},
			success: function() {
				/*var percentVal = '100%';
				bar.width(percentVal);
				percent.html(percentVal);*/
			},
			complete: function(xhr) {
				$('.update_cate').html(text_update + ' <i class="fas fa-edit">');
				$('.update_cate').removeAttr('disabled');
				var text = xhr.responseText;
				if (text == '1') {
					toastr.success(update_success);
					setTimeout(function() {
						$('#modal-update-cate-service').modal('hide');
						$(table_id_cate_services).DataTable().destroy();
						fill_datatable();
					}, 1000);
				} else {
					if (text == '5') {
						toastr.error(session_timeout);
						setTimeout(function() {
							window.location.reload();
						}, 1000);
					} else {
						toastr.error(system_error);
						return false;
					}
				}
			}
		});
	});
	$('#modal-add-cate-service, #modal-update-cate-service').on('hidden.bs.modal', function (e) {
		$('title').html(title_manage_category_service);
	});
});