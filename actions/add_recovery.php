<?php
require_once '../config/config.php';

require_once '../config/eloquent.php';
use Models\Customer;

extract($_POST);

$cus = Customer::find($CustomerId);
$CustomerName = $cus->Code." ".$cus->Name;

$DateTime = $Date." ".date("H:i:s");
$user_id = $_SESSION['user_id'];

$Log = "INSERT INTO cashrecoverylog
(
  UserId
 ,Date
 ,DeliveryManId
 ,CustomerId
 ,Debit
)
VALUES
(
  $user_id -- UserId - INT(11)
 ,'$DateTime' -- Date - DATETIME
 ,$DeliveryManId -- DeliveryManId - INT(11)
 ,$CustomerId -- CustomerId - INT(11)
 ,$Debit -- Debit - DECIMAL(19, 2)
);";
$result = $db->query($Log);

$PreBalance = fetchRecord($AccountId,"accounts")->Balance;
$CurrentBalance = $PreBalance + $Debit;
$Bquery = "UPDATE accounts SET Balance = Balance + $Debit WHERE Id = $AccountId";

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
 ,NOW() -- Date - DATETIME
 ,$AccountId -- AccountId - INT(11)
 ,'Recovery From $CustomerName' -- Description - VARCHAR(255)
 ,$Debit -- Debit - DECIMAL(19, 2)
 ,0 -- Credit - DECIMAL(19, 2)
 ,$CurrentBalance -- Amount - DECIMAL(19, 2)
);";
$db->query($logquery);

	$CusDebit = "INSERT INTO customerledger
(
  UserId
 ,Date
 ,DeliveryManId
 ,CustomerId
 ,Debit
 )
VALUES
(
 $user_id -- UserId - INT(11)
 ,'$DateTime' -- Date - DATETIME
 ,$DeliveryManId -- DeliveryManId - INT(11)
 ,$CustomerId -- CustomerId - INT(11)
 ,$Debit -- Debit - DECIMAL(19, 2)
 );";

$result = $db->query($CusDebit);

if ($result) 
echo "Success";
else
echo "Invalid";
		

?>