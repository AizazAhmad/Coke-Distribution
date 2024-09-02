<?php 
require_once '../config/config.php';
$Id = $_POST['Id'];

$query = "SELECT secondarysale.*,
sub_product.Is_Empty as Empty
FROM secondarysale
  INNER JOIN customer
    ON secondarysale.CustomerId = customer.Id
    INNER JOIN sub_product
    ON secondarysale.SubProductId = sub_product.Id WHERE secondarysale.UserId = {$_SESSION['user_id']} AND secondarysale.Id = $Id AND secondarysale.Status = 0;";

   
 $result = $db->query($query);    
$row = $result->fetch_object();

echo json_encode($row);

 ?>