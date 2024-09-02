<?php
require_once '../config/config.php';
extract($_POST);
$user_id = $_SESSION['user_id'];
$Date = $Date." ".date("H:i:s");
//Account To be Transfered amount
$From = fetchRecord($AccountId,"accounts")->Name." ".fetchRecord($AccountId,"accounts")->Number;

$To = fetchRecord($TAccountId,"accounts")->Name." ".fetchRecord($TAccountId,"accounts")->Number;


$PreBalance = fetchRecord($AccountId,"accounts")->Balance;
$DebitBalance = $PreBalance - $Amount;

$TPreBalance = fetchRecord($TAccountId,"accounts")->Balance;
$TDebitBalance = $TPreBalance + $Amount;

// echo $From."<br>";
// echo $To."<br>";
// exit();
// echo $PreBalance."<br>";
// echo $TPreBalance."<br>";
// exit();
$query = "UPDATE accounts SET Balance = Balance - $Amount WHERE Id = $AccountId";

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
 ,'$To $Description' -- Description - VARCHAR(255)
 ,0 -- Debit - DECIMAL(19, 2)
 ,$Amount -- Credit - DECIMAL(19, 2)
 ,$DebitBalance -- Amount - DECIMAL(19, 2)
);";
$db->query($logquery);

$result = $db->query($query);
if ($result) {


$Tquery = "UPDATE accounts SET Balance = Balance + $Amount WHERE Id = $TAccountId";
	$Tlogquery = "INSERT INTO accountslog
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
 ,$TAccountId -- AccountId - INT(11)
 ,'$From $Description' -- Description - VARCHAR(255)
 ,$Amount -- Debit - DECIMAL(19, 2)
 ,0 -- Credit - DECIMAL(19, 2)
 ,$TDebitBalance -- Amount - DECIMAL(19, 2)
);";
$db->query($Tquery);
$db->query($Tlogquery);
echo "Success";

}else{
	echo "Invalid";
}