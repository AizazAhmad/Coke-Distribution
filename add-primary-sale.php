<?php require_once 'config/config.php';
$Title = "Primary Sales";
$title = "primarysale";
$party = fetchBySess($_SESSION['user_id'],'party');
$accounts = fetchBySess($_SESSION['user_id'],'accounts');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add <?=$Title?></title>
    <?php require_once $include_path.'head.php'; ?>
    <style type="text/css">
          
/*.container {
    max-width: 1240px;
} */
      </style>
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
                    
                            <div class="row">
                              <div class="col">
                                <h5 class="hk-sec-title">Add <?=$Title?></h5>
                              </div>
                              <div class="col">
                                <a class="btn btn-gradient-info float-right" href="add-empty-return.php">Return Empty</a>
                              </div>
                              
                            </div>
                            
                            
                            <div class="row">
                                <div class="col-sm">
                                    <form id="myform">
                                  <div class="form-group row">
                                    
                                    <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Order Date</label>
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Delivery Date</label>
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Invoice #</label>
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">DeliveryMan/Builty</label>
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                                   
                                 </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-2">
                                       <input class="form-control" id="StartDate" type="text" name="OrderDate" />
                                    </div>
                                    <div class="col-sm-2">
                                       <input class="form-control" id="EndDate" type="text" name="ReceivingDate" />
                                    </div>
                                    <div class="col-sm-2">
                                       <input type="text" name="DocumentNo" class="form-control" id="docno" placeholder="Invoice #" step="0.01">
                                    </div>
                                    <div class="col-sm-2">
                                       <input type="text" name="DeliveryMan" class="form-control" id="deliveryman" placeholder="Delivery Man">
                                    </div>
                                    <div class="col-sm-2">
                                       <input type="text" name="Description" class="form-control" id="description" placeholder="Description">
                                    </div>
                                 </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Party</label>
                                            <div class="col-sm-10">
                                                
                                                <select class="form-control" id="partyid" name="PartyId">
                                                    <?php for ($i=0; $i < count($party); $i++) {
                                                         ?>
                                                    <option value="<?=$party[$i]->Id?>"><?=$party[$i]->Code." ".$party[$i]->Name?></option>                                        <?php } ?>            
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Sub Product</label>
                                            <div class="col-sm-10">
                                                
                                                <select class="form-control" id="subproduct" name="SubProductId">
                                                                
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Qty</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="Qty" class="form-control" id="qty" placeholder="Qty">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Choose Account</label>
                                            <div class="col-sm-10">
                                                
                                                <select class="form-control" id="accountid" name="AccountId">
                                                    <?php for ($i=0; $i < count($accounts); $i++) {
                                                         ?>
                                                    <option value="<?=$accounts[$i]->Id?>"><?=$accounts[$i]->Name." ".$accounts[$i]->Number." [Balance: ".$accounts[$i]->Balance."]"?></option>                                        <?php } ?>            
                                                </select>
                                            </div>
                                        </div>
                                        
                                 <div class="form-group row">
                                    
                                    <label for="inputEmail3" class="col-sm col-form-label">Scheme</label>
                                    <label for="inputEmail3" class="col-sm col-form-label">Self Lifting</label>
                                    <label for="inputEmail3" class="col-sm col-form-label">Cost</label>
                                    <label for="inputEmail3" class="col-sm col-form-label">Sale</label>
                                    <label for="inputEmail3" class="col-sm col-form-label">AdvanceTax</label>
                                    <label for="inputEmail3" class="col-sm col-form-label">DistCom</label>
                                    <label for="inputEmail3" class="col-sm col-form-label">Payable</label>
                                   
                                 </div>
                                 <div class="form-group row">
                                    <div class="col-sm">
                                       <input type="number" name="Scheme" class="form-control" id="scheme" step="0.01" placeholder="Scheme" readonly>
                                    </div>
                                    <div class="col-sm">
                                       <input type="number" name="SelfLiftingRate" class="form-control" id="selfliftingrate" step="0.01" placeholder="SelfLiftingRate" readonly>
                                    </div>
                                    <div class="col-sm">
                                       <input type="number" name="Cost" class="form-control" id="cost" step="0.01" placeholder="Cost" readonly>
                                    </div>
                                    <div class="col-sm">
                                       <input type="number" name="Sale" class="form-control" id="sale_price" placeholder="Sale Price" step="0.01" readonly>
                                    </div>
                                    <div class="col-sm">
                                       <input type="number" name="AdvanceTaxAmount" class="form-control" id="advancetaxamount" step="0.0001" placeholder="AdvanceTaxAmount" readonly>
                                    </div>
                                    <div class="col-sm">
                                       <input type="number" name="DistributorCommission" class="form-control" id="distributorcommission" placeholder="Distributor Commission" step="0.01" readonly>
                                    </div>
                                    <div class="col-sm">
                                       <input type="number" name="Payable" class="form-control" id="payable" step="0.01" placeholder="Payable" readonly>
                                    </div>
                                  </div>
                                      
                                    <input type="hidden" class="form-control" id="costt" step="0.01" placeholder="Costt">
                                    <input type="hidden" class="form-control" id="distributorcommissionn" placeholder="Distributor Commission" step="0.01">                                      
                                    <input type="hidden" class="form-control" id="sale_pricee" placeholder="Sale Price" step="0.01">                                                                               
                                    <input type="hidden" class="form-control" id="advancetaxamountt" step="0.0001" placeholder="AdvanceTaxAmount">

                                        
                                        <div class="form-group row mb-0">
                                            <div class="col-sm-12">
                                                <button type="submit" id="submit" class="btn btn-gradient-info btn-block">Submit <?=$Title?></button> 
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
                                                                    <th class="text-dark text-uppercase" scope="row">Name</th>
                                                                    <th class="text-dark text-uppercase" scope="row">Qty</th>
                                                                    <th class="text-dark text-uppercase" scope="row">Sale</th>                                 
                                                                    <th class="text-dark font-18" scope="row">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="CusInvo">
                                                                
                                                                
                                                            </tbody>
                                                            <tfoot>
                                                                <tr class="bg-light">
                                                                    <th class="text-dark text-uppercase" scope="row">Name</th>
                                                                    <th class="text-dark text-uppercase" scope="row">Qty</th>
                                                                    <th class="text-dark text-uppercase" scope="row">Sale</th>
                                                                    <th class="text-dark font-18" scope="row" id="GRND">Total</th>
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
      <script src="<?=$base_url?>dist/izi-toast/js/iziToast.min.js"></script>
      <!-- Bootstrap Tagsinput JavaScript -->
      <script src="<?=$base_url?>vendors/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
      <!-- Bootstrap Input spinner JavaScript -->
      <script src="<?=$base_url?>vendors/bootstrap-input-spinner/src/bootstrap-input-spinner.js"></script>
      <script src="<?=$base_url?>dist/js/inputspinner-data.js"></script>
      <!-- Pickr JavaScript -->
      <script src="<?=$base_url?>vendors/pickr-widget/dist/pickr.min.js"></script>
      <script src="<?=$base_url?>dist/js/pickr-data.js"></script>
      <!-- Select2 JavaScript -->
      <script src="<?=$base_url?>vendors/select2/dist/js/select2.full.min.js"></script>
      <script src="<?=$base_url?>dist/js/select2-data.js"></script>
      <!-- Jasny-bootstrap  JavaScript -->
      <script src="<?=$base_url?>vendors/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
      <!-- Daterangepicker JavaScript -->
      <script src="<?=$base_url?>vendors/moment/min/moment.min.js"></script>
      <script src="<?=$base_url?>vendors/daterangepicker/daterangepicker.js"></script>
            <!-- /Footer -->
        </div>
        <!-- /Main Content -->

    </div>
    <!-- /HK Wrapper -->

   
   
   <!-- jQuery -->
     <?php require_once $include_path.'foot.php'; ?>
    <script type="text/javascript">
      //$(".emp").hide();
      
      function clear(){
        $("#cost").val("");
        $("#distributorcommission").val("");
        $("#sale_price").val(""); 
        $("#advancetaxamount").val("");
        $("#qty").val("");   
        $("#payable").val("");   
        $("#scheme").val("");   
        $("#selfliftingrate").val("");   
        
      }
      var slr = 0;
      var sch = 0;
      function getDetails(){
        var subproductid = $("#subproduct option:selected").val();
        
        $.ajax({
            type: "POST",
            dataType : "json",
            url: "<?php echo $action_url; ?>fetch_sub_product_details.php",
            data: { SubProductId : subproductid } 
        }).done(function(data){
            clear();
            $('#costt').val(data.Cost);
            $('#distributorcommissionn').val(data.DistributorCommission);
            $('#sale_pricee').val(data.Sale);            
            $('#advancetaxamountt').val(data.AdvanceTaxAmount);
            slr = data.SelfLiftingRate;
            sch = data.Scheme;
            //$('#packingsizename').val(data.PackageSizeName);            
            //$('#size').val(data.PackingSize);
            

            

        });
      }
      function getsubproducts(){
        var PartyId = $("#partyid option:selected").val();
        
        $.ajax({
            type: "POST",
            url: "<?php echo $action_url; ?>fetch_partyproduct.php",
            data: { PartyId : PartyId } 
        }).done(function(data){
            $("#subproduct").html(data);
            getDetails();
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
        

        $("#partyid").change(function(){
        getsubproducts();
    });

        $('#StartDate').daterangepicker({
             singleDatePicker: true,
             showDropdowns: true,
             minYear: 2010,
             maxYear: 2028,
             locale: {
               format: 'YYYY-MM-DD'
             },        
             "cancelClass": "btn-secondary"
             });
        $('#EndDate').daterangepicker({
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
        getDetails();
        
        


    });
        $("#qty").keyup(function () {

            var qty = $(this).val();
            var cost = Number($("#costt").val());
            var distributorcommission = Number($("#distributorcommissionn").val());
            var sale_price = Number($("#sale_pricee").val());
            var advancetaxrate = Number($("#advancetaxratee").val());
            var advancetaxamount = Number($("#advancetaxamountt").val());
            
            var cost = qty*cost;
           
            $("#cost").val(cost.toFixed(2));
            var distributorcommission = qty*distributorcommission
            $("#distributorcommission").val(distributorcommission.toFixed(2));
            $("#sale_price").val(qty*sale_price); 
            $("#advancetaxamount").val(qty*advancetaxamount);
            $("#selfliftingrate").val(qty*slr);
            $("#scheme").val(qty*sch);
            
            var TS = $("#sale_price").val();
            var TAT = $("#advancetaxamount").val();
            var TDC = $("#distributorcommission").val();
            var res = Number(TS) + Number(TAT);
            var ded = (qty*slr) + (qty*sch) + Number(TDC);
            var result = res - ded;
            $("#payable").val(result.toFixed(2));
            
            
        });
        
      $("#myform").submit(function (e) {
        e.preventDefault();
       
        var formData = $("#myform").serialize();
        $.ajax({
          type: "POST",
          url : "<?php echo $action_url; ?>add_<?=$title?>.php",
          data: formData,
          beforeSend: function() {
                $("#submit").attr('disabled', true);                
                $("#submit").html("<i class='fad fa-sync-alt fa-spin fa-lg'></i>").addClass("btn-success");
            },
          complete: function() {
                $("#submit").empty().html('Submit <?=$Title?>');
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
              clear();
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

              otal += Number($("#payable").val());
              $("#GRND").text(otal.toFixed(2));
              var subproduct = $("#subproduct option:selected").text();
              var qty = $("#qty").val();
              var sale_price = Number($("#sale_pricee").val());
              var payable = Number($("#payable").val());
              $("#CusInvo").append("<tr><td class='w-70'>"+subproduct+"</td><td class='w-10'>"+qty+"</td><td class='w-10'>"+sale_price+"</td><td class='w-10'>"+payable+"</td></tr>");             
              
    }
  </script>
  <script type="text/javascript">
  $(window).bind("load", function () {
    getsubproducts();
  });
</script>
</body>

</html>