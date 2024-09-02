<?php
require_once '../config/config.php';
extract($_POST);
$user_id = $_SESSION['user_id'];
$FShell = $FShell ? $FShell : 0.0;
$FBottle = $FBottle ? $FBottle : 0.0;
$FPallet = $FPallet ? $FPallet : 0.0;
$query = "INSERT INTO filled
(
 UserId
 ,FShell
 ,FBottle
 ,FPallet
)
VALUES
(
  $user_id -- UserId - INT(11)
 ,$FShell -- UFShell - DECIMAL(19, 2)
 ,$FBottle -- UFBottle - DECIMAL(19, 2)
 ,$FPallet -- UFPallet - DECIMAL(19, 2)
);";

$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
		
		
	
?>
