<?php
	if ($mod1 == $def['link_freview']) {
		$rv_id = $def['rv_id_customer'];
		$titleGroup = $lang['customer_review'];
		$folderUpload = $def['upload_review_customer'];
	} elseif ($mod1 == $def['link_celes_feel']) {
		$rv_id = $def['rv_id_star'];
		$titleGroup = $lang['celebrity_feel'];
		$folderUpload = $def['upload_review_star'];
	}
?>
<!-- content main -->
<section class="content_main">
	<div class="subcontent bglime">
		<div class="row">
			<div class="col-md-12 p-2 text-right text-uppercase">
				<ul class="bread">
					<?php
						$bread = '<li><a href="'.URL.'"><i class="fas fa-home"></i> '.$lang['home'].'</a></li><li>></li><li>'.$titleGroup.'</li>';
						_e($bread);
					?>
				</ul>
			</div>
			<?php 
				include("sidebar_product.php");
			?>
			<div class="col-md-9">
				<div class="row  mr-4">
				<?php
          $wh = "rv_id = $rv_id and deleted_at is null";
					$checkReview = $h->checkExist($tableReview, $wh);
					if ($checkReview) {
				?>
				<div id="dataReviews" class="row"></div>
				<script type="text/javascript">
					var wh = "<?php _e($wh) ?>";
					var folderUpload = "<?php _e($folderUpload) ?>";
					var mod1 = "<?php _e($mod1) ?>";
					var link_review_data = "<?php _e($def['link_review_data']) ?>";
          var link_review_related_data  = "";
				</script>
				<?php
					} else 
						_e('<div class="col-md-12 text-center text-danger">'.$lang['not_data_on_this_page'].'</div>');
				?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end content main -->