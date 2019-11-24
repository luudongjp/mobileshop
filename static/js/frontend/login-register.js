// validate email user login, register before submit
$('.login-email').keyup(function() {
	var l_email = $('.login-email').val();
	if (l_email.length > 0) {
		$('.error').css('display', 'block');
		if (!validateEmail(l_email)) {
			$('.error').html('Hãy điền email đúng định dạng !');
		} else {
			$('.error').html('');
		}
	} else {
		$('.error').css('display', 'none');
	}
});
$('.reg-email').keyup(function() {
	var r_email = $('.reg-email').val();
	if (r_email.length > 0) {
		$('.error').css('display', 'block');
		if (!validateEmail(r_email)) {
			$('.error').html('Hãy điền email đúng định dạng !');
		} else {
			$('.error').html('');
		}
	} else {
		$('.error').css('display', 'none');
	}
});

$('.login-password').keyup(function() {
	if ($('.login-password').val().length > 0) {
		$('#notice').css('display', 'block');
		var lowerCaseLetters = /[a-z]/g;
		if ($('.login-password').val().match(lowerCaseLetters)) {
			$('#letter').removeClass('invalid');
			$('#letter').addClass('valid');
			$('#lp-valid').val('true');
		} else {
			$('#letter').removeClass('valid');
			$('#letter').addClass('invalid');
			$('#lp-valid').val('false');
		}

		// Validate capital letters
		var upperCaseLetters = /[A-Z]/g;
		if ($('.login-password').val().match(upperCaseLetters)) {
			$('#capital').removeClass('invalid');
			$('#capital').addClass('valid');
			$('#lp-valid').val('true');
		} else {
			$('#capital').removeClass('valid');
			$('#capital').addClass('invalid');
			$('#lp-valid').val('false');
		}

		// Validate numbers
		var numbers = /[0-9]/g;
		if ($('.login-password').val().match(numbers)) {
			$('#number').removeClass('invalid');
			$('#number').addClass('valid');
			$('#lp-valid').val('true');
		} else {
			$('#number').removeClass('valid');
			$('#number').addClass('invalid');
			$('#lp-valid').val('false');
		}

		// Validate length
		if ($('.login-password').val().length >= 8) {
			$('#length').removeClass('invalid');
			$('#length').addClass('valid');
			$('#lp-valid').val('true');
		} else {
			$('#length').removeClass('valid');
			$('#length').addClass('invalid');
			$('#lp-valid').val('false');
        }
        if ($('#lp-valid').val() == 'true') {
			$('#notice').css('display', 'none');
		}
	} else {
		$('#notice').css('display', 'none');
	}
});
$('.reg-password').keyup(function() {
	if ($('.reg-password').val().length > 0) {
		$('#notice').css('display', 'block');
		var lowerCaseLetters = /[a-z]/g;
		if ($('.reg-password').val().match(lowerCaseLetters)) {
			$('#letter').removeClass('invalid');
			$('#letter').addClass('valid');
			$('#rp-valid').val('true');
		} else {
			$('#letter').removeClass('valid');
			$('#letter').addClass('invalid');
			$('#rp-valid').val('false');
		}

		// Validate capital letters
		var upperCaseLetters = /[A-Z]/g;
		if ($('.reg-password').val().match(upperCaseLetters)) {
			$('#capital').removeClass('invalid');
			$('#capital').addClass('valid');
			$('#rp-valid').val('true');
		} else {
			$('#capital').removeClass('valid');
			$('#capital').addClass('invalid');
			$('#rp-valid').val('false');
		}

		// Validate numbers
		var numbers = /[0-9]/g;
		if ($('.reg-password').val().match(numbers)) {
			$('#number').removeClass('invalid');
			$('#number').addClass('valid');
			$('#rp-valid').val('true');
		} else {
			$('#number').removeClass('valid');
			$('#number').addClass('invalid');
			$('#rp-valid').val('false');
		}

		// Validate length
		if ($('.reg-password').val().length >= 8) {
			$('#length').removeClass('invalid');
			$('#length').addClass('valid');
			$('#rp-valid').val('true');
		} else {
			$('#length').removeClass('valid');
			$('#length').addClass('invalid');
			$('#rp-valid').val('false');
		}
		if ($('#rp-valid').val() == 'true') {
			$('#notice').css('display', 'none');
		}
	} else {
		$('#notice').css('display', 'none');
	}
});
function validateEmail(email) {
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(String(email).toLowerCase());
}

// Search exists email when user register new account
$('.reg-email').keyup(function() {
	$.ajax({
		url: baseurl + 'user/searchAccount/' + $('.reg-email').val(), // gửi ajax đến action
		type: 'get', // chọn phương thức gửi là get
		dateType: 'text', // dữ liệu trả về dạng text
		data: {},
		success: function(result) {
			if (result.length > 1) {
				$('#search-email').css('display', 'block');
				$('#search-email').html('Email này đã được sử dụng !');
			} else {
				$('#search-email').html('');
				$('#search-email').css('display', 'none');
			}
		}
	});
});

// Check value of inputs when submit
$('#login-form').submit(function(e) {
	// Validate email
	var l_email = $('.login-email').val();
	if (!validateEmail(l_email)) {
		e.preventDefault();
	} else {
		if ($('#lp-valid').val() === 'false') {
			$('#notice').css('display', 'block');
			e.preventDefault();
		} else {
			$('#notice').css('display', 'none');
		}
	}
});
$('#register-form').submit(function(e) {
	// Validate email
	var r_email = $('.reg-email').val();
	if (!validateEmail(r_email)) {
		e.preventDefault();
	} else {
		if ($('#rp-valid').val() === 'false') {
			$('#notice').css('display', 'block');
			e.preventDefault();
		} else {
			$('#notice').css('display', 'none');
		}
	}
});
