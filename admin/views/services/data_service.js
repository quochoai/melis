jQuery(document).ready(function($) {
	fill_datatable();

	function fill_datatable() {
		$(table_id_service).DataTable({
			"aoColumnDefs": [{ "bSortable": false, "aTargets": [3, 4, 5] }],
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
				"url": backend_list_service,
				"dataType": "json",
				"type": "GET",
				"data": { service_id: service_id },
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
						let html = '<a rel="' + data.id + '" data-name="' + data.name_vi + '" class="text-center small_text table_price" title="' + manage_price + data.name_vi + '"><i class="fas fa-table"></i> ' + manage + '</a>';
						return html;
					}
				},
				{ data: 'sort', name: 'sort', className: "text-center text-nowrap small_text" },
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
						var html = '<a data-id="' + data.id + '" rel="' + data.active + '" class="btn btn-success btn-sm active_service mr-1" id="htservice' + data.id + '" title="' + tte + '"><i id="hsservice' + data.id + '" class="fas fa-' + fontaw + '"></i></a>';
						html += '<a rel="' + data.id + '" class="btn btn-success btn-sm update_service mr-1" title="' + text_update + '"><i class="fas fa-edit"></i></a>';
						html += '<a class="btn btn-danger btn-sm delete_service" rel="' + data.id + '" title="' + text_delete + '"><i class="fas fa-trash"></i></a>';
						return html;
					}
				},
			]
		});
	}

	// delete
	$(document).on('click', '.delete_service', function() {
		var id = $(this).attr('rel');
		if (confirm(conf)) {
			$(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
			$.post(link_delete, { id: id, table: table_service }, function(data) {
				if (data == '1')
					$('tr#service' + id).hide();
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
	$(document).on('click', '.active_service', function() {
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
		$.post(link_active, { id: id, acti: activ, table: table_service }, function(html) {
			if (html == '1') {
				$('#htservice' + id).attr('rel', activ);
				$('#htservice' + id).attr('title', tit);
				$('#hsservice' + id).removeClass(removeC);
				$('#hsservice' + id).addClass(addC);
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
	$(document).on('change', '.sort_service', function() {
		var id = $(this).attr('id');
		var sapxep = $(this).val();
		$.post(link_update_sort, { id: id, sapxep: sapxep, table: table_service }, function(data) {
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

	// reload
	$(document).on('click', '.reload_service', function() {
		$(table_id_service).DataTable().destroy();
		//$(table_id_service).DataTable().state.clear();
		fill_datatable();
	});

	// add
	$(document).on('click', '.add_service', function() {
		var service_id = $(this).attr('rel');
		$.post(link_add_service, { service_id: service_id }, function(data) {
			$('#service_add').html(data);
			$('#modal-add-service').modal('show');
			$('title').html(text_add_service);
		});
	});

	$(document).on('click', '#add_service', function() {
		let eNameServiceVi = $('#name_vi_service');
		let eNameServiceEn = $('#name_en_service');
		let name_vi = $.trim(eNameServiceVi.val());
		let name_en = $.trim(eNameServiceEn.val());
		if (name_vi == '') {
			toastr.error(not_name_service_vi);
			eNameServiceVi.focus();
			eNameServiceVi.addClass("is-invalid");
			return false;
		} else {
			eNameServiceVi.removeClass("is-invalid");
			eNameServiceVi.addClass("is-valid");
		}
		if (name_en == '') {
			toastr.error(not_name_service_en);
			eNameServiceEn.focus();
			eNameServiceEn.addClass("is-invalid");
			return false;
		} else {
			eNameServiceEn.removeClass("is-invalid");
			eNameServiceEn.addClass("is-valid");
		}
		$('#form_add_service').ajaxForm({
			beforeSend: function() {
				$('#add_service').attr("disabled", true);
				$('#add_service').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ' + processing);
			},
			uploadProgress: function(event, position, total, percentComplete) {

			},
			success: function() {
				/*var percentVal = '100%';
				bar.width(percentVal);
				percent.html(percentVal);*/
			},
			complete: function(xhr) {
				$('#add_service').html(text_save + ' <i class="fas fa-save">');
				$('#add_service').removeAttr('disabled');
				var text = xhr.responseText;
				if (text == '1') {
					toastr.success(add_success);
					setTimeout(function() {
						$(table_id_service).DataTable().destroy();
						fill_datatable();
						$('#modal-add-service').modal('hide');
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

	// update
	$(document).on('click', '.update_service', function() {
		let id = $(this).attr('rel');
		$.post(link_update, { id: id }, function(html) {
			$('#service_update').html(html);
			$('#modal-update-service').modal('show');
			$('title').html(text_update_service);
		});
	});
	$(document).on('click', '#update_service', function() {
		let eNameServiceVi = $('#name_vi_service_e');
		let eNameServiceEn = $('#name_en_service_e');
		var name_vi = $.trim(eNameServiceVi.val());
		var name_en = $.trim(eNameServiceEn.val());
		if (name_vi == '') {
			toastr.error(not_name_service_vi);
			eNameServiceVi.focus();
			eNameServiceVi.addClass("is-invalid");
			return false;
		} else {
			eNameServiceVi.removeClass("is-invalid");
			eNameServiceVi.addClass("is-valid");
		}
		if (name_en == '') {
			toastr.error(not_name_service_en);
			eNameServiceEn.focus();
			eNameServiceEn.addClass("is-invalid");
			return false;
		} else {
			eNameServiceEn.removeClass("is-invalid");
			eNameServiceEn.addClass("is-valid");
		}
		$('#form_update_service').ajaxForm({
			beforeSend: function() {
				$('#update_service').attr("disabled", true);
				$('#update_service').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ' + processing);
			},
			uploadProgress: function(event, position, total, percentComplete) {

			},
			success: function() {
				/*var percentVal = '100%';
				bar.width(percentVal);
				percent.html(percentVal);*/
			},
			complete: function(xhr) {
				$('#update_service').html(text_update + ' <i class="fas fa-edit">');
				$('#update_service').removeAttr('disabled');
				var text = xhr.responseText;
				if (text == '1') {
					toastr.success(update_success);
					setTimeout(function() {
						//window.location.reload();
						$(table_id_service).DataTable().destroy();
						fill_datatable();
						$('#modal-update-service').modal('hide');
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
	$('#modal-add-service, #modal-update-service').on('hidden.bs.modal', function (e) {
		$('title').html(text_manage_service);
	});
});