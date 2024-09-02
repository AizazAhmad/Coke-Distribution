<?php
require_once '../config/config.php';

$query = "SELECT Id,Code,Name FROM sub_product WHERE PartyId = {$_POST['PartyId']} AND UserId = {$_SESSION['user_id']} AND Status = 1";
    $result = $db->query($query);    
    while ($row = $result->fetch_object()) {
        echo "<option value='".$row->Id."'>".$row->Code." ".$row->Name."</option>";
    }
		
		
	
?>
