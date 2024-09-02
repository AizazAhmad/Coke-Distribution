<?php
require_once '../config/config.php';
$Username = mysqli_real_escape_string($db,$_POST['Username']);
$Password = mysqli_real_escape_string($db,$_POST['Password']);
$Password = sha1($Password);
$query = "SELECT * FROM users WHERE Username='$Username' AND Password='$Password'";

$result = $db->query($query);
$row = $result->fetch_object();
    
	if ($result->num_rows != 1) {
    $_SESSION['notify'] = false;
    header('location: '.$base_url.'login.php');
} else {
	
    $_SESSION['user_id'] = $row->Id;		
    $_SESSION['username'] = $row->Username;
	$_SESSION['name'] = $row->Name;
	$_SESSION['admin_login'] = true;          		
	header('location: '.$base_url);
}  
?>