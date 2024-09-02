<?php 
$query = "SELECT * FROM states WHERE country_id=166;";
$result = $db->query($query);
while ($row = $result->fetch_object()) {
    ?>

<option value="<?php echo $row->id ?>"> <?php echo $row->name ?> </option>
<?php
} ?>