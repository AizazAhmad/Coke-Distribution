<?php
require_once '../config/ConfigL.php';
$Username = mysqli_real_escape_string($db,$_POST['Username']);
$Password = mysqli_real_escape_string($db,$_POST['Password']);
$Password = sha1($Password);
$query = "SELECT * FROM users WHERE Username='$Username' AND Password='$Password'";

$result = $db->query($query);
    
    if ($result->num_rows != 1) {
    $_SESSION['notify'] = true;
    header('location: '.$base_url.'login.php');
} else if($result->num_rows == 1){
    $row = $result->fetch_object();
    $_SESSION['user_id'] = $row->Id; 
    if ($row->RoleId == 2) {
           $_SESSION['RoleTitle'] = "Admin"; 
       }else if ($row->RoleId == 3) {
           $_SESSION['RoleTitle'] = "Dvo"; 
       }       
    $_SESSION['role_id'] = $row->RoleId;        
    $_SESSION['username'] = $row->Username;
    $_SESSION['name'] = $row->Name;
    $_SESSION['is_login'] = true;
                    
    header('location: '.$base_url);
}  
?>