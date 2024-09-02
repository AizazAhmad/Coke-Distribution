<?php

require_once '../config/config.php';
extract($_POST);

$Obquery = "SELECT * FROM objectprice Where UserId = {$_SESSION['user_id']}";
    $obresult = $db->query($Obquery);    
    $obj = array();
	while ($row = $obresult->fetch_object()) {
	  $obj[] = $row;
	}

$BottlePrice = $obj[0]->Price;
$ShellPrice = $obj[1]->Price;
$PalletPrice = $obj[2]->Price;

$user_id = $_SESSION['user_id'];
$Date = $Date." ".date("H:i:s");
$Invoicing = "";
$BSPT = 0;
$UPallet = 0;
$FPallett = 0;
$EmptyNotReturn = false;
$PalletNotReturn = false;

if (isset($AccountId)) {
	if (!isset($BER)) {
		$BP = $FBottles * $BottlePrice;
 		$Invoicing .="$FBottles Bottle $BP |";
 		$BSPT += $BP;
 		$EmptyNotReturn = true; 
 		$Filled = 1;
 	}
 	if (!isset($SER)) {
 		$SP = $FShell * $ShellPrice;
 		$Invoicing .="| $FShell Shell $SP |";
 		$BSPT += $SP;
 		$EmptyNotReturn = true; 
 		$Filled = 1;
 	}
 	if (!isset($PER)) {
 		$PP = $FPallet * $PalletPrice;
 		$Invoicing .="| $FPallet Pallet $PP";
 		$BSPT += $PP;
 		$PalletNotReturn = true;
 	}
 	
 	$PreBalance = fetchRecord($AccountId,"accounts")->Balance;
	$CurrentBalance = $PreBalance - $BSPT;
	$Bquery = "UPDATE accounts SET Balance = Balance - $BSPT WHERE Id = $AccountId";

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
	 ,'$Date' -- Date - DATETIME
	 ,$AccountId -- AccountId - INT(11)
	 ,'$Invoicing' -- Description - VARCHAR(255)
	 ,0 -- Debit - DECIMAL(19, 2)
	 ,$BSPT -- Credit - DECIMAL(19, 2)
	 ,$CurrentBalance -- Amount - DECIMAL(19, 2)
	);";
	$db->query($logquery);
}

	
if (!isset($PER)) {
	if (isset($AccountId)) {
		
		$FPallett = 1;
	}else{
		$UPallet = 1;
	}
	
}

 
 if (isset($BER)) {
 	$db->query("UPDATE unfilled SET UFBottle = UFBottle-$FBottles WHERE UserId=$user_id");
 	$db->query("UPDATE filled SET FBottle = FBottle+$FBottles WHERE UserId=$user_id");
 	$Filled = 0;
 }
 if (isset($SER)) {
 	$db->query("UPDATE unfilled SET UFShell = UFShell-$FShell WHERE UserId=$user_id");
 	$db->query("UPDATE filled SET FShell = FShell+$FShell WHERE UserId=$user_id");
 	$Filled = 0;
 }

 if ($Filled) {
 	
	$db->query("UPDATE filled SET FShell = FShell+$FShell, FBottle = FBottle+$FBottles WHERE UserId=$user_id");	
 }
 if ($UPallet) {
 	
	$db->query("UPDATE unfilled SET UFPallet = UFPallet-$FPallet WHERE UserId=$user_id");
 }
 if ($FPallett) {

	$db->query("UPDATE filled SET FPallet = FPallet+$FPallet WHERE UserId=$user_id");
 }

 if ($EmptyNotReturn) {
	$FShell = 0;
 }
 if ($PalletNotReturn) {
	$FPallet = 0;
 }

$Main = "INSERT INTO empty_invoice
(
  UserId
 ,Date
 ,PrimarySaleId
 ,InvNo
 ,Territory
 ,Transporter
 ,Vehicle
 ,DriverCNIC
 ,BottlesShell
 ,Pallet
)
VALUES
(
  $user_id -- UserId - INT(11)
 ,'$Date' -- Date - DATE
 ,$PrimarySaleId -- PrimarySaleId - INT(11)
 ,'$InvoiceNo' -- InvNo - VARCHAR(255)
 ,'$Territory' -- Territory - VARCHAR(255)
 ,'$Transporter' -- Transporter - VARCHAR(255)
 ,'$Vehicle' -- Vehicle - VARCHAR(255)
 ,'$DriverCNIC' -- DriverCNIC - VARCHAR(255)
 ,$FShell -- BottlesShell - DECIMAL(10, 2)
 ,$FPallet -- Pallet - DECIMAL(10, 2)
);";

$result = $db->query($Main);
if ($result) {
	// $db->query("UPDATE primarysalelog SET Status = 1 WHERE Id = $PrimarySaleId;");
	echo "Success";
}
else{
	echo "Invalid";
}

?>