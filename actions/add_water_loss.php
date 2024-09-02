<?php
require_once '../config/config.php';

extract($_POST);
$row = fetchRecord($SubProductId,'sub_product');

if ($row->Is_Empty) {
	$FBottles = $Qty*24;
	$db->query("UPDATE filled SET FBottle = FBottle - $FBottles WHERE UserId=$user_id");
	$db->query("UPDATE unfilled SET FBottle = FBottle + $FBottles WHERE UserId=$user_id");
}
$user_id = $_SESSION['user_id'];
$Date = date('Y-m-d H:i:s');
$query = "INSERT INTO waterloss
(
  UserId
 ,Date
 ,SubProductId
 ,Qty
 ,Cost
 ,TotalPrice
)
VALUES
(
  $user_id -- UserId - INT(11)
 ,'$Date' -- Date - DATETIME
 ,$SubProductId -- SubProductId - INT(11)
 ,$Qty -- Qty - SMALLINT(6)
 ,$Cost -- Cost - DECIMAL(19, 2)
 ,$Total -- TotalPrice - DECIMAL(19, 2)
);";


$FF ="UPDATE stock SET Stock = Stock - $Qty WHERE SubProductId = $SubProductId AND UserId=$user_id";
	$FStock = $db->query($FF);


$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
		
		
	
?>