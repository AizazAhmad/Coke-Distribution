<?php
require_once '../config/config.php';

$query = "SELECT
  customer.Name,
  customer.Code,
  customer.Id
FROM deliverymancustomer
  INNER JOIN deliveryman
    ON deliverymancustomer.DeliveryManId = deliveryman.Id
  INNER JOIN customer
    ON deliverymancustomer.CustomerId = customer.Id
  WHERE   NOT EXISTS
        (
        SELECT  null 
        FROM    sales d
        WHERE   d.CustomerId = customer.Id
        ) AND customer.UserId = 4 AND deliverymancustomer.DeliveryManId = 1 AND customer.Status = 1";
    $result = $db->query($query);    
    while ($row = $result->fetch_object()) {
        echo "<option value='".$row->Id."'>".$row->Code." ".$row->Name."</option>";
    }
		
		
	
?>
