<?php
require_once '../config/config.php';
extract($_POST);
$Total = $BottleRate * $FBottles;
$Date = date('Y-m-d H:i:s');
$user_id = $_SESSION['user_id'];

$query = "INSERT INTO emptyloss
(
  UserId
 ,Date
 ,Name
 ,Qty
 ,Price
 ,Total
)
VALUES
(
  $user_id -- UserId - INT(11)
 ,'$Date' -- Date - DATETIME
 ,'Bottle' -- Name - VARCHAR(50)
 ,$FBottles -- Qty - SMALLINT(6)
 ,$BottleRate -- Price - DECIMAL(19, 2)
 ,$Total -- Total - DECIMAL(19, 2)
);";


$db->query("UPDATE unfilled SET UFBottle = UFBottle - $FBottles WHERE UserId=$user_id");

$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
		

		
	
?>