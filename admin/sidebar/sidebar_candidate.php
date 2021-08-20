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
          <li class="nav-item">
            <a href="<?php echo $def['link_profile_exam'].'/'.$profile['id'] ?>" class="nav-link">
              <i class="fas fa-external-link-alt nav-icon"></i>
              <p><?php echo $lang['list_exam'] ?></p>
            </a>
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