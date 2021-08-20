<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header container-fluid">
            <div class="row">
                <h3 class="col-md-10 card-title">
                    <?php echo $lang['manage_department'] ?>
                </h3>
                <div class="col-md-2"><a class="float-right btn btn-success" href="<?php echo $def['link_create_department'] ?>/"><?php echo $lang['addNew'] ?></a></div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="departments" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th width="7%" align="center"><?php echo $lang['no.'] ?></th>
                <th width="39%" align="center"><?php echo $lang['block_name'] ?></th>
                <th width="39%" align="center"><?php echo $lang['department_name'] ?></th>
                <th width="15%" align="center"><?php echo $lang['actions'] ?></th>
              </tr>
              </thead>
              <tbody>
               <?php
                $departments = $h->getDepartments();
                $msg_department = '';
                if (count($departments) > 0) {
                    foreach ($departments as $kd => $department) {
                        $no = $kd + 1;
                        $block = $h->getBlockById($department['block_id']);
                        $msg_department .= '<tr>';
                        $msg_department .= ' <td align="center">'.$no.'</td>';
                        $msg_department .= ' <td>'.$block['name'].'</td>';
                        $msg_department .= ' <td><a href="'.$def['link_update_department'].'/'.$department['id'].'" title="'.$lang['update'].'">'.$department['name'].'</a></td>';
                        $msg_department .= ' <td align="center"><a class="btn btn-success btn-sm" href="'.$def['link_update_department'].'/'.$department['id'].'" title="'.$lang['update'].'"><i class="fas fa-edit"></i></a> | <a class="btn btn-danger btn-sm delete" data-id="'.$department['id'].'" title="'.$lang['delete'].'"><i class="fas fa-trash-alt"></i></a></a> </td>';
                        $msg_department .= '</tr>';
                    }
                }
                echo $msg_department;
              ?>
              </tbody>
              <tfoot>
              <tr>
                <th width="7%" align="center"><?php echo $lang['no.'] ?></th>
                <th width="39%" align="center"><?php echo $lang['block_name'] ?></th>
                <th width="39%" align="center"><?php echo $lang['department_name'] ?></th>
                <th width="15%" align="center"><?php echo $lang['actions'] ?></th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->