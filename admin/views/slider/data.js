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
                "url": backend_list,
                "dataType": "json",
                "type": "GET",
                "data": { hc_id: hc_id },
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
                { data: 'image', name: 'image', className: "text-center small_text" },
                { data: 'alt', name: 'alt', className: "text-left small_text" },
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
                        var html = '<a data-id="' + data.id + '" rel="' + data.active + '" class="btn btn-success btn-sm active_slider mr-1" id="htslider' + data.id + '" title="' + tte + '"><i id="hsslider' + data.id + '" class="fas fa-' + fontaw + '"></i></a>';
                        html += '<a rel="' + data.id + '" class="btn btn-success btn-sm update_slider mr-1" title="' + text_update + '"><i class="fas fa-edit"></i></a>';
                        html += '<a class="btn btn-danger btn-sm delete_slider" rel="' + data.id + '" title="' + text_delete + '"><i class="fas fa-trash"></i></a>';
                        return html;
                    }
                }
            ]
        });
    }
    // delete
    $(document).on('click', '.delete_slider', function() {
        var id = $(this).attr('rel');
        if (confirm(conf)) {
            $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
            $.post(link_delete, { id: id }, function(data) {
                if (data == '1')
                    $('tr#slider' + id).hide();
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
    $(document).on('click', '.active_slider', function() {
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
        $.post(link_active, { id: id, acti: activ }, function(html) {
            if (html == '1') {
                $('#htslider' + id).attr('rel', activ);
                $('#htslider' + id).attr('title', tit);
                $('#hsslider' + id).removeClass(removeC);
                $('#hsslider' + id).addClass(addC);
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
    $(document).on('change', '.sort_slider', function() {
        var id = $(this).attr('id');
        var sapxep = $(this).val();
        $.post(link_update_sort, { id: id, sapxep: sapxep }, function(data) {
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
    $(document).on('click', '.reload_slider', function() {
        $(table_id).DataTable().destroy();
        fill_datatable();
    });

    // add
    $(document).on('click', '.add_slider', function() {
        var hc_id = $(this).attr('rel');
        $.post(link_add, { hc_id: hc_id }, function(data) {
            $('#slider_add').html(data);
            $('#modal-add-slider').modal('show');
        });
    });

    $(document).on('click', '#add_slider', function() {
        let image = $.trim($('#image_slider').val());
        if (image == '') {
            toastr.error(not_choose_image_slider);
            $('#image_slider').focus();
            return false;
        }
        $('#form_add_slider').ajaxForm({
            beforeSend: function() {
                $('#add_slider').attr("disabled", true);
                $('#add_slider').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ' + processing);
            },
            uploadProgress: function(event, position, total, percentComplete) {

            },
            success: function() {
                /*var percentVal = '100%';
                bar.width(percentVal);
                percent.html(percentVal);*/
            },
            complete: function(xhr) {
                $('#add_slider').html(text_save + ' <i class="fas fa-save">');
                $('#add_slider').removeAttr('disabled');
                var text = xhr.responseText;
                if (text == '1') {
                    toastr.success(add_success);
                    setTimeout(function() {
                        $(table_id).DataTable().destroy();
                        fill_datatable();
                        $('#modal-add-slider').modal('hide');
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
    $(document).on('click', '.update_slider', function() {
        let id = $(this).attr('rel');
        $.post(link_update, { id: id }, function(html) {
            $('#slider_update').html(html);
            $('#modal-update-slider').modal('show');
        });
    });
    $(document).on('click', '#update_slider', function() {
        $('#form_update_slider').ajaxForm({
            beforeSend: function() {
                $('#update_slider').attr("disabled", true);
                $('#update_slider').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ' + processing);
            },
            uploadProgress: function(event, position, total, percentComplete) {

            },
            success: function() {
                /*var percentVal = '100%';
                bar.width(percentVal);
                percent.html(percentVal);*/
            },
            complete: function(xhr) {
                $('#update_slider').html(text_update + ' <i class="fas fa-edit">');
                $('#update_slider').removeAttr('disabled');
                var text = xhr.responseText;
                console.log(text);
                if (text == '1') {
                    toastr.success(update_success);
                    setTimeout(function() {
                        $(table_id).DataTable().destroy();
                        fill_datatable();
                        $('#modal-update-slider').modal('hide');
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