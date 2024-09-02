<?php
$query = "SELECT * FROM states WHERE country_id=166;";
$result = $db->query($query);
while ($state = $result->fetch_object()) {
    ?>

<option value="<?php echo $state->id ?>" <?php
if ($state->id == $state_id) {
        echo "Selected";
    } ?>> <?php echo $state->name ?> </option>
<?php
} ?>