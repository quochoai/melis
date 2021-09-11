jQuery(document).ready(function($) {
    fill_datatable();

    function fill_datatable() {
        $(table_id).DataTable({
            "aoColumnDefs": [{ "bSortable": false, "aTargets": [4, 5] }],
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
                "data": { news_id: news_id },
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
                { data: 'post_date', name: 'post_date', className: "text-center small_text" },
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
                        var html = '<a data-id="' + data.id + '" rel="' + data.active + '" class="btn btn-success btn-sm active_news mr-1" id="htnews' + data.id + '" title="' + tte + '"><i id="hsnews' + data.id + '" class="fas fa-' + fontaw + '"></i></a>';
                        html += '<a rel="' + data.id + '" class="btn btn-success btn-sm update_news mr-1" title="' + text_update + '"><i class="fas fa-edit"></i></a>';
                        html += '<a class="btn btn-danger btn-sm delete_news" rel="' + data.id + '" title="' + text_delete + '"><i class="fas fa-trash"></i></a>';
                        return html;
                    }
                }
            ]
        });
    }
    // delete
    $(document).on('click', '.delete_news', function() {
        var id = $(this).attr('rel');
        if (confirm(conf)) {
            $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
            $.post(link_delete, { id: id }, function(data) {
                if (data == '1')
                    $('tr#news' + id).hide();
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
    $(document).on('click', '.active_news', function() {
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
                $('#htnews' + id).attr('rel', activ);
                $('#htnews' + id).attr('title', tit);
                $('#hsnews' + id).removeClass(removeC);
                $('#hsnews' + id).addClass(addC);
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
    $(document).on('change', '.sort_news', function() {
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
    $(document).on('click', '.reload_news', function() {
        $(table_id).DataTable().destroy();
        fill_datatable();
    });

    // add
    $(document).on('click', '.add_news', function() {
        var news_id = $(this).attr('rel');
        $.post(link_add, { news_id: news_id }, function(data) {
            $('#news_add').html(data);
            $('#modal-add-news').modal('show');
        });
    });

    $(document).on('click', '#add_news', function() {
        let name_vi = $.trim($('#name_vi').val());
        let name_en = $.trim($('#name_en').val());
        if (name_vi == '') {
            toastr.error(not_enter_title_news_vi);
            $('#name_vi').focus();
            $('#name_vi').addClass("is-invalid");
            return false;
        } else {
            $('#name_vi').removeClass("is-invalid");
            $('#name_vi').addClass("is-valid");
        }
        if (name_en == '') {
            toastr.error(not_enter_title_news_en);
            $('#name_en').focus();
            $('#name_en').addClass("is-invalid");
            return false;
        } else {
            $('#name_en').removeClass("is-invalid");
            $('#name_en').addClass("is-valid");
        }
        $('#form_add_news').ajaxForm({
            beforeSend: function() {
                $('#add_news').attr("disabled", true);
                $('#add_news').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ' + processing);
            },
            uploadProgress: function(event, position, total, percentComplete) {

            },
            success: function() {
                /*var percentVal = '100%';
                bar.width(percentVal);
                percent.html(percentVal);*/
            },
            complete: function(xhr) {
                $('#add_news').html(text_save + ' <i class="fas fa-save">');
                $('#add_news').removeAttr('disabled');
                var text = xhr.responseText;
                console.log(text);
                if (text == '1') {
                    toastr.success(add_success);
                    setTimeout(function() {
                        $(table_id).DataTable().destroy();
                        fill_datatable();
                        $('#modal-add-news').modal('hide');
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
    $(document).on('click', '.update_news', function() {
        let id = $(this).attr('rel');
        $.post(link_update, { id: id }, function(html) {
            $('#news_update').html(html);
            $('#modal-update-news').modal('show');
        });
    });
    $(document).on('click', '#update_news', function() {
        let name_vi = $.trim($('#name_vi').val());
        let name_en = $.trim($('#name_en').val());
        if (name_vi == '') {
            toastr.error(not_enter_title_news_vi);
            $('#name_vi').focus();
            $('#name_vi').addClass("is-invalid");
            return false;
        } else {
            $('#name_vi').removeClass("is-invalid");
            $('#name_vi').addClass("is-valid");
        }
        if (name_en == '') {
            toastr.error(not_enter_title_news_en);
            $('#name_en').focus();
            $('#name_en').addClass("is-invalid");
            return false;
        } else {
            $('#name_en').removeClass("is-invalid");
            $('#name_en').addClass("is-valid");
        }
        $('#form_update_news').ajaxForm({
            beforeSend: function() {
                $('#update_news').attr("disabled", true);
                $('#update_news').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ' + processing);
            },
            uploadProgress: function(event, position, total, percentComplete) {

            },
            success: function() {
                /*var percentVal = '100%';
                bar.width(percentVal);
                percent.html(percentVal);*/
            },
            complete: function(xhr) {
                $('#update_news').html(text_update + ' <i class="fas fa-edit">');
                $('#update_news').removeAttr('disabled');
                var text = xhr.responseText;
                console.log(text);
                if (text == '1') {
                    toastr.success(update_success);
                    setTimeout(function() {
                        $(table_id).DataTable().destroy();
                        fill_datatable();
                        $('#modal-update-news').modal('hide');
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