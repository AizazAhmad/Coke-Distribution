
<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>Code</th>
            <th>Voyage</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>VPO</th>
            <th>Limit</th>
            <th>Route</th>
            <th>Days</th>
                      
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT
  customer.*,
  vpo.Name as Badge
FROM customer
  INNER JOIN vpo
    ON customer.VpoId = vpo.Id
 WHERE customer.UserId = {$_SESSION['user_id']} AND customer.Status = 1;";
$result = $db->query($query);

while ($row = $result->fetch_object()) {
    $Q = "SELECT subroot.Name FROM customersubroot INNER JOIN subroot ON customersubroot.SubRootId = subroot.Id WHERE customersubroot.CustomerId = {$row->Id} AND customersubroot.UserId = {$_SESSION['user_id']}";
    $Result = $db->query($Q);    
    
   
    ?>

        <tr>
            
            <td><?php echo $row->Code; ?></td>
            <td><?php echo $row->VoyageCode; ?></td>
            <td><?php echo $row->Name; ?></td>
            <td><?php echo $row->Mobile; ?></td>
            <td><?php echo $row->Badge; ?></td>
            <td><?php echo $row->CreditLimit; ?></td>
            <td><?php echo fetchRecord($row->Id,"Root")->Name; ?></td>           
            <td><?php while ($Row = $Result->fetch_object()) {  ?>
            <span class="badge badge-info"><?=$Row->Name?></span>
                <?php } ?>
            </td>           
           
        </tr>

    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>Code</th>
            <th>Voyage</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>VPO</th>
            <th>Limit</th>
            <th>Route</th>
            <th>Days</th>            
        </tr>
    </tfoot>
</table>