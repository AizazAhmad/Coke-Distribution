<?php
require_once '../config/config.php';
// $BookerId = $_POST['BookerId'];
$query = "SELECT  root.Id,root.Name FROM root WHERE UserId = {$_SESSION['user_id']}";
    
    $result = $db->query($query);    
   $json = array();
while ($row = $result->fetch_object()) {
  $json[] = $row;
}
echo json_encode($json);

		
	
?>