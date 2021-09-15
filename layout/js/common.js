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
    $('.help-services').hover(function() {
        $(this).find('.' + this.id).removeClass('d-none').delay(200);
        $(this).find('.' + this.id).addClass('transition');
    }, function() {
        $(this).find('.' + this.id).addClass('d-none').delay(200);
        $(this).find('.' + this.id).addClass('transition');
    });
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