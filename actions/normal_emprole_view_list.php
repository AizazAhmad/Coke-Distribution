<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>Name</th>          
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT * FROM emprole WHERE UserId = {$_SESSION['user_id']} AND Status = 1;";
$result = $db->query($query);
while ($row = $result->fetch_object()) {
    
    ?>
        <tr> 
            <td><?php echo $row->Name; ?></td>             
        </tr>
    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>Name</th>
        </tr>
    </tfoot>
</table>
