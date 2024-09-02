<?php 
require_once '../config/config.php';
$mainexptypeid = $_POST['mainexptypeid'];
$subexptypeid = $_POST['subexptypeid'];

$query = "SELECT * FROM expchildtype WHERE ExpMainTyepId = $mainexptypeid AND ExpSubTyepId = $subexptypeid AND UserId = {$_SESSION['user_id']}";

$result = $db->query($query);    
   $json = array();
while ($row = $result->fetch_object()) {
  $json[] = $row;
}
echo json_encode($json);
 ?>