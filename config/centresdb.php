<?php 

    // Enable me to use Headers
    ob_start();

    // Set sessions for 'Admins'
    if(!isset($_SESSION)) {
        session_start();
    }

    $hostname = "db5001671370.hosting-data.io";
    $username = "dbu879258";
    $password = "mU*xE$Zoqr2i";
    $dbname = "dbs1384964";
    
    $connection = mysqli_connect($hostname, $username, $password, $dbname) or die("Database connection not established.")

?>