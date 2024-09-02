<?php
require_once '../config/config.php';

unset($_SESSION['admin_login']);
session_destroy();
header('location: '.$base_url.'login.php');
    


?>