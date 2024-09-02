<?php
require_once '../config/config.php';
extract($_POST);
$user_id = $_SESSION['user_id'];
$Date = $Date." ".date("H:i:s");
$PreBalance = fetchRecord($AccountId,"accounts")->Balance;
$CurrentBalance = $PreBalance + $Amount;
$query = "UPDATE accounts SET Balance = Balance + $Amount WHERE Id = $AccountId";

$result = $db->query($query);
if ($result) {
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
 ,'$Description' -- Description - VARCHAR(255)
 ,$Amount -- Debit - DECIMAL(19, 2)
 ,0 -- Credit - DECIMAL(19, 2)
 ,$CurrentBalance -- Amount - DECIMAL(19, 2)
);";
$db->query($logquery);
echo "Success";

}else{
	echo "Invalid";
}