<?php
    require_once '../config/config.php';
    extract($_POST);
    $query = "UPDATE vehicle 
SET
  Type = '$Type' -- Code - VARCHAR(50)
 ,Value = '$Value' -- Value - VARCHAR(50)
 WHERE
  Id = $Id -- Id - INT(11) NOT NULL
;";

$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
        
    
?>