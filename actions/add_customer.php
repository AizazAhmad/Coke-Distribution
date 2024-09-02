<?php
require_once '../config/config.php';
extract($_POST);

$VoyageCode = $VoyageCode ? $VoyageCode : 0.0;
$Mobile = $Mobile ? $Mobile : 0.0;
$Address = $Address ? $Address : "";
$user_id = $_SESSION['user_id'];

$query = "INSERT INTO customer
(
  UserId
 ,VoyageCode
 ,OutletTypeId
 ,Code
 ,Name
 ,PersonName
 ,VpoId
 ,Mobile
 ,Address
 ,CreditLimit
 )
VALUES
(
  $user_id -- UserId - INT(11)
 ,'$VoyageCode' -- VoyageCode - VARCHAR(50)
 ,$OutletTypeId -- OutleTypetId - INT(11)
 ,'$Code' -- Code - VARCHAR(50)
 ,'$Name' -- Name - VARCHAR(50)
 ,'$PersonName' -- PersonName - VARCHAR(50)
 ,$VpoId -- VpoId - INT(11)
 ,'$Mobile' -- Mobile - VARCHAR(50)
 ,'$Address' -- Address - VARCHAR(255)
 ,$CreditLimit -- CreditLimit - DECIMAL(19, 2)
 );";

 echo $query;
 exit();

if (is_dublicate('Code',$Code,'customer')) {
	echo "Existed";
	exit();
}

$result = $db->query($query);
if ($result){
	$last_id = $db->insert_id;

		foreach ($SubRootId as $key => $value) {
		$db->query("INSERT INTO customersubroot ( UserId ,CustomerId ,RootId ,SubRootId ) VALUES (  $user_id ,$last_id ,$RootId ,$value );");
	}

	$Q = "INSERT INTO customerledger
(
  UserId
 ,CustomerId
 ,Credit
 ,Debit
)
VALUES
(
 $user_id -- UserId - INT(11)
 ,$last_id -- CustomerId - INT(11)
 ,0 -- Credit - DECIMAL(19, 2)
 ,0 -- Debit - DECIMAL(19, 2)
);";
$res = $db->query($Q);
	echo "Success";
}else{
	echo "Invalid";
}

		

		
	
?>