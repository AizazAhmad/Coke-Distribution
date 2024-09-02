
<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            
            <th>Product Code</th>
            <th>Product Name</th>
                        
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT * FROM product WHERE UserId = {$_SESSION['user_id']} AND Status = 1;";
$result = $db->query($query);

while ($row = $result->fetch_object()) {

    ?>

        <tr>
            
            <td><?php echo $row->Code; ?></td>
            <td><?php echo $row->Name; ?></td>                       
            
            
        </tr>

    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            
            <th>Product Code</th>
            <th>Product Name</th>
            
        </tr>
    </tfoot>
</table>