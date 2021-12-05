jQuery(document).ready(function(){
  $(document).on('click', '.sidebar li', function(){
    $('.sidebar li ul').hide();
    $('.sidebar li ul').removeClass('block');
    var ulc = $(this).children('ul');
    ulc.slideDown('slow');
    ulc.addClass('block');
    
    var icc = $('.sidebar li p').children();
    icc.removeClass('fa-caret-down');
    icc.addClass('fa-caret-right');

    var ic = $(this).children('p').children();
    ic.removeClass('fa-caret-right');
    ic.addClass('fa-caret-down');
  });
});

flag = false;
$(window).scroll(function () {
  if ($(this).scrollTop() > 59) {
      //$('.control_navbar').addClass("fixed_navbar");
      $('.fixed_navbar .navbar').css('padding-top', '0');
      $('.fixed_navbar .navbar').css('padding-bottom', '0');
      $('li.lg img.mom').attr('src', 'img/melismom_m.png');
      $('li.lg img.beaute').attr('src', 'img/melisbeaute_m.png');
  } else {
      //$('.control_navbar').removeClass("fixed_navbar");
      $('.fixed_navbar .navbar').css('padding-top', '0.5rem');
      $('.fixed_navbar .navbar').css('padding-bottom', '0.5rem');
      $('li.lg img.mom').attr('src', 'img/melismom.png');
      $('li.lg img.beaute').attr('src', 'img/melisbeaute.png');
      flag = false;
  }
});
flag = false;
