<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>OrderDate</th>
            <th>ReceivingDate</th>
            <th>DocumentNo</th>
            <th>DeliveryMan/Builty</th>
            <th>Party</th>
            <th>SubProduct</th>
            <th>Qty</th>
                  
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT
  primarysalelog.*, 
  CONCAT (sub_product.Code, sub_product.Name) as SubProduct,
  p.Name AS Party
FROM primarysalelog
  INNER JOIN sub_product
    ON primarysalelog.SubProductId = sub_product.Id
  INNER JOIN party p ON primarysalelog.PartyId = p.Id WHERE primarysalelog.UserId = {$_SESSION['user_id']} AND primarysalelog.Status = 0";
$result = $db->query($query);
while ($row = $result->fetch_object()) {
    
    //$btn_edit = edit_button($row->Id);
        
    ?>
        <tr>
            
            <td><?php echo $row->OrderDate; ?></td>
            <td><?php echo $row->ReceivingDate; ?></td>
            <td><?php echo $row->DocumentNo; ?></td>
            <td><?php echo $row->DeliveryManBuilty; ?></td>
            <td><?php echo $row->Party; ?></td>
            <td><?php echo $row->SubProduct; ?></td>           
            <td><?php echo $row->Qty; ?></td>          
            
            
        </tr>
    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
           <th>OrderDate</th>
            <th>ReceivingDate</th>
            <th>DocumentNo</th>
            <th>DeliveryMan/Builty</th>
            <th>Party</th>
            <th>SubProduct</th>
            <th>Qty</th>
            
        </tr>
    </tfoot>
</table>
