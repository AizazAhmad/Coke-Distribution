<?php 
require_once '../config/config.php';
$DeliveryManId = $_POST['deliverymanid'];
$Date = $_POST['Date'];

$query = "SELECT DISTINCT secondarysale.CustomerId,customer.Name FROM secondarysale INNER JOIN customer
    ON secondarysale.CustomerId = customer.Id WHERE DeliveryManId = $DeliveryManId AND secondarysale.Date BETWEEN '$Date 00:00:00' AND '$Date 23:59:59' AND secondarysale.Status = 1;";

$result = $db->query($query);    
   $json = array();
while ($row = $result->fetch_object()) {
  $json[] = $row;
}
echo json_encode($json);

 ?>