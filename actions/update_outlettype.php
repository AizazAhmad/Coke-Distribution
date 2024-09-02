<?php
    require_once '../config/config.php';
    extract($_POST);
    $query = "UPDATE outlettype 
SET
  Name = '$Name' -- Name - VARCHAR(50)
 WHERE
  Id = $Id";
if (is_dublicate('Name',$Name,'outlettype')) {
    echo "Existed";
    exit();
}
$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
        
    
?>
