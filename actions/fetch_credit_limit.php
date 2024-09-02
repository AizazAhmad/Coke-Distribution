<?php
require_once '../config/config.php';
$id = $_POST['id'];
$row = fetchRecord($id,'customer');
echo $row->CreditLimit;
		
	
?>
