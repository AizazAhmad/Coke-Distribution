<?php
require_once '../config/config.php';
require_once '../config/eloquent.php';
use Models\Customer;
// echo '<pre>' . print_r(get_defined_vars(), true) . '</pre>';
// exit();
extract($_POST);

$cus = Customer::find($CustomerId);
$CustomerName = $cus->Code." ".$cus->Name;

$DateTime = $LDate." ".date("H:i:s");
$user_id = $_SESSION['user_id'];


// $que = "SELECT * FROM stock WHERE SubProductId = $SubProductId AND UserId = $user_id";
// $res = $db->query($que);
// $row = $res->fetch_object();
// if ($row == null) {
// 	echo "No Stock";
// 	exit;
// }
// if ($Qty > $row->Stock) {
// 	echo "Limited";
// 	exit();
// }
$Promo = $Promo ? $Promo : 0.0;
$ExtraShare = $ExtraShare ? $ExtraShare : 0.0;
$TPromo = $Qty*$Promo;
$TExtraShare = $Qty*$ExtraShare;

if ($IsReturned) {

	if ($Empty) {
 	$Empty = 0;
 	$FShell = $Qty;
 	$FBottles = $Qty*24;
 	
 	$db->query("UPDATE unfilled SET UFShell = UFShell + $FShell, UFBottle = UFBottle + $FBottles WHERE UserId=$user_id");
 	$db->query("UPDATE filled SET FShell = FShell - $FShell, FBottle = FBottle - $FBottles WHERE UserId=$user_id");
	}
}



	$query = "INSERT INTO secondarysale
(
  UserId
 ,Date
 ,DeliveryManId
 ,RootId
 ,CustomerId
 ,SubProductId
 ,Qty
 ,Promo
 ,TPromo
 ,ExtraShare
 ,TExtraShare
 ,Total
 ,Status
 )
VALUES
(
  $user_id -- UserId - INT(11)
 ,'$DateTime' -- Date - DATETIME
 ,$DeliveryManId -- DeliveryManId - INT(11)
 ,$RootId -- RootId - INT(11)
 ,$CustomerId -- CustomerId - INT(11)
 ,$SubProductId -- SubProductId - VARCHAR(255)
 ,$Qty -- Qty - SMALLINT(6)
 ,$Promo -- Promo - DECIMAL(19, 2)
 ,$TPromo -- TPromo - DECIMAL(19, 2)
 ,$ExtraShare -- ExtraShare - DECIMAL(19, 2)
 ,$TExtraShare -- TExtraShare - DECIMAL(19, 2)
 ,$Total -- Total - DECIMAL(19, 2)
 ,$Empty -- Status - TinyInt(1)
 );";



$STQ = "UPDATE stock SET Stock = Stock-$Qty WHERE SubProductId = $SubProductId AND UserId = $user_id;";
$db->query($STQ);

$BOQ = "UPDATE booking SET Is_Booked = 0, AcQty = AcQty-$Qty WHERE SubProductId = $SubProductId AND RootId = $RootId AND CustomerId = $CustomerId AND booking.BookingDate BETWEEN '$BDate 00:00:00' AND '$BDate 23:59:59' AND UserId = $user_id;";
$db->query($BOQ);

$CQ = "INSERT INTO cash (UserId,Date,Description,Credit) VALUES ($user_id,'$DateTime','SecondarySales $CustomerName',$Total);";
$result = $db->query($CQ);

$result = $db->query($query);

if ($result) 
echo "Success";
else
echo "Invalid";
		
		
	
?>