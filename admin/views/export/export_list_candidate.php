<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
                <?php 
                    if ($role == $def['role_organizer']) 
                        echo $lang['manage_export_candidate'];
                    else {
                        $block = $h->getBlockById($profile['block_id']);
                        $dp = $h->getDepartmentById($profile['department_id']);
                        echo $lang['manage_export_candidate'].' - '.$lang['block_name'].': '.$block['name'].' - '.$lang['department_exam'].': '.$dp['name']; 
                    }
                ?>
            </h3>
          </div>
          <!-- /.card-header -->
          <form action="<?php echo $def['link_process_export_candidate'] ?>" method="post" id="form_jquery" role="form" enctype="multipart/form-data">
              <div class="card-body container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><?php echo $lang['exam'] ?></label>
                            <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" name="exam_id" id="exam_id" style="width: 100%;">
                            <!--<option value=""><?php echo $lang['choose_exam'] ?></option>-->
                            <?php
                                $exams = $h->getExams();
                                if (count($exams) > 0) {
                                    foreach ($exams as $ke => $exam) {
                                        if ($ke == 0) $selected = ' selected';
                                        else $selected = '';
                                        echo '<option value="'.$exam['id'].'"'.$selected.'>'.$exam['name'].'</option>';
                                    }
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <?php 
                        if ($role == $def['role_organizer']) { 
                    ?>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><?php echo $lang['block_name'] ?></label>
                            <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" name="block_id" id="block_id" style="width: 100%;">
                            <option value=""><?php echo $lang['choose_block'] ?></option>
                            <?php
                                $blocks = $h->getBlocks();
                                if (count($blocks) > 0) {
                                    foreach ($blocks as $block) {
                                        echo '<option value="'.$block['id'].'">'.$block['name'].'</option>';
                                    }
                                }
                            ?>
                            </select>                            
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><?php echo $lang['department_exam'] ?></label>
                            <div class="select2-green">
                                <select multiple="multiple" class="form-control select2 select2-success" data-dropdown-css-class="select2-green" name="department_id[]" id="department_id" style="width: 100%;">
                                    <option value=""><?php echo $lang['choose_department'] ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <?php } else { ?>
                    <input type="hidden" name="block_id" id="block_id" value="<?php echo $profile['block_id']; ?>" />
                    <input type="hidden" name="department_id[]" id="department_id" value="<?php echo $profile['department_id'].'-department' ?>" />
                    <?php } ?>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <button type="submit" id="submit_import" name="btnGui" class="btn btn-success"><?php echo $lang['export']; ?> <i class="fas fa-save"></i></button>
                  <button type="reset" class="btn btn-default ml-2"><?php echo $lang['reset'] ?> <i class="fas fa-undo"></i></button>
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