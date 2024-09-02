<?php
require_once '../config/config.php';
extract($_POST);
$Credit = $Credit ? $Credit : 0.0;
$Debit = $Debit ? $Debit : 0.0;
$user_id = $_SESSION['user_id'];
$query = "INSERT INTO customerledger
(
 UserId
 ,CustomerId
 ,Credit
 ,Debit
)
VALUES
(
  $user_id -- UserId - INT(11)
 ,$CustomerId -- CustomerId - INT(11)
 ,$Credit -- Credit - DECIMAL(19, 2)
 ,$Debit -- Debit - DECIMAL(19, 2)
);";


$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
		

		
	
?>