<?php
    require_once '../config/config.php';
    extract($_POST);
    
    $DateTime = date("Y-m-d H:i:s");
    $user_id = $_SESSION['user_id'];
    
    $query = "UPDATE vehexpense 
SET
  Amount = $Amount
WHERE
  Id = $Id -- Id - INT(11) NOT NULL
";
$Amount = $PreviousAmount - $Amount;
if (nagitive_check($Amount)) {
	$CD = "Debit";
	$Amount = abs($Amount);
}else{
	$CD = "Credit";
}

$QQ = "INSERT INTO cash (UserId,Date,Description,$CD) VALUES ($user_id,'$DateTime','Vehicle Expense Updated',$Amount);";
$db->query($QQ);

$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
        
    
?>