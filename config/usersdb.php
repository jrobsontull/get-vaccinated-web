<?php 

    // Enable me to use Headers
   // ob_start();

    // Set sessions for 'Users'
    if(!isset($_SESSION)) {
        session_start();
    }

    $hostname = "db5001670316.hosting-data.io";
    $username = "dbu1295382";
    $password = "kFg&J2jVlpVP";
    $dbname = "dbs1384180";
    
    $usersdb = mysqli_connect($hostname, $username, $password, $dbname) or die("Database connection not established.")

?>