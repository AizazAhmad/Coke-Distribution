<?php 
require_once '../config/config.php';
$CustomerId = $_POST['CustomerId'];
$BDate = $_POST['BDate'];

$query = "SELECT
  sub_product.Id,
  CONCAT(sub_product.Code,' ',sub_product.Name) as Name,
  sub_product.Sale+sub_product.CompanyTax as Price,
  sub_product.Sale as BPrice,
  sub_product.Is_Empty,
  booking.Qty AS CustomerQty,
  booking.Promo,
  booking.ExtraShare,
  (SELECT SUM(Qty) FROM booking b WHERE b.Is_Booked = 1 AND b.BookingDate BETWEEN '$BDate 00:00:00' AND '$BDate 23:59:59' AND b.SubProductId=booking.SubProductId GROUP BY b.SubProductId) AS Stock
FROM booking
  INNER JOIN sub_product
    ON booking.SubProductId = sub_product.Id WHERE booking.CustomerId = $CustomerId AND booking.BookingDate BETWEEN '$BDate 00:00:00' AND '$BDate 23:59:59' AND booking.Is_Booked = 1 AND booking.UserId = {$_SESSION['user_id']} Group By booking.SubProductId,booking.Qty,booking.Promo,booking.ExtraShare ORDER BY sub_product.Code DESC";
   

 $result = $db->query($query);    
   $json = array();
while ($row = $result->fetch_object()) {
  $json[] = $row;
}
echo json_encode($json);

 ?>