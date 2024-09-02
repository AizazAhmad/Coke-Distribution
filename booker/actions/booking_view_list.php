<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>SubProduct</th>
            <th>CustomerName</th>
            <th>Qty</th>
            <th>Action</th>            
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT
  booking.Id,
  sub_product.Name AS SubProduct,
  customer.Name AS CustomerName,
  booking.Qty
FROM booking
  INNER JOIN sub_product
    ON booking.SubProductId = sub_product.Id
  INNER JOIN customer
    ON booking.CustomerId = customer.Id WHERE booking.UserId = {$_SESSION['user_id']} AND booking.BookerId = {$_SESSION['booker_id']} AND Is_Booked = 1;";
$result = $db->query($query);
while ($row = $result->fetch_object()) {
    
    
    $btn_delete = delete_button($row->Id);    
    ?>
        <tr>
            
            <td><?php echo $row->SubProduct; ?></td>
            <td><?php echo $row->CustomerName; ?></td>
            <td><?php echo $row->Qty; ?></td>          
            <td><?php echo $btn_delete; ?></td>
            
        </tr>
    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>SubProduct</th>
            <th>CustomerName</th>
            <th>Qty</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>
