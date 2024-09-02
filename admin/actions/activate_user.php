<?php
require_once '../config/config.php';

$query = "UPDATE users 
SET
  Status = 1
WHERE
  Id = {$_GET['id']} -- Id - INT(11) NOT NULL
;";
    
$result = $db->query($query);
if ($result) 
    $_SESSION['notify'] = true;
else 
    $_SESSION['notify'] = false;

header('location: '.$base_url.'ban-user-list.php');
       
?>