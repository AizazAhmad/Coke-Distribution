<?php
require_once '../config/config.php';
$id = $_GET['id'];
$query = "UPDATE users SET Status = 0 WHERE Id = $id";

$result = $db->query($query);
if ($result) 
$_SESSION['notify'] = true;
else
$_SESSION['notify'] = false;

header('location: '.$base_url.'user-list.php');
  
    
