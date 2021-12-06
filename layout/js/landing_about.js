$(document).ready(function(){
	$(document).on('click', '.gallery_image', function(){
		var id = $(this).attr('rel');
		$.post(link_process_gallery_image, {id: id}, function(datas){
			var data = datas.split('vs;vs');
			var images = data[1];
			console.log(images);
			var list_image = JSON.parse(images);
			//var list_image = $.parseJSON('[' + data[1] + ']');
			var title_gallery_image = data[0];
			$('.img_gal').magnificPopup({
				items: list_image,
				gallery: {
					enabled: true,
					tCounter: '%curr% / %total%', // Markup for "1 of 7" counter
					tPrev: language_tprev, // Alt text on left arrow
					tNext: language_tnext, // Alt text on right arrow
				},
				type: 'image',
				/*
				callbacks: {
						close: function() {
							history.go(-1);
						}
				},
				*/
				mainClass: 'mfp-fade',
				titleSrc: function(item) {
						return item.el.attr('title');
				}
			}).magnificPopup('open');
			$('.mfp-figure').prepend('<div class="title_popup">'+ title_gallery_image +'</div>');
		});
	});

	// video 
	$('.popup-youtube').magnificPopup({
		//disableOn: 700,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,
		fixedContentPos: false,
		autoplay: true
	});
	// view all images
	$(document).on('click', '.viewall_images', function(){
		$('#viewallimages').removeClass('d-none');
		$('html, body').animate({scrollTop: $("#viewallimages").offset().top}, 2000);
	});
	// view all videos
	$(document).on('click', '.viewall_videos', function(){
		$('#viewallvideos').removeClass('d-none');
		$('html, body').animate({scrollTop: $("#viewallvideos").offset().top}, 2000);
	});
});
// tooltip
$(function () {
	$('[data-toggle="tooltip"]').tooltip();
})
// scroll menu
$(document).ready(function(){
		$('.navbar-item.page_link a').bind('click', function(e){
			e.preventDefault();
			var target = $(this).attr("href");
			$('html, body').stop().animate({
				scrollTop: $(target).offset().top
			}, 600, function() {
				location.hash = target;
			});
			return false;
	});
});

$(window).scroll(function() {
	var scrollDistance = $(window).scrollTop();
	$('.page-section').each(function(i) {
		if ($(this).position().top <= scrollDistance) {
			$('.navbar-item.page_link.active').removeClass('active');
			$('.navbar-item.page_link').eq(i).addClass('active');
			$('.svg.navbar-item.page_link.active').removeClass('active');
			$('.svg.navbar-item.page_link').eq(i).addClass('active');
			$('.text-navi.navbar-item.page_link.active').removeClass('active');
			$('.text-navi.navbar-item.page_link').eq(i).addClass('active');
		}
	});
}).scroll();
