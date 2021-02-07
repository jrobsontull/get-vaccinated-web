<?php

	// Error & success messages
	global $success_msg, $email_exist, $f_NameErr, $l_NameErr, $_emailErr, $_mobileErr, $_passwordErr, $_addressErr, $birthDateErr;
	global $fNameEmptyErr, $lNameEmptyErr, $emailEmptyErr, $mobileEmptyErr, $passwordEmptyErr, $birthDateEmptyErr, $addressEmptyErr, $email_verify_err, $email_verify_success;

	// Set empty form vars for validation mapping
    $_first_name = $_last_name = $_email = $_mobile = $_password = $_address = $_birth_date =  "";

	if(isset($_POST["register"])) {
		$email = $_POST["email"];
		$password = $_POST["password"];
		$firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $address = $_POST["address"];
        $mobile = $_POST["mobile"];
        $birthDate = $_POST["dob"];
	}

	// Check if email already exist
    $email_check_query = mysqli_query($usersdb, "SELECT * FROM users WHERE email = '{$email}' ");
    $rowCount = mysqli_num_rows($email_check_query);

	// Verify if form values are not empty
	if(!empty($firstName) && !empty($lastName) && !empty($email) && !empty($mobile) && !empty($password) && !empty($address) && !empty($birthDate)){
    	// Check if user already registered
		if($rowCount > 0) {
			$email_exist = '
				<div class="alert alert-danger" role="alert">User with this email address already exists!</div>
            ';
        } else {
        	// clean the form data before sending to database
			$_first_name = mysqli_real_escape_string($connection, $firstName);
			$_last_name = mysqli_real_escape_string($connection, $lastName);
			$_email = mysqli_real_escape_string($connection, $email);
			$_address = mysqli_real_escape_string($connection, $address);
			$_mobile = mysqli_real_escape_string($connection, $mobile);
			$_password = mysqli_real_escape_string($connection, $password);
			$_birth_date = mysqli_real_escape_string($connection, $birthDate);

			if(!preg_match("/^[a-zA-Z ]*$/", $_first_name)) {
				$f_NameErr = '<div class="alert alert-danger">Only letters and white space allowed.</div>';
			}
			if(!preg_match("/^[a-zA-Z ]*$/", $_last_name)) {
				$l_NameErr = '<div class="alert alert-danger">Only letters and white space allowed.</div>';
			}
			if(!filter_var($_email, FILTER_VALIDATE_EMAIL)) {
				$_emailErr = '<div class="alert alert-danger">Email format is invalid.</div>';
			}
			/*if(!preg_match("/^[0-9]{10}+$/", $_mobile)) {
				$_mobileErr = '<div class="alert alert-danger">Please enter a valid number.</div>';
			} */
			if(!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/", $_password)) {
					$_passwordErr = '<div class="alert alert-danger">Password should be between 6 to 20 charcters long, contains atleast one special chacter, lowercase, uppercase and a digit.</div>';
			}

			// Store the data in db, if all the preg_match condition met
			if((preg_match("/^[a-zA-Z ]*$/", $_first_name)) && (preg_match("/^[a-zA-Z ]*$/", $_last_name)) && (filter_var($_email, FILTER_VALIDATE_EMAIL)) && (preg_match("/^[0-9]{12}+$/", $_mobile)) && (preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/", $_password))){
				
				// Generate random activation token for email activation
				$token = md5(rand().time());

				// Password hash
				$password_hash = password_hash($password, PASSWORD_BCRYPT);

				// Query 
				$sql = "INSERT INTO users (firstName, lastName, email, address, phone, password, birthDate, token, is_active,
                    date_time) VALUES ('{$firstName}', '{$lastName}', '{$email}', '{$address}', '{$mobile}', '{$password_hash}', '{$birthDate}', '{$token}', '0', now())";
				// Create mysql query
				$sqlQuery = mysqli_query($usersdb, $sql);
                    
				if(!$sqlQuery){
					die("MySQL query failed!" . mysqli_error($connection));
				} elseif ($sqlQuery) {
					$success_msg = 'Click on the activation link to verify your email. <br><br><a href="http://get-vaccinated.uk/dom8063/user_verificaiton.php?token='.$token.'"> Click here to verify email</a>';
				}
			}
        }

    } else {
		if(empty($firstName)){
			$fNameEmptyErr = '<div class="alert alert-danger">First name can not be blank.</div>';
		}
		if(empty($lastName)){
			$lNameEmptyErr = '<div class="alert alert-danger">Last name can not be blank.</div>';
		}
		if(empty($email)){
			$emailEmptyErr = '<div class="alert alert-danger">Email can not be blank.</div>';
		}
		if(empty($address)){
			$addressEmptyErr = '<div class="alert alert-danger">Address can not be blank.</div>';
		}            
		if(empty($mobile)){
			$mobileEmptyErr = '<div class="alert alert-danger">Mobile number can not be blank.</div>';
		}
		if(empty($password)){
			$passwordEmptyErr = '<div class="alert alert-danger">Password can not be blank.</div>';
		}
		if(empty($birthDate)){
			$birthDateEmptyErr = '<div class="alert alert-danger">Birth date can not be blank.</div>';
        }
    }
?>