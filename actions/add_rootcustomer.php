<?php
require_once '../config/config.php';
extract($_POST);
$user_id = $_SESSION['user_id'];
$query = "INSERT INTO rootcustomer
(
  UserId
 ,RootId
 ,CustomerId
)
VALUES
(
  $user_id -- UserId - INT(11)
 ,$RootId -- CustomerId - INT(11)
 ,$CustomerId -- CoolerId - INT(11)
);";


if (is_multidublicate('UserId',$user_id,'CustomerId',$CustomerId,'rootcustomer')) {
	echo "Existed";
	exit();
}
$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
		
		
	
?>