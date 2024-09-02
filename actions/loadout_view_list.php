<?php extract($_POST); ?>
<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>Date</th>
            <th>Delivery Man</th>
            <th>Sub Product</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Total</th>
            <th>BottleReturns</th>
            <th>Action</th>            
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT
  loadout.Id,
  loadout.Date,
  loadout.Qty,
  loadout.Price,
  loadout.Total,
  vehicle.Number as VehicleNumber,
  deliveryman.Code as DeliveryManCode,
  deliveryman.Name as DeliveryManName,
  sub_product.Code as SubProductCode,
  sub_product.Name as SubProductName,
  sub_product.Is_Empty as Empty
FROM loadout
  INNER JOIN vehicle
    ON loadout.VehicleId = vehicle.Id
  INNER JOIN deliveryman
    ON loadout.DeliveryManId = deliveryman.Id
  INNER JOIN sub_product
    ON loadout.SubProductId = sub_product.Id
 WHERE loadout.UserId = {$_SESSION['user_id']} AND loadout.Date BETWEEN '$Date 00:00:00' AND '$Date 23:59:59' AND loadout.DeliveryManId = $DeliveryManId AND loadout.LoadNo = '$LoadNo';";
$result = $db->query($query);
while ($row = $result->fetch_object()) {
    
    $btn_edit = edit_button($row->Id);
    ?>
        <tr>
            <td><?php echo $row->Date; ?></td>
            <td><?php echo $row->DeliveryManName; ?></td>
            <td><?php echo $row->SubProductCode." ".$row->SubProductName; ?></td>
            <td><?php echo $row->Qty; ?></td>           
            <td><?php echo $row->Price; ?></td>           
            <td><?php echo $row->Total; ?></td>           
            <td><?php if ($row->Empty) {
              echo $row->Qty*24;
            }else{              
             ?><div class="badge badge-warning">No return</div><?php } ?></td>           
            <td><?php echo $btn_edit; ?></td>
        </tr>
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>Date</th>
            <th>Delivery Man</th>
            <th>Sub Product</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Total</th>
            <th>BottleReturns</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>
