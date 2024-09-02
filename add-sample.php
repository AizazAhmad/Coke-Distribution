<?php require_once 'config/config.php';
$Title = "Sample";

//$rows = fetchRecord($row[0]->Id,'packagesize');




$qr = "SELECT DISTINCT DocumentNo FROM primarysalelog WHERE UserId = {$_SESSION['user_id']}";
$resu= $db->query($qr);

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
                
            
                            <h5 class="hk-sec-title">Add Sample</h5>
                            
                            <div class="row">
                                <div class="col-sm">
                                    <form id="myform">
                                    <input type="hidden" name="PartyId" id="partyid">
                                  
                                    <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Sub Product</label>
                                            <div class="col-sm-10">
                                                
                                                <select class="form-control select2" id="subproduct" name="SubProductId">                                                
                                                     
                                                </select>
                                            </div>
                                    </div>
                                    
                                    
                                
                                 <div class="form-group row">
                                    
                                    
                                    <div class="col-sm">
                                       <input type="text" name="Qty" class="form-control" id="qty" placeholder="Qty">  
                                    </div>
                                   <div class="col-sm">
                                       <input type="text" name="Cost" class="form-control" id="cost" placeholder="Cost" value="cost" readonly>  
                                    </div>
                                                                       
                                   
                                 </div>
                               
                                  <div class="form-group row">
                                    <!-- empty -->
                                    <label for="inputEmail3 emp" class="col-sm col-form-label emp">Bottles</label>
                                    <label for="inputEmail3 emp" class="col-sm col-form-label emp">Shells</label>
                                   <!-- empty -->
                                    <label for="inputEmail3" class="col-sm col-form-label">Pallets</label>
                                    
                                 </div>
                                  <div class="form-group row">
                                    <!-- empty -->
                                    
                                    <div class="col-sm emp">
                                       <input type="number" name="FBottles" class="form-control empt" id="fbottle" placeholder="Bottles" readonly>
                                    </div>
                                    <div class="col-sm emp">
                                       <input type="number" name="FShell" class="form-control empt" id="fshell" placeholder="Shells" readonly>
                                    </div>
                                    <input type="hidden" class="empt" name="IsEmpty" value="1">
                                   <!-- empty -->

                                    <div class="col-sm">
                                       <input type="number" name="FPallet" class="form-control" id="fpallet" placeholder="Pallets" readonly>
                                       
                                    </div>
                                    <div class="col-sm">
                                      
                                       <button type="button" id="onc" class="btn"><i class="fad fa-ban"></i></button>
                                   
                                    </div>
                                    <input type="hidden" id="package"  value="packagesize">                                    
                                    
                                  </div>
                                  
                                 <!-- <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label emp">Bottles</label>
                                     <div class="col-sm-1 emp">
                                        <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="BER" value="BER" id="BER">
                                                    <label class="custom-control-label" for="BER"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-1 emp">
                                        <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="BPC" value="BPC" id="BPC">
                                                    <label class="custom-control-label" for="BPC"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-1 emp">
                                        <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="BPL" value="BPL" id="BPL">
                                                    <label class="custom-control-label" for="BPL"></label>
                                        </div>
                                    </div>
                                 </div> -->
                                 <!-- <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label emp">Shells</label>
                                     <div class="col-sm-1">
                                        <div class="custom-control custom-checkbox emp">
                                                    <input type="checkbox" class="custom-control-input" name="SER" value="SER" id="SER">
                                                    <label class="custom-control-label" for="SER"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-1 emp">
                                        <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="SPC" value="SPC" id="SPC">
                                                    <label class="custom-control-label" for="SPC"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-1 emp">
                                        <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="SPL" value="SPL" id="SPL">
                                                    <label class="custom-control-label" for="SPL"></label>
                                        </div>
                                    </div>
                                 </div> -->
                                 <!-- <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Pallets</label>
                                     <div class="col-sm-1">
                                        <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="PER" value="PER" id="PER">
                                                    <label class="custom-control-label" for="PER"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="PPC" value="PPC" id="PPC">
                                                    <label class="custom-control-label" for="PPC"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="PPL" value="PPL" id="PPL">
                                                    <label class="custom-control-label" for="PPL"></label>
                                        </div>
                                    </div>
                                 </div> -->
                                        
                                                                                                                      
                                      
                                        <div class="form-group row mb-0">
                                            <div class="col-sm-12">
                                                <button type="submit" id="submit" class="btn btn-gradient-info btn-block">Add <?=$Title?></button> 
                                            </div>
                                            
                                        </div>
                                        
                                    </form>
                                    
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
   

     $('#subproduct').change( function(){

      getDetails();
  
});
    // var limit = 0;
      


      // function countChecked() {                             
      // var n = $("input:checked").length;                       
      //   if (empty) {
      //       limit = 3;
      //   }else {
      //       limit = 1;
      //   }                        
      //     if (n == limit)                                              
      //     {                                                        
      //        $(':checkbox:not(:checked)').prop('disabled', true);  
      //     }                                                        
      //     else                                                     
      //     {                                                        
      //        $(':checkbox:not(:checked)').prop('disabled', false); 
      //     }                                                        
      //   }                                                                                              
      //   $(":checkbox").click(countChecked);  

      // function getDetails(){
      //   var primarysale = $("#subproduct option:selected").val();
        
      //   $.ajax({
      //       type: "POST",
      //       dataType : "json",
      //       url: "<?php echo $action_url; ?>fetch_subproduct_details.php",
      //       data: { Id : primarysale } 
      //   }).done(function(data){
            
      //       var qty = Number(data.Qty);
      //       var pkg = Number(data.PackingSize);
      //       var Empty = Number(data.Is_Empty);                       
      //       $('#StartDate').val(data.OrderDate);
      //       $('#EndDate').val(data.ReceivingDate);
      //       $('#documentno').val(data.DocumentNo);
      //       $('#description').val(data.Description);
      //       $('#deliveryman').val(data.DeliveryManBuilty);
      //       $('#partyid').val(data.PartyId);
            
      //       $('#qty').val(qty);
            
      //       //$('#payable').val(data.Payable);
      //       $('#fpallet').val(qty/pkg);            
      //       var Bottles = qty*24;
      //       var Shells = qty;
      //       $('#fbottle').val(Bottles);
      //       $('#fshell').val(Shells);
            
      //       if (!Empty) {
      //           $( "#fbottle" ).prop( "disabled", true );
      //           $( "#fshell" ).prop( "disabled", true );
      //           empty = false;
      //           $(".emp").hide();                           

      //       }else{
      //           $( "#fbottle" ).prop( "disabled", false );
      //           $( "#fshell" ).prop( "disabled", false );
      //           empty = true;
      //           $(".emp").show();
      //       }

      //   });
      // }
      var empty = 0;
      function getDetails(){
        var subproductid = $("#subproduct option:selected").val();
        
        $.ajax({
            type: "POST",
            dataType : "json",
            url: "<?php echo $action_url; ?>fetch_sub_product_details.php",
            data: { SubProductId : subproductid } 
        }).done(function(data){
            console.log(data.Is_Empty);
            if (data.Is_Empty == "1") {
              $('.emp').show();
              $('.empt').prop('disabled', false);
              empty = 1;
            }
            if (data.Is_Empty == "0") {

              $('.emp').hide();
              $('.empt').prop('disabled', true);
              empty = 0;
            }
             $('#cost').val(data.Cost);
            // $('#distributorcommissionn').val(data.DistributorCommission);
            // $('#sale_pricee').val(data.Sale);            
            // $('#advancetaxamountt').val(data.AdvanceTaxAmount);
            
            // $('#packingsizename').val(data.PackageSizeName);            
            $('#package').val(data.PackingSize);
            

            

        });
      }
    function getsubproducts(){
        
        $.ajax({
            type: "POST",
            dataType : "json",
            url: "<?php echo $action_url; ?>fetch_sub_product.php"
        }).done(function(data){

            var subproduct = '';
                $.each(data, function(key, value){

                    subproduct += '<option value=' + value.Id + '>' + value.Name + '</option>';
                });
                $("#subproduct").html(subproduct);
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
        $("#onc").click(function(){
            $("#onc").toggleClass("btn-success");
            $("#fpallet").toggleClass("filled-input");
            $("#fpallet").prop('disabled', function(i, v) { return !v; });

           });

        $("#qty").keyup(function () {
            var qty = $(this).val();
            if (empty) {
                $("#fbottle").val(qty*24);
                $("#fshell").val(qty);
            }
            
            var package = $("#package").val();
            $('#fpallet').val(qty/package);  
            var res = qty * cost;

            $("#total").val(res.toFixed(2));

            
        });

      $("#myform").submit(function (e) {
        e.preventDefault();
        
              uri = "<?php echo $action_url; ?>add_sample.php";
           
        var formData = $("#myform").serialize();
        $.ajax({
          type: "POST",
          url : uri,
          data: formData,
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
              window.setTimeout(function() {
                        window.location.href = '<?php echo $base_url; ?>list-stock.php';
                    }, 3000);
             
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
    

  </script>
  <script type="text/javascript">
  $(window).bind("load", function () {
    getsubproducts();
  });
</script>
</body>

</html>