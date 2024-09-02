<?php
require_once '../config/config.php';
extract($_POST);
$user_id = $_SESSION['user_id'];
$query = "INSERT INTO securitydeposit
(
  UserId
 ,Date
 ,PartyId
 ,Credit
 ,Debit
)
VALUES
(
 $user_id -- UserId - INT(11)
 ,'$Date' -- Date - DATE
 ,'$PartyId' -- PartyId - VARCHAR(255)
 ,$Credit -- Credit - DECIMAL(19, 2)
 ,0 -- Debit - DECIMAL(19, 2)
);";

$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
		
		
	
?>
