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
      case $def['link_fnews']:
        if ($mod2 == '' || !isset($mod2))
          $title = $lang['n_news'];
        else {
          $news = $h->getAll("name_vi, name_en, title_vi, title_en", $tableNews, "news_id = ".$def['news_id_news']." and deleted_at is null");
          foreach ($news as $n) {
            $linkCompare = chuoilink($n['name_vi']).'.html';
            if ($linkCompare == $mod2) {
              if ($n["title_$lng"] != '')
                $title = $n["title_$lng"];
              else
                $title = $n["name_$lng"];
              break;
            }
          }
        }
        break;
      case $def['link_fknowledge']:
        if ($mod2 == '' || !isset($mod2))
          $title = $lang['n_knowledge'];
        else {
          $news = $h->getAll("name_vi, name_en, title_vi, title_en", $tableNews, "news_id = ".$def['news_id_knowledge']." and deleted_at is null");
          foreach ($news as $n) {
            $linkCompare = chuoilink($n['name_vi']).'.html';
            if ($linkCompare == $mod2) {
              if ($n["title_$lng"] != '')
                $title = $n["title_$lng"];
              else
                $title = $n["name_$lng"];
              break;
            }
          }
        }
        break;
      case $def['link_fpromotion']:
        if ($mod2 == '' || !isset($mod2))
          $title = $lang['n_promotion'];
        else {
          $news = $h->getAll("name_vi, name_en, title_vi, title_en", $tableNews, "news_id = ".$def['news_id_promotion']." and deleted_at is null");
          foreach ($news as $n) {
            $linkCompare = chuoilink($n['name_vi']).'.html';
            if ($linkCompare == $mod2) {
              if ($n["title_$lng"] != '')
                $title = $n["title_$lng"];
              else
                $title = $n["name_$lng"];
              break;
            }
          }
        }
        break;
    }
  }
  _e($title);