<?php
require_once '../config/config.php';
extract($_POST);
$user_id = $_SESSION['user_id'];
$Time = date("H:i:s");
$DateTime = $Date." ".$Time;
$query = "INSERT INTO vehexpense
(
  UserId
 ,Date
 ,VMTypeId
 ,VehicleId
 ,Amount
 ,Description
)
VALUES
(
  {$_SESSION['user_id']} -- UserId - INT(11)
 ,'$DateTime' -- Date - DATETIME
 ,$VMTypeId -- VMTypeId - VARCHAR(50)
 ,$VehicleId -- VehicleId - VARCHAR(50)
 ,$Amount -- Cost - DECIMAL(19, 2)
 ,'$Description' -- Description - DECIMAL(19, 2)
 );";


$PreBalance = fetchRecord($AccountId,"accounts")->Balance;
$CurrentBalance = $PreBalance - $Amount;
$Bquery = "UPDATE accounts SET Balance = Balance - $Amount WHERE Id = $AccountId";

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
 ,'Vehicle Expense: $Description' -- Description - VARCHAR(255)
 ,0 -- Debit - DECIMAL(19, 2)
 ,$Amount -- Credit - DECIMAL(19, 2)
 ,$CurrentBalance -- Amount - DECIMAL(19, 2)
);";
$db->query($logquery);

$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
		
		
	
?>