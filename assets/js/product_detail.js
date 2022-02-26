jQuery(document).ready(function(){
    // product_data_relate
    function loadDataProductRelated(page){
      loading_show();
      $.post(link_product_related_data, { page: page, wh: wh, mod2: mod2}, function(data){
          loading_hide();
          $('#dataProductRelated').html(data);                   
      });
    }
    loadDataProductRelated(1);  // For first time page load default results
    $('body').on('click','a.page_link_relate',function(){
        var page = $(this).attr('rel');
        loadDataProductRelated(page);
        $('html, body').animate({scrollTop: $(".relate_news_title").offset().top}, 2000);
    });
});