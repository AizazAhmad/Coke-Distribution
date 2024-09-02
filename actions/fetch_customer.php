<?php
require_once '../config/config.php';

$query = "SELECT  Id,Name,Code
FROM    customer r
WHERE   NOT EXISTS
        (
        SELECT  null 
        FROM    coolerdistribution d
        WHERE   d.CustomerId = r.Id
        ) AND r.UserId = {$_SESSION['user_id']}";
    
    $result = $db->query($query);    
   $json = array();
while ($row = $result->fetch_object()) {
  $json[] = $row;
}
echo json_encode($json);

		
	
?>