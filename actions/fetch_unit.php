<?php
require_once '../config/config.php';

$row = fetchRecord($_POST['id'],'product');
echo $row->UnitCase;	
		
	
?>
