<?php
	if ($mod1 == $def['link_freview']) {
		$rv_id = $def['rv_id_customer'];
		$titleGroup = $lang['customer_review'];
	} elseif ($mod1 == $def['link_celes_feel']) {
		$rv_id = $def['rv_id_star'];
		$titleGroup = $lang['celebrity_feel'];
	}

	$wh = "rv_id = $rv_id and deleted_at is null";
	$allReviews = $h->getAll('id, customer_vi, customer_en, content_vi, content_en', $tableReview, $wh);
	foreach ($allReviews as $review) {
		$linkCompare = chuoilink($review['customer_vi']).'.html';
		if ($linkCompare == $mod2) {
			$notId = $review['id'];
			$titleReview = $review["customer_$lng"];
			$contentReview = str_replace('src="../', 'src="', $review["content_$lng"]);
			break;
		}
	}
	$whRelated = $wh." and id != $notId";
?>
<!-- content main -->
<section class="content_main">
	<div class="subcontent bglime">
		<div class="row">
			<div class="col-md-12 p-2 text-right text-uppercase">
				<ul class="bread">
				<?php
					$bread = '<li><a href="'.URL.'"><i class="fas fa-home"></i> '.$lang['home'].'</a></li><li>></li><li><a href="'.$lng.'/'.$mod1.'">'.$titleGroup.'</a></li><li>></li><li>'.$titleReview.'</li>';
					_e($bread);
				?>
				</ul>
			</div>
			<!-- sidebar left -->
			<?php 
				include("sidebar_product.php");
			?>
			<!-- end sidebar left -->
			<div class="col-md-9">
				<h1 class="title"><?php _e($titleReview) ?></h1>
				<article class="mt-3 pr-5 text-justify"><?php _e($contentReview) ?></article>

				<div class="img_detail">
					<div class="diverFormSendQuestion"></div>
					<iframe src="https://www.facebook.com/plugins/like.php?href=<?php _e($url) ?>&width=450&layout=standard&action=like&size=large&share=true&height=35&appId=466813710589016" width="450" height="35" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
					<div class="diverFormSendQuestion"></div>
					<div class="fb-comments" data-href="<?php _e($url) ?>" data-width="100%" data-colorscheme="light" data-numposts="5"></div>
          <?php
            $checkRelateReview = $h->checkExist($tableReview, $whRelated);
            if ($checkRelateReview) {
                ?>
					<h2 class="relate_news_title text-uppercase"><?php _e($lang['related_review']) ?></h2>
					<div class="mb-5" id="dataReviewRelated">
          <?php
            } ?>
					<script type="text/javascript">
						var folderUpload = "";
						var wh = "<?php _e($whRelated) ?>";
						var mod1 = "<?php _e($mod1) ?>";
						var link_review_data = "";
						var link_review_related_data = "<?php _e($def['link_review_related_data']) ?>";
					</script>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</section>
<!-- end content main -->