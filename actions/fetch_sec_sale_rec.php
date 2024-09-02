<?php 
require_once '../config/config.php';
$DeliveryManId = $_POST['deliverymanid'];
$CustomerId = $_POST['CustomerId'];
$Date = $_POST['Date'];

$query = "SELECT SUM(Qty) as TQty FROM secondarysale WHERE DeliveryManId = $DeliveryManId AND CustomerId = $CustomerId AND secondarysale.Date BETWEEN '$Date 00:00:00' AND '$Date 23:59:59' AND secondarysale.Status = 1;";

$result = $db->query($query);    
$row = $result->fetch_object();
echo json_encode($row);

 ?>