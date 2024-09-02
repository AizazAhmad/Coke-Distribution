<?php
    require_once '../config/config.php';
    extract($_POST);
    $Total = $Qty*$Price;
    $query = "UPDATE loadout 
SET
  Qty = $Qty -- Qty - DECIMAL(19, 2)
 ,Price = $Price -- Name - DECIMAL(19, 2)
 ,Total = $Total -- Cost - DECIMAL(19, 2)
WHERE
  Id = $Id -- Id - INT(11) NOT NULL
";

$query2 = "UPDATE loadoutlog 
SET
  Qty = $Qty -- Qty - DECIMAL(19, 2)
 ,Price = $Price -- Name - DECIMAL(19, 2)
 ,Total = $Total -- Cost - DECIMAL(19, 2)
WHERE
  LoadingId = $Id -- Id - INT(11) NOT NULL
";
$db->query($query2);
$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
        
    
?>
