<?php 

require_once 'config/config.php';
require_once 'config/eloquent.php';

use Models\DeliveryMan;


header( 'Cache-Control: no-store, no-cache, must-revalidate' ); 
header( 'Cache-Control: post-check=0, pre-check=0', false ); 
header( 'Pragma: no-cache' );
// echo "<pre>";
// print_r($_POST);
// exit();
extract($_POST);
// $DMan = DeliveryMan::find($DeliveryManId);
// $DeliveryMan = $DMan->Code." ".$DMan->Name;

  
  $MultiParty = "IN (" . implode(",", $PartyId) . ")";
  
 
 $IDName = "ps.SubProductId IN (" . implode(",", $SubProductId) . ")";


  $Query = "SELECT ps.OrderDate,ps.ReceivingDate,ps.DocumentNo,ps.DeliveryManBuilty,p.Name AS Party,sp.Name AS SubProduct,ps.Qty,ps.Cost,ps.Sale,ps.AdvanceTaxAmount,ps.DistributorCommission,ps.Payable FROM primarysalelog ps
  INNER JOIN party p
    ON ps.PartyId = p.Id
  INNER JOIN sub_product sp
    ON ps.SubProductId = sp.Id
  WHERE ps.PartyId $MultiParty AND ps.OrderDate BETWEEN '$Start 00:00:00' AND '$End 23:59:59' AND $IDName";

//echo $Query;

$result = $db->query($Query);
// $row = $result->fetch_object();
// echo "<pre>";
// print_r($row);
// exit();
$IsDisplay = $result->num_rows;
      

function fetch_Product($Query)  {  
global $db;
      $output = '';  
      // echo "<p class='text-danger font-weight-bold pb-3'>Under Maintenance! Don't Update or Add any Record!</p>";

$result = $db->query($Query);
      $TQty = 0; 
      $TCost = 0; 
      $TSale = 0; 
      $TAdvanceTaxAmount = 0;
      $TDistributorCommission = 0;
      $TPayable = 0;
      
      while($row = $result->fetch_object())  
      { 
        
       
        $Qty = $row->Qty;        
        $Cost = $row->Cost;
        $Sale = $row->Sale;
        $AdvanceTaxAmount = $row->AdvanceTaxAmount;
        $DistributorCommission = $row->DistributorCommission;
        $Payable = $row->Payable;
        
        
        $TQty += $Qty;  
        $TCost += $Cost; 
        $TSale += $Sale; 
        $TAdvanceTaxAmount += $AdvanceTaxAmount; 
        $TDistributorCommission += $DistributorCommission; 
        $TPayable += $Payable; 
      $output .= '
      <tr>  
                          <td>'.$row->OrderDate.'</td> 
                          <td>'.$row->ReceivingDate.'</td> 
                          <td>'.$row->DocumentNo.'</td> 
                          <td>'.$row->DeliveryManBuilty.'</td> 
                          <td>'.$row->Party.'</td> 
                          <td>'.$row->SubProduct.'</td> 
                          <td>'.$Qty.'</td> 
                          <td>'.$Cost.'</td>   
                          <td>'.$Sale.'</td>   
                          <td>'.$AdvanceTaxAmount.'</td>   
                          <td>'.$DistributorCommission.'</td>   
                          <td>'.$Payable.'</td>   
                           
                     </tr>  
                          ';  
      }
      $output .='<tr>  
                          <td colspan="6">Total</td>                          
                          <td>'.$TQty.'</td> 
                          <td>'.$TCost.'</td>   
                          <td>'.$TSale.'</td>   
                          <td>'.$TAdvanceTaxAmount.'</td>   
                          <td>'.$TDistributorCommission.'</td>   
                          <td>'.$TPayable.'</td> 
                           
                     </tr>                    

                     ';
                 
      return $output;  
 } 



?>

                    <section class="hk-sec-wrapper html-content">
                    
                          <div class="row">
                            <div class="col border">
                              <h6 class="display-6">Part</h6><span>All Party</span>
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
                <h4 align="center" class="display-4 mt-2">Primary Sales Report</h3><br />  
               <!-- <h3 align="center" class="display-4">SubProduct Wise</h3> -->
                <?php if ($IsDisplay) { ?>
                  <div class="row justify-content-center">
                    <div class="col-auto">
                      
                     <table class="table table-responsive table-bordered" style="border-spacing: 5px;">  
                          <tr>                             
                              <th>OrderDate</th>
                              <th>ReceivingDate</th>
                              <th>DocumentNo</th>
                              <th>DeliveryManBuilty</th>
                              <th>Party</th>
                              <th>SubProduct</th>
                              <th>Qty</th>
                              <th>Cost</th>
                              <th>Sale</th>
                              <th>AdvanceTaxAmount</th>
                              <th>DistributorCommission</th>
                              <th>Payable</th>                              
                              
                          </tr>  
                     <?php
                     
                       echo fetch_Product($Query);
                     
                      
                       
                     ?>  
                     </table> 
                     </div> 
                   </div>
                   <?php }else{
                   
                    ?>
                    <div class="alert alert-danger" role="alert">
  No Records Found!
</div>
<?php } ?>

                     <br />  
                                     
           </div>
                                    
                                </div>
                            </div>
                            <p>Powered By www.ZeeZaaQ.com ©️ 2019 - 2020</p>
                        </section>
                        
                        
          
            
