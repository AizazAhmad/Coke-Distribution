<?php 
require_once '../config/config.php';
$RootId = $_POST['RootId'];
$LDate = $_POST['ldate'];

$query = "SELECT DISTINCT
  LoadNo  
FROM loadout
   WHERE RootId = $RootId AND loadout.Date BETWEEN '$LDate 00:00:00' AND '$LDate 23:59:59' AND Status = 0 AND UserId = {$_SESSION['user_id']};";

 $result = $db->query($query);    
   $json = array();
while ($row = $result->fetch_object()) {
  $json[] = $row;
}
echo json_encode($json);
 
 ?>