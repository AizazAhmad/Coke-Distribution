<?php
require_once '../config/config.php';

$query = "SELECT  Id,Name
FROM    booker b
WHERE   NOT EXISTS
        (
        SELECT  null 
        FROM    rootassign d
        WHERE   d.BookerId = b.Id
        ) AND b.UserId = {$_SESSION['user_id']}";
    
    $result = $db->query($query);    
   $json = array();
while ($row = $result->fetch_object()) {
  $json[] = $row;
}
echo json_encode($json);

		
	
?>