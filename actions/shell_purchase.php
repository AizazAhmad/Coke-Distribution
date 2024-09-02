<?php
require_once '../config/config.php';
extract($_POST);
$Total = $ShellRate * $FShell;
$DateTime = date('Y-m-d H:i:s');
$user_id = $_SESSION['user_id'];

$query = "INSERT INTO emptypurchase
(
  UserId
 ,Date
 ,Name
 ,Qty
 ,Price
 ,Total
)
VALUES
(
  $user_id -- UserId - INT(11)
 ,'$DateTime' -- Date - DATETIME
 ,'Shell' -- Name - VARCHAR(50)
 ,$FShell -- Qty - SMALLINT(6)
 ,$ShellRate -- Price - DECIMAL(19, 2)
 ,$Total -- Total - DECIMAL(19, 2)
);";

$PreBalance = fetchRecord($AccountId,"accounts")->Balance;
$CurrentBalance = $PreBalance - $Total;
$Bquery = "UPDATE accounts SET Balance = Balance - $Total WHERE Id = $AccountId";

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
 ,'$FShell Shells Purchased' -- Description - VARCHAR(255)
 ,0 -- Debit - DECIMAL(19, 2)
 ,$Total -- Credit - DECIMAL(19, 2)
 ,$CurrentBalance -- Amount - DECIMAL(19, 2)
);";
$db->query($logquery);

$db->query("UPDATE unfilled SET UFShell = UFShell + $FShell WHERE UserId=$user_id");

$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
		

		
	
?>