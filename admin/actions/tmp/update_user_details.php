<?php
    require_once '../config/config.php';
    $id = $_SESSION['user_id'];
    $query = "UPDATE users SET firstname = '{$_POST['firstname']}', lastname = '{$_POST['lastname']}', email = '{$_POST['email']}', mobile = '{$_POST['mobile']}', city_id = '{$_POST['city']}', state_id = '{$_POST['state']}', address = '{$_POST['address']}' WHERE Id = '$id'";
    
    $result = $db->query($query);
    if ($result) {
        $_SESSION['notify'] = "<div class='alert alert-success' role='alert'>Updated Successfuly!</div>";
        header('location: '.$base_url.'profile-page.php');
    } else {
        $_SESSION['notify'] = "<div class='alert alert-danger' role='alert'>Some Thing Went Wrong!</div>";
        header('location: '.$base_url.'profile-page.php');
        
    }

    
?>