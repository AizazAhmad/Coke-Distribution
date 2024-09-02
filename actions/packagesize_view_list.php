<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>            
                      
            <th>Product Name</th>            
            <th>Number Of Units Per Pallet</th>            
            <th>Action</th>            
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT * FROM packagesize WHERE UserId = {$_SESSION['user_id']} AND Status = 1;";
$result = $db->query($query);
while ($row = $result->fetch_object()) {
    
    
    $btn_ban = ban_button($row->Id);    
    ?>
        <tr>
                      
            <td><?php echo $row->Name; ?></td>            
            <td><?php echo $row->PackingSize; ?></td>            
            <td><?php echo $btn_ban; ?></td>
            
        </tr>
    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
                        
            <th>Product Name</th>            
            <th>Number Of Units</th>            
            <th>Action</th> 
        </tr>
    </tfoot>
</table>
