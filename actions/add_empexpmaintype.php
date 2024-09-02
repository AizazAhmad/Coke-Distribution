<?php
require_once '../config/config.php';
extract($_POST);
$user_id = $_SESSION['user_id'];
$query = "INSERT INTO empexpmaintype
(
  UserId
 ,Name)
VALUES
(
  $user_id -- UserId - INT(11)
 ,'$Name' -- Name - VARCHAR(50)
);";

if (is_dublicate('Name',$Name,'expmaintype')) {
	echo "Existed";
	exit();
}

$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
		
		
	
?>