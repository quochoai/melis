<!-- Main Sidebar Container -->
  <?php
    $array_people = array($def['get_link_block'], $def['link_create_block'], $def['link_update_block'], $def['get_link_department'], $def['link_create_department'], $def['link_update_department'], $def['link_title'], $def['link_create_title'], $def['link_update_title'], $def['get_link_profile'], $def['link_create_profile'], $def['link_update_profile'], $def['link_change_password']);
    $array_block = array($def['get_link_block'], $def['link_create_block'], $def['link_update_block']);
    $array_department = array($def['get_link_department'], $def['link_create_department'], $def['link_update_department']);
    $array_title = array($def['link_title'], $def['link_create_title'], $def['link_update_title']);
    $array_profile = array($def['get_link_profile'], $def['link_create_profile'], $def['link_update_profile'], $def['link_change_password']);
    $array_exam = array($def['get_link_exam'], $def['link_create_exam'], $def['link_update_exam'], $def['get_link_each_exam'], $def['link_create_each_exam'], $def['link_update_each_exam'], $def['link_construct_exam'], $def['link_add_construct_exam'], $def['link_update_construct_exam']);
    $array_only_exam = array($def['get_link_exam'], $def['link_create_exam'], $def['link_update_exam'], $def['get_link_each_exam'], $def['link_create_each_exam'], $def['link_update_each_exam']);
    $array_only_construct_exam = array($def['link_construct_exam'], $def['link_add_construct_exam'], $def['link_update_construct_exam']);
    $array_question = array($def['get_link_question'], $def['link_create_question'], $def['link_update_question'], $def['link_import_question']);
    $array_export = array($def['link_report_profile'], $def['link_report_result_exam'], $def['link_report_result_exam_passed'], $def['link_report_result_exam_failed']);
  ?>
  <aside class="main-sidebar sidebar-dark-successs elevation-4">
    <!-- Brand Logo -->
    <a href="javascript:void(0);" class="brand-link">
      <span class="brand-text font-weight-light"><?php echo $text_role; ?></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="">
          <a href="javasctipt:void(0)" class="d-block"><?php echo $profile['fullname']; ?></a><br />
          <a href="<?php echo $def['link_update_profile'].'/'.$profile['id'] ?>" class="nav-link"><i class="fas fa-edit"></i> <?php echo $lang['update_information'] ?></a>
          <a href="<?php echo $def['link_change_password'] ?>/<?php echo $profile['id'] ?>" class="nav-link">
              <i class="fas fa-key"></i> <?php echo $lang['change_password'] ?>
            </a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column <?php echo $def['nav-flat']; ?>" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview<?php if (in_array($pqh[0], $array_exam)) echo ' menu-open'; ?>">
            <a href="#" class="nav-link<?php if (in_array($pqh[0], $array_only_exam)) echo ' active' ?>">
              <i class="nav-icon fas fa-external-link-alt"></i>
              <p><?php echo $lang['manage_exams'] ?> <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?php echo $def['link_exam']; ?>" class="nav-link<?php if (in_array($pqh[0], $array_only_exam)) echo ' active' ?>">
                      <i class="nav-icon fas fa-external-link-alt"></i>
                      <p><?php echo $lang['manage_exams'] ?></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $def['link_construct_exam']; ?>" class="nav-link<?php if (in_array($pqh[0], $array_only_construct_exam)) echo ' active' ?>">
                      <i class="nav-icon fas fa-external-link-alt"></i>
                      <p><?php echo $lang['manage_construct_exam'] ?></p>
                    </a>
                </li>
            </ul>
          </li>
          <li class="nav-item has-treeview<?php if (in_array($pqh[0], $array_people)) echo ' menu-open'; ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p><?php echo $lang['manage_people'] ?> <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $def['link_block']; ?>" class="nav-link<?php if (in_array($pqh[0], $array_block)) echo ' active' ?>">
                  <i class="nav-icon fas fa-copy"></i>
                  <p><?php echo $lang['manage_block'] ?></p>
                </a>
              </li>  
              <li class="nav-item">
                <a href="<?php echo $def['link_department'] ?>" class="nav-link<?php if (in_array($pqh[0], $array_department)) echo ' active' ?>">
                  <i class="fas fa-building nav-icon"></i>
                  <p><?php echo $lang['manage_department'] ?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $def['link_title'] ?>" class="nav-link<?php if (in_array($pqh[0], $array_title)) echo ' active' ?>">
                  <i class="fas fa-building nav-icon"></i>
                  <p><?php echo $lang['manage_title'] ?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $def['link_profile'] ?>" class="nav-link<?php if (in_array($pqh[0], $array_profile)) echo ' active' ?>">
                  <i class="fas fa-user-tie nav-icon"></i>
                  <p><?php echo $lang['manage_profile'] ?></p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview<?php if (in_array($pqh[0], $array_question)) echo ' menu-open'; ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p><?php echo $lang['manage_questions'] ?> <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $def['link_question'] ?>" class="nav-link<?php if ($pqh[0] == $def['get_link_question']) echo ' active' ?>">
                  <i class="nav-icon fas fa-university"></i>
                  <p><?php echo $lang['bank_questions']; ?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $def['link_knowledge'] ?>" class="nav-link<?php if ($pqh[0] == $def['link_knowledge']) echo ' active' ?>">
                  <i class="nav-icon fas fa-university"></i>
                  <p><?php echo $lang['knowledge_question']; ?></p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview<?php if (in_array($pqh[0], $array_export)) echo ' menu-open'; ?>">
            <a href="javascript:void(0);" class="nav-link">
                <i class="nav-icon fas fa-chart-bar"></i>
              <p><?php echo $lang['manage_report'] ?><i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $def['link_report_profile'] ?>" class="nav-link<?php if ($pqh[0] == $def['link_report_profile']) echo ' active' ?>">
                  <i class="fas fa-file-excel nav-icon"></i>
                  <p><?php echo $lang['manage_export_candidate_short'] ?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $def['link_report_result_exam'] ?>" class="nav-link<?php if ($pqh[0] == $def['link_report_result_exam']) echo ' active' ?>">
                  <i class="fas fa-file-excel nav-icon"></i>
                  <p><?php echo $lang['export_result_exam_short'] ?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $def['link_report_result_exam_passed'] ?>" class="nav-link<?php if ($pqh[0] == $def['link_report_result_exam_passed']) echo ' active' ?>">
                  <i class="fas fa-file-excel nav-icon"></i>
                  <p><?php echo $lang['export_result_exam_passed_short'] ?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $def['link_report_result_exam_failed'] ?>" class="nav-link<?php if ($pqh[0] == $def['link_report_result_exam_failed']) echo ' active' ?>">
                  <i class="fas fa-file-excel nav-icon"></i>
                  <p><?php echo $lang['export_result_exam_failed_short'] ?></p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="<?php echo $def['link_logout'] ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p><?php echo $lang['logout']; ?></p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>