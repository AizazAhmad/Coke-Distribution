<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>Booker</th>
            <th>Route</th>
            <th>Action</th>            
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT rootassign.Id,
  booker.Name AS Booker,
  root.Name AS Root
FROM rootassign
  INNER JOIN booker
    ON rootassign.BookerId = booker.Id
  INNER JOIN root
    ON rootassign.RootId = root.Id WHERE rootassign.UserId = {$_SESSION['user_id']};";
$result = $db->query($query);
while ($row = $result->fetch_object()) {
    
      $btn_delete = unassign_button($row->Id);    
    ?>
        <tr>
            
            <td><?php echo $row->Booker; ?></td>
            <td><?php echo $row->Root; ?></td>          
            <td><?php echo $btn_delete; ?></td>
            
        </tr>
    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>Booker</th>
            <th>Route</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>
