<?php
	if ($mod1 == $def['link_fnews']) {
		$news_id = $def['news_id_news'];
		$titleGroup = $lang['n_news'];
	} elseif ($mod1 == $def['link_fknowledge']) {
		$news_id = $def['news_id_knowledge'];
		$titleGroup = $lang['n_knowledge'];
	} elseif ($mod1 == $def['link_fpromotion']) {
		$news_id = $def['news_id_promotion'];
		$titleGroup = $lang['n_promotion'];
	}
	$wh = "news_id = $news_id and deleted_at is null";
	$allNews = $h->getAll('id, name_vi, name_en, content_vi, content_en, tag_vi, tag_en, post_date', $tableNews, $wh);
	foreach ($allNews as $news) {
		$linkCompare = chuoilink($news['name_vi']).'.html';
		if ($linkCompare == $mod2) {
			$notId = $news['id'];
			$titleNews = $news["name_$lng"];
			$contentNews = str_replace('src="../', 'src="', $news["content_$lng"]);
			$tagNews = $news["tag_$lng"];
			$pD = strtotime($news['post_date']);
			if ($lng == $def['lang_en'])
				$postDate = date("l, m/d/Y H:i", $pD).' (GMT+7)';
			else {
				$weekDay = getDayWeekVietnam($pD);
				$postDate = $weekDay.date("d/m/Y H:i", $pD).' (GMT+7)';
			}
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
					$bread = '<li><a href="'.URL.'"><i class="fas fa-home"></i> '.$lang['home'].'</a></li><li>></li><li><a href="'.$lng.'/'.$mod1.'">'.$titleGroup.'</a></li><li>></li><li>'.$titleNews.'</li>';
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
				<h1 class="title"><?php _e($titleNews) ?></h1>
				<small class="text-italic"><?php _e($postDate) ?></small>
				<article class="mt-3 pr-5 text-justify"><?php _e($contentNews) ?></article>

				<div class="img_detail">
					<div class="diverFormSendQuestion"></div>
					<iframe src="https://www.facebook.com/plugins/like.php?href=<?php _e($url) ?>&width=450&layout=standard&action=like&size=large&share=true&height=35&appId=466813710589016" width="450" height="35" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
					<?php 
            if ($tagNews != '') {
							$arrTags = explode(",", $tagNews);
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
					<div class="mb-5" id="dataNewsRelated">
					<script type="text/javascript">
						var notId = "<?php _e($notId) ?>";
						var news_id = "";
						var folderUpload = "";
						var wh = "<?php _e($whRelated) ?>";
						var mod1 = "<?php _e($mod1) ?>";
						var link_news_data = "<?php _e($def['link_news_data']) ?>";
						var link_news_related_data = "<?php _e($def['link_news_related_data']) ?>";
					</script>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</section>
<!-- end content main -->