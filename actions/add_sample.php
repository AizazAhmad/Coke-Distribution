<?php
require_once '../config/config.php';

extract($_POST);
$user_id = $_SESSION['user_id'];
$Date = date('Y-m-d H:i:s');
$Pallet = 0;
$Empty = 0;
if (isset($IsEmpty)) {
	$Empty = 1;
}
if (isset($FPallet)) {
	$Pallet = 1; // -UFPallet +FPallet
}
$Total = $Qty*$Cost;
$query = "INSERT INTO sample
(
  UserId
 ,Date
 ,SubProductId
 ,Qty
 ,Cost
 ,Total
)
VALUES
(
  $user_id -- UserId - INT(11)
 ,'$Date' -- Date - DATETIME
 ,$DocumentNo -- DocumentNo - varchar(255)
 ,$SubProductId -- SubProductId - INT(11)
 ,$Qty -- Qty - SMALLINT(6)
 ,$Cost -- Cost - DECIMAL(19, 2)
 ,$Total -- Total - DECIMAL(19, 2)
);";

if ($Pallet) {
 	
	$db->query("UPDATE unfilled SET UFPallet = UFPallet - $FPallet WHERE UserId=$user_id");
	$db->query("UPDATE filled SET FPallet = FPallet + $FPallet WHERE UserId=$user_id");
 }
 if ($Empty) {
 	
	$db->query("UPDATE filled SET FShell = FShell + $FShell, FBottle = FBottle + $FBottles WHERE UserId=$user_id");	
	$db->query("UPDATE unfilled SET UFShell = UFShell - $FShell, UFBottle = UFBottle - $FBottles WHERE UserId=$user_id");
 }
 

$FF ="UPDATE stock SET Stock = Stock + $Qty WHERE SubProductId = $SubProductId AND UserId=$user_id";
	$FStock = $db->query($FF);


$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
		
		
	
?>
