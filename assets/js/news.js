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
  // news_data
  function loadDataNews(page){
    loading_show();
    $.post(link_news_data, { page: page, notId: notId, news_id: news_id, mod1: mod1, folderUpload: folderUpload}, function(data){
        loading_hide();
        $('#datanews').html(data);                   
    });
  }
  loadDataNews(1);  // For first time page load default results
  $('body').on('click','a.page_link',function(){
      var page = $(this).attr('rel');
      loadDataNews(page);
      $('html, body').animate({scrollTop: $(".three_news").offset().top}, 2000);
  });

  // news_data_relate
  function loadDataNewsRelated(page){
    loading_show();
    $.post(link_news_related_data, { page: page, wh: wh, mod1: mod1}, function(data){
        loading_hide();
        $('#dataNewsRelated').html(data);                   
    });
  }
  loadDataNewsRelated(1);  // For first time page load default results
  $('body').on('click','a.page_link_relate',function(){
      var page = $(this).attr('rel');
      loadDataNewsRelated(page);
      $('html, body').animate({scrollTop: $(".relate_news_title").offset().top}, 2000);
  });
});

flag = false;
$(window).scroll(function () {
  if ($(this).scrollTop() > 59) {
    $('.fixed_navbar .navbar').css('padding-top', '0');
    $('.fixed_navbar .navbar').css('padding-bottom', '0');
    $('li.lg img.mom').attr('src', 'assets/img/melismom_m.png');
    $('li.lg img.beaute').attr('src', 'assets/img/melisbeaute_m.png');
  } else {
    $('.fixed_navbar .navbar').css('padding-top', '0.5rem');
    $('.fixed_navbar .navbar').css('padding-bottom', '0.5rem');
    $('li.lg img.mom').attr('src', 'assets/img/melismom.png');
    $('li.lg img.beaute').attr('src', 'assets/img/melisbeaute.png');
    flag = false;
  }
});
flag = false;
