<?php

require_once '../config/config.php';
extract($_POST);

$user_id = $_SESSION['user_id'];


$query = "INSERT INTO primarysalelog
(
  UserId
 ,OrderDate
 ,ReceivingDate
 ,DocumentNo
 ,Description
 ,PartyId
 ,SubProductId
 ,AccountId
 ,DeliveryManBuilty
 ,Qty
 ,Cost
 ,Sale
 ,AdvanceTaxAmount
 ,DistributorCommission
 ,Payable
)
VALUES
(
  $user_id -- UserId - INT(11)
 ,'$OrderDate' -- OrderDate - DATE
 ,'$ReceivingDate' -- ReceivingDate - DATE
 ,'$DocumentNo' -- DocumentNo - VARCHAR(255)
 ,'$Description' -- Description - VARCHAR(255)
 ,$PartyId -- PartyId - INT(11)
 ,$SubProductId -- SubProductId - INT(11)
 ,$AccountId -- SubProductId - INT(11)
 ,'$DeliveryMan' -- DeliveryMan - VARCHAR(255)
 ,$Qty -- Stock - DECIMAL(19, 2)
 ,$Cost -- Cost - DECIMAL(19, 2)
 ,$Sale -- Sale - DECIMAL(19, 2)
 ,$AdvanceTaxAmount -- AdvanceTaxAmount - DECIMAL(19, 2)
 ,$DistributorCommission -- DistributorCommission - DECIMAL(19, 2)
 ,$Payable -- Payable - DECIMAL(19, 2)
);";

$PreBalance = fetchRecord($AccountId,"accounts")->Balance;
$CurrentBalance = $PreBalance - $Payable;
$Bquery = "UPDATE accounts SET Balance = Balance - $Payable WHERE Id = $AccountId";

$db->query($Bquery);
$logquery = "INSERT INTO accountslog
(
  UserId
 ,Date
 ,AccountId
 ,Description
 ,Debit
 ,Credit 
 ,Amount
)
VALUES
(
  $user_id -- UserId - INT(11)
 ,'$ReceivingDate' -- Date - DATETIME
 ,$AccountId -- AccountId - INT(11)
 ,'PrimarySale Document No: $DocumentNo' -- Description - VARCHAR(255)
 ,0 -- Debit - DECIMAL(19, 2)
 ,$Payable -- Credit - DECIMAL(19, 2)
 ,$CurrentBalance -- Amount - DECIMAL(19, 2)
);";
$db->query($logquery);
// $BankQuery = "INSERT INTO securitydeposit (UserId,Date,Description,Debit) VALUES ($user_id,'$ReceivingDate','$DocumentNo PrimarySale',$Payable);";
// $db->query($BankQuery);

$FF ="UPDATE stock SET Stock = Stock + $Qty WHERE SubProductId = $SubProductId AND UserId=$user_id";
	$FStock = $db->query($FF);

if ($db->affected_rows != 1) {
	$Create = "INSERT INTO stock
(
  UserId
 ,SubProductId
 ,Stock
)
VALUES
(
 $user_id -- UserId - INT(11)
 ,$SubProductId -- SubProductId - INT(11)
 ,$Qty -- Stock - DECIMAL(19, 2)
);";
$resultt = $db->query($Create);

}

$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
		

		
	
?>