<?php
require_once '../config/config.php';
$row = fetchRecord($_POST['id'],'primarysalelog');
$Id = $row->Id;
$SubProductId = $row->SubProductId;
$Qty = $row->Qty;
$Payable = $row->Payable;
$AccountId = $row->AccountId;


$user_id = $_SESSION['user_id'];

$PreBalance = fetchRecord($AccountId,"accounts")->Balance;
$CurrentBalance = $PreBalance + $Payable;
$Bquery = "UPDATE accounts SET Balance = Balance + $Payable WHERE Id = $AccountId";

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
 ,'PrimarySale Reversed ' -- Description - VARCHAR(255)
 ,$Payable -- Debit - DECIMAL(19, 2)
 ,0 -- Credit - DECIMAL(19, 2)
 ,$CurrentBalance -- Amount - DECIMAL(19, 2)
);";
$db->query($logquery);


    $US = "UPDATE stock 
SET
  Stock = Stock - $Qty -- Stock - DECIMAL(19, 2)
WHERE
  SubProductId = $SubProductId AND UserId = $user_id
;";
$db->query($US);

$query = "DELETE FROM primarysalelog WHERE Id = $Id;";
$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
        
    
?>
