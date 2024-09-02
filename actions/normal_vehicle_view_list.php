<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>Number</th>
            <th>Type</th>
            <th>Value</th>           
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT * FROM vehicle WHERE UserId = {$_SESSION['user_id']} AND Status = 1;";
$result = $db->query($query);

while ($row = $result->fetch_object()) {
    
   
    ?>

        <tr>            
            <td><?php echo $row->Number; ?></td>
            <td><?php echo $row->Type; ?></td>
            <td><?php echo $row->Value; ?></td>             
        </tr>

    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>Number</th>
            <th>Type</th>
            <th>Value</th>
        </tr>
    </tfoot>
</table>