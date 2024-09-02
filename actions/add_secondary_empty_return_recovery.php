<?php require_once '../config/config.php';

$Cash = 0;
$QT = 0;

extract($_POST);

$user_id = $_SESSION['user_id'];
$Time = date("H:i:s");
$DateTime = $Date." ".$Time;
$Obquery = "SELECT * FROM objectprice Where UserId = {$_SESSION['user_id']}";
    $obresult = $db->query($Obquery);    
    $obj = array();
	while ($row = $obresult->fetch_object()) {
	  $obj[] = $row;
	}

$BottlePrice = $obj[0]->Price;
$ShellPrice = $obj[1]->Price;

 if ($IsRecovery == "By Qty") {
 	$Unfilled = 1;
 	$QT = 1;
 }

 if ($IsRecovery == "By Cash") {
 	$Cash = 1;
 	$TBPrice = ($Qty * 24) * $BottlePrice; 
 	$TSPrice = $Qty * $ShellPrice; 
 	$Amount = $TBPrice + $TSPrice;
 	$Invoicing = "$DeliverManName Bottles: $TBPrice And Shells: $TSPrice Recovery";

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
 
 	

 	
$Credit = 0;
$Debit = 0;
$Price = 0;
$BCDebit = 0;

if ($Cash){
	$BCDebit = $RemCredit;
	$Price = $Amount;

}
if ($QT){
	$Debit = $Qty;
}
	
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
$result = $db->query($CreditEmpty);
 
	



if ($result)
echo "Success";
else
echo "Invalid";
	
	
?>