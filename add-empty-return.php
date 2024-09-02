<?php require_once 'config/config.php';
$Title = "Empty Return";
$title = "emptyreturn";
$query = "SELECT
  primarysalelog.*, 
  CONCAT (sub_product.Code, sub_product.Name) as SubProduct
FROM primarysalelog
  INNER JOIN sub_product
    ON primarysalelog.SubProductId = sub_product.Id WHERE primarysalelog.UserId = {$_SESSION['user_id']} AND primarysalelog.Status = 0";
    $result = $db->query($query);    
$accounts = fetchBySess($_SESSION['user_id'],'accounts');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add <?=$Title?></title>
    <?php require_once $include_path.'head.php'; ?>
    
</head>

<body>
    
    
    <!-- HK Wrapper -->
    <div class="hk-wrapper hk-vertical-nav">

        <!-- Top Navbar -->
        <?php require_once $include_path.'navbar.php'; ?>
        <!-- /Top Navbar -->

        <!-- Vertical Nav -->
        <?php require_once $include_path.'sidebar.php'; ?>
        <!-- /Vertical Nav -->

        <!-- Setting Panel -->
       <?php require_once $include_path.'setting.php'; ?>
        <!-- /Setting Panel -->

        <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <!-- Container -->
            <div class="container mt-xl-50 mt-sm-30 mt-15">
                <!-- Title -->
                
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                    <section class="hk-sec-wrapper">
                
            
                            <div class="row pb-2">
                              <div class="col">
                                <h5 class="hk-sec-title">Add <?=$Title?></h5>
                              </div>
                              <div class="col">
                                <a class="btn btn-gradient-info float-right" href="add-primary-sale.php">Add Primary Sale</a>
                              </div>
                              
                            </div>
                            
                            <div class="row">
                                <div class="col-sm">
                                    <form id="myform">
                                    <input type="hidden" name="PartyId" id="partyid">
                                    
                                    <div class="form-group row">
                                            
                                            <div class="col-sm">
                                                
                                                <select class="form-control" id="subproduct" name="PrimarySaleId">
                                                    <?php while ($row = $result->fetch_object()) {
                                                     ?>
                                                     <option value="<?=$row->Id?>">Inv# <?php echo $row->DocumentNo." | ".$row->SubProduct ?></option>
                                                     <?php } ?>           
                                                </select>
                                            </div>
                                    </div>

                                    
                                  <div class="form-group row">
                                    
                                    <label for="inputEmail3" class="col-sm col-form-label">Quantity Received</label>
                                    <label for="inputEmail3" class="col-sm col-form-label">Order Date</label>
                                    <label for="inputEmail3" class="col-sm col-form-label">Delivery Date</label>
                                    <label for="inputEmail3" class="col-sm col-form-label">Invoice No</label>
                                    <label for="inputEmail3" class="col-sm col-form-label">DeliveryMan/Builty</label>
                                    <label for="inputEmail3" class="col-sm col-form-label">Description</label>
                                   
                                 </div>
                                 <div class="form-group row">
                                    
                                    
                                    <div class="col-sm">
                                       <input type="text" name="Qty" class="form-control" id="qty" placeholder="Qty" disabled>  
                                    </div>
                                    <div class="col-sm">
                                       <input type="text" name="StartDate" class="form-control" id="StartDate" placeholder="StartDate" disabled>  
                                    </div>
                                    <div class="col-sm">
                                       <input type="text" name="EndDate" class="form-control" id="EndDate" placeholder="EndDate" disabled>  
                                    </div>
                                    <div class="col-sm">
                                       <input type="text" name="DocumentNo" class="form-control" id="documentno" placeholder="DocumentNo" disabled>  
                                    </div>
                                    <div class="col-sm">
                                       <input type="text" name="DeliveryMan" class="form-control" id="deliveryman" placeholder="DeliveryMan" disabled>  
                                    </div>
                                    <div class="col-sm">
                                       <input type="text" name="Description" class="form-control" id="description" placeholder="Description" disabled>  
                                    </div>                                    
                                   
                                 </div>
                               
                                 <div class="form-group row">
                                    
                                    
                                    <label for="inputEmail3" class="col-sm col-form-label">Invoicing Date</label>
                                    <label for="inputEmail3" class="col-sm col-form-label">Empty Return Invoice</label>
                                    <label for="inputEmail3" class="col-sm col-form-label">Territory</label>
                                    <label for="inputEmail3" class="col-sm col-form-label">Transporter</label>
                                    <label for="inputEmail3" class="col-sm col-form-label">Vehicle</label>
                                    <label for="inputEmail3" class="col-sm col-form-label">Driver CNIC</label>
                                    
                                   
                                 </div>
                                 <div class="form-group row">
                                    <div class="col-sm">
                                       <input class="form-control" id="InvDate" type="text" name="Date" />
                                    </div>
                                    <div class="col-sm">
                                       <input type="text" name="InvoiceNo" class="form-control" id="invoiceno" placeholder="InvoiceNo">                                       
                                    </div>
                                    <div class="col-sm">
                                       <input class="form-control" id="territory" type="text" name="Territory" placeholder="Territory" />                                       
                                    </div>
                                    <div class="col-sm">
                                       <input class="form-control" id="transporter" type="text" name="Transporter" placeholder="Transporter" />                                       
                                    </div>
                                    <div class="col-sm">
                                       <input type="text" name="Vehicle" class="form-control" id="vehicle" placeholder="Vehicle No" >                                       
                                    </div>
                                    <div class="col-sm">
                                       <input type="text" name="DriverCNIC" class="form-control" id="drivercnic" placeholder="Driver CNIC">
                                       
                                    </div>
                                    
                                 </div>
                                 
                                  <div class="form-group row">
                                    
                                    
                                    
                                    <label for="inputEmail3" class="col-sm col-form-label emp">Bottles</label>
                                    <label for="inputEmail3" class="col-sm col-form-label emp">Shells</label>
                                    <label for="inputEmail3" class="col-sm col-form-label">Pallets</label>
                                    
                                 </div>
                                  <div class="form-group row">
                                    
                                    
                                    <div class="col-sm emp">
                                       <input type="number" name="FBottles" class="form-control emp" id="fbottle" placeholder="Bottles" readonly>
                                    </div>
                                    <div class="col-sm emp">
                                       <input type="number" name="FShell" class="form-control emp" id="fshell" placeholder="Shells" readonly>
                                    </div>
                                    
                                    <div class="col-sm">
                                       <input type="number" name="FPallet" class="form-control" id="fpallet" placeholder="Pallets" readonly>
                                    </div>                                    
                                    
                                  </div>
                                  <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">ON Cash</label>
                                    <div class="col-sm-4">
                                       <select class="form-control" id="creditRecovery">
                                         <option value="0">No</option>
                                         <option value="1">Yes</option>
                                       </select>
                                    </div>
                                    
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Choose Account</label>
                                            <div class="col-sm-4">
                                                
                                                <select class="form-control" id="account" name="AccountId" disabled>
                                                  <option value="NULL">Select</option>
                                                    <?php for ($i=0; $i < count($accounts); $i++) {
                                                         ?>
                                                    <option value="<?=$accounts[$i]->Id?>"><?=$accounts[$i]->Name." ".$accounts[$i]->Number." [Balance: ".$accounts[$i]->Balance."]"?></option>                                        <?php } ?>            
                                                </select>

                                            </div>
                                 </div>
                                  
                                        
                                  <div class="form-group row">
                                    
                                    <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                                    
                                    
                                    <label for="inputEmail3" class="col-sm-1 col-form-label">EmptyR</label>
                                    <!-- <label for="inputEmail3" class="col-sm-1 col-form-label">PayCash</label>
                                    <label for="inputEmail3" class="col-sm-1 col-form-label">PayBank</label> -->
                                   
                                 </div>
                                 <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label emp">Bottles</label>
                                     <div class="col-sm-1 emp">
                                        <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="BER" value="BER" id="BER">
                                                    <label class="custom-control-label" for="BER"></label>
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-1 emp">
                                        <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="BPC" value="BPC" id="BPC">
                                                    <label class="custom-control-label" for="BPC"></label>
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-sm-1 emp">
                                        <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="BPL" value="BPL" id="BPL">
                                                    <label class="custom-control-label" for="BPL"></label>
                                        </div>
                                    </div> -->
                                 </div>
                                 <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label emp">Shells</label>
                                     <div class="col-sm-1">
                                        <div class="custom-control custom-checkbox emp">
                                                    <input type="checkbox" class="custom-control-input" name="SER" value="SER" id="SER">
                                                    <label class="custom-control-label" for="SER"></label>
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-1 emp">
                                        <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="SPC" value="SPC" id="SPC">
                                                    <label class="custom-control-label" for="SPC"></label>
                                        </div>
                                    </div> -->
                                   <!--  <div class="col-sm-1 emp">
                                        <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="SPL" value="SPL" id="SPL">
                                                    <label class="custom-control-label" for="SPL"></label>
                                        </div>
                                    </div> -->
                                 </div>
                                 <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Pallets</label>
                                     <div class="col-sm-1">
                                        <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="PER" value="PER" id="PER">
                                                    <label class="custom-control-label" for="PER"></label>
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-1">
                                        <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="PPC" value="PPC" id="PPC">
                                                    <label class="custom-control-label" for="PPC"></label>
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-sm-1">
                                        <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="PPL" value="PPL" id="PPL">
                                                    <label class="custom-control-label" for="PPL"></label>
                                        </div>
                                    </div> -->
                                 </div>
                                        
                                                                                                                      
                                      
                                        <div class="form-group row mb-0">
                                            <div class="col-sm-12">
                                                <button type="submit" id="submit" class="btn btn-gradient-info btn-block">Add <?=$Title?></button> 
                                            </div>
                                            
                                        </div>
                                        
                                    </form>
                                    <div class="form-group row mt-3">
                                            <div class="col-sm-12">
                                               <style type="text/css">
                                    .clss{
                                        display: block !important;
                                      height: 230px !important;
                                      overflow-y: auto !important;
                                      width: 100% !important;
                                    }
                                </style>
                                <div class="card">
                                            <h6 class="card-header border-0">
                                                <i class="ion ion-md-clipboard font-21 mr-10"></i>Summary
                                            </h6>
                                            <div class="card-body pa-0">
                                                <div class="table-wrap">
                                                    <div class="table-responsive" style="height: 200px;">
                                                        <table class="table table-sm mb-0">
                                                          <thead>
                                                                <tr class="bg-light">
                                                                    <th class="text-dark text-uppercase" scope="row">Product</th>
                                                                    <th class="text-dark text-uppercase" scope="row">Qty</th>
                                                                    <th class="text-dark text-uppercase" scope="row">Bottles</th>                                 
                                                                    <th class="text-dark font-18" scope="row">Shells</th>
                                                                    <th class="text-dark font-18" scope="row">Pallets</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="CusInvo">
                                                                
                                                                
                                                            </tbody>
                                                            <tfoot>
                                                                <tr class="bg-light">
                                                                    <th class="text-dark text-uppercase" scope="row">Product</th>
                                                                    <th class="text-dark text-uppercase" scope="row">Qty</th>
                                                                    <th class="text-dark text-uppercase" scope="row">Bottles</th>
                                                                    <th class="text-dark font-18" scope="row">Shells</th>
                                                                    <th class="text-dark font-18" scope="row">Pallets</th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                            </div>
                                            
                                    </div>
                                </div>

                            </div>
                        </section>
                        
                        
                    </div>
                </div>
                <!-- /Row -->
            </div>
            <!-- /Container -->
            
            <!-- Footer -->
             <?php require_once $include_path.'foot.php'; ?>
      <!-- Toggles JavaScript -->
      
            <!-- /Footer -->
        </div>
        <!-- /Main Content -->

    </div>
    <!-- /HK Wrapper -->

   
   
   <!-- jQuery -->
     <?php require_once $include_path.'foot.php'; ?>
    <script type="text/javascript">
    var empty = true;
    var limit = 0;
      

      function countChecked() {                             
      var n = $("input:checked").length;                       
        if (empty) {
            limit = 3;
        }else {
            limit = 1;
        }                        
          if (n == limit)                                              
          {                                                        
             // $(':checkbox:not(:checked)').prop('disabled', true);
             $("#account").prop('disabled', true); 
             $("#creditRecovery").prop('disabled', true); 
          }                                                        
          else                                                     
          {                                                        
             $(':checkbox:not(:checked)').prop('disabled', false);
             $("#account").prop('disabled', false); 
             $("#creditRecovery").prop('disabled', false); 
          }                                                        
        }                                                                                              
        $(":checkbox").click(countChecked);  
      $("#creditRecovery").change(function(){
            var isCreditRecovery = Number($("#creditRecovery option:selected").val());
            if (isCreditRecovery) {
              $("#account").prop('disabled', false);
              // $("#account").toggleClass("filled-input");
              

            }else{
              $("#account").prop('disabled', true);
              // $("#account").toggleClass("filled-input");
              

            }

         });
      function getDetails(){
        var primarysale = $("#subproduct option:selected").val();
        
        $.ajax({
            type: "POST",
            dataType : "json",
            url: "<?php echo $action_url; ?>fetch_empty_details.php",
            data: { Id : primarysale } 
        }).done(function(data){
            
            var qty = Number(data.Qty);
            var pkg = Number(data.PackingSize);
            var Empty = Number(data.Is_Empty);                       
            $('#StartDate').val(data.OrderDate);
            $('#EndDate').val(data.ReceivingDate);
            $('#documentno').val(data.DocumentNo);
            $('#description').val(data.Description);
            $('#deliveryman').val(data.DeliveryManBuilty);
            $('#partyid').val(data.PartyId);
            
            $('#qty').val(qty);
            
            //$('#payable').val(data.Payable);
            $('#fpallet').val(qty/pkg);            
            var Bottles = qty*24;
            var Shells = qty;
            $('#fbottle').val(Bottles);
            $('#fshell').val(Shells);
            
            if (!Empty) {
                $( "#fbottle" ).prop( "disabled", true );
                $( "#fshell" ).prop( "disabled", true );
                empty = false;
                $(".emp").hide();                           

            }else{
                $( "#fbottle" ).prop( "disabled", false );
                $( "#fshell" ).prop( "disabled", false );
                empty = true;
                $(".emp").show();
            }

        });
      }
    
      
    $(document).ready(function () {
        iziToast.settings({
    timeout: 2500,
    resetOnHover: true,
    animateInside: true,
    transitionIn: 'bounceInUp',
    transitionOut: 'flipOutX'
});
        $('#InvDate').daterangepicker({
             singleDatePicker: true,
             showDropdowns: true,
             minYear: 2010,
             maxYear: 2028,
             locale: {
               format: 'YYYY-MM-DD'
             },        
             "cancelClass": "btn-secondary"
             });

        $("#subproduct").change(function(){
            $('input[type=checkbox]').each(function() 
{ 
        this.checked = false; 
});
        getDetails();
        
    });

      $("#myform").submit(function (e) {
        e.preventDefault();
        
              uri = "<?php echo $action_url; ?>add_primary_empty_sale.php";
           
        var formData = $("#myform").serialize();
        $.ajax({
          type: "POST",
          url : uri,
          data: formData + "&IsEmpty=" + empty,
          beforeSend: function() {
                $("#submit").attr('disabled', true);                
                $("#submit").html("<i class='fad fa-sync-alt fa-spin fa-lg'></i>").addClass("btn-success");
            },
          complete: function() {
                $("#submit").empty().html('Add <?=$Title?>');
            $("#submit").attr('disabled', false);
            },
          success: function (response) {
            if (response == "Success") {
              iziToast.success({
                                title: 'Succes',
                                message: '<?=$Title?> Added'
                            });
              //$('#myform').trigger("reset");
              chunk();             
              $("#subproduct option:selected").remove();
              getDetails();
              //$('#subproduct').children().remove();
             
            }else if(response == "Existed"){
              iziToast.info({
                        title: 'Existed',
                        message: 'Already Existed'
                    });
            }else if (response == "Invalid") {
              iziToast.error({
                        title: 'Invalid',
                        message: 'Something Went Wrong'
                    });
            }
            
          }
        });
      });
    });
    
    var otal = 0;
    function chunk(){

              // otal += Number($("#payable").val());
              // $("#GRND").text(otal.toFixed(2));
              var subproduct = $("#subproduct option:selected").text();
              var qty = $("#qty").val();              
              var bottle = $("#fbottle").val();
              var shell = $("#fshell").val();
              var pallet = $("#fpallet").val();
             
                $("#CusInvo").append("<tr><td class='w-70'>"+subproduct+"</td><td class='w-10'>"+qty+"</td><td class='w-10'>"+bottle+"</td><td class='w-10'>"+shell+"</td><td class='w-10'>"+pallet+"</td></tr>");
                           
              
    }
    
    
  </script>
  <script type="text/javascript">
  $(window).bind("load", function () {
    getDetails();
  });
</script>
</body>

</html>