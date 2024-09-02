<?php 
require_once '../config/config.php';


$query = "SELECT SUM(Qty) AS value,sub_product.Name AS name
FROM secondarysale INNER JOIN sub_product ON secondarysale.SubProductId = sub_product.Id WHERE secondarysale.UserId = {$_SESSION['user_id']}
GROUP BY SubProductId
ORDER BY value DESC
LIMIT 5";

$result = $db->query($query);    
   $json = array();
while ($row = $result->fetch_object()) {
  $json[] = $row;
}
echo json_encode($json);
 ?>