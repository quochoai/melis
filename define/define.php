<?php
	define("URL", "http://localhost/melisbeaute/");
	define('_process', 'process/');
	define('_upload', URL.'upload/');
	$def = array(
		'link_login' => URL.'admin/login',
		'link_process_login' => URL.'admin/login/login.php',
		"admin_url" => URL.'admin/',
		'theme' => URL.'themes/',
		'views' => 'views/',

		'no_image_available' => 'assets/img/no_image_available.jpg',
		'img_queen_nature_home' => 'assets/img/product_melis_spa_top_1.png',

		// upload product
		'upload_product_avatar' => _upload.'product/avatar/',
		'upload_product_detail' => _upload.'product/detail/',
		'upload_product_thumbfb' => _upload.'product/thumbfb/',
		
		// upload service
		'upload_service_avatar' => _upload.'service/avatar/',
		'upload_service_detail' => _upload.'service/detail/',
		'upload_service_thumbfb' => _upload.'service/thumbfb/',

		// upload news
		'upload_news' => _upload.'news/',
		'upload_knowledge' => _upload.'knowledge/',
		'upload_promotion' => _upload.'promotion/',

		// upload partner
		'upload_partner' => _upload.'partner/',

		// upload landing
		'upload_landing_about' => _upload.'landing/about/',
		'upload_landing_branch' => _upload.'landing/branch/',

		// upload review
		'upload_review_customer' => _upload.'review/customer/',
		'upload_review_star' => _upload.'review/star/',

		// upload slider
		'upload_slider_about' => _upload.'slider/about/',
		'upload_slider_branch' => _upload.'slider/branch/',
		'upload_slider_home' => _upload.'slider/home/',

		// upload gallery
		'upload_gallery_image_avatar' => _upload.'gallery/images/avatar/',
		'upload_gallery_image_gallery' => _upload.'gallery/images/gallery/',
		'upload_gallery_video_avatar' => _upload.'gallery/videos/',


		//login
		'id_profile_code' => 'profile_code',
		'id_password' => 'password',
		'id_remember' => 'remember',
		'id_button_login' => 'login',
		'class_is_invalid' => 'is-invalid',
		'class_is_valid' => 'is-valid',
		
		// admin
		'nav-flat' => 'nav-flat',
		// forms
		'link_form' => 'quan-ly-forms',
		'link_add_form' => 'them-element-form',
		'link_update_form' => 'cap-nhat-element-form',
		'link_process_add_form' => _process.'forms/add.php',
		'link_process_update_form' => _process.'forms/update.php',
		'link_process_delete_form' => _process.'forms/delete.php',
		
		//config
		'link_config' => 'config-website',
		'link_process_config_edit' => _process.'config/edit.php',
		'link_html' => 'quan-ly-html',
		'link_update_html' => 'cap-nhat-html',
		'modal_update_html' => 'views/html/modal_update_html.php',
		'link_process_update_html' => _process.'html/update.php',
		'link_change_password' => 'thay-doi-mat-khau',
		'link_process_change_password' => _process.'profile/change_password.php',
		
		// partner
		'link_partner' => 'views/partner/list.php',
		'link_process_add_partner' => _process.'partner/add.php',
		'link_process_update_partner' => _process.'partner/update.php',
		'link_add_partner' => 'views/partner/add.php',
		'link_update_partner' => 'views/partner/update.php',
		
		// gallery
		'link_gallery' => 'views/gallery/list.php',
		'link_process_add_gallery' => _process.'gallery/add.php',
		'link_process_update_gallery' => _process.'gallery/update.php',
		'link_add_gallery' => 'views/gallery/add.php',
		'link_update_gallery' => 'views/gallery/update.php',
		
		// slider
		'link_slider' => 'views/slider/list.php',
		'link_process_add_slider' => _process.'slider/add.php',
		'link_process_update_slider' => _process.'slider/update.php',
		'link_add_slider' => 'views/slider/add.php',
		'link_update_slider' => 'views/slider/update.php',
		
		// review
		'link_review' => 'views/review/list.php',
		'link_process_add_review' => _process.'review/add.php',
		'link_process_update_review' => _process.'review/update.php',
		'link_add_review' => 'views/review/add.php',
		'link_update_review' => 'views/review/update.php',
		
		// news
		'link_news' => 'views/news/list.php',
		'link_process_add_news' => _process.'news/add.php',
		'link_process_update_news' => _process.'news/update.php',
		'link_add_news' => 'views/news/add.php',
		'link_update_news' => 'views/news/update.php',
		
		// landing page
		'link_landing' => 'views/landing/list.php',
		'link_process_add_landing' => _process.'landing/add.php',
		'link_process_update_landing' => _process.'landing/update.php',
		'link_add_landing' => 'views/landing/add.php',
		'link_update_landing' => 'views/landing/update.php',
		
		// products
		'file_category_product' => 'views/products/list_category.php',
		'link_process_add_category_product' => _process.'products/category_add.php',
		'link_process_update_category_product' => _process.'products/category_update.php',
		'link_process_delete_category_product' => _process.'products/category_delete.php',
		'link_active_category_product' => _process.'products/category_active.php',
		'link_add_category_product' => 'views/products/add_cate.php',
		'link_get_category_product' => 'views/products/get_info_category.php',
		'link_process_sort_category_product' => _process.'products/category_sort.php',
		'file_product' => 'views/products/list.php',
		'link_process_add_product' => _process.'products/add.php',
		'link_process_update_product' => _process.'products/update.php',
		'link_process_delete_product' => _process.'products/delete.php',
		'link_add_product' => 'views/products/add.php',
		'link_update_product' => 'views/products/update.php',
		'link_process_sort_product' => _process.'products/sort.php',
		
		// services
		// category
		'link_category_service' => 'views/services/list_category.php',
		'link_category_service_add' => 'views/services/add_cate.php',
		'link_category_service_update' => 'views/services/category_update.php',
		'link_process_add_category_service' => _process.'services/category_add.php',
		'link_process_update_category_service' => _process.'services/category_update.php',
		'link_process_delete_category_service' => _process.'services/category_delete.php',
		
		// service
		'link_service' => 'views/services/list.php',
		'link_service_add' => 'views/services/add.php',
		'link_service_update' => 'views/services/update.php',
		'link_process_add_service' => _process.'services/add.php',
		'link_process_update_service' => _process.'services/update.php',
		'link_price_service' => 'views/services/list_price.php',
		'link_price_service_add' => 'views/services/add_price.php',
		'link_price_service_update' => 'views/services/update_price.php',
		'link_process_add_price_service' => _process.'services/add_price.php',
		'link_process_update_price_service' => _process.'services/update_price.php',

		
		// information
		'link_information' => 'quan-ly-thong-tin',
		'link_process_add_information' => _process.'information/add.php',
		'link_process_update_information' => _process.'information/update.php',
		'link_process_delete_information' => _process.'information/delete.php',
		'link_get_information' => 'views/information/get_info.php',

		// link sort, active, delete for all
		'link_process_sort' => _process.'general/sort.php',
		'link_process_active' => _process.'general/active.php',
		'link_process_delete' => _process.'general/delete.php',
		
		
		'link_logout' => _process.'logout.php', 
		
		// link front end
		'cateid_product' => 1,
		'cateid_service' => 2,
		'news_id_news' => 1,
		'news_id_knowledge' => 2,
		'news_id_promotion' => 3,
		'ld_id_about' => 1,
		'ld_id_franchise' => 2,
		'gal_id_image' => 1,
		'gal_id_video' => 2,
		'link_fabout' => 'gioi-thieu.html',
		'link_franchise' => 'nhuong-quyen.html',
		'link_fservice' => 'dich-vu',
		'link_queennature' => 'queen-nature',
		'link_freview' => 'cam-nhan-khach-hang',
		'link_celes_feel' => 'cam-nhan-cua-nguoi-noi-tieng',
		'link_fknowledge' => 'kien-thuc',
		'link_fnews' => 'tin-tuc',
		'link_fpromotion' => 'khuyen-mai',
		'link_search' => 'tim-kiem',
		'link_video_gallery' => 'thu-vien-video',
		'link_process_book_an_appointment' => 'module/process_book_an_appointment.php',
		'link_captcha' => 'module/captcha.php',
		'link_process_regis_consultation' => 'module/process_regis_consultation.php',	
		'link_news_data' => 'module/news_data.php',
		'link_news_related_data' => 'module/news_related_data.php',
		'perpage_news' => 7,
		'perpage_news_relate' => 9,
		'perpage_product' => 7,
		'perpage_review' => 7,
		'perpage_review_relate' => 9,
		'rv_id_customer' => 1,
		'rv_id_star' => 2,
		'cate_id_product' => 1,
		'cate_id_service' => 2,
		'perpage_service_relate' => 9,
		'perpage_product_relate' => 9,
		'link_review_data' => 'module/review_data.php',
		'link_review_related_data' => 'module/review_related_data.php',
		'link_service_related_data' => 'module/service_related_data.php',
		'link_process_send_doctor' => 'module/process_send_doctor.php',
		'link_product_related_data' => 'module/product_related_data.php',
		'limit_gallery_show' => 6,
	);
