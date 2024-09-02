<?php
require_once '../config/config.php';
$id = $_POST['id'];
$query = "UPDATE expmaintype SET Status = 1 WHERE Id = $id";
$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
    
