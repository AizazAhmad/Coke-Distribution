<?php
    require_once '../config/config.php';
    extract($_POST);
    $query = "UPDATE customercriteria 
SET
  HTHDiscount = $HTHDiscount -- Cost - DECIMAL(19, 2)
 ,HTHShare = $HTHShare
 ,RGB = $RGB
WHERE
  Id = $Id -- Id - INT(11) NOT NULL
;";

$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
        
    
?>