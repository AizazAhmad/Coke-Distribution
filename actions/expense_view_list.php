<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>Date</th>
            <th>MainType</th>
            <th>SubType</th>
            <th>ChildType</th>
            <th>Amount</th>
            <th>Action</th>            
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT ex.Date,ex.Id,expchildtype.Name AS ChildType,ex.Amount,xm.Name AS MainType,xs.Name AS SubType FROM expense ex INNER JOIN expchildtype ON ex.CTypeId = expchildtype.Id INNER JOIN expmaintype xm ON ex.MTypeId = xm.Id INNER JOIN expsubtype xs ON ex.STypeId = xs.Id WHERE ex.UserId = {$_SESSION['user_id']} ;";
$result = $db->query($query);
while ($row = $result->fetch_object()) {
    
    $btn_edit = edit_button($row->Id); 
    ?>
        <tr>
            
            <td><?php echo $row->Date; ?></td>
            <td><?php echo $row->MainType; ?></td>
            <td><?php echo $row->SubType; ?></td>
            <td><?php echo $row->ChildType; ?></td>
            <td><?php echo $row->Amount; ?></td>        
            <td><?php echo $btn_edit; ?></td>
            
        </tr>
    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>Date</th>
            <th>MainType</th>
            <th>SubType</th>
            <th>ChildType</th>
            <th>Amount</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>
