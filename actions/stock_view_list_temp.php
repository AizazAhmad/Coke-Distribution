<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            
            <th>Party</th>
            <th>SubProduct</th>
            <th>Stock</th>
                    
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT
  primarysale.Stock,
  CONCAT(sub_product.Code,' ',sub_product.Name) as SubProduct,
  CONCAT(party.Code,' ',party.Name) as Party
FROM primarysale
  INNER JOIN party
    ON primarysale.PartyId = party.Id
  INNER JOIN sub_product
    ON primarysale.SubProductId = sub_product.Id WHERE primarysale.UserId = {$_SESSION['user_id']};";
$result = $db->query($query);
while ($row = $result->fetch_object()) {
    
        
    ?>
        <tr>                      
            <td><?php echo $row->Party; ?></td>           
            <td><?php echo $row->SubProduct; ?></td>           
            <td><span class="badge badge-info"> <div style="font-size: 18px;" class="font-weight-bold"><?php echo $row->Stock; ?></div> </span></td>           
                        
        </tr>
    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>Party</th>
            <th>SubProduct</th>
            <th>Stock</th>
        </tr>
    </tfoot>
</table>
