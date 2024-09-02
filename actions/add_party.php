<?php
require_once '../config/config.php';
extract($_POST);
$user_id = $_SESSION['user_id'];
$query = "INSERT INTO party
(
  UserId
 ,Code
 ,Name
 )
VALUES
(
  $user_id -- UserId - INT(11)
 ,'$Code' -- Code - VARCHAR(50)
 ,'$Name' -- Name - VARCHAR(50)
 );";

if (is_dublicate('Code',$Code,'party')) {
	echo "Existed";
	exit();
}

$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
		

		
	
?>