<?php
require_once '../config/config.php';
$RootId = $_POST['RootId'];
$query = "SELECT  Id,Name FROM subroot WHERE RootId = $RootId AND subroot.UserId = {$_SESSION['user_id']}";
    
    $result = $db->query($query);    
   $json = array();
while ($row = $result->fetch_object()) {
  $json[] = $row;
}
echo json_encode($json);

		
	
?>