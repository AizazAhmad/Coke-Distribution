<?php

function redirect($url) {
    echo "<script> location.href='".$url."' </script>";
} 

function fetchRecord($id,$table)
{   
    global $db;
    $query = "SELECT * FROM $table Where Id = $id";
    $result = $db->query($query);
    $row = $result->fetch_object();
    return $row;
}

function code($id,$table)
{   
    global $db;
    $query = "SELECT Code FROM $table WHERE UserId = $id ORDER BY Id DESC LIMIT 1";
    $result = $db->query($query);
    $row = $result->fetch_object();
    if ($row == null) {
        return $code = 1000;
    }
    $code = $row->Code + 1;
    return $code;
}

function nagitive_check($value){
if (isset($value)){
    if (substr(strval($value), 0, 1) == "-"){
    return true;
} else {
    return false;
}
    }
}

function fetchBySess($userid,$table)
{   
    global $db;
    $list = array();
    $query = "SELECT * FROM $table WHERE UserId = $userid AND Status = 1";
    $result = $db->query($query);    
    while ($row = $result->fetch_object()) {
        array_push($list, $row);
    }
    return $list;
}

function populateWithCode($table)
{   
    global $db;    
    $query = "SELECT Id,Code,Name FROM $table WHERE UserId = {$_SESSION['user_id']} AND Status = 1";
    $result = $db->query($query);    
    while ($row = $result->fetch_object()) {
        echo "<option value='".$row->Id."'>".$row->Code." ".$row->Name."</option>";
    }
      
}

function populate($table)
{   
    global $db;    
    $query = "SELECT Id,Name FROM $table WHERE UserId = {$_SESSION['user_id']} AND Status = 1";
    $result = $db->query($query);    
    while ($row = $result->fetch_object()) {
        echo "<option value='".$row->Id."'>".$row->Code." ".$row->Name."</option>";
    }
      
}


function fetchBySessAttr($column,$value,$table)
{
    global $db;
    $list = array();
    $query = "SELECT * FROM $table Where $column ='$value' AND UserId = {$_SESSION['user_id']}";
    $result = $db->query($query);    
    while ($row = $result->fetch_object()) {
        array_push($list, $row);
    }
    return $list;    
}

function short($value)
{
        if (strlen($value) > 20) // if you want...
    {
        $maxLength = 18;
        $value = substr($value, 0, $maxLength);
        return $value." ...";
    }
    return $value;
}

function is_dublicate($column,$value,$table)
{
    global $db;
    $query = "SELECT * FROM $table Where $column ='$value' AND UserId = {$_SESSION['user_id']}";
    $result = $db->query($query);
    if($result->num_rows == 1){
        return true;
    }
    return false;
}

function is_multidublicate($column,$value,$column2,$value2,$table)
{
    global $db;
    $query = "SELECT * FROM $table Where $column ='$value' AND $column2 = '$value2'";
    $result = $db->query($query);    
    if($result->num_rows == 1){
        return true;
    }
    return false;
}

function is_multidublicateSess($column,$value,$column2,$value2,$table)
{
    global $db;
    $query = "SELECT * FROM $table Where $column ='$value' AND $column2 = '$value2'";
    $result = $db->query($query);    
    if($result->num_rows == 1){
        return true;
    }
    return false;
}

function error_alert($msg, $is_animate = true) {
    $animate = " animate7 bounceIn";
    if ($is_animate == false) {
        $animate = "";
    }
    echo "<div class='alert alert-danger alert-dismissible fade show{$animate}'>{$msg}<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button></div>";
}

function success_alert($msg, $is_animate = true) {
    $animate = " animate7 bounceIn";
    if ($is_animate == false) {
        $animate = "";
    }
    echo "<div class='alert alert-success alert-dismissible fade show{$animate}'>{$msg}<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button></div>";
}

function edit_button($id) {
    return "<button id='{$id}' name='{$id}' onclick='edit(this.id,this)' class='btn btn-gradient-info'>Edit</button>";
}

function waterloss_button($id) {
    return "<button id='{$id}' name='{$id}' onclick='waterloss(this.id,this)' class='btn btn-gradient-secondary'>WaterLoss</button>";
}

function emptyloss_button($id) {
    return "<button id='{$id}' name='{$id}' onclick='emptyloss(this.id,this)' class='btn btn-gradient-secondary'>EmptyLoss</button>";
}

function sample_button($id) {
    return "<button id='{$id}' name='{$id}' onclick='sample(this.id,this)' class='btn btn-gradient-success'>Sample</button>";
}

function activate_button($id) {
    return "<button id='{$id}' name='{$id}' onclick='activate(this.id,this)' class='btn btn-gradient-success'>Activate</button>";
}

function profile_button($id) {
    return "<button id='{$id}' name='{$id}' onclick='profile(this.id,this)'  class='btn btn-gradient-success'>Profile</button>";
}



function test($row)
{
    echo "<pre>";
    print_r($row);
    exit();
}
function ban_button($id) {
    return "<button id='{$id}' name='{$id}' onclick='bann(this.id,this)' class='btn btn-gradient-warning'>Ban</button>";
}

function delete_button($id) {
    return "<button id='{$id}' name='{$id}' onclick='del(this.id,this)' class='btn btn-gradient-danger'>Delete</button>";
}

function reverse_button($id) {
    return "<button id='{$id}' name='{$id}' onclick='reverse(this.id,this)' class='btn btn-gradient-default'>Reverse</button>";
}

function random_string($length = 6) {
    $str = "";
    $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
    $max = count($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, $max);
        $str .= $characters[$rand];
    }
    return $str;
}

function email_send($email, $name, $message, $title) {
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'asadshibli072@gmail.com';                 // SMTP username
        $mail->Password = 'Asad54321';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('asadshibli072@gmail.com', 'KMS');
        $mail->addAddress($email, $name);     // Add a recipient

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $title;
        $mail->Body    = $message;
        $mail->AltBody = $message;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}