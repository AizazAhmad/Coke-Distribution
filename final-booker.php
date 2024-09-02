<?php 

require_once 'config/config.php';
require_once 'config/eloquent.php';




header( 'Cache-Control: no-store, no-cache, must-revalidate' ); 
header( 'Cache-Control: post-check=0, pre-check=0', false ); 
header( 'Pragma: no-cache' );

extract($_POST);

$rows = fetchRecord($BookerId,'booker');
    $Booker = $rows->Code." ".$rows->Name;


  $Query = "SELECT
  root.Name AS Root,
  customer.Name AS Customer,
  sub_product.Name AS SubProduct,
  booking.Qty,
  booking.TPromo,
  booking.TExtraShare,
  booking.Total
FROM booking
  INNER JOIN root
    ON booking.RootId = root.Id
  INNER JOIN customer
    ON booking.CustomerId = customer.Id
  INNER JOIN sub_product
    ON booking.SubProductId = sub_product.Id
  INNER JOIN booker
    ON booking.BookerId = booker.Id
    WHERE booking.BookerId = $BookerId AND booking.RootId = $RootId
AND booking.UserId = {$_SESSION['user_id']} AND booking.Is_Booked = $Selection
AND booking.BookingDate BETWEEN '$Start 00:00:00' AND '$End 23:59:59'";
        



function fetch_Product($Start,$End,$Query)  {  

      global $db;
      

      $Na = "N/A";
      $output = '';  
      // echo "<p class='text-danger font-weight-bold pb-3'>Under Maintenance! Don't Update or Add any Record!</p>";

$result = $db->query($Query);
      
      $TQty = 0;       
      $TPromo = 0; 
      $TExtra = 0;  
      $TTotal = 0;
      while($row = $result->fetch_object())  
      { 
        
            
        $Qty = $row->Qty;
        $Promo = $row->TPromo;
        $Extra = $row->TExtraShare;
        $Total = $row->Total;
        
        
        $TQty += $Qty; 
        $TPromo += $Promo; 
        $TExtra += $Extra;         
        $TTotal += $Total;
         
      $output .= '<tr>  
                          <td>'.$row->Root.'</td>
                          <td>'.$row->Customer.'</td>
                          <td>'.$row->SubProduct.'</td>
                          <td>'.$Qty.'</td>
                          <td>'.$Promo.'</td>  
                          <td>'.$Extra.'</td>
                          <td>'.$Total.'</td>                           
                     </tr>  
                          ';  
      }
      $output .='<tr>  
                          <td></td>  
                          <td></td>  
                          <td></td>  
                          <td>'.$TQty.'</td> 
                          <td>'.$TPromo.'</td>  
                          <td>'.$TExtra.'</td>  
                          <td>'.$TTotal.'</td>  
                           
                     </tr>';
            
      return $output;  
 } 



?>

                    <section class="hk-sec-wrapper html-content">
                    
                          <div class="row">
                            <div class="col border">
                              <h6 class="display-6">Booker</h6><span><?=$Booker?></span>
                            </div>
                            <div class="col border">
                              <h6 class="display-6">Date From</h6><span><?=$Start?></span> 
                            </div>
                            <div class="col border">
                              <h6 class="display-6">Date To</h6><span><?=$End?></span>
                            </div>

                            
                          </div>
                          
                            <div class="row">
                                <div class="col-sm">
                                     <div class="container" >  
                <h4 align="center" class="display-4 mt-2">Booker Sheet</h3><br />  
               
                     <table class="table table-responsive table-bordered">  
                          <tr>  
                              <th width="20%">Root</th>
                              <th>Customer</th>  
                              <th>SubProduct</th>  
                              <th>Qty</th>  
                              <th>TPromo</th>  
                              <th>TExtra</th>  
                              <th>Total</th> 
                          </tr>  
                     <?php
                     
                      echo fetch_Product($Start,$End,$Query);
                       
                     
                       
                     ?>  
                     </table>  
                     <br />  
                     <!-- <form id="myform" target="_blank" action="actions/final_settlement_download.php" method="POST"> 
                     <input type="hidden" name="CustomerId" value="<?=$CustomerId?>"> 
                     <input type="hidden" name="Start" value="<?=$Start?>"> 
                     <input type="hidden" name="End" value="<?=$End?>"> 
                     <input type="hidden" name="PartyId" value="<?=$PartyId?>">  -->
                          
                          <!-- <input type="button" id="submit" onclick="CreatePDFfromHTML()" class="btn btn-danger" value="Download"> -->
                     <!-- </form>   -->
                  
           </div>
                                    
                                </div>
                            </div>
                            <p>Powered By www.ZeeZaaQ.com ©️ 2019 - 2020</p>
                        </section>
                        
                        
          
            
