<?php
require_once '../config/ConfigL.php';

$Username = mysqli_real_escape_string($db,$_POST['Username']);
$Password = mysqli_real_escape_string($db,$_POST['Password']);

$query = "SELECT * FROM booker WHERE Username='$Username' AND Password='$Password'";

$result = $db->query($query);
    
    if ($result->num_rows != 1) {
    echo "Invalid";
} else if($result->num_rows == 1){
    $row = $result->fetch_object();
    $_SESSION['user_id'] = $row->UserId; 
    $_SESSION['booker_id'] = $row->Id;           
    $_SESSION['root_id'] = $row->RootId;           
        
    $_SESSION['name'] = $row->Name;
    $_SESSION['RoleTitle'] = "Booker";
    $_SESSION['is_booker_login'] = true;
                    
    echo "Success";
}  
?>