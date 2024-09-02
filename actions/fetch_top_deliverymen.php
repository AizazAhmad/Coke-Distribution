<?php 
require_once '../config/config.php';


$query = "SELECT deliveryman.Name AS name,SUM(s.Total) AS value
FROM secondarysale s INNER JOIN deliveryman ON s.DeliveryManId = deliveryman.Id WHERE s.UserId = {$_SESSION['user_id']}
GROUP BY deliveryman.Name
ORDER BY SUM(s.Total) DESC
LIMIT 5";

$result = $db->query($query);    
   $json = array();
while ($row = $result->fetch_object()) {
  $json[] = $row;
}
echo json_encode($json);
 ?>