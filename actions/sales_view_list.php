<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>Date</th>
            <th>DeliveryMan</th>
            <th>Customer</th>
            <th>SubProduct</th>
            <th>Qty</th>
            <th>Promo</th>
            <th>TPromo</th>
            <th>Extra</th>
            <th>TExtra</th>
            <th>Action</th>            
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT
  secondarysale.Id,
  deliveryman.Name as DeliveryMan,
  customer.Name as Customer,
  secondarysale.Date,
  secondarysale.Qty,
  secondarysale.HTHDiscount,
  secondarysale.Promo,
  secondarysale.TPromo,
  secondarysale.ExtraShare,
  secondarysale.TExtraShare,
  secondarysale.Total,
  sub_product.Name as SubProduct
FROM secondarysale
  INNER JOIN deliveryman
    ON secondarysale.DeliveryManId = deliveryman.Id
  INNER JOIN customer
    ON secondarysale.CustomerId = customer.Id
  INNER JOIN sub_product
    ON secondarysale.SubProductId = sub_product.Id WHERE secondarysale.UserId = {$_SESSION['user_id']} ORDER BY Id";
$result = $db->query($query);
while ($row = $result->fetch_object()) {
  
    $btn_edit = edit_button($row->Id);    
    //$delete_edit = delete_button($row->Id);    

    ?>

        <tr>
            
            <td><?=$row->Date?></td>
            <td><?=$row->DeliveryMan?></td>
            <td><?=$row->Customer?></td>
            <td><?=$row->SubProduct?></td>
            <td><?=$row->Qty?></td>
            <td><?=$row->Promo?></td>
            <td><?=$row->TPromo?></td>
            <td><?=$row->ExtraShare?></td>                                
            <td><?=$row->TExtraShare?></td>                                
            <td><?php echo $btn_edit; ?></td>
            
        </tr>

    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>Date</th>
            <th>DeliveryMan</th>
            <th>Customer</th>
            <th>SubProduct</th>
            <th>Qty</th>
            <th>Promo</th>
            <th>TPromo</th>
            <th>Extra</th>
            <th>TExtra</th>
            <th>Action</th> 
        </tr>
    </tfoot>
</table>