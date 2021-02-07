<?php include('config/usersdb.php'); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>User Registration</title>
    <!-- jQuery + Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 25rem">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">User Profile</h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $_SESSION['firstName']; ?>
                        <?php echo $_SESSION['lastName']; ?></h6>
                    <p class="card-text">Email: <?php echo $_SESSION['email']; ?></p>
                    <p class="card-text">Address: <?php echo $_SESSION['address']; ?></p>
                    <p class="card-text">Phone Number: <?php echo $_SESSION['phone']; ?></p>
                    <p class="card-text">Birth Date: <?php echo $_SESSION['birthDate']; ?></p>
                    
                    <a class="btn btn-danger btn-block" href="logout.php">Log out</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>