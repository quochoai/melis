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
                "url": backend_products_list,
                "dataType": "json",
                "type": "GET",
                "data": { product_id: product_id },
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
                { data: 'sort', name: 'sort', className: "text-center text-nowrap small_text" },
                //{ data: 'actions', name: 'actions', className: "text-center text-nowrap small_text" },
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
                        let html = '<a data-id="' + data.id + '" rel="' + data.active + '" class="btn btn-success btn-sm active_product mr-1" id="ht' + data.id + '" title="' + tte + '"><i id="hs' + data.id + '" class="fas fa-' + fontaw + '"></i></a>';
                        html += '<a rel="' + data.id + '" class="btn btn-success btn-sm update_product mr-1" title="' + text_update + '"><i class="fas fa-edit"></i></a>';
                        html += '<a class="btn btn-danger btn-sm delete_product" rel="' + data.id + '" title="' + text_delete + '"><i class="fas fa-trash"></i></a>';
                        return html;
                    }
                }
            ]
        });
    }

    // delete
    $(document).on('click', '.delete_product', function() {
        var id = $(this).attr('rel');
        if (confirm(conf)) {
            $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
            $.post(link_delete, { id: id, table: tables }, function(data) {
                if (data == '1')
                    $('tr#product' + id).hide();
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
    $(document).on('click', '.active_product', function() {
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
        $.post(link_active_product, { id: id, acti: activ, table: tables }, function(html) {
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

    // update_sort
    $(document).on('click', '.sort_product', function() {
        var id = $(this).attr('id');
        var sapxep = $(this).val();
        $.post(link_update_sort, { id: id, sapxep: sapxep, table: tables }, function(data) {
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
    });

    // reload
    $(document).on('click', '.reload_product', function() {
        $(table_id).DataTable().destroy();
        //$(table_id).DataTable().state.clear();
        fill_datatable();
    });

    // add
    $(document).on('click', '.add_product', function() {
        var product_id = $(this).attr('rel');
        $.post(link_add, { product_id: product_id }, function(data) {
            $('#product_add').html(data);
            $('#modal-add-product').modal('show');
            $('title').html(text_add_product);
        });
    });

    $(document).on('click', '#add_product', function() {
        let name_vi_product = $.trim($('#name_vi_product').val());
        let name_en_product = $.trim($('#name_en_product').val());
        if (name_vi_product == '') {
            toastr.error(not_name_product_vi);
            $('#name_vi_product').focus();
            $('#name_vi_product').addClass("is-invalid");
            return false;
        } else {
            $('#name_vi_product').removeClass("is-invalid");
            $('#name_vi_product_e').addClass("is-valid");
        }
        if (name_en_product == '') {
            toastr.error(not_name_product_en);
            $('#name_en_product').focus();
            $('#name_en_product').addClass("is-invalid");
            return false;
        } else {
            $('#name_en_product').removeClass("is-invalid");
            $('#name_en_product').addClass("is-valid");
        }
        $('#form_add_product').ajaxForm({
            beforeSend: function() {
                $('#add_product').attr("disabled", true);
                $('#add_product').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ' + processing);
            },
            uploadProgress: function(event, position, total, percentComplete) {

            },
            success: function() {
                /*var percentVal = '100%';
                bar.width(percentVal);
                percent.html(percentVal);*/
            },
            complete: function(xhr) {
                $('#add_product').html(text_save + ' <i class="fas fa-save">');
                $('#add_product').removeAttr('disabled');
                var text = xhr.responseText;
                if (text == '1') {
                    toastr.success(add_success);
                    setTimeout(function() {
                        $(table_id).DataTable().destroy();
                        fill_datatable();
                        $('#product_add').html('');
                        $('#modal-add-product').modal('hide');
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
    $(document).on('click', '.update_product', function() {
        let id = $(this).attr('rel');
        $.post(link_update, { id: id }, function(html) {
            $('#product_update').html(html);
            $('#modal-update-product').modal('show');
            $('title').html(text_update_product);
        });
    });
    $(document).on('click', '#update_product', function() {
        var name_vi_product = $.trim($('#name_vi_product_e').val());
        var name_en_product = $.trim($('#name_en_product_e').val());
        if (name_vi_product == '') {
            toastr.error(not_name_product_vi);
            $('#name_vi_product_e').focus();
            $('#name_vi_product_e').addClass("is-invalid");
            return false;
        } else {
            $('#name_vi_product_e').removeClass("is-invalid");
            $('#name_vi_product_e').addClass("is-valid");
        }
        if (name_en_product == '') {
            toastr.error(not_name_product_en);
            $('#name_en_product_e').focus();
            $('#name_en_product_e').addClass("is-invalid");
            return false;
        } else {
            $('#name_en_product_e').removeClass("is-invalid");
            $('#name_en_product_e').addClass("is-valid");
        }
        $('#form_update_product').ajaxForm({
            beforeSend: function() {
                $('#update_product').attr("disabled", true);
                $('#update_product').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ' + processing);
            },
            uploadProgress: function(event, position, total, percentComplete) {

            },
            success: function() {
                /*var percentVal = '100%';
                bar.width(percentVal);
                percent.html(percentVal);*/
            },
            complete: function(xhr) {
                $('#update_product').html(text_update + ' <i class="fas fa-edit">');
                $('#update_product').removeAttr('disabled');
                var text = xhr.responseText;
                if (text == '1') {
                    toastr.success(update_success);
                    setTimeout(function() {
                        //window.location.reload();
                        $(table_id).DataTable().destroy();
                        fill_datatable();
                        $('#modal-update-product').modal('hide');
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
    $('#modal-add-product, #modal-update-product').on('hidden.bs.modal', function (e) {
        $('title').html(text_manage_product);
    });
});