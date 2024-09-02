<?php


function getById($id,$table)
{   
    global $db;
    $query = "SELECT * FROM $table Where Id=$id";
    $result = $db->query($query);
    $row = $result->fetch_object();
    return $row;
}

function is_dublicate($column,$value,$table)
{
    global $db;
    $query = "SELECT * FROM $table Where $column ='$value'";
    $result = $db->query($query);
    if($result->num_rows == 1){
        return true;
    }
    return false;
}

function redirect($url) {
    echo "<script> location.href='".$url."' </script>";
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

function activate_button($id, $url) {
    return "<a href='{$url}?id={$id}' class='btn btn-success'><i class='fa fa-check'></i></a>";
}

function ban_button($id, $url) {
    return "<a href='{$url}?id={$id}' class='btn btn-danger'><i class='fa fa-minus'></i></a>";
}

function edit_button($id, $url) {
    return "<a href='{$url}?id={$id}' class='btn btn-info'><i class='fa fa-pen'></i></a>";
}

function delete_button($id, $url) {
    return "<a href='{$url}?id={$id}' class='btn btn-danger'><i class='fa fa-trash'></i></a>";
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
        // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'snaseer9522@gmail.com';                 // SMTP username
        $mail->Password = 'Naseer344';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('multanfabrics7@gmail.com', 'ONLINE CSD CANTEEN');
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


