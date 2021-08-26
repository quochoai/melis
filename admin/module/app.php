<?php
    if (isset($_SESSION['is_logined']))
        $user_id = $_SESSION['is_logined'];
    else
        $user_id = $_COOKIE['islogined'];
    $pqh = explode("/", trim($_REQUEST['pqh']));
    
    if (!isset($pqh[1]) && trim($pqh[1]) == '') { 
        $key_title_site = 'title_website';
    } else {
        $key_title_site = $_REQUEST['pqh'];
        
    }
    $profile = $h->getById("email, hoten, nhomqt", "admins", $user_id, "and deleted_at is null");
?>
<!DOCTYPE html>
<html>
    <head>
      <base href="<?php _e($def['admin_url']) ?>" />
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <link href="icon_favicon.png" rel="icon" />
      <title><?php include("title.php"); ?></title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <!-- Font Awesome -->
      <link rel="stylesheet" href="<?php _e($def['theme']) ?>plugins/fontawesome-free/css/all.min.css" />
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
      <!-- Tempusdominus Bbootstrap 4 -->
      <link rel="stylesheet" href="<?php _e($def['theme']) ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />
      <!-- iCheck -->
      <link rel="stylesheet" href="<?php _e($def['theme']) ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
      <!-- JQVMap -->
      <link rel="stylesheet" href="<?php _e($def['theme']) ?>plugins/jqvmap/jqvmap.min.css" />
      <link rel="stylesheet" href="<?php _e($def['theme']) ?>plugins/bootstrap-table/bootstrap-table.min.css" />
      <!-- Theme style -->
      <link rel="stylesheet" href="<?php _e($def['theme']) ?>dist/css/adminlte.min.css" />
      <!-- overlayScrollbars -->
      <link rel="stylesheet" href="<?php _e($def['theme']) ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
      <!-- Daterange picker -->
      <link rel="stylesheet" href="<?php _e($def['theme']) ?>plugins/daterangepicker/daterangepicker.css" />
      <!-- summernote -->
      <link rel="stylesheet" href="<?php _e($def['theme']) ?>plugins/summernote/summernote-bs4.css" />
      <!-- plugin lined-textarea -->
      <link rel="stylesheet" href="<?php _e($def['theme']) ?>plugins/lined-textarea/jquery-linedtextarea.css" />
      <!-- select2 -->
      <link rel="stylesheet" href="<?php _e($def['theme']) ?>plugins/select2/css/select2.min.css" />
      <link rel="stylesheet" href="<?php _e($def['theme']) ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css" />
      <style type="text/css">
        label:not(.form-check-label):not(.custom-file-label) {
            font-weight: 400;
        }
        .up-to-top {bottom: 10px; right: 10px; z-index: 999999999;}
      </style>
      <!-- DataTables -->
      <link rel="stylesheet" href="<?php _e($def['theme']) ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" />
      <link rel="stylesheet" href="<?php _e($def['theme']) ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css" />
      <link rel="stylesheet" href="<?php _e($def['theme']) ?>plugins/datatables-fixedcolumns/css/fixedColumns.bootstrap4.min.css" />
      <link rel="stylesheet" href="<?php _e($def['theme']) ?>plugins/datatables-fixedheader/css/fixedHeader.bootstrap4.min.css" />
      <link rel="stylesheet" href="<?php _e($def['theme']) ?>plugins/datatables-buttons/css/buttons.dataTables.min.css" />
      <!-- Google Font: Source Sans Pro -->
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
      <!-- jQuery -->
        <script src="<?php _e($def['theme']) ?>plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php _e($def['theme']) ?>plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
          $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="<?php _e($def['theme']) ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- daterangepicker -->
        <script src="<?php _e($def['theme']) ?>plugins/moment/moment.min.js"></script>
        <script src="<?php _e($def['theme']) ?>plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
        <script src="<?php _e($def['theme']) ?>plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="<?php _e($def['theme']) ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="<?php _e($def['theme']) ?>plugins/summernote/summernote-bs4.min.js"></script>
        <!-- Select2 -->
        <script src="<?php _e($def['theme']) ?>plugins/select2/js/select2.full.min.js"></script>
        <!-- Bootstrap Switch -->
        <script src="<?php _e($def['theme']) ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="<?php _e($def['theme']) ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- DataTables -->
        <script src="<?php _e($def['theme']) ?>plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php _e($def['theme']) ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?php _e($def['theme']) ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php _e($def['theme']) ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        
        <script src="<?php _e($def['theme']) ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="<?php _e($def['theme']) ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        
        
        <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.3.1/js/dataTables.fixedColumns.min.js"></script>
        <script src="<?php _e($def['theme']) ?>plugins/datatables-fixedcolumns/js/fixedColumns.bootstrap4.min.js"></script>
        <script src="<?php _e($def['theme']) ?>plugins/datatables-fixedheader/js/dataTables.fixedHeader.min.js"></script>
        <script src="<?php _e($def['theme']) ?>plugins/datatables-fixedheader/js/fixedHeader.bootstrap4.min.js"></script>
        
        <link rel="stylesheet" href="<?php _e($def['theme']) ?>plugins/toastr/toastr.min.css" />
        <script src="<?php _e($def['theme']) ?>plugins/toastr/toastr.min.js"></script>
        <script src="<?php _e($def['theme']) ?>plugins/jquery.form/jquery.form.js"></script>
        <!-- bootstrap table -->
        <script src="<?php _e($def['theme']) ?>plugins/bootstrap-table/bootstrap-table.min.js"></script>
        <script src="<?php _e($def['theme']) ?>plugins/bootstrap-table/extensions/i18n-enhance/bootstrap-table-i18n-enhance.js"></script>
        <script src="<?php _e($def['theme']) ?>plugins/bootstrap-table/bootstrap-table-locale-all.min.js"></script>
        <!-- plugin lined-textarea -->
        <script src="<?php _e($def['theme']) ?>plugins/lined-textarea/jquery-linedtextarea.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php _e($def['theme']) ?>dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php _e($def['theme']) ?>dist/js/demo.js"></script>
        
        <script type="text/javascript">
            
            function formatNumber(num){
                num = num.toString().replace(/\$|\,/g,'');
                if(isNaN(num)) num = "0";
                sign = (num == (num = Math.abs(num)));
                num = Math.floor(num*100+0.50000000001);
                num = Math.floor(num/100).toString();
                for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
                    num = num.substring(0,num.length-(4*i+3))+','+num.substring(num.length-(4*i+3));
                    return (((sign)?'':'-') + num);
            }
            function redirecturl(link) {
                window.location.replace(link);
            }
        </script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-3GYS2Q9BXK"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'G-3GYS2Q9BXK');
        </script>
    </head> 
    <body class="hold-transition sidebar-mini layout-fixed accent-success">
        <div class="wrapper">
            <?php
                include("navbar.php");
                include("views/sidebar.php");
            ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" id="content_admin">
                <?php 
                    //_e($folder_views."customer/list.php";
                    //include("breadcrumb.php"); 
                    include("content.php");
                ?>
            </div>
            <!-- /.content-wrapper -->
            
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 1.0.5
                </div>
                <strong>Copyright © 2021 <?php _e($lang['copy_right']) ?>.</strong> All rights
                reserved.
            </footer>
            <a class="nav-link position-fixed background-success" class="up-to-top"><i class="fas fa-chevron-circle-up">Top</i></a>
        </div>
        <!-- ./wrapper -->
        <script type="text/javascript">
            function isNumber(n) { 
                return /^-?[\d.]+(?:e-?\d+)?$/.test(n); 
            } 
            $(function(){
                //Datemask dd/mm/yyyy
                $('#birthday, #ngaykiemtra, #ngaytuchoihs, #ngaylenlaihs, #ngaydauhs, #ngaylenmoihs, #birthday_s, #ngaykiemtra_s, #ngaytuchoihs_s, #ngaylenlaihs_s, #ngaydauhs_s, #ngaylenmoihs_s, #birthday_e, #ngaykiemtra_e, #ngaytuchoihs_e, #ngaylenlaihs_e, #ngaydauhs_e, #ngaylenmoihs_e, #ngaycap_cmnd_e, #tgketthuc_duno1_e, #tgketthuc_duno2_e, #duno_tctd_end1, #duno_tctd_end2, #duno_tctd_end3, #duno_tctd_end4, #duno_tctd_end5, #duno_tctd_end6, #duno_tctd_end7, #duno_tctd_end8, #duno_tctd_end9, #duno_tctd_end10, #fromdate, #todate, #filter_ngaylamlai, #ngay_hieu_luc').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
                //$('#time_finish').inputmask('h:i:s', {'placeholder': 'h:i:s'});
                $('.select2').select2();
                $("input[data-bootstrap-switch]").each(function(){
                  $(this).bootstrapSwitch('state', $(this).prop('checked'));
                });
                $('[data-toggle="tooltip"]').tooltip();
                $('#reservationdate, #datecheck, #datereject, #dateup, #datepos, #datefresh, #reservationdate_s, #datecheck_s, #datereject_s, #dateup_s, #datepos_s, #datefresh_s, #reservationdate_e, #datecheck_e, #datereject_e, #dateup_e, #datepos_e, #datefresh_e, #date_cmnd_e, #date_end_1, #date_end_2, #date_end_tctd1, #date_end_tctd2, #date_end_tctd3, #date_end_tctd4, #date_end_tctd5, #date_end_tctd6, #date_end_tctd7, #date_end_tctd8, #date_end_tctd9, #date_end_tctd10, #from_date, #to_date, #filterngaylamlai, #ngay_hieu_luc').datetimepicker({
                    timePicker: false,
                    format: 'DD/MM/YYYY'
                });
            });
            var link_category_product = "<?php _e($def['file_category_product']) ?>";
            var title_manage_category_product = "<?php _e($lang['manage_category_product']) ?>";
            var link_product = "<?php _e($def['file_product']) ?>";
            var title_manage_product = "<?php _e($lang['manage_product']) ?>";
        </script>
        <script src="<?php _e($def['theme']) ?>js/control.js"></script>
    </body>
</html>
