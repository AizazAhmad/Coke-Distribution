<?php
require_once '../config/config.php';
$id = $_POST['id'];
$query = "SELECT SUM(Credit) as Credit, SUM(Debit) as Debit From customerledger WHERE CustomerId = $id AND UserId = {$_SESSION['user_id']};";
    $result = $db->query($query);    
    $row = $result->fetch_object();
    $credit = $row->Credit;
    $debit = $row->Debit;
    $res = $credit-$debit;
    echo $res;
       
		
		
	
?>
