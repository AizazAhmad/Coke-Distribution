<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>            
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT * FROM objectprice WHERE UserId = {$_SESSION['user_id']};";
$result = $db->query($query);
while ($row = $result->fetch_object()) {
    
    $btn_edit = edit_button($row->Id);
   
    ?>
        <tr>
            <td><?php echo $row->Name; ?></td>
            <td><?php echo $row->Price; ?></td>           
            <td><?php echo $btn_edit; ?></td>
            
        </tr>
    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>  
        </tr>
    </tfoot>
</table>
