<?php


require_once '../config/config.php';

$User_Id = $_SESSION['user_id'];
$query2 = "SELECT * FROM users WHERE id='$User_Id';";
    $result2 = $db->query($query2);
    $rows = $result2->fetch_object();

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$zip = $_POST['zip'];
$city = $_POST['city'];

$product_id = $_POST['product_id'];
$price = $_POST['price'];
$producttotal = $_POST['producttotal'];
$qty = $_POST['qty'];
$grand_total = $_POST['grand_total'];

$Date = date('d/m/y/h:m:s');
$length = 11;
$Tracking =  substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

$flag = 0;
for ($key = 0; $key < count((array)$product_id); $key++) {
    
            $query = "INSERT INTO orders
(
  id
 ,user_id
 ,date
 ,fname
 ,lname
 ,city
 ,zip
 ,email
 ,address
 ,phone
 ,product_id
 ,product_price
 ,product_qty
 ,product_total
 ,tracking
)
VALUES
(
0
,'$User_Id'
,NOW()
,'$fname'
,'$lname'
,'$city'
,'$zip'
,'$email'
,'$address'
,'$phone'
,'{$product_id[$key]}'
,'{$price[$key]}'
,'{$qty[$key]}'
,'{$producttotal[$key]}'
,'$Tracking'
);";
           
          
    $result = $db->query($query);
    
    if ($result) {
        $flag = 1;
    } else {
        $flag = 0;
    }
}


if ($flag) {
    $msg = "<!DOCTYPE html>
<html>
  
  <head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
    <title>Online CSD Canteen</title>
  </head>
  
  <body leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'
  style='margin: 0pt auto; padding: 0px; background:#F4F7FA;'>
    <table id='main' width='100%' height='100%' cellpadding='0' cellspacing='0' border='0'
    bgcolor='#F4F7FA'>
      <tbody>
        <tr>
          <td valign='top'>
            <table class='innermain' cellpadding='0' width='580' cellspacing='0' border='0'
            bgcolor='#F4F7FA' align='center' style='margin:0 auto; table-layout: fixed;'>
              <tbody>
                <!-- START of MAIL Content -->
                <tr>
                  <td colspan='4'>
                    <!-- Logo start here -->
                    <table class='logo' width='100%' cellpadding='0' cellspacing='0' border='0'>
                      <tbody>
                        <tr>
                          <td colspan='2' height='30'></td>
                        </tr>
                        
                        <tr>
                          <td colspan='2' height='30'></td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- Logo end here -->
                    <!-- Main CONTENT -->
                    <table width='100%' cellpadding='0' cellspacing='0' border='0' bgcolor='#ffffff'
                    style='border-radius: 4px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);'>
                      <tbody>
                        <tr>
                          <td height='40'></td>
                        </tr>
                        <tr style='font-family: -apple-system,BlinkMacSystemFont,&#39;Segoe UI&#39;,&#39;Roboto&#39;,&#39;Oxygen&#39;,&#39;Ubuntu&#39;,&#39;Cantarell&#39;,&#39;Fira Sans&#39;,&#39;Droid Sans&#39;,&#39;Helvetica Neue&#39;,sans-serif; color:#4E5C6E; font-size:14px; line-height:20px; margin-top:20px;'>
                          <td class='content' colspan='2' valign='top' align='center' style='padding-left:90px; padding-right:90px;'>
                            <table width='100%' cellpadding='0' cellspacing='0' border='0' bgcolor='#ffffff'>
                              <tbody>
                                <tr>
                                  <td align='center' valign='bottom' colspan='2' cellpadding='2'>
                                    
                                  </td>
                                </tr>
                                <tr>
                                  <td height='30' &nbsp;=''></td>
                                </tr>
                                <tr>
                                  <td align='center'> <span style='color:#48545d;font-size:22px;line-height: 24px;'>
          Order Placed Successfully!
        </span>

                                  </td>
                                </tr>
                                <tr>
                                  <td height='24' &nbsp;=''></td>
                                </tr>
                                <tr>
                                  <td height='1' bgcolor='#DAE1E9'></td>
                                </tr>
                                <tr>
                                  <td height='24' &nbsp;=''></td>
                                </tr>
                                <tr>
                                  <td align='center' style='color:#48545d;font-size:14px;line-height:24px;'>
                                   
                                    
                                    <div><strong>_______Shipping Details_______</strong></div>
                                    <div><strong>Name: ".$fname." ".$lname."</strong></div>
                                    <div><strong>Contact: ".$phone."</strong></div>
                                    <div><strong>Email: ".$email."</strong></div>
                                    <div><strong>Address: ".$address."</strong></div>
                                    <div><strong>Zip: ".$zip."</strong></div>
                                    <div><strong>Tracking No: ".$Tracking."</strong></div>
                                    <div><strong>Grand Total: ".$grand_total."</strong></div>
                                      
                                  </td>
                                </tr>
                                <tr>
                                  <td height='24' &nbsp;=''></td>
                                </tr>
                                <tr>
                                  <td height='1' bgcolor='#DAE1E9'></td>
                                </tr>
                                <tr>
                                  <td height='24' &nbsp;=''></td>
                                </tr>
                                <tr>
                                  <td align='center' style='color:#A2A2A2; font-size:13px; line-height:22px;'> <span>
          Thank you for Using Online CSD Canteen!
        </span>

                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td height='60'></td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- Main CONTENT end here -->
                    <!-- PROMO column start here -->
                    <!-- Show referral promo 25% of the time-->
                    <table id='promo' width='100%' cellpadding='0' cellspacing='0' border='0' style='margin-top:20px;'>
                      <tbody>
                        <tr>
                          <td colspan='2' height='20'></td>
                        </tr>

                        <tr>
                          <td colspan='2' height='20'></td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- PROMO column end here -->
                    <!-- FOOTER start here -->
                    <table width='100%' cellpadding='0' cellspacing='0' border='0'>
                      <tbody>
                        <tr>
                          <td height='10'>&nbsp;</td>
                        </tr>
                        <tr>
                          <td valign='top' align='center'> <span style='font-family: -apple-system,BlinkMacSystemFont,&#39;Segoe UI&#39;,&#39;Roboto&#39;,&#39;Oxygen&#39;,&#39;Ubuntu&#39;,&#39;Cantarell&#39;,&#39;Fira Sans&#39;,&#39;Droid Sans&#39;,&#39;Helvetica Neue&#39;,sans-serif; color:#9EB0C9; font-size:10px;'>&copy;
                            <a href='https://www.ideahomes.com/' target='_blank' style='color:#9EB0C9 !important; text-decoration:none;'>Online CSD Canteen</a> 2019
                          </span>

                          </td>
                        </tr>
                        <tr>
                          <td height='50'>&nbsp;</td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- FOOTER end here -->
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
  </body>

</html>";
        $sent = email_send($rows->email, $fname, $msg, "ONLINE CSD ORDER PLACED SUCCESSFULLY");
    $removecart = "DELETE FROM cart WHERE user_id = $User_Id;";
    $res = $db->query($removecart);
    if ($res) {
        $_SESSION['is_added'] = true;
        $_SESSION['tracking'] = $Tracking;
        header('location: '.$base_url.'checkout.php');
        
    }
} else {
    echo $db->error;
    echo "Error";
}
