<?php
// echo "<pre>";
// print_r($_POST);
// exit();
require_once '../config/config.php';
extract($_POST);

$query = "INSERT INTO product
(
  UserId
 ,Code
 ,Name
  )
VALUES
(
  {$_SESSION['user_id']} -- UserId - INT(11)
 ,'$Code' -- Code - VARCHAR(50)
 ,'$Name' -- Name - VARCHAR(50)
 );";

if (is_dublicate('Code',$Code,'product')) {
	echo "Existed";
	exit();
}

$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
		

		
	
?>