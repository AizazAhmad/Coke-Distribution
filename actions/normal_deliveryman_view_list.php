<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>            
            <th>Code</th>
            <th>Joining</th>
            <th>Name</th>
            <th>Mobile</th>            
            <th>Role</th>            
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT dm.Code,dm.Date,dm.Name,dm.Mobile,er.Name AS Role FROM deliveryman dm INNER JOIN emprole er ON dm.RoleId = er.Id WHERE dm.UserId = {$_SESSION['user_id']} AND dm.Status = 1;";
$result = $db->query($query);

while ($row = $result->fetch_object()) {
  
    ?>

        <tr>
            
            <td><?php echo $row->Code; ?></td>
            <td><?php echo $row->Date; ?></td>
            <td><?php echo $row->Name; ?></td>            
            <td><?php echo $row->Mobile; ?></td>            
            <td><?php echo $row->Role; ?></td>            
        </tr>

    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>Code</th>
            <th>Joining</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Role</th> 
        </tr>
    </tfoot>
</table>