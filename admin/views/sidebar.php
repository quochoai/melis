<!-- Main Sidebar Container -->
  <?php
    if ($profile['nhomqt'] == 1)
        $text_role = "Admin";
        //$array_gallery = array($def['link_partner'], $def['link_gallery']);
  ?>
  <aside class="main-sidebar sidebar-dark-successs elevation-4">
    <!-- Brand Logo -->
    <a href="javascript:void(0);" class="brand-link">
      <span class="brand-text font-weight-light"><i class="fas fa-user-shield"></i> <?php echo $text_role; ?></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column <?php echo $def['nav-flat']; ?>" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="<?php echo $def['link_category_product'] ?>" class="nav-link<?php if ($pqh[0] == $def['link_category_product'] || $pqh[0] == $def['link_product']) echo ' active' ?>">
              <i class="nav-icon fas fa-cubes"></i>
              <p><?php echo $lang['category_product']; ?></p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo $def['link_category_service'] ?>" class="nav-link<?php if ($pqh[0] == $def['link_category_service'] || $pqh[0] == $def['link_service']) echo ' active' ?>">
              <i class="nav-icon fas fa-cubes"></i>
              <p><?php echo $lang['category_service']; ?></p>
            </a>
          </li>
          <li class="nav-item has-treeview<?php if ($pqh[0] == $def['link_gallery']) echo ' menu-open'; ?>">
            <a href="javascript:void(0);" class="nav-link">
                <i class="nav-icon fas fa-photo-video"></i>
              <p><?php echo $lang['manage_gallery'] ?><i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $def['link_gallery'].'/'.$def['gimage'] ?>" class="nav-link<?php if ($pqh[1] == $def['gimage']) echo ' active' ?>">
                  <i class="fas fa-images nav-icon"></i>
                  <p><?php echo $lang['gimage'] ?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $def['link_gallery'].'/'.$def['gvideo'] ?>" class="nav-link<?php if ($pqh[1] == $def['gvideo']) echo ' active' ?>">
                  <i class="fas fa-video nav-icon"></i>
                  <p><?php echo $lang['gvideo'] ?></p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview<?php if ($pqh[0] == $def['link_slider']) echo ' menu-open'; ?>">
            <a href="javascript:void(0);" class="nav-link">
                <i class="nav-icon fas fa-sliders-h"></i>
              <p><?php echo $lang['manage_slider'] ?><i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $def['link_slider'].'/'.$def['shome'] ?>" class="nav-link<?php if ($pqh[1] == $def['shome']) echo ' active' ?>">
                  <i class="fas fa-home nav-icon"></i>
                  <p><?php echo $lang['shome'] ?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $def['link_slider'].'/'.$def['slpabout'] ?>" class="nav-link<?php if ($pqh[1] == $def['slpabout']) echo ' active' ?>">
                  <i class="fas fa-address-card nav-icon"></i>
                  <p><?php echo $lang['slpabout'] ?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $def['link_slider'].'/'.$def['slpnhuongquyen'] ?>" class="nav-link<?php if ($pqh[1] == $def['slpnhuongquyen']) echo ' active' ?>">
                  <i class="fas fa-code-branch nav-icon"></i>
                  <p><?php echo $lang['slpnhuongquyen'] ?></p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview<?php if ($pqh[0] == $def['link_review']) echo ' menu-open'; ?>">
            <a href="javascript:void(0);" class="nav-link">
                <i class="nav-icon fas fa-comment"></i>
              <p><?php echo $lang['manage_review'] ?><i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $def['link_review'].'/'.$def['rcustomer'] ?>" class="nav-link<?php if ($pqh[1] == $def['rcustomer']) echo ' active' ?>">
                  <i class="fas fa-user-friends nav-icon"></i>
                  <p><?php echo $lang['customer_review'] ?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $def['link_review'].'/'.$def['rstar'] ?>" class="nav-link<?php if ($pqh[1] == $def['rstar']) echo ' active' ?>">
                  <i class="fas fa-star nav-icon"></i>
                  <p><?php echo $lang['star_review'] ?></p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview<?php if ($pqh[0] == $def['link_news']) echo ' menu-open'; ?>">
            <a href="javascript:void(0);" class="nav-link">
                <i class="nav-icon fas fa-newspaper"></i>
              <p><?php echo $lang['manage_news'] ?><i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $def['link_news'].'/'.$def['n_news'] ?>" class="nav-link<?php if ($pqh[1] == $def['n_news']) echo ' active' ?>">
                  <i class="fas fa-rss nav-icon"></i>
                  <p><?php echo $lang['n_news'] ?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $def['link_news'].'/'.$def['n_knowledge'] ?>" class="nav-link<?php if ($pqh[1] == $def['n_knowledge']) echo ' active' ?>">
                  <i class="fas fa-snowflake nav-icon"></i>
                  <p><?php echo $lang['n_knowledge'] ?></p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview<?php if ($pqh[0] == $def['link_landing']) echo ' menu-open'; ?>">
            <a href="javascript:void(0);" class="nav-link">
                <i class="nav-icon fas fa-adjust"></i>
              <p><?php echo $lang['manage_landing'] ?><i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $def['link_landing'].'/'.$def['landing_about'] ?>" class="nav-link<?php if ($pqh[1] == $def['landing_about']) echo ' active' ?>">
                  <i class="fas fa-eject nav-icon"></i>
                  <p><?php echo $lang['landing_about'] ?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $def['link_landing'].'/'.$def['landing_nhuong_quyen'] ?>" class="nav-link<?php if ($pqh[1] == $def['landing_nhuong_quyen']) echo ' active' ?>">
                  <i class="fas fa-peace nav-icon"></i>
                  <p><?php echo $lang['landing_nhuongquyen'] ?></p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo $def['link_partner'] ?>" class="nav-link<?php if ($pqh[1] == $def['link_partner']) echo ' active' ?>">
              <i class="nav-icon fas fa-handshake"></i>
              <p><?php echo $lang['manage_partner']; ?></p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo $def['link_information'] ?>" class="nav-link<?php if ($pqh[1] == $def['link_information']) echo ' active' ?>">
              <i class="nav-icon fas fa-info"></i>
              <p><?php echo $lang['manage_information']; ?></p>
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