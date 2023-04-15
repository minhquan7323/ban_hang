<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ban_hang";
    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    mysqli_set_charset($conn, "utf8");
?>