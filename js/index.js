function nextRegisterDetails() {
	//document.getElementById("register-intial").style.display = "none";
	//document.getElementById("register-further").style.display = "block";
	$('#register-intial').fadeOut(function() {
		$('#register-further').fadeIn();
	});
	// Move previous input data to next page
	$('input[name="email-hidden"]').attr('value', $('input[name="email-first-page"]').val());
	$('input[name="password-hidden"]').attr('value', $('input[name="password-first-page"]').val());
}

function loginPage() {
	//document.getElementById("register-div").style.display = "none";
	//document.getElementById("login").style.display = "block";
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