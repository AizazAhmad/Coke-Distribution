<?php
require_once '../config/config.php';
$id = $_POST['id'];
$query = "UPDATE booker SET Status = 0 WHERE Id = $id";
$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";