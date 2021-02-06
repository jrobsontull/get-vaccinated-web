<?php 

    // Enable me to use Headers
    ob_start();

    // Set sessions for 'Admins'
    if(!isset($_SESSION)) {
        session_start();
    }

    $hostname = "db5001670375.hosting-data.io";
    $username = "dbu865773";
    $password = "y1Nb1F*Gk2ER";
    $dbname = "dbs1384224";
    
    $connection = mysqli_connect($hostname, $username, $password, $dbname) or die("Database connection not established.")

?>