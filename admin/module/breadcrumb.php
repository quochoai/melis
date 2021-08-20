    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <?php 
                if (!isset($_REQUEST['pqh']) || $_REQUEST['pqh'] == null) { 
            ?>
            <h1 class="m-0 text-dark">Dashboard</h1>
            <?php 
                } 
            ?>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <?php 
                if (isset($_REQUEST['pqh']) && $_REQUEST['pqh'] != null) { 
                    if ($pqh[0] == $def['get_link_block'])
                      $title_breadcrumb = $lang['manage_block'];
                    if ($pqh[0] == $def['get_link_department'])
                      $title_breadcrumb = $lang['manage_department'];
                    if ($pqh[0] == $def['link_title'])
                      $title_breadcrumb = $lang['manage_title'];
                    echo '<li class="breadcrumb-item active">'.$title_breadcrumb.'</li>';
                }
            ?>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->