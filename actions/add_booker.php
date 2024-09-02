<?php
require_once '../config/config.php';
extract($_POST);
$user_id = $_SESSION['user_id'];
$query = "INSERT INTO booker
(
  UserId
 ,RootId
 ,Code
 ,Name
 ,Mobile
 ,Address
 ,Username
 ,Password
 )
VALUES
(
  $user_id -- UserId - INT(11)
 ,$RootId -- UserId - INT(11)
 ,'$Code' -- Code - VARCHAR(50)
 ,'$Name' -- Name - VARCHAR(50)
 ,'$Mobile' -- Mobile - DECIMAL(19, 2)
 ,'$Address' -- Address - DECIMAL(19, 2)
 ,'$Username' -- Username - VARCHAR(50)
 ,'$Password' -- Password - VARCHAR(50)
);";
if (is_dublicate('Code',$Code,'booker')) {
	echo "Existed";
	exit();
}
$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
		
		
	
?>