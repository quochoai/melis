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
    // registerConsultation
    function registerConsultation (fullN, phoneN, emailA, provin, addressS, frontFlat, area, floor, exper, invest, captch, butt) {
      var fullname = $.trim($(fullN).val());
      var phoneNumber = $.trim($(phoneN).val());
      var email = $.trim($(emailA).val());
      var province = $.trim($(provin).val());
      var addressStore = $.trim($(addressS).val());
      var frontStore = $(frontFlat).val();
      var areaStore = $.trim($(area).val());
      var floorStore = $.trim($(floor).val());
      var experience = $.trim($(exper).val());
      var investment = $.trim($(invest).val());
      var captchaStr = $.trim($(captch).val());
      if (fullname.length == 0) {
        toastr.error(not_fullname);
        $(fullN).focus();
        $(fullN).addClass('is-invalid');
        return false;
      } else {
        $(fullN).removeClass('is-invalid');
        $(fullN).addClass('is-valid');
      }
      if (phoneNumber == 0) {
        toastr.error(not_mobilephone);
        $(phoneN).focus();
        $(phoneN).addClass('is-invalid');
        return false;
      } else {
        if (phoneNumber.length < 10 && phoneNumber.length > 11) {
          toastr.error(phone_invalid);
          $(phoneN).focus();
          $(phoneN).addClass('is-invalid');
          return false;
        } else {
          $(phoneN).removeClass('is-invalid');
          $(phoneN).addClass('is-valid');
        }
      }

      if (email.length == 0) {
        toastr.error(not_email);
        $(emailA).focus();
        $(emailA).addClass('is-invalid');
        return false;
      } else {
        var filter = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (!filter.test(email)) {
          toastr.error(email_invalid);
          $(emailA).focus();
          $(emailA).addClass('is-invalid');
          return false;
        } else {
          $(emailA).removeClass('is-invalid');
          $(emailA).addClass('is-valid');
        }
      }
      if (province.length == 0) {
        toastr.error(not_regisprovince);
        $(provin).focus();
        $(provin).addClass('is-invalid');
        return false;
      } else {
        $(provin).removeClass('is-invalid');
        $(provin).addClass('is-valid');
      }
      if (addressStore.length == 0) {
        toastr.error(not_regisaddress);
        $(addressS).focus();
        $(addressS).addClass('is-invalid');
        return false;
      } else {
        $(addressS).removeClass('is-invalid');
        $(addressS).addClass('is-valid');
      }
      if (areaStore.length == 0) {
        toastr.error(not_registotalarea);
        $(area).focus();
        $(area).addClass('is-invalid');
        return false;
      } else {
        $(area).removeClass('is-invalid');
        $(area).addClass('is-valid');
      }
      if (floorStore.length == 0) {
        toastr.error(not_regisnumberoffloors);
        $(floor).focus();
        $(floor).addClass('is-invalid');
        return false;
      } else {
        $(floor).removeClass('is-invalid');
        $(floor).addClass('is-valid');
      }
      if (captchaStr.length == 0) {
        toastr.error(not_captcha);
        $(captch).focus();
        $(captch).addClass('is-invalid');
        return false;
      } else {
        $(captch).removeClass('is-invalid');
        $(captch).addClass('is-valid');
      }
      $(butt).attr('disabled', true);
      $(butt).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ' + processing);
      $.post(link_process_regis, {fullname: fullname, phoneNumber: phoneNumber, email: email, province: province, addressStore: addressStore, frontStore: frontStore, areaStore: areaStore, floorStore: floorStore, experience: experience, investment: investment, captchaStr: captchaStr}, function(res) {
        $(butt).html(registerNow);
        $(butt).removeAttr('disabled');
        if (res == '1') {
          toastr.success(regissuccess);
          $(fullN).val('');
          $(phoneN).val('');
          $(emailA).val('');
          $(provin).val('');
          $(addressS).val('');
          $(area).val('');
          $(floor).val('');
          $(captch).val('');
          return false;
        } else {
          if (res == '2') {
            toastr.error(captcha_not_right);
            $(captch).focus();
            $(captch).addClass('is-invalid');
            return false;
          } else {
            toastr.error(system_error);
            $(captch).removeClass('is-invalid');
            return false;
          }
        }
      });
    }
    // enter
    $('#regisfullname, #regisphone, #regisemail, #regisprovince, #regisaddress, #front, #regisarea, #regisfloor, #experience, #investment, #regiscaptcha').keydown(function(e) {
      if (e.keyCode == 13) {
        e.preventDefault();
        registerConsultation('#regisfullname', '#regisphone', '#regisemail', '#regisprovince', '#regisaddress', '#front', '#regisarea', '#regisfloor', '#experience', '#investment', '#regiscaptcha', '#regisnow');
      }
    });
    $('#regisfullname1, #regisphone1, #regisemail1, #regisprovince1, #regisaddress1, #front1, #regisarea1, #regisfloor1, #experience1, #investment1, #regiscaptcha1').keydown(function(e) {
      if (e.keyCode == 13) {
        e.preventDefault();
        registerConsultation('#regisfullname1', '#regisphone1', '#regisemail1', '#regisprovince1', '#regisaddress1', '#front1', '#regisarea1', '#regisfloor1', '#experience1', '#investment1', '#regiscaptcha1', '#regisnow1');
      }
    });
    // click
    $(document).on('click', '#regisnow', function(){
      registerConsultation('#regisfullname', '#regisphone', '#regisemail', '#regisprovince', '#regisaddress', '#front', '#regisarea', '#regisfloor', '#experience', '#investment', '#regiscaptcha', '#regisnow');
    });
    $(document).on('click', '#regisnow1', function(){
      registerConsultation('#regisfullname1', '#regisphone1', '#regisemail1', '#regisprovince1', '#regisaddress1', '#front1', '#regisarea1', '#regisfloor1', '#experience1', '#investment1', '#regiscaptcha1', '#regisnow1');
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
