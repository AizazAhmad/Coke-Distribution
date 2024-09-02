<?php
require_once '../config/config.php';
ini_set('auto_detect_line_endings', TRUE);
$fileName = $_FILES["file"]["tmp_name"];
if ($_FILES["file"]["size"] > 0) {
$file = fopen($fileName, "r");
$counter = 1;
$flag = true;
}
        // $column = fgetcsv($file, 10000, ',');
        // echo "<pre>";
        // print_r($column);
        // exit();
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {

            if($counter == 1)
    {
        $counter++;
        continue;
    }
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
 {$_SESSION['user_id']}
 ,'".$column[0]."'
 ,'".$column[1]."'
 ,'".$column[2]."'
 ,'".$column[3]."'
 ,'".$column[4]."'
 ,'".$column[5]."'
 ,'".$column[6]."'
 ,'".$column[7]."'
 ,'".$column[8]."'
 );";
// echo $Query;
// exit();
            $result = $db->query($Query);
            if (!$result) {
                echo "Error In Entry Title Named: ".$column[0]." ".$db->error;
                $flag = false;
                break;
                 
            }
            $last_id = $db->insert_id;
            // Saturday
            if (!$column[10] == "") {
                $row = fetchMultiAttr("Name","Saturday","RootId",$column[9],"subroot");
                $SubRouteId = $row->Id;
                $Query = "INSERT INTO customersubroot ( UserId,CustomerId,RootId,SubRootId ) VALUES ( {$_SESSION['user_id']},$last_id,{$column['9']},$SubRouteId );";
                $db->query($Query);
            }
            // Sunday
            if (!$column[11] == "") {
                $row = fetchMultiAttr("Name","Sunday","RootId",$column[9],"subroot");
                $SubRouteId = $row->Id;
                $Query = "INSERT INTO customersubroot ( UserId,CustomerId,RootId,SubRootId ) VALUES ( {$_SESSION['user_id']},$last_id,{$column['9']},$SubRouteId );";
                $db->query($Query);
            }
            // Monday
            if (!$column[12] == "") {
                $row = fetchMultiAttr("Name","Monday","RootId",$column[9],"subroot");
                $SubRouteId = $row->Id;
                $Query = "INSERT INTO customersubroot ( UserId,CustomerId,RootId,SubRootId ) VALUES ( {$_SESSION['user_id']},$last_id,{$column['9']},$SubRouteId );";
                $db->query($Query);
            }
            // Tuesday
            if (!$column[13] == "") {
                $row = fetchMultiAttr("Name","Tuesday","RootId",$column[9],"subroot");
                $SubRouteId = $row->Id;
                $Query = "INSERT INTO customersubroot ( UserId,CustomerId,RootId,SubRootId ) VALUES ( {$_SESSION['user_id']},$last_id,{$column['9']},$SubRouteId );";
                $db->query($Query);
            }
            // Wednesday
            if (!$column[14] == "") {
                $row = fetchMultiAttr("Name","Wednesday","RootId",$column[9],"subroot");
                $SubRouteId = $row->Id;
                $Query = "INSERT INTO customersubroot ( UserId,CustomerId,RootId,SubRootId ) VALUES ( {$_SESSION['user_id']},$last_id,{$column['9']},$SubRouteId );";
                $db->query($Query);
            }
            // Thursday
            if (!$column[15] == "") {
                $row = fetchMultiAttr("Name","Thursday","RootId",$column[9],"subroot");
                $SubRouteId = $row->Id;
                $Query = "INSERT INTO customersubroot ( UserId,CustomerId,RootId,SubRootId ) VALUES ( {$_SESSION['user_id']},$last_id,{$column['9']},$SubRouteId );";
                $db->query($Query);
            }
            // Friday
            if (!$column[16] == "") {
                $row = fetchMultiAttr("Name","Friday","RootId",$column[9],"subroot");
                $SubRouteId = $row->Id;
                $Query = "INSERT INTO customersubroot ( UserId,CustomerId,RootId,SubRootId ) VALUES ( {$_SESSION['user_id']},$last_id,{$column['9']},$SubRouteId );";
                $db->query($Query);
            }


            $counter++;

        }
    
   
        
        
if (!$flag) {
    echo "Error IN ".$counter;
   
}        
else{
    echo "Success";
}

        
    

?>