// Sign in functions
function loginPage() {
	$('#register-div').fadeOut(function() {
		$('#login').fadeIn();
	});
}

function backToRegister() {
	$('#register-2').hide();
	$('#login').fadeOut(function() {
		$('#register-div').fadeIn();
		$('#register-1').fadeIn();
	});
}

// Register functions
function nextRegisterDetails() {
	if ($('#register-1').css('display') == "block") {
		// Validate
		if (validateEmail($("input[name=\"email-first-page\"]")) && validatePass($("input[name=\"password-first-page\"]"))) {
			// Save data to next div
			$('input[name="email-hidden"]').attr('value', $('input[name="email-first-page"]').val());
			$('input[name="password-hidden"]').attr('value', $('input[name="password-first-page"]').val());
			// Naviagte
			$('#register-1').fadeOut(function() {
				$('#register-2').fadeIn();
			});
			$('html, body').animate({
				scrollTop: $(document).height()
			}, 1000);
		}
	} else if ($('#register-2').css('display') == "block") {
		// Do some validation
		// Save data to next div
		$('input[name="f-name-hidden"]').attr('value', $('input[name="first-name"]').val());
		$('input[name="l-name-hidden"]').attr('value', $('input[name="last-name"]').val());
		$('input[name="address-l1-hidden"]').attr('value', $('input[name="address-l1"]').val());
		$('input[name="address-l2-hidden"]').attr('value', $('input[name="address-l2"]').val());
		$('input[name="address-city-hidden"]').attr('value', $('input[name="city"]').val());
		$('input[name="address-county-hidden"]').attr('value', $('select[name="county"]').val());
		$('input[name="address-postcode-hidden"]').attr('value', $('input[name="postcode"]').val());
		$('input[name="address-country-hidden"]').attr('value', $('input[name="country"]').val());
		$('input[name="mobile-hidden"]').attr('value', $('input[name="mobile"]').val());
		$('input[name="dob-hidden"]').attr('value', $('input[name="dob"]').val());
		// Navigate
		$('#register-2').fadeOut(function() {
			$('#register-3').fadeIn();
		});
	}
}

function prevRegisterDetails() {
	// Do something
	if ($('#register-2').css('display') == "block") {
		// Naviagte
		$('#register-2').fadeOut(function() {
			$('#register-1').fadeIn();
		});
	} else if ($('#register-3').css('display') == "block") {
		// Naviagte
		$('#register-3').fadeOut(function() {
			$('#register-2').fadeIn();
		});
		$('html, body').animate({
			scrollTop: $(document).height()
		}, 1000);
	}
}

function validateLostFocus(element) {
	// if ($(element).attr('type') == 'email') {
	// 	validateEmail(element);
	// } else if ($(element).attr('type') == 'password') {
	// 	validatePass(element);
	// } else if ($(element).attr('name') == 'postcode') {
	// 	validatePostcode(element);
	// }
	switch ($(element).attr('name')) {
		case 'email-first-page':
			validateEmail(element);
			break;
		case 'password-first-page':
			validatePass(element);
			break;
		case 'first-name':
			validateEmptyField(element);
			break;
		case 'last-name':
			validateEmptyField(element);
			break;
		case 'address-l1':
			validateEmptyField(element);
			break;
		case 'city':
			validateEmptyField(element);
			break;
		case 'postcode':
			validatePostcode(element);
			break;
		case 'country':
			validateEmptyField(element);
			break;
		case 'mobile':
			validateNumber(element);
			break;
		case 'dob':
			validateEmptyField(element);
			break;
	}
}

function inputStyling(element, error) {
	if (error) {
		$(element).removeClass("is-valid");
		$(element).addClass("is-invalid");
	} else {
		$(element).removeClass("is-invalid");
		$(element).addClass("is-valid");
	}
}

function validateEmail(element) {
    var emailInput = $(element);
    var email = emailInput.val();
    
    // Remove ariadescribedby element
    if ($('#emailHelp').css('display') == 'block') {
    	$('#emailHelp').hide();
    }

    // Check if message already and remove
	if (emailInput.next().hasClass("invalid-feedback") || emailInput.next().hasClass("valid-feedback")) {
		emailInput.next().remove();
	}

    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    result = re.test(String(email).toLowerCase());

    var emailInput = $(element);
    if (!result) {
		emailInput.addClass("is-invalid");
		emailInput.after("<div class=\"invalid-feedback\">This is not a valid email.</div>");
		return false;
	} else {
		emailInput.removeClass("is-invalid");
		emailInput.addClass("is-valid");
		emailInput.after("<div class=\"valid-feedback\">Looks good!</div>");
		return true;
	}
}

function validatePass(element) {
	// To change html
	var passInput = $(element);
	var pass = passInput.val();

	// Remove ariadescribedby element
    //if ($('#passwordHelpBlock').css('display') == 'block') {
    //	$('#passwordHelpBlock').hide();
    //}

	// Check if message already and remove
	if (passInput.next().hasClass("invalid-feedback") || passInput.next().hasClass("valid-feedback")) {
		passInput.next().remove();
	}

	function invalidPass(message) {
		passInput.addClass("is-invalid");
		passInput.after("<div class=\"invalid-feedback\">" + message + "</div>");
	}
	// Pass checking
	if (pass == "") {
		invalidPass("Please type a password.");
		return false;
	}
	re = /^\w+$/;
	if (!re.test(pass)) {
		invalidPass("Password must only contain letters and numbers.");
		return false;
	}
	if (pass.length < 8 || pass.length > 20) {
		invalidPass("Password should be between 8-20 characters.");
		return;
	}
	if (pass == $('input[name="email-first-page"]').val()) {
		invalidPass("Password cannot be your email address.");
		return false;
	}
	re = /[0-9]/;
	if (!re.test(pass)) {
		invalidPass("Password must contain at least one number.");
		return false;
	}
	re = /[a-z]/;
	if (!re.test(pass)) {
		invalidPass("Password must contain at least one lowercase letter.");
		return false;
	}
	re = /[A-Z]/;
	if (!re.test(pass)) {
		invalidPass("Password must contain at least one uppercase letter.");
		return false;
	}

	inputStyling(passInput, false)
	passInput.after("<div class=\"valid-feedback\">Looks good!</div>");

	return true;
}

function validatePostcode(element) {
	// To change html
	var pcInput = $(element);
	var pc = pcInput.val();

	if (!pc) {
		pcInput.removeClass("is-valid");
		pcInput.addClass("is-invalid");
		return false;
	} else {
		// Validate
		var url = "https://api.postcodes.io/postcodes/" + pc + "/validate";
		$.getJSON(url, function(data) {
			if (data.result) {
				inputStyling(element, false);
				return true;
			} else {
				inputStyling(element, true);
				return false;
			}
		})
	}
}

// Validate empty fields in forms
function validateEmptyField(element) {
	if (!$(element).val()) {
		inputStyling(element, true);
		return false;
	} else {
		inputStyling(element, false);
		return true;
	}
}

function validateNumber(element) {
	re = /^(((\+44\s?\d{4}|\(?0\d{4}\)?)\s?\d{3}\s?\d{3})|((\+44\s?\d{3}|\(?0\d{3}\)?)\s?\d{3}\s?\d{4})|((\+44\s?\d{2}|\(?0\d{2}\)?)\s?\d{4}\s?\d{4}))(\s?\#(\d{4}|\d{3}))?$/;
	if (!$(element).val()) {
		inputStyling(element, true);
		return false;
	} else if (!re.test($(element).val())) {
		inputStyling(element, true);
		return false;
	} else {
		inputStyling(element, false);
		return true;
	}
}

// T&Cs checkbox
$(document).ready(function() {
	tc_chk = $('#tandc');
	tc_chk.change(function() {
		if($(this).is(':checked')) {
			$('#register-btn').prop('disabled', false);
			$('#register-btn').removeClass('btn-outline-secondary');
			$('#register-btn').addClass('btn-outline-primary');
		} else {
			$('#register-btn').prop('disabled', true);
			$('#register-btn').removeClass('btn-outline-primary');
			$('#register-btn').addClass('btn-outline-secondary');
		}
	});
});

// Forgot pass validation
function isValidForgotPassForm() {
	if (!validateEmail($("input[name=\"forgot-pass-email\"]"))) {
		return false;
	} else {
		return true;
	}
}