<?php
require_once '../config/config.php';
$id = $_POST['id'];
$query = "SELECT
  UFShell as RS,
  UFBottle as RB,
  UFPallet as RP
FROM unfilled WHERE UserId = {$_SESSION['user_id']};";
    $result = $db->query($query);    
    $row = $result->fetch_object();
   echo json_encode($row);
       
		
		
	
?>
