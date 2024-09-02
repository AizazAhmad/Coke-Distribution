<?php
require_once '../config/config.php';
$RootId = $_POST['RootId'];
$query = "SELECT CONCAT(customer.Code,' ',customer.Name) as Name,
  customer.Id
FROM rootcustomer b
  INNER JOIN customer
    ON b.CustomerId = customer.Id Where b.RootId = $RootId;";
    
    $result = $db->query($query);    
   $json = array();
while ($row = $result->fetch_object()) {
  $json[] = $row;
}
echo json_encode($json);

		
	
?>