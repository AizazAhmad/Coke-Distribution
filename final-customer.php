<?php 

require_once 'config/config.php';
require_once 'config/eloquent.php';

use Models\DeliveryMan;
use Models\Customer;
use Models\SubProduct;
use Models\Product;
use Models\Loadout;
use Models\Sale;
use Models\EmptyRecoveryReturnLog;
use Models\CustomerLedger;
use Models\EmptySaleLog;
use Models\CustomerEmptyCredit;



header( 'Cache-Control: no-store, no-cache, must-revalidate' ); 
header( 'Cache-Control: post-check=0, pre-check=0', false ); 
header( 'Pragma: no-cache' );

extract($_POST);
$cus = Customer::find($CustomerId);
// $rows = fetchRecord($CustomerId,'deliveryman');
//     $DeliveryMan = $rows->Code." ".$rows->Name;
$Customer = $cus->Code." ".$cus->Name;

function TotalClosingBalance($CustomerId,$End){

  $diff = CustomerLedger::selectRaw("(SUM(Credit) - SUM(Debit)) AS ClosingBalance")
            ->where('CustomerId', $CustomerId)
            ->whereBetween('Date', ['2020-01-01 00:00:00',$End.' 23:59:59'])
            ->first()->ClosingBalance;
  return $diff;
  
}

function TodayCashCredit($CustomerId,$Start,$End){
  $sum = CustomerLedger::where('CustomerId', $CustomerId)
          ->whereBetween('Date', [$Start.' 00:00:00',$End.' 23:59:59'])
          ->sum('Credit'); 

  return $sum;

}

function ClosingEmpty($CustomerId,$End){

   $CE = CustomerEmptyCredit::selectRaw("(SUM(Credit) - ( SUM(Debit) + SUM(BCDebit) ) ) AS ClosingEmpty")
            ->where('CustomerId', $CustomerId)
            ->whereBetween('Date', ['2020-01-01 00:00:00',$End.' 23:59:59'])
            ->first()->ClosingEmpty;

  return $CE;


}

function TodayEmptyCredit($CustomerId,$Start,$End){

  $sum = CustomerEmptyCredit::where('CustomerId', $CustomerId)
          ->whereBetween('Date', [$Start.' 00:00:00',$End.' 23:59:59'])
          ->sum('Credit');

  return $sum;

}

function TodayEmptyRecovery($CustomerId,$Start,$End){
  $sum = CustomerEmptyCredit::where('CustomerId', $CustomerId)
          ->whereBetween('Date', [$Start.' 00:00:00',$End.' 23:59:59'])
          ->sum('Debit');

  return $sum;

}


function EmptySale($CustomerId,$Start,$End){
  
  $sum = CustomerEmptyCredit::where('CustomerId', $CustomerId)
          ->whereBetween('Date', [$Start.' 00:00:00',$End.' 23:59:59'])
          ->sum('Price');

  return $sum;
  
}



function RecoveryCash($CustomerId,$Start,$End){
  
  $sum = CustomerLedger::where('CustomerId', $CustomerId)
          ->whereBetween('Date', [$Start.' 00:00:00',$End.' 23:59:59'])
          ->sum('Debit'); 

  return $sum;

}

if ($Selection == "SubProduct") {
  $Query = "SELECT
  SUM(secondarysale.Qty) AS Qty,
  SUM(secondarysale.HTHDiscount) AS HTHDiscount,
  SUM(secondarysale.TPromo) AS TPromo,
  SUM(secondarysale.TExtraShare) AS TExtraShare,
  SUM(secondarysale.Total) AS Total,
  sub_product.Id,
  sub_product.Name,
  sub_product.Sale + sub_product.CompanyTax AS Rate,
  SUM(secondarysale.Qty * sub_product.Scheme) AS Scheme
FROM secondarysale
  INNER JOIN customer
    ON secondarysale.CustomerId = customer.Id
  INNER JOIN sub_product
    ON secondarysale.SubProductId = sub_product.Id
WHERE secondarysale.CustomerId = $CustomerId
AND secondarysale.UserId = {$_SESSION['user_id']}
AND secondarysale.Date BETWEEN '$Start 00:00:00' AND '$End 23:59:59'
GROUP BY sub_product.Id,
         sub_product.Name";
        
}

if ($Selection == "Product") {
  $Query="SELECT
  SUM(secondarysale.Qty) AS Qty,
  SUM(secondarysale.HTHDiscount) AS HTHDiscount,
  SUM(secondarysale.TPromo) AS TPromo,
  SUM(secondarysale.TExtraShare) AS TExtraShare,
  SUM(secondarysale.Total) AS Total,
  SUM(sub_product.Sale + sub_product.CompanyTax) AS Rate,
  SUM(secondarysale.Qty * sub_product.Scheme)  AS Scheme,
  product.Id,
  product.Name
FROM secondarysale
  INNER JOIN customer
    ON secondarysale.CustomerId = customer.Id
  INNER JOIN sub_product
    ON secondarysale.SubProductId = sub_product.Id
  INNER JOIN product
    ON sub_product.ProductId = product.Id
WHERE secondarysale.CustomerId = $CustomerId
AND secondarysale.UserId = {$_SESSION['user_id']}
AND secondarysale.Date BETWEEN '$Start 00:00:00' AND '$End 23:59:59'
GROUP BY product.Id,
         product.Name";


}



function fetch_Product($CustomerId,$Start,$End,$Query)  {  

      global $db;

      
      $TotalClosingBalance = TotalClosingBalance($CustomerId,$End);
      $TodayCashCredit = TodayCashCredit($CustomerId,$Start,$End);
      $RecoveryCash = RecoveryCash($CustomerId,$Start,$End);
      $Balance = $TodayCashCredit - $RecoveryCash;
      $OpeningBalance = $TotalClosingBalance - $Balance;

      $ClosingEmpty = ClosingEmpty($CustomerId,$End);
      $TodayEmptyRecovery = TodayEmptyRecovery($CustomerId,$Start,$End);
      $TodayEmptyCredit = TodayEmptyCredit($CustomerId,$Start,$End);
      $Res = $TodayEmptyCredit - $TodayEmptyRecovery;
      $OpeningEmpty = $ClosingEmpty - $Res;

      // $ClosingEmpty = 0;
      // $TodayEmptyRecovery = 0;
      // $TodayEmptyCredit = 0;
      // $Res = 0;
      // $OpeningEmpty = 0;
      
      $EmptySale = EmptySale($CustomerId,$Start,$End);

      

      $Na = "N/A";
      $output = '';  
      // echo "<p class='text-danger font-weight-bold pb-3'>Under Maintenance! Don't Update or Add any Record!</p>";

$result = $db->query($Query);
      
      $TQty = 0; 
      $TRate = 0; 
      $TTotal = 0; 
      // $THTHDiscount = 0; 
      $TPromo = 0; 
      $TExtra = 0; 
      $TScheme = 0; 
      $TTAVGShare = 0; 
      $TNetAmount = 0; 
      $TNetRate = 0; 
      while($row = $result->fetch_object())  
      { 
        
            
        $Qty = $row->Qty;
       
        
        $Rate = $row->Rate;
        
        $Total = $Qty * $Rate;
        //$Deduct = $row->HTHDiscount+$row->Promo+$row->Extra;
        $HTHDiscount = $Qty*$row->HTHDiscount;
        $Promo = $row->TPromo;
        $Extra = $row->TExtraShare;
        $Scheme = $row->Scheme;
        $Deduct = $HTHDiscount + $Promo + $Extra + $Scheme;
        $TAVGShare = @($Extra/$Qty);
        $TAVGShare = round($TAVGShare, 2);
        $NetAmount = $Total-$Deduct;
        $NetRate = @($NetAmount/$Qty);
        
        $TQty += $Qty; 
        $TRate += $Rate; 
        $TTotal += $Total; 
        // $THTHDiscount += $HTHDiscount; 
        $TPromo += $Promo; 
        $TExtra += $Extra; 
        $TScheme += $Scheme; 
        $TTAVGShare += $TAVGShare; 
        $TNetAmount += $NetAmount; 
        $TNetRate += $NetRate; 
      $output .= '<tr>  
                          <td>'.$row->Name.'</td>
                          <td>'.$Qty.'</td>  
                          <td>'.$Rate.'</td> 
                          <td>'.$Total.'</td>  
                           
                          <td>'.$Promo.'</td>  
                          <td>'.$Extra.'</td>  
                          <td>'.$Scheme.'</td>  
                          <td>'.$TAVGShare.'</td>  
                          <td>'.round($NetAmount, 2).'</td>  
                          <td>'.round($NetRate, 2).'</td>   
                           
                     </tr>  
                          ';  
      }
      $output .='<tr>  
                          <td>Total</td>  
                          <td>'.$TQty.'</td>  
                          <td>'.round(@($TTotal/$TQty)).'</td> 
                          <td>'.$TTotal.'</td>  
                         
                          <td>'.$TPromo.'</td>  
                          <td>'.$TExtra.'</td>  
                          <td>'.$TScheme.'</td>  
                          <td>'.round(@($TExtra/$TQty),2).'</td>  
                          <td>'.$TNetAmount.'</td>  
                          <td>'.round(@($TNetAmount/$TQty),2).'</td>  
                           
                     </tr>';
                 $NetCash = $EmptySale+$RecoveryCash+$TNetAmount;
                 $NetCash = $NetCash - $TodayCashCredit ;
          $output .='<tr>  
                          <td colspan="4">Total Opening Empty: <b>'.$OpeningEmpty.'</b></td>
                          <td colspan="4">Total Opening Cash: <b>'.$OpeningBalance.'</b></td>     
                               
                     </tr>
                     <tr> 
                          <td colspan="4">Today Empty Credit: <b>'.$TodayEmptyCredit.'</b></td> 
                          <td colspan="4">Today Cash Credit: <b>'.$TodayCashCredit.'</b></td>     
                               
                     </tr>
                     <tr> 
                          <td colspan="4">Today Empty Recovery: <b>'.$TodayEmptyRecovery.'</b></td> 
                          <td colspan="4">Total Cash Recovery: <b>'.$RecoveryCash.'</b></td>     
                               
                           
                     </tr>                     
                     <tr> 
                          <td colspan="4">Total Empty Sale: <b>'.$EmptySale.'</b></td> 
                          <td colspan="4">Total Closing Balance: <b>'.$TotalClosingBalance.'</b></td>      
                               
                     </tr>
                     <tr> 
                          <td colspan="4">Total Closing Empty: <b>'.$ClosingEmpty.'</b></td> 
                              
                               
                     </tr>
                     
                     <tr>  
                          <td colspan="4">Net Cash: <b>'.$NetCash.'</b></td>     
                     </tr>
                     ';  
      return $output;  
 } 



?>

                    <section class="hk-sec-wrapper html-content">
                    
                          <div class="row">
                            <div class="col border">
                              <h6 class="display-6">Customer</h6><span><?=$Customer?></span>
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
                <h4 align="center" class="display-4 mt-2">Final Settlement Sheet</h3><br />  
               
                     <table class="table table-responsive table-bordered">  
                          <tr>  
                              <th width="20%">Name</th>
                              <th>Sale</th>  
                              <th>Rate</th>  
                              <th>Total</th>  
                             <!--  <th>HTHD</th>  --> 
                              <th>Promo</th>  
                              <th>Extra</th>  
                              <th>Scheme</th>  
                              <th>TAVGShare</th>  
                              <th>NetAmount</th>  
                              <th>NetRate</th>
                          </tr>  
                     <?php
                     
                      echo fetch_Product($CustomerId,$Start,$End,$Query);
                       
                     
                       
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
                        
                        
          
            
