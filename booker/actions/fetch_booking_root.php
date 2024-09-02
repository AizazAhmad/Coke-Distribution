<?php 
require_once '../config/config.php';
$BDate = $_POST['BDate'];

$query = "SELECT DISTINCT
  root.Id,
  root.Name  
FROM booking
  INNER JOIN root
    ON booking.RootId = root.Id WHERE booking.BookingDate BETWEEN '$BDate 00:00:00' AND '$BDate 23:59:59' AND booking.Status = 0 AND booking.UserId = {$_SESSION['user_id']};";

 $result = $db->query($query);    
   $json = array();
while ($row = $result->fetch_object()) {
  $json[] = $row;
}
echo json_encode($json);

 ?>