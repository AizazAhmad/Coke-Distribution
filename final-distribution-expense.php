<?php 

require_once 'config/config.php';
require_once 'config/eloquent.php';



header( 'Cache-Control: no-store, no-cache, must-revalidate' ); 
header( 'Cache-Control: post-check=0, pre-check=0', false ); 
header( 'Pragma: no-cache' );

extract($_POST);


$rows = fetchRecord($CTypeId,'expchildtype');
    $ChildType = $rows->Name;


$Query = "SELECT * FROM expense WHERE MTypeId = $MTypeId AND STypeId = $STypeId AND CTypeId = $CTypeId AND Date BETWEEN '$Start 00:00:00' AND '$End 23:59:59' AND UserId = {$_SESSION['user_id']}";

$result = $db->query($Query);
$IsDisplay = $result->num_rows;



function fetch_Product($MTypeId,$STypeId,$CTypeId,$Start,$End,$Query)  {  

     

      global $db;

      $Na = "N/A";
      $output = '';  
      // echo "<p class='text-danger font-weight-bold pb-3'>Under Maintenance! Don't Update or Add any Record!</p>";

$result = $db->query($Query);

       
      $TAmount = 0; 
     
      while($row = $result->fetch_object())  
      { 
        
            
        $Amount = $row->Amount;
       
        
        
        
        $TAmount += $Amount;
      $output .= '<tr>  
                          <td>'.$row->Date.'</td>
                          <td>'.$row->Description.'</td>  
                          <td>'.$Amount.'</td>  
                           
                     </tr>  
                          ';  
      }
      $output .='<tr>  
                          <td></td>
                          <td>Total</td>  
                          <td>'.$TAmount.'</td>  
                            
                          
                           
                     </tr>';
               
           
      return $output;  
 } 



?>

                    <section class="hk-sec-wrapper html-content">
                    
                          <div class="row">
                            <div class="col border">
                              <h6 class="display-6">Report</h6><span><?=$ChildType?></span>
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
                <h4 align="center" class="display-4 mt-2">Distribution Expense Report</h3><br />  
                <?php if ($IsDisplay) { ?>
                  <div class="row justify-content-center">
                    <div class="col-auto">
                     <table class="table table-responsive table-bordered">  
                          <tr>  
                              <th>Date</th>
                              <th>Description</th>  
                              <th>Amount</th>
                          </tr>  
                     <?php
                     
                      echo fetch_Product($MTypeId,$STypeId,$CTypeId,$Start,$End,$Query);
                       
                     
                       
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
                        
                        
          
            
