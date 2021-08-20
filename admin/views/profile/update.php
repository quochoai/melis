<!-- Main content -->
<?php
  $pid = $h->getProfileById($pqh[1]);
?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header container-fluid">
              <div class="row">
                <h3 class="card-title col-md-10">
                    <?php echo $lang['update_information'] ?>
                </h3>
                <div class="col-md-2"><a class="float-right" href="<?php echo $def['link_profile'] ?>" title="<?php echo $lang['back'] ?>"><i class="fas fa-undo-alt"></i></a></div>
              </div>
          </div>
          <!-- /.card-header -->
          <form action="<?php echo $def['link_process_update_profile'] ?>" method="post" id="form_jquery" role="form">
              <input type="hidden" name="id" value="<?php echo $pqh[1]; ?>" />
              <div class="card-body container-fluid">
                <div class="row">
                    <?php
                        if ($role == $def['role_organizer']) {
                    ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['block'] ?></label>
                            <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" style="width: 100%;" name="block_id" id="block_id">
                            <?php
                                $blocks = $h->getBlocks();
                                if (count($blocks) > 0) {
                                    foreach ($blocks as $block) {
                                        if ($block['id'] == $pid['block_id']) 
                                          $selected = ' selected';
                                        else
                                          $selected = '';
                                        echo '<option value="'.$block['id'].'"'.$selected.'>'.$block['name'].'</option>';
                                    }
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['department'] ?></label>
                            <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" style="width: 100%;" name="department_id" id="department_id">
                            <?php
                                $departments = $h->getDistinctDepartments();
                                if (count($departments) > 0) {
                                    foreach ($departments as $department) {
                                        if($department['id'] == $pid['department_id'])
                                          $selected = ' selected';
                                        else
                                          $selected = '';
                                        echo '<option value="'.$department['id'].'"'.$selected.'>'.$department['name'].'</option>';
                                    }
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <?php
                        } else {
                    ?>
                    <input type="hidden" name="block_id" id="block_id" value="<?php echo $pid['block_id'] ?>" />
                    <input type="hidden" name="department_id" id="department_id" value="<?php echo $pid['department_id'] ?>" />
                    <?php
                        }
                    ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['title'] ?></label>
                            <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" style="width: 100%;" name="title_id" id="title_id">
                            <?php
                                $titles = $h->getTitles();
                                if (count($titles) > 0) {
                                    foreach ($titles as $title) {
                                      if ($title['id'] == $pid['title_id'])
                                        $selected = ' selected';
                                      else
                                        $selected = '';
                                        echo '<option value="'.$title['id'].'"'.$selected.'>'.$title['name'].'</option>';
                                    }
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['profile_code'] ?></label>
                            <input type="text" class="form-control" name="profile_code" id="profile_code" placeholder="<?php echo $lang['placeholder_profile_code'] ?>" value="<?php echo $pid['profile_code'] ?>" />
                            <small id="nameHelpCode" class="form-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label class="col-form-label" for="name"><?php echo $lang['profile_fullname'] ?></label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo $lang['placeholder_profile_fullname'] ?>" value="<?php echo $pid['fullname'] ?>" />
                        <small id="nameHelpBlock" class="form-text text-danger"></small>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['profile_birthday'] ?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" name="birthday" id="birthday" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="<?php echo $pid['birthday'] ?>" />
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['email'] ?></label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="<?php echo $lang['placeholder_email'] ?>" value="<?php echo $pid['email'] ?>" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label class="col-form-label" for="name"><?php echo $lang['phone'] ?></label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="<?php echo $lang['placeholder_phone'] ?>" value="<?php echo $pid['phone'] ?>" />
                      </div>
                    </div>
                    <?php
                        if ($role == $def['role_organizer']) {
                            $array_role = array($def['role_organizer'] => $lang['text_role_organizer'], $def['role_admin_staff'] => $lang['text_role_admin_staff'], $def['role_candidate'] => $lang['text_role_candidate']);
                    ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['profile_role'] ?></label>
                            <select class="form-control" name="role" id="role">
                            <?php
                                foreach ($array_role as $krole => $vrole) {
                                    if ($krole == $pid['role']) 
                                      $selected = ' selected';
                                    else
                                      $selected = '';
                                    echo '<option value="'.$krole.'"'.$selected.'>'.$vrole.'</option>';
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <?php 
                        } elseif ($role == $def['role_admin_staff']) {
                          $array_role = array($def['role_admin_staff'] => $lang['text_role_admin_staff'], $def['role_candidate'] => $lang['text_role_candidate']);
                    ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['profile_role'] ?></label>
                            <select class="form-control" name="role" id="role">
                            <?php
                                foreach ($array_role as $krole => $vrole) {
                                    if ($krole == $pid['role']) 
                                      $selected = ' selected';
                                    else
                                      $selected = '';
                                    echo '<option value="'.$krole.'"'.$selected.'>'.$vrole.'</option>';
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <?php } else { ?>
                    <input type="hidden" name="role" value="<?php echo $def['sidebar_candidate']; ?>" />
                    <?php 
                        }
                        if ($role == $def['role_organizer']) {                         
                    ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="mt-4 custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="active" value="<?php echo $pid['active'] ?>" name="active"<?php if ($pid['active'] == $def['actived']) echo ' checked' ?> />
                                <label for="active" class="custom-control-label"><?php echo $lang['profile_active'] ?></label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="active_exam" value="<?php echo $pid['active_exam'] ?>" name="active_exam"<?php if ($pid['active_exam'] == $def['actived']) echo ' checked' ?>>
                                <label for="active_exam" class="custom-control-label"><?php echo $lang['profile_active_exam'] ?></label>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <button type="submit" id="update" class="btn btn-success"><?php echo $lang['save']; ?> <i class="fas fa-save"></i></button>
                  <button type="button" id="cancel" class="btn btn-default ml-2"><?php echo $lang['cancel'] ?> <i class="fas fa-undo"></i></button>
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