<?php
    require_once '../config/config.php';
    extract($_POST);
    $query = "UPDATE deliveryman 
SET
  Name = '$Name' -- Name - VARCHAR(50)
 ,Mobile = $Mobile -- Mobile - DECIMAL(19, 2)
 WHERE
  Id = $Id -- Id - INT(11) NOT NULL
;";


$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
        
    
?>