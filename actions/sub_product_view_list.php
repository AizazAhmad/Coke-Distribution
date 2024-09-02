<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>Code</th>
            <th>Product</th>
            <th>Sub</th>
            <th>Pkg</th>
            <th>Cost</th>
            <th>Sale</th>
            <th>LiftRate</th>
            <th>DC</th>
            <th>GST</th>
            <th>ATR</th>
            
            <th>Action</th>            
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT
  sub_product.Id,
  sub_product.ProductId,
  sub_product.PartyId,
  sub_product.Code,
  sub_product.Name as ProductName,
  packagesize.Name as PackageSize,
  sub_product.Cost,
  sub_product.Sale,
  sub_product.SelfLiftingRate,
  sub_product.DistributorCommission,
  sub_product.CompanyTax,
  sub_product.AdvanceTaxRate,
  sub_product.AdvanceTaxAmount,
  party.Name as PartyName,
  product.Name as ProName
FROM sub_product
  INNER JOIN product
    ON sub_product.ProductId = product.Id
  INNER JOIN packagesize
    ON sub_product.PackageSizeId = packagesize.Id
  INNER JOIN party
    ON sub_product.PartyId = party.Id WHERE sub_product.UserId = {$_SESSION['user_id']} AND sub_product.Status = 1";
$result = $db->query($query);

while ($row = $result->fetch_object()) {
    
    $btn_edit = edit_button($row->Id);
    $btn_ban = ban_button($row->Id);    

    ?>

        <tr>
            <td><?php echo $row->Code; ?></td>
            <td><?php echo $row->ProName; ?></td>
            <td><?php echo $row->ProductName; ?></td>
            <td><?php echo $row->PackageSize; ?></td>            
            <td><?php echo $row->Cost; ?></td>
            <td><?php echo $row->Sale; ?></td>
            <td><?php echo $row->SelfLiftingRate; ?></td>
            <td><?php echo $row->DistributorCommission; ?></td>
            <td><?php echo $row->CompanyTax; ?></td>                       
            <td><?php echo $row->AdvanceTaxRate; ?>%</td>                       
                                  
            <td><?php echo $btn_ban." ".$btn_edit; ?></td>
            
        </tr>

    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>Code</th>
            <th>Product</th>
            <th>Sub</th>
            <th>Pkg</th>
            <th>Cost</th>
            <th>Sale</th>
            <th>LiftRate</th>
            <th>DC</th>
            <th>GST</th>
            <th>ATR</th>
            
            <th>Action</th>
        </tr>
    </tfoot>
</table>