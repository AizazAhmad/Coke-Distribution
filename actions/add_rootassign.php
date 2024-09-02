<?php
require_once '../config/config.php';
extract($_POST);
$user_id = $_SESSION['user_id'];
$query = "INSERT INTO rootassign
(
  UserId
 ,Date
 ,BookerId
 ,RootId
)
VALUES
(
  $user_id -- UserId - INT(11)
 ,NOW() -- Date - TIMESTAMP
 ,$BookerId -- BookerId - INT(11)
 ,$RootId -- RootId - INT(11)
);";

$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
		
		
	
?>