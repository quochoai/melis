<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header container-fluid">
            <div class="row">
                <h3 class="col-md-10 card-title">
                    <?php echo $lang['manage_profile'] ?>
                </h3>
                <div class="col-md-2"><a class="float-right btn btn-success" href="<?php echo $def['link_create_profile'] ?>/"><?php echo $lang['addNew'] ?></a></div>
                <div class="col-md-12">
                    <a class="btn btn-success" href="<?php echo $def['link_import_profile'] ?>"><?php echo $lang['import_profile'] ?></a>    
                <div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="profiles" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th width="7%" align="center"><?php echo $lang['no.'] ?></th>
                <th width="17%" align="center"><?php echo $lang['profile_fullname'] ?></th>
                <th width="10%" align="center"><?php echo $lang['profile_birthday'] ?></th>
                <th width="13%" align="center"><?php echo $lang['title'] ?></th>
                <th width="15%" align="center"><?php echo $lang['department_exam'] ?></th>
                <th width="13%" align="center"><?php echo $lang['email'] ?></th>
                <th width="15%" align="center"><?php echo $lang['phone'] ?></th>
                <th width="10%" align="center"><?php echo $lang['actions'] ?></th>
              </tr>
              </thead>
              <tbody>
               <?php
                if ($role == $def['role_organizer'])
                  $profiles = $h->getProfiles();
                else
                  $profiles = $h->getProfilesRole($profile['id']);
                $msg_profile = '';
                if (count($profiles) > 0) {
                    foreach ($profiles as $kp => $profile_list) {
                        $no = $kp + 1;
                        $department = $h->getDepartmentById($profile_list['department_id']);
                        $title = $h->getTitleById($profile_list['title_id']);

                        $msg_profile .= '<tr>';
                        $msg_profile .= ' <td align="center">'.$no.'</td>';
                        /*$msg_profile .= ' <td>'.$block['name'].'</td>';
                        $msg_profile .= ' <td>'.$department['name'].'</td>';
                        $msg_profile .= ' <td>'.$title['name'].'</td>';*/
                        $msg_profile .= ' <td><a href="'.$def['link_profile_exam'].'/'.$profile_list['id'].'">'.$profile_list['fullname'].'</a></td>';
                        $msg_profile .= ' <td>'.$profile_list['birthday'].'</td>';
                        $msg_profile .= ' <td>'.$title['name'].'</td>';
                        $msg_profile .= ' <td>'.$department['name'].'</td>';
                        $msg_profile .= ' <td align="center">'.$profile_list['email'].'</td>';
                        $msg_profile .= ' <td align="center">'.$profile_list['phone'].'</td>';
                        $msg_profile .= ' <td align="center"><a class="btn btn-success btn-sm" href="'.$def['link_update_profile'].'/'.$profile_list['id'].'" title="'.$lang['update'].'"><i class="fas fa-edit"></i></a> | <a class="btn btn-danger btn-sm delete" data-id="'.$profile_list['id'].'" title="'.$lang['delete'].'"><i class="fas fa-trash-alt"></i></a></a> </td>';
                        $msg_profile .= '</tr>';
                    }
                }
                echo $msg_profile;
              ?>
              </tbody>
              <tfoot>
              <tr>
                <th width="7%" align="center"><?php echo $lang['no.'] ?></th>
                <th width="17%" align="center"><?php echo $lang['profile_fullname'] ?></th>
                <th width="10%" align="center"><?php echo $lang['profile_birthday'] ?></th>
                <th width="13%" align="center"><?php echo $lang['title'] ?></th>
                <th width="15%" align="center"><?php echo $lang['department_exam'] ?></th>
                <th width="13%" align="center"><?php echo $lang['email'] ?></th>
                <th width="15%" align="center"><?php echo $lang['phone'] ?></th>
                <th width="10%" align="center"><?php echo $lang['actions'] ?></th>
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