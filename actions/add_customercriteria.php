<?php
require_once '../config/config.php';
extract($_POST);
$user_id = $_SESSION['user_id'];
$RGB = $RGB ? $RGB : 0.0;
$query = "INSERT INTO customercriteria
(
  UserId
 ,CustomerId
 ,DeliveryManId
 ,SubProductId
 ,HTHDiscount
 ,HTHShare
 ,RGB
)
VALUES
(
  $user_id -- UserId - INT(11)
 ,$CustomerId -- CustomerId - INT(11)
 ,$DeliveryManId -- DeliveryManId - INT(11)
 ,$SubProductId -- SubProductId - INT(11)
 ,$HTHDiscount -- HTHDiscount - TINYINT(1)
 ,$HTHShare -- HTHShare - TINYINT(1)
 ,$RGB -- HTHShare - TINYINT(1)
);";

if (is_multidublicate('SubProductId',$SubProductId,'CustomerId',$CustomerId,'customercriteria')) {
	echo "Existed";
	exit();
}

$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
		

		
	
?>