<?php
require_once '../config/config.php';

$query = "SELECT
  sub_product.Is_Empty,
  packagesize.PackingSize,
  primarysalelog.*
FROM primarysalelog
  INNER JOIN sub_product
    ON primarysalelog.SubProductId = sub_product.Id
  INNER JOIN packagesize
    ON sub_product.PackageSizeId = packagesize.Id
  WHERE primarysalelog.Id = {$_POST['Id']} AND primarysalelog.UserId = {$_SESSION['user_id']}";
    $result = $db->query($query);    
    $row = $result->fetch_object();
    echo json_encode($row);
		
	
?>
