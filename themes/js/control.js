jQuery(document).ready(function($) {
    // products
    // manage category product
    $(document).on('click', '.category_product', function() {
        $('#content_admin').empty();
        $('.main-sidebar .sidebar .nav-item').removeClass('menu-open');
        $('.nav .nav-item .nav-link').removeClass('active');
        $('.nav .nav-treeview').css('display', 'none');
        $(this).parent().addClass('menu-open');
        $.post(link_category_product, function(data) {
            $('#content_admin').html(data);
            $('title').html(title_manage_category_product);
        });
    });

    // manage_product
    $(document).on('click', '.manage_product', function() {
        let product_id = $(this).attr('rel');
        $('#content_admin').empty();
        $.post(link_product, { product_id: product_id }, function(html) {
            $('#content_admin').html(html);
            $('title').html(title_manage_product);
        });
    });

    // services
    // manage category service
    $(document).on('click', '.category_service', function() {
        $('#content_admin').empty();
        $('.main-sidebar .sidebar .nav-item').removeClass('menu-open');
        $('.nav .nav-item .nav-link').removeClass('active');
        $('.nav .nav-treeview').css('display', 'none');
        $(this).parent().addClass('menu-open');
        $.post(link_category_service, function(data) {
            $('#content_admin').html(data);
            $('title').html(title_manage_category_service);
        });
    });

    // manage_service
    $(document).on('click', '.manage_service', function() {
        let service_id = $(this).attr('rel');
        $('#content_admin').empty();
        $.post(link_service, { service_id: service_id }, function(html) {
            $('#content_admin').html(html);
            $('title').html(title_manage_service);
        });
    });

    // Gallery
    // gallery_photo
    $(document).on('click', '.gallery_photo', function() {
        $('#content_admin').empty();
        $('.main-sidebar .sidebar .nav-item').removeClass('menu-open');
        $(this).parent().parent().parent().addClass('menu-open');
        $('.nav .nav-item .nav-link').removeClass('active');
        $(this).addClass('active');
        $('.nav .nav-treeview').css('display', 'none');
        $(this).parent().parent().css('display', 'block');
        $.post(link_gallery, { gal_id: 1 }, function(data) {
            $('#content_admin').html(data);
            $('title').html(title_manage_gallery_photo);
        });
    });
    // gallery_video
    $(document).on('click', '.gallery_video', function() {
        $('#content_admin').empty();
        $('.main-sidebar .sidebar .nav-item').removeClass('menu-open');
        $(this).parent().parent().parent().addClass('menu-open');
        $('.nav .nav-item .nav-link').removeClass('active');
        $(this).addClass('active');
        $('.nav .nav-treeview').css('display', 'none');
        $(this).parent().parent().css('display', 'block');
        $.post(link_gallery, { gal_id: 2 }, function(data) {
            $('#content_admin').html(data);
            $('title').html(title_manage_gallery_video);
        });
    });

    // Slider
    // slider_home
    $(document).on('click', '.slider_home', function() {
        $('#content_admin').empty();
        $('.main-sidebar .sidebar .nav-item').removeClass('menu-open');
        $(this).parent().parent().parent().addClass('menu-open');
        $('.nav .nav-item .nav-link').removeClass('active');
        $(this).addClass('active');
        $('.nav .nav-treeview').css('display', 'none');
        $(this).parent().parent().css('display', 'block');
        $.post(link_slider, { hc_id: 1 }, function(data) {
            $('#content_admin').html(data);
            $('title').html(title_manage_slider_home);
        });
    });
    // slider_about
    $(document).on('click', '.slider_about', function() {
        $('#content_admin').empty();
        $('.main-sidebar .sidebar .nav-item').removeClass('menu-open');
        $(this).parent().parent().parent().addClass('menu-open');
        $('.nav .nav-item .nav-link').removeClass('active');
        $(this).addClass('active');
        $('.nav .nav-treeview').css('display', 'none');
        $(this).parent().parent().css('display', 'block');
        $.post(link_slider, { hc_id: 2 }, function(data) {
            $('#content_admin').html(data);
            $('title').html(title_manage_slider_about);
        });
    });
    // slider_branch
    $(document).on('click', '.slider_branch', function() {
        $('#content_admin').empty();
        $('.main-sidebar .sidebar .nav-item').removeClass('menu-open');
        $(this).parent().parent().parent().addClass('menu-open');
        $('.nav .nav-item .nav-link').removeClass('active');
        $(this).addClass('active');
        $('.nav .nav-treeview').css('display', 'none');
        $(this).parent().parent().css('display', 'block');
        $.post(link_slider, { hc_id: 3 }, function(data) {
            $('#content_admin').html(data);
            $('title').html(title_manage_slider_branch);
        });
    });

    // logout
    $(document).on('click', '.logout', function() {
        $.post(link_logout, function(data) {
            window.location.reload();
        });
    });
});