<?php
require_once '../config/config.php';
extract($_POST);
$user_id = $_SESSION['user_id'];
$query = "INSERT INTO cooler
(
  UserId
 ,CoolerType
 ,Code
 )
VALUES
(
  {$_SESSION['user_id']} -- UserId - INT(11)
 ,'$CoolerType' -- Code - VARCHAR(50)
 ,'$Code' -- Code - VARCHAR(50)
 );";
if (is_dublicate('Code',$Code,'cooler')) {
	echo "Existed";
	exit();
}
$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
		
		
	
?>
