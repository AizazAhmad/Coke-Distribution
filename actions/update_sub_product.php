<?php
    require_once '../config/config.php';
    extract($_POST);
    $user_id = $_SESSION['user_id'];
    $query = "UPDATE sub_product 
SET
  Name = '$Name' -- Name - VARCHAR(50)
 ,Unit = $Unit -- Unit - DECIMAL(19, 2)
 ,Cost = $Cost -- Cost - DECIMAL(19, 2)
 ,Sale = $Sale -- Sale - DECIMAL(19, 2)
 ,PackageSizeId = $PackageSizeId -- Sale - DECIMAL(19, 2)
 ,Scheme = $Scheme -- Scheme - DECIMAL(19, 2)
 ,SelfLiftingRate = $SelfLiftingRate -- SelfLiftingRate - DECIMAL(19, 2)
 ,DistributorCommission = $DistributorCommission -- DistributorCommission - DECIMAL(19, 2)
 ,AdvanceTaxRate = $AdvanceTaxRate -- AdvanceTaxRate - DECIMAL(19, 2)
 ,AdvanceTaxAmount = $AdvanceTaxAmount -- AdvanceTaxAmount - DECIMAL(19, 3)
 ,CompanyTax = $CompanyTax -- CompanyTax - DECIMAL(19, 2)
 WHERE
  Id = $Id -- Id - INT(11) NOT NULL
;";


$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
        
    
?>