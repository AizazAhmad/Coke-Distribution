<?php require_once 'config/config.php';
$Title = "Sub Product";
$title = "sub_product";
$product = fetchBySess($_SESSION['user_id'],'product');
$party = fetchBySess($_SESSION['user_id'],'party');
$packagesize = fetchBySess($_SESSION['user_id'],'packagesize');
$Code = code($_SESSION['user_id'],'sub_product');
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
                    
            
                            <h5 class="hk-sec-title">Add <?=$Title?> <span class="small">(Define Bottle)</span></h5>
                            
                            <div class="row">
                                <div class="col-sm">
                                    <form id="myform">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Product</label>
                                            <div class="col-sm-10">
                                                
                                                <select class="form-control" id="products" name="ProductId">
                                                    <?php for ($i=0; $i < count($product); $i++) {
                                                         ?>
                                                    <option value="<?=$product[$i]->Id?>"><?=$product[$i]->Code." ".$product[$i]->Name?></option>                                        <?php } ?>            
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Supplier Party</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="PartyId">
                                                 <?php for ($i=0; $i < count($party); $i++) {
                                                         ?>
                                                    <option value="<?=$party[$i]->Id?>"><?=$party[$i]->Code." ".$party[$i]->Name?></option>
                                                <?php } ?> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Code</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="Code" class="form-control" id="code" value="<?=$Code?>" placeholder="Code" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Sub product Name</label>
                                            <div class="col-sm-10">
                                                <input type="text"  name="Name" class="form-control" id="name" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Package Size</label>
                                    <div class="col-sm-10">
                                       <select class="form-control" id="packagesizeid" name="PackageSizeId" required>
                                             <?php for ($i=0; $i < count($packagesize); $i++) {
                                                     ?>
                                                <option value="<?=$packagesize[$i]->Id?>"><?=$packagesize[$i]->Name?></option>
                                            <?php } ?>                                              
                                       </select>
                                    </div>
                                 </div>
                                     
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Unit Case</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="Unit" class="form-control" id="unit" step="0.01" placeholder="Unit">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Sale Price</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="Sale" class="form-control" id="sale_price" placeholder="Sale Price" step="0.01">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Primary Scheme</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="Scheme" class="form-control" id="scheme" placeholder="Scheme" step="0.01">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Self Lifting Rate</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="SelfLiftingRate" class="form-control" id="selfliftingrate" placeholder="Self Lifting Rate" step="0.01">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">DistributorCommission</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="DistributorCommission" class="form-control" id="distributorcommission" placeholder="Distributor Commission" step="0.01">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Advance Tax Rate</label>
                                            <div class="col-sm-4">
                                                <input type="number" name="AdvanceTaxRate" class="form-control" id="advancetax" step="0.01" placeholder="GST Rate" value="0.1">
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">AdvanceTaxAmount</label>
                                            <div class="col-sm-4">
                                                <input type="number" name="AdvanceTaxAmount" class="form-control" id="advancetaxamount" step="0.0001" placeholder="AdvanceTaxAmount">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Advance W.H.Tax</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="CompanyTax" class="form-control" id="companytax" placeholder="Company Tax" step="0.001">
                                            </div>
                                        </div>                                        
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Cost</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="Cost" class="form-control" id="cost" step="0.00001" placeholder="Cost">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Empty Return</label>
                                            
                                            <div class="col-sm-10">
                                           <select class="form-control" id="emptyon" name="IsEmpty">          <option value="0">No</option>               
                                                    <option value="1">Yes</option>                  
                                       </select>
                                    </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="col-sm-6">
                                                <button type="submit" id="submit" class="btn btn-gradient-info">Add <?=$Title?></button> 
                                                
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
             <?php require_once $include_path.'footer.php'; ?>
            <!-- /Footer -->
        </div>
        <!-- /Main Content -->

    </div>
    <!-- /HK Wrapper -->

   
   
   <!-- jQuery -->
     <?php require_once $include_path.'foot.php'; ?>
    <script type="text/javascript">
    $(document).ready(function () {
        iziToast.settings({
    timeout: 2500,
    resetOnHover: true,
    animateInside: true,
    transitionIn: 'bounceInUp',
    transitionOut: 'flipOutX'
});
//         var empty = 0;
//         $('.toggle').on('toggle', function(e, active) {
//             // if(!$('.toggle').data('toggles').active){

//             // }
//             // $(".toggle").trigger("click");
//             // $(this).trigger("click");
//             //$(this).toggles({on:true});
//   if (active) {
//     empty = 1;
//   } else {
//     empty = 0;
//   }
// });

        $("#products").change(function(){
        var productid = $("#products option:selected").val();
        
        $.ajax({
            type: "POST",
            url: "<?php echo $action_url; ?>fetch_unit.php",
            data: { id : productid } 
        }).done(function(data){
            $("#unit").val(data);
        });
    });

        $("#sale_price").keyup(function () {
            var cost = $(this).val();
            var res = cost * (1/100);
            $("#companytax").val(res.toFixed(3));

            var advancetax = $("#advancetax").val();
            var advancetaxamount = cost * (advancetax/100);
            $("#advancetaxamount").val(advancetaxamount.toFixed(4));

            
        });
        
        $("#advancetax").keyup(function () {
            var advancetax = $(this).val();
            var sale_price = $("#sale_price").val();
            var res = sale_price * (advancetax/100);
            $("#advancetaxamount").val(res.toFixed(4));
        });

        $("#distributorcommission").keyup(function () {
            var distributorcommission = $(this).val();            
            var selfliftingrate = Number($("#selfliftingrate").val());
            var scheme = Number($("#scheme").val());
            var sale_price = Number($("#sale_price").val());
            var advancetaxamount = Number($("#advancetaxamount").val());
            var ress = selfliftingrate + scheme;
            var res = sale_price + advancetaxamount;
            var result = res - distributorcommission;
            var rr = result - ress
            $("#cost").val(rr.toFixed(5));
        });
      $("#myform").submit(function (e) {
        e.preventDefault();
            
        var formData = $("#myform").serialize();
        $.ajax({
          type: "POST",
          url : "<?php echo $action_url; ?>add_<?=$title?>.php",
          data: formData ,
          beforeSend: function() {
                $('#submit').attr('disabled', true);                
                $("#submit").html("<i id='sub' class='fad fa-sync-alt fa-spin fa-lg'></i>").addClass("btn-success");
            },
          complete: function() {
                $('#submit').empty().addClass('btn btn-gradient-info').html('Add <?=$Title?>');
            $('#submit').attr('disabled', false);
            },
          success: function (response) {
            if (response == "Success") {
              iziToast.success({
                                title: 'Succes',
                                message: '<?=$Title?> Added'
                            });
              
              var data = $("#code").val();
              $('#myform').trigger("reset");
              $("#code").val(Number(data)+1);
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
  </script>
  
</body>

</html>