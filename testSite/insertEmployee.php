<?php
    $user = 'root';
    $password = 'root';
    $db = 'testingDB';
    $host = 'localhost';
    $port = 3306;

    $link = mysqli_init();
    $sucess = mysqli_real_connect(
    $link,
    $host,
    $user,
    $password,
    $db,
    $port
    );

    if ($sucess) {
        $empid = $_POST('emp_ID');
        $name = $_POST('name');
        $department = $_POST('department');

        echo $empid;
        $sql = "insert into employees values ($empid, '$name', '$department')";

        $result = mysqli_query($link, $sql);

        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        readfile('index.html');
    }
    echo 'fail!!!!!!!!';
?>