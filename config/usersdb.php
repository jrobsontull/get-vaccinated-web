<?php 
    // Start session if none exists
    if(!isset($_SESSION)) {
        session_start();
    }

    // SQL db details
    $hostname = "db5001670316.hosting-data.io";
    $username = "dbu1295382";
    $password = "kFg&J2jVlpVP";
    $dbname = "dbs1384180";
    
    try {
        // connection successful
        $userdb = mysqli_connect($hostname, $username, $password, $dbname);
    } catch (Exception $error) {
        die("Connection failed:" . $error->getMessage());
    }
?>