<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>Code</th>
            <th>ProName</th>
            <th>PartyName</th>
            <th>Unit</th>
            <th>Cost</th>
            <th>Sale</th>
            <th>Scheme</th>
            <th>LiftRate</th>
            <th>DC</th>
            <th>ComTax</th>
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
  sub_product.Unit,
  sub_product.Cost,
  sub_product.Sale,
  sub_product.Scheme,
  sub_product.SelfLiftingRate,
  sub_product.DistributorCommission,
  sub_product.CompanyTax,
  party.Name as PartyName
FROM sub_product
  INNER JOIN product
    ON sub_product.ProductId = product.Id
  INNER JOIN party
    ON sub_product.PartyId = party.Id WHERE sub_product.UserId = {$_SESSION['user_id']} AND sub_product.Status = 0";
$result = $db->query($query);

while ($row = $result->fetch_object()) {
    
    $btn_activate = activate_button($row->Id);

    ?>

        <tr>
            <td><?php echo $row->Code; ?></td>
            <td><?php echo $row->ProductName; ?></td>
            <td><?php echo $row->PartyName; ?></td>
            <td><?php echo $row->Unit; ?></td>            
            <td><?php echo $row->Cost; ?></td>
            <td><?php echo $row->Sale; ?></td>
            <td><?php echo $row->Scheme; ?></td>
            <td><?php echo $row->SelfLiftingRate; ?></td>
            <td><?php echo $row->DistributorCommission; ?></td>
            <td><?php echo $row->CompanyTax; ?></td>                       
            <td><?php echo $btn_activate; ?></td>
            
        </tr>

    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>Code</th>
            <th>ProName</th>
            <th>PartyName</th>
            <th>Unit</th>
            <th>Cost</th>
            <th>Sale</th>
            <th>Scheme</th>
            <th>LiftRate</th>
            <th>DC</th>
            <th>ComTax</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>