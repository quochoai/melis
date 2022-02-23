jQuery(document).ready(function(){
  // review_data
  function loadDataReview(page){
    loading_show();
    $.post(link_review_data, { page: page, wh: wh, mod1: mod1, folderUpload: folderUpload}, function(data){
        loading_hide();
        $('#dataReviews').html(data);                   
    });
  }
  loadDataReview(1);  // For first time page load default results
  $('body').on('click','a.page_link',function(){
      var page = $(this).attr('rel');
      loadDataReview(page);
      $('html, body').animate({scrollTop: $(".content_main").offset().top}, 2000);
  });

  // review_data_relate
  function loadDataReviewRelated(page){
    loading_show();
    $.post(link_review_related_data, { page: page, wh: wh, mod1: mod1}, function(data){
        loading_hide();
        $('#dataReviewRelated').html(data);                   
    });
  }
  loadDataReviewRelated(1);  // For first time page load default results
  $('body').on('click','a.page_link_relate',function(){
      var page = $(this).attr('rel');
      loadDataReviewRelated(page);
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
