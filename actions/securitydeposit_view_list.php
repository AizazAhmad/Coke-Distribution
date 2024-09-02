<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>Date</th>
            <th>Credit</th>
            <th>Debit</th>
            <th>Action</th>            
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT
  securitydeposit.Date,
  securitydeposit.Id,
  securitydeposit.Credit,
  securitydeposit.Debit
FROM securitydeposit
 WHERE securitydeposit.UserId = {$_SESSION['user_id']} GROUP BY securitydeposit.Id";

$result = $db->query($query);
while ($row = $result->fetch_object()) {
    
    $btn_edit = edit_button($row->Id);   
    ?>
        <tr>
            
            <td><?php echo $row->Date; ?></td>
            <td><?php echo $row->Credit; ?></td>
            <td><?php echo $row->Debit; ?></td>          
            <td><?php 
            if ($row->Credit != 0.00)
            echo $btn_edit; 

            ?></td>
            
        </tr>
    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>Date</th>
            <th>Credit</th>
            <th>Debit</th>
            <th>Action</th>   
        </tr>
    </tfoot>
</table>
