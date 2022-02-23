<?php
  include("require_inc.php");
  if(isset($_REQUEST['pqh'])) {
    $pqh = $_REQUEST['pqh'];
    $pqh = explode("/",$pqh);
      $mod = $pqh[0];
      $mod1 = $pqh[1];
      $mod2 = $pqh[2];
      $mod3 = $pqh[3];
      $typesite = 'article';
      $url = URL.$_REQUEST['pqh'];
  } else {
    $typesite = 'website';
    $url = URL;   
  }
  $tableConfig = "configs";
  $tableHtml = "htmls";
  $tableCate = "categories";
  $tableProduct = "products";
  $tableService = "services";
  $tableNews = "news";
  $tableReview = "reviews";
  $config = $h->getById("*", $tableConfig, 1);
  $opentime = $h->getById("noidung_vi", $tableHtml, 3);
  $hotline = $h->getById("noidung_vi", $tableHtml, 2);
  $fav = $h->getById("noidung_vi", $tableHtml, 8);

  $array_not = array($def['link_fabout'], $def['link_franchise']);
  if (!isset($_REQUEST['pqh']) || !in_array($mod1, $array_not))
    $classFixed = ' fixed_navbar';
  else
    $classFixed = '';
?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <base href="<?php _e(URL) ?>" />
  <meta charset="UTF-8">
  <link rel="icon" href="<?php _e(_upload.$fav['noidung_vi']) ?>" type="image/x-icon" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name='revisit-after' content='1 days' />
		<link rel="canonical" href="<?php _e($url) ?>" />
  <title><?php include("module/title.php") ?></title>
  <meta name="description" content="<?php include("module/desc.php") ?>" />
	<meta name="keywords" content="<?php include("module/keyw.php") ?>" />
  <!-- for facebook -->
  <meta property="og:type" content="<?php _e($typesite) ?>" />
  <meta property="og:title" content="<?php include("module/title.php") ?>" />
  <meta property="og:image" content="<?php include("module/image.php") ?>" />	
  <meta property="og:description" content="<?php include("module/desc.php") ?>" />
  <meta property="og:url" content="<?php _e($url) ?>" />
  <meta property="og:site_name" content="<?php _e($config["tieude_$lng"]) ?>" />
  <meta property="fb:app_id" content="" />
  <!-- twitter -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:description" content="<?php include("module/desc.php"); ?>" />
  <meta name="twitter:title" content="<?php include ("module/title.php"); ?>" />
  <meta name="twitter:image" content="<?php include("module/image.php"); ?>" />

  <link rel="stylesheet" href="assets/fonts/fontawesome-5.15.1/css/all.min.css" />
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/plugins/nprogress/nprogress.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" />
  <?php
    if (!isset($_REQUEST['pqh']) || (isset($_REQUEST['pqh']) && $mod1 == ''))
      _e('<link rel="stylesheet" href="assets/plugins/jssor_slider/jssor_script.css" />    
      <link rel="stylesheet" href="assets/plugins/timeline_slider/timeline_slider.css" />
      <link rel="stylesheet" href="assets/plugins/owlcarousel/assets/owl.carousel.min.css">
      <link rel="stylesheet" href="assets/plugins/owlcarousel/assets/owl.theme.default.min.css">
      <link rel="stylesheet" href="themes/plugins/daterangepicker/daterangepicker.css" />');
  ?>    
  <link rel="stylesheet" href="themes/plugins/toastr/toastr.min.css" />
  <link rel="stylesheet" href="assets/css/common.css" />
  <link rel="stylesheet" href="assets/css/index.css" />
  <?php 
    if (isset($_REQUEST['pqh']) && ($mod1 == $def['link_fservice'] || $mod1 == $def['link_queennature']))
      _e('<link rel="stylesheet" href="assets/css/product.css" />
      <link rel="stylesheet" href="assets/css/service.css" />');
    if (isset($_REQUEST['pqh']) && $mod1 == $def['link_fabout'])
      _e('<link rel="stylesheet" href="assets/plugins/jssor_slider/jssor_script.css" />
      <link rel="stylesheet" href="assets/css/landing_about.css" />
      <link rel="stylesheet" type="text/css" href="assets/plugins/magnific-popup/magnific-popup.css" media="screen" />');
      if (isset($_REQUEST['pqh']) && $mod1 == $def['link_franchise'])
      _e('<link rel="stylesheet" href="assets/plugins/jssor_slider/jssor_script.css" />
      <link rel="stylesheet" href="assets/css/landing_branch.css" />
      ');
    if (isset($mod1) && ($mod1 == $def['link_fnews'] || $mod1 == $def['link_fknowledge'] || $mod1 == $def['link_fpromotion']))
      _e('<link rel="stylesheet" href="assets/css/product.css" />');
  ?>
</head>
<body>
  <?php 
    if (isset($mod2) && ($mod1 == $def['link_fnews'] || $mod1 == $def['link_fknowledge'] || $mod1 == $def['link_fpromotion']))
      _e('<div id="fb-root"></div>
      <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0&appId=412157766037551&autoLogAppEvents=1" nonce="UqPJBmof"></script>');
  ?>
    <main>
      <a id="scroll-top" style="display: none;"><i class="fas fa-arrow-up icon-scroll-up"></i></a>
      <!-- top -->
      <div class="infomation text-brown position-relative pt-3 m-0">
        <div class="row">
          <div class="col-md-3">
            <div class="phone">
              <div class="text d-flex align-items-center">
                <div>
                  <button class="btn bg-transparent border-none text-brown icon-phone"><i class="fas fa-phone-volume"></i></button>&nbsp;
                </div>
                <div class="pt-2">
                  <span><?php _e($hotline['noidung_vi']) ?></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="col-12">
              <div class="row align-items-end">
                <div class="time col-lg-4 pb-2 text-center text-uppercase"><?php _e($lang['open_time'].' '.$opentime['noidung_vi']) ?></div>
                <div class="search col-lg-4">
                  <form method="post" class="form-group mb-2 position-relative">
                    <i class="fas fa-search position-absolute icon-search" id="searchKey"></i>
                    <input type="text" id="txtSearch" class="form-control bg-transparent text-brown search" placeholder="<?php _e($lang['placeholder_search']) ?>">
                  </form>
                </div>
                <div class="col-lg-4 pl-4">
                  <div class="row float-right">
                    <div class="money mx-3 mb-2 position-relative">
                      <span class="number font-weight-bold">0</span> <span>VNĐ</span>
                      <span class="h3"><i class="fas fa-shopping-bag"></i></span>
                      <span class="badge badge-light position-absolute border-radius-50 bg-brown">0</span>
                    </div>
                    <div class="mx-3 mb-2">
                      <div class="btn-group">
                        <?php
                          $titleLanguage = ($_SESSION['lang'] == 'en') ? $lang['lang_en'] : $lang['lang_vi'];
                          _e('<a class="bg-transparent border-none text-brown font-weight-bold p-0 language"><img src="assets/img/'.$_SESSION['lang'].'.png" alt="'.$titleLanguage.'" /></a>');
                        ?>
                        <div class="dropdown-menu dropdown-menu-right" id="menu_language" style="right: 0; left: auto;">
                            <a class="dropdown-item language_current language_choose" rel="vi"><img src="assets/img/vi.png" alt="<?php _e($lang['lang_vi']) ?>" /> <?php _e($lang['lang_vi']) ?></a>
                            <a class="dropdown-item language_choose" rel="en"><img src="assets/img/en.png" alt="<?php _e($lang['lang_en']) ?>" /> <?php _e($lang['lang_en']) ?></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      <!-- navbar -->
      <div class="control_navbar<?php _e($classFixed) ?>">
        <div class="navbar p-0">
          <nav class="navbar navbar-light navbar-expand-lg nav-bg-custorm w-100">
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse justify-content-center position-relative" id="navbarCollapse">
              <ul class="navbar-nav nav font-weight-bold align-items-center py-1 position-static">
                <li class="lg"><img class="mom" src="assets/img/melismom.png" alt=""></li>
                <?php 
                  if (!isset($_REQUEST['pqh']) || !in_array($mod1, $array_not)) {
                ?>
                <li class="navbar-item<?php if (!isset($_REQUEST['pqh'])) _e(' active') ?>">
                  <a href="<?php _e(URL.$_SESSION['lang']) ?>" class="nav-link text-uppercase"><?php _e($lang['home']) ?></a>
                </li>
                <li class="navbar-item m-1 text-nowrap<?php if (isset($_REQUEST['pqh']) && $mod1 == $def['link_fabout']) _e(' active') ?>">
                  <a href="<?php _e($_SESSION['lang'].'/'.$def['link_fabout']) ?>" class="nav-link text-uppercase"><?php _e($lang['landing_about']) ?></a>
                </li>
                <li class="navbar-item m-1 text-nowrap<?php if (isset($_REQUEST['pqh']) && $mod1 == $def['link_fservice']) _e(' active') ?>">
                  <a href="<?php _e($_SESSION['lang'].'/'.$def['link_fservice']) ?>" class="nav-link text-uppercase"><?php _e($lang['service']) ?></a>
                </li>
                <li class="navbar-item m-1 text-nowrap queen-nature dropdown position-static text-center<?php if (isset($_REQUEST['pqh']) && $mod1 == $def['link_queennature']) _e(' active') ?>">
                  <a href="#" class="dropdown-toggle queen-nature nav-link" id="navbarDropdownMenuQueenNature" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">QUEEN NATURE</a>
                  <?php
                    $existCateProducts = $h->checkExist($tableCate, "cate_id = 1 and deleted_at is null and active = 1");
                    if ($existCateProducts) {
                  ?>
                  <ul class="submenu m-auto dropdown-menu p-0" aria-labelledby="navbarDropdownMenuQueenNature">
                    <div id="queen-nature" class="row p-0 m-0 submenu-queen-nature">
                      <div class="col-12 m-0 p-0 py-2 bg-brown-opacity-50">
                        <div class="m-auto d-flex row p-0 m-0">
                        <?php
                          $procates = $h->getAll("id, name_vi, name_en", $tableCate, "deleted_at is null and active = 1", "sort asc, id asc", "limit 0, 4");
                          $cateMenu = "";
                          foreach ($procates as $cate) {
                            $cateName = $cate["name_$lng"];
                            $product_id = $cate['id'];
                            $cateMenu .= '<div class="pregnant-mother col-lg-6 col-xl-3 pr-0">';
                            $cateMenu .= '<div class="title"><p>'.$cateName.'</p></div>';
                            $menuProducts = $h->getAll("name_vi, name_en", $tableProduct, "product_id = $product_id and deleted_at is null and active = 1", "sort desc, id desc", "limit 0, 7");
                            $cateMenu .= '<ul class="menu">';
                            $linkCateMenu = $_SESSION['lang'].'/'.$def['link_queennature'].'/'.chuoilink($cate['name_vi']);
                            foreach ($menuProducts as $menuProduct) {
                              $productMenuName = $menuProduct["name_$lng"];
                              $linkProductMenu = $linkCateMenu.'/'.chuoilink($menuProduct['name_vi']).'.html';
                              if (isset($mod3) && $mod3 == chuoilink($menuProduct['name_vi']).'.html')
                                $activeClassProduct = ' active';
                              else
                                $activeClassProduct = '';
                              $cateMenu .= '<li><a class="sub-nav-link'.$activeClassProduct.'" href="'.$linkProductMenu.'" title="'.$productMenuName.'">'.$productMenuName.'</a></li>';
                            }
                            $cateMenu .= '</ul>';
                            $cateMenu .= '</div>';
                        }
                        _e($cateMenu); 
                      ?>
                      </div>
                      </div>
                    </div>
                  </ul>
                  <?php
                    } 
                  ?>
                </li>
                <li class="navbar-item m-1 text-nowrap">
                  <a href="<?php _e($_SESSION['lang'].'/'.$def['link_franchise']) ?>" class="nav-link text-uppercase"><?php _e($lang['franchise']) ?></a>
                </li>
                <li class="navbar-item m-1 text-nowrap<?php if (isset($_REQUEST['pqh']) && ($mod1 == $def['link_freview'] || $mod == $def['link_celes_feel'])) _e(' active') ?>">
                  <a href="<?php _e($_SESSION['lang'].'/'.$def['link_freview']) ?>" class="nav-link text-uppercase"><?php _e($lang['review']) ?></a>
                </li>
                <li class="navbar-item m-1 text-nowrap<?php if (isset($_REQUEST['pqh']) && $mod1 == $def['link_fknowledge']) _e(' active') ?>">
                  <a href="<?php _e($_SESSION['lang'].'/'.$def['link_fknowledge']) ?>" class="nav-link text-uppercase"><?php _e($lang['n_knowledge']) ?></a>
                </li>
                <li class="navbar-item m-1 text-nowrap<?php if (isset($_REQUEST['pqh']) && $mod1 == $def['link_fnews']) _e(' active') ?>">
                  <a href="<?php _e($_SESSION['lang'].'/'.$def['link_fnews']) ?>" class="nav-link text-uppercase"><?php _e($lang['n_news']) ?></a>
                </li>
                <?php
                  } 
                  if (isset($mod1) && $mod1 == $def['link_fabout'])
                    _e('<li class="navbar-item"><a href="'.URL.'" class="nav-link text-uppercase">'.$lang['home'].'</a></li><li class="navbar-item page_link m-1 text-nowrap text-center mt-4"><a href="#startup" class="nav-link">'.$lang['fabout_melisspa'].'</a></li><li class="navbar-item page_link m-1 text-nowrap text-center mt-4"><a href="#vision" class="nav-link">'.$lang['fabout_vision'].'</a></li><li class="navbar-item page_link m-1 text-nowrap text-center mt-4"><a href="#team" class="nav-link">'.$lang['fabout_team'].'</a></li><li class="navbar-item page_link m-1 text-nowrap"><a href="#community" class="nav-link">'.$lang['fabout_community'].'</a></li><li class="navbar-item page_link m-1 text-nowrap"><a href="#gallery_image" class="nav-link">'.$lang['fabout_images'].'</a></li><li class="navbar-item page_link m-1 text-nowrap"><a href="#gallery_video" class="nav-link">VIDEO</a></li>');
                  if (isset($mod1) && $mod1 == $def['link_franchise'])
                    _e('<li class="navbar-item"><a href="'.URL.'" class="nav-link text-uppercase">'.$lang['home'].'</a></li><li class="navbar-item page_link m-1 text-nowrap text-center"><a href="#whychoose" class="nav-link">'.$lang['ff_melisspa'].'</a></li><li class="navbar-item page_link m-1 text-nowrap text-center"><a href="#advantage" class="nav-link">'.$lang['ff_advantage'].'</a></li><li class="navbar-item page_link m-1 text-nowrap text-center"><a href="#benefit" class="nav-link">'.$lang['ff_benefit'].'</a></li><li class="navbar-item page_link m-1 text-nowrap text-center"><a href="#cost" class="nav-link">'.$lang['ff_cost'].'</a></li><li class="navbar-item page_link m-1 text-nowrap text-center"><a href="#request" class="nav-link">'.$lang['ff_request'].'</a></li><li class="navbar-item page_link m-1 text-nowrap text-center"><a href="#procedure" class="nav-link">'.$lang['ff_procedure'].'</a></li><li class="navbar-item page_link m-1 text-nowrap text-center"><a href="#register" class="nav-link">'.$lang['ff_register'].'</a></li>');
                ?>
                <li class="lg"><img class="beaute" src="assets/img/melisbeaute.png" alt=""></li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
