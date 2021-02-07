<?php
   /* Need logic for birthDate and Address */

   
    // Database connection
    include('config/usersdb.php');

    // Swiftmailer lib
    require_once './lib/vendor/autoload.php';
    
    // Error & success messages
    global $success_msg, $email_exist, $f_NameErr, $l_NameErr, $_emailErr, $_mobileErr, $_passwordErr, $_addressErr, $birthDateErr;
    global $fNameEmptyErr, $lNameEmptyErr, $emailEmptyErr, $mobileEmptyErr, $passwordEmptyErr, $birthDateEmptyErr, $addressEmptyErr, $email_verify_err, $email_verify_success;
    
    // Set empty form vars for validation mapping
    $_first_name = $_last_name = $_email = $_phone = $_password = $_address = $_birth_date =  "";

    if(isset($_POST["submit"])) {
        $firstName     = $_POST["firstName"];
        $lastName      = $_POST["lastName"];
        $email         = $_POST["email"];
        $address       = $_POST["address"];
        $phone         = $_POST["phone"];
        $password      = $_POST["password"];
        $birthDate     = $_POST["email"];

        // check if email already exist
        $email_check_query = mysqli_query($connection, "SELECT * FROM users WHERE email = '{$email}' ");
        $rowCount = mysqli_num_rows($email_check_query);


        // PHP validation
        // Verify if form values are not empty
        if(!empty($firstName) && !empty($lastName) && !empty($email) && !empty($phone) && !empty($password) && !empty($address) && !empty($birthDate)){
            
            // check if user email already exist
            if($rowCount > 0) {
                $email_exist = '
                    <div class="alert alert-danger" role="alert">
                        User with email already exists!
                    </div>
                ';
            } else {
                // clean the form data before sending to database
                $_first_name = mysqli_real_escape_string($connection, $firstName);
                $_last_name = mysqli_real_escape_string($connection, $lastName);
                $_email = mysqli_real_escape_string($connection, $email);
                $_address = mysqli_real_escape_string($connection, $address);
                $_phone = mysqli_real_escape_string($connection, $phone);
                $_password = mysqli_real_escape_string($connection, $password);
                $_birth_date = mysqli_real_escape_string($connection, $birthDate);

                // perform validation
                /* if(!preg_match("/^[a-zA-Z ]*$/", $_first_name)) {
                    $f_NameErr = '<div class="alert alert-danger">
                            Only letters and white space allowed.
                        </div>';
                }
                if(!preg_match("/^[a-zA-Z ]*$/", $_last_name)) {
                    $l_NameErr = '<div class="alert alert-danger">
                            Only letters and white space allowed.
                        </div>';
                }
                if(!filter_var($_email, FILTER_VALIDATE_EMAIL)) {
                    $_emailErr = '<div class="alert alert-danger">
                            Email format is invalid.
                        </div>';
                }
                if(!preg_match("/^[0-9]{10}+$/", $_phone)) {
                    $_mobileErr = '<div class="alert alert-danger">
                            Please enter a valid number.
                        </div>';
                }
                */
                if(!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/", $_password)) {
                    $_passwordErr = '<div class="alert alert-danger">
                             Password should be between 6 to 20 charcters long, contains atleast one special chacter, lowercase, uppercase and a digit.
                        </div>';
                }
                
                // Store the data in db, if all the preg_match condition met
                if((preg_match("/^[a-zA-Z ]*$/", $_first_name)) && (preg_match("/^[a-zA-Z ]*$/", $_last_name)) &&
                 (filter_var($_email, FILTER_VALIDATE_EMAIL)) && (preg_match("/^[0-9]{14}+$/", $_phone)) && 
                 (preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/", $_password))){
 
                    // Generate random activation token
                    $token = md5(rand().time());

                    // Password hash
                    $password_hash = password_hash($password, PASSWORD_BCRYPT);

                    // Query
                    $sql = "INSERT INTO users (firstName, lastName, email, address, phone, password, birthdate, token, is_active,
                    date_time) VALUES ('{$firstName}', '{$lastName}', '{$email}', '{$address}', '{$phone}', '{$password_hash}', {$birthDate},
                    '{$token}', '0', now())";
                    
                    // Create mysql query
                    $sqlQuery = mysqli_query($connection, $sql);
                    
                    if(!$sqlQuery){
                        die("MySQL query failed!" . mysqli_error($connection));
                        alert(mysqli_error($connection));
                    } 

                    //Send verification email
                    if($sqlQuery) {
                      /*  $msg = 'Click on the activation link to verify your email. <br><br>
                          <a href="http://get-vaccinated.uk/user_verificaiton.php?token='.$token.'"> Click here to verify email</a>
                          '; */
                          alert("Success!");
                        

                        // Create the Transport
                        $transport = (new Swift_SmtpTransport('smtp.ionos.co.uk', 587, 'tls'))
                        ->setUsername('support@get-vaccinated.uk')
                        ->setPassword('Y%28IH*lFCDv');

                        // Create the Mailer using your created Transport
                        $mailer = new Swift_Mailer($transport);

                        // Create a message
                        $message = (new Swift_Message('Please Verify Email Address!'))
                        ->setFrom([$email => $firstName . ' ' . $lastName])
                        ->setTo($email)
                        ->addPart($msg, "text/html")
                        ->setBody('Hello! User');

                        // Send the message
                        $result = $mailer->send($message);
                          
                        if(!$result){
                            $email_verify_err = '<div class="alert alert-danger">
                                    Verification email coud not be sent!
                            </div>';
                        } else {
                            $email_verify_success = '<div class="alert alert-success">
                                Verification email has been sent!
                            </div>';
                        }
                    }
                }
            }
        } else {
            if(empty($firstName)){
                $fNameEmptyErr = '<div class="alert alert-danger">
                    First name can not be blank.
                </div>';
            }
            if(empty($lastName)){
                $lNameEmptyErr = '<div class="alert alert-danger">
                    Last name can not be blank.
                </div>';
            }
            if(empty($email)){
                $emailEmptyErr = '<div class="alert alert-danger">
                    Email can not be blank.
                </div>';
            }
            if(empty($address)){
                $addressEmptyErr = '<div class="alert alert-danger">
                    Address can not be blank.
                </div>';
            }            
            if(empty($phone)){
                $mobileEmptyErr = '<div class="alert alert-danger">
                    Mobile number can not be blank.
                </div>';
            }
            if(empty($password)){
                $passwordEmptyErr = '<div class="alert alert-danger">
                    Password can not be blank.
                </div>';
            }
            if(empty($birthDate)){
                $birthDateEmptyErr = '<div class="alert alert-danger">
                    Birth date can not be blank.
                </div>';
            }            
        }
    }
?>