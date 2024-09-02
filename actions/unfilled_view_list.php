<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>            
            <th>UFShell</th>
            <th>UFBottle</th>
            <th>UFPallet</th>
            <th>Action</th>            
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT * FROM filled WHERE UserId = {$_SESSION['user_id']}";
$result = $db->query($query);
while ($row = $result->fetch_object()) {
    
    $btn_edit = edit_button($row->Id);
    $btn_ban = ban_button($row->Id);    
    ?>
        <tr>
            <td><?php echo $row->UFShell; ?></td>
            <td><?php echo $row->UFBottle; ?></td>
            <td><?php echo $row->UFPallet; ?></td>           
            <td><?php echo $btn_edit; ?></td>
            
        </tr>
    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>UFShell</th>
            <th>UFBottle</th>
            <th>UFPallet</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>
