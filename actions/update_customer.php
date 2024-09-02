<?php
    require_once '../config/config.php';
    extract($_POST);
    $user_id = $_SESSION['user_id'];
    $query = "UPDATE customer 
SET
 VoyageCode = '$VoyageCode' 
 ,Name = '$Name'
 ,PersonName = '$PersonName' 
 ,VpoId = $VpoId 
 ,Mobile = '$Mobile' 
 ,Address = '$Address' 
 ,CreditLimit = $CreditLimit
 ,Status = 3
 WHERE
  Id = $Id 
;";

foreach ($SubRootId as $key => $value) {
		$db->query("INSERT INTO customersubroot ( UserId ,CustomerId ,RootId ,SubRootId ) VALUES (  $user_id ,$Id ,$RootId ,$value );");
	}

$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
        
    
?>