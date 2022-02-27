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
      case $def['link_fnews']:
      case $def['link_fknowledge']:
      case $def['link_fpromotion']:
        if ($mod2 == '' || !isset($mod2))
          include("module/news.php");
        else
          include("module/news_detail.php");
        break;
      case $def['link_freview']:
      case $def['link_celes_feel']:
        if ($mod2 == '' || !isset($mod2))
          include("module/review.php");
        else
          include("module/review_detail.php");
        break;
      case $def['link_fservice']:
        include("module/service_detail.php");
        break;
      case $def['link_queennature']:
        include("module/product_detail.php");
        break;
      case $def['link_search']:
        include("module/search.php");
        break;
    }
  }
