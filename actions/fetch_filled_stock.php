<?php 
require_once '../config/config.php';


$query = "SELECT
  FShell as FRS,
  FBottle as FRB,
  FPallet as FRP
FROM filled WHERE UserId = {$_SESSION['user_id']} LIMIT 10";

$result = $db->query($query);    
   $json = array();
while ($row = $result->fetch_object()) {
  $json[] = $row;
}
echo json_encode($json);
 ?>