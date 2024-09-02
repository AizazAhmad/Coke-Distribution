<?php
require_once '../config/config.php';
extract($_POST);
$user_id = $_SESSION['user_id'];
$query = "INSERT INTO coolerdistribution
(
  UserId
 ,CustomerId
 ,CoolerId
)
VALUES
(
  $user_id -- UserId - INT(11)
 ,$CustomerId -- CustomerId - INT(11)
 ,$CoolerId -- CoolerId - INT(11)
);";


if (is_multidublicate('UserId',$user_id,'CoolerId',$CoolerId,'coolerdistribution')) {
	echo "Existed";
	exit();
}
$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
		
		
	
?>
