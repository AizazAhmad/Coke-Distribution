<?php
require_once '../config/ConfigL.php';
unset($_SESSION['is_booker_login']);
unset($_SESSION['name']);
unset($_SESSION['booker_id']);
unset($_SESSION['user_id']);
session_destroy();
header('location: '.$base_url.'login.php');



?>