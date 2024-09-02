<?php
require_once '../config/config.php';
extract($_POST);

$user_id = $_SESSION['user_id'];
$Time = date("H:i:s");
$DateTime = $Date." ".$Time;

$query = "INSERT INTO expense
(
  UserId
 ,Date
 ,MTypeId
 ,STypeId
 ,CTypeId
 ,Amount
 ,Description
)
VALUES
(
  $user_id -- UserId - INT(11)
 ,'$DateTime' -- Date - TIMESTAMP
 ,$ExpMainTyepId -- MTypeId - INT(11)
 ,$ExpSubTyepId -- STypeId - INT(11)
 ,$ExpChildTyepId -- CTypeId - INT(11)
 ,$Amount -- Amount - DECIMAL(19, 2)
 ,'$Description' -- Description - VARCHAR(255)
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
 ,NOW() -- Date - DATETIME
 ,$AccountId -- AccountId - INT(11)
 ,'Expense: $Description' -- Description - VARCHAR(255)
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