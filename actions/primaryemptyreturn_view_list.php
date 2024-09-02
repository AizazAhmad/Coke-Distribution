<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>Empty_R Date</th>
            <th>Primary_S Inv_No</th>
            <th>Empty_R Inv_No</th>
            <th>Pkg_Size</th>
            <th>Territory</th>
            <th>Transporter</th>
            <th>Vehicle</th>
            <th>DriverCNIC</th>
            <th>Empty</th>
            <th>Pallet</th>
                  
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT
  empty_invoice.Date,
  primarysalelog.DocumentNo,
  empty_invoice.InvNo,
  empty_invoice.Territory,
  empty_invoice.Transporter,
  empty_invoice.Vehicle,
  empty_invoice.DriverCNIC,
  empty_invoice.BottlesShell,
  empty_invoice.Pallet,
  packagesize.Name as PkgSize
FROM empty_invoice
  INNER JOIN primarysalelog
    ON empty_invoice.PrimarySaleId = primarysalelog.Id
  INNER JOIN sub_product
    ON primarysalelog.SubProductId = sub_product.Id
  INNER JOIN packagesize
    ON sub_product.PackageSizeId = packagesize.Id
WHERE empty_invoice.UserId = {$_SESSION['user_id']}";
$result = $db->query($query);
while ($row = $result->fetch_object()) {
    
    //$btn_edit = edit_button($row->Id);
        
    ?>
        <tr>
            
            <td><?php echo $row->Date; ?></td>
            <td><?php echo $row->DocumentNo; ?></td>
            <td><?php echo $row->InvNo; ?></td>
            <td><?php echo $row->PkgSize; ?></td>
            <td><?php echo $row->Territory; ?></td>           
            <td><?php echo $row->Transporter; ?></td>           
            <td><?php echo $row->Vehicle; ?></td>           
            <td><?php echo $row->DriverCNIC; ?></td>           
            <td><?php echo $row->BottlesShell; ?></td>           
            <td><?php echo $row->Pallet; ?></td>            
            
            
        </tr>
    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>Empty_R Date</th>
            <th>Primary_S Inv_No</th>
            <th>Empty_R Inv_No</th>
            <th>Pkg_Size</th>
            <th>Territory</th>
            <th>Transporter</th>
            <th>Vehicle</th>
            <th>DriverCNIC</th>
            <th>Empty</th>
            <th>Pallet</th>
            
        </tr>
    </tfoot>
</table>
