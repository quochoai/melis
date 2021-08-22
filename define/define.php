<?php
    define("URL", "http://localhost/melisbeaute/");
    define('_process', 'process/');

    $def = array(
        'link_login' => URL.'admin/login',
        'link_process_login' => URL.'admin/process/login.php',
        "admin_url" => URL.'admin/',
        
        'theme' => URL.'themes/',
        'views' => 'views/',
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
        'link_gallery' => 'quan-ly-gallery',
        'gimage' => 'hinh-anh',
        'gvideo' => 'video',
        'link_process_add_gallery' => _process.'gallery/add.php',
        'link_process_update_gallery' => _process.'gallery/update.php',
        'link_process_delete_gallery' => _process.'gallery/delete.php',
        'link_get_gallery' => 'views/gallery/get_info.php',
        
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
        'link_process_add_category_product' => _process.'products/category_add.php',
        'link_process_update_category_product' => _process.'products/category_update.php',
        'link_process_delete_category_product' => _process.'products/category_delete.php',
        'link_active_category_product' => _process.'products/category_active.php',
        'link_get_category_product' => 'views/products/get_info_category.php',
        'link_process_add_product' => _process.'products/add.php',
        'link_process_update_product' => _process.'products/update.php',
        'link_process_delete_product' => _process.'products/delete.php',
        'link_get_product' => 'views/products/get_info.php',
        
        // services
        'link_category_service' => 'quan-ly-danh-muc-dich-vu',
        'link_service' => 'quan-ly-dich-vu',
        'link_process_add_category_service' => _process.'services/category_add.php',
        'link_process_update_category_service' => _process.'services/category_update.php',
        'link_process_delete_category_service' => _process.'services/category_delete.php',
        'link_get_category_service' => 'views/services/get_info_category.php',
        'link_process_add_service' => _process.'services/add.php',
        'link_process_update_service' => _process.'services/update.php',
        'link_process_delete_service' => _process.'services/delete.php',
        'link_get_service' => 'views/services/get_info.php',
        
        // information
        'link_information' => 'quan-ly-thong-tin',
        'link_process_add_information' => _process.'information/add.php',
        'link_process_update_information' => _process.'information/update.php',
        'link_process_delete_information' => _process.'information/delete.php',
        'link_get_information' => 'views/information/get_info.php',
        
        
        'link_logout' => 'logout',
        'link_get_logout' => 'logout'
                
        
    );
