function nextRegisterDetails() {
	// Validate email and password form
	if (validateEmail($("input[name=\"email-first-page\"]")) && validatePass($("input[name=\"password-first-page\"]"))) {
		// Animate form
		$('#register-intial').fadeOut(function() {
			$('#register-further').fadeIn();
		});
		// Move previous input data to next page
		$('input[name="email-hidden"]').attr('value', $('input[name="email-first-page"]').val());
		$('input[name="password-hidden"]').attr('value', $('input[name="password-first-page"]').val());
	}
}

function loginPage() {
	$('#register-div').fadeOut(function() {
		$('#login').fadeIn();
	});
}

function backToRegister() {
	$('#register-further').hide();
	$('#login').fadeOut(function() {
		$('#register-div').fadeIn();
		$('#register-intial').fadeIn();
	});
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
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    result = re.test(String(email).toLowerCase());

    var emailInput = $(element);
    if (!result) {
		emailInput.addClass("is-invalid");
		return false;
	} else {
		emailInput.removeClass("is-invalid");
		emailInput.addClass("is-valid");
		return true;
	}
}

function validatePass(element) {
	// To change html
	var passInput = $(element);
	var pass = passInput.val();
	function invalidPass(message) {
		passInput.addClass("is-invalid");
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
		invalidPass("Password must contain at least one uppercase letter.");
		return false;
	}
	re = /[A-Z]/;
	if (!re.test(pass)) {
		invalidPass("Password must contain at least one lowercase letter.");
		return false;
	}

	passInput.removeClass("is-invalid");
	passInput.addClass("is-valid");
	return true;
}