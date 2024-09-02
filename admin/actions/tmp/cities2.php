<?php
$query = "SELECT * FROM cities WHERE state_id=$state_id;";
$result = $db->query($query);
while ($city = $result->fetch_object()) {
    ?>

<option value="<?php echo $city->id ?>" <?php
if ($city->id == $city_id) {
        echo "Selected";
    } ?>> <?php echo $city->name ?> </option>
<?php
} ?>