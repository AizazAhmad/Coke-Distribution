<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>MainType</th>
            <th>Name</th>
            <th>Action</th>            
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT expsubtype.Id,expsubtype.Name,expmaintype.Name AS Main FROM expsubtype INNER JOIN expmaintype ON expsubtype.ExpMainTyepId = expmaintype.Id WHERE expsubtype.UserId = {$_SESSION['user_id']} AND expsubtype.Status = 0;";
$result = $db->query($query);
while ($row = $result->fetch_object()) {
    
    $btn_activate = activate_button($row->Id);
    ?>
        <tr>            
            <td><?php echo $row->Main; ?></td>
            <td><?php echo $row->Name; ?></td>
            <td><?php echo $btn_activate; ?></td>     
        </tr>
    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>MainType</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>
