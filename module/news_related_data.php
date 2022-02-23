<?php
  include("../require_inc.php");
  $page = $_REQUEST['page'];
  $cur_page = $page;
  $page -= 1;
  $previous_btn = true;
  $next_btn = true;
  $first_btn = true;
  $last_btn = true;
  $perPage = $def['perpage_news'];
  $start = $page * $perPage;
  $mod1 = $_REQUEST['mod1'];
  $tableNews = "news";
  $wh = $_REQUEST['wh'];
  $allNews = $h->getAll("id, name_vi, name_en, post_date", $tableNews, $wh, "sort desc, id desc", "limit $start, $perPage");
  $msg = "";
  foreach ($allNews as $k => $news) {
    $name = $news["name_$lng"];
    $linkNews = $lng.'/'.$mod1.'/'.chuoilink($news['name_vi']).'.html';
    $pD = strtotime($news['post_date']);
    if ($lng == $def['lang_en'])
      $postDate = date("l, m/d/Y H:i", $pD).' (GMT+7)';
    else {
      $weekDay = getDayWeekVietnam($pD);
      $postDate = $weekDay.date("d/m/Y H:i", $pD).' (GMT+7)';
    }
    $msg .=  '<div class="eachnewsrelate"><a href="'.$linkNews.'" title="'.$name.'"><i class="fas fa-caret-right"></i> '.$name.'</a> <i><small>('.$postDate.')</small></i></div>';

  }
  // Content for Data
  /** <div class="eachnewsrelate"><a href="#" title=""><i class="fas fa-caret-right"></i> Nhận quà làm đẹp miễn phí tháng 3 tại Melis Spa</a></div> */
  
  $batdau = $start + 1;
  
  $count = $h->checkExist($tableNews, $wh);
  $no_of_paginations = ceil($count / $perPage);
  if($count >= ($perPage+1)) {
  /* ---------------Calculating the starting and endign values for the loop----------------------------------- */
  if ($cur_page >= 7) {
      $start_loop = $cur_page - 3;
      if ($no_of_paginations > $cur_page + 3)
          $end_loop = $cur_page + 3;
      else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
          $start_loop = $no_of_paginations - 6;
          $end_loop = $no_of_paginations;
      } else {
          $end_loop = $no_of_paginations;
      }
  } else {
      $start_loop = 1;
      if ($no_of_paginations > 7)
          $end_loop = 7;
      else
          $end_loop = $no_of_paginations;
  }
  /* ----------------------------------------------------------------------------------------------------------- */
  $msg .= '<div class="img_detail"><nav aria-label="Page navigation example mt-4"><ul class="pagination justify-content-center">';
  if($cur_page == 1)
    $msg .= '<li class="page-item disabled"><a class="page-link" tabindex="-1"><i class="fa fa-chevrons-left"></i></a></a></li>';
  else
    $msg .= '<li class="page-item"><a class="page-link page_link_relate" rel="1"><i class="fa fa-chevrons-left"></i></a></a></li>';
  // FOR ENABLING THE PREVIOUS BUTTON
  if ($previous_btn && $cur_page > 1) {
      $pre = $cur_page - 1;
      $msg .= '<li class="page-item"><a class="page-link page_link_relate" rel="'.$pre.'"><i class="fa fa-chevron-left"></i></a></li>';
  } else if ($previous_btn) {
      $msg .= '<li class="page-item disabled"><a class="page-link" tabindex="-1"><i class="fa fa-chevron-left"></i></a></a></li>';
  }
  for ($i = $start_loop; $i <= $end_loop; $i++) {
      if ($cur_page == $i)
          $msg .= '<li class="page-item active"><a class="page-link">'.$i.'</a></li>';
      else
          $msg .= '<li class="page-item"><a class="page-link page_link_relate" rel="'.$i.'">'.$i.'</a></li>';
  }
  // TO ENABLE THE NEXT BUTTON
  if ($next_btn && $cur_page < $no_of_paginations) {
      $nex = $cur_page + 1;
      $msg .= '<li class="page-item"><a class="page-link page_link_relate" rel="'.$nex.'"><i class="fa fa-chevron-right"></i></a></li>';
  } else if ($next_btn) {
      $msg .= '<li class="page-item disabled"><a class="page-link" tabindex="-1"><i class="fa fa-chevron-right"></i></a></a></li>';
  }    
  // last button
  if($cur_page == $no_of_paginations)
    $msg .= '<li class="page-item disabled"><a class="page-link" tabindex="-1"><i class="fa fa-chevrons-right"></i></a></a></li>';
  else
    $msg .= '<li class="page-item"><a class="page-link page_link_relate" rel="'.$no_of_paginations.'"><i class="fa fa-chevrons-right"></i></a></a></li>';
  $msg .= "</ul></nav></div>";  // Content for pagination
  }
  _e($msg);
