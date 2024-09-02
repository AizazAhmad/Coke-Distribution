<?php 

require_once 'config/config.php';
require_once 'config/eloquent.php';

use Models\DeliveryMan;
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
$man = DeliveryMan::find($DeliveryManId);
// $rows = fetchRecord($DeliveryManId,'deliveryman');
//     $DeliveryMan = $rows->Code." ".$rows->Name;
$DeliveryMan = $man->Code." ".$man->Name;
$Start = $Date;
$End = $Start;
function TotalClosingBalance($DeliveryManId,$End){

  $diff = CustomerLedger::selectRaw("(SUM(Credit) - SUM(Debit)) AS ClosingBalance")
            ->where('DeliveryManId', $DeliveryManId)
            ->whereBetween('Date', ['2020-01-01 00:00:00',$End.' 23:59:59'])
            ->first()->ClosingBalance;
  return $diff;
  
}

function TodayCashCredit($DeliveryManId,$Start,$End){
  $sum = CustomerLedger::where('DeliveryManId', $DeliveryManId)
          ->whereBetween('Date', [$Start.' 00:00:00',$End.' 23:59:59'])
          ->sum('Credit'); 

  return $sum;

}

function ClosingEmpty($DeliveryManId,$End){

   $CE = CustomerEmptyCredit::selectRaw("(SUM(Credit) - ( SUM(Debit) + SUM(BCDebit) ) ) AS ClosingEmpty")
            ->where('DeliveryManId', $DeliveryManId)
            ->whereBetween('Date', ['2020-01-01 00:00:00',$End.' 23:59:59'])
            ->first()->ClosingEmpty;

  return $CE;


}

function TodayEmptyCredit($DeliveryManId,$Start,$End){

  $sum = CustomerEmptyCredit::where('DeliveryManId', $DeliveryManId)
          ->whereBetween('Date', [$Start.' 00:00:00',$End.' 23:59:59'])
          ->sum('Credit');

  return $sum;

}

function TodayEmptyRecovery($DeliveryManId,$Start,$End){
  $sum = CustomerEmptyCredit::where('DeliveryManId', $DeliveryManId)
          ->whereBetween('Date', [$Start.' 00:00:00',$End.' 23:59:59'])
          ->sum('Debit');

  return $sum;

}


function EmptySale($DeliveryManId,$Start,$End){
  
  $sum = CustomerEmptyCredit::where('DeliveryManId', $DeliveryManId)
          ->whereBetween('Date', [$Start.' 00:00:00',$End.' 23:59:59'])
          ->sum('Price');

  return $sum;
  
}



function RecoveryCash($DeliveryManId,$Start,$End){
  
  $sum = CustomerLedger::where('DeliveryManId', $DeliveryManId)
          ->whereBetween('Date', [$Start.' 00:00:00',$End.' 23:59:59'])
          ->sum('Debit'); 

  return $sum;

}

if ($Selection == "SubProduct") {
  $Query = "SELECT sp.Id, 
sp.Name, 
SUM(L.Loaded) AS LoadOut, 
SUM(S.Sold) AS Qty,
SUM(S.TPromo) AS TPromo,
SUM(S.TExtraShare) AS TExtraShare,
SUM(S.Total) AS Total,
sp.Sale + sp.CompanyTax AS Rate,
sp.Scheme * SUM(S.Sold) AS Scheme 
FROM sub_product sp
INNER JOIN (
  SELECT l.SubProductId, SUM(l.Qty) AS Loaded 
  From booking l WHERE l.RootId = $RootId
  AND l.Is_Booked = 0  
  AND (l.Updated_at BETWEEN '$Start 00:00:00' AND '$End 23:59:59')
  GROUP BY l.SubProductId
  ) L ON L.SubProductId = sp.Id
LEFT JOIN (
   SELECT s.SubProductId, 
   SUM(s.Qty) AS Sold,
   SUM(s.TPromo) AS TPromo,
   SUM(s.TExtraShare) AS TExtraShare,
   SUM(s.Total) AS Total 
  From secondarysale s WHERE s.RootId = $RootId  
  AND (s.Date BETWEEN '$Start 00:00:00' AND '$End 23:59:59')
  GROUP BY s.SubProductId
  ) S ON S.SubProductId = sp.Id
GROUP BY sp.Id, sp.Name,
         sp.Sale,
         sp.Scheme,
         sp.CompanyTax;";
         

}

if ($Selection == "Product") {
  $Query="SELECT p.Id, p.Name, 
Sum(sq.LoadOut) AS LoadOut,
SUM(sq.Qty) AS Qty,
SUM(sq.TPromo) AS TPromo,
SUM(sq.TExtraShare) AS TExtraShare,
SUM(sq.Total) AS Total,
SUM(sq.Rate) AS Rate,
SUM(sq.Scheme) AS Scheme
FROM product p INNER JOIN (
  SELECT sp.Id, 
  sp.Name,
  sp.ProductId, 
  SUM(L.Loaded) AS LoadOut, 
  SUM(S.Sold) AS Qty,
  SUM(S.TPromo) AS TPromo,
  SUM(S.TExtraShare) AS TExtraShare,
  SUM(S.Total) AS Total,
  sp.Sale + sp.CompanyTax AS Rate,
  sp.Scheme * SUM(S.Sold) AS Scheme 
  FROM sub_product sp
  INNER JOIN (
    SELECT l.SubProductId, SUM(l.Qty) AS Loaded 
    From booking l WHERE l.RootId = $RootId
    AND l.Is_Booked = 0   
    AND (l.Updated_at BETWEEN '$Start 00:00:00' AND '$End 23:59:59')
    GROUP BY l.SubProductId
    ) L ON L.SubProductId = sp.Id
  LEFT JOIN (
     SELECT s.SubProductId, 
     SUM(s.Qty) AS Sold,
     SUM(s.TPromo) AS TPromo,
     SUM(s.TExtraShare) AS TExtraShare,
     SUM(s.Total) AS Total 
    From secondarysale s WHERE s.RootId = $RootId  
    AND (s.Date BETWEEN '$Start 00:00:00' AND '$End 23:59:59')
    GROUP BY s.SubProductId
    ) S ON S.SubProductId = sp.Id
  GROUP BY sp.Id, sp.Name, sp.ProductId,
           sp.Sale,
           sp.Scheme,
           sp.CompanyTax
) sq ON p.Id = sq.ProductId
GROUP BY p.Id, p.Name;";


}



function fetch_Product($DeliveryManId,$Start,$End,$Query)  {  

      global $db;

      
      $TotalClosingBalance = TotalClosingBalance($DeliveryManId,$End);
      $TodayCashCredit = TodayCashCredit($DeliveryManId,$Start,$End);
      $RecoveryCash = RecoveryCash($DeliveryManId,$Start,$End);
      $Balance = $TodayCashCredit - $RecoveryCash;
      $OpeningBalance = $TotalClosingBalance - $Balance;

      $ClosingEmpty = ClosingEmpty($DeliveryManId,$End);
      $TodayEmptyRecovery = TodayEmptyRecovery($DeliveryManId,$Start,$End);
      $TodayEmptyCredit = TodayEmptyCredit($DeliveryManId,$Start,$End);
      $Res = $TodayEmptyCredit - $TodayEmptyRecovery;
      $OpeningEmpty = $ClosingEmpty - $Res;

      // $ClosingEmpty = 0;
      // $TodayEmptyRecovery = 0;
      // $TodayEmptyCredit = 0;
      // $Res = 0;
      // $OpeningEmpty = 0;
      
      $EmptySale = EmptySale($DeliveryManId,$Start,$End);

      

      $Na = "N/A";
      $output = '';  
      // echo "<p class='text-danger font-weight-bold pb-3'>Under Maintenance! Don't Update or Add any Record!</p>";

$result = $db->query($Query);
      $TLoadOut = 0;
      $TLoadIn = 0;
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
        
        $LoadOut = $row->LoadOut;      
        $Qty = $row->Qty;
        $LoadIn = $LoadOut - $Qty;
        
        $Rate = $row->Rate;
        if ($LoadOut == $LoadIn) {
          $Rate = 0;
        }
        $Total = $Qty * $Rate;
        //$Deduct = $row->HTHDiscount+$row->Promo+$row->Extra;
        //$HTHDiscount = $Qty*$row->HTHDiscount;
        $Promo = $row->TPromo;
        $Extra = $row->TExtraShare;
        $Scheme = $row->Scheme;
        $Deduct = $Promo + $Extra + $Scheme;
        $TAVGShare = @($Extra/$Qty);
        $TAVGShare = round($TAVGShare, 2);
        $NetAmount = $Total-$Deduct;
        $NetRate = @($NetAmount/$Qty);
        $TLoadOut += $LoadOut;
        $TLoadIn += $LoadIn;
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
                          <td>'.$LoadOut.'</td>  
                          <td>'.$LoadIn.'</td>  
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
                          <td>'.$TLoadOut.'</td>  
                          <td>'.$TLoadIn.'</td>  
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
                              <h6 class="display-6">DeliveryMan</h6><span><?=$DeliveryMan?></span>
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
                              <th>LoadOut</th>  
                              <th>LoadReturn</th>
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
                     
                      echo fetch_Product($DeliveryManId,$Start,$End,$Query);
                       
                     
                       
                     ?>  
                     </table>  
                     <br />  
                     <!-- <form id="myform" target="_blank" action="actions/final_settlement_download.php" method="POST"> 
                     <input type="hidden" name="DeliveryManId" value="<?=$DeliveryManId?>"> 
                     <input type="hidden" name="Start" value="<?=$Start?>"> 
                     <input type="hidden" name="End" value="<?=$End?>"> 
                     <input type="hidden" name="PartyId" value="<?php //$PartyId ?>">  -->
                          
                          <!-- <input type="button" id="submit" onclick="CreatePDFfromHTML()" class="btn btn-danger" value="Download"> -->
                     <!-- </form>   -->
                  
           </div>
                                    
                                </div>
                            </div>
                            <p>Powered By www.ZeeZaaQ.com ©️ 2019 - 2020</p>
                        </section>
                        
                        
          
            
