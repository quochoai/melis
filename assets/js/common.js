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
    $("html, body").animate({scrollTop: 0}, 600);
    return false;
  });
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
  $('.book-calendar-demand').click(function(){
    $('#modal-book-calendar-demand').modal('show');
  });
  function loading(button, text, isLoading) {
    if (isLoading) {
      $(button).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ' + processing);
      $(button).attr('disabled', true);
    } else {
      $(button).html(text);
      $(button).removeAttr('disabled');
    }
  }
  function bookMeet() {
    var title_form = $.trim($('#title_form').text());
    var processm = $("input[name='process']:checked").val();
    var fullname = $.trim($('#bookfullnamem').val());
    var phone = $.trim($('#bookphonem').val());
    var email = $.trim($('#bookemailm').val());
    var demand = $.trim($('#demandm').val());
    var booktime = $.trim($('#booktimem').val());
    var branch = $.trim($('#branchm').val());
    if (fullname.length == 0) {
      toastr.error(fullname_error);
      $('#bookfullnamem').focus();
      $('#bookfullnamem').addClass("is-invalid");
      return false;
    } else {
      $('#bookfullnamem').removeClass("is-invalid");
      $('#bookfullnamem').addClass("is-valid");
    }
    if (phone.length == 0) {
      toastr.error(phone_error);
      $('#bookphonem').focus();
      $('#bookphonem').addClass("is-invalid");
      return false;
    } else {
      if (phone.length > 11 && phone.length < 10) {
        toastr.error(phone_invalid);
        $('#bookphonem').focus();
        $('#bookphonem').addClass("is-invalid");
        return false;
      } else {
        $('#bookphonem').removeClass("is-invalid");
        $('#bookphonem').addClass("is-valid");
      }
    }
    if (email.length > 0) {
      var filter = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if (!filter.test(email)) {
        toastr.error(email_invalid);
        $('#bookemailm').focus();
        $('#bookemailm').addClass('is-invalid');
        return false;
      } else {
        $('#bookemailm').removeClass('is-invalid');
        $('#bookemailm').addClass('is-valid');
      }
    }
    if (demand.length == 0) {
      toastr.error(demand_error);
      $('#demandm').focus();
      $('#demandm').addClass('is-invalid');
      return false;
    } else {
      $('#demandm').removeClass('is-invalid');
      $('#demandm').addClass('is-valid');
    }
    if (booktime.length == 0) {
      toastr.error(booktime_error);
      $('#booktimem').focus();
      $('#booktimem').addClass('is-invalid');
      return false;
    } else {
      $('#booktimem').removeClass('is-invalid');
      $('#booktimem').addClass('is-valid');
    }
    if (branch.length == 0) {
      toastr.error(branch_error);
      $('#branchm').focus();
      $('#branchm').addClass('is-invalid');
      return false;
    } else {
      $('#branchm').removeClass('is-invalid');
      $('#branchm').addClass('is-valid');
    }
    /*
    $('#bookmeetm').attr('disabled', true);
    $('#bookmeetm').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ' + processing);
    */
    loading('#bookmeetm', make_an_appointment, true);
    $.post(link_process_book_an_appointment, { title_form: title_form, processm: processm, fullname: fullname, phone: phone, email: email, demand: demand, booktime: booktime, branch: branch }, function(response){
      /*$('#bookmeetm').html(make_an_appointment);
      $('#bookmeetm').removeAttr('disabled');*/
      loading('#bookmeetm', make_an_appointment, false);
      if (response == '1') {
        toastr.success(book_an_appointment_success);
        $('#bookfullnamem').val('');
        $('#bookfullnamem').removeClass('is-valid');
        $('#bookphonem').val('');
        $('#bookphonem').removeClass('is-valid');
        $('#bookemailm').val('');
        $('#bookemailm').removeClass('is-valid');
        $('#demandm').val('');
        $('#demandm').removeClass('is-valid');
        $('#booktimem').val('');
        $('#booktimem').removeClass('is-valid');
        $('#branchm').removeClass('is-valid');
        $('#modal-book-calendar-demand').modal('hide');
      } else {
        toastr.error(system_error);
        return false;
      }
    });
  }
  // enter
  $('input#bookfullnamem, #bookphonem, #bookemailm, #demandm, #booktimem, #branchm').keydown(function(e) {
    if (e.keyCode == 13) {
      e.preventDefault();
      bookMeet();
    }
  });
  // click
  $(document).on('click', '#bookmeetm', function(){
    bookMeet();
  });

  // search
  function searchKey() {
    pathArray = location.pathname.split( '/' );
    url = link_search + '/';        
    var filter_keyword = $.trim($('#txtSearch').val());
    if (filter_keyword != '') {
      url += encodeURIComponent(filter_keyword).replace(/%20/gi, "+").toLowerCase() + '/';
      $("input#txtSearch").val(filter_keyword);
      location = url;
    } else {
      toastr.error(keyword_error);
      $('#txtSearch').focus();
    }
  } 
  $('input#txtSearch').keydown(function(e) {
    if (e.keyCode == 13) {
      e.preventDefault();
      searchKey();
    }
  });
  $('#searchKey').click(function(e){
    e.preventDefault();
    searchKey();
  });
  $(document).on('click', '.language_choose', function(){
    var language = $(this).attr('rel');
    if (language == 'en') 
      $('.language').html('<img src="assets/img/en.png" alt="'+langen+'" />');
    else
      $('.language').html('<img src="assets/img/vi.png" alt="'+langvi+'" />');
    $('#menu_language').slideUp();
    if (currentLanguage != language) {
      $.post(processLanguage, {set: language}, function(data){
        window.location.assign(data);
      });
    }
  });
});
// loading show
function loading_show() {
  $('#loading').show();
}
// loading hide
function loading_hide() {
  $('#loading').hide();
}