<?php
    require_once '../config/config.php';
    extract($_POST);
    $query = "UPDATE primarysalelog 
SET
  DocumentNo = '$DocumentNo' -- Code - VARCHAR(50)
 ,Description = '$Description' -- Name - VARCHAR(50)
 WHERE
  Id = $Id -- Id - INT(11) NOT NULL
";
if (is_dublicate('DocumentNo',$DocumentNo,'primarysalelog')) {
    echo "Existed";
    exit();
}
$result = $db->query($query);
if ($result) 
echo "Success";
else
echo "Invalid";
        
    
?>
