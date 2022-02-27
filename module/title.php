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
      case $def['link_freview']:
        if ($mod2 == '' || !isset($mod2))
          $title = $lang['customer_review'];
        else {
          $allReviews = $h->getAll("customer_vi, customer_en, title_vi, title_en", $tableReview, "rv_id = ".$def['rv_id_customer']." and deleted_at is null");
          foreach ($allReviews as $r) {
            $linkCompare = chuoilink($r['customer_vi']).'.html';
            if ($linkCompare == $mod2) {
              if ($r["title_$lng"] != '')
                $title = $r["title_$lng"];
              else
                $title = $r["customer_$lng"];
              break;
            }
          }
        }
        break;
      case $def['link_celes_feel']:
        if ($mod2 == '' || !isset($mod2))
          $title = $lang['celebrity_feel'];
        else {
          $allReviews = $h->getAll("customer_vi, customer_en, title_vi, title_en", $tableReview, "rv_id = ".$def['rv_id_star']." and deleted_at is null");
          foreach ($allReviews as $r) {
            $linkCompare = chuoilink($r['customer_vi']).'.html';
            if ($linkCompare == $mod2) {
              if ($r["title_$lng"] != '')
                $title = $r["title_$lng"];
              else
                $title = $r["customer_$lng"];
              break;
            }
          }
        }
        break;
      case $def['link_fservice']:
        if (!isset($mod2) || $mod2 == '') {
          $service = $h->getOne("name_vi, name_en, title_vi, title_en", $tableService, "deleted_at is null", "service_id asc, sort desc, id desc");
          if ($service["title_$lng"] != '')
            $title = $service["title_$lng"];
          else
            $title = $service["name_$lng"];
        } else {
          $allCates = $h->getAll("id, name_vi", $tableCate, "deleted_at is null and cate_id = ".$def['cate_id_service'], "sort asc, id desc");
          $service_id = $checkService = 0;
          foreach ($allCates as $cate) {
            $linkCompareCate = chuoilink($cate['name_vi']);
            if ($linkCompareCate == $mod2) {
              $service_id = $cate['id'];
              break;
            }
          }
          $whServiceTitle = "deleted_at is null and service_id = $service_id";
          $checkSer = $h->checkExist($tableService, $whServiceTitle);
          if ($checkSer) {
            $allServices = $h->getAll("name_vi, name_en, title_vi, title_en", $tableService, $whServiceTitle, "sort desc, id desc");
            foreach ($allServices as $service) {
              $linkCS = chuoilink($service['name_vi']).'.html';
              if ($linkCS == $mod3) {
                $checkService = 1;
                if ($service["title_$lng"] != '')
                  $titleS = $service["title_$lng"];
                else
                  $titleS = $service["name_$lng"];
                break;
              }
            }
          }
          if ($service_id != 0 && $checkService != 0)
            $title = $titleS;
          else
            $title = $lang['not_data_on_this_page'];
        }
        break;
      case $def['link_queennature']:
        if (!isset($mod2) || $mod2 == '') {
          $productG = $h->getOne("name_vi, name_en, title_vi, title_en", $tableProduct, "deleted_at is null", "product_id asc, sort desc, id desc");
          if ($productG["title_$lng"] != '')
            $title = $productG["title_$lng"];
          else
            $title = $productG["name_$lng"];
        } else {
          $allCateProducts = $h->getAll("id, name_vi", $tableCate, "deleted_at is null and cate_id = ".$def['cate_id_product'], "sort asc, id desc");
          $productIdGetT = $checkProductG = 0;
          foreach ($allCateProducts as $catePT) {
            $linkCompareCatePT = chuoilink($catePT['name_vi']);
            if ($linkCompareCatePT == $mod2) {
              $productIdGetT = $catePT['id'];
              break;
            }
          }
          $whProductTitle = "deleted_at is null and product_id = $productIdGetT";
          $checkPro = $h->checkExist($tableProduct, $whProductTitle);
          if ($checkPro) {
            $allProductsG = $h->getAll("name_vi, name_en, title_vi, title_en", $tableProduct, $whProductTitle, "sort desc, id desc");
            foreach ($allProductsG as $productG) {
              $linkCP = chuoilink($productG['name_vi']).'.html';
              if ($linkCP == $mod3) {
                $checkProductG = 1;
                if ($productG["title_$lng"] != '')
                  $titleP = $productG["title_$lng"];
                else
                  $titleP = $productG["name_$lng"];
                break;
              }
            }
          }
          if ($productIdGetT != 0 && $checkProductG != 0)
            $title = $titleP;
          else
            $title = $lang['not_data_on_this_page'];
        }
        break;
      case $def['link_search']:
        $title = $lang['search_result'];
        break;
    }
  }
  _e($title);