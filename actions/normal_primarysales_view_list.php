<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>OrderDate</th>
            <th>ReceivingDate</th>
            <th>DocumentNo</th>
            <th>DeliveryManBuilty</th>
            <th>Party</th>
            <th>SubProduct</th>
            <th>Qty</th>
            <th>Payable</th>          
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT
  primarysalelog.*,
  CONCAT(party.Code,party.Name) as Party,
  CONCAT(sub_product.Code,sub_product.Name) as SubProduct
FROM primarysalelog
  INNER JOIN party
    ON primarysalelog.PartyId = party.Id
  INNER JOIN sub_product
    ON primarysalelog.SubProductId = sub_product.Id
WHERE primarysalelog.UserId = {$_SESSION['user_id']} ORDER BY primarysalelog.OrderDate DESC";
$result = $db->query($query);
while ($row = $result->fetch_object()) {
   
    ?>
        <tr>
            
            <td><?php echo $row->OrderDate; ?></td>
            <td><?php echo $row->ReceivingDate; ?></td>
            <td><?php echo $row->DocumentNo; ?></td>
            <td><?php echo $row->DeliveryManBuilty; ?></td>           
            <td><?php echo $row->Party; ?></td>           
            <td><?php echo $row->SubProduct; ?></td>           
            <td><?php echo $row->Qty; ?></td>           
            <td><?php echo $row->Payable; ?></td>   
           
        
        </tr>
    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>OrderDate</th>
            <th>ReceivingDate</th>
            <th>DocumentNo</th>
            <th>DeliveryManBuilty</th>
            <th>Party</th>
            <th>SubProduct</th>
            <th>Qty</th>
            <th>Payable</th>
        </tr>
    </tfoot>
</table>
