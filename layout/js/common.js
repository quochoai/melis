jQuery(document).ready(function() {
    $(document).on('click', '.language', function(){
        $('#menu_language').toggle('slide');
    });
    $(document).mouseup(function (e) {
        var container = $("#menu_language");
        if(!container.is(e.target) && container.has(e.target).length === 0) {
            container.slideUp();
        }
    });
    NProgress.set(0.5);
    setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 1000);
    $("html").niceScroll({styler:"fb",cursorcolor:"#4d3424"});
    
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('#scroll-top').fadeIn();
        } else {
            $('#scroll-top').fadeOut();
        }
    });
    $('#scroll-top').click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
});