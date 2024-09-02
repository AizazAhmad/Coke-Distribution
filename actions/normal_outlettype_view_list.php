<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>Code</th>            
            <th>Name</th>           
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT * FROM outlettype WHERE UserId = {$_SESSION['user_id']} AND Status = 1;";
$result = $db->query($query);
while ($row = $result->fetch_object()) {
      
    ?>
        <tr>
            <td><?php echo $row->Id; ?></td>           
            <td><?php echo $row->Name; ?></td> 
        </tr>
    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>Code</th>            
            <th>Name</th>            
        </tr>
    </tfoot>
</table>
