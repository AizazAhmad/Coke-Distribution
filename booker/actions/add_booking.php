<?php
require_once '../config/config.php';


extract($_POST);


$DateTime = $Date." ".date("H:i:s");
$user_id = $_SESSION['user_id'];
$booker_id = $_SESSION['booker_id'];



$Promo = $Promo ? $Promo : 0.0;
$ExtraShare = $ExtraShare ? $ExtraShare : 0.0;
$TPromo = $Qty*$Promo;
$TExtraShare = $Qty*$ExtraShare;



	$query = "INSERT INTO booking
(
  UserId
 ,BookerId
 ,BookingDate
 ,RootId
 ,CustomerId
 ,SubProductId
 ,Qty
 ,AcQty
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
 ,$booker_id -- UserId - INT(11)
 ,'$DateTime' -- Date - DATETIME
 ,$RootId -- RootId - INT(11)
 ,$CustomerId -- CustomerId - INT(11)
 ,$SubProductId -- SubProductId - VARCHAR(255)
 ,$Qty -- Qty - SMALLINT(6)
 ,$Qty -- AcQty - SMALLINT(6)
 ,$Promo -- Promo - DECIMAL(19, 2)
 ,$TPromo -- TPromo - DECIMAL(19, 2)
 ,$ExtraShare -- ExtraShare - DECIMAL(19, 2)
 ,$TExtraShare -- TExtraShare - DECIMAL(19, 2)
 ,$Total -- Total - DECIMAL(19, 2)
 ,$Empty -- Status - TinyInt(1)
 );";



$result = $db->query($query);

if ($result) 
echo "Success";
else
echo "Invalid";
		
		
	
?>