<?php
	$tableCateProduct = "categories as c, products as p";
	$getSelect = "p.id as pid, product_id, p.name_vi as pname_vi, p.name_en as pname_en, c.name_vi as cname_vi, c.name_en as cname_en, image_detail, uudiem_vi, uudiem_en, thanhphan_vi, thanhphan_en, congdung_vi, congdung_en, hdsd_vi, hdsd_en, khtn_vi, khtn_en, udmuahang_vi, udmuahang_en, tag_vi, tag_en";
	$whProduct = "p.deleted_at is null and c.deleted_at is null and p.product_id = c.id";
	$folderUpload = $def['upload_product_detail'];
	$notImage = $def['no_image_available'];
	$productIdGet = $checkProductExist = 0;
	if (!isset ($mod2) || $mod2 == '') {
		$productGet = $h->getOne($getSelect, $tableCateProduct, $whProduct, "product_id asc, s.sort asc, s.id asc");
		$idProduct = $productGet['pid'];
		$cateName = $productGet["cname_$lng"];
		$mod2 = chuoilink($productGet['cname_vi']);
		$productName = $productGet["pname_$lng"];
		$imgProduct = ($productGet['image_detail'] != '') ? $folderUpload.$productGet['image_detail'] : $notImage;
		$uudiem = $productGet["uudiem_$lng"];
    $thanhphan = $productGet["thanhphan_$lng"];
    $congdung = $productGet["congdung_$lng"];
    $hdsd = $productGet["hdsd_$lng"];
    $khtn = $productGet["khtn_$lng"];
    $udmuahang = $productGet["udmuahang_$lng"];		
		$tags = $productGet["tag_$lng"];
		$checkProductExist = 1;
		$productIdGet = $productGet['product_id'];
	} else {
		$allCateProduct = $h->getAll("id, name_vi", $tableCate, "deleted_at is null and cate_id = ".$def['cate_id_product'], "sort asc, id desc");
		foreach ($allCateProduct as $cateP) {
			$linkCompareCateP = chuoilink($cateP['name_vi']);
			if ($linkCompareCateP == $mod2) {
				$productIdGet = $cateP['id'];
				break;
			}
		}
		if ($productIdGet != 0) {
			$whProduct .= " and product_id = $productIdGet";
			$allProducts = $h->getAll($getSelect, $tableCateProduct, $whProduct, "p.sort asc, p.id asc");
			foreach ($allProducts as $productGet) {
				$linkCompareProduct = chuoilink($productGet['pname_vi']).'.html';
				if ($linkCompareProduct == $mod3) {
					$checkProductExist = 1;
					$idProduct = $productGet['pid'];
					$cateName = $productGet["cname_$lng"];
					$mod2 = chuoilink($productGet['cname_vi']);
					$productName = $productGet["pname_$lng"];
					$imgProduct = ($productGet['image_detail'] != '') ? $folderUpload.$productGet['image_detail'] : $notImage;
					$uudiem = $productGet["uudiem_$lng"];
          $thanhphan = $productGet["thanhphan_$lng"];
          $congdung = $productGet["congdung_$lng"];
          $hdsd = $productGet["hdsd_$lng"];
          $khtn = $productGet["khtn_$lng"];
          $udmuahang = $productGet["udmuahang_$lng"];		
          $tags = $productGet["tag_$lng"];
					break;
				}
			}
		}
	}
?>
<!-- content main -->
<section class="content_main">
    <div class="subcontent bglime">
        <div class="row">
            <div class="col-md-12 p-2 text-right text-uppercase">
                <ul class="bread">
                <?php 
                  $bread = '<li><a href="'.URL.'"><i class="fas fa-home"></i> '.$lang['home'].'</a></li><li>></li><li>'.$cateName.'</li><li>></li><li>'.$productName.'</li>';
                  _e($bread);
                ?>
                </ul>
            </div>
            <!-- sidebar left -->
            <?php include("module/sidebar_product.php") ?>
            <!-- end sidebar left -->
            <div class="col-md-9">
            <?php
              if ($productIdGet != 0 && $checkProductExist != 0) {
                $whRelated = "deleted_at is null and product_id = $productIdGet and id != $idProduct";
            ?>
                <h1 class="title_head"><?php _e($productName) ?></h1>
                <figure>
                    <img src="<?php _e($imgProduct) ?>" class="img_detail" alt="<?php _e($productName) ?>" />
                </figure>
                <div id="accordion" class="img_detail">
                    <div class="card">
                      <div class="card-header" id="uudiem">
                        <h5 class="mb-0">
                          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <div class="arrow-btn text-center"><i class="fas fa-chevron-down"></i><i class="fas fa-chevron-right"></i></div> <?php _e($lang['uudiem']) ?>
                          </button>
                        </h5>
                      </div>
                  
                      <div id="collapseOne" class="collapse show" aria-labelledby="uudiem" data-parent="#accordion">
                        <div class="card-body"><?php _e($uudiem) ?></div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="thanhphan">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <div class="arrow-btn text-center"><i class="fas fa-chevron-down"></i><i class="fas fa-chevron-right"></i></div>  
                            <?php _e($lang['thanhphan']) ?>
                          </button>
                        </h5>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="thanhphan" data-parent="#accordion">
                        <div class="card-body"><?php _e($thanhphan) ?></div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="congdung">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <div class="arrow-btn text-center"><i class="fas fa-chevron-down"></i><i class="fas fa-chevron-right"></i></div>
                            <?php _e($lang['congdung']) ?>
                          </button>
                        </h5>
                      </div>
                      <div id="collapseThree" class="collapse" aria-labelledby="congdung" data-parent="#accordion">
                        <div class="card-body"><?php _e($congdung) ?></div>
                      </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="hdsd">
                          <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                              <div class="arrow-btn text-center"><i class="fas fa-chevron-down"></i><i class="fas fa-chevron-right"></i></div>
                              <?php _e($lang['huongdansudung']) ?>
                            </button>
                          </h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="hdsd" data-parent="#accordion">
                          <div class="card-body"><?php _e($hdsd) ?></div>
                        </div>
                      </div>
                      <!-- 5 -->
                      <div class="card">
                        <div class="card-header" id="khtn">
                          <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                              <div class="arrow-btn text-center"><i class="fas fa-chevron-down"></i><i class="fas fa-chevron-right"></i></div>
                              <?php _e($lang['khachhangtrainghiem']) ?>
                            </button>
                          </h5>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="khtn" data-parent="#accordion">
                          <div class="card-body"><?php _e($khtn) ?></div>
                        </div>
                      </div>
                      <!-- 6 -->
                      <div class="card">
                        <div class="card-header" id="uudiemkhimua">
                          <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                              <div class="arrow-btn text-center"><i class="fas fa-chevron-down"></i><i class="fas fa-chevron-right"></i></div>
                              <?php _e($lang['uudiemkhimuataimelis']) ?>
                            </button>
                          </h5>
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="uudiemkhimua" data-parent="#accordion">
                          <div class="card-body"><?php _e($udmuahang) ?></div>
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
                  <h2 class="relate_news_title text-uppercase"><?php _e($lang['product_relate_text']) ?></h2>
                  <div class="mb-5" id="dataProductRelated">
                  <script type="text/javascript">
                    var wh = "<?php _e($whRelated) ?>";
                    var mod2 = "<?php _e($mod2) ?>";
                    var link_product_related_data = "<?php _e($def['link_product_related_data']) ?>";
                    var not_email = "<?php _e($lang['not_email']) ?>";
                    var not_question = "<?php _e($lang['not_question_doctor']) ?>";
                    var sendText = "<?php _e($lang['send']) ?>";
                    var send_success = "<?php _e($lang['send_question_to_doctor_success']) ?>";
                    var link_process_send_doctor = "<?php _e($def['link_process_send_doctor']) ?>";
                  </script>
                  </div>
                </div>
      <?php } else  
        _e('<div class="col-md-12 text-center text-danger">'.$lang['not_data_on_this_page'].'</div>');
      ?>   
      </div>
    </div>
  </div>
</section>
<!-- end content main -->