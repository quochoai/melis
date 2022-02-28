<!-- Book Calendaer -->
<div class="w-100 position-relative"> <!--  id="content" -->
	<div id="jssor_1" class="jso_2">
		<!-- Loading Screen -->
		<div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
			<img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="assets/img/svg/spin.svg" />
		</div>
		<div data-u="slides" class="jsso_2">
			<?php
				$tableSlider = "sliders";
				$checkSlider = $h->checkExist($tableSlider, "deleted_at is null and active = 1 and hc_id = 1");
				if ($checkSlider) {
						$sliders = $h->getAll("alt_vi, alt_en, url, image", $tableSlider, "deleted_at is null and active = 1 and hc_id = 1", "sort asc, id desc");
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
</div>
<!-- content main -->
<?php
	$tableLanding = 'landings';
	$whLanding = "deleted_at is null and ld_id = ".$def['ld_id_about'];
	$orderLanding = "sort asc, id asc";
	$checkAbout = $h->checkExist($tableLanding, $whLanding);
	$contentMelis = $contentVision = $contentTeam = $contentCommunity = $contentMission = $nameMelis = $nameVision = $nameTeam = $nameCommunity = $nameMission = $imgMelis = $imgVision = $imgTeam = $imgCommunity = $imgMission = $introMelis = $introVision = $introTeam = $introCommunity = $introMission = "";
	$folderUpload = $def['upload_landing_about'];
	if ($checkAbout) {
		$allLandingAbout = $h->getAll("id, name_vi, name_en, image, intro_vi, intro_en, content_vi, content_en", $tableLanding, $whLanding, $orderLanding);
		foreach ($allLandingAbout as $lAbout) {
			if ($lAbout['id'] == 1) {
				$nameMelis = $lAbout["name_$lng"];
				$imgMelis = ($lAbout['image'] != '') ? $folderUpload.$lAbout['image'] : 'assets/img/bg_landing/about_1.jpg';
				$introMelis = $lAbout["intro_$lng"];
				$contentMelis = $lAbout["content_$lng"];
			} elseif ($lAbout['id'] == 2) {
				$nameVision = $lAbout["name_$lng"];
				$imgVision = ($lAbout['image'] != '') ? $folderUpload.$lAbout['image'] : 'assets/img/bg_landing/about_2.jpg';
				$introVision = $lAbout["intro_$lng"];
				$contentVision = $lAbout["content_$lng"];
			} elseif ($lAbout['id'] == 3) {
				$nameMission = $lAbout["name_$lng"];
				$imgMission = ($lAbout['image'] != '') ? $folderUpload.$lAbout['image'] : 'assets/img/bg_landing/about_3.jpg';
				$introMission = $lAbout["intro_$lng"];
				$contentMission = $lAbout["content_$lng"];
			} elseif ($lAbout['id'] == 4) {
				$nameTeam = $lAbout["name_$lng"];
				$imgTeam = ($lAbout['image'] != '') ? $folderUpload.$lAbout['image'] : 'assets/img/bg_landing/about_4.jpg';
				$introTeam = $lAbout["intro_$lng"];
				$contentTeam = $lAbout["content_$lng"];
			} elseif ($lAbout['id'] == 5) {
				$nameCommunity = $lAbout["name_$lng"];
				$imgCommunity = ($lAbout['image'] != '') ? $folderUpload.$lAbout['image'] : 'assets/img/bg_landing/about_5.jpg';
				$introCommunity = $lAbout["intro_$lng"];
				$contentCommunity = $lAbout["content_$lng"];
			}
		}
	}
?>
<section class="content_main marginContent">
	<div class="subcontent bglime">
		<div class="row section_melisspa page-section" id="startup" style="background-image: url(<?php _e($imgMelis) ?>);">
			<div class="col-md-6 c_melis">
				<div class="subc_melis">
					<h2 class="startup text-center color_light_yellow"><?php _e($nameMelis) ?></h2>
					<?php _e($contentMelis) ?>
				</div>
			</div>
			
		</div>
		<!-- vision -->
		<div class="row section_melisspa page-section" id="vision" style="background-image: url(<?php _e($imgVision) ?>);">
			<div class="col-md-11">
				<div class="pt-5 pb-2 text-capitalize color_light_white text-right font_taviraj"><?php _e($introVision) ?></div>
			</div>
			<div class="col-md-4 offset-md-7 col-xs-offset-0 c_vision mb-5">
				<div class="sub_vision">
					<div class="content_vision"><?php _e($contentVision) ?></div>
				</div>
			</div>
		</div>
		<!-- goal -->
		<div class="row section_melisspa" style="background-image: url(<?php _e($imgMission) ?>);">
			<?php
				if ($introMission != '')
					_e('<div class="col-md-11 offset-md-1"><div class="pt-5 pb-2 text-capitalize color_light_white text-left font_taviraj">'.$introMission.'</div></div>');
			?>
			<div class="col-md-4 offset-md-1 col-xs-offset-0 c_vision mb-5 mt-5">
				<div class="sub_vision">
					<div class="content_vision"><?php _e($contentMission) ?></div>
				</div>
			</div>
		</div>
		<!-- team -->
		<div class="row section_melisspa page-section" id="team" style="background-image: url(<?php _e($imgTeam) ?>);">
			<?php
				if ($introTeam != '')
					_e('<div class="col-md-11 offset-md-1"><div class="pt-5 pb-2 text-capitalize color_light_white text-right font_taviraj">'.$introTeam.'</div></div>');
			?>
			<div class="col-md-6 offset-md-6 col-xs-offset-0 c_melis">
				<div class="subc_melis"><?php _e($contentTeam) ?></div>
			</div>                    
		</div>
		<!-- community -->
		<div class="row section_melisspa page-section" id="community" style="background-image: url(<?php _e($imgCommunity) ?>);">
			<?php
				if ($introCommunity != '')
					_e('<div class="col-md-11 offset-md-1"><div class="pt-5 pb-2 text-capitalize color_light_white text-left font_taviraj">'.$introCommunity.'</div></div>');
			?>
			<div class="col-md-6 c_melis">
				<div class="subc_melis"><?php _e($contentCommunity) ?></div>
			</div>                    
		</div>
		<!-- gallery image -->
		<div class="row py-4 mx-4 position-relative page-section" id="gallery_image">
			<h2 class="title_gallery text-uppercase color_light_white py-3 px-5"><?php _e($lang['images_library']) ?></h2>
			<div class="viewall">
				<a class="btn btn-read-more viewall_images text-uppercase">
					<i class="fas fa-plus"></i>&nbsp;<?php _e($lang['view_all']) ?>
				</a>
			</div>
			<div class="col-md-12 mt-4">
				<div class="row">
					<?php
						$tableGalleries = "galleries";
						$whGalImages = "gal_id = ".$def['gal_id_image']." and deleted_at is null";
						$orderGallery = "sort desc, id desc";
						$limitGallery = "limit 0, ".$def['limit_gallery_show'];
						$selectGalleryImage = "id, name_vi, name_en, avatar";
						$folderUploadImage = $def['upload_gallery_image_avatar'];
						$folderUploadVideo = $def['upload_gallery_video_avatar'];
						$notImage = $def['no_image_available'];
						$notIdGalleryImage = [];
						$checkGalImage = $h->checkExist($tableGalleries, $whGalImages);
						if ($checkGalImage) {
							$allGalleryImage = $h->getAll($selectGalleryImage, $tableGalleries, $whGalImages, $orderGallery, $limitGallery);
							$msgGalleryImage = "";
							foreach ($allGalleryImage as $galleryImage) {
								$idGalImage = $galleryImage['id'];
								array_push($notIdGalleryImage, $idGalImage);
								$imgGalleryImage = ($galleryImage['avatar'] != '') ? $folderUploadImage.$galleryImage['avatar'] : $notImage;
								$nameGalleryImage = $galleryImage["name_$lng"];
								$msgGalleryImage .= '<div class="col-md-4 mb-4">';
								$msgGalleryImage .= '	<figure><a class="gallery_image" rel="'.$idGalImage.'"><img src="'.$imgGalleryImage.'" class="w-100 mb-1" alt="'.$nameGalleryImage.'" /></a></figure>';
								$msgGalleryImage .= '	<h4 class="m-0 p-0 color_brown text-capitalize"><a class="gal_text gallery_image" rel="'.$idGalImage.'"><i class="fas fa-images"></i> '.$nameGalleryImage.'</a></h4>';
								$msgGalleryImage .= '</div>';
							}
							_e($msgGalleryImage);
						}
					?>
					
				</div>
				<div class="row d-none" id="viewallimages" >
				<?php
					if ($checkGalImage > $def['limit_gallery_show'] && count($notIdGalleryImage) > 0) {
						$notIdGalleryImageString = implode(",", $notIdGalleryImage);
						$whGalImages .= " and id NOT IN ($notIdGalleryImageString)";
						$allGalleryImageOther = $h->getAll($selectGalleryImage, $tableGalleries, $whGalImages, $orderGallery);
						$msgGalleryImageOther = "";
						foreach ($allGalleryImageOther as $galleryImageOther) {
							$idGalImageOther = $galleryImageOther['id'];
							$imgGalleryImageOther = ($galleryImageOther['avatar'] != '') ? $folderUploadImage.$galleryImageOther['avatar'] : $notImage;
							$nameGalleryImageOther = $galleryImageOther["name_$lng"];
							$msgGalleryImageOther .= '<div class="col-md-4 mb-4">';
							$msgGalleryImageOther .= '	<figure><a class="gallery_image" rel="'.$idGalImageOther.'"><img src="'.$imgGalleryImageOther.'" class="w-100 mb-1" alt="'.$nameGalleryImageOther.'" /></a></figure>';
							$msgGalleryImageOther .= '	<h4 class="m-0 p-0 color_brown text-capitalize"><a class="gal_text gallery_image" rel="'.$idGalImageOther.'"><i class="fas fa-images"></i> '.$nameGalleryImageOther.'</a></h4>';
							$msgGalleryImageOther .= '</div>';
						}
						_e($msgGalleryImageOther);
					}
				?>
				</div>
				<div class="img_gal"></div>
			</div>
		</div>
		<!-- gallery video -->
		<div class="row py-4 mx-4 position-relative page-section" id="gallery_video">
			<h2 class="title_gallery text-uppercase color_light_white py-3 px-5"><?php _e($lang['video_library']) ?></h2>
			<div class="viewall">
				<a class="btn btn-read-more viewall_videos text-uppercase">
					<i class="fas fa-plus"></i>&nbsp;<?php _e($lang['view_all']) ?>
				</a>
			</div>
			<div class="col-md-12 mt-4">
				<div class="row">
				<?php
						$whGalVideo = "gal_id = ".$def['gal_id_video']." and deleted_at is null";
						$selectGalleryVideo = "id, name_vi, name_en, avatar, link_youtube";
						$notImage = $def['no_image_available'];
						$notIdGalleryVideo = [];
						$checkGalVideo = $h->checkExist($tableGalleries, $whGalVideo);
						if ($checkGalVideo) {
							$allGalleryVideo = $h->getAll($selectGalleryVideo, $tableGalleries, $whGalVideo, $orderGallery, $limitGallery);
							$msgGalleryVideo = "";
							foreach ($allGalleryVideo as $galleryVideo) {
								$idGalVideo = $galleryVideo['id'];
								array_push($notIdGalleryVideo, $idGalVideo);
								$imgGalleryVideo = ($galleryVideo['avatar'] != '') ? $folderUploadVideo.$galleryVideo['avatar'] : $notImage;
								$nameGalleryVideo = $galleryVideo["name_$lng"];
								$linkYoutube = $galleryVideo['link_youtube'];
								$msgGalleryVideo .= '<div class="col-md-4 mb-4">';
								$msgGalleryVideo .= '	<figure><a class="popup-youtube" href="'.$linkYoutube.'"><img src="'.$imgGalleryVideo.'" class="w-100 mb-1" alt="'.$nameGalleryVideo.'" /></a></figure>';
								$msgGalleryVideo .= '	<h4 class="m-0 p-0 color_brown text-capitalize"><a class="popup-youtube gal_text" href="'.$linkYoutube.'"><i class="fab fa-youtube"></i> '.$nameGalleryVideo.'</a></h4>';
								$msgGalleryVideo .= '</div>';
							}
							_e($msgGalleryVideo);
						}
					?>
				</div>
				<div class="row d-none" id="viewallvideos">
				<?php
					if ($checkGalVideo > $def['limit_gallery_show'] && count($notIdGalleryVideo) > 0) {
						$notIdGalleryVideoString = implode(",", $notIdGalleryVideo);
						$whGalVideo .= " and id NOT IN ($notIdGalleryVideoString)";
						$allGalleryVideoOther = $h->getAll($selectGalleryVideo, $tableGalleries, $whGalVideo, $orderGallery);
						$msgGalleryVideoOther = "";
						foreach ($allGalleryVideoOther as $galleryVideoOther) {
							$imgGalleryVideoOther = ($galleryVideoOther['avatar'] != '') ? $folderUploadVideo.$galleryVideoOther['avatar'] : $notImage;
							$nameGalleryVideoOther = $galleryVideoOther["name_$lng"];
							$msgGalleryVideoOther .= '<div class="col-md-4 mb-4">';
							$linkYoutubeOther = $galleryVideoOther['link_youtube'];
							$msgGalleryVideoOther .= '	<figure><a class="popup-youtube" href="'.$linkYoutubeOther.'"><img src="'.$nameGalleryVideoOther.'" class="w-100 mb-1" alt="'.$nameGalleryVideoOther.'" /></a></figure>';
							$msgGalleryVideoOther .= '	<h4 class="m-0 p-0 color_brown text-capitalize"><a class="gal_text popup-youtube" href="'.$linkYoutubeOther.'"><i class="fab fa-youtube"></i> '.$nameGalleryVideoOther.'</a></h4>';
							$msgGalleryVideoOther .= '</div>';
						}
						_e($msgGalleryVideoOther);
					}
				?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end content main -->