jQuery(document).ready(function($) {
	fill_datatable();

	function fill_datatable() {
		$(table_id_review).DataTable({
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
				"url": backend_list_review,
				"dataType": "json",
				"type": "GET",
				"data": { rv_id: rv_id },
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
				{ data: 'customer_vi', name: 'customer_vi', className: "text-left small_text" },
				{ data: 'customer_en', name: 'customer_en', className: "text-left small_text" },
				{ data: 'image', name: 'image', className: "text-center small_text" },
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
						var html = '<a data-id="' + data.id + '" rel="' + data.active + '" class="btn btn-success btn-sm active_review mr-1" id="htreview' + data.id + '" title="' + tte + '"><i id="hsreview' + data.id + '" class="fas fa-' + fontaw + '"></i></a>';
						html += '<a rel="' + data.id + '" class="btn btn-success btn-sm update_review mr-1" title="' + text_update + '"><i class="fas fa-edit"></i></a>';
						html += '<a class="btn btn-danger btn-sm delete_review" rel="' + data.id + '" title="' + text_delete + '"><i class="fas fa-trash"></i></a>';
						return html;
					}
				}
			]
		});
	}
	// delete
	$(document).on('click', '.delete_review', function() {
		var id = $(this).attr('rel');
		if (confirm(conf)) {
			$(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
			$.post(link_delete, { id: id, table: table_review }, function(data) {
				if (data == '1')
					$('tr#review' + id).hide();
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
	$(document).on('click', '.active_review', function() {
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
		$.post(link_active, { id: id, acti: activ, table: table_review }, function(html) {
			if (html == '1') {
				$('#htreview' + id).attr('rel', activ);
				$('#htreview' + id).attr('title', tit);
				$('#hsreview' + id).removeClass(removeC);
				$('#hsreview' + id).addClass(addC);
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
	$(document).on('change', '.sort_review', function() {
		var id = $(this).attr('id');
		var sapxep = $(this).val();
		$.post(link_update_sort, { id: id, sapxep: sapxep, table: table_review }, function(data) {
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
	$(document).on('click', '.reload_review', function() {
		$(table_id_review).DataTable().destroy();
		fill_datatable();
	});

	// add
	$(document).on('click', '.add_review', function() {
		var rv_id = $(this).attr('rel');
		$.post(link_add_review, { rv_id: rv_id }, function(data) {
			$('#review_add').html(data);
			$('#modal-add-review').modal('show');
		});
	});

	$(document).on('click', '#add_review', function() {
		let eCustomerVi = $('#customer_vi');
		let eCustomerEn = $('#customer_en');
		let customer_vi = $.trim(eCustomerVi.val());
		let customer_en = $.trim(eCustomerEn.val());
		if (customer_vi == '') {
			toastr.error(not_enter_customer_vi);
			eCustomerVi.focus();
			eCustomerVi.addClass("is-invalid");
			return false;
		} else {
			eCustomerVi.removeClass("is-invalid");
			eCustomerVi.addClass("is-valid");
		}
		if (customer_en == '') {
			toastr.error(not_enter_customer_en);
			eCustomerEn.focus();
			eCustomerEn.addClass("is-invalid");
			return false;
		} else {
			eCustomerEn.removeClass("is-invalid");
			eCustomerEn.addClass("is-valid");
		}
		$('#form_add_review').ajaxForm({
			beforeSend: function() {
				$('#add_review').attr("disabled", true);
				$('#add_review').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ' + processing);
			},
			uploadProgress: function(event, position, total, percentComplete) {

			},
			success: function() {
				/*var percentVal = '100%';
				bar.width(percentVal);
				percent.html(percentVal);*/
			},
			complete: function(xhr) {
				$('#add_review').html(text_save + ' <i class="fas fa-save">');
				$('#add_review').removeAttr('disabled');
				var text = xhr.responseText;
				if (text == '1') {
					toastr.success(add_success);
					setTimeout(function() {
						$(table_id_review).DataTable().destroy();
						fill_datatable();
						$('#modal-add-review').modal('hide');
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
	$(document).on('click', '.update_review', function() {
		let id = $(this).attr('rel');
		$.post(link_update_review, { id: id }, function(html) {
			$('#review_update').html(html);
			$('#modal-update-review').modal('show');
		});
	});
	$(document).on('click', '#update_review', function() {
		let eCustomerVi = $('#customer_vi_e');
		let eCustomerEn = $('#customer_en_e');
		let customer_vi = $.trim(eCustomerVi.val());
		let customer_en = $.trim(eCustomerEn.val());
		if (customer_vi == '') {
			toastr.error(not_enter_customer_vi);
			eCustomerVi.focus();
			eCustomerVi.addClass("is-invalid");
			return false;
		} else {
			eCustomerVi.removeClass("is-invalid");
			eCustomerVi.addClass("is-valid");
		}
		if (customer_en == '') {
			toastr.error(not_enter_customer_en);
			eCustomerEn.focus();
			eCustomerEn.addClass("is-invalid");
			return false;
		} else {
			eCustomerEn.removeClass("is-invalid");
			eCustomerEn.addClass("is-valid");
		}
		$('#form_update_review').ajaxForm({
			beforeSend: function() {
				$('#update_review').attr("disabled", true);
				$('#update_review').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ' + processing);
			},
			uploadProgress: function(event, position, total, percentComplete) {

			},
			success: function() {
				/*var percentVal = '100%';
				bar.width(percentVal);
				percent.html(percentVal);*/
			},
			complete: function(xhr) {
				$('#update_review').html(text_update + ' <i class="fas fa-edit">');
				$('#update_review').removeAttr('disabled');
				var text = xhr.responseText;
				if (text == '1') {
					toastr.success(update_success);
					setTimeout(function() {
						$(table_id_review).DataTable().destroy();
						fill_datatable();
						$('#modal-update-review').modal('hide');
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
});