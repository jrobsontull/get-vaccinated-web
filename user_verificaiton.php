<?php include('./controllers/user_activation.php'); ?>

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
    
    <title>Verification</title>
</head>
<body>

    <div class="container">
        <div class="jumbotron text-center">
            <h1 class="display-4">Email Validation</h1>
            <div class="col-12 mb-5 text-center">
                <?php echo $email_already_verified; ?>
                <?php echo $email_verified; ?>
                <?php echo $activation_error; ?>
            </div>
            <p class="lead">If user account is verified then click on the following button to login.</p>
            <a class="btn btn-lg btn-success" href="./index.php"
               >Click to Login
            </a>
        </div>
    </div>


</body>

</html>