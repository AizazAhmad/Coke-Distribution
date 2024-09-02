<?php
require_once '../config/config.php';
$RootId = $_POST['RootId'];
$BDate = $_POST['BDate'];
$query = "SELECT DISTINCT
  CONCAT(customer.Code,' ',customer.Name) as Name,
  customer.Id
FROM booking b
  INNER JOIN customer
    ON b.CustomerId = customer.Id Where b.BookingDate BETWEEN '$BDate 00:00:00' AND '$BDate 23:59:59' AND b.RootId = $RootId;";
    
    $result = $db->query($query);    
   $json = array();
while ($row = $result->fetch_object()) {
  $json[] = $row;
}
echo json_encode($json);

		
	
?>