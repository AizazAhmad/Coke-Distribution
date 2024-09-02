<?php
require_once '../config/config.php';
extract($_POST);
$user_id = $_SESSION['user_id'];
$query = "INSERT INTO expchildtype
(
  UserId
 ,ExpMainTyepId
 ,ExpSubTyepId
 ,Name
)
VALUES
(
  $user_id -- UserId - INT(11)
 ,$ExpMainTyepId -- ExpMainTyepId - INT(11)
 ,$ExpSubTyepId -- ExpSubTyepId - INT(11)
 ,'$Name' -- Name - VARCHAR(50)
);";


$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
		
		
	
?>