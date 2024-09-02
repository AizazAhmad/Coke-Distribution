<?php
require_once '../config/config.php';

$query = "SELECT  Id,Code,Name
FROM    customer c
WHERE   NOT EXISTS
        (
        SELECT  null 
        FROM    rootcustomer r
        WHERE   r.CustomerId = c.Id
        ) AND c.UserId = {$_SESSION['user_id']} AND c.Status = 1";
$result = $db->query($query);    
   $json = array();
while ($row = $result->fetch_object()) {
  $json[] = $row;
}
echo json_encode($json);	
	
?>