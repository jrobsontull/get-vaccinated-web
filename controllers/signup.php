<?php
    // Database usersdb
    include('../config/usersdb.php');
    
    // Error & success messages
    global $success_msg, $email_exist, $f_NameErr, $l_NameErr, $_emailErr, $_mobileErr, $_passwordErr, $_addressErr, $birthDateErr;
    global $fNameEmptyErr, $lNameEmptyErr, $emailEmptyErr, $mobileEmptyErr, $passwordEmptyErr, $birthDateEmptyErr, $addressEmptyErr, $email_verify_err, $email_verify_success;
    
    // Set empty form vars for validation mapping
    $_first_name = $_last_name = $_email = $_phone = $_password = $_address = $_birth_date =  "";

    if(isset($_POST["register"])) {
        $firstName     = $_POST["f-name-hidden"];
        $lastName      = $_POST["l-name-hidden"];
        $email         = $_POST["email-hidden"];
        $address       = $_POST["address-hidden"];
        $phone         = $_POST["mobile-hidden"];
        $password      = $_POST["password-hidden"];
        $birthDate     = $_POST["dob-hidden"];

        // check if email already exist
        $email_check_query = mysqli_query($usersdb, "SELECT * FROM users WHERE email = '{$email}' ");
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

                    // Generate random activation token
                    $token = md5(rand().time());

                    // Password hash
                    $password_hash = password_hash($password, PASSWORD_BCRYPT);
                    // Query 
                    $sql = "INSERT INTO users (firstName, lastName, email, address, phone, password, birthDate, token, is_active,
                    date_time) VALUES ('{$firstName}', '{$lastName}', '{$email}', '{$address}', '{$phone}', '{$password_hash}', '{$birthDate}',
                    '{$token}', '0', now())";
                    // Create mysql query
                    $sqlQuery = mysqli_query($usersdb, $sql);
                    
                    if(!$sqlQuery){
                        die("MySQL query failed!" . $sql . mysqli_error($usersdb));
                    } 
                    if($sqlQuery) {
                        $success_msg = 'Click on the activation link to verify your email. <br><br>
                          <a href="./user_verificaiton.php?token='.$token.'"> Click here to verify email</a>
                        ';
            }
        } 
}
}
echo $email_exist;
echo $email_verify_err;
echo $email_verify_success;
?>