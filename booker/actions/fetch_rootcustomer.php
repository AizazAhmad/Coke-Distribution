<?php
require_once '../config/config.php';
$RootId = $_POST['RootId'];
$SubRootId = $_POST['SubRootId'];
$query = "SELECT DISTINCT CONCAT(customer.Code,' ',customer.Name) as Name,
  customer.Id
FROM customersubroot b
  INNER JOIN customer
    ON b.CustomerId = customer.Id Where b.RootId = $RootId AND b.SubRootId = $SubRootId;";
    
    $result = $db->query($query);    
   $json = array();
while ($row = $result->fetch_object()) {
  $json[] = $row;
}
echo json_encode($json);

		
	
?>