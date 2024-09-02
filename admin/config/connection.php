<?php
    $host = "localhost";
    $username = "root";
    $password = "tekken007";
    $database = "bms_db";
    $db = new mysqli($host, $username, $password, $database);
    if($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
        exit();
    }
    
?>