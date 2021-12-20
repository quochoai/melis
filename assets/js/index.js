$(document).ready(function(){
  $("#owl-carousel").owlCarousel({
    loop: false,
    margin: 16,
    nav: true,
    dots: false,
		rewind: true,
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
    loop: false,
    margin: 16,
    nav: false,
    dots: true,
		rewind: true,
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
    loop: false,
    margin: 16,
    nav: false,
    dots: true,
		rewind: true,
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

function bookAppointent() {
	var title_form = "";
	var processm = $("input[name='process_home']:checked").val();
	var fullname = $.trim($('#bookfullname').val());
	var phone = $.trim($('#bookphone').val());
	var email = $.trim($('#bookemail').val());
	var demand = $.trim($('#demand').val());
	var booktime = $.trim($('#booktime').val());
	var branch = $.trim($('#branch').val());
	if (fullname.length == 0) {
		toastr.error(fullname_error);
		$('#bookfullname').focus();
		$('#bookfullname').addClass("is-invalid");
		return false;
	} else {
		$('#bookfullname').removeClass("is-invalid");
		$('#bookfullname').addClass("is-valid");
	}
	if (phone.length == 0) {
		toastr.error(phone_error);
		$('#bookphone').focus();
		$('#bookphone').addClass("is-invalid");
		return false;
	} else {
		if (phone.length > 11 && phone.length < 10) {
			toastr.error(phone_invalid);
			$('#bookphone').focus();
			$('#bookphone').addClass("is-invalid");
			return false;
		} else {
			$('#bookphone').removeClass("is-invalid");
			$('#bookphone').addClass("is-valid");
		}
	}
	if (email.length > 0) {
		var filter = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if (!filter.test(email)) {
			toastr.error(email_invalid);
			$('#bookemail').focus();
			$('#bookemail').addClass('is-invalid');
			return false;
		} else {
			$('#bookemail').removeClass('is-invalid');
			$('#bookemail').addClass('is-valid');
		}
	}
	if (demand.length == 0) {
		toastr.error(demand_error);
		$('#demand').focus();
		$('#demand').addClass('is-invalid');
		return false;
	} else {
		$('#demand').removeClass('is-invalid');
		$('#demand').addClass('is-valid');
	}
	if (booktime.length == 0) {
		toastr.error(booktime_error);
		$('#booktime').focus();
		$('#booktime').addClass('is-invalid');
		return false;
	} else {
		$('#booktime').removeClass('is-invalid');
		$('#booktime').addClass('is-valid');
	}
	if (branch.length == 0) {
		toastr.error(branch_error);
		$('#branch').focus();
		$('#branch').addClass('is-invalid');
		return false;
	} else {
		$('#branch').removeClass('is-invalid');
		$('#branch').addClass('is-valid');
	}
	$('#bookappointment').attr('disabled', true);
  $('#bookappointment').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ' + processing);
	$.post(link_process_book_an_appointment, { title_form: title_form, processm: processm, fullname: fullname, phone: phone, email: email, demand: demand, booktime: booktime, branch: branch }, function(response) {
		$('#bookappointment').html(make_an_appointment);
    $('#bookappointment').removeAttr('disabled');
		if (response == '1') {
			toastr.success(book_an_appointment_success);
			$('#bookfullname').val('');
			$('#bookfullname').removeClass('is-valid');
			$('#bookphone').val('');
			$('#bookphone').removeClass('is-valid');
			$('#bookemail').val('');
			$('#bookemail').removeClass('is-valid');
			$('#demand').val('');
			$('#demand').removeClass('is-valid');
			$('#booktime').val('');
			$('#booktime').removeClass('is-valid');
			$('#branch').removeClass('is-valid');
		} else {
			toastr.error(system_error);
			return false;
		}
	})
}
// enter
$('input#bookfullname, #bookphone, #bookemail, #demand, #booktime, #branch').keydown(function(e) {
	if (e.keyCode == 13) {
		e.preventDefault();
		bookAppointent();
	}
});
// click
$(document).on('click', '#bookappointment', function(){
	bookAppointent();
});
