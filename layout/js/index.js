$(document).ready(function(){
  $("#owl-carousel").owlCarousel({
    loop: true,
    margin: 16,
    nav: true,
    dots: false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:3
        }
    }
  });
  $("#owl-carousel-2").owlCarousel({
    loop: true,
    margin: 16,
    nav: false,
    dots: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:2
        }
    }
  });
  $("#owl-carousel-3").owlCarousel({
    loop: true,
    margin: 16,
    nav: false,
    dots: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
  });
  // #bookmeet click
  $('#bookmeet').click(function(){
    var booktime = $('#booktime').val();
    // 2021-10-28T11:00
  });
});

flag = false;
$(window).scroll(function () {
  if ($(this).scrollTop() > 300) {
      $('.control_navbar').addClass("fixed_navbar");
      $('li.lg img.mom').attr('src', 'img/melismom_m.png');
      $('li.lg img.beaute').attr('src', 'img/melisbeaute_m.png');
  } else {
      $('.control_navbar').removeClass("fixed_navbar");
      $('li.lg img.mom').attr('src', 'img/melismom.png');
      $('li.lg img.beaute').attr('src', 'img/melisbeaute.png');
      flag = false;
  }
});
flag = false;