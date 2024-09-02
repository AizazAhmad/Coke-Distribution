<?php 
require_once '../config/config.php';

$query = "SELECT
  sub_product.Id,
  CONCAT(sub_product.Code,' ',sub_product.Name) as Name,
  sub_product.Sale+sub_product.CompanyTax as Price,
  sub_product.Sale as BPrice,
  sub_product.Is_Empty
FROM sub_product WHERE UserId = {$_SESSION['user_id']} ORDER BY sub_product.Code ASC";
   

 $result = $db->query($query);    
   $json = array();
while ($row = $result->fetch_object()) {
  $json[] = $row;
}
echo json_encode($json);

 ?>