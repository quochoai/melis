<div class="col-md-3">
	<?php
		$checkCateService = $h->checkExist($tableCate, "cate_id = ".$def['cateid_service']." and deleted_at is null");
		$sideService = "";
		if ($checkCateService) {
			$sideService .= '<ul class="sidebar">';
			$cateServices = $h->getAll("id, name_vi, name_en", $tableCate, "cate_id = ".$def['cateid_service']." and deleted_at is null", "sort asc, id asc");
			foreach ($cateServices as $kCate => $cateService) {
				$linkCateService = chuoilink($cateService['name_vi']);
				if ($mod2 == $linkCateService) {
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
				
				$namecateService = $cateService["name_$lng"];
				$service_id = $cateService['id'];
				$sideService .= '<li>';
				$sideService .= '   <p><i class="fas '.$caret.'"></i> '.$namecateService.'</p>';
				$checkService = $h->checkExist($tableService, "service_id = $service_id and deleted_at is null");
				if ($checkService) {
					$services = $h->getAll("id, name_vi, name_en", $tableService, "service_id = $service_id and deleted_at is null", "sort asc, id asc");
					$sideService .= '<ul'.$clsBlock.'>';
					foreach ($services as $kService => $service) {
						$linkServiceHtml = chuoilink($service['name_vi']).'.html';
						$nameService = $service["name_$lng"];
						$linkService = $lng.'/'.$def['link_queennature'].'/'.$linkCateService.'/'.$linkServiceHtml;
						$clsActive = ($mod3 == $linkServiceHtml) ? ' class="active"' : '';
						$sideService .= '<li><a href="'.$linkService.'"'.$clsActive.'>'.$nameService.'</a></li>';

					}
					$sideService .= '</ul>';
				}
				$sideService .= '</li>';
			}
			$sideService .= '</ul>';
		}
		$sideService .= '<div class="mb-4">';
		$sideService .= '	<div class="eachsidebar cskh">
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
		$sideService .= '</div>';
		_e($sideService);
	/*
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
			<a href="#">Cảm nhận khách hàng</a>
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