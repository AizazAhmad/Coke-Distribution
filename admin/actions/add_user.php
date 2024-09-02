<?php
require_once '../config/config.php';
extract($_POST);
if (is_dublicate('Username',$Username,'users')) {
	echo "Existed";
	exit();
}
$Password = sha1($Password);

$query = "INSERT INTO users
(
  RoleId
 ,Name
 ,Username
 ,Password
 ,Mobile
)
VALUES
(
  '$Role' -- Role - INT(11)
 ,'$Name' -- Name - VARCHAR(50)
 ,'$Username' -- Username - VARCHAR(50)
 ,'$Password' -- Password - VARCHAR(50)
 ,'$Mobile' -- Mobile - VARCHAR(20)
);";

$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";



?>