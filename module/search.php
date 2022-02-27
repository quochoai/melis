<!-- content main -->
<section class="content_main">
			<div class="subcontent bglime">
				<div class="row">
					<div class="col-md-12 p-2 text-right text-uppercase">
						<ul class="bread">
						<?php 
              $bread = '<li><a href="'.URL.'"><i class="fas fa-home"></i> '.$lang['home'].'</a></li><li>></li><li>'.$lang['search_result'].'</li>';
              _e($bread);
            ?>
					</div>
					<!-- sidebar left -->
					<?php include("module/sidebar_product.php") ?>
					<!-- end sidebar left -->
					<div class="col-md-9">
          <?php
            if (isset($mod2)) {
              $keyword = str_replace("+", " ", $mod2);
							$tableCateProduct = "products as p, categories as c";
							$tableCateService = "services as s, categories as c";
              $whProductSearch = "p.name_$lng like '%$keyword%' and c.deleted_at is null and p.deleted_at is null and p.product_id = c.id";
              $whR = "customer_$lng like '%$keyword%' and deleted_at is null";
							$whServiceSearch = "s.name_$lng like '%$keyword%' and c.deleted_at is null and s.deleted_at is null and s.service_id = c.id";
							$whNewsSearch = "deleted_at is null and name_$lng like '%$keyword%'";

              $checkSearchProduct = $h->checkExist($tableCateProduct, $whProductSearch, "p.id");
              $checkSearchService = $h->checkExist($tableCateService, $whServiceSearch, "s.id");
              $checkSearchNews = $h->checkExist($tableNews, $whNewsSearch);
              $checkSearchReview = $h->checkExist($tableReview, $whR);
              $numberCheck = $checkSearchProduct + $checkSearchService + $checkSearchNews + $checkSearchReview;
              if ($numberCheck > 0) {
                $textFind = $lang['findout'].' <span class="keyword">'.$numberCheck.'</span> '.$lang['result_with_keyword'].' <span class="keyword"> '.$keyword.'</span>';
								$msgSearch = "";
								if ($checkSearchProduct) {
									$getSelectProduct = "p.name_vi as pname_vi, p.name_en as pname_en, c.name_vi as cname_vi";
									$allSearchProducts = $h->getAll($getSelectProduct, $tableCateProduct, $whProductSearch, "p.sort desc, p.id desc");
									foreach ($allSearchProducts as $searchProduct) {
										$linkCateSearchProduct = chuoilink($searchProduct['cname_vi']);
										$nameSearchProduct = str_replace($keyword, '<span class="keyword">'.$keyword.'</span>', $searchProduct["pname_$lng"]);

										$linkSearchProduct = $lng.'/'.$def['link_queennature'].'/'.$linkCateSearchProduct.'/'.chuoilink($searchProduct['pname_vi']).'.html';
										$msgSearch .= '<li><a href="'.$linkSearchProduct.'">'.$nameSearchProduct.'</a></li>';
									}
								}
								if ($checkSearchService) {
									$getSelectService = "s.name_vi as sname_vi, s.name_en as sname_en, c.name_vi as cname_vi";
									$allSearchServices = $h->getAll($getSelectService, $tableCateService, $whServiceSearch, "s.sort desc, s.id desc");
									foreach ($allSearchServices as $searchService) {
										$linkCateSearchService = chuoilink($searchService['cname_vi']);
										$nameSearchService = str_replace($keyword, '<span class="keyword">'.$keyword.'</span>', $searchService["sname_$lng"]);

										$linkSearchService = $lng.'/'.$def['link_fservice'].'/'.$linkCateSearchService.'/'.chuoilink($searchService['sname_vi']).'.html';
										$msgSearch .= '<li><a href="'.$linkSearchService.'">'.$nameSearchService.'</a></li>';
									}
								}
								if ($checkSearchReview) {
									$getSelectReview = "rv_id, customer_vi, customer_en";
									$allSearchReviews = $h->getAll($getSelectReview, $tableReview, $whR, "sort desc, id desc");
									foreach ($allSearchReviews as $searchReview) {
										if ($searchReview['rv_id'] == $def['rv_id_customer'])
											$linkCateReview = $def['link_freview'];
										elseif ($searchReview['rv_id'] == $def['rv_id_star'])
											$linkCateReview = $def['link_celes_feel'];
										$nameSearchReview = str_replace($keyword, '<span class="keyword">'.$keyword.'</span>', $searchReview["customer_$lng"]);

										$linkSearchReview = $lng.'/'.$linkCateReview.'/'.chuoilink($searchReview['customer_vi']).'.html';
										$msgSearch .= '<li><a href="'.$linkSearchReview.'">'.$nameSearchReview.'</a></li>';
									}
								}
								if ($checkSearchNews) {
									$getSelectNews = "news_id, name_vi, name_en";
									$allSearchNews = $h->getAll($getSelectNews, $tableNews, $whNewsSearch, "sort desc, id desc");
									foreach ($allSearchNews as $searchNews) {
										if ($searchNews['news_id'] == $def['news_id_news'])
											$linkCateNews = $def['link_fnews'];
										elseif ($searchNews['news_id'] == $def['news_id_knowledge'])
											$linkCateNews = $def['link_fknowledge'];
										elseif ($searchNews['news_id'] == $def['news_id_promotion'])
											$linkCateNews = $def['link_fpromotion'];
										$nameSearchNews = str_replace($keyword, '<span class="keyword">'.$keyword.'</span>', $searchNews["name_$lng"]);

										$linkSearchNews = $lng.'/'.$linkCateNews.'/'.chuoilink($searchNews['name_vi']).'.html';
										$msgSearch .= '<li><a href="'.$linkSearchNews.'">'.$nameSearchNews.'</a></li>';
									}
								}
          ?>
						<div class="row mr-4" id="dataSearch">
							<div class="col-md-12 pr-5 text-uppercase">
							  <?php _e($textFind) ?>
							  <ul class="search"><?php _e($msgSearch) ?></ul>
							</div>
							
						</div>
            <?php } else 
              _e('<div class="row mr-4"><div class="col-md-12 pr-5 text-uppercase">'.$lang['no_result_with_keyword'].' <span class="keyword"> '.$keyword.'</span></div></div>');
                } else 
              _e('<div class="col-md-12 text-center text-danger">'.$lang['not_data_on_this_page'].'</div>');
            ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- end content main -->