function nextRegisterDetails() {
	document.getElementById("register-intial").style.display = "none";
	document.getElementById("register-further").style.display = "block";
}

function loginPage() {
	document.getElementById("registration").style.display = "none";
	document.getElementById("login").style.display = "block";
}

function backToRegister() {
	document.getElementById("registration").style.display = "block";
	document.getElementById("login").style.display = "none";
}