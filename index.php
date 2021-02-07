<?php include('controllers/signup.php'); ?>

<!doctype html>
<html lang="en">
<head>
 	<meta http-equiv="cache-control" content="no-cache" />
 	<meta http-equiv="pragma" content="no-cache" />
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">

 	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
 	<script type="text/javascript" src="js/bootstrap.min.js"></script>
 	<script type="text/javascript" src="js/index.js"></script>
 	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

 	<link href="assets/css/index.css" rel="stylesheet">
 	<link href="assets/css/footer.css" rel="stylesheet">
 	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
 	
 	<title>Get Vaccinated</title>
</head>
<body>
<div class="container-div">
<div class="vertical-center">

<div class="intro-text">
	<h1>Get vaccinated</h1>
	<p id="short-description">as quickly as possible by filling in for cancelled appoitments or spare doses. Register now. Save lives.</p>
	<div id="explanation">
		<h3>How it works</h3>
		<ol>
			<li>Some content here.</li>
			<li>Some content here.</li>
			<li>Some content here.</li>
		</ol>
	</div>
</div>

<div class="central-panel">
	<div id="register-div">
		<form id="registration" method="post" action="">
			<div class="center-row-item">
				<h3>Sign up</h3>
			</div>
			<div id="register-intial" class="">
				<div class="form-row">
					<label class="">Email address</label>
					<input type="email" name="email" id="email" class="form-control" aria-describedby="emailHelp">
					<?php echo $_emailErr; ?>
					<?php echo $emailEmptyErr; ?>
					<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
				</div>
				<div class="form-row">
					<label class="">Password</label>
		    		<input type="password" name="password" class="form-control col-6" id="password" aria-describedby="passwordHelpBlock">
		    		<div id="passwordHelpBlock" class="form-text">
		    			Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
		    		</div>
		    		<?php echo $_passwordErr; ?>
					<?php echo $passwordEmptyErr; ?>
				</div>
				<div class="center-row-item form-row">
					<button type="button" class="btn btn-outline-primary btn-block" onclick="nextRegisterDetails()">Next</button>
				</div>
			</div>
			<div id="register-further">
				<div class="form-row">
					<label class="">First name</label>
					<input type="text" name="firstName" class="form-control" id="firstName">
					<?php echo $fNameEmptyErr; ?>
					<?php echo $f_NameErr; ?>
				</div>
				<div class="form-row">
					<label class="">Last name</label>
					<input type="text" name="lastName" class="form-control" id="lastName">
					<?php echo $l_NameErr; ?>
					<?php echo $lNameEmptyErr; ?>
				</div>
				<div class="form-row">
					<label class="">Address</label>
					<input type="text" name="address" class="form-control" id="address">
					<?php echo $_addressErr; ?>
					<?php echo $addressEmptyErr; ?>
				</div>
				<div class="form-row">
					<label class="">Mobile</label>
					<input type="tel" name="mobile" class="form-control" id="mobile">
					<?php echo $_mobileErr; ?>
					<?php echo $mobileEmptyErr; ?>
				</div>
				<div class="form-row">
					<label class="">Birth date</label>
					<input type="date" name="dob" class="form-control" id="dob">
					<?php echo $_birthDateErr; ?>
					<?php echo $birthDateEmptyErr; ?>
				</div>
				<div class="form-row">
			    	<div class="g-recaptcha" data-sitekey="6Lda7E0aAAAAAK35uEGsvY_wjxCPKNNCCmxMW8EE"></div>
				</div>
				<div class="center-row-item form-row">
					<button type="submit" name="submit" id="submit" class="btn btn-outline-primary btn-block">Register</button>
				</div>
			</div>
		</form>
		<div class="center-row-item form-row">
			<p>Already registered? Sign in <span class="login-txt" onclick="loginPage()">here</span></p>
			<?php echo $success_msg; ?>
			<?php echo $email_exist; ?>
			<?php echo $email_verify_err; ?>
			<?php echo $email_verify_success; ?>
		</div>
	</div>
	<!--
	<div id="login">
		<form id="sign-in">
			<div class="center-row-item"><h3>Log in</h3></div>
			<div class="form-row">
				<label class="">Email address</label>
				<input type="email" class="form-control">
			</div>
			<div class="form-row">
				<label class="">Password</label>
		    	<input type="password" class="form-control" id="password">
			</div>
			<div class="form-row">
			     <div class="g-recaptcha" data-sitekey="6Lda7E0aAAAAAK35uEGsvY_wjxCPKNNCCmxMW8EE"></div>
			</div>
			<div class="center-row-item">
				<button type="submit" name="login" class="btn btn-outline-primary btn-block">Log in</button>
			</div>
		</form>
		<div class="center-row-item form-row"><p>Back to <span class="login-txt" onclick="backToRegister()">registration</span></p></div>
	</div>-->

</div>

<!--Move to PHP eventually-->
<div class="footer">
	<ul>
		<li>About Us</li>
		<li>Report an Issue</li>
		<li>Support Us</li>
		<li>Share</li>
	</ul>
</div>

</div>

</div>

</body>
</html>