<?php
    require_once '../config/config.php';

extract($_POST);
$user_id = $_SESSION['user_id'];
$DateTime = date("Y-m-d H:i:s");
$HTHDiscount = $HTHDiscount ? $HTHDiscount : 0.0;
$TPromo = $Qty*$Promo;
$TExtraShare = $Qty*$ExtraShare;

$Amount = $PreviousTotal - $Total;
// $QQ = "UPDATE primarysale SET Stock = Stock- $Up WHERE SubProductId = $SubProductId AND UserId = {$_SESSION['user_id']};";
// $db->query($QQ);

    $query = "UPDATE secondarysale 
SET
  HTHDiscount = $HTHDiscount -- HTHDiscount - DECIMAL(19, 2)
 ,Promo = $Promo -- Promo - DECIMAL(19, 2)
 ,TPromo = $TPromo -- TPromo - DECIMAL(19, 2)
 ,ExtraShare = $ExtraShare -- ExtraShare - DECIMAL(19, 2)
 ,TExtraShare = $TExtraShare -- ExtraShare - DECIMAL(19, 2)
 ,Total = $Total -- Total - DECIMAL(19, 2)
WHERE
  Id = $Id -- Id - INT(11) NOT NULL
;";
if (nagitive_check($Amount)) {
	$CD = "Debit";
	$Amount = abs($Amount);
}else{
	$CD = "Credit";
}
$QQ = "INSERT INTO cash (UserId,Date,Description,$CD) VALUES ($user_id,'$DateTime','Reversed secondarysale Entry',$Amount);";
// echo "PreviousTotal: ". $PreviousTotal."<br>";
// echo $QQ;
// exit();
$db->query($QQ);

$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
        
    
?>