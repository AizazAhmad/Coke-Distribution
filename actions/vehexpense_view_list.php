<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>Date</th>
            <th>Vehicle</th>
            <th>Type</th>
            <th>Amount</th>
            <th>Action</th>            
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT v.Id,v.Date,v.Amount,vehicle.Number AS Vehicle, vehexpmaintype.Name AS Type FROM vehexpense v INNER JOIN vehicle ON v.vehicleId = vehicle.Id INNER JOIN vehexpmaintype ON v.VMTypeId = vehexpmaintype.Id WHERE v.UserId = {$_SESSION['user_id']};";
$result = $db->query($query);
while ($row = $result->fetch_object()) {
    
    $btn_edit = edit_button($row->Id);
   
    ?>
        <tr>            
            <td><?php echo $row->Date; ?></td>
            <td><?php echo $row->Vehicle; ?></td>
            <td><?php echo $row->Type; ?></td>
            <td><?php echo $row->Amount; ?></td>           
            <td><?php echo $btn_edit; ?></td>
            
        </tr>
    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>Date</th>
            <th>Vehicle</th>
            <th>Type</th>
            <th>Amount</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>
