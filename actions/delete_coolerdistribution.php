<?php
require_once '../config/config.php';
$id = $_POST['id'];
$query = "DELETE FROM coolerdistribution WHERE Id = $id";
$result = $db->query($query);

if ($result) 
echo "Success";
else
echo "Invalid";
  
    
