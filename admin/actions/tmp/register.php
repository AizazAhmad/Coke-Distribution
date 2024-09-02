<?php


require_once '../config/config.php';

extract($_POST);

if ($password != $cpassword) {
     $_SESSION['notify'] = "<div class='alert alert-danger' role='alert'>Password Didn't Match!</div>";
    header('location: '.$base_url.'register.php');
    exit();
}
$qry = "SELECT * FROM users WHERE email='$email';";
$res = $db->query($qry);

if($res->num_rows == 1){
	$_SESSION['notify'] = "<div class='alert alert-danger' role='alert'>Account Already Existed!</div>";
	header('location: '.$base_url.'register.php');

}else{
    $target_dir = "../admin/assets/Uploads/";
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo(basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION));
    $mypath = time() . rand(10,100) . '.' . $imageFileType;
    $target_file = $target_dir . $mypath;
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif") {
    $_SESSION['notify'] = "<div class='alert alert-danger' role='alert'>Please Upload JPG JPEG PNG Data Type!".$imageFileType."</div>";
    header('location: '.$base_url.'register.php');
        
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
    	
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $imagepath = $mypath;
        
			$query = "INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `gender`, `photo`) VALUES ('', '$fname', '$lname', '$email', '$password', '$gender', '$imagepath');";
				$result = $db->query($query);
            if ($result) {
                $_SESSION['user_id'] = $db->insert_id;
				$_SESSION['email'] = $email;
				$_SESSION['user_name'] = $fname." ".$lname;
				$_SESSION['is_login'] = true;
				 $_SESSION['is_submitted'] = true;
				header('location: '.$base_url);
            } else {
                $_SESSION['notify'] = "<div class='alert alert-danger' role='alert'>Some Thing Went Wrong!</div>";
				header('location: '.$base_url.'register.php');
            }
        } else {
			$_SESSION['notify'] = "<div class='alert alert-danger' role='alert'>Sorry, there was an error uploading your file!</div>";
            header('location: '.$base_url.'register.php');
        }
    }
}
?>