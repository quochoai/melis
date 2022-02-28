<!-- Book Calendaer -->
<div class="w-100 position-relative"> <!--  id="content" -->
	<div id="jssor_1" class="jso_1">
		<!-- Loading Screen -->
		<div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
			<img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/svg/spin.svg" />
		</div>
		<div data-u="slides" class="jsso_1">
			<?php
				$tableSlider = "sliders";
				$checkSlider = $h->checkExist($tableSlider, "deleted_at is null and active = 1 and hc_id = 1");
				if ($checkSlider) {
						$sliders = $h->getAll("alt_vi, alt_en, url, image", $tableSlider, "deleted_at is null and active = 1 and hc_id = ".$def['slider_id_home'], "sort asc, id desc");
						$imgSlider = "";
						foreach ($sliders as $slider) {
							$linkSlider = ($slider['url'] != '' && $slider['url'] != '#') ? '<a href="'.$slider['url'].'"><img data-u="image" alt="" src="'.$def['upload_slider_home'].$slider['image'].'" alt="'.$slider["alt_$lng"].'" /></a>' : '<img data-u="image" alt="" src="'.$def['upload_slider_home'].$slider['image'].'" alt="'.$slider["alt_$lng"].'" />';
							$imgSlider .= '<div>'.$linkSlider.'</div>';
						}
						_e($imgSlider);
				} else 
					_e('<div><img data-u="image" alt="" src="assets/img/slider_test/1.png" /></div>');
			?>
		</div>
		<!-- Arrow Navigator -->
		<div data-u="arrowleft" class="jssora051" style="width:65px;height:65px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
			<svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
				<polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
			</svg>
		</div>
		<div data-u="arrowright" class="jssora051" style="width:65px;height:65px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
			<svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
				<polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
			</svg>
		</div>
	</div>
	<!--form tu van-->
	<div class="book-calendar text-center position-absolute p-4" id="book-calendar-top">
		<form action="" method="post">
			<h5 for="" class="text-uppercase color_brown font-weight-bold"><?php _e($lang['online_booking']) ?></h5>
			<div class="d-flex">
				<label class="p-2 d-flexprocess"> <?php _e($lang['consulting_doctor']) ?><input type="radio" name="process_home" value="1" id="bstv" checked><span class="checkmark"></span></label>
				<label class="p-2 d-flexprocess"><?php _e($lang['carry_out_the_treatment']) ?><input type="radio" name="process_home" value="2" id="thlt"><span class="checkmark"></span></label>
			</div>
			<div>
				<input type="text" id="bookfullname" name="book[fullname]" class="form-control mb-2 input-book" placeholder="<?php _e($lang['fullname']) ?>">
			</div>
			<div>
				<input type="text" id="bookphone" name="book[phone]" class="form-control mb-2 input-book" placeholder="<?php _e($lang['mobilephone']) ?>">
			</div>
			<div>
				<input type="text" id="bookemail" name="book[email]" class="form-control mb-2 input-book" placeholder="<?php _e($lang['email_if']) ?>">
			</div>
			<div>
				<input type="text" id="demand" name="book[demand]" class="form-control mb-2 input-book" placeholder="<?php _e($lang['demand']) ?>">
			</div>
			<div class="d-flex">
				<div class="row col-12 p-0 m-0 justify-content-between">
					<div class="col-6 p-0 pr-1">
						<input type="datetime-local" id="booktime" name="book[time]" class="form-control mb-2 input-book" placeholder="Lịch">
					</div>
					<div class="col-6 p-0 pl-1">
						<select name="book[branch]" id="branch" class="form-control mb-2 input-book">
							<option value="0"><?php _e($lang['branch']) ?></option>
							<option value="SPA TẠI HÀ NỘI - 121 An Dương Vương - Tây Hồ"><?php _e($lang['branch_hn_tay_ho']) ?></option>
							<option value="SPA TẠI TP. HỒ CHÍ MINH - 272 Nguyễn Thiện Thuật - P3 - Q3"><?php _e($lang['branch_hcm_q3']) ?></option>
						</select>
					</div>
				</div>
			</div>
			<button type="button" class="btn btn-book text-uppercase" id="bookappointment"><?php _e($lang['make_an_appointment']) ?></button>
		</form>
	</div>
	<!-- end form tu van -->
</div>
<section class="content_main">
	<div class="content_m">
		<!-- SHOP NOW / BOOK ONLINE / GIFT CARDS -->
		<div class="bg-wrapper section-pregnancy">
			
				<div class="container-fluid pregnancy">
					<div class="row pt-4">
						<!--  -->
						<div class="col-12 pb-2">
							<div class="row d-flex justify-content-center">
								<div class="px-2 col-md-4 col-lg-4 col-xl-3 my-1 text-center">
									<div class="text-uppercase px-5 py-3 pregnancy-service">
										<div>
											<a href="#"><span class="">SHOP NOW</span></a>
										</div>
									</div>
								</div>
								<div class="px-2 col-md-4 col-lg-4 col-xl-3 my-1 text-center">
									<div class="text-uppercase px-5 py-3 pregnancy-service">
										<div>
											<a href="#"><span class="">BOOK ONLINE</span></a>
										</div>
									</div>
								</div>
								<div class="px-2 col-md-4 col-lg-4 col-xl-3 my-1 text-center">
									<div class="text-uppercase px-5 py-3 pregnancy-service">
										<div>
											<a href="#"><span class="">GIFT CARDS</span></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
		<!-- pregnance week -->
		<div class="col-12 text-center pb-4">
			<div class="title">
				<span class="pregnancy-week-by-week"><?php _e($lang['your_pregnance_week_by_week']) ?></span>
			</div>
		</div>
		<section class="cd-horizontal-timeline">
			<div class="timeline">
				<div class="events-wrapper">
					<div class="events">
						<ol>
							<li><a href="#0" data-date="01/01/2001" class="selected"><img src="assets/img/pregnance_week/2.png" alt="2" /><span>2</span></a></li>
							<li><a href="#0" data-date="01/01/2002"><img src="assets/img/pregnance_week/3.png" /><span>3</span></a></li>
							<li><a href="#0" data-date="01/01/2003"><img src="assets/img/pregnance_week/4.png" /><span>4</span></a></li>
							<li><a href="#0" data-date="01/01/2004"><img src="assets/img/pregnance_week/5.png" /><span>5</span></a></li>
							<li><a href="#0" data-date="01/01/2005"><img src="assets/img/pregnance_week/6.png" /><span>6</span></a></li>
							<li><a href="#0" data-date="01/01/2006"><img src="assets/img/pregnance_week/7.png" /><span>7</span></a></li>
							<li><a href="#0" data-date="01/01/2007"><img src="assets/img/pregnance_week/8.png" /><span>8</span></a></li>
							<li><a href="#0" data-date="01/01/2008"><img src="assets/img/pregnance_week/9.png" /><span>9</span></a></li>
							<li><a href="#0" data-date="01/01/2009"><img src="assets/img/pregnance_week/10.png" /><span>10</span></a></li>
							<li><a href="#0" data-date="01/01/2010"><img src="assets/img/pregnance_week/11.png" /><span>11</span></a></li>
							<li><a href="#0" data-date="01/01/2011"><img src="assets/img/pregnance_week/12.png" /><span>12</span></a></li>
							<li><a href="#0" data-date="01/01/2012"><img src="assets/img/pregnance_week/13.png" /><span>13</span></a></li>
							<li><a href="#0" data-date="01/01/2013"><img src="assets/img/pregnance_week/14.png" /><span>14</span></a></li>
							<li><a href="#0" data-date="01/01/2014"><img src="assets/img/pregnance_week/15.png" /><span>15</span></a></li>
							<li><a href="#0" data-date="01/01/2015"><img src="assets/img/pregnance_week/16.png" /><span>16</span></a></li>
							<li><a href="#0" data-date="01/01/2016"><img src="assets/img/pregnance_week/17.png" /><span>17</span></a></li>
							<li><a href="#0" data-date="01/01/2017"><img src="assets/img/pregnance_week/18.png" /><span>18</span></a></li>
							<li><a href="#0" data-date="01/01/2018"><img src="assets/img/pregnance_week/19.png" /><span>19</span></a></li>
							<li><a href="#0" data-date="01/01/2019"><img src="assets/img/pregnance_week/20.png" /><span>20</span></a></li>
							<li><a href="#0" data-date="01/01/2020"><img src="assets/img/pregnance_week/21.png" /><span>21</span></a></li>
							<li><a href="#0" data-date="01/01/2021"><img src="assets/img/pregnance_week/22.png" /><span>22</span></a></li>
							<li><a href="#0" data-date="01/01/2022"><img src="assets/img/pregnance_week/23.png" /><span>23</span></a></li>
							<li><a href="#0" data-date="01/01/2023"><img src="assets/img/pregnance_week/24.png" /><span>24</span></a></li>
							<li><a href="#0" data-date="01/01/2024"><img src="assets/img/pregnance_week/25.png" /><span>25</span></a></li>
							<li><a href="#0" data-date="01/01/2025"><img src="assets/img/pregnance_week/26.png" /><span>26</span></a></li>
							<li><a href="#0" data-date="01/01/2026"><img src="assets/img/pregnance_week/27.png" /><span>27</span></a></li>
							<li><a href="#0" data-date="01/01/2027"><img src="assets/img/pregnance_week/28.png" /><span>28</span></a></li>
							<li><a href="#0" data-date="01/01/2028"><img src="assets/img/pregnance_week/29.png" /><span>29</span></a></li>
							<li><a href="#0" data-date="01/01/2029"><img src="assets/img/pregnance_week/30.png" /><span>30</span></a></li>
							<li><a href="#0" data-date="01/01/2030"><img src="assets/img/pregnance_week/31.png" /><span>31</span></a></li>
							<li><a href="#0" data-date="01/01/2031"><img src="assets/img/pregnance_week/32.png" /><span>32</span></a></li>
							<li><a href="#0" data-date="01/01/2032"><img src="assets/img/pregnance_week/33.png" /><span>33</span></a></li>
							<li><a href="#0" data-date="01/01/2033"><img src="assets/img/pregnance_week/34.png" /><span>34</span></a></li>
							<li><a href="#0" data-date="01/01/2034"><img src="assets/img/pregnance_week/35.png" /><span>35</span></a></li>
							<li><a href="#0" data-date="01/01/2035"><img src="assets/img/pregnance_week/36.png" /><span>36</span></a></li>
							<li><a href="#0" data-date="01/01/2036"><img src="assets/img/pregnance_week/37.png" /><span>37</span></a></li>
							<li><a href="#0" data-date="01/01/2037"><img src="assets/img/pregnance_week/38.png" /><span>38</span></a></li>
							<li><a href="#0" data-date="01/01/2038"><img src="assets/img/pregnance_week/39.png" /><span>39</span></a></li>
							<li><a href="#0" data-date="01/01/2039"><img src="assets/img/pregnance_week/40.png" /><span>40</span></a></li>
						</ol>
		
						<span class="filling-line" aria-hidden="true"></span>
					</div> <!-- .events -->
				</div> <!-- .events-wrapper -->
					
				<ul class="cd-timeline-navigation">
					<li><a href="#0" class="prev inactive">Prev</a></li>
					<li><a href="#0" class="next">Next</a></li>
				</ul> <!-- .cd-timeline-navigation -->
			</div> <!-- .timeline -->
		</section>
		<!-- video, short introduce  -->
		<div class="row p-4">
			<div class="col-12 pb-4">
				<div class="row">
					<div class="col-lg-5">
						<?php
							$vtc = $h->getById("noidung_vi", $tableHtml, 10);
							$video_introduce = substr($vtc['noidung_vi'], -11, 11);
						?>
						<iframe style="width: 100%; min-height: 400px; border: 1px solid #4d3424;" class="h-100" src="https://www.youtube.com/embed/<?php _e($video_introduce) ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
					<div class="col-lg-7">
						<div class="header row pb-2">
							<div class="welcome-img">
								<img src="assets/img/bg_welcome.png" alt="">
							</div>
							<div class="col logo-img">
								<img src="assets/img/logo.png" alt="">
							</div>
						</div>
						<div class="text-box position-relative">
							<?php
								$introAbout = $h->getById("noidung_vi, noidung_en", $tableHtml, 11);
								$introAboutHome = $introAbout["noidung_$lng"];
								$msgAboutHome = '<div>'.$introAboutHome.'</div><a href="'.$_SESSION['lang'].'/'.$def['link_fabout'].'" class="btn readmore-textarea text-uppercase position-absolute py-0 px-1 nav-link">'.$lang['view_all'].'</a>';
								_e($msgAboutHome);
							?>							
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
			// Dịch vụ melis spa
			$tableService = "services";
			$tableCateService = "categories as c, services as s";
			$checkService = $h->checkExist($tableCateService, "c.active = 1 and show_home = 1 and c.deleted_at is null and s.active = 1 and s.deleted_at is null and c.id = s.service_id and c.cate_id = 2", "s.id");
			if ($checkService) {
		?>
		<div class="bg-wrapper service-spa">
			<div class="container-fluid pregnancy">
				<div class="col-12 position-relative">
					<div class="row d-flex justify-content-center">
						<div class="px-2 my-1 text-center">
							<div class="text-uppercase px-3 py-2 shop-now pregnancy-service">
								<div>
									<span class="text-uppercase" style="font-size: 2em;"><?php _e($lang['melis_spa_service']) ?></span>
								</div>
							</div>
						</div>
					</div>
					<div class="position-absolute" style="top: 0; right: 0;">
						<a href="<?php _e($_SESSION['lang'].'/'.$lang['link_fservice']) ?>" class="btn btn-read-more text-uppercase">
							<i class="fas fa-plus"></i> <?php _e($lang['view_all']) ?>
						</a>
					</div>
				</div>
				<div class="row py-4">
					<div class="col-xl-9 col-lg-12 col-md-12 col-12 m-auto pb-4"><?php _e($lang['intro_melis_spa_service']) ?></div>
					<div class="col-12 pb-4">
						<div class="container-fluid">
							<div class="owl-carousel" id="owl-carousel">
							<?php
								$services = $h->getAll("service_id, s.name_vi as sname_vi, s.name_en as sname_en, c.name_vi as cname_vi, image", $tableCateService, "c.active = 1 and s.active = 1 and show_home = 1 and c.deleted_at is null and s.deleted_at is null and c.id = s.service_id and c.cate_id = 2", "s.sort desc, s.id desc");
								$msgService = "";
								foreach ($services as $ks => $service) {
									$acti = ($ks == 1) ? ' active' : '';
									//$cateService = $h->getById("name_vi", $tableService, $service['service_id']);
									$linkService = $_SESSION['lang'].'/'.$def['link_fservice'].'/'.chuoilink($service['cname_vi']).'/'.chuoilink($service['sname_vi']).'.html';
									$imgService = (!is_null($service['image']) && $service['image'] != '') ? $def['upload_service_avatar'].$service['image'] : $def['no_image_available'];
									$titleService = $service["sname_$lng"];
									$msgService .= '<div class="item'.$acti.'">';
									$msgService .= '	<a href="'.$linkService.'" title="'.$titleService.'"><figure><img src="'.$imgService.'" alt="'.$titleService.'" class="img w-100 img_service_home" /></figure></a>';
									$msgService .= '	<div class="text text-center pt-4"><div class="title text-uppercase"><a href="'.$linkService.'">'.$titleService.'</a></div></div>';
									$msgService .= '	<div class="m-auto text-center pt-4"><div class="m-auto"><a href="'.$linkService.'" class="btn readmore-textarea text-uppercase p-2">'.$lang['view_detail'].'</a></div></div>';
									$msgService .= '</div>';
								}
								_e($msgService);
							?>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<?php
			} // end Dịch vụ melis spa
			// SẢN PHẨM ƯU ĐÃI
			$tableProduct = "products";
			$tableCateProduct = "categories as c, products as p";
			$checkOfferProducts = $h->checkExist($tableCateProduct, "offer_product = 1 and show_home = 1 and c.active = 1 and c.deleted_at is null and p.active = 1 and p.deleted_at is null and c.id = p.product_id and cate_id = 1", "p.id");
			if ($checkOfferProducts) {
		?>
		<div class="bg-wrapper discount">
				<div class="container-fluid discount-product">
					<div class="row py-4">
						<div class="col-12">
							<div class="container">
								<div class="col-12 pb-4">
									<div class="row d-flex justify-content-center">
										<div class="px-2 my-1 text-center">
											<div class="text-uppercase px-3 py-2 shop-now pregnancy-service">
												<div>
													<span class="" style="font-size: 2em;"><?php _e($lang['offer_products']) ?></span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
								<?php
									$offerProducts = $h->getAll("product_id, p.name_vi as pname_vi, p.name_en as pname_en, c.name_vi as cname_vi, image", $tableCateProduct, "offer_product = 1 and show_home = 1 and c.active = 1 and c.deleted_at is null and p.active = 1 and p.deleted_at is null and c.id = p.product_id and cate_id = 1", "p.sort desc, p.id desc", "limit 0,6");
									$msgOfferProduct = "";
									foreach ($offerProducts as $offerProduct) {
										//$cateOfferProduct = $h->getById("name_vi", $tableProduct, $offerProduct['product_id']);
										$linkOfferProduct = $_SESSION['lang'].'/'.$def['link_queennature'].'/'.chuoilink($offerProduct['cname_vi']).'/'.chuoilink($offerProduct['pname_vi']).'.html';
										$imgOfferProduct = (!is_null($offerProduct['image']) && $offerProduct['image'] != '') ? $def['upload_product_avatar'].$offerProduct['image'] : $def['no_image_available'];
										$titleOfferProduct = $offerProduct["pname_$lng"];
										$msgOfferProduct .= '<div class="col-lg-4"><div class="py-3"><div class="py-4 bg-brow">';
										$msgOfferProduct .= '	<div class="img-prod w-50 m-auto"><div class="img w-100 m-auto"><a href="'.$linkOfferProduct.'" title="'.$titleOfferProduct.'"><figure><img src="'.$imgOfferProduct.'" alt="'.$titleOfferProduct.'" class="w-100 img_offer_product" /></figure></a></div></div>';
										$msgOfferProduct .= '	<div class="m-auto text-center pt-4"><div class="m-auto"><a href="'.$linkOfferProduct.'" class="btn readmore-textarea text-uppercase p-2">'.$lang['view_detail'].'</a></div></div>';
										$msgOfferProduct .= '</div></div></div>';
									}
									_e($msgOfferProduct);
								?>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
		<?php
      } // end san pham uu dai
			// TIN TỨC - SỰ KIỆN
			$tableNews = "news";
			$checkNews = $h->checkExist($tableNews, "news_id IN (1, 3) and deleted_at is null and active = 1");
			if ($checkNews) {
		?>
		<div class="bg-wrapper event news column-xl">
			
				<div class="container-fluid event-news">
					<div class="row pt-5 pb-4">
						<div class="col-12">
							<div class="container-fluid position-relative">
								<div class="col-12 pb-4">
									<div class="row d-flex justify-content-center">
										<div class="px-2 my-1 text-center">
											<div class="text-uppercase px-3 py-2 shop-now pregnancy-service">
												<div>
													<span class="" style="font-size: 2em;"><?php _e($lang['news_events']) ?></span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="position-absolute" style="top: 0; right: 0;">
									<a href="<?php _e($_SESSION['lang'].'/'.$def['link_fnews']) ?>" class="btn btn-read-more text-uppercase"><i class="fas fa-plus"></i> <?php _e($lang['view_all']) ?></a>
								</div>
								<div class="row">
								<?php
									$newss = $h->getAll("news_id, name_vi, name_en, image, scontent_vi, scontent_en", $tableNews, "news_id IN (1, 3) and deleted_at is null and active = 1", "sort desc, id desc", "limit 0, 3");
									$msgNews = "";
									foreach ($newss as $kn => $news) {
										if ($news['news_id'] == 1) {
											$nOP = $_SESSION['lang'].'/'.$def['link_fnews'];
											$folderNews = $def['upload_news'];
										} else {
											$nOP = $_SESSION['lang'].'/'.$def['link_fpromotion'];
											$folderNews = $def['upload_promotion'];
										}
										$titleNews = $news["name_$lng"];
										$imgNews = (!is_null($news['image']) && $news['image'] != '') ? $folderNews.$news['image'] : $def['no_image_available'];
										$linkNews = $nOP.chuoilink($news['name_vi']).'.html';
										$shortContentNews = $news["scontent_$lng"];
										$overNews = ($kn %2 == 0) ? '<div class="col-12 px-2 pb-4 min-wh"><a href="'.$linkNews.'" title="'.$titleNews.'"><div class="w-100 h-100 bg-img-event-news" style="background-image: url('.$imgNews.');"></div></a></div>' : '';
										$belowNews = ($kn %2 != 0) ? '<div class="col-12 px-2 pb-4 min-wh"><a href="'.$linkNews.'" title="'.$titleNews.'"><div class="w-100 h-100 bg-img-event-news" style="background-image: url('.$imgNews.');"></div></a></div>' : '';
										$msgNews .= '<div class="col-lg-4 p-0"><div class="row p-0 m-0">';
										$msgNews .= $overNews;
										$msgNews .= '<div class="col-12 px-2 pb-4 min-wh"><div class="text-area-news-event"><div class="title"><div class="col-12 text-center font-weight-bold"><a href="'.$linkNews.'" title="'.$titleNews.'">'.$titleNews.'</a></div></div><div class="content"><div class="col-12 px-1">'.$shortContentNews.'</div></div><a href="'.$linkNews.'" class="btn readmore-div-span py-0 px-1 text-uppercase position-absolute nav-link">'.$lang['view_more'].'</a></div></div>';
										$msgNews .= $belowNews;
										$msgNews .= '</div></div>';
 									}
									 _e($msgNews);
								?>
								</div>
							</div>
						</div>
					</div>
				</div>

		</div>
		<?php 
			} // end tin tức - sự kiện
			// SẢN PHẨM QUEEN NATURE
			$checkQueenProduct = $h->checkExist($tableCateProduct, "(offer_product = 0 || offer_product is null) and show_home = 1 and c.active = 1 and c.deleted_at is null and p.active = 1 and p.deleted_at is null and c.id = p.product_id and cate_id = 1", "p.id");
			if ($checkQueenProduct) {
		?>
		<div class="bg-wrapper discount">
			<div class="container-fluid discount-product pb-4 position-relative">
				<div class="row py-5 position-static">
					<div class="container-fluid">
						<div class="col-12">
							<div class="col-12 pb-4 position-relative">
								<div class="row d-flex justify-content-center">
									<div class="px-2 my-1 text-center">
										<div class="text-uppercase px-3 py-2 shop-now pregnancy-service">
											<div>
												<span class="" style="font-size: 2em;"><?php _e($lang['queen_nature_products']) ?></span>
											</div>
										</div>
									</div>
								</div>
								<div class="position-absolute" style="top: 0; right: 0;">
									<a href="<?php _e($_SESSION['lang'].'/'.$def['link_queennature']) ?>" class="btn btn-read-more text-uppercase"><i class="fas fa-plus"></i> <?php _e($lang['view_all']) ?></a>
								</div>
							</div>
						</div>
					</div>
					<div class="container position-static">
						<div class="col-12 pb-4 position-static carousel slide multi-item-carousel">
							<div class="container-fluid carousel-inner" style="overflow: visible;">
								<div class="carousel">
									<div class="list-item row" style="overflow: visible;">
										<div class="col-12 pb-4"><figure><img src="<?php _e($def['img_queen_nature_home']) ?>" class="img w-100" alt=""></figure></div>
									<?php
										$queenProducts = $h->getAll("product_id, p.name_vi as pname_vi, p.name_en as pname_en, c.name_vi as cname_vi, image", $tableCateProduct, "(offer_product = 0 || offer_product is null) and show_home = 1 and c.active = 1 and c.deleted_at is null and p.active = 1 and p.deleted_at is null and c.id = p.product_id and cate_id = 1", "p.sort desc, p.id desc", "limit 0, 3");
										$msgQueenProduct = "";
										foreach ($queenProducts as $queenProduct) {
											//$cateQueenProduct = $h->getById("name_vi", $tableProduct, $queenProduct['product_id']);
											$linkQueenProduct = $_SESSION['lang'].'/'.$def['link_queennature'].'/'.chuoilink($queenProduct['cname_vi']).'/'.chuoilink($queenProduct['pname_vi']).'.html';
											$titleQueenProduct = $queenProduct["pname_$lng"];
											$imgQueenProduct = (!is_null($queenProduct['image']) && $queenProduct['image'] != '') ? $def['upload_product_avatar'].$queenProduct['image'] : $def['no_image_available'];
											$msgQueenProduct .= '<div class="item col-xl-4 col-lg-4 col-md-12 col-12 position-relative">';
											$msgQueenProduct .= '	<a href="'.$linkQueenProduct.'" title="'.$titleQueenProduct.'"><figure><img src="'.$imgQueenProduct.'" alt="'.$titleQueenProduct.'" class="img w-100"></figure></a>';
											$msgQueenProduct .= '	<div class="text text-center py-4 w-75 product-queen-nature position-absolute">';
											$msgQueenProduct .= '		<div class="title"><a href="'.$linkQueenProduct.'" class="font-weight-bold text-uppercase">'.$titleQueenProduct.'</a></div>';
											$msgQueenProduct .= '		<div class="m-auto text-center pt-4"><div class="m-auto" style="max-width: 200px;"><a href="'.$linkQueenProduct.'" class="btn readmore-textarea text-uppercase py-2 px-1 nav-link">'.$lang['view_detail'].'</a></div></div>';
											$msgQueenProduct .= '</div></div>';
										}
										_e($msgQueenProduct);
									?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php 
			}
		?>
	</div>
</section>
<?php
	// KHÁCH HÀNG CẢM NHẬN
	$tableReview = "reviews";
	$checkCustomerReview = $h->checkExist($tableReview, "rv_id = 1 and deleted_at is null and show_home = 1");
  if ($checkCustomerReview) {
?>
<div class="bg-wrapper position-relative">
	<div class="wrapper">
		<div class="container-fluid customer-feel">
			<div class="row pt-5 pb-4">
				<div class="position-absolute image-left" style="z-index: 1;">
					<img src="assets/img/customer-feel-1.png" alt="">
				</div>
				<div class="col-12">
					<div class="container-fluid pb-4">
						<div class="col-12 position-relative">
							<div class="row d-flex justify-content-center">
								<div class="px-2 my-1 text-center">
									<div class="text-uppercase px-3 py-2 shop-now pregnancy-service">
										<div><span class="" style="font-size: 2em;"><?php _e($lang['customer_review']) ?></span></div>
									</div>
								</div>
							</div>
							<div class="position-absolute" style="top: 0; right: 0;">
								<a href="<?php _e($_SESSION['lang'].'/'.$lang['link_freview']) ?>" class="btn btn-read-more"><i class="fas fa-plus"></i> <?php _e($lang['view_all']) ?></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12" style="z-index: 2;">
					<div class="container">
						<div class="row owl-carousel" id="owl-carousel-2">
						<?php
							$customerReviews = $h->getAll("customer_vi, customer_en, image, content_vi, content_en", $tableReview, "rv_id = 1 and deleted_at is null and show_home = 1", "sort desc, id desc", "limit 0, 16");
							$countCustomerReview = count($customerReviews);
							$msgCustomerReview = "";
							foreach ($customerReviews as $kv => $customerReview) {
								$imgCustomerReview = ($customerReview['image'] == '') ? $def['no_image_available'] : $def['upload_review_customer'].$customerReview['image'];
								$customerName = $customerReview["customer_$lng"];
								$shortCustomerReview = catchuoi(strip_tags($customerReview["content_$lng"]), 260);
								$eachCustomerReview = '<div class="p-3 bg-frame position-relative w-100 h-100 mb-4" style="min-height: 201px; background-image: url(assets/img/frames-comments.png);"><div class="description px-5">'.$shortCustomerReview.'</div><div class="infomation-customer"><div class="position-absolute w-75 d-flex align-items-center"><div class="row p-0 m-0 w-100 align-items-center"><div class="avt col-4"><figure><img src="'.$imgCustomerReview.'" alt="'.$customerName.'" class="img-avt-customer"></figure></div><div class="name text-uppercase">'.$customerName.'</div></div></div></div></div>';
								if ($countCustomerReview > 4) {									
									if ($kv % 2 == 0)
										$msgCustomerReview .= '<div class="py-4 my-3">';
									$msgCustomerReview .= $eachCustomerReview;
									if ($kv % 2 != 0)
										$msgCustomerReview .= '</div>';
								} else {
									if ($countCustomerReview == 1 || $countCustomerReview == 2) {
										$msgCustomerReview .= '<div class="py-4 my-3">';
										$msgCustomerReview .= $eachCustomerReview;
										$msgCustomerReview .= '</div>';
									} else {
										if ($kv % 2 == 0)
											$msgCustomerReview .= '<div class="py-4 my-3">';
										$msgCustomerReview .= $eachCustomerReview;
										if ($kv == 1 || $kv == 2)
										$msgCustomerReview .= '</div>';
									}
								}
								
							}
							_e($msgCustomerReview);
						?>
						</div>
					</div>
				</div>

				<div class="position-absolute image-right" style="z-index: 1;">
					<img src="assets/img/customer-feel-2.png" alt="">
				</div>

			</div>
		</div>
	</div>
</div>
<?php
	} // end khách hàng cảm nhận
?>
<section class="content_main">
	<div class="content_m">
		<!-- KIẾN THỨC THƯ VIỆN VIDEO -->
		<div class="bg-wrapper position-relative">
			
				<div class="container-fluid customer-feel">
					<div class="row pb-4">
						<div class="col-12" style="z-index: 2;">
							<div class="container">
								<div class="row">
								<?php
									$checkKnowledge = $h->checkExist($tableNews, "news_id = 2 and deleted_at is null");
									if ($checkKnowledge) {
								?>
									<div class="col-lg-6">
										<div class="row">
											<div class="col-12 py-3">
												<div class="py-3"><span class="text-center py-2 px-4 bg-xlad text-uppercase"><?php _e($lang['n_knowledge']) ?></span></div>
											</div>
											<?php
												$knowledges = $h->getAll("name_vi, name_en, post_date", $tableNews, "news_id = 2 and deleted_at is null", "sort desc, id desc", "limit 0, 4");
												$msgKnowledge = "";
												foreach ($knowledges as $knowledge) {
													$titleKnowledge = $knowledge["name_$lng"];
													$postDate = $knowledge['post_date'];
													$linkKnowledge = $_SESSION['lang'].'/'.$def['link_fknowledge'].'/'.chuoilink($knowledge['name_vi']).'.html';
													$msgKnowledge .= '<div class="col-12">';
													$msgKnowledge .= '	<small>('.$postDate.')</small>';
													$msgKnowledge .= '	<p class="font-weight-bold"><a href="'.$linkKnowledge.'" title="'.$titleKnowledge.'">'.$titleKnowledge.'</a></p>';
													$msgKnowledge .= '</div>';
												}
												$msgKnowledge .= '<div class="col-12"><a href="'.$def['link_fknowledge'].'" class="btn btn-read-more"><i class="fas fa-plus"></i> '.$lang['view_all'].'</a></div>';
												_e($msgKnowledge);
											?>
											
										</div>
									</div>
									<?php 
										} 
										$tableGallery = "galleries";
										$checkVideo = $h->checkExist($tableGallery, "gal_id = 2 and deleted_at is null");
										if ($checkVideo) {
											$video = $h->getOne("link_youtube", $tableGallery, "gal_id = 2 and deleted_at is null", "sort desc, id desc");
											$videoGet = substr($video['link_youtube'], -11, 11);
									?>
									<div class="col-lg-6">
										<div class="row">
											<div class="col-12 py-3">
												<div class="row position-relative">
													<div class="col-12">
														<div class="row">
															<div class="py-3"><span class="text-center py-2 px-4 bg-xlad text-uppercase"><?php _e($lang['video_library']) ?></span></div>
															<div class="position-absolute" style="top: 0; right: 0;">
																<a href="<?php _e($_SESSION['lang'].'/'.$def['link_video_gallery']) ?>" class="btn btn-read-more text-uppercase"><i class="fas fa-plus"></i> <?php _e($lang['view_all']) ?></a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12">
												<iframe style="width: 100%; min-height: 300px;" src="https://www.youtube.com/embed/<?php _e($videoGet) ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											</div>
										</div>
									</div>
									<?php 
										} 
										// NGƯỜI NỔI TIẾNG NÓI VỀ CHÚNG TÔI
										$checkClebs = $h->checkExist($tableReview, "rv_id = 2 and deleted_at is null and show_home = 1");
										if ($checkClebs) {
									?>
									<div class="col-12">
										<div class="row">
											<div class="col-12 py-3">
												<div class="py-3"><span class="text-center py-2 px-4 bg-xlad text-uppercase"><?php _e($lang['celebs_talk_about_us']) ?></span></div>
											</div>
											<div class="owl-carousel" id="owl-carousel-3">
											<?php
												$celebsReviews = $h->getAll("customer_vi, customer_en, image, content_vi, content_en", $tableReview, "rv_id = 2 and deleted_at is null and show_home = 1", "sort desc, id desc");
												$msgCelebs = "";
												foreach ($celebsReviews as $celebsReview) {
													$imgCelebReview = ($celebsReview['image'] != '') ? $def['upload_review_star'].$celebsReview['image'] : $def['no_image_available'];
													$celebName = $celebsReview["customer_$lng"];
													$contentCeleb = catchuoi(strip_tags($celebsReview["content_$lng"]), 700);
													$msgCelebs .= '<div class="row">';
													$msgCelebs .= '	<div class="col-lg-5"><div style="height: 100%;" class="w-100 position-relative"><div style="border: 1px solid rgb(151, 124, 96);background: rgb(211, 181, 148); width: 90% !important;height: 90%;" class="w-100"><img src="'.$imgCelebReview.'" alt="" style="bottom: 0;right: 0; position: absolute;width: 94% !important;" class="w-100"></div></div></div>';
													$msgCelebs .= '	<div class="col-lg-7 p-5" style="border: 1px solid rgb(151, 124, 96);background: rgb(211, 181, 148);"><div><span class="font-weight-bold text-uppercase">'.$celebName.'</span></div><div class="comment">'.$contentCeleb.'</div></div>';
													$msgCelebs .= '</div>';
												}
												_e($msgCelebs);
											?>
											</div>
										</div>
									</div>
									<?php
										}
										// ĐỐI TÁC CỦA CHÚNG TÔI
										$tablePartner = "partners";
										$checkPartner = $h->checkExist($tablePartner, "deleted_at is null and active = 1 and image != ''");
										if ($checkPartner) {
											$lastPartner = $checkPartner - 1;
											$msgPartner = '<div class="col-12"><div class="row">';
											$msgPartner .= '	<div class="col-12 py-3"><div class="py-3"><span class="text-center py-2 px-4 bg-xlad text-uppercase">'.$lang['our_partner'].'</span></div></div>';
											$msgPartner .= '	<div class="col-12">';
											$partners = $h->getAll("name_vi, name_en, image, url", $tablePartner, "deleted_at is null and active = 1 and image != ''", "sort asc, id asc");
											foreach ($partners as $kp => $partner) {
												$imgPartner = $def['upload_partner'].$partner['image'];
												$linkPartner = (!is_null($partner['url']) && $partner['url'] != '#') ? '<a href="'.$partner['url'].'" title="'.$partner["name_$lng"].'"><img src="'.$imgPartner.'" alt="'.$partner["name_$lng"].'" class="w-70" /></a> ' : '<img src="'.$imgPartner.'" alt="'.$partner["name_$lng"].'" class="w-70" />';
												$msgPartner .= ($kp % 5 == 0) ? '<div class="row mb-4">' : '';
												$msgPartner .= '<div class="col align-items-center text-center">'.$linkPartner.'</div>';
												$msgPartner .= (($kp + 1) % 5 == 0 || $kp == $lastPartner) ? '</div>' : '';
											}
											$msgPartner .= '	</div>';
											$msgPartner .= '</div></div>';
											_e($msgPartner);
										}											
                  ?>
									
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
	</div>
</section>