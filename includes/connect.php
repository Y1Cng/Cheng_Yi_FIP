<?php

    // Create our connection to the database

    $enviro = '127.0.0.1';
    $uname = 'root';
    $password = 'root'; // for mac
    //$password = ''; // for windows

    $db = 'db_portfolio'; // Change this to your actual database name

    // MAMP default port is 8889
    $connect = new mysqli($enviro, $uname, $password, $db, 8889);

    if(mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }


?>