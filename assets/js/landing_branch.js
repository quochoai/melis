// scroll menu
$(document).ready(function(){
  //$('a[href*=#]').bind('click', function(e) {
    $('.navbar-item.page_link a').bind('click', function(e){
      e.preventDefault(); // prevent hard jump, the default behavior

    var target = $(this).attr("href"); // Set the target as variable
    // perform animated scrolling by getting top-position of target-element and set it as scroll target
    //var desiredHeight = ($(window).height() - 116);
    $('html, body').stop().animate({
        scrollTop: $(target).offset().top// - ($(window).height() - 116)
    }, 600, function() {
        location.hash = target; //attach the hash (#jumptarget) to the pageurl
    });
    return false;
  });
});

$(window).scroll(function() {
  var scrollDistance = $(window).scrollTop();
  // Assign active class to nav links while scolling
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

function loadCaptcha(element) {
  $.post(captcha, function(res){
      $(element).html(res);
  });
}
$('#img-captcha').click(function(){
  loadCaptcha('#img-captcha');
});
$('#img-captcha').click(function(){
  loadCaptcha('#img-captcha');
});
