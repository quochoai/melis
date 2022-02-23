<!-- FOOTER 1 -->
<div class="bg-wrapper position-relative pb-3">
	<div class="wrapper">
		<div class="col-12 p-0" style="background: rgb(77, 52, 36);">
			<div class="container">
				<div class="col-12">
					<div class="row">
						<div class="col-12 py-3">
							<div class="d-flex justify-content-between align-items-center" style="color: rgb(196, 182, 158);">
								<span class="text-center py-2 px-4"><?php _e($lang['intro_consultation']) ?></span>
								<span><a style="color: rgb(196, 182, 158);" class="nav-link book-calendar-demand text-uppercase"><i class="far fa-calendar-alt"></i> <?php _e($lang['schedule_a_consultation']) ?></a></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- FOOTER 2 -->
<?php
	$office = $h->getById("noidung_vi, noidung_en", $tableHtml, 5);
	$officehn = $h->getById("noidung_vi, noidung_en", $tableHtml, 6);
	$officehcm = $h->getById("noidung_vi, noidung_en", $tableHtml, 7);
?>
<div class="bg-wrapper positiom-relative pb-3">
	<div class="wrapper">
		<div class="row">
			<div class="col"><img src="assets/img/melismom.png" alt=""></div>
			<div class="col">
				<div class="title font-weight-bold pb-3 text-uppercase"><?php _e($lang['office']) ?></div>
				<div class="content"><?php _e(nl2br($office["noidung_$lng"])) ?></div>
			</div>
			<div class="col">
				<div class="title font-weight-bold pb-3 text-uppercase"><?php _e($lang['office_hn']) ?></div>
				<div class="content"><?php _e(nl2br($officehn["noidung_$lng"])) ?></div>
			</div>
			<div class="col">
				<div class="title font-weight-bold pb-3 text-uppercase"><?php _e($lang['office_hcm']) ?></div>
				<div class="content"><?php _e(nl2br($officehcm["noidung_$lng"])) ?></div>
			</div>
			<div class="col">
				<img src="assets/img/melisbeaute.png" alt="">
			</div>
		</div>
	</div>
</div>
<!-- FOOTER 3 -->
<div class="bg-wrapper position-relative pb-3" style="background: rgb(77, 52, 36);">
	<div class="position-absolute" style="left: 0; bottom: 0!important;"><img class="" src="assets/img/flower-left.png" alt=""></div>
	<div class="wrapper">
		<div class="col-12 p-0">
			<div class="container" style="color: rgb(196, 182, 158);">
				<div class="col-12 pt-3">
					<div class="row">
						<div class="col-12">
							<form action="" class="form">
								<div class="row">
									<div class="col">
										<p class="font-weight-bold text-uppercase"><?php _e($lang['register_promotion']) ?></p>
										<p><?php _e($lang['intro_register_promotion']) ?></p>
									</div>
									<div class="col">
										<input type="email" class="form-control p-2 email_promotion" style="background: rgb(227, 209, 177); color: rgb(77, 52, 36);" placeholder="<?php _e($lang['email_promotion']) ?>">
									</div>
								</div>
							</form>
						</div>
						<div class="col-12">
							<div class="row justify-content-between">
								<div class="col-6">
									@2016 <?php _e($lang['copyright_frontend']) ?>
								</div>
								<?php
									$hotline_tuvan = $h->getById("noidung_vi", $tableHtml, 9);
								?>
								<div class="col-6 text-right">
									<a style="color: rgb(196, 182, 158);" href="tel:<?php _e(str_replace(".", "", $hotline_tuvan['noidung_vi'])) ?>" class="nav-link text-uppercase"><?php _e($lang['hotline_consultation'].' '.$hotline_tuvan['noidung_vi']) ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="position-absolute" style="right: 0; top: 0!important;">
		<img class="" src="assets/img/flower-right.png" alt="">
	</div>
</div>
<?php
	if (!isset($_REQUEST['pqh']) || !in_array($mod1, $array_not)) {
?>
<div class="position-fixed help text-white">
	<div id="help-center" class="help-services my-1">
		<div class="position-relative">
			<div class="d-flex service position-absolute">
				<div class="svg">
					<i class="fas fa-comments"></i>
				</div>
				<div class="help-center text pr-2 row p-0 m-0 align-items-center text-service">
					<span class=""><?php _e($lang['customer_consult']) ?></span>
				</div>
			</div>
		</div>
	</div>
	<div id="service-action" class="help-services my-1">
		<div class="position-relative">
			<div class="d-flex service position-absolute">
				<div class="svg">
					<i class="fas fa-people-arrows"></i>
				</div>
				<div class="service-action text pr-2 row p-0 m-0 align-items-center text-service">
					<span class="">Action</span>
				</div>
			</div>
		</div>
	</div>
	<div id="service-discount" class="help-services my-1">
		<div class="position-relative">
			<div class="d-flex service position-absolute">
				<div class="svg">
					<i class="fas fa-percent"></i>
				</div>
				<div class="service-discount text pr-2 row p-0 m-0 align-items-center text-service">
					<span class=""><?php _e($lang['discount']) ?></span>
				</div>
			</div>
		</div>
	</div>
	<div id="service-facebook" class="help-services my-1">
		<div class="position-relative">
			<div class="d-flex service position-absolute">
				<div class="svg">
					<i class="fab fa-facebook-f"></i>
				</div>
				<div class="service-facebook text pr-2 row p-0 m-0 align-items-center text-service">
					<span class="">Facebook</span>
				</div>
			</div>
		</div>
	</div>
	<div id="service-facebook" class="help-services my-1">
		<div class="position-relative">
			<div class="d-flex service position-absolute">
				<div class="svg">
					<i class="fab fa-youtube"></i>
				</div>
				<div class="service-facebook text pr-2 row p-0 m-0 align-items-center text-service">
					<span class="">Youtube</span>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	} elseif ($mod1 == $def['link_fabout']) {
?>
<div class="position-fixed help text-white">
	<div class="navigantion_menu my-1">
		<div class="position-relative">
			<div class="d-flex navi position-absolute" title="<?php _e($lang['fabout_tmelisspa']) ?>">
				<div class="svg navbar-item page_link">
					<a href="#startup"><i class="fas fa-spa"></i></a>
				</div>
				<div class="help-center text pr-2 row p-0 m-0 align-items-center text-navi navbar-item page_link">
					<a href="#startup"><span class="">Melis Spa</span></a>
					</div>
			</div>
		</div>
	</div>
	<div class="navigantion_menu my-1">
		<div class="position-relative">
			<div class="d-flex navi position-absolute" title="<?php _e($lang['fabout_tvision']) ?>">
				<div class="svg navbar-item page_link">
					<a href="#vision"><i class="fas fa-bullseye"></i></a>
				</div>
				<div class="help-center text pr-2 row p-0 m-0 align-items-center text-navi navbar-item page_link">
					<a href="#vision"><span class=""><?php _e($lang['fabout_svision']) ?></span></a>
					</div>
			</div>
		</div>
	</div>
	<div class="navigantion_menu my-1">
		<div class="position-relative">
			<div class="d-flex navi position-absolute" title="<?php _e($lang['fabout_tteam']) ?>">
				<div class="svg navbar-item page_link">
					<a href="#team"><i class="fas fa-user-friends"></i></a>
				</div>
				<div class="text pr-2 row p-0 m-0 align-items-center text-navi navbar-item page_link">
					<a href="#team"><span class=""><?php _e($lang['fabout_steam']) ?></span></a>
					</div>
			</div>
		</div>
	</div>
	<div class="navigantion_menu my-1">
		<div class="position-relative">
			<div class="d-flex navi position-absolute" title="<?php _e($lang['fabout_scommunity']) ?>">
				<div class="svg navbar-item page_link">
					<a href="#community"><i class="fas fa-heart"></i></a>
				</div>
				<div class="text pr-2 row p-0 m-0 align-items-center text-navi navbar-item page_link">
					<a href="#community"><span class=""><?php _e($lang['fabout_scommunity']) ?></span></a>
					</div>
			</div>
		</div>
	</div>
	<div class="navigantion_menu my-1">
		<div class="position-relative">
			<div class="d-flex navi position-absolute" title="<?php _e($lang['fabout_simages']) ?>">
				<div class="svg navbar-item page_link">
					<a href="#gallery_image"><i class="fas fa-images"></i></a>
				</div>
				<div class="text pr-2 row p-0 m-0 align-items-center text-navi navbar-item page_link">
					<a href="#gallery_image"><span class=""><?php _e($lang['fabout_simages']) ?></span></a>
					</div>
			</div>
		</div>
	</div>
	<div class="navigantion_menu my-1">
		<div class="position-relative">
			<div class="d-flex navi position-absolute" title="Video">
				<div class="svg navbar-item page_link">
					<a href="#gallery_video"><i class="fab fa-youtube"></i></a>
				</div>
				<div class=" text pr-2 row p-0 m-0 align-items-center text-navi navbar-item page_link">
					<a href="#gallery_video"><span class="">Video</span></a>
					</div>
			</div>
		</div>
	</div>
</div>
<?php 
	} elseif ($mod1 == $def['link_franchise']) {
?>
<div class="position-fixed help text-white">
	<div class="navigantion_menu my-1">
		<div class="position-relative">
			<div class="d-flex navi position-absolute" title="<?php _e($lang['ff_tmelisspa']) ?>">
				<div class="svg navbar-item page_link">
					<a href="#whychoose"><i class="fas fa-spa"></i></a>
				</div>
				<div class="help-center text pr-2 row p-0 m-0 align-items-center text-navi navbar-item page_link">
					<a href="#whychoose"><span class="">Melis Spa</span></a>
				</div>
				</a>
			</div>
		</div>
	</div>
	<div class="navigantion_menu my-1">
		<div class="position-relative">
			<div class="d-flex navi position-absolute" title="<?php _e($lang['ff_tadvange']) ?>">
				<div class="svg navbar-item page_link">
					<a href="#advantage"><i class="fas fa-comment-dollar"></i></a>
				</div>
				<div class="help-center text pr-2 row p-0 m-0 align-items-center text-navi navbar-item page_link">
					<a href="#advantage"><span class=""><?php _e($lang['ff_sadvantage']) ?></span></a>
				</div>
			</div>
		</div>
	</div>
	<div class="navigantion_menu my-1">
		<div class="position-relative">
			<div class="d-flex navi position-absolute" title="<?php _e($lang['ff_tbenefit']) ?>">
				<div class="svg navbar-item page_link">
					<a href="#benefit"><i class="fas fa-handshake"></i></a>
				</div>
				<div class="text pr-2 row p-0 m-0 align-items-center text-navi navbar-item page_link">
					<a href="#benefit"><span class=""><?php _e($lang['ff_sbenefit']) ?></span></a>
				</div>
			</div>
		</div>
	</div>
	<div class="navigantion_menu my-1">
		<div class="position-relative">
			<div class="d-flex navi position-absolute" title="<?php _e($lang['ff_tcost']) ?>">
				<div class="svg navbar-item page_link">
					<a href="#cost"><i class="fas fa-dollar-sign"></i></a>
				</div>
				<div class="text pr-2 row p-0 m-0 align-items-center text-navi navbar-item page_link">
					<a href="#cost"><span class=""><?php _e($lang['ff_scost']) ?></span></a>
				</div>
			</div>
		</div>
	</div>
	<div class="navigantion_menu my-1">
		<div class="position-relative">
			<div class="d-flex navi position-absolute" title="<?php _e($lang['ff_trequest']) ?>">
				<div class="svg navbar-item page_link">
					<a href="#request"><i class="fas fa-poll"></i></a>
				</div>
				<div class="text pr-2 row p-0 m-0 align-items-center text-navi navbar-item page_link">
					<a href="#request"><span class=""><?php _e($lang['ff_srequest']) ?></span></a>
				</div>
			</div>
		</div>
	</div>
	<div class="navigantion_menu my-1">
		<div class="position-relative">
			<div class="d-flex navi position-absolute" title="<?php _e($lang['ff_tprocedure']) ?>">
				<div class="svg navbar-item page_link">
					<a href="#procedure"><i class="fas fa-procedures"></i></a>
				</div>
				<div class=" text pr-2 row p-0 m-0 align-items-center text-navi navbar-item page_link">
					<a href="#procedure"><span class=""><?php _e($lang['ff_sprocedure']) ?></span></a>
				</div>
			</div>
		</div>
	</div>
	<div class="navigantion_menu my-1">
		<div class="position-relative">
			<div class="d-flex navi position-absolute" title="<?php _e($lang['ff_tregister']) ?>">
				<div class="svg navbar-item page_link">
					<a href="#register"><i class="fas fa-registered"></i></a>
				</div>
				<div class=" text pr-2 row p-0 m-0 align-items-center text-navi navbar-item page_link">
					<a href="#register"><span class=""><?php _e($lang['ff_sregister']) ?></span></a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	}
?>
<!-- form dat lich tu van-->
<div class="modal fade" id="modal-book-calendar-demand">
	<div class="modal-dialog modal-small">
		<div class="modal-content">
			<div class="modal-header brown_bg">
				<h5 class="modal-title text-uppercase text-white"><?php _e($lang['schedule_a_consultation']) ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="text-white">&times;</span>
				</button>
			</div>
			<form method="post" class=" p-4">
				<div class="d-flex">
					<label class="p-2 d-flexprocess"> <?php _e($lang['consulting_doctor']) ?><input type="radio" name="process" value="1" id="bstvm" checked><span class="checkmark"></span></label>
					<label class="p-2 d-flexprocess"><?php _e($lang['carry_out_the_treatment']) ?><input type="radio" name="process" value="2" id="thltm"><span class="checkmark"></span></label>
				</div>
				<div class="d-none" id="title_form"></div>
				<div>
					<input type="text" id="bookfullnamem" name="book[fullname]" class="form-control mb-2 input-book" placeholder="<?php _e($lang['fullname']) ?>">
				</div>
				<div>
					<input type="number" id="bookphonem" name="book[phone]" class="form-control mb-2 input-book" placeholder="<?php _e($lang['mobilephone']) ?>" step="1">
				</div>
				<div>
					<input type="text" id="bookemailm" name="book[email]" class="form-control mb-2 input-book" placeholder="<?php _e($lang['email_if']) ?>">
				</div>
				<div>
					<input type="text" id="demandm" name="book[demand]" class="form-control mb-2 input-book" placeholder="<?php _e($lang['demand']) ?>">
				</div>
				<div class="d-flex">
					<div class="row col-12 p-0 m-0 justify-content-between">
						<div class="col-6 p-0 pr-1">
							<input type="datetime-local" id="booktimem" name="book[time]" class="form-control mb-2 input-book" placeholder="Lịch">
						</div>
						<div class="col-6 p-0 pl-1">
							<select name="book[branch]" id="branchm" class="form-control mb-2 input-book">
								<option value="0"><?php _e($lang['branch']) ?></option>
								<option value="SPA TẠI HÀ NỘI - 121 An Dương Vương - Tây Hồ">SPA TẠI HÀ NỘI - 121 An Dương Vương - Tây Hồ</option>
								<option value="SPA TẠI TP. HỒ CHÍ MINH - 272 Nguyễn Thiện Thuật - P3 - Q3">SPA TẠI TP. HỒ CHÍ MINH - 272 Nguyễn Thiện Thuật - P3 - Q3</option>
							</select>
						</div>
					</div>
				</div>
				<button type="button" class="btn btn-book text-uppercase" id="bookmeetm"><?php _e($lang['make_an_appointment']) ?></button>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
	<!-- loading -->
	<div id="loading" class="spinner-border text-success" role="status">
		<span class="sr-only">Loading...</span>
	</div>
	<!-- end loading -->
</div>
</main>
<script type="text/javascript" src="assets/fonts/fontawesome-5.15.1/js/all.min.js"></script>
<script type="text/javascript" src="assets/jQuery/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/bootstrap/js/popper.min.js"></script>
<script type="text/javascript" src="assets/plugins/nicescroll/jquery.nicescroll.min.js"></script>
<script type="text/javascript" src="assets/plugins/nicescroll/jquery.nicescroll.plus.js"></script>
<script type="text/javascript" src="assets/plugins/nprogress/nprogress.js"></script>
<script type="text/javascript">
	var keyword_error = "<?php _e($lang['keyword_error']) ?>";
	var link_search = "<?php _e($def['link_search']) ?>";
	var link_process_book_an_appointment = "<?php _e($def['link_process_book_an_appointment']) ?>";
	var fullname_error = "<?php _e($lang['not_fullname']) ?>";
	var phone_error = "<?php _e($lang['not_mobilephone']) ?>";
	var phone_invalid = "<?php _e($lang['phone_invalid']) ?>";
	var email_invalid = "<?php _e($lang['email_invalid']) ?>";
	var demand_error = "<?php _e($lang['not_demand']) ?>";
	var booktime_error = "<?php _e($lang['booktime_error']) ?>";
	var branch_error = "<?php _e($lang['branch_error']) ?>";
	var processing = "<?php _e($lang['processing']) ?>";
	var make_an_appointment = "<?php _e($lang['make_an_appointment']) ?>";
	var book_an_appointment_success = "<?php _e($lang['order_success']) ?>";
	var system_error = "<?php _e($lang['system_error']) ?>";
</script>
<?php 
	if (! isset($_REQUEST['pqh']) || (isset($_REQUEST['pqh']) && $mod1 == '')) {
?>
<script type="text/javascript" src="assets/plugins/jssor_slider/jssor.slider.min.js"></script>
<script type="text/javascript" src="assets/plugins/jssor_slider/jssor.script.js"></script>
<script type="text/javascript" src="assets/plugins/timeline_slider/timeline_slider.js"></script>
<script type="text/javascript" src="assets/plugins/owlcarousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/js/index.js"></script>
<?php
	}
?>
<script type="text/javascript">
	var langvi = "<?php _e($lang['lang_vi']) ?>";
	var langen = "<?php _e($lang['lang_en']) ?>";
	var currentLanguage = "<?php _e($_SESSION['lang']) ?>";
	var processLanguage = "<?php _e(URL.'language.php') ?>";
</script>
<script src="themes/plugins/toastr/toastr.min.js"></script>
<script src="themes/plugins/jquery.form/jquery.form.js"></script>    
<script type="text/javascript" src="assets/js/common.js"></script>
<?php
	if (isset($mod1) && !in_array($mod1, $array_not)) {
		_e('<script type="text/javascript" src="assets/js/product.js"></script>'); // <script type="text/javascript" src="assets/js/news.js"></script>
	}
	
	if (isset($mod1) && $mod1 == $def['link_fabout']) 
		_e('<script type="text/javascript" src="assets/plugins/jssor_slider/jssor.slider.min.js"></script>
		<script type="text/javascript" src="assets/plugins/jssor_slider/jssor.script.js"></script>
		<script type="text/javascript" src="assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script type="text/javascript">
			var language_tprev = "'.$lang['previous_array'].'";
			var language_tnext = "'.$lang['next_array'].'";
			var link_process_gallery_image = "module/process_gallery_image.php";
		</script>
		<script type="text/javascript" src="assets/js/landing_about.js"></script>');
	
	if (isset($mod1) && $mod1 == $def['link_franchise'])
		_e('<script type="text/javascript" src="assets/plugins/jssor_slider/jssor.slider.min.js"></script>
		<script type="text/javascript" src="assets/plugins/jssor_slider/jssor.script.js"></script>
		<script type="text/javascript">
			var captcha = "'.$def['link_captcha'].'"; 
			var not_fullname = "'.$lang['not_fullname'].'";
			var not_mobilephone = "'.$lang['not_mobilephone'].'";
			var phone_invalid = "'.$lang['phone_invalid'].'";
			var not_email = "'.$lang['not_email'].'";
			var email_invalid = "'.$lang['email_invalid'].'";
			var not_regisprovince = "'.$lang['ff_error_regisprovince'].'";
			var not_regisaddress = "'.$lang['ff_error_regisaddress'].'";
			var not_registotalarea = "'.$lang['ff_error_registotalarea'].'";
			var not_regisnumberoffloors = "'.$lang['ff_error_regisnumberoffloors'].'";
			var not_captcha = "'.$lang['not_captcha'].'";
			var captcha_not_right = "'.$lang['captcha_not_right'].'";
			var registerNow = "'.$lang['ff_regisnow'].'";
			var regissuccess = "'.$lang['ff_regisnowsuccess'].'";
			var link_process_regis = "'.$def['link_process_regis_consultation'].'";
		</script>
		<script type="text/javascript" src="assets/js/landing_branch.js"></script>');
	if (isset($mod1) && ($mod1 == $def['link_fnews'] || $mod1 == $def['link_fknowledge'] || $mod1 == $def['link_fpromotion']))
		_e('<script type="text/javascript" src="assets/js/news.js"></script>');
	if (isset($mod1) && ($mod1 == $def['link_freview'] || $mod1 == $def['link_celes_feel']))
		_e('<script type="text/javascript" src="assets/js/review.js"></script>');
?>
</body>