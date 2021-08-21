jQuery(document).ready(function($) {
    fill_datatable();

    function fill_datatable() {
        $(table_id).DataTable({
            "aoColumnDefs": [{ "bSortable": false, "aTargets": [3, 4] }],
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
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
                "url": backend_categories_list,
                "dataType": "json",
                "type": "GET",
                "data": {},
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
                { data: 'manage_product', name: 'manage_product', className: "text-center text-nowrap small_text" },
                { data: 'actions', name: 'actions', className: "text-center text-nowrap small_text" },
            ]
        });
    }

    // delete
    $(document).on('click', '.delete', function() {
        var id = $(this).attr('rel');
        if (confirm(conf)) {
            $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
            $.post(link_delete, { id: id }, function(data) {
                if (data == '1')
                    $('tr#cate' + id).hide();
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
    $(document).on('click', '.active', function() {
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
        $.post(link_active_category, { id: id, acti: activ }, function(html) {
            if (html == '1') {
                $('#ht' + id).attr('rel', activ);
                $('#ht' + id).attr('title', tit);
                $('#hs' + id).removeClass(removeC);
                $('#hs' + id).addClass(addC);
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
    // .update
    $(document).on('click', '.update', function() {
        let id = $(this).attr('rel');
        $.post(link_get_category_product, { id: id }, function(html) {
            $('#cate_update').html(html);
            $('#modal-update-cate').modal('show');
        });
    });
    // add
    $(document).on('click', '#add', function() {
        let name_vi = $.trim($('#name_vi').val());
        let name_en = $.trim($('#name_en').val());
        if (name_vi == '') {
            toastr.error(not_name_category_product_vi);
            $('#name_vi').focus();
            $('#name_vi').addClass("is-invalid");
            return false;
        } else {
            $('#name_vi').removeClass("is-invalid");
            $('#name_vi_e').addClass("is-valid");
        }
        if (name_en == '') {
            toastr.error(not_name_category_product_en);
            $('#name_en').focus();
            $('#name_en').addClass("is-invalid");
            return false;
        } else {
            $('#name_en').removeClass("is-invalid");
            $('#name_en').addClass("is-valid");
        }
        $('#form_add').ajaxForm({
            beforeSend: function() {
                $('#add').attr("disabled", true);
                $('#add').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ' + processing);
            },
            uploadProgress: function(event, position, total, percentComplete) {

            },
            success: function() {
                /*var percentVal = '100%';
                bar.width(percentVal);
                percent.html(percentVal);*/
            },
            complete: function(xhr) {
                $('#add').html(text_save + ' <i class="fas fa-save">');
                $('#add').removeAttr('disabled');
                var text = xhr.responseText;
                if (text == '1') {
                    toastr.success(add_success);
                    $('#name_vi').val('');
                    $('#name_en').val('');
                    $('#title_vi').val('');
                    $('#title_en').val('');
                    $('#desc_vi').val('');
                    $('#desc_en').val('');
                    $('#keyw_vi').val('');
                    $('#keyw_en').val('');
                    $('#name_vi').removeClass("is-valid");
                    $('#name_en').removeClass("is-valid");
                    $('#modal-add-cate').modal('hide');
                    $(table_id).DataTable().destroy();
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
    $(document).on('click', '#update', function() {
        let name_vi = $.trim($('#name_vi_e').val());
        let name_en = $.trim($('#name_en_e').val());
        if (name_vi == '') {
            toastr.error(not_name_category_product_vi);
            $('#name_vi_e').focus();
            $('#name_vi_e').addClass("is-invalid");
            return false;
        } else {
            $('#name_vi_e').removeClass("is-invalid");
            $('#name_vi_e').addClass("is-valid");
        }
        if (name_en == '') {
            toastr.error(not_name_category_product_en);
            $('#name_en_e').focus();
            $('#name_en_e').addClass("is-invalid");
            return false;
        } else {
            $('#name_en_e').removeClass("is-invalid");
            $('#name_en_e').addClass("is-valid");
        }
        $('#form_update').ajaxForm({
            beforeSend: function() {
                $('#update').attr("disabled", true);
                $('#update').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ' + processing);
            },
            uploadProgress: function(event, position, total, percentComplete) {

            },
            success: function() {
                /*var percentVal = '100%';
                bar.width(percentVal);
                percent.html(percentVal);*/
            },
            complete: function(xhr) {
                $('#update').html(text_update + ' <i class="fas fa-edit">');
                $('#update').removeAttr('disabled');
                var text = xhr.responseText;
                console.log(text);
                if (text == '1') {
                    toastr.success(update_success);
                    setTimeout(function() {
                        //window.location.reload();
                        $(table_id).DataTable().destroy();
                        fill_datatable();
                        $('#modal-update-cate').modal('hide');
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