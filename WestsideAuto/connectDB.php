<?php
    $user = 'root';
    $password = 'root';
    $db = 'westsideAuto';
    $host = 'localhost';
    $port = 3307;

    $link = mysqli_init();
    $success = mysqli_real_connect(
       $link, 
       $host, 
       $user, 
       $password, 
       $db,
       $port
    );

    if(!$success) {
        echo "COULD NOT CONNECT<br>";
        exit();
    }
?>