<?php
require_once '../config/config.php';
$fileName = $_FILES["file"]["tmp_name"];
if ($_FILES["file"]["size"] > 0) {
$file = fopen($fileName, "r");
$counter = 1;
$flag = true;
}
if ($_POST['Table'] == "Customer") {

    
    
        
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            $Query = "INSERT INTO customer
(
  UserId
 ,VoyageCode
 ,OutletTypeId
 ,Code
 ,Name
 ,PersonName
 ,VpoId
 ,Mobile
 ,Address
 ,CreditLimit
 )
VALUES
(
  {$_SESSION['user_id']} -- UserId - INT(11)
 ,'".$column[0]."' -- VoyageCode - VARCHAR(50)
 ,'".$column[1]."' -- OutletTypeId - INT(11)
 ,'".$column[2]."' -- Code - VARCHAR(50)
 ,'".$column[3]."' -- Name - VARCHAR(50)
 ,'".$column[4]."' -- PersonName - VARCHAR(50)
 ,'".$column[5]."' -- VpoId - INT(11)
 ,'".$column[6]."' -- Mobile - VARCHAR(50)
 ,'".$column[7]."' -- Address - VARCHAR(255)
 ,'".$column[8]."' -- CreditLimit - DECIMAL(19, 2)
 );";
            
            $result = $db->query($Query);
            if (!$result) {
                echo "Error In Entry Title Named: ".$column[0]."<br> Please remove Commas or symbolic patterns!<br>".$db->error;
                $flag = false;
                break;
                 
            }
            $counter++;

        }
    

}
if ($_POST['Table'] == "Cooler") {
    while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
    $Query = "INSERT INTO cooler
(
  UserId
 ,CoolerType
 ,Code
 )
VALUES
(
  {$_SESSION['user_id']} -- UserId - INT(11)
 ,'".$column[0]."' -- CoolerType - VARCHAR(20)
 ,'".$column[1]."' -- Code - VARCHAR(50)
 );";
 $result = $db->query($Query);
            if (!$result) {
                echo "Error In Entry Title Named: ".$column[0]."<br> Please remove Commas or symbolic patterns!<br>".$db->error;
                $flag = false;
                break;
                 
            }
            $counter++;

        }
}
if ($_POST['Table'] == "DeliveryMan") {
    while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
    $Query = "INSERT INTO deliveryman
(
  UserId
 ,Code
 ,Name
 ,Mobile
 )
VALUES
(
  ,{$_SESSION['user_id']} -- UserId - INT(11)
 ,'".$column[0]."' -- Code - VARCHAR(50)
 ,'".$column[1]."' -- Name - VARCHAR(50)
 ,'".$column[2]."' -- Mobile - VARCHAR(255)
 );";
 $result = $db->query($Query);
            if (!$result) {
                echo "Error In Entry Title Named: ".$column[0]."<br> Please remove Commas or symbolic patterns!<br>".$db->error;
                $flag = false;
                break;
                 
            }
            $counter++;

        }
}


    
        
        
if (!$flag) {
    echo "Error IN ".$counter;
   
}        
else{
    echo "Success";
}

        
    

?>