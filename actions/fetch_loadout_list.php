<?php
require_once '../config/config.php';

$DeliveryManId = $_POST['DeliveryManId'];
$Date = $_POST['Date'];
$LoadNo = $_POST['LoadNo'];

$query = "SELECT
  loadout.Id,
  loadout.Date,
  loadout.Qty,
  loadout.Price,
  loadout.LoadNo,
  loadout.Total,
  deliveryman.Name,
  vehicle.Number as VehicleNumber,
  CONCAT(sub_product.Code,' ',sub_product.Name) as SubProductName,
  sub_product.Is_Empty as Empty
FROM loadout
  INNER JOIN vehicle
    ON loadout.VehicleId = vehicle.Id
  INNER JOIN deliveryman
    ON loadout.DeliveryManId = deliveryman.Id
  INNER JOIN sub_product
    ON loadout.SubProductId = sub_product.Id
 WHERE loadout.UserId = {$_SESSION['user_id']} AND loadout.Date BETWEEN '$Date 00:00:00' AND '$Date 23:59:59' AND loadout.DeliveryManId = $DeliveryManId AND loadout.LoadNo = '$LoadNo'";

$result = $db->query($query);    
   $json = array();
while ($row = $result->fetch_object()) {
  $json[] = $row;
}
echo json_encode($json);