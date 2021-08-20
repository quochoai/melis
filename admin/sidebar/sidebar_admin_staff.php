<!-- Main Sidebar Container -->
<?php
    $array_only_exam = array($def['get_link_exam'], $def['link_create_exam'], $def['link_update_exam'], $def['get_link_each_exam'], $def['link_create_each_exam'], $def['link_update_each_exam']);
    $array_question = array($def['get_link_question'], $def['link_create_question'], $def['link_update_question'], $def['link_import_question']);
    $array_export = array($def['link_report_profile'], $def['link_report_result_exam'], $def['link_report_result_exam_passed'], $def['link_report_result_exam_failed']);
?>
<aside class="main-sidebar sidebar-dark-successs elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light"><?php echo $text_role; ?></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="edit-information">
          <a href="javasctipt:void(0)" class="d-block"><?php echo $profile['fullname']; ?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column <?php echo $def['nav-flat']; ?>" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo $def['link_profile'] ?>" class="nav-link">
              <i class="fas fa-user-tie nav-icon"></i>
              <p><?php echo $lang['manage_profile'] ?></p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo $def['link_profile_exam'].'/'.$profile['id'] ?>" class="nav-link">
              <i class="fas fa-external-link-alt nav-icon"></i>
              <p><?php echo $lang['list_exam'] ?></p>
            </a>
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
          <li class="nav-item">
            <a href="<?php echo $def['link_the_quiz'] ?>" class="nav-link">
              <i class="fas fa-external-link-alt nav-icon"></i>
              <p><?php echo $lang['the_quiz'] ?></p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $def['link_update_profile'].'/'.$profile['id'] ?>" class="nav-link">
              <i class="fas fa-edit nav-icon"></i>
              <p><?php echo $lang['update_information'] ?></p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $def['link_change_password'].'/'.$profile['id'] ?>" class="nav-link">
              <i class="fas fa-key nav-icon"></i>
              <p><?php echo $lang['change_password'] ?></p>
            </a>
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