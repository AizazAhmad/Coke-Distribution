<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>Date</th>
            <th>Description</th>
            <th>Credit</th>
            <th>Debit</th>          
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT * FROM cash WHERE cash.UserId = {$_SESSION['user_id']} GROUP BY cash.Id DESC";
$result = $db->query($query);
while ($row = $result->fetch_object()) {
    
     
    ?>
        <tr>
            
            <td><?php echo $row->Date; ?></td>
            <td><?php echo $row->Description; ?></td>
            <td><?php echo $row->Credit; ?></td>
            <td><?php echo $row->Debit; ?></td>           
           
            
        </tr>
    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>Date</th>
            <th>Description</th>
            <th>Credit</th>
            <th>Debit</th>
        </tr>
    </tfoot>
</table>
