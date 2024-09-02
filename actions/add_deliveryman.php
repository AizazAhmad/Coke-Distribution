<?php
require_once '../config/config.php';
extract($_POST);
$user_id = $_SESSION['user_id'];
$query = "INSERT INTO deliveryman
(
  UserId
 ,RoleId
 ,Code
 ,Name
 ,Mobile
 )
VALUES
(
  {$_SESSION['user_id']} -- UserId - INT(11)
 ,$RoleId -- RoleId - INT(11)
 ,'$Code' -- Code - VARCHAR(50)
 ,'$Name' -- Name - VARCHAR(50)
 ,$Mobile -- Mobile - DECIMAL(19, 2)
 );";

if (is_dublicate('Code',$Code,'deliveryman')) {
	echo "Existed";
	exit();
}

$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
		

		
	
?>