<?php
    define("URL", "http://localhost/melisbeaute/");
    define('_process', 'process/');
    define('_upload', URL.'upload/');
    

    $def = array(
        'link_login' => URL.'admin/login',
        'link_process_login' => URL.'admin/process/login.php',
        "admin_url" => URL.'admin/',
        
        'theme' => URL.'themes/',
        'views' => 'views/',
        
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
        'link_partner' => 'quan-ly-doi-tac',
        'link_process_add_partner' => _process.'partner/add.php',
        'link_process_update_partner' => _process.'partner/update.php',
        'link_process_delete_partner' => _process.'partner/delete.php',
        'link_get_partner' => 'views/partner/get_info.php',
        
        // gallery
        'link_gallery' => 'views/gallery/list.php',
        'link_process_add_gallery' => _process.'gallery/add.php',
        'link_process_update_gallery' => _process.'gallery/update.php',
        'link_process_delete_gallery' => _process.'gallery/delete.php',
        'link_process_active_gallery' => _process.'gallery/active.php',
        'link_process_sort_gallery' => _process.'gallery/sort.php',
        'link_add_gallery' => 'views/gallery/add.php',
        'link_update_gallery' => 'views/gallery/update.php',
        
        // slider
        'link_slider' => 'quan-ly-slider',
        'shome' => 'slider-home',
        'slpabout' => 'slider-landing-page-gioi-thieu',
        'slpnhuongquyen' => 'slider-landing-page-nhuong-quyen',
        'link_process_add_slider' => _process.'slider/add.php',
        'link_process_update_slider' => _process.'slider/update.php',
        'link_process_delete_slider' => _process.'slider/delete.php',
        'link_get_slider' => 'views/slider/get_info.php',
        
        // review
        'link_review' => 'quan-ly-phan-hoi-khach-hang',
        'rcustomer' => 'khach-hang',
        'rstar' => 'nguoi-noi-tieng',
        'link_process_add_review' => _process.'review/add.php',
        'link_process_update_review' => _process.'review/update.php',
        'link_process_delete_review' => _process.'review/delete.php',
        'link_get_review' => 'views/review/get_info.php',
        
        // news
        'link_news' => 'quan-ly-tin-tuc',
        'n_news' => 'tin-tuc',
        'n_knowledge' => 'kien-thuc',
        'link_process_add_news' => _process.'news/add.php',
        'link_process_update_news' => _process.'news/update.php',
        'link_process_delete_news' => _process.'news/delete.php',
        'link_get_news' => 'views/news/get_info.php',
        
        // landing page
        'link_landing' => 'quan-ly-landing-page',
        'landing_about' => 'landing-page-gioi-thieu',
        'landing_nhuong_quyen' => 'landing-page-nhuong-quyen',
        'link_process_add_landing' => _process.'landing/add.php',
        'link_process_update_landing' => _process.'landing/update.php',
        'link_process_delete_landing' => _process.'landing/delete.php',
        'link_get_landing' => 'views/landing/get_info.php',
        
        // products
        'link_category_product' => 'quan-ly-danh-muc-san-pham',
        'link_product' => 'quan-ly-san-pham',
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
        'link_active_service' => _process.'services/active.php',
        
        // service
        'link_service' => 'views/services/list.php',
        'link_service_add' => 'views/services/add.php',
        'link_service_update' => 'views/services/update.php',
        'link_process_add_service' => _process.'services/add.php',
        'link_process_update_service' => _process.'services/update.php',
        'link_process_delete_service' => _process.'services/delete.php',

        'link_process_sort_service' => _process.'services/sort.php',
        'link_process_sort_service_single' => _process.'services/single_sort.php',
        
        
        // information
        'link_information' => 'quan-ly-thong-tin',
        'link_process_add_information' => _process.'information/add.php',
        'link_process_update_information' => _process.'information/update.php',
        'link_process_delete_information' => _process.'information/delete.php',
        'link_get_information' => 'views/information/get_info.php',
        
        
        'link_logout' => 'logout',
        'link_get_logout' => 'logout'
                
        
    );
