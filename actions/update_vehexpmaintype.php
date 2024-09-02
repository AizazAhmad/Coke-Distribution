<?php
    require_once '../config/config.php';
    extract($_POST);
    $query = "UPDATE vehexpmaintype 
SET
  Name = '$Name' -- Name - VARCHAR(50)
 WHERE
  Id = $Id -- Id - INT(11) NOT NULL
";

if (is_dublicate('Name',$Name,'vehexpmaintype')) {
    echo "Existed";
    exit();
}

$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
        
    
?>