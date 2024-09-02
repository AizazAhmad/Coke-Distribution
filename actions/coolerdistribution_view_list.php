<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>Assiging Date</th>
            <th>Customer</th>
            <th>Cooler</th>
            <th>Action</th>            
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT
  coolerdistribution.Id,
  coolerdistribution.Date,
  coolerdistribution.UserId,
  customer.Id as CustomerId,
  customer.Code as CustomerCode,
  customer.Name,
  cooler.Id as CoolerId,
  cooler.CoolerType,
  cooler.Code as CoolerCode
FROM coolerdistribution
  INNER JOIN customer
    ON coolerdistribution.CustomerId = customer.Id
  INNER JOIN cooler
    ON coolerdistribution.CoolerId = cooler.Id WHERE coolerdistribution.UserId = {$_SESSION['user_id']}";
$result = $db->query($query);
while ($row = $result->fetch_object()) {
    
    $btn_delete = delete_button($row->Id);    
    ?>
        <tr>            
            <td><?php echo $row->Date; ?></td>
            <td><?php echo $row->CustomerCode." ".$row->Name; ?></td>
            <td><?php echo $row->CoolerType." ".$row->CoolerCode; ?></td>           
            <td><?php echo $btn_delete; ?></td>
            
        </tr>
    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>Assiging Date</th>
            <th>Customer</th>
            <th>Cooler</th>
            <th>Action</th> 
        </tr>
    </tfoot>
</table>
