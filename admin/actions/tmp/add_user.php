<?php
require_once '../config/config.php';
extract($_POST);

$query = "INSERT INTO `users`(`FirstName`,`LastName`,`Email`,`Password`,`Gender`) VALUES('$FirstName','$LastName','$Email','$Password','$Gender');";

$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";

// header('location: '.$base_url.'cart.php');
// $_SESSION['notify'] = "<div class='alert alert-danger' role='alert'>Some Thing Went Wrong!</div>";


?>