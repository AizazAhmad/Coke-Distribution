<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>Name</th>
            <th>Action</th>            
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT * FROM emprole WHERE UserId = {$_SESSION['user_id']} AND Status = 0;";
$result = $db->query($query);
while ($row = $result->fetch_object()) {
    
    $btn_edit = activate_button($row->Id);
    
    ?>
        <tr> 
            <td><?php echo $row->Name; ?></td>           
            <td><?php echo $activate_button; ?></td>
            
        </tr>
    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Action</th> 
        </tr>
    </tfoot>
</table>
