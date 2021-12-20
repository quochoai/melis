<?php
  include("require_inc.php");
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
								<a href="<?php _e($lang['link_freview']) ?>" class="btn btn-read-more"><i class="fas fa-plus"></i> <?php _e($lang['view_all']) ?></a>
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
      _e($checkCustomerReview . ' / '. $countCustomerReview);
      foreach ($customerReviews as $kv => $customerReview) {
          $imgCustomerReview = ($customerReview['image'] == '') ? $def['no_image_available'] : $def['upload_review_customer'].$customerReview['image'];
          $customerName = $customerReview["customer_$lng"];
          $shortCustomerReview = catchuoi(strip_tags($customerReview["content_$lng"]), 200);
          $eachCustomerReview = '<div class="p-3 bg-frame position-relative w-100 h-100" style="min-height: 201px; background-image: url(assets/img/frames-comments.png);"><div class="description px-5">'.$shortCustomerReview.'</div><div class="infomation-customer"><div class="position-absolute w-75 d-flex align-items-center"><div class="row p-0 m-0 w-100 align-items-center"><div class="avt col-4"><figure><img src="'.$imgCustomerReview.'" alt="'.$customerName.'" class="img-avt-customer"></figure></div><div class="name">'.$customerName.'</div></div></div></div></div>';

          if ($countCustomerReview >= 4 && $countCustomerReview % 4 == 0) {
              if ($kv % 2 == 0) {
                  $msgCustomerReview .= '<div class="py-4 my-3">';
              }
              $msgCustomerReview .= $kv . $eachCustomerReview;
              if ($kv % 2 != 0) {
                  $msgCustomerReview .= '</div>';
              }
          } elseif ($countCustomerReview > 4 && $countCustomerReview % 4 != 0) {
              if ($countCustomerReview > 12) {
                  if ($kv >= 0 && $kv < 12) {
                      if ($kv % 2 == 0) {
                          $msgCustomerReview .= '<div class="py-4 my-3">';
                      }
                      $msgCustomerReview .= $eachCustomerReview;
                      if ($kv % 2 != 0) {
                          $msgCustomerReview .= '</div>';
                      }
                  } else {
                      if ($countCustomerReview == 13 || $countCustomerReview == 14) {
                          $msgCustomerReview .= '<div class="py-4 my-3">';
                          $msgCustomerReview .= $eachCustomerReview;
                          $msgCustomerReview .= '</div>';
                      } else {
                          if ($kv == 12 || $kv == 14) {
                              $msgCustomerReview .= '<div class="py-4 my-3">';
                          }
                          $msgCustomerReview .= $eachCustomerReview;
                          if ($kv == 13 || $kv == 14) {
                              $msgCustomerReview .= '</div>';
                          }
                      }
                  }
              } elseif ($countCustomerReview > 8) {
                  if ($kv >= 0 && $kv < 8) {
                      if ($kv % 2 == 0) {
                          $msgCustomerReview .= '<div class="py-4 my-3">';
                      }
                      $msgCustomerReview .= $eachCustomerReview;
                      if ($kv % 2 != 0) {
                          $msgCustomerReview .= '</div>';
                      }
                  } else {
                      if ($countCustomerReview == 8 || $countCustomerReview == 9) {
                          $msgCustomerReview .= '<div class="py-4 my-3">';
                          $msgCustomerReview .= $eachCustomerReview;
                          $msgCustomerReview .= '</div>';
                      } else {
                          if ($kv == 8 || $kv == 10) {
                              $msgCustomerReview .= '<div class="py-4 my-3">';
                          }
                          $msgCustomerReview .= $eachCustomerReview;
                          if ($kv == 9 || $kv == 10) {
                              $msgCustomerReview .= '</div>';
                          }
                      }
                  }
              } else {
                  if ($kv >= 0 && $kv < 4) {
                      if ($kv % 2 == 0) {
                          $msgCustomerReview .= '<div class="py-4 my-3">';
                      }
                      $msgCustomerReview .= $eachCustomerReview;
                      if ($kv % 2 != 0) {
                          $msgCustomerReview .= '</div>';
                      }
                  } else {
                      if ($countCustomerReview == 5 || $countCustomerReview == 6) {
                          $msgCustomerReview .= '<div class="py-4 my-3">';
                          $msgCustomerReview .= $eachCustomerReview;
                          $msgCustomerReview .= '</div>';
                      } else {
                          if ($kv == 4 || $kv == 6) {
                              $msgCustomerReview .= '<div class="py-4 my-3">';
                          }
                          $msgCustomerReview .= $eachCustomerReview;
                          if ($kv == 5 || $kv == 6) {
                              $msgCustomerReview .= '</div>';
                          }
                      }
                  }
              }
          } elseif ($countCustomerReview < 4) {
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
      _e($msgCustomerReview); ?>
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
  }
  /*
  function cutWords ($string, $from, $length) {
		$arrayString = explode(" ", $string);
		$lengthString = count($arrayString);
		$newString = "";
		if ($lengthString <= $length)
			$newString = $string;
		else
			$newstring = implode(" ", array_slice($arrayString, $from, $length));
		return $newString;
	}
	$str = "Cảm nhận khách hàng 4 Cảm nhận khách hàng 4 Cảm nhận khách hàng 4 Cảm nhận khách hàng 4 Cảm nhận khách hàng 4 Cảm nhận khách hàng 4 Cảm nhận khách hàng 4 Cảm nhận khách hàng 4 Cảm nhận khách hàng 4 Cảm nhận khách hàng 4 Cảm nhận khách hàng 4 ";
	$string = cutWords($str, 0, 20);
	echo $string;
    */    
