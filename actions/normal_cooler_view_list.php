<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>Cooler Type</th>
            <th>Code</th>           
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT *
FROM    cooler c
WHERE   NOT EXISTS
        (
        SELECT  null 
        FROM    coolerdistribution d
        WHERE   d.CoolerId = c.Id
        ) AND c.UserId = {$_SESSION['user_id']}";
$result = $db->query($query);
while ($row = $result->fetch_object()) {
    
      
    ?>
        <tr>
            <td><?php echo $row->CoolerType; ?></td>
            <td><?php echo $row->Code; ?></td>          
        </tr>
    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>Cooler Type</th>
            <th>Code</th>
        </tr>
    </tfoot>
</table>
