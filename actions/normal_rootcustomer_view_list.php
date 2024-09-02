<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>Root</th>
            <th>Customer</th>         
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT
  rootcustomer.Id,
  rootcustomer.UserId,
  customer.Code as CustomerCode,
  customer.Name as CustomerName, 
  root.Name as RootName
FROM rootcustomer
  INNER JOIN root
    ON rootcustomer.RootId = root.Id
  INNER JOIN customer
    ON rootcustomer.CustomerId = customer.Id WHERE rootcustomer.UserId = {$_SESSION['user_id']}";
$result = $db->query($query);
while ($row = $result->fetch_object()) {
    
    
    ?>
        <tr> 
            <td><?php echo $row->RootName; ?></td>
            <td><?php echo $row->CustomerCode." ".$row->CustomerName; ?></td>
            
        </tr>
    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>Root</th>
            <th>Customer</th>
        </tr>
    </tfoot>
</table>
