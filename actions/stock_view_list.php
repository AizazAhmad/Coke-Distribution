<table id="datable_2" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>Name</th> 
            <th>Stock (PET)</th>
            <th>Action</th>
                     
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT
  sub_product.Name,
  sub_product.Code,
  stock.SubProductId as SId,
  stock.Stock,
  sub_product.Is_Empty
FROM stock
  INNER JOIN sub_product
    ON stock.SubProductId = sub_product.Id WHERE sub_product.UserId = {$_SESSION['user_id']}";
$result = $db->query($query);
while ($row = $result->fetch_object()) {
    
    
    $btn_waterloss = waterloss_button($row->SId);
    //$btn_sample = sample_button($row->SId);
    

    
    ?>
        <tr>
            <td><?php echo $row->Code." ".$row->Name; ?></td>            
                  
            <td><i class="display-6 text-dark"><?php echo $row->Stock; ?></i></td>           
            <td><?php echo $btn_waterloss; ?></td>
            
        </tr>
    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>Name</th>            
            <th>Stock (PET)</th>            
            <th>Action</th>
            
        </tr>
    </tfoot>
</table>
