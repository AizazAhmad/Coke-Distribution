<?php 
require_once '../config/config.php';
$BDate = $_POST['BDate'];
$RootId = $_POST['RootId'];

$query = "SELECT
  sub_product.Id,
  sub_product.Sale + sub_product.CompanyTax AS Price,
  sub_product.Name,
  sub_product.Code,
  sub_product.Is_Empty,
  SUM(booking.Qty) AS Stock
FROM booking
  INNER JOIN sub_product
    ON booking.SubProductId = sub_product.Id
WHERE sub_product.UserId = {$_SESSION['user_id']} GROUP BY booking.SubProductId ORDER By sub_product.Code DESC";

 $result = $db->query($query);    
   $json = array();
while ($row = $result->fetch_object()) {
  $json[] = $row;
}
echo json_encode($json);

 ?>