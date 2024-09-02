<?php
require_once '../config/config.php';

extract($_POST);
$user_id = $_SESSION['user_id'];
$DateTime = $Date." ".date("H:i:s");
$Credit = $Credit ? $Credit : 0.0;
$Debit = $Debit ? $Debit : 0.0;


$query = "INSERT INTO cash
(
  UserId
 ,Date
 ,Description
 ,Credit
 ,Debit
)
VALUES
(
  $user_id -- UserId - INT(11)
 ,'$DateTime' -- Date - DateTime(11)
 ,'$Description' -- Description - DateTime(11)
 ,$Credit -- Credit - DECIMAL(19, 2)
 ,$Debit -- Debit - DECIMAL(19, 2)
);";

if (isset($Transfer)) {
	$BankQuery = "INSERT INTO securitydeposit
(
  UserId
 ,Date
 ,Credit
,Description
)
VALUES
(
 $user_id -- UserId - INT(11)
 ,'$DateTime' -- Date - DateTime(11)
 ,$Debit -- Credit - DECIMAL(19, 2)
 ,'$Description' -- Description - VARCHAR(255)
);";
$db->query($BankQuery);

}

$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
		
		
	
?>