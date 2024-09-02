<?php
    require_once '../config/config.php';
    $id = $_GET['id'];
    $query = "DELETE FROM cart WHERE id=$id";
    $result = $db->query($query);
    if ($result) {
        $_SESSION['is_deleted'] = true;
        header('location: '.$base_url);
    }else{
        $_SESSION['notify'] = "<div class='alert alert-danger' role='alert'>Some Thing Went Wrong!</div>";
        header('location: '.$base_url);
    }
    
    
