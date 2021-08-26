jQuery(document).ready(function($) {
    $(document).on('click', '.category_product', function() {
        $('#content_admin').html('');
        $.post(link_category_product, function(data) {
            $('#content_admin').html(data);
            $('title').html(title_manage_category_product);
        });
    });

    // manage_product
    $(document).on('click', '.manage_product', function() {
        let product_id = $(this).attr('rel');
        $('#content_admin').html('');
        $.post(link_product, { product_id: product_id }, function(html) {
            $('#content_admin').html(html);
            $('title').html(title_manage_product);
        });
    });
});