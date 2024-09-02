<?php 
require_once '../config/config.php';
$Date = $_POST['Date'];

$query = "SELECT DISTINCT secondarysale.DeliveryManId, deliveryman.Name FROM secondarysale INNER JOIN deliveryman
    ON secondarysale.DeliveryManId = deliveryman.Id WHERE secondarysale.Date BETWEEN '$Date 00:00:00' AND '$Date 23:59:59' AND secondarysale.Status = 1;";

$result = $db->query($query);    
   $json = array();
while ($row = $result->fetch_object()) {
  $json[] = $row;
}
echo json_encode($json);

 ?>