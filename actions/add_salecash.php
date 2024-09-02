<?php
require_once '../config/config.php';
extract($_POST);
$user_id = $_SESSION['user_id'];
$Date = $Date." ".date("H:i:s");
require_once '../config/eloquent.php';
use Models\Customer;
$cus = Customer::find($CustomerId);
$CustomerName = $cus->Code." ".$cus->Name;

$PreBalance = fetchRecord($AccountId,"accounts")->Balance;
$CurrentBalance = $PreBalance + $Debit;
$query = "UPDATE accounts SET Balance = Balance + $Debit WHERE Id = $AccountId";

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
 ,'Secondary Sales Of $CustomerName' -- Description - VARCHAR(255)
 ,$Debit -- Debit - DECIMAL(19, 2)
 ,0 -- Credit - DECIMAL(19, 2)
 ,$CurrentBalance -- Amount - DECIMAL(19, 2)
);";
$db->query($logquery);
echo "Success";

}else{
	echo "Invalid";
}