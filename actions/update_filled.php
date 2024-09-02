<?php
    require_once '../config/config.php';
    extract($_POST);
    $query = "UPDATE filled 
SET
 ,FShell = $FShell -- FShell - DECIMAL(19, 2)
 ,FBottle = $FBottle -- FBottle - DECIMAL(19, 2)
 ,FPallet = $FPallet -- FPallet - DECIMAL(19, 2)
WHERE
  Id = $ -- Id - INT(11) NOT NULL
;";

$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
        
    
?>
