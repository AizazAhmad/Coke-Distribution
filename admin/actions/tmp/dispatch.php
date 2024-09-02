<?php
    require_once '../config/config.php';
    $id = $_SESSION['user_id'];
    $query = "UPDATE `cart` SET `is_dispatch` = '1' WHERE user_id = '$id'";
    
    $result = $db->query($query);
    if ($result) {
        $_SESSION['is_dispatch'] = true;
        header('location: '.$base_url);
    } else {
        $_SESSION['notify'] = "<div class='alert alert-danger' role='alert'>Some Thing Went Wrong!</div>";
        header('location: '.$base_url);
        
    }

    
?>