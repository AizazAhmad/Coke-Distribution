<?php
    // SESSION_START();

    $base_path = $_SERVER['DOCUMENT_ROOT']; 
    

    require_once $base_path.'/config/eloqconfig.php';	
    require_once $base_path.'/vendor/autoload.php';
	
	use Models\Database;
	//Initialize Illuminate Database Connection
	new Database();