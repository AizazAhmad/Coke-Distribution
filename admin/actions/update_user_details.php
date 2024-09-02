<?php
require_once '../config/config.php';
extract($_POST);

$query = "UPDATE users 
SET
  Name = '$Name' -- Name - VARCHAR(50)
 ,Username = '$Username' -- Username - VARCHAR(50)
 ,Mobile = '$Mobile' -- Mobile - VARCHAR(20)
WHERE
  Id = $id -- Id - INT(11) NOT NULL
;";
    
$result = $db->query($query);
if ($result) 
    $_SESSION['notify'] = true;
else 
    $_SESSION['notify'] = false;

header('location: '.$base_url.'user-list.php');
       
?>