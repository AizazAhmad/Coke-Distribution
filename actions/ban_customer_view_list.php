<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Address</th>
            <th>Limit</th>
            <th>Action</th>          
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT * FROM customer WHERE UserId = {$_SESSION['user_id']} AND Status = 0;";
$result = $db->query($query);

while ($row = $result->fetch_object()) {
    
    $btn_activate = activate_button($row->Id);

    ?>
        <tr>            
            <td><?php echo $row->Code; ?></td>
            <td><?php echo $row->Name; ?></td>
            <td><?php echo $row->Mobile; ?></td>
            <td><?php echo $row->Address; ?></td>
            <td><?php echo $row->CreditLimit; ?></td>           
            <td><?php echo $btn_activate; ?></td>     
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
            <th>Limit</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>