<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>Main</th>
            <th>Sub</th>
            <th>Name</th>
            <th>Action</th>            
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT expchildtype.Id,expchildtype.Name,expmaintype.Name AS Main,expsubtype.Name AS Sub FROM expchildtype INNER JOIN expmaintype ON expchildtype.ExpMainTyepId = expmaintype.Id INNER JOIN expsubtype ON expchildtype.ExpSubTyepId = expsubtype.Id WHERE expchildtype.UserId = {$_SESSION['user_id']} AND expchildtype.Status = 0;";
$result = $db->query($query);
while ($row = $result->fetch_object()) {
    
    $btn_activate = activate_button($row->Id);
    ?>
        <tr>            
            <td><?php echo $row->Main; ?></td>
            <td><?php echo $row->Sub; ?></td>
            <td><?php echo $row->Name; ?></td>
            <td><?php echo $btn_activate; ?></td>     
        </tr>
    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>Main</th>
            <th>Sub</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>
