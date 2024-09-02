<?php
    require_once '../config/config.php';
    extract($_POST);
    $query = "UPDATE party 
SET
  Code = '$Code' -- Code - VARCHAR(50)
 ,Name = '$Name' -- Name - VARCHAR(50)
 WHERE
  Id = $Id -- Id - INT(11) NOT NULL
;";

if (is_dublicate('Code',$Code,'party')) {
    echo "Existed";
    exit();
}

$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
        
    
?>