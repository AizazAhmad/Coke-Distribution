<?php
require_once '../config/config.php';
extract($_POST);
$user_id = $_SESSION['user_id'];
$query = "INSERT INTO vehicle
(
  UserId
 ,Number
 ,Type
 ,Value
 )
VALUES
(
  {$_SESSION['user_id']} -- UserId - INT(11)
 ,'$Number' -- Number - VARCHAR(50)
 ,'$Type' -- Type - VARCHAR(50)
 ,$Value -- Value - DECIMAL(19, 2)
 );";

if (is_dublicate('Number',$Number,'vehicle')) {
	echo "Existed";
	exit();
}

$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
		

		
	
?>