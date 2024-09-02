<?php
require_once '../config/config.php';
extract($_POST);
$user_id = $_SESSION['user_id'];
$UFShell = $UFShell ? $UFShell : 0.0;
$UFBottle = $UFBottle ? $UFBottle : 0.0;
$UFPallet = $UFPallet ? $UFPallet : 0.0;
$query = "INSERT INTO unfilled
(
 UserId
 ,UFShell
 ,UFBottle
 ,UFPallet
)
VALUES
(
  $user_id -- UserId - INT(11)
 ,$UFShell -- UFShell - DECIMAL(19, 2)
 ,$UFBottle -- UFBottle - DECIMAL(19, 2)
 ,$UFPallet -- UFPallet - DECIMAL(19, 2)
);";

$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
		
		
	
?>
