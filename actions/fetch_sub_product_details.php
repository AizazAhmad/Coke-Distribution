<?php
require_once '../config/config.php';

$query = "SELECT packagesize.Name as PackageSizeName,packagesize.PackingSize as PackingSize,
  sub_product.* 
  FROM sub_product
  INNER JOIN packagesize
    ON sub_product.PackageSizeId = packagesize.Id WHERE sub_product.Id = {$_POST['SubProductId']} AND sub_product.UserId = {$_SESSION['user_id']};";

$result = $db->query($query);    
$row = $result->fetch_object();
echo json_encode($row);
		
		
	
?>
