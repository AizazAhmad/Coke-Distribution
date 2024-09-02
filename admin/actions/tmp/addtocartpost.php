<?php
require_once '../config/config.php';


$qty = $_POST['qty'];
$product_id = $_POST['product_id'];
$user_id = $_SESSION['user_id'];




if(!isset($_SESSION['is_login'])){
header('location: '.$base_url.'login.php');
exit();
}

$qry = "SELECT * FROM cart WHERE user_id='$user_id' and product_id='$product_id';";

$res = $db->query($qry);
$resu = $res->fetch_object();
if($res->num_rows == 1){

	// $_SESSION['user_notify'] = "<div class='alert alert-danger' role='alert'>Account Already Existed!</div>";

	$total = $resu->qty+$qty;
	$cid = $resu->id;
	$queryu = "UPDATE cart SET qty = '$total' WHERE id=$cid;";
	$db->query($queryu);
	$_SESSION['is_added'] = true;
	//$_SESSION['user_notify'] = "<div class='alert alert-success' role='alert'>Product Added to Cart!</div>";
	header('location: '.$base_url.'product.php?id='.$product_id);

}else{
	$query = "INSERT INTO cart
(
  id
 ,user_id
 ,product_id
 ,qty
)
VALUES
(
  0
 ,'$user_id'
 ,'$product_id'
 ,'$qty'
);";

$result = $db->query($query);
if ($result) {
	
	$_SESSION['is_added'] = true;
	header('location: '.$base_url.'product.php?id='.$product_id);

}else{
	
	$_SESSION['notify'] = "<div class='alert alert-danger' role='alert'>Some Thing Went Wrong!</div>";
	// header('location: '.$base_url.'cart.php');
	header('location: '.$base_url.'product.php?id='.$product_id);
}
}

?>