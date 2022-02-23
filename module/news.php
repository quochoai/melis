<?php
	if ($mod1 == $def['link_fnews']) {
		$news_id = $def['news_id_news'];
		$titleGroup = $lang['n_news'];
		$folderUpload = $def['upload_news'];
	} elseif ($mod1 == $def['link_fknowledge']) {
		$news_id = $def['news_id_knowledge'];
		$titleGroup = $lang['n_knowledge'];
		$folderUpload = $def['upload_knowledge'];
	} elseif ($mod1 == $def['link_fpromotion']) {
		$news_id = $def['news_id_promotion'];
		$titleGroup = $lang['n_promotion'];
		$folderUpload = $def['upload_promotion'];
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
					$checkNews1 = $h->checkExist($tableNews, "news_id = $news_id and deleted_at is null");
					$notId = "";
					$msgNews1 = "";
					if ($checkNews1) {
						$news1 = $h->getOne("id, name_vi, name_en, image, scontent_vi, scontent_en", $tableNews, "news_id = $news_id and deleted_at is null", "sort desc, id desc");
						$notId = $news1['id'];
						$nameNews1 = $news1["name_$lng"];
						$linkNews1 = $lng.'/'.$mod1.'/'.chuoilink($news1['name_vi']).'.html';
						$imgNews1 = ($news1['image'] != '') ? $folderUpload.$news1['image'] : $def['no_image_available'];
						$scontentNews1 = $news1["scontent_$lng"];
						$msgNews1 .= '<div class="col-md-6 mb-3"><a href="'.$linkNews1.'" title="'.$nameNews1.'"><figure><img src="'.$imgNews1.'" class="w-100" alt="'.$nameNews1.'" /></figure></a></div>';
						$msgNews1 .= '<div class="col-md-6 mb-3"><h3 class="text-uppercase title_news"><a href="'.$linkNews1.'">'.$nameNews1.'</a></h3><p>'.$scontentNews1.'</p></div>';

						// check news 2
						$checkNews2 = $h->checkExist($tableNews, "news_id = $news_id and deleted_at is null and id != $notId");
						if ($checkNews2) {
							$news2 = $h->getAll("id, name_vi, name_en, image", $tableNews, "news_id = $news_id and deleted_at is null and id != $notId", "sort desc, id desc", "limit 0, 3");
							foreach ($news2 as $news22) {
								$notId .= ",".$news22['id'];
								$nameNews2 = $news22["name_$lng"];
								$linkNews2 = $lng.'/'.$mod1.'/'.chuoilink($news22['name_vi']).'.html';
								$imgNews2 = ($news22['image'] != '') ? $folderUpload.$news22['image'] : $def['no_image_available'];
								$msgNews1 .= '<div class="col-md-4 mb-3 three_news"><a href="'.$linkNews2.'" title="'.$nameNews2.'"><figure><img src="'.$imgNews2.'" class="w-100 imgnews" alt="'.$nameNews2.'" /></figure></a><h5 class="pt-0 title_news2 text-uppercase"><a href="'.$linkNews2.'" title="'.$nameNews2.'">'.$nameNews2.'</a></h5></div>';
							}
						}
						_e($msgNews1);
				?>
				<div id="datanews" class="row"></div>
				<script type="text/javascript">
					var notId = "<?php _e($notId) ?>";
					var news_id = <?php _e($news_id) ?>;
					var folderUpload = "<?php _e($folderUpload) ?>";
					var mod1 = "<?php _e($mod1) ?>";
					var link_news_data = "<?php _e($def['link_news_data']) ?>";
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