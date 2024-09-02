<?php
require_once '../config/config.php';
$id = $_POST['id'];
$row = fetchRecord($id,'sales');
$Qty = $row->Qty;
$SubProductId = $row->SubProductId;
$QQ = "UPDATE primarysale SET Stock = Stock+$Qty WHERE SubProductId = $SubProductId AND UserId = $user_id;";
$db->query($QQ);

$query = "DELETE FROM sales WHERE Id = $id";
$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
  
    
