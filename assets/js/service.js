jQuery(document).ready(function(){
  // service_data_relate
  function loadDataServiceRelated(page){
    loading_show();
    $.post(link_service_related_data, { page: page, wh: wh, mod2: mod2}, function(data){
        loading_hide();
        $('#dataServiceRelated').html(data);                   
    });
  }
  loadDataServiceRelated(1);  // For first time page load default results
  $('body').on('click','a.page_link_relate',function(){
      var page = $(this).attr('rel');
      loadDataServiceRelated(page);
      $('html, body').animate({scrollTop: $(".relate_news_title").offset().top}, 2000);
  });
});
