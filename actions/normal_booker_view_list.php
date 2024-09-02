<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Address</th>          
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT * FROM booker WHERE UserId = {$_SESSION['user_id']} AND Status = 1;";
$result = $db->query($query);
while ($row = $result->fetch_object()) {
    
     
    ?>
        <tr>
            
            <td><?php echo $row->Code; ?></td>
            <td><?php echo $row->Name; ?></td>
            <td><?php echo $row->Mobile; ?></td>
            <td><?php echo $row->Address; ?></td>
            
        </tr>
    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Address</th>
        </tr>
    </tfoot>
</table>
