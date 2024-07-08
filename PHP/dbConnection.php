<?php
    $servername = "127.0.0.1:3307"; // Change to your database server
    $username = "root";
    $password = "";
    $dbname = "schoolhouse";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
    }
?>