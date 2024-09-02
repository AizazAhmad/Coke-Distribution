<?php 
require_once '../config/config.php';
$CustomerId = $_POST['Id'];

$query = "SELECT (SUM(Credit) - SUM(Debit)) AS Credit
FROM customeremptycredit
 WHERE UserId = {$_SESSION['user_id']} AND CustomerId = $CustomerId;";


 $result = $db->query($query);    
 $row = $result->fetch_object();
   
echo json_encode($row);

 ?>