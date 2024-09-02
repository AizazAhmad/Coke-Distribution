<?php 
require_once '../config/config.php';
$deliverymanid = $_POST['deliverymanid'];

$query = "SELECT
	customeremptycredit.CustomerId as Id
  ,CONCAT(customer.Code,' ',customer.Name) as Name
  ,customeremptycredit.Credit
FROM customeremptycredit
  INNER JOIN customer
    ON customeremptycredit.CustomerId = customer.Id
  INNER JOIN deliveryman
    ON customeremptycredit.DeliveryManId = deliveryman.Id WHERE customeremptycredit.UserId = {$_SESSION['user_id']} AND customeremptycredit.Credit > 0 AND customeremptycredit.DeliveryManId = $deliverymanid;";

$result = $db->query($query);    
   $json = array();
while ($row = $result->fetch_object()) {
  $json[] = $row;
}
echo json_encode($json);
 ?>