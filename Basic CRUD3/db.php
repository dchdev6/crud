<?php 
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'crud3';

    $conn = mysqli_connect($host, $user, $pass, $db);

    if (!$conn) {
        die("Connection Failed:" . mysqli_connect_error());
    }
?>