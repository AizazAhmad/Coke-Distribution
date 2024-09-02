<?php
require_once '../config/config.php';

require_once '../config/eloquent.php';
use Models\Customer;

extract($_POST);

$cus = Customer::find($CustomerId);
$CustomerName = $cus->Code." ".$cus->Name;

$DateTime = $Date." ".date("H:i:s");
$user_id = $_SESSION['user_id'];
	$CusCredit = "INSERT INTO customerledger
(
  UserId
 ,Date
 ,DeliveryManId
 ,CustomerId
 ,Credit
 )
VALUES
(
 $user_id -- UserId - INT(11)
 ,'$DateTime' -- Date - INT(11)
 ,$DeliveryManId -- DeliveryManId - INT(11)
 ,$CustomerId -- CustomerId - INT(11)
 ,$Credit -- Credit - DECIMAL(19, 2)
 );";

$result = $db->query($CusCredit);

   $CQ = "INSERT INTO cash (UserId,Date,Description,Debit) VALUES ($user_id,'$DateTime','SecondarySales $CustomerName Credit',$Credit);";
   $result = $db->query($CQ);

if ($result) 
echo "Success";
else
echo "Invalid";
		
		
	
?>