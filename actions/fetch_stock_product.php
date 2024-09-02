<?php 
require_once '../config/config.php';


$query = "SELECT SUM(stock) AS Qty,sub_product.Name
FROM stock INNER JOIN sub_product ON stock.SubProductId = sub_product.Id WHERE stock.UserId = {$_SESSION['user_id']}
GROUP BY SubProductId
ORDER BY SUM(stock) ASC
LIMIT 5";

$result = $db->query($query);    
   $json = array();
while ($row = $result->fetch_object()) {
  $json[] = $row;
}
echo json_encode($json);
 ?>