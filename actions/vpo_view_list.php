<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Action</th>            
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT * FROM vpo WHERE UserId = {$_SESSION['user_id']} AND Status = 1;";
$result = $db->query($query);
while ($row = $result->fetch_object()) {
    
    $btn_edit = edit_button($row->Id);
    $btn_ban = ban_button($row->Id);    
    ?>
        <tr>
            <td><?php echo $row->Id; ?></td>
            <td><?php echo $row->Name; ?></td>
            <td><?php echo $btn_ban." ".$btn_edit; ?></td>
            
        </tr>
    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>
