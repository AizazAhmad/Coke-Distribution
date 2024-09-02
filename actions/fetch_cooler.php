<?php
require_once '../config/config.php';

$query = "SELECT  Id,CoolerType,Code
FROM    cooler c
WHERE   NOT EXISTS
        (
        SELECT  null 
        FROM    coolerdistribution d
        WHERE   d.CoolerId = c.Id
        ) AND c.UserId = {$_SESSION['user_id']}";
    $result = $db->query($query);    
    while ($row = $result->fetch_object()) {
        echo "<option value='".$row->Id."'>".$row->CoolerType." ".$row->Code."</option>";
    }
		
		
	
?>