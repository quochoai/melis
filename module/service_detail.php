<!-- content main -->
<?php
	$tableCateService = "categories as c, services as s";
	$tablePrice = "price_tables";
	$getSelect = "s.id as sid, service_id, s.name_vi as sname_vi, s.name_en as sname_en, c.name_vi as cname_vi, c.name_en as cname_en, image_detail, hieuqua_vi, hieuqua_en, nguyenly_vi, nguyenly_en, khtn_vi, khtn_en, uudiem_vi, uudiem_en, tag_vi, tag_en";
	$getSelectPrice = "name_vi, name_en, period, time_period, price, gift_vi, gift_en";
	$whService = "s.deleted_at is null and c.deleted_at is null and s.service_id = c.id";
	$folderUpload = $def['upload_service_detail'];
	$notImage = $def['no_image_available'];
	$service_id = $checkServiceExist = 0;
	if (!isset ($mod2) || $mod2 == '') {
		$service = $h->getOne($getSelect, $tableCateService, $whService, "service_id asc, s.sort asc, s.id asc");
		$idService = $service['sid'];
		$cateName = $service["cname_$lng"];
		$mod2 = chuoilink($service['cname_vi']);
		$serviceName = $service["sname_$lng"];
		$imgService = ($service['image_detail'] != '') ? $folderUpload.$service['image_detail'] : $notImage;
		$hieuqua = $service["hieuqua_$lng"];
		$nguyenly = $service["nguyenly_$lng"];
		$khtn = $service["khtn_$lng"];
		$uudiem = $service["uudiem_$lng"];
		$tags = $service["tag_$lng"];
		$checkServiceExist = 1;
		$service_id = $service['service_id'];
	} else {
		$allCates = $h->getAll("id, name_vi", $tableCate, "deleted_at is null and cate_id = ".$def['cate_id_service'], "sort asc, id desc");
		foreach ($allCates as $cate) {
			$linkCompareCate = chuoilink($cate['name_vi']);
			if ($linkCompareCate == $mod2) {
				$service_id = $cate['id'];
				break;
			}
		}
		if ($service_id != 0) {
			$whService .= " and service_id = $service_id";
			$allServices = $h->getAll($getSelect, $tableCateService, $whService, "s.sort desc, s.id desc");
			foreach ($allServices as $service) {
				$linkCompareService = chuoilink($service['sname_vi']).'.html';
				if ($linkCompareService == $mod3) {
					$checkServiceExist = 1;
					$idService = $service['sid'];
					$cateName = $service["cname_$lng"];
					$mod2 = chuoilink($service['cname_vi']);
					$serviceName = $service["sname_$lng"];
					$imgService = ($service['image_detail'] != '') ? $folderUpload.$service['image_detail'] : $notImage;
					$hieuqua = $service["hieuqua_$lng"];
					$nguyenly = $service["nguyenly_$lng"];
					$khtn = $service["khtn_$lng"];
					$uudiem = $service["uudiem_$lng"];
					$tags = $service["tag_$lng"];
					break;
				}
			}
		}
	}
	if ($service_id != 0 && $checkServiceExist != 0) {
		$whRelated = "deleted_at is null and service_id = $service_id and id != $idService";
		$whPrice = "service_id = $idService and deleted_at is null";
		$checkPrice = $h->checkExist($tablePrice, $whPrice);
		$msgPrice = '<thead>
									<tr class="text-uppercase text-center">
										<th scope="col-md-1">'.$lang['no.'].'</th>
										<th scope="col-md-4">'.$lang['name_service'].'</th>
										<th scope="col-md-1">'.$lang['period'].'</th>
										<th scope="col-md-2">'.$lang['time_period'].'</th>
										<th scope="col-md-2">'.$lang['price_service'].'</th>
										<th scope="col-md-2">'.$lang['gift'].'</th>
									</tr>
								</thead>';
		if ($checkPrice) {
			$allPrices = $h->getAll($getSelectPrice, $tablePrice, $whPrice, "sort asc, id asc");
			$msgPrice .= "<tbody>";
			foreach ($allPrices as $kp => $price) {
				$no = $kp + 1;
				$msgPrice .= '<tr><td scope="row" class="text-center">'.$no.'</td>';
				$msgPrice .= '<td>'.$price["name_$lng"].'</td>';
				$msgPrice .= '<td class="text-center">'.$price['period'].'</td>';
				$msgPrice .= '<td class="text-center">'.$price['time_period'].'</td>';
				$msgPrice .= '<td class="text-center text-success">'.number_format($price['price'], 0, ',', '.').'</td>';
				$msgPrice .= '<td class="text-center">'.$price["gift_$lng"].'</td>';
				$msgPrice .= '</tr>';
			}
			$msgPrice .= "</tbody>";
		}
	}
?>
<section class="content_main">
	<div class="subcontent bglime">
		<div class="row">
			<div class="col-md-12 p-2 text-right text-uppercase">
				<ul class="bread">
					<?php 
						$bread = '<li><a href="'.URL.'"><i class="fas fa-home"></i> '.$lang['home'].'</a></li><li>></li><li>'.$cateName.'</li><li>></li><li>'.$serviceName.'</li>';
						_e($bread);
					?>
				</ul>
			</div>
			<!-- sidebar left -->
			<?php include("module/sidebar_service.php") ?>
			<!-- end sidebar left -->
			<div class="col-md-9">
			<?php 
				if ($service_id != 0 && $checkServiceExist != 0) { ?>
				<h1 class="title_head"><?php _e($serviceName) ?></h1>
				<figure>
					<img src="<?php _e($imgService) ?>" class="img_detail" alt="<?php _e($serviceName) ?>" />
				</figure>
				<div id="accordion" class="img_detail">
					<div class="card">
						<div class="card-header" id="hieuqua">
							<h5 class="mb-0">
								<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									<div class="arrow-btn text-center"><i class="fas fa-chevron-down"></i><i class="fas fa-chevron-right"></i></div> <?php _e($lang['hieuqua']) ?>
								</button>
							</h5>
						</div>
				
						<div id="collapseOne" class="collapse show" aria-labelledby="hieuqua" data-parent="#accordion">
							<div class="card-body"><?php _e($hieuqua) ?></div>
						</div>
					</div>
					<div class="card">
						<div class="card-header" id="nguyenly">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									<div class="arrow-btn text-center"><i class="fas fa-chevron-down"></i><i class="fas fa-chevron-right"></i></div>  
									<?php _e($lang['nguyenly']) ?>
								</button>
							</h5>
						</div>
						<div id="collapseTwo" class="collapse" aria-labelledby="nguyenly" data-parent="#accordion">
							<div class="card-body"><?php _e($nguyenly) ?></div>
						</div>
					</div>
					<div class="card">
						<div class="card-header" id="khachhangtrainghiem">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									<div class="arrow-btn text-center"><i class="fas fa-chevron-down"></i><i class="fas fa-chevron-right"></i></div>
									<?php _e($lang['khachhangtrainghiem']) ?>
								</button>
							</h5>
						</div>
						<div id="collapseThree" class="collapse" aria-labelledby="khachhangtrainghiem" data-parent="#accordion">
							<div class="card-body"><?php _e($khtn) ?></div>
						</div>
					</div>
					<div class="card">
							<div class="card-header" id="uudiem">
								<h5 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
										<div class="arrow-btn text-center"><i class="fas fa-chevron-down"></i><i class="fas fa-chevron-right"></i></div>
										<?php _e($lang['uudiemtaimelis']) ?>
									</button>
								</h5>
							</div>
							<div id="collapseFour" class="collapse" aria-labelledby="uudiem" data-parent="#accordion">
								<div class="card-body"><?php _e($uudiem) ?></div>
							</div>
						</div>
						<!-- 5 -->
						<div class="card">
							<div class="card-header" id="headingTablePrice">
								<h5 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTablePrice" aria-expanded="false" aria-controls="collapseTablePrice">
										<div class="arrow-btn text-center"><i class="fas fa-chevron-down"></i><i class="fas fa-chevron-right"></i></div>
										<?php _e($lang['banggia']) ?>
									</button>
								</h5>
							</div>
							<div id="collapseTablePrice" class="collapse" aria-labelledby="headingTablePrice" data-parent="#accordion">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered table-hover table-striped">
										<?php _e($msgPrice) ?>
										</table>
									</div>
								</div>
							</div>
						</div>
						
						<!-- 7 -->
						<div class="card">
							<div class="card-header" id="regisConsultDeep">
								<h5 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
										<div class="arrow-btn text-center"><i class="fas fa-chevron-down"></i><i class="fas fa-chevron-right"></i></div>
										<?php _e($lang['dangkytuvanchuyensau']) ?>
									</button>
								</h5>
							</div>
							<div id="collapseSeven" class="collapse" aria-labelledby="regisConsultDeep" data-parent="#accordion">
								<div class="card-body">
									<div class="form-send-question">
										<h2 class="header-form-send-question py-3 px-4 text-uppercase"><?php _e($lang['send_question_to_doctor']) ?></h2>
										<div class="px-4 py-3">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for=""><?php _e($lang['fullname_doctor']) ?></label>
														<input class="form-control ifsq" type="text" name="send[fullname]" id="fullname_send" autofocus />
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="">Email</label>
														<input class="form-control ifsq" type="text" name="send[email]" id="email_send" />
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for=""><?php _e($lang['mobilephone']) ?></label>
														<input class="form-control ifsq" type="text" name="send[phone]" id="phone_send" />
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="">Facebook</label>
														<input class="form-control ifsq" type="text" name="send[facebook]" id="facebook_send" />
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label for=""><?php _e($lang['question_doctor']) ?></label>
														<textarea class="form-control ifsq" type="text" name="send[question]" id="question_send" rows="6"></textarea>
													</div>
												</div>
												<div class="col-md-12 justify-content-between">
													<button type="button" class="send-question transition" id="sendQuestion"><i class="fas fa-paper-plane"></i> <?php _e($lang['send']) ?></button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="img_detail">
						<div class="diverFormSendQuestion"></div>
						<iframe src="https://www.facebook.com/plugins/like.php?href=<?php _e($url) ?>&width=450&layout=standard&action=like&size=large&share=true&height=35&appId=466813710589016" width="450" height="35" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
						<?php 
							if ($tags != '') {
								$arrTags = explode(",", $tags);
								$tagMsg = "";
								foreach ($arrTags as $tag) {
									$tagMsg .= "#".trim($tag)." ";
								}
						?>
						<div class="tags"><i class="fa fa-tags" aria-hidden="true"></i> TAGS: <?php _e($tagMsg) ?></div>
						<?php
							} 
						?>
						<div class="diverFormSendQuestion"></div>
						<div class="fb-comments" data-href="<?php _e($url) ?>" data-width="100%" data-colorscheme="light" data-numposts="5"></div>
						<h2 class="relate_news_title text-uppercase"><?php _e($lang['related_news']) ?></h2>
						<div class="mb-5" id="dataServiceRelated"></div>
						<script type="text/javascript">
							var wh = "<?php _e($whRelated) ?>";
							var mod2 = "<?php _e($mod2) ?>";
							var link_service_related_data = "<?php _e($def['link_service_related_data']) ?>";
							var not_email = "<?php _e($lang['not_email']) ?>";
							var not_question = "<?php _e($lang['not_question_doctor']) ?>";
							var sendText = "<?php _e($lang['send']) ?>";
							var send_success = "<?php _e($lang['send_question_to_doctor_success']) ?>";
							var link_process_send_doctor = "<?php _e($def['link_process_send_doctor']) ?>";
						</script>
					</div>
			<?php } else  
				_e('<div class="col-md-12 text-center text-danger">'.$lang['not_data_on_this_page'].'</div>');
			?>
			</div>
		</div>
	</div>
</section>
<!-- end content main -->