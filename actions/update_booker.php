<?php
    require_once '../config/config.php';
    extract($_POST);
    $query = "UPDATE booker 
SET
  Name = '$Name' -- Name - VARCHAR(50)
 ,RootId = $RootId -- Name - VARCHAR(50)
 ,Mobile = '$Mobile' -- Mobile - DECIMAL(19, 2)
 ,Address = '$Address'
 ,Username = '$Username'
 ,Password = '$Password'
WHERE
  Id = $Id -- Id - INT(11) NOT NULL
 ";

$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
        
    
?>