<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>Date</th>
            <th>DeliveryMan</th>
            <th>Customer</th>
            <th>Qty</th>
            <!-- <th>Action</th>             -->
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT
  emptyreturnlog.Date,
  CONCAT(deliveryman.Code,' ',deliveryman.Name) as DeliveryMan,
  CONCAT(customer.Code,' ',customer.Name) as Customer,
  emptyreturnlog.Qty
FROM emptyreturnlog
  INNER JOIN deliveryman
    ON emptyreturnlog.DeliveryManId = deliveryman.Id
  INNER JOIN customer
    ON emptyreturnlog.CustomerId = customer.Id WHERE emptyreturnlog.UserId = {$_SESSION['user_id']};";
    echo $query;
$result = $db->query($query);
while ($row = $result->fetch_object()) {
    
    $btn_edit = edit_button($row->Id);
    ?>
        <tr>
            
            <td><?php echo $row->Date; ?></td>
            <td><?php echo $row->DeliveryMan; ?></td>
            <td><?php echo $row->Customer; ?></td>
            <td><?php echo $row->Qty; ?></td>           
            <!-- <td><?php echo $btn_edit; ?></td> -->
            
        </tr>
    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Cost</th>
            <th>Qty</th>
            <!-- <th>Action</th> -->
        </tr>
    </tfoot>
</table>
