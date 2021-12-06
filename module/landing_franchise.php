<!-- Book Calendaer -->
<div class="w-100 position-relative"> <!--  id="content" -->
	<div id="jssor_1" class="jso_3">
		<!-- Loading Screen -->
		<div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
			<img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/svg/spin.svg" />
		</div>
		<div data-u="slides" class="jsso_3">
			<div><img data-u="image" alt="" src="img/slider_test/1.png" /></div>
			<div><img data-u="image" alt="" src="img/slider_test/2.jpg" /></div>                 
		</div>
		<!-- Arrow Navigator -->
		<div data-u="arrowleft" class="jssora051" style="width:65px;height:65px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
			<svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
				<polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
			</svg>
		</div>
		<div data-u="arrowright" class="jssora051" style="width:65px;height:65px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
			<svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
				<polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
			</svg>
		</div>
	</div>
	<!--form tu van-->
	<div class="register_consult position-absolute p-4">
		<form action="" method="post">
			<div class="text-center"><label class="text-uppercase title_form color_brown">Đăng ký nhận tư vấn</label></div>
			<div>
				<label for="fullname" class="pb-0">Họ tên</label>
				<input type="text" id="regisfullname" name="regis[fullname]" class="form-control mb-2 input-regis">
			</div>
			<div class="d-flex">
				<div class="row col-12 p-0 m-0 justify-content-between">
					<div class="col-6 p-0 pr-1">
						<label for="phone">Điện thoại</label>
						<input type="text" id="regisphone" name="regis[phone]" class="form-control mb-2 input-regis">
					</div>
					<div class="col-6 p-0 pl-1">
						<label for="email">Email</label>
						<input type="email" id="regisemail" name="regis[email]" class="form-control mb-2 input-regis">
					</div>
				</div>
			</div>
			<div class="d-flex">
				<div class="row col-12 p-0 m-0 justify-content-between">
					<div class="col-6 p-0 pr-1">
						<label for="province">Tỉnh/thành phố bạn định mở cửa hàng</label>
						<input type="text" id="regisprovince" name="regis[province]" class="form-control mb-2 input-regis">
					</div>
					<div class="col-6 p-0 pl-1">
						<label for="address">Địa chỉ bạn định mở cửa hàng</label>
						<input type="text" id="regisaddress" name="regis[address]" class="form-control mb-2 input-regis">
					</div>
				</div>
			</div>
			<div class="d-flex">
				<div class="row col-12 p-0 m-0 justify-content-between">
					<div class="col-12 pl-0"><label for="matbangdukien">Mặt bằng dự kiến</label></div>
					<div class="col-4 p-0 pr-1">
						<select name="regis[front]" id="front" class="form-control mb-2 input-regis">
							<option value="Mặt tiền">Mặt tiền</option>
							<option value="Trong hẻm">Trong hẻm</option>
						</select>
					</div>
					<div class="col-4 p-0 pr-1">
						<input type="number" id="regisarea" name="regis[area]" class="form-control mb-2 input-regis" placeholder="Tổng diện tích">
					</div>
					<div class="col-4 p-0 pl-1">
						<input type="number" id="regisfloor" name="regis[floor]" class="form-control mb-2 input-regis" placeholder="Số tầng">
					</div>
				</div>
			</div>
			<div class="d-flex">
				<div class="row col-12 p-0 m-0 justify-content-between">
					<div class="col-6 p-0 pr-1">
						<label for="province">Kinh nghiêm kinh doanh đồ uống</label>
						<select name="regis[experience]" id="experience" class="form-control mb-2 input-regis">
							<option value="Có">Có</option>
							<option value="Trong hẻm">Không</option>
						</select>
					</div>
					<div class="col-6 p-0 pl-1">
						<label for="address">Vốn đầu tư dự kiến</label>
						<select name="regis[investment]" id="investment" class="form-control mb-2 input-regis">
							<option value="Dưới 1 tỷ">Dưới 1 tỷ</option>
							<option value="1 - 2 tỷ">1 - 2 tỷ</option>
							<option value="2 - 3 tỷ">2 - 3 tỷ</option>
							<option value="Trên 3 tỷ">Trên 3 tỷ</option>
						</select>
					</div>
				</div>
			</div>
			<div class="d-flex">
				<div class="row col-12 p-0 m-0 justify-content-between">
					<div class="col-12"><label for="matbangdukien">Captcha</label></div>
					<div class="col-4 p-0 pr-1">
						<input type="text" id="regiscaptcha" name="regis[captcha]" class="form-control mb-2 input-regis">
					</div>
					<div class="col-2 p-0 pr-1">
						<summary class="input-regis form-control" id="img-captcha"><?php include("captcha.php") ?></summary>
					</div>
					<div class="col-6 p-0 pl-1">
						<button type="button" class="btn btn-regis text-uppercase" id="regisnow">Đăng ký ngay</button>
					</div>
				</div>
			</div>
			
		</form>
	</div>
	<!-- end form tu van -->
	<!-- information about benefit -->
	<div class="information_benefit position-absolute">
		<div class="c_info">
			<div class="subc_info">
				<div class="content_info">
					<div class="info_1 text-uppercase text-center">Tỷ suất lợi nhuận cao</div>
					<hr class="hr" />
					<div class="info_1 text-uppercase text-center">Cơ hội hoàn vốn nhanh</div>
					<hr class="hr" />
					<div class="info_2 text-uppercase text-center">Từ 3 - 6 tháng</div>
					<hr class="hr" />
					<div class="info_1 text-uppercase text-center">Tặng tiền mặt đến 60tr</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end information -->
</div>
<!-- content main -->
<section class="content_main">
	<div class="subcontent bglime">
		<div class="row section_melisspa page-section" id="whychoose">
			<h2 class="whytext text-center color_brown w-100">TẠI SAO NÊN CHỌN MELIS SPA?</h2>
			<div class="w-100"><hr class="hrw" /></div>
			<div class="col-md-3 mt-4 wm">
				<figure class="text-center">
					<img src="img/bg_landing/wm_cash.png" />
				</figure>
				<h4 class="text-uppercase color_brown text-center">Chi phí</h4>
				<p class="text-center color_brown">Tổng chi phí đầu tư chỉ từ 1,2 - 1,5 tỷ</p>
			</div>
			<div class="col-md-3 mt-4 wm">
				<figure class="text-center">
					<img src="img/bg_landing/wm_cashback.png" />
				</figure>
				<h4 class="text-uppercase color_brown text-center">Hoàn vốn nhanh</h4>
				<p class="text-center color_brown">Lợi nhuận cao, hoàn vốn từ 3 -6 tháng</p>
			</div>
			<div class="col-md-3 mt-4 wm">
				<figure class="text-center">
					<img src="img/bg_landing/wm_logo.png" />
				</figure>
				<h4 class="text-uppercase color_brown text-center">Thương hiệu mạnh</h4>
				<p class="text-center color_brown">Thương hiệu vững chắc, đảm bảo thành công bền vững</p>
			</div>
			<div class="col-md-3 mt-4 wm">
				<figure class="text-center">
					<img src="img/bg_landing/wm_support.png" />
				</figure>
				<h4 class="text-uppercase color_brown text-center">Hỗ trợ tối đa</h4>
				<p class="text-center color_brown">Hỗ trợ truyền thông, marketing, nguyên vật liệu, tư vấn cửa hàng, khai trương</p>
			</div>
			<div class="col-md-10 offset-md-1 offset-xs-0 my-4">
				<iframe width="100%" height="450" src="https://www.youtube.com/embed/wH9lHrE-UPY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
		</div>
		<!-- advantage -->
		<div class="row section_melisspa page-section" id="advantage" style="background-image: url(img/bg_landing/about_3.jpg);">
			<div class="col-md-4 offset-md-1 col-xs-offset-0 c_vision mb-5 mt-5">
				<div class="sub_vision">
					<div class="content_vision">
						<h3 class="title_landing text-uppercase color_light_white text-center">TẠI SAO PHẢI NHẬN NHƯỢNG QUYỀN MELIS SPA?</h3>
						<ul class="color_light_white li">
							<li>Vòng xoay hoàn vốn nhanh chóng từ 3 - 6 tháng</li>
							<li>Tỷ suất lợi nhuận tốt</li>
							<li>Mô hình đầu tư chuyên nghiệp</li>
							<li>Khai thác thị trường 28 triệu khách hàng biết đến Melis Spa</li>
							<li>Quy mô và tiêu chuẩn quốc tế</li>
							<li>Quy trình tham gia ngắn từ 45 - 60 ngày</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- benefit -->
		<div class="row section_melisspa page-section" id="benefit" style="background-image: url(img/bg_landing/about_2.jpg);">
			<div class="col-md-4 offset-md-7 col-xs-offset-0 c_vision mb-5 mt-5">
				<div class="sub_vision">
					<div class="content_vision">
						<h3 class="title_landing text-uppercase color_light_white">QUYỀN LỢI KHÁCH HÀNG</h3>
						<ul class="color_light_white li">
							<li>Bí quyết pha chế độc quyền của TocoToco</li>
							<li>Đào tạo chuyển giao công nghệ</li>
							<li>Được cung cấp máy móc, trang thiết bị, nguyên liệu chất lượng</li>
							<li>Hỗ trợ các chương trình Marketing, truyền thông và in ấn</li>
							<li>Được hỗ trợ tư vấn thiết kế, xây dựng để đảm bảo sự thống nhất về nhận diện thương hiệu</li>
						</ul>
						
					</div>
				</div>
			</div>
		</div>
		<!-- cost -->
		<div class="row section_melisspa page-section" id="cost" style="background-image: url(img/bg_landing/about_5.jpg);">
			<div class="col-md-6 c_melis ml-3 mt-4 mb-4">
				<div class="subc_cost">
					<div class="ctcost">
						<div class="costbranch text-uppercase color_brown text-center mt-4">Chi phí chuyển nhượng gồm:</div>
						<div class="content_branch color_brown text-justify">
							<p><i class="fas fa-dollar-sign"></i> Bằng chứng nhận nhượng quyền Melis Spa</p>
							<p><i class="fas fa-dollar-sign"></i> Chuyển giao công nghệ độc quyền</p>
							<p><i class="fas fa-dollar-sign"></i> Chuyển giao quy trình quản lý, vận hành</p>
							<p><i class="fas fa-dollar-sign"></i> Chương trình đào tạo nhân sự chuyên nghiệp</p>
							<p><i class="fas fa-dollar-sign"></i> Tư vấn thiết kế 3D & setup cửa hàng tiêu chuẩn</p>
							<p><i class="fas fa-dollar-sign"></i> Concept khai trương cửa hàng</p>
							<p><i class="fas fa-dollar-sign"></i> Bảo trợ truyền thông, Marketing thương hiệu</p>
							<p><i class="fas fa-dollar-sign"></i> Hệ thống máy móc, cửa hàng tiêu chuẩn quốc tế</p>
						</div>
					</div>
				</div>
			</div>                    
		</div>
		<!-- request -->
		<div class="section_request page-section pb-4" id="request">
			<div class="row w-80 m-auto">
				<h2 class="whytext text-center color_light_white w-100 text-uppercase">Yêu cầu phía đối tác</h2>
				<div class="w-100"><hr class="hrwr" /></div>
				<div class="col-md-12 text-center color_light_white">Xuyên suốt quá trình kinh doanh của các nhà đầu tư, MELIS SPA sẽ luôn hỗ trợ và đáp ứng kịp thời về chế độ, 
					không chỉ giúp cửa hàng phát triển mà còn góp phần phủ rộng thương hiệu ra thị trường.</div>
				<div class="col-md-4 mt-4 wm">
					<div class="text-center wm-icon color_light_white">
						<i class="fas fa-map-marker-alt"></i>
					</div>
					<h4 class="text-uppercase color_light_white text-center">Vị trí tiềm năng</h4>
				</div>
				<div class="col-md-4 mt-4 wm">
					<div class="text-center wm-icon color_light_white">
						<i class="fas fa-home"></i>
					</div>
					<h4 class="text-uppercase color_light_white text-center">Mặt bằng tối ưu</h4>
				</div>
				<div class="col-md-4 mt-4 wm">
					<div class="text-center wm-icon color_light_white">
						<i class="fas fa-dollar-sign"></i>
					</div>
					<h4 class="text-uppercase color_light_white text-center">Tài chính phù hợp</h4>
				</div>   
			</div>        
		</div>
		<!-- procedure -->
		<div class="row section_procedure page-section" id="procedure">
			<div class="col-md-12 color_brown px-0 mb-4">
				<h3 class="title_procedure">Quy trình tham gia</h3>
				<hr class="hrp" /> 
			</div>
			<div class="col-md-3 mb-3">
				<div class="eachprocedure contact">
					<h4>Bước 1: Liên hệ</h4>
					<p>Nhà đầu tư liên hệ với Melis Spa (qua điện thoại, internet,...)</p>
				</div>
			</div>
			<div class="col-md-3 mb-3">
				<div class="eachprocedure info">
					<h4>Bước 2: Cung cấp thông tin</h4>
					<p>Melis Spa cung cấp thông tin nhượng quyền cho nhà đầu tư.</p>
				</div>
			</div>
			<div class="col-md-3 mb-3">
				<div class="eachprocedure consult">
					<h4>Bước 3: Gặp gỡ tư vấn</h4>
					<p>Gặp mặt trực tiếp giữa 2 bên, nhà đầu tư tới trụ sở Melis Spa, nghe tư vấn cụ thể và được giải đáp các thắc mắc.</p>
				</div>
			</div>
			<div class="col-md-3 mb-3">
				<div class="eachprocedure survey">
					<h4>Bước 4: Khảo sát</h4>
					<p>Melis Spa khảo sát địa điểm, kiểm tra chất lượng nhà đầu tư xem có đủ điều kiện hợp tác hay không.</p>
				</div>
			</div>
			<div class="col-md-3 mb-3">
				<div class="eachprocedure contract">
					<h4>Bước 5: Ký hợp đồng</h4>
					<p>Ký hợp đồng nhượng quyền, nhà đầu tư thanh toán chi phí nhượng quyền.</p>
				</div>
			</div>
			<div class="col-md-3 mb-3">
				<div class="eachprocedure setup">
					<h4>Bước 6: Setup nhượng quyền</h4>
					<p>Melis Spa tiến hành tư vấn thiết kế cửa hàng, nhập nguyên liệu, máy móc, đào tạo nhân sự,..</p>
				</div>
			</div>
			<div class="col-md-3 mb-3">
				<div class="eachprocedure operate">
					<h4>Bước 7: Vận hành hoạt động</h4>
					<p>Sau 4-6 tuần của hàng đi vào hoạt động. Hỗ trợ khai trương</p>
				</div>
			</div>
		</div>
		<!-- register -->
		<div class="row section_register page-section" id="register" style="background-image: url(img/bg_landing/bg_branch_register.jpeg);">
			<div class="col-md-6 c_register mx-auto mt-4 mb-4">
				<h2 class="title_register text-uppercase text-center color_light_white">Đăng ký tham gia</h2>
				<p class="tip_register my-2">Hãy cùng MELIS SPA mang những dịch vụ và sản phẩm chăm sóc và làm đẹp cho mẹ bầu, mẹ sau sinh và phụ nữ hiện đại, an toàn và ngập tràn hạnh phúc tới khách hàng ngay hôm nay !</p>
				<!--form tu van-->
				<div class="register_form p-4">
					<form action="" method="post">
						<div class="text-center"><label class="text-uppercase title_form color_brown">Đăng ký nhận tư vấn</label></div>
						<div>
							<label for="fullname" class="pb-0">Họ tên</label>
							<input type="text" id="regisfullname1" name="regis[fullname]" class="form-control mb-2 input-regis">
						</div>
						<div class="d-flex">
							<div class="row col-12 p-0 m-0 justify-content-between">
								<div class="col-6 p-0 pr-1">
									<label for="phone">Điện thoại</label>
									<input type="text" id="regisphone1" name="regis[phone]" class="form-control mb-2 input-regis">
								</div>
								<div class="col-6 p-0 pl-1">
									<label for="email">Email</label>
									<input type="email" id="regisemail1" name="regis[email]" class="form-control mb-2 input-regis">
								</div>
							</div>
						</div>
						<div class="d-flex">
							<div class="row col-12 p-0 m-0 justify-content-between">
								<div class="col-6 p-0 pr-1">
									<label for="province">Tỉnh/thành phố bạn định mở cửa hàng</label>
									<input type="text" id="regisprovince1" name="regis[province]" class="form-control mb-2 input-regis">
								</div>
								<div class="col-6 p-0 pl-1">
									<label for="address">Địa chỉ bạn định mở cửa hàng</label>
									<input type="text" id="regisaddress1" name="regis[address]" class="form-control mb-2 input-regis">
								</div>
							</div>
						</div>
						<div class="d-flex">
							<div class="row col-12 p-0 m-0 justify-content-between">
								<div class="col-12"><label for="matbangdukien">Mặt bằng dự kiến</label></div>
								<div class="col-4 p-0 pr-1">
									<select name="regis[front]" id="front1" class="form-control mb-2 input-regis">
										<option value="Mặt tiền">Mặt tiền</option>
										<option value="Trong hẻm">Trong hẻm</option>
									</select>
								</div>
								<div class="col-4 p-0 pr-1">
									<input type="number" id="regisarea1" name="regis[area]" class="form-control mb-2 input-regis" placeholder="Tổng diện tích">
								</div>
								<div class="col-4 p-0 pl-1">
									<input type="number" id="regisfloor1" name="regis[floor]" class="form-control mb-2 input-regis" placeholder="Số tầng">
								</div>
							</div>
						</div>
						<div class="d-flex">
							<div class="row col-12 p-0 m-0 justify-content-between">
								<div class="col-6 p-0 pr-1">
									<label for="province">Kinh nghiêm kinh doanh đồ uống</label>
									<select name="regis[experience]" id="experience1" class="form-control mb-2 input-regis">
										<option value="Có">Có</option>
										<option value="Trong hẻm">Không</option>
									</select>
								</div>
								<div class="col-6 p-0 pl-1">
									<label for="address">Vốn đầu tư dự kiến</label>
									<select name="regis[investment]" id="investment1" class="form-control mb-2 input-regis">
										<option value="Dưới 1 tỷ">Dưới 1 tỷ</option>
										<option value="1 - 2 tỷ">1 - 2 tỷ</option>
										<option value="2 - 3 tỷ">2 - 3 tỷ</option>
										<option value="Trên 3 tỷ">Trên 3 tỷ</option>
									</select>
								</div>
							</div>
						</div>
						<div class="d-flex">
							<div class="row col-12 p-0 m-0 justify-content-between">
								<div class="col-12"><label for="matbangdukien">Captcha</label></div>
								<div class="col-4 p-0 pr-1">
									<input type="text" id="regiscaptcha1" name="regis[captcha]" class="form-control mb-2 input-regis">
								</div>
								<div class="col-2 p-0 pr-1">
									<summary class="input-regis form-control" id="img-captchaa"><?php include("captcha.php") ?></summary>
								</div>
								<div class="col-6 p-0 pl-1">
									<button type="button" class="btn btn-regis text-uppercase" id="regisnow1">Đăng ký ngay</button>
								</div>
							</div>
						</div>
						
					</form>
				</div>
				<!-- end form tu van -->
			</div>                    
		</div>
	</div>
</section>
<!-- end content main -->