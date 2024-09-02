<?php 
require_once '../config/config.php';


$query = "SELECT
  SUM(secondarysale.Qty) AS value,
  product.Name AS name
FROM secondarysale
  INNER JOIN sub_product
    ON secondarysale.SubProductId = sub_product.Id
  INNER JOIN product
    ON sub_product.ProductId = product.Id
    WHERE secondarysale.UserId = {$_SESSION['user_id']}
GROUP BY product.Name
ORDER BY value DESC
LIMIT 5";

$result = $db->query($query);    
   $json = array();
while ($row = $result->fetch_object()) {
  $json[] = $row;
}
echo json_encode($json);
 ?>