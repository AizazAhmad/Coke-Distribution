<?php 
require_once '../config/config.php';
$mainexptypeid = $_POST['mainexptypeid'];

$query = "SELECT * FROM expsubtype WHERE ExpMainTyepId = $mainexptypeid AND UserId = {$_SESSION['user_id']}";

$result = $db->query($query);    
   $json = array();
while ($row = $result->fetch_object()) {
  $json[] = $row;
}
echo json_encode($json);
 ?>