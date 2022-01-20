<?php
  if (!isset($_REQUEST['pqh']) || (isset($_REQUEST['pqh']) && $mod1 == ''))
    include("module/home.php");
  else {
    switch ($mod1) {
      case $def['link_fabout']:
        include("module/landing_about.php");
        break;
      case $def['link_franchise']:
        include("module/landing_franchise.php");
        break;
    }
  }
