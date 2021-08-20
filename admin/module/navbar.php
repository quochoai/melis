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
    <form class="form-inline ml-3">
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
            <i class="fas fa-user-cog"></i> <?php echo $profile['hoten'] ?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="<?php echo $def['link_config'] ?>" class="dropdown-item"><i class="fas fa-user-cog"></i> <?php echo $lang['config_website'] ?></a>
        <div class="dropdown-divider"></div>
        <a href="<?php echo $def['link_html'] ?>" class="dropdown-item">
            <i class="fas fa-code"></i> <?php echo $lang['manage_html'] ?>
        </a>
        <div class="dropdown-divider"></div>
        <a href="<?php echo $def['link_change_password'] ?>/<?php echo $id_profile ?>" class="dropdown-item">
            <i class="fas fa-user-cog"></i> <?php echo $lang['change_password'] ?>
        </a>
            
        </div>
    </li>   
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $def['link_get_logout'] ?>" title="<?php echo $lang['logout']; ?>">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->