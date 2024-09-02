<table id="datable_1" class="table table-hover w-100 display pb-30">
    <thead>
        <tr>
            <th>Placed On</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Total</th>            
            <th>Status</th>

        </tr>
    </thead>
    <tbody>
        <?php
//uncomplted...............................
$id = $_SESSION['user_id'];
$query = "SELECT
orders.Id,
orders.Date,
orders.Qty,
orders.Price,
orders.Total,
orders.Status,
items.Main_Photo as photo,
items.Title
FROM orders
INNER JOIN items
  ON orders.Item_Id = items.Id
WHERE orders.User_Id = '$id';";
$result = $db->query($query);

while ($row = $result->fetch_object()) {
    // $btn_edit = edit_button($row->Id, $base_url.'edit-user.php');
    // $btn_delete = delete_button($row->Id, $action_url.'delete_user.php');
    // $btn_ban = ban_button($row->Id, $action_url.'ban_user.php');
    //$trow = "<tr><td>{$row->name}</td><td>{$row->type}</td><td>{$row->email}</td><td>{$row->gender}</td><td>{$row->join_date}</td><td>{$row->photo}</td><td>{$btn_edit} {$btn_delete}</td></tr>"; ?>

        <tr>
            <td><?php echo $row->Date; ?></td>
            <td><img class="circle" src="<?php echo $photo_url.$row->photo; ?>" height="40" width="35" alt="photo">
            </td>
            <td><?php echo $row->Title; ?></td>
            <td><span class="peity-line" data-width="90"
                    data-peity="{ &quot;fill&quot;: [&quot;rgba(102,64,178,.05)&quot;], &quot;stroke&quot;:[&quot;#6640b2&quot;]}"
                    data-height="40"><?php echo $row->Qty; ?></span> </td>
            <td><?php echo $row->Price; ?></td>
            <td><?php echo $row->Total; ?></td>            
            <td><img class="circle" src="<?php
            if ($row->Status == 'Pending') {
                echo 'admin/dist/img/orderwait.png';
            } else {
                echo 'admin/dist/img/dispach.png';
            } ?>" alt="icon"> </td>

            

        </tr>


        <?php
} ?>
    </tbody>
    <tfoot>
        <tr>

            <th>Placed On</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Total</th>
            <th>Status</th>

        </tr>
    </tfoot>
</table>