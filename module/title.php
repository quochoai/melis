<?php
  include("../require_inc.php");
  if (!isset($_REQUEST['pqh']) || (isset($_REQUEST['pqh']) && $mod1 == '')) {
    $title = $config["tieude_$lng"];
  } else {
    switch ($mod1) {
      case $def['link_fabout']:
        $title = $lang['title_landing_about'];
        break;
      case $def['link_franchise']:
        $title = $lang['title_landing_franchise'];
        break;
    }
  }
  _e($title);