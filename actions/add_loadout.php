<?php
require_once '../config/config.php';

extract($_POST);
$DateTime = $Date." ".date("H:i:s");
$user_id = $_SESSION['user_id'];
$Total = $Qty*$Price;
$query = "INSERT INTO loadout
(
  UserId
 ,Date
 ,LoadNo
 ,DeliveryManId
 ,VehicleId
 ,RootId
 ,Description
 ,SubProductId
 ,Qty
 ,Price
 ,Total
)
VALUES
(
  $user_id -- UserId - INT(11)
 ,'$DateTime' -- DateTime - DATE
 ,'$LoadNo' -- varchar(20)
 ,$DeliveryManId -- DeliveryManId - INT(11)
 ,$VehicleId -- VehicleId - INT(11)
 ,$RootId -- VehicleId - INT(11)
 ,'$Description' -- Description - INT(11)
 ,$SubProductId -- SubProductId - INT(11)
 ,$Qty -- Qty - SMALLINT(6)
 ,$Price -- Price - DECIMAL(19, 2)
 ,$Total -- Price - DECIMAL(19, 2)
);";


$result = $db->query($query);
$last_id = $db->insert_id;
$query2 = "INSERT INTO loadoutlog
(
  UserId
 ,LoadingId
 ,Date
 ,LoadNo
 ,DeliveryManId
 ,VehicleId
 ,RootId
 ,SubProductId
 ,Qty
 ,Price
 ,Total
)
VALUES
(
  $user_id -- UserId - INT(11)
 ,$last_id -- LoadingId - INT(11)
 ,'$DateTime' -- DateTime - DATE
 ,'$LoadNo' -- varchar(20)
 ,$DeliveryManId -- DeliveryManId - INT(11)
 ,$VehicleId -- VehicleId - INT(11)
 ,$RootId -- VehicleId - INT(11)
 ,$SubProductId -- SubProductId - INT(11)
 ,$Qty -- Qty - SMALLINT(6)
 ,$Price -- Price - DECIMAL(19, 2)
 ,$Total -- Price - DECIMAL(19, 2)
);";

 



if ($result) {
	$db->query($query2);
	echo "Success";
}else{
	echo "Invalid";
}

	
	
?>