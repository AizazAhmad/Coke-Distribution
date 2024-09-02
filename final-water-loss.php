<?php 

require_once 'config/config.php';
require_once 'config/eloquent.php';



header( 'Cache-Control: no-store, no-cache, must-revalidate' ); 
header( 'Cache-Control: post-check=0, pre-check=0', false ); 
header( 'Pragma: no-cache' );

extract($_POST);

$IDName = "w.SubProductId IN (" . implode(",", $SubProductId) . ")";
  $Query = "SELECT date_format(w.Date,'%a %b %e') AS Date,s.Name,w.Qty,w.Cost,w.TotalPrice
FROM waterloss w
INNER JOIN sub_product s ON w.SubProductId = s.Id
 WHERE w.UserId = {$_SESSION['user_id']}
AND $IDName
AND w.Date BETWEEN '$Start 00:00:00' AND '$End 23:59:59'";


$result = $db->query($Query);
$IsDisplay = $result->num_rows;
      

function fetch_Product($Start,$End,$Query)  {  

      global $db;

      
      $Na = "N/A";
      $output = '';  
      // echo "<p class='text-danger font-weight-bold pb-3'>Under Maintenance! Don't Update or Add any Record!</p>";

$result = $db->query($Query);
      
      $TQty = 0; 
      $TRate = 0; 
      $TTotal = 0; 
      
      while($row = $result->fetch_object())  
      { 
        
            
        $Qty = $row->Qty;
       
        
        $Price = $row->Cost;
        $Total = $row->TotalPrice;
        
       
        
        $TQty += $Qty; 
        $TRate += $Price; 
        $TTotal += $Total; 
       
      $output .= '<tr>  
                          <td>'.$row->Date.'</td>
                          <td>'.$row->Name.'</td>
                          <td>'.$Qty.'</td>  
                          <td>'.$Price.'</td> 
                          <td>'.$Total.'</td>  
                                                     
                     </tr>  
                          ';  
      }
      $output .='<tr>  
                          <td>Total</td>  
                          <td></td>  
                          <td>'.$TQty.'</td>  
                          <td>'.$TRate.'</td> 
                          <td>'.$TTotal.'</td>  
                         
                         
                     </tr>';
                
          
      return $output;  
 } 



?>

                    <section class="hk-sec-wrapper html-content">
                    
                          <div class="row">
                            <div class="col border">
                              <h6 class="display-6">Report</h6><span>Water Loss</span>
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
                                     <h4 align="center" class="display-4 mt-2">Water Loss Report Sheet</h3><br />  
                <?php if ($IsDisplay) { ?>
                  <div class="row justify-content-center">
                    <div class="col-auto">
                     <table class="table table-responsive table-bordered">  
                          <tr>  
                              <th width="30%">Date</th>
                              <th width="100%">Name</th>
                              <th>Qty</th>  
                              <th>Cost</th>  
                              <th>Total</th>  
                             
                          </tr>  
                     <?php
                     
                      echo fetch_Product($Start,$End,$Query);
                       
                     
                       
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
                        
                        
          
            
