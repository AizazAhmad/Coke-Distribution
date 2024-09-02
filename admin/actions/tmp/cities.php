<?php 
require_once '../config/config.php';
$id = $_POST['id'];
$query = "SELECT * FROM cities WHERE state_id=$id;";
$result = $db->query($query);
while ($row = $result->fetch_object()) {
    echo "<option value='".$row->id."'>".$row->name." </option>";
}
    ?>



