<?php
    require_once '../config/config.php';
    require_once '../vendor/autoload.php';
    extract($_POST);
header("Content-Type: application/pdf");
header("Content-Transfer-Encoding: binary");
// header("Content-Disposition:attachment;filename=final.pdf");
// readfile(dirname(__FILE__).'/'.'final.pdf');
header("Expires: 0");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
    $rows = fetchRecord($DeliveryManId,'deliveryman');
    $DeliveryMan = $rows->Code." ".$rows->Name;
    function fetch_data($DeliveryManId,$Start,$End)  
 {  global $db;
  
      $output = '';  
      $query="SELECT
  sum(secondarysale.Qty) as Qty,
  sum(secondarysale.HTHDiscount) as HTHDiscount,
  sum(secondarysale.Promo) as Promo,
  sum(secondarysale.ExtraShare) as Extra,
  sum(secondarysale.Total) as Total,
  sub_product.Id,
  sub_product.Name,
  sub_product.Sale+sub_product.CompanyTax as Rate
FROM secondarysale
  INNER JOIN deliveryman
    ON secondarysale.DeliveryManId = deliveryman.Id
  INNER JOIN sub_product
    ON secondarysale.SubProductId = sub_product.Id
WHERE secondarysale.DeliveryManId = $DeliveryManId AND secondarysale.UserId = {$_SESSION['user_id']} AND (secondarysale.Date BETWEEN '$Start' AND '$End') GROUP BY sub_product.Id";
$result = $db->query($query);
		$TQty = 0; 
		$TRate = 0; 
		$TTotal = 0; 
		$THTHDiscount = 0; 
		$TPromo = 0; 
		$TExtra = 0; 
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
        $Promo = $Qty*$row->Promo;
        $Extra = $Qty*$row->Extra;
        $Deduct = $HTHDiscount + $Promo + $Extra;
        $TAVGShare = $Extra/$Qty;
        $TAVGShare = round($TAVGShare, 2);
        $NetAmount = $Total-$Deduct;
        $NetRate = $NetAmount/$Qty;
        $TQty += $Qty; 
        $TRate += $Rate; 
        $TTotal += $Total; 
        $THTHDiscount += $HTHDiscount; 
        $TPromo += $Promo; 
        $TExtra += $Extra; 
        $TTAVGShare += $TAVGShare; 
        $TNetAmount += $NetAmount; 
        $TNetRate += $NetRate; 
      $output .= '<tr>  
                          <td>'.$row->Name.$row->Id.'</td>  
                          <td>'.$Qty.'</td>  
                          <td>'.round($Rate).'</td> 
                          <td>'.$Total.'</td>  
                          <td>'.$HTHDiscount.'</td>  
                          <td>'.$Promo.'</td>  
                          <td>'.$Extra.'</td>  
                          <td>'.$TAVGShare.'</td>  
                          <td>'.round($NetAmount, 2).'</td>  
                          <td>'.round($NetRate, 2).'</td>  
                           
                     </tr>  
                          ';  
      }  
      $output .='<tr>  
                          <td>Total</td>  
                          <td>'.$TQty.'</td>  
                          <td>'.$TTotal/$TQty.'</td> 
                          <td>'.$TTotal.'</td>  
                          <td>'.$THTHDiscount.'</td>  
                          <td>'.$TPromo.'</td>  
                          <td>'.$TExtra.'</td>  
                          <td>'.$TExtra/$TQty.'</td>  
                          <td>'.$TNetAmount.'</td>  
                          <td>'.round($TNetRate, 2).'</td>  
                           
                     </tr>';
                     // $Grand = $TQty+$TRate+$TTotal+$THTHDiscount+$TPromo+$TExtra+$TTAVGShare+$TNetAmount+$TNetRate;
      $output .='<tr>  
                          <td colspan="10">Net Cash: <b>'.$TNetAmount.'</b></td>  
                          
                           
                     </tr>';

      return $output;  
 }  

 		
      
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Final Settlement Sheet");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins('10', '5', '10');  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  

      $obj_pdf->SetFont('helvetica', '', 10);  
      $obj_pdf->AddPage('L');  
      $content = '';  
      $content .= '  
      <h3 align="center">Final Settlement Sheet</h3><br /><br />
      <h2 bgcolor = "gray">DeliveryMan: '.$DeliveryMan.' From: '.$Start.' To: '.$End.'</h2>  
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th width="28%">Name</th>  
                <th width="8%">Sale</th>  
                <th width="8%">Rate</th>  
                <th width="8%">Total</th>  
                <th width="8%">HTHD</th>  
                <th width="8%">Promo</th>  
                <th width="8%">Extra</th>  
                <th width="8%">TAVGShare</th>  
                <th width="8%">NetAmount</th>  
                <th width="8%">NetRate</th>  
           </tr>  
      ';  
      $content .= fetch_data($DeliveryManId,$Start,$End);  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content); 
      //$obj_pdf->Output(dirname(__FILE__).'/'.'FinalSettlement.pdf', 'D');

      $obj_pdf->Output('FinalSettlement.pdf', 'D'); 

        
    
?>
