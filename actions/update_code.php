<?php
    require_once '../config/config.php';
    extract($_POST);
    $query = "UPDATE product 
SET
  Code = '$Code' -- Code - VARCHAR(50)
 WHERE
  Id = $Id -- Id - INT(11) NOT NULL
;";

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