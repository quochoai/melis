jQuery(document).ready(function($) {
    fill_datatable();

    function fill_datatable() {
        $(table_id).DataTable({
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
                "url": backend_list,
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
                { data: 'banggia', name: 'banggia', className: "text-left small_text" },
                { data: 'sort', name: 'sort', className: "text-center text-nowrap small_text" },
                { data: 'actions', name: 'actions', className: "text-center text-nowrap small_text" },
            ]
        });
    }

    // delete
    $(document).on('click', '.delete_service', function() {
        var id = $(this).attr('rel');
        if (confirm(conf)) {
            $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
            $.post(link_delete, { id: id }, function(data) {
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
        $.post(link_active, { id: id, acti: activ }, function(html) {
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

    // update_sort
    $(document).on('click', '.sort_service', function() {
        var sapxep = [];
        $('input[name^=sort]').each(function() {
            sapxep.push($(this).val());
        });
        var id = [];
        $('input[name^=idd]').each(function() {
            id.push($(this).val());
        });

        $.post(link_update_sort, { id: id, sapxep: sapxep }, function(data) {
            if (data == '1') {
                $(table_id).DataTable().destroy();
                fill_datatable();
            } else {
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
    });

    // reload
    $(document).on('click', '.reload_service', function() {
        $(table_id).DataTable().destroy();
        //$(table_id).DataTable().state.clear();
        fill_datatable();
    });

    // add
    $(document).on('click', '.add_service', function() {
        var service_id = $(this).attr('rel');
        $.post(link_add, { service_id: service_id }, function(data) {
            $('#service_add').html(data);
            $('#modal-add-service').modal('show');
        });
    });

    $(document).on('click', '#add_service', function() {
        let name_vi = $.trim($('#name_vi').val());
        let name_en = $.trim($('#name_en').val());
        if (name_vi == '') {
            toastr.error(not_name_service_vi);
            $('#name_vi').focus();
            $('#name_vi').addClass("is-invalid");
            return false;
        } else {
            $('#name_vi').removeClass("is-invalid");
            $('#name_vi_e').addClass("is-valid");
        }
        if (name_en == '') {
            toastr.error(not_name_service_en);
            $('#name_en').focus();
            $('#name_en').addClass("is-invalid");
            return false;
        } else {
            $('#name_en').removeClass("is-invalid");
            $('#name_en').addClass("is-valid");
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
                        $(table_id).DataTable().destroy();
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
        });
    });
    $(document).on('click', '#update_service', function() {
        var name_vi = $.trim($('#name_vi').val());
        var name_en = $.trim($('#name_en').val());
        if (name_vi == '') {
            toastr.error(not_name_service_vi);
            $('#name_vi').focus();
            $('#name_vi').addClass("is-invalid");
            return false;
        } else {
            $('#name_vi').removeClass("is-invalid");
            $('#name_vi').addClass("is-valid");
        }
        if (name_en == '') {
            toastr.error(not_name_service_en);
            $('#name_en').focus();
            $('#name_en').addClass("is-invalid");
            return false;
        } else {
            $('#name_en').removeClass("is-invalid");
            $('#name_en').addClass("is-valid");
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
                        $(table_id).DataTable().destroy();
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
});