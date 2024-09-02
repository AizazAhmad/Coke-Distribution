<?php
    require_once '../config/config.php';
    extract($_POST);
    $query = "UPDATE securitydeposit 
SET
  Debit = $Debit -- Debit - DECIMAL(19, 2)
WHERE
  Id = $Id -- Id - INT(11) NOT NULL
;";

$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
        
    
?>
