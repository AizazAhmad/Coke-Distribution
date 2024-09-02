<?php 
require_once '../config/config.php';


$query = "SELECT customer.Name AS name,SUM(s.Total) AS value
FROM secondarysale s INNER JOIN customer ON s.CustomerId = customer.Id WHERE s.UserId = {$_SESSION['user_id']}
GROUP BY customer.Name
ORDER BY SUM(s.Total) DESC
LIMIT 3";

$result = $db->query($query);    
   $json = array();
while ($row = $result->fetch_object()) {
  $json[] = $row;
}
echo json_encode($json);
 ?>