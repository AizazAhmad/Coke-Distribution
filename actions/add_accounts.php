<?php
require_once '../config/config.php';
extract($_POST);
$Balance = $Balance ? $Balance : 0.0;
$user_id = $_SESSION['user_id'];
$query = "INSERT INTO accounts
(
  UserId
 ,Name
 ,Number
 ,Balance
)
VALUES
(
  $user_id -- UserId - INT(11)
 ,'$Name' -- Name - VARCHAR(50)
 ,'$AccountNumber' -- Cost - DECIMAL(19, 2)
 ,$Balance -- Sale - DECIMAL(19, 2)
 );";



$result = $db->query($query);
if ($result){
	$last_id = $db->insert_id;
	
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
 ,$last_id -- AccountId - INT(11)
 ,'Opening Balance' -- Description - VARCHAR(255)
 ,$Balance -- Debit - DECIMAL(19, 2)
 ,0 -- Credit - DECIMAL(19, 2)
 ,$Balance -- Amount - DECIMAL(19, 2)
);";
$db->query($logquery);
echo "Success";

}else{
	echo "Invalid";
}