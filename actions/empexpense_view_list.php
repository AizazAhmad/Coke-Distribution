<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>Date</th>
            <th>Name</th>
            <th>Type</th>
            <th>Amount</th>
            <th>Action</th>            
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT empexpense.Id,empexpense.Date,empexpense.Amount,empexpmaintype.Name as TName,deliveryman.Name FROM empexpense INNER JOIN empexpmaintype ON empexpmaintype.Id = empexpense.EMTypeId
INNER JOIN deliveryman ON empexpense.EmpId = deliveryman.Id WHERE empexpense.UserId = {$_SESSION['user_id']} ;";
$result = $db->query($query);
while ($row = $result->fetch_object()) {
    
    $btn_edit = edit_button($row->Id);
    ?>
        <tr>
            
            <td><?php echo $row->Date; ?></td>
            <td><?php echo $row->Name; ?></td>
            <td><?php echo $row->TName; ?></td>
            <td><?php echo $row->Amount; ?></td>        
            <td><?php echo $btn_edit; ?></td>
            
        </tr>
    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>Date</th>
            <th>Name</th>
            <th>Type</th>
            <th>Amount</th>
            <th>Action</th> 
        </tr>
    </tfoot>
</table>
