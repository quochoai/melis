<!-- Book Calendaer -->
<div class="w-100 position-relative"> <!--  id="content" -->
	<div id="jssor_1" class="jso_3">
		<!-- Loading Screen -->
		<div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
			<img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="assets/img/svg/spin.svg" />
		</div>
		<div data-u="slides" class="jsso_3">
		<?php
			$tableSlider = "sliders";
			$whSlider = "deleted_at is null and active = 1 and hc_id = ".$def['slider_id_franchise'];
			$checkSlider = $h->checkExist($tableSlider, $whSlider);
			if ($checkSlider) {
				$folderSlider = $def['upload_slider_branch'];
				$sliders = $h->getAll("alt_vi, alt_en, url, image", $tableSlider, $whSlider, "sort asc, id desc");
				$imgSlider = "";
				foreach ($sliders as $slider) {
					$uSlider = trim($slider['url']);
					$iSlider = $folderSlider.$slider['image'];
					$altSlider = $slider["alt_$lng"];
					$linkSlider = ($uSlider != '' && $uSlider != '#') ? '<a href="'.$uSlider.'"><img data-u="image" alt="" src="'.$iSlider.'" alt="'.$altSlider.'" /></a>' : '<img data-u="image" alt="" src="'.$iSlider.'" alt="'.$altSlider.'" />';
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
	<div class="register_consult position-absolute p-4">
		<form action="" method="post">
			<div class="text-center"><label class="text-uppercase title_form color_brown"><?php _e($lang['ff_regisconsult']) ?></label></div>
			<div>
				<label for="fullname" class="pb-0"><?php _e($lang['fullname_doctor']) ?></label>
				<input type="text" id="regisfullname" name="regis[fullname]" class="form-control mb-2 input-regis">
			</div>
			<div class="d-flex">
				<div class="row col-12 p-0 m-0 justify-content-between">
					<div class="col-6 p-0 pr-1">
						<label for="phone"><?php _e($lang['mobilephone']) ?></label>
						<input type="text" id="regisphone" name="regis[phone]" class="form-control mb-2 input-regis">
					</div>
					<div class="col-6 p-0 pl-1">
						<label for="email">Email</label>
						<input type="email" id="regisemail" name="regis[email]" class="form-control mb-2 input-regis">
					</div>
				</div>
			</div>
			<div class="d-flex">
				<div class="row col-12 p-0 m-0 justify-content-between">
					<div class="col-6 p-0 pr-1">
						<label for="province"><?php _e($lang['ff_regisprovince']) ?></label>
						<input type="text" id="regisprovince" name="regis[province]" class="form-control mb-2 input-regis">
					</div>
					<div class="col-6 p-0 pl-1">
						<label for="address"><?php _e($lang['ff_regisaddress']) ?></label>
						<input type="text" id="regisaddress" name="regis[address]" class="form-control mb-2 input-regis">
					</div>
				</div>
			</div>
			<div class="d-flex">
				<div class="row col-12 p-0 m-0 justify-content-between">
					<div class="col-12 pl-0"><label for="matbangdukien"><?php _e($lang['ff_regisflat']) ?></label></div>
					<div class="col-4 p-0 pr-1">
						<select name="regis[front]" id="front" class="form-control mb-2 input-regis">
							<option value="Mặt tiền">Mặt tiền</option>
							<option value="Trong hẻm">Trong hẻm</option>
						</select>
					</div>
					<div class="col-4 p-0 pr-1">
						<input type="number" id="regisarea" name="regis[area]" class="form-control mb-2 input-regis" placeholder="<?php _e($lang['ff_registotalarea']) ?>">
					</div>
					<div class="col-4 p-0 pl-1">
						<input type="number" id="regisfloor" name="regis[floor]" class="form-control mb-2 input-regis" placeholder="<?php _e($lang['ff_regisnumberoffloors']) ?>">
					</div>
				</div>
			</div>
			<div class="d-flex">
				<div class="row col-12 p-0 m-0 justify-content-between">
					<div class="col-6 p-0 pr-1">
						<label for="province"><?php _e($lang['ff_regisexperience']) ?></label>
						<select name="regis[experience]" id="experience" class="form-control mb-2 input-regis">
							<option value="Có"><?php _e($lang['ff_yes']) ?></option>
							<option value="Trong hẻm"><?php _e($lang['ff_no']) ?></option>
						</select>
					</div>
					<div class="col-6 p-0 pl-1">
						<label for="address"><?php _e($lang['ff_regisestimatedinvestment']) ?></label>
						<select name="regis[investment]" id="investment" class="form-control mb-2 input-regis">
							<option value="Dưới 1 tỷ"><?php _e($lang['ff_investlower1']) ?></option>
							<option value="1 - 2 tỷ"><?php _e($lang['ff_invest1to2']) ?></option>
							<option value="2 - 3 tỷ"><?php _e($lang['ff_invest2to3']) ?></option>
							<option value="Trên 3 tỷ"><?php _e($lang['ff_investover3']) ?></option>
						</select>
					</div>
				</div>
			</div>
			<div class="d-flex">
				<div class="row col-12 p-0 m-0 justify-content-between">
					<div class="col-12"><label for="matbangdukien">Captcha</label></div>
					<div class="col-4 p-0 pr-1">
						<input type="text" id="regiscaptcha" name="regis[captcha]" class="form-control mb-2 input-regis">
					</div>
					<div class="col-2 p-0 pr-1">
						<summary class="input-regis form-control" id="img-captcha"><?php include("module/captcha.php") ?></summary>
					</div>
					<div class="col-6 p-0 pl-1">
						<button type="button" class="btn btn-regis text-uppercase" id="regisnow"><?php _e($lang['ff_regisnow']) ?></button>
					</div>
				</div>
			</div>
			
		</form>
	</div>
	<!-- end form tu van -->
	<!-- information about benefit -->
	<div class="information_benefit position-absolute">
		<div class="c_info">
			<div class="subc_info">
				<div class="content_info">
					<div class="info_1 text-uppercase text-center"><?php _e($lang['ff_highprofitrate']) ?></div>
					<hr class="hr" />
					<div class="info_1 text-uppercase text-center"><?php _e($lang['ff_quickrefundopportunity']) ?></div>
					<hr class="hr" />
					<div class="info_2 text-uppercase text-center"><?php _e($lang['ff_from36months']) ?></div>
					<hr class="hr" />
					<div class="info_1 text-uppercase text-center"><?php _e($lang['ff_giftcash']) ?></div>
				</div>
			</div>
		</div>
	</div>
	<!-- end information -->
</div>
<!-- content main -->
<section class="content_main">
	<div class="subcontent bglime">
		<div class="row section_melisspa page-section" id="whychoose">
			<h2 class="whytext text-center color_brown w-100 text-uppercase"><?php _e($lang['ff_whychoose']) ?></h2>
			<div class="w-100"><hr class="hrw" /></div>
			<div class="col-md-3 mt-4 wm">
				<figure class="text-center">
					<img src="assets/img/bg_landing/wm_cash.png" />
				</figure>
				<h4 class="text-uppercase color_brown text-center"><?php _e($lang['ff_scost']) ?></h4>
				<p class="text-center color_brown"><?php _e($lang['ff_totalinvest']) ?></p>
			</div>
			<div class="col-md-3 mt-4 wm">
				<figure class="text-center">
					<img src="assets/img/bg_landing/wm_cashback.png" />
				</figure>
				<h4 class="text-uppercase color_brown text-center"><?php _e($lang['ff_quickrefund']) ?></h4>
				<p class="text-center color_brown"><?php _e($lang['ff_introquickrefund']) ?></p>
			</div>
			<div class="col-md-3 mt-4 wm">
				<figure class="text-center">
					<img src="assets/img/bg_landing/wm_logo.png" />
				</figure>
				<h4 class="text-uppercase color_brown text-center"><?php _e($lang['ff_strongbrand']) ?></h4>
				<p class="text-center color_brown"><?php _e($lang['ff_introstrongbrand']) ?></p>
			</div>
			<div class="col-md-3 mt-4 wm">
				<figure class="text-center">
					<img src="assets/img/bg_landing/wm_support.png" />
				</figure>
				<h4 class="text-uppercase color_brown text-center"><?php _e($lang['ff_maxsupport']) ?></h4>
				<p class="text-center color_brown"><?php _e($lang['ff_intromaxsupport']) ?></p>
			</div>
			<?php
				$videoOne = $h->getById("noidung_vi", $tableHtml, 12);
				if ($videoOne['noidung_vi'] != '')
					_e('<div class="col-md-10 offset-md-1 offset-xs-0 my-4">
					<iframe width="100%" height="450" src="'.$videoOne['noidung_vi'].'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>');
			?>
			
		</div>
		<?php
			$tableLanding = 'landings';
			$whLanding = "deleted_at is null and ld_id = ".$def['ld_id_franchise'];
			$orderLanding = "sort asc, id asc";
			$checkFranchise = $h->checkExist($tableLanding, $whLanding);
			$contentWhy = $contentBenefit = $contentCost = $introWhy = $introBenefit = $introCost = $imgWhy = $imgBenefit = $imgCost = $nameWhy = $nameBenefit = $nameCost = $activeWhy = $activeBenefit = $activeCost = "";
			$folderUpload = $def['upload_landing_branch'];
			if ($checkFranchise) {
				$allLandingFranchise = $h->getAll("id, active, name_vi, name_en, image, intro_vi, intro_en, content_vi, content_en", $tableLanding, $whLanding, $orderLanding);
				foreach ($allLandingFranchise as $lFranchise) {
					if ($lFranchise['id'] == 6) {
						$nameWhy = $lFranchise["name_$lng"];
						$imgWhy = ($lFranchise['image'] != '') ? $folderUpload.$lFranchise['image'] : 'assets/img/bg_landing/about_3.jpg';
						$introWhy = $lFranchise["intro_$lng"];
						$contentWhy = $lFranchise["content_$lng"];
						$activeWhy = $lFranchise['active'];
					} elseif ($lFranchise['id'] == 7) {
						$nameBenefit = $lFranchise["name_$lng"];
						$imgBenefit = ($lFranchise['image'] != '') ? $folderUpload.$lFranchise['image'] : 'assets/img/bg_landing/about_4.jpg';
						$introBenefit = $lFranchise["intro_$lng"];
						$contentBenefit = $lFranchise["content_$lng"];
						$activeBenefit = $lFranchise['active'];
					} elseif ($lFranchise['id'] == 8) {
						$nameCost = $lFranchise["name_$lng"];
						$imgCost = ($lFranchise['image'] != '') ? $folderUpload.$lFranchise['image'] : 'assets/img/bg_landing/about_5.jpg';
						$introCost = $lFranchise["intro_$lng"];
						$contentCost = $lFranchise["content_$lng"];
						$activeCost = $lFranchise['active'];
					}
				}
			}
		?>
		<!-- advantage -->
		<div class="row section_melisspa page-section" id="advantage" style="background-image: url(<?php _e($imgWhy) ?>);">
			<div class="col-md-4 offset-md-1 col-xs-offset-0 c_vision mb-5 mt-5">
				<div class="sub_vision">
					<div class="content_vision"><?php _e($contentWhy) ?></div>
				</div>
			</div>
		</div>
		<!-- benefit -->
		<div class="row section_melisspa page-section" id="benefit" style="background-image: url(<?php _e($imgBenefit) ?>);">
			<div class="col-md-4 offset-md-7 col-xs-offset-0 c_vision mb-5 mt-5">
				<div class="sub_vision">
					<div class="content_vision"><?php _e($contentBenefit) ?></div>
				</div>
			</div>
		</div>
		<!-- cost -->
		<div class="row section_melisspa page-section" id="cost" style="background-image: url(<?php _e($imgCost) ?>);">
			<div class="col-md-6 c_melis ml-3 mt-4 mb-4">
				<div class="subc_cost">
					<div class="ctcost"><?php _e(str_replace("<p>", '<p><i class="fas fa-dollar-sign"></i> ',$contentCost)) ?></div>
				</div>
			</div>                    
		</div>
		<!-- request -->
		<div class="section_request page-section pb-4" id="request">
			<div class="row w-80 m-auto">
				<h2 class="whytext text-center color_light_white w-100 text-uppercase"><?php _e($lang['ff_requestpartner']) ?></h2>
				<div class="w-100"><hr class="hrwr" /></div>
				<div class="col-md-12 text-center color_light_white"><?php _e($lang['ff_introrequestpartner']) ?></div>
				<div class="col-md-4 mt-4 wm">
					<div class="text-center wm-icon color_light_white">
						<i class="fas fa-map-marker-alt"></i>
					</div>
					<h4 class="text-uppercase color_light_white text-center"><?php _e($lang['ff_potentiallocation']) ?></h4>
				</div>
				<div class="col-md-4 mt-4 wm">
					<div class="text-center wm-icon color_light_white">
						<i class="fas fa-home"></i>
					</div>
					<h4 class="text-uppercase color_light_white text-center"><?php _e($lang['ff_optimalground']) ?></h4>
				</div>
				<div class="col-md-4 mt-4 wm">
					<div class="text-center wm-icon color_light_white">
						<i class="fas fa-dollar-sign"></i>
					</div>
					<h4 class="text-uppercase color_light_white text-center"><?php _e($lang['ff_suitablefinance']) ?></h4>
				</div>   
			</div>        
		</div>
		<!-- procedure -->
		<div class="row section_procedure page-section" id="procedure">
			<div class="col-md-12 color_brown px-0 mb-4">
				<h3 class="title_procedure"><?php _e($lang['ff_tprocedure']) ?></h3>
				<hr class="hrp" /> 
			</div>
			<div class="col-md-3 mb-3">
				<div class="eachprocedure contact">
					<h4><?php _e($lang['ff_step1']) ?></h4>
					<p><?php _e($lang['ff_step1intro']) ?></p>
				</div>
			</div>
			<div class="col-md-3 mb-3">
				<div class="eachprocedure info">
					<h4><?php _e($lang['ff_step2']) ?></h4>
					<p><?php _e($lang['ff_step2intro']) ?></p>
				</div>
			</div>
			<div class="col-md-3 mb-3">
				<div class="eachprocedure consult">
					<h4><?php _e($lang['ff_step3']) ?></h4>
					<p><?php _e($lang['ff_step3intro']) ?></p>
				</div>
			</div>
			<div class="col-md-3 mb-3">
				<div class="eachprocedure survey">
					<h4><?php _e($lang['ff_step4']) ?></h4>
					<p><?php _e($lang['ff_step4intro']) ?></p>
				</div>
			</div>
			<div class="col-md-3 mb-3">
				<div class="eachprocedure contract">
					<h4><?php _e($lang['ff_step5']) ?></h4>
					<p><?php _e($lang['ff_step5intro']) ?></p>
				</div>
			</div>
			<div class="col-md-3 mb-3">
				<div class="eachprocedure setup">
					<h4><?php _e($lang['ff_step6']) ?></h4>
					<p><?php _e($lang['ff_step6intro']) ?></p>
				</div>
			</div>
			<div class="col-md-3 mb-3">
				<div class="eachprocedure operate">
					<h4><?php _e($lang['ff_step7']) ?></h4>
					<p><?php _e($lang['ff_step7intro']) ?></p>
				</div>
			</div>
		</div>
		<!-- register -->
		<div class="row section_register page-section" id="register" style="background-image: url(assets/img/bg_landing/bg_branch_register.jpeg);">
			<div class="col-md-6 c_register mx-auto mt-4 mb-4">
				<h2 class="title_register text-uppercase text-center color_light_white"><?php _e($lang['register_join']) ?></h2>
				<p class="tip_register my-2"><?php _e($lang['intro_register_join']) ?></p>
				<!--form tu van-->
				<div class="register_form p-4">
					<form action="" method="post">
						<div class="text-center"><label class="text-uppercase title_form color_brown"><?php _e($lang['ff_regisconsult']) ?></label></div>
						<div>
							<label for="fullname" class="pb-0"><?php _e($lang['fullname_doctor']) ?></label>
							<input type="text" id="regisfullname1" name="regis[fullname]" class="form-control mb-2 input-regis">
						</div>
						<div class="d-flex">
							<div class="row col-12 p-0 m-0 justify-content-between">
								<div class="col-6 p-0 pr-1">
									<label for="phone"><?php _e($lang['mobilephone']) ?></label>
									<input type="text" id="regisphone1" name="regis[phone]" class="form-control mb-2 input-regis">
								</div>
								<div class="col-6 p-0 pl-1">
									<label for="email">Email</label>
									<input type="email" id="regisemail1" name="regis[email]" class="form-control mb-2 input-regis">
								</div>
							</div>
						</div>
						<div class="d-flex">
							<div class="row col-12 p-0 m-0 justify-content-between">
								<div class="col-6 p-0 pr-1">
									<label for="province"><?php _e($lang['ff_regisprovince']) ?></label>
									<input type="text" id="regisprovince1" name="regis[province]" class="form-control mb-2 input-regis">
								</div>
								<div class="col-6 p-0 pl-1">
									<label for="address"><?php _e($lang['ff_regisaddress']) ?></label>
									<input type="text" id="regisaddress1" name="regis[address]" class="form-control mb-2 input-regis">
								</div>
							</div>
						</div>
						<div class="d-flex">
							<div class="row col-12 p-0 m-0 justify-content-between">
								<div class="col-12"><label for="matbangdukien"><?php _e($lang['ff_regisflat']) ?></label></div>
								<div class="col-4 p-0 pr-1">
									<select name="regis[front]" id="front1" class="form-control mb-2 input-regis">
										<option value="Mặt tiền">Mặt tiền</option>
										<option value="Trong hẻm">Trong hẻm</option>
									</select>
								</div>
								<div class="col-4 p-0 pr-1">
									<input type="number" id="regisarea1" name="regis[area]" class="form-control mb-2 input-regis" placeholder="<?php _e($lang['ff_registotalarea']) ?>">
								</div>
								<div class="col-4 p-0 pl-1">
									<input type="number" id="regisfloor1" name="regis[floor]" class="form-control mb-2 input-regis" placeholder="<?php _e($lang['ff_regisnumberoffloors']) ?>">
								</div>
							</div>
						</div>
						<div class="d-flex">
							<div class="row col-12 p-0 m-0 justify-content-between">
								<div class="col-6 p-0 pr-1">
									<label for="province"><?php _e($lang['ff_regisexperience']) ?></label>
									<select name="regis[experience]" id="experience1" class="form-control mb-2 input-regis">
										<option value="Có"><?php _e($lang['ff_yes']) ?></option>
										<option value="Không"><?php _e($lang['ff_no']) ?></option>
									</select>
								</div>
								<div class="col-6 p-0 pl-1">
									<label for="address"><?php _e($lang['ff_regisestimatedinvestment']) ?></label>
									<select name="regis[investment]" id="investment1" class="form-control mb-2 input-regis">
										<option value="Dưới 1 tỷ"><?php _e($lang['ff_investlower1']) ?></option>
										<option value="1 - 2 tỷ"><?php _e($lang['ff_invest1to2']) ?></option>
										<option value="2 - 3 tỷ"><?php _e($lang['ff_invest2to3']) ?></option>
										<option value="Trên 3 tỷ"><?php _e($lang['ff_investover3']) ?></option>
									</select>
								</div>
							</div>
						</div>
						<div class="d-flex">
							<div class="row col-12 p-0 m-0 justify-content-between">
								<div class="col-12"><label for="matbangdukien">Captcha</label></div>
								<div class="col-4 p-0 pr-1">
									<input type="text" id="regiscaptcha1" name="regis[captcha]" class="form-control mb-2 input-regis">
								</div>
								<div class="col-2 p-0 pr-1">
									<summary class="input-regis form-control" id="img-captchaa"><?php include("module/captcha2.php") ?></summary>
								</div>
								<div class="col-6 p-0 pl-1">
									<button type="button" class="btn btn-regis text-uppercase" id="regisnow1"><?php _e($lang['ff_regisnow']) ?></button>
								</div>
							</div>
						</div>
						
					</form>
				</div>
				<!-- end form tu van -->
			</div>                    
		</div>
	</div>
</section>
<!-- end content main -->