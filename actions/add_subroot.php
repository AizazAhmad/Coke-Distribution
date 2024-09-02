<?php
require_once '../config/config.php';
extract($_POST);
$user_id = $_SESSION['user_id'];
$query = "INSERT INTO subroot
(
  UserId
 ,RootId
 ,Name
)
VALUES
(
  $user_id -- UserId - INT(11)
  ,$RootId -- Name - VARCHAR(50)
  ,'$Name' -- Name - VARCHAR(50)
 );";

$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";