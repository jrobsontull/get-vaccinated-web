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
		$('input[name="address-hidden"]').attr('value', $('input[name="address"]').val());
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
	if ($(element).attr('type') == 'email') {
		validateEmail(element);
	} else if ($(element).attr('type') == 'password') {
		validatePass(element);
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

	passInput.removeClass("is-invalid");
	passInput.addClass("is-valid");
	passInput.after("<div class=\"valid-feedback\">Looks good!</div>");

	return true;
}