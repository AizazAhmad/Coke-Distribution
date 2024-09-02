<?php
require_once '../config/config.php';

extract($_POST);
$user_id = $_SESSION['user_id'];
$Scheme = $Scheme ? $Scheme : 0.0;
$SelfLiftingRate = $SelfLiftingRate ? $SelfLiftingRate : 0.0;
$Unit = $Unit ? $Unit : 0.0;
$DistributorCommission = $DistributorCommission ? $DistributorCommission : 0.0;

$query = "INSERT INTO sub_product
(
  UserId
 ,ProductId
 ,PartyId
 ,Code
 ,Name
 ,Unit
 ,Cost
 ,Sale
 ,Scheme
 ,SelfLiftingRate
 ,DistributorCommission
 ,CompanyTax
 ,AdvanceTaxRate
 ,AdvanceTaxAmount
 ,PackageSizeId
 ,Is_Empty
 )
VALUES
(
  $user_id
 ,$ProductId
 ,$PartyId
 ,'$Code'
 ,'$Name'
 ,$Unit
 ,$Cost
 ,$Sale
 ,$Scheme
 ,$SelfLiftingRate
 ,$DistributorCommission
 ,$CompanyTax
 ,$AdvanceTaxRate
 ,$AdvanceTaxAmount
 ,$PackageSizeId
 ,$IsEmpty
);";

if (is_dublicate('Code',$Code,'sub_product')) {
	echo "Existed";
	exit();
}

$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
		

		
	
?>