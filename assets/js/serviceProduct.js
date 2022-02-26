jQuery(document).ready(function(){
  // send 
  function sendDoctor() {
    var eFullname = $('#fullname_send');
    var eEmail = $('#email_send');
    var ePhone = $('#phone_send');
    var eFacebook = $('#facebook_send');
    var eQuestion = $('#question_send');
    var fullname_send = $.trim(eFullname.val());
    var email_send = $.trim(eEmail.val());
    var phone_send = $.trim(ePhone.val());
    var facebook_send = $.trim(eFacebook.val());
    var question_send = $.trim(eQuestion.val());
    var buttonClick = '#sendQuestion';

    if (fullname_send.length == 0) {
      toastr.error(fullname_error);
      eFullname.focus();
      eFullname.addClass("is-invalid");
      return false;
    } else {
      eFullname.removeClass("is-invalid");
      eFullname.addClass("is-valid");
    }
    if (email_send.length == 0) {
      toastr.error(not_email);
      eEmail.focus();
      eEmail.addClass("is-invalid");
      return false;
    } else {
      var filter = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if (!filter.test(email_send)) {
        toastr.error(email_invalid);
        eEmail.focus();
        eEmail.addClass('is-invalid');
        return false;
      } else {
        eEmail.removeClass('is-invalid');
        eEmail.addClass('is-valid');
      }
    }
    if (phone_send.length == 0) {
      toastr.error(phone_error);
      ePhone.focus();
      ePhone.addClass("is-invalid");
      return false;
    } else {
      if (phone_send.length > 11 && phone_send.length < 10) {
        toastr.error(phone_invalid);
        ePhone.focus();
        ePhone.addClass("is-invalid");
        return false;
      } else {
        ePhone.removeClass("is-invalid");
        ePhone.addClass("is-valid");
      }
    }
    if (question_send.length == 0) {
      toastr.error(not_question);
      eQuestion.focus();
      eQuestion.addClass("is-invalid");
      return false;
    } else {
      eQuestion.removeClass("is-invalid");
      eQuestion.addClass("is-valid");
    }
    loading(buttonClick, sendText, true);
    $.post (link_process_send_doctor, {
      fullname: fullname_send,
      email: email_send,
      phone: phone_send,
      facebook: facebook_send,
      question: question_send
    }, function(dataRes){
      loading(buttonClick, sendText, false);
      console.log(dataRes);
      if (dataRes == 1) {
        toastr.success(send_success);
        eFullname.val('');
        eEmail.val('');
        ePhone.val('');
        eFacebook.val('');
        eQuestion.val('');
      } else {
        toastr.error(system_error);
        return false;
      }
    });
  }
  // keydown
  // enter
  $('input#fullname_send, #email_send, #phone_send, #facebook_send').keydown(function(e) {
    if (e.keyCode == 13) {
      e.preventDefault();
      sendDoctor();
    }
  });
  // click
  $(document).on('click', '#sendQuestion', function(){
    sendDoctor();
  });
});
