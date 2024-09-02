<?php
    require_once '../config/config.php';
    $id = $_SESSION['user_id'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    if ($password == $cpassword) {
        $query = "UPDATE users SET password = '{$_POST['password']}' WHERE Id = '$id'";
    
        $result = $db->query($query);
        if ($result) {
            $_SESSION['notify'] = "<div class='alert alert-success' role='alert'>Updated Successfuly!</div>";
            header('location: '.$base_url.'profile-page.php');
        } else {
            $_SESSION['notify'] = "<div class='alert alert-danger' role='alert'>Some Thing Went Wrong!</div>";
            header('location: '.$base_url.'profile-page.php');
        }
    } else {
        $_SESSION['notify'] = "<div class='alert alert-danger' role='alert'>Password not Matched!</div>";
        header('location: '.$base_url.'profile-page.php');
    }
