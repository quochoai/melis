<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-success navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- SEARCH FORM -->
    <!--
    <form class="form-inline ml-3" method="post" action="<?php _e($def['theme']) ?>">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    -->
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" title="Click here">
            <i class="fas fa-user-cog"></i> <?php _e($profile['hoten']) ?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a class="dropdown-item config_website"><i class="fas fa-user-cog"></i> <?php _e($lang['config_website']) ?></a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item manage_html">
            <i class="fas fa-code"></i> <?php _e($lang['manage_html']) ?>
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item change_password" rel="<?php _e($id_profile) ?>">
            <i class="fas fa-user-cog"></i> <?php _e($lang['change_password']) ?>
        </a>
            
        </div>
    </li>   
      <li class="nav-item">
        <a class="nav-link logout" title="<?php _e($lang['logout']) ?>">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->