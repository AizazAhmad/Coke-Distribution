<?php 
require_once '../config/config.php';


$query = "SELECT
  UFShell as FRS,
  UFBottle as FRB,
  UFPallet as FRP
FROM unfilled WHERE UserId = {$_SESSION['user_id']} LIMIT 10";

$result = $db->query($query);    
   $json = array();
while ($row = $result->fetch_object()) {
  $json[] = $row;
}
echo json_encode($json);
 ?>