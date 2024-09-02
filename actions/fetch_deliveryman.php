<?php 
require_once '../config/config.php';

$query = "SELECT DISTINCT
  deliveryman.Id,
  CONCAT(deliveryman.Code,' ',deliveryman.Name) as Name  
FROM deliveryman
  WHERE Status = 1 AND UserId = {$_SESSION['user_id']};";

 $result = $db->query($query);    
   $json = array();
while ($row = $result->fetch_object()) {
  $json[] = $row;
}
echo json_encode($json);

 ?>