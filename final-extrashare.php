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

  $IDName = "";
  $IDD = 0;
  $PN = "";
  $MultiDev = "IN (" . implode(",", $DeliveryManId) . ")";
  if (isset($PW)) {
    $IDName = "sub_product.ProductId IN (" . implode(",", $ProductId) . ")";
    $IDD = $ProductId;
    $PN = "product";
  }
  if (isset($SPW)) {
    $IDName = "secondarysale.SubProductId IN (" . implode(",", $SubProductId) . ")";
     $IDD = $SubProductId;
     $PN = "sub_product";
  }

  $Query = "SELECT
  CONCAT($PN.Code,' ',$PN.Name) AS Name,
  SUM(secondarysale.Qty) AS Qty,
  SUM(secondarysale.Promo) AS Promo,
  SUM(secondarysale.TPromo) AS TPromo,
  SUM(secondarysale.ExtraShare) AS ExtraShare,
  SUM(secondarysale.TExtraShare) AS TExtraShare,
  (SUM(secondarysale.TExtraShare)/SUM(secondarysale.Qty)) AS ESAVG
FROM secondarysale
  INNER JOIN customer
    ON secondarysale.CustomerId = customer.Id
  INNER JOIN sub_product
    ON secondarysale.SubProductId = sub_product.Id
  INNER JOIN product
    ON sub_product.ProductId = product.Id
  WHERE secondarysale.DeliveryManId $MultiDev AND secondarysale.Date BETWEEN '$Start 00:00:00' AND '$End 23:59:59' AND $IDName GROUP BY $PN.Code,
         $PN.Name";

// echo $Query;
// exit();
$result = $db->query($Query);
$IsDisplay = $result->num_rows;
      

function fetch_Product($Query)  {  
global $db;
      $output = '';  
      // echo "<p class='text-danger font-weight-bold pb-3'>Under Maintenance! Don't Update or Add any Record!</p>";

$result = $db->query($Query);
      $TQty = 0; 
      $TOPromo = 0; 
      $TOTPromo = 0; 
      $TOExtra = 0;
      $TOTExtra = 0;
      $TESAVG = 0;
      
      while($row = $result->fetch_object())  
      { 
        
       
        $Qty = $row->Qty;
        
        $Promo = $row->Promo;
        $TPromo = $row->TPromo;
        $Extra = $row->ExtraShare;
        $TExtra = $row->TExtraShare;
        $ESAVG = $row->ESAVG;
        
        
        $TQty += $Qty;  
        $TOPromo += $Promo; 
        $TOTPromo += $TPromo; 
        $TOExtra += $Extra; 
        $TOTExtra += $TExtra; 
        $TESAVG += $ESAVG; 
      $output .= '

      <tr>  
                          <td>'.$row->Name.'</td> 
                          <td>'.$Qty.'</td> 
                          <td>'.$TExtra.'</td>   
                          <td>'.bcdiv($ESAVG, 1, 3).'</td>   
                           
                     </tr>  
                          ';  
      }
      $output .='<tr>  
                          <td>Total</td> 
                          <td>'.$TQty.'</td> 
                          <td>'.$TOTExtra.'</td> 
                          <td>'.bcdiv(($TOTExtra/$TQty), 1, 3).'</td> 
                           
                     </tr>                    

                     ';
                 
      return $output;  
 } 



?>

                    <section class="hk-sec-wrapper html-content">
                    
                          <div class="row">
                            <div class="col border">
                              <h6 class="display-6">DeliveryMan</h6><span>All DeliveryMan</span>
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
                <h4 align="center" class="display-4 mt-2">Final Extra Share And Promo Sheet ( By Delivery Man )</h3><br />  
               <h3 align="center" class="display-4"><?php 
               if (isset($PW)) 
                echo "Product Wise";
              else 
                echo "SubProduct Wise";
                ?></h3>
                <?php if ($IsDisplay) { ?>
                  <div class="row justify-content-center">
                    <div class="col-auto">
                      
                     <table class="table table-responsive table-bordered" style="border-spacing: 5px;">  
                          <tr>  
                              <th width="70%">Name</th>
                              <th width="10%">Sale</th> 
                              <th width="10%">TExtra</th>  
                              <th width="10%">AVG</th>  
                              
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
                        
                        
          
            
