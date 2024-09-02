<?php require_once '../config/config.php';


extract($_POST);

$user_id = $_SESSION['user_id'];
$Obquery = "SELECT * FROM objectprice Where UserId = {$_SESSION['user_id']}";
    $obresult = $db->query($Obquery);    
    $obj = array();
	while ($row = $obresult->fetch_object()) {
	  $obj[] = $row;
	}

$BottlePrice = $obj[0]->Price;
$ShellPrice = $obj[1]->Price;

$Cash = 0;
$QT = 0;

$Time = date("H:i:s");
$DateTime = $Date." ".$Time;
	
 if (isset($BER) && isset($SER)) {
 	$Unfilled = 1; //Will Be Plus +
 	$Filled = 1; // Will Be Deduct -
 	$QT = 1;
 	
 }
 
 if (isset($Account)) {	
 	$Filled = 1; //will Be Deduct -
 	$Cash = 1;
 	$TBPrice = ($Qty * 24) * $BottlePrice; 
 	$TSPrice = $Qty * $ShellPrice; 
 	$Amount = $TBPrice + $TSPrice;
 	$Invoicing = "Bottles: $TBPrice And Shells: $TSPrice";

 	$PreBalance = fetchRecord($AccountId,"accounts")->Balance;
	$CurrentBalance = $PreBalance + $Amount;
	$Bquery = "UPDATE accounts SET Balance = Balance + $Amount WHERE Id = $AccountId";

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
	 ,'$DateTime' -- Date - DATETIME
	 ,$AccountId -- AccountId - INT(11)
	 ,'$Invoicing' -- Description - VARCHAR(255)
	 ,$Amount -- Debit - DECIMAL(19, 2)
	 ,0 -- Credit - DECIMAL(19, 2)
	 ,$CurrentBalance -- Amount - DECIMAL(19, 2)
	);";
	$db->query($logquery);
 	
 }

 if ($Unfilled) {
 
	$db->query("UPDATE unfilled SET UFShell = UFShell + $FShell, UFBottle = UFBottle + $FBottles WHERE UserId=$user_id");
	
 }
 if ($Filled) {
 	
	$db->query("UPDATE filled SET FShell = FShell - $FShell, FBottle = FBottle - $FBottles WHERE UserId=$user_id");	
	
 }



$Credit = 0;
$Debit = 0;
$Price = 0;
$BCDebit = 0;

	if ($Cash){
		$BCDebit = $Qty;
		$Price = $Amount; 
		$Credit = $Rem - $Qty;
		if ($Qty < $Rem ) {
			$Transection = 1;
		}
		
	}
	if ($QT){

		if ($Qty < $Rem ) {
			$Transection = 1;
			$Credit = $Rem - $Qty;
		}
	}
 	
	if ($Transection) {
		$CreditEmpty ="INSERT INTO customeremptycredit
(
UserId
,Date
,DeliveryManId
,CustomerId
,Credit
,Debit
,BCDebit
,Price
)
VALUES
(
$user_id -- UserId - INT(11)
,'$DateTime' -- Date - TIMESTAMP
,$DeliveryManId -- DeliveryManId - INT(11)
,$CustomerId -- CustomerId - INT(11)
,$Credit -- Credit - SMALLINT(6)
,$Debit -- Debit - SMALLINT(6)
,$BCDebit -- BCDebit - SMALLINT(6)
,$Price -- Price - DECIMAL(19, 2)
);";
$db->query($CreditEmpty);
	
	}
 		
 		
	$Up = "UPDATE secondarysale SET Status = 0 WHERE DeliveryManId = $DeliveryManId AND CustomerId = $CustomerId AND secondarysale.Date BETWEEN '$Date 00:00:00' AND '$Date 23:59:59' AND secondarysale.Status = 1;";
$result = $db->query($Up);


if ($result)
echo "Success";
else
echo "Invalid";
	
	
?>