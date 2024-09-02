<?php
require_once '../config/config.php';
extract($_POST);
$user_id = $_SESSION['user_id'];
$query = "INSERT INTO packagesize
(
  UserId
 ,PackingSize
 ,Name
 )
VALUES
(
  {$_SESSION['user_id']} -- UserId - INT(11)
 ,'PackingSize' -- Code - VARCHAR(50)
 ,'$Name' -- Name - VARCHAR(50)
 );";

$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
		
		
	
?>
