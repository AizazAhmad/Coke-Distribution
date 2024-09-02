<?php
    session_start();
    // https://bms.zeezaaq.com/
    $base_url = "https://bms.dev/admin/";
    $base_path = $_SERVER['DOCUMENT_ROOT']."admin/";
    $config_path = $base_path.'config/';
   
    $include_path = $base_path.'include/';
    $upload_path = $base_path.'uploads/';
    $function_path = $base_path.'functions/';
    $action_path = $base_path.'actions/';
    $vendor_path = $base_path.'vendors/';
    $assets_path = $base_path.'assets/';
    // echo $include_path;
    // exit();
    $assets_url = $base_url.'assets/';
    $upload_url = $base_url.'uploads/';
    $include_url = $base_url.'includes/';

    $admin_assets = $assets_url.'admin/';
    $admin_url = $base_url.'admin/';
    $photo_url = $base_url.'admin/uploads/';
    $userphoto_url = $base_url.'admin/assets/Uploads/';
    $action_url = $base_url.'actions/';

    require_once $config_path.'connection.php';
    require_once $vendor_path.'phpmailer/autoload.php';
    // require_once $function_path.'validate.php';    
    require_once $function_path.'helpers.php';
