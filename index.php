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
	<div id="intro-header">
		<h1>Get. Vaccinated. Now.</h1>
		<p id="short-description">We provide a service for you to fill in for cancelled appointments or make use of surplus vaccine. Register now. Save lives.</p>
	</div>
	<div id="explanation">
		<h4>How it works</h4>
		<ol>
			<li>Register for an account with us.</li>
			<li>Select your local vaccine centre.</li>
			<li>We'll notify you by email or mobile when there is vaccine availble by short notice.</li>
		</ol>
	</div>
</div>

<div class="central-panel">
	<div id="register-div">
		<form id="registration" method="post" action="controllers/signup.php">
			<div class="center-row-item">
				<h3>Sign up</h3>
			</div>
			<div id="register-1">
				<div class="form-row form-floating">
					<input type="email" class="form-control" aria-describedby="emailHelp" name="email-first-page" id="floatingEmail" placeholder="name@example.com" onblur="validateLostFocus(this)">
					<label for="floatingEmail">Email address</label>
					<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
					<?php echo $_emailErr; ?>
					<?php echo $emailEmptyErr; ?>
				</div>
				<div class="form-row form-floating">
		    		<input type="password" class="form-control col-6" id="floatingPass" aria-describedby="passwordHelpBlock" name="password-first-page" placeholder="Password" onblur="validateLostFocus(this)">
		    		<label for="floatingPass">Password</label>
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
			<div id="register-2">
				<div class="form-row">
					<label>First name</label>
					<input type="text" name="first-name" class="form-control" id="firstName">
					<?php echo $fNameEmptyErr; ?>
					<?php echo $f_NameErr; ?>
				</div>
				<div class="form-row">
					<label>Last name</label>
					<input type="text" name="last-name" class="form-control" id="lastName">
					<?php echo $l_NameErr; ?>
					<?php echo $lNameEmptyErr; ?>
				</div>
				<div class="form-row form-line-break"></div>
				<div class="form-row">
					<label class="">Address</label>
					<input type="text" class="form-control" name="address-l1" aria-describedby="line-1">
					<div id="line-1" class="form-text">
		    			Street address
		    		</div>
					<?php echo $_addressErr; ?>
					<?php echo $addressEmptyErr; ?>
				</div>
				<div class="form-row">
					<input type="text" class="form-control" name="address-l2" aria-describedby="line-2">
					<div id="line-2" class="form-text">
		    			Apartment, suite , unit, building, floor, etc.
		    		</div>
				</div>
				<div class="form-row no-wrap">
					<div class="form-col2">
						<input type="text" class="form-control" name="city" aria-describedby="city-help">
						<div id="city-help" class="form-text">
			    			City
			    		</div>
		    		</div>
		    		<div class="form-col2">
						<select class="form-select" name="county" aria-describedby="county-help">
							<?php include 'assets/html/counties.php';?>
						</select>
						<div id="county-help" class="form-text">
			    			County
			    		</div>
		    		</div>
				</div>
				<div class="form-row no-wrap">
					<div class="form-col2">
						<input type="text" class="form-control" name="postcode" aria-describedby="postcode-help">
						<div id="postcode-help" class="form-text">
			    			Postcode
			    		</div>
		    		</div>
		    		<div class="form-col2">
						<input type="text" class="form-control" name="country" aria-describedby="country-help">
						<div id="country-help" class="form-text">
			    			Country
			    		</div>
		    		</div>
				</div>
				<div class="form-row form-line-break"></div>
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
				<div class="center-row-item form-row">
					<button type="button" class="btn btn-outline-primary btn-block" onclick="prevRegisterDetails()">Previous</button>
					<button type="button" class="btn btn-outline-primary btn-block" onclick="nextRegisterDetails()">Next</button>
				</div>
			</div>
			<div id="register-3">
				<!--For POST-->
				<input type="hidden" name="email-hidden">
				<input type="hidden" name="password-hidden">
				<input type="hidden" name="f-name-hidden">
				<input type="hidden" name="l-name-hidden">
				<input type="hidden" name="address-hidden">
				<input type="hidden" name="mobile-hidden">
				<input type="hidden" name="dob-hidden">
				<!--Form-->
				<div class="form-row">
					<label class="">Choose a vaccination centre</label>
					<input type="text" name="firstName" class="form-control" id="firstName">
				</div>
				<div class="form-row">
			    	<div class="g-recaptcha" data-sitekey="6Lda7E0aAAAAAK35uEGsvY_wjxCPKNNCCmxMW8EE"></div>
				</div>
				<div class="center-row-item form-row">
					<button type="button" class="btn btn-outline-primary btn-block" onclick="prevRegisterDetails()">Previous</button>
					<button type="submit" name="register" class="btn btn-outline-primary btn-block">Register</button>
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
	<div id="login">
		<form id="sign-in" method="post" action="controllers/signin.php">
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
	</div>

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