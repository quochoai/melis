<div class="col-md-3">
	<?php
		$checkCateProduct = $h->checkExist($tableCate, "cate_id = ".$def['cateid_product']." and deleted_at is null");
		$sideProduct = "";
		if ($checkCateProduct) {
			$sideProduct .= '<ul class="sidebar">';
			$cateProducts = $h->getAll("id, name_vi, name_en", $tableCate, "cate_id = ".$def['cateid_product']." and deleted_at is null", "sort asc, id asc");
			foreach ($cateProducts as $kCate => $cateProduct) {
				$linkCateProduct = chuoilink($cateProduct['name_vi']);
				if ($mod2 == $linkCateProduct) {
					$caret = 'fa-caret-down';
					$clsBlock = ' class="block"';
				} else {
					if ($kCate == 0) {
						$caret = 'fa-caret-down';
						$clsBlock = ' class="block"';
					} else {
						$caret = 'fa-caret-right';
						$clsBlock = '';
					}
				}
				
				$nameCateProduct = $cateProduct["name_$lng"];
				$product_id = $cateProduct['id'];
				$sideProduct .= '<li>';
				$sideProduct .= '   <p><i class="fas '.$caret.'"></i> '.$nameCateProduct.'</p>';
				$checkProduct = $h->checkExist($tableProduct, "product_id = $product_id and deleted_at is null");
				if ($checkProduct) {
					$products = $h->getAll("id, name_vi, name_en", $tableProduct, "product_id = $product_id and deleted_at is null", "sort asc, id asc");
					$sideProduct .= '<ul'.$clsBlock.'>';
					foreach ($products as $kProduct => $product) {
						$linkProductHtml = chuoilink($product['name_vi']).'.html';
						$nameProduct = $product["name_$lng"];
						$linkProduct = $lng.'/'.$def['link_queennature'].'/'.$linkCateProduct.'/'.$linkProductHtml;
						$clsActive = ($mod3 == $linkProductHtml) ? ' class="active"' : '';
						$sideProduct .= '<li><a href="'.$linkProduct.'"'.$clsActive.'>'.$nameProduct.'</a></li>';

					}
					$sideProduct .= '</ul>';
				}
				$sideProduct .= '</li>';
			}
			$sideProduct .= '</ul>';
		}
		$sideProduct .= '<div class="mb-4">';
		$sideProduct .= '	<div class="eachsidebar cskh">
												<a href="'.$def['link_freview'].'">'.$lang['customer_review'].'</a>
											</div>
											<div class="diverEachsidebar"></div>
											<div class="eachsidebar rvnnt">
												<a href="'.$def['link_celes_feel'].'">'.$lang['celebrity_feel'].'</a>
											</div>
											<div class="diverEachsidebar"></div>
											<div class="eachsidebar km">
												<a href="'.$def['link_fpromotion'].'">'.$lang['n_promotion'].'</a>
											</div>
											<div class="diverEachsidebar"></div>
											<div class="eachsidebar tvsm">
												<a class="book-calendar-demand" rel="Tư vấn sữa mẹ">'.$lang['breast_milk_consultation'].'</a>
											</div>
											<div class="diverEachsidebar"></div>
											<div class="eachsidebar tvad">
												<a class="book-calendar-demand" rel="Tư vấn ăn dặm">'.$lang['eat_weaning_consultation'].'</a>
											</div>
											<div class="diverEachsidebar"></div>
											<div class="eachsidebar tvcsb">
												<a class="book-calendar-demand" rel="Tư vấn chăm sóc bầu">'.$lang['pregnance_care_consultation'].'</a>
											</div>
											<div class="diverEachsidebar"></div>
											<div class="eachsidebar tvcsss">
												<a class="book-calendar-demand" rel="Tư vấn chăm sóc sau sinh">'.$lang['postpartum_care_consultation'].'</a>
											</div>
											<div class="diverEachsidebar"></div>
											<div class="eachsidebar tvgbss">
												<a class="book-calendar-demand" rel="Tư vấn giảm béo sau sinh">'.$lang['postpartum_fat_loss_advice'].'</a>
											</div>
											<div class="diverEachsidebar"></div>
											<div class="eachsidebar tvdd">
												<a class="book-calendar-demand" rel="Tư vấn dinh dưỡng">'.$lang['nutrition_consulting'].'</a>
											</div>
											<div class="diverEachsidebar"></div>
											<div class="eachsidebar vtmbb">
												<a class="book-calendar-demand" rel="Vitamin bà bầu">'.$lang['pregnance_vitamin'].'</a>
											</div>
											<div class="diverEachsidebar"></div>
											<div class="eachsidebar tvcsdm">
												<a class="book-calendar-demand" rel="Tư vấn chăm sóc da mặt">'.$lang['facial_skin_care_consultation'].'</a>
											</div>
											<div class="diverEachsidebar"></div>
											<div class="eachsidebar tvcsdtt">
												<a class="book-calendar-demand" rel="Tư vấn chăm sóc da toàn thân">'.$lang['full_body_skin_care_consultation'].'</a>
											</div>
											<div class="diverEachsidebar"></div>';
		$sideProduct .= '</div>';
		_e($sideProduct);
	
	/*
	<div class="mb-4">
		<div class="eachsidebar cskh">
			<a href="">Cảm nhận khách hàng</a>
		</div>
		<div class="diverEachsidebar"></div>
		<div class="eachsidebar rvnnt">
			<a href="#">Review người nổi tiếng</a>
		</div>
		<div class="diverEachsidebar"></div>
		<div class="eachsidebar km">
			<a href="#">Khuyến mại</a>
		</div>
		<div class="diverEachsidebar"></div>
		<div class="eachsidebar tvsm">
			<a href="#">Tư vấn sữa mẹ</a>
		</div>
		<div class="diverEachsidebar"></div>
		<div class="eachsidebar tvad">
			<a href="#">Tư vấn ăn dặm</a>
		</div>
		<div class="diverEachsidebar"></div>
		<div class="eachsidebar tvcsb">
			<a href="#">Tư vấn chăm sóc bầu</a>
		</div>
		<div class="diverEachsidebar"></div>
		<div class="eachsidebar tvcsss">
			<a href="#">Tư vấn chăm sóc sau sinh</a>
		</div>
		<div class="diverEachsidebar"></div>
		<div class="eachsidebar tvgbss">
			<a href="#">Tư vấn giảm béo sau sinh</a>
		</div>
		<div class="diverEachsidebar"></div>
		<div class="eachsidebar tvdd">
			<a href="#">Tư vấn dinh dưỡng</a>
		</div>
		<div class="diverEachsidebar"></div>
		<div class="eachsidebar vtmbb">
			<a href="#">Vitamin bà bầu</a>
		</div>
		<div class="diverEachsidebar"></div>
		<div class="eachsidebar tvcsdm">
			<a href="#">Tư vấn chăm sóc da mặt</a>
		</div>
		<div class="diverEachsidebar"></div>
		<div class="eachsidebar tvcsdtt">
			<a href="#">Tư vấn chăm sóc da toàn thân</a>
		</div>
		<div class="diverEachsidebar"></div>
	</div>
	<ul class="sidebar">
		<li>
			<p><i class="fas fa-caret-down"></i> Cho mẹ bầu</p>
			<ul class="block">
				<li><a href="#" class="active">Trắng hồng da mặt, ngừa & trị mụn nám</a></li>
				<li><a href="#">Ngũ cốc bầu và Vitamin bà bầu</a></li>
				<li><a href="#">Hạt siêu dinh dưỡng</a></li>
				<li><a href="#">Ngừa và trị thâm rạn mẹ bầu</a></li>
			</ul>
		</li>
		<li>
			<p><i class="fas fa-caret-right"></i> Cho mẹ sau sinh</p>
			<ul>
				<li><a href="#">Trắng hồng da mặt, ngừa & trị mụn nám</a></li>
				<li><a href="#">Ngũ cốc bầu và Vitamin bà bầu</a></li>
				<li><a href="#">Hạt siêu dinh dưỡng</a></li>
				<li><a href="#">Ngừa và trị thâm rạn mẹ bầu</a></li>
			</ul>
		</li>
		<li>
			<p><i class="fas fa-caret-right"></i> Cho mẹ thường</p>
			<ul>
				<li><a href="#">Trắng hồng da mặt, ngừa & trị mụn nám</a></li>
				<li><a href="#">Ngũ cốc bầu và Vitamin bà bầu</a></li>
				<li><a href="#">Hạt siêu dinh dưỡng</a></li>
				<li><a href="#">Ngừa và trị thâm rạn mẹ bầu</a></li>
			</ul>
		</li>
		<li>
			<p><i class="fas fa-caret-right"></i> Cho bé</p>
			<ul>
				<li><a href="#">Trắng hồng da mặt, ngừa & trị mụn nám</a></li>
				<li><a href="#">Ngũ cốc bầu và Vitamin bà bầu</a></li>
				<li><a href="#">Hạt siêu dinh dưỡng</a></li>
				<li><a href="#">Ngừa và trị thâm rạn mẹ bầu</a></li>
			</ul>
		</li>
		<li>
			<p><i class="fas fa-caret-right"></i> Cho bộ quà tặng</p>
			<ul>
				<li><a href="#">Trắng hồng da mặt, ngừa & trị mụn nám</a></li>
				<li><a href="#">Ngũ cốc bầu và Vitamin bà bầu</a></li>
				<li><a href="#">Hạt siêu dinh dưỡng</a></li>
				<li><a href="#">Ngừa và trị thâm rạn mẹ bầu</a></li>
			</ul>
		</li>
	</ul>
	
	<div class="mb-4">
		<div class="eachsidebar cskh">
			<a href="">Cảm nhận khách hàng</a>
		</div>
		<div class="diverEachsidebar"></div>
		<div class="eachsidebar rvnnt">
			<a href="#">Review người nổi tiếng</a>
		</div>
		<div class="diverEachsidebar"></div>
		<div class="eachsidebar km">
			<a href="#">Khuyến mại</a>
		</div>
		<div class="diverEachsidebar"></div>
		<div class="eachsidebar tvsm">
			<a href="#">Tư vấn sữa mẹ</a>
		</div>
		<div class="diverEachsidebar"></div>
		<div class="eachsidebar tvad">
			<a href="#">Tư vấn ăn dặm</a>
		</div>
		<div class="diverEachsidebar"></div>
		<div class="eachsidebar tvcsb">
			<a href="#">Tư vấn chăm sóc bầu</a>
		</div>
		<div class="diverEachsidebar"></div>
		<div class="eachsidebar tvcsss">
			<a href="#">Tư vấn chăm sóc sau sinh</a>
		</div>
		<div class="diverEachsidebar"></div>
		<div class="eachsidebar tvgbss">
			<a href="#">Tư vấn giảm béo sau sinh</a>
		</div>
		<div class="diverEachsidebar"></div>
		<div class="eachsidebar tvdd">
			<a href="#">Tư vấn dinh dưỡng</a>
		</div>
		<div class="diverEachsidebar"></div>
		<div class="eachsidebar vtmbb">
			<a href="#">Vitamin bà bầu</a>
		</div>
		<div class="diverEachsidebar"></div>
		<div class="eachsidebar tvcsdm">
			<a href="#">Tư vấn chăm sóc da mặt</a>
		</div>
		<div class="diverEachsidebar"></div>
		<div class="eachsidebar tvcsdtt">
			<a href="#">Tư vấn chăm sóc da toàn thân</a>
		</div>
		<div class="diverEachsidebar"></div>
	</div>
	*/
	?>
</div>