
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
            <th>Action</th>            
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
    
    $btn_edit = edit_button($row->Id);
    $btn_ban = ban_button($row->Id);    
   $btn_profile = profile_button($row->Id);
   $Q = "SELECT subroot.Name FROM customersubroot INNER JOIN subroot ON customersubroot.SubRootId = subroot.Id WHERE customersubroot.CustomerId = {$row->Id} AND customersubroot.UserId = {$_SESSION['user_id']}";
    $Result = $db->query($Q);
    $q = "SELECT * FROM customersubroot Where CustomerId = {$row->Id}";
    $r = $db->query($q);
    $ow = $r->fetch_object();
    ?>

        <tr>
            
            <td><?php echo $row->Code; ?></td>
            <td><?php echo $row->VoyageCode; ?></td>
            <td><?php echo $row->Name; ?></td>
            <td><?php echo $row->Mobile; ?></td>
            <td><?php echo $row->Badge; ?></td>
            <td><?php echo $row->CreditLimit; ?></td>           
            <td><?php echo fetchRecord($ow->RootId,"root")->Name; ?></td>           
            <td><?php while ($Row = $Result->fetch_object()) {  ?>
            <span class="badge badge-warning"><?=$Row->Name?></span>
                <?php } ?>
            </td>           
            <td><?php echo $btn_ban." ".$btn_edit." ".$btn_profile; ?></td>
            
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
            <th>Action</th> 
        </tr>
    </tfoot>
</table>