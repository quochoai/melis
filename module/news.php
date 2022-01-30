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
					if ($checkNews1) {
						$news1 = $h->getOne("id, name_vi, name_en, image, scontent_vi, scontent_en", $tableNews, "news_id = $news_id and deleted_at is null", "sort desc, id desc");
						$nameNews1 = $news1["name_$lng"];
						$linkNews1 = $lng.'/'.$mod1.'/'.chuoilink($news1['name_vi']).'.html';
						$imgNews1 = ($news1['image'] != '') ? $folderUpload.$news1['image'] : $def['no_image_available'];
						$scontentNews1 = $news1["scontent_$lng"];

					}
				?>
				  <div class="col-md-6 mb-3">
					<a href="#">
					  <figure>
						<img src="img/product/img_product.jpg" class="w-100" alt="" />
					  </figure>
					</a>
				  </div>
				  <div class="col-md-6 mb-3">
					<h3 class="text-uppercase title_news"><a href="#">Đắk Lắk, Gia Lai lên phương án hỗ trợ hàng vạn lao động trở lại các tỉnh phía Nam</a></h3>
					<p>UBND tỉnh Đắk Lắk vừa có công văn về việc hỗ trợ, tạo điều kiện cho người dân trở lại các tỉnh phía Nam làm việc. Trong khi đó, tỉnh Gia Lai đã chi hỗ trợ 36 tỷ đồng đối với số lao động không có hợp đồng nhằm đảm bảo an sinh xã hội cho người dân.</p>
				  </div>

				  <div class="col-md-4 mb-3">
					<a href="#"><figure><img src="https://www.choque123.com/upload/tintuc/ga-xe-phay.jpg" class="w-100 imgnews" alt="" /></figure></a>
					<h4 class="pt-0 title_news2 text-uppercase"><a href="#">Cách làm gà xé phay</a></h4>
				  </div>
				  <div class="col-md-4 mb-3">
					<a href="#"><figure><img src="https://www.choque123.com/upload/tintuc/ca-thu-chien-nuoc-mam-toi-ot-01.jpg" class="w-100 imgnews" alt="" /></figure></a>
					<h4 class="pt-0 title_news2 text-uppercase"><a href="#">Cách làm cá thu chiên mắm tỏi ớt</a></h4>
				  </div>
				  <div class="col-md-4 mb-3">
					<a href="#"><figure><img src="https://www.choque123.com/upload/tintuc/vit-nau-chao.jpg" class="w-100 imgnews" alt="" /></figure></a>
					<h4 class="pt-0 title_news2 text-uppercase"><a href="#">CÁCH NẤU VỊT NẤU CHAO</a></h4>
				  </div>
				  <div id="datanews" class="row">
					<div class="col-md-4 mb-3">
					  <a href="#"><figure><img src="https://www.choque123.com/upload/tintuc/muc-xa-dai-duong-nuong-sa-te.jpg" class="w-100" alt="Cách làm mực xà Đại Dương nướng xa tế - Chợ Quê 123" /></figure></a>
					</div>
					<div class="col-md-8 mb-3">
					  <h3 class="text-uppercase title_news3"><a href="#">Cách làm mực xà Đại Dương nướng xa tế - Chợ Quê 123</a></h3>
					  <small>Thứ hai, 08/11/2021 17:05 PM (GMT+7)</small>
					  <p class="text-justify">Mực đại dương (hay mực lá đại dương) được đánh bắt trực tiếp từ biển, nặng từ 3-10 kg, thân to, bè như chiếc lá, thịt dày trắng, bên ngoài có màu đỏ cánh gián. Về độ ngọt thịt thì mực lá được xếp hạng là một trong những loại mực ngon nhất, trên cả mực ống, mực nang, mực trứng hay bạch tuộc.</p>
					</div>
					<div class="col-md-4 mb-3">
					  <a href="#"><figure><img src="https://www.choque123.com/upload/tintuc/muc-xa-dai-duong-nuong-sa-te.jpg" class="w-100" alt="" /></figure></a>
					</div>
					<div class="col-md-8 mb-3">
					  <h3 class="text-uppercase title_news3"><a href="#">Cách làm mực xà Đại Dương nướng xa tế - Chợ Quê 123</a></h3>
					  <small>Thứ hai, 08/11/2021 17:05 PM (GMT+7)</small>
					  <p class="text-justify">Mực đại dương (hay mực lá đại dương) được đánh bắt trực tiếp từ biển, nặng từ 3-10 kg, thân to, bè như chiếc lá, thịt dày trắng, bên ngoài có màu đỏ cánh gián. Về độ ngọt thịt thì mực lá được xếp hạng là một trong những loại mực ngon nhất, trên cả mực ống, mực nang, mực trứng hay bạch tuộc.</p>
					</div>
					<div class="col-md-4 mb-3">
					  <a href="#"><figure><img src="https://www.choque123.com/upload/tintuc/muc-xa-dai-duong-nuong-sa-te.jpg" class="w-100" alt="" /></figure></a>
					</div>
					<div class="col-md-8 mb-3">
					  <h3 class="text-uppercase title_news3"><a href="#">Cách làm mực xà Đại Dương nướng xa tế - Chợ Quê 123</a></h3>
					  <small>Thứ hai, 08/11/2021 17:05 PM (GMT+7)</small>
					  <p class="text-justify">Mực đại dương (hay mực lá đại dương) được đánh bắt trực tiếp từ biển, nặng từ 3-10 kg, thân to, bè như chiếc lá, thịt dày trắng, bên ngoài có màu đỏ cánh gián. Về độ ngọt thịt thì mực lá được xếp hạng là một trong những loại mực ngon nhất, trên cả mực ống, mực nang, mực trứng hay bạch tuộc.</p>
					</div>
					<!-- pagination -->
					<div class="img_detail">
						<nav aria-label="Page navigation example mt-4">
						<ul class="pagination justify-content-center">
							<li class="page-item disabled">
							<a class="page-link" href="#" tabindex="-1">Previous</a>
							</li>
							<li class="page-item active"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
							<a class="page-link" href="#">Next</a>
							</li>
						</ul>
						</nav>
					</div>
					<!-- end pagination -->
				  </div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end content main -->