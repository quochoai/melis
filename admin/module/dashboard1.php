<!-- Main content -->
<?php
    $number_profiles = $h->number_profile_active();
    $number_candidates = $h->number_candidates();
    $number_questions = $h->number_questions();
    $number_blocks = $h->number_blocks();
    $number_departments = $h->number_departments();
    $number_titles = $h->number_titles();
    $number_exams = $h->number_exams();
?>
<?php 
    if ($role == $def['role_organizer']) {
  ?>
<section class="content">
  <div class="container-fluid">
  
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?php echo $number_profiles; ?></h3>
            <p><?php echo $lang['text_role_candidate']; ?></p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="<?php echo $def['link_profile']; ?>" class="small-box-footer"><?php echo $lang['more_info'] ?> <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?php echo $number_candidates; ?></h3>
            <p><?php echo $lang['candidate']; ?></p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="<?php echo $def['link_profile']; ?>" class="small-box-footer"><?php echo $lang['more_info'] ?> <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?php echo $number_blocks; ?></h3>
            <p><?php echo $lang['block'] ?></p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="<?php echo $def['link_block'] ?>" class="small-box-footer"><?php echo $lang['more_info'] ?> <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?php echo $number_departments ?></h3>
            <p><?php echo $lang['department'] ?></p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="<?php echo $def['link_department'] ?>" class="small-box-footer"><?php echo $lang['more_info'] ?> <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?php echo $number_titles; ?></h3>
            <p><?php echo $lang['title'] ?></p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="<?php echo $def['link_profile'] ?>" class="small-box-footer"><?php echo $lang['more_info'] ?> <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php echo $number_questions ?></h3>
            <p><?php echo $lang['questions'] ?></p>
          </div>
          <div class="icon">
            <i class="ion ion-chatbox"></i>
          </div>
          <a href="<?php echo $def['link_question'] ?>" class="small-box-footer"><?php echo $lang['more_info'] ?> <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php echo $number_exams ?></h3>
            <p><?php echo $lang['exam'] ?></p>
          </div>
          <div class="icon">
            <i class="ion ion-chatbox"></i>
          </div>
          <a href="<?php echo $def['link_exam'] ?>" class="small-box-footer"><?php echo $lang['more_info'] ?> <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- Main content -->
<?php
    } else { 
        $block = $h->getBlockById($profile['block_id']);
        $dp = $h->getDepartmentById($profile['department_id']);
        $title = $h->getTitleById($profile['title_id']);
?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header container-fluid">
            <h3 class="card-title">
                <?php echo $lang['information_profile'] ?>
            </h3>
          </div>
          <!-- /.card-header -->
          <form action="<?php echo $def['link_process_update_profile'] ?>" method="post" id="form_jquery" role="form">
              <div class="card-body container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['block'] ?></label>
                            <input disabled="" class="form-control" value="<?php echo $block['name'] ?>" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['department'] ?></label>
                            <input disabled="" class="form-control" value="<?php echo $profile['department_id'].'-'.$dp['name'] ?>" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['title'] ?></label>
                            <input disabled="" class="form-control" value="<?php echo $profile['title_id'].'-'.$title['name'] ?>" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['profile_code'] ?></label>
                            <input type="text" class="form-control" value="<?php echo $profile['profile_code'] ?>" disabled="" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label class="col-form-label" for="name"><?php echo $lang['profile_fullname'] ?></label>
                        <input type="text" class="form-control" value="<?php echo $profile['fullname'] ?>" disabled="" />
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['profile_birthday'] ?></label>
                            <input type="text" class="form-control" value="<?php echo $profile['birthday'] ?>" disabled="" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['email'] ?></label>
                            <input type="text" class="form-control" value="<?php echo $profile['email'] ?>" disabled="" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label class="col-form-label" for="name"><?php echo $lang['phone'] ?></label>
                        <input type="text" class="form-control" value="<?php echo $profile['phone'] ?>" disabled="" />
                      </div>
                    </div>
                    <?php
                            $array_role = array($def['role_organizer'] => $lang['text_role_organizer'], $def['role_admin_staff'] => $lang['text_role_admin_staff'], $def['role_candidate'] => $lang['text_role_candidate']);
                    ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['profile_role'] ?></label>
                            <select class="form-control" name="role" id="role" disabled="">
                            <?php
                                foreach ($array_role as $krole => $vrole) {
                                    if ($krole == $role) {
                                      echo '<option value="'.$krole.'" selected>'.$vrole.'</option>';
                                      break;
                                    }
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="mt-4 custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="active" value="active1" name="active"<?php if ($profile['active'] == $def['actived']) echo ' checked' ?> disabled="" />
                                <label for="active" class="custom-control-label"><?php echo $lang['profile_active'] ?></label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="active_exam" value="<?php echo $profile['active_exam'] ?>" name="active_exam"<?php if ($profile['active_exam'] == $def['actived']) echo ' checked' ?> disabled="" />
                                <label for="active_exam" class="custom-control-label"><?php echo $lang['profile_active_exam'] ?></label>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              </div>
          </form>
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
<?php } ?>