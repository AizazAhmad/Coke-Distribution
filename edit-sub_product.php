<?php require_once 'config/config.php';
$Title = "Sub Product";
$title = "sub_product";

$row = fetchRecord($_POST['id'],'sub_product');
$party = fetchRecord($_SESSION['user_id'],'packagesize');
$query = "SELECT * FROM packagesize WHERE UserId = {$_SESSION['user_id']}";
    $result = $db->query($query);  

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
                <div class="hk-pg-header align-items-top">
                    <div>
                        <h2 class="hk-pg-title font-weight-600 mb-10">UPDATE <?=$Title?>!</h2>
                    </div>
                </div>
                <!-- /Title -->

                <!-- Row -->
                
                <div class="row">
                    <div class="col-xl-12">
                    <section class="hk-sec-wrapper">
                            
                            <div class="row">
                                <div class="col-sm">
                                    <form id="myform">
                                    
                                        <input type="hidden" name="Id" value="<?php echo $row->Id; ?>">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Package Size</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="PackageSizeId">
                                                 <?php while ($rows = $result->fetch_object()) {
                                                    
                                                         ?>
                                                    <option value="<?=$rows->Id?>" <?php if ($rows->Id == $row->PackageSizeId) {
                                                        echo "selected";
                                                    } ?>><?=$rows->Name?></option>
                                                <?php } ?> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text"  name="Name" class="form-control" id="name" value="<?=$row->Name?>" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Unit</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="Unit" class="form-control" id="unit" value="<?=$row->Unit?>" step="0.01" placeholder="Unit">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Sale Price</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="Sale" class="form-control" id="sale_price" placeholder="Sale Price" value="<?=$row->Sale?>" step="0.01">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Primary Scheme</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="Scheme" class="form-control" id="scheme" placeholder="Scheme" value="<?=$row->Scheme?>" step="0.01">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Self Lifting Rate</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="SelfLiftingRate" class="form-control" value="<?=$row->SelfLiftingRate?>" id="selfliftingrate" placeholder="Self Lifting Rate" step="0.01">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">DistributorCommission</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="DistributorCommission" class="form-control" id="distributorcommission" value="<?=$row->DistributorCommission?>" placeholder="Distributor Commission" step="0.01">
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
                                                <input type="number" name="Cost" class="form-control" value="<?=$row->Cost?>" id="cost" step="0.00001" placeholder="Cost">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row mb-0">
                                            <div class="col-sm-10">
                                                <button type="submit" id="submit" class="btn btn-gradient-info">Update</button>
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

   <?php require_once $include_path.'foot.php'; ?>
	<script type="text/javascript">
        function up(cost){
            var res = cost * (1/100);
            $("#companytax").val(res);

            var advancetax = $("#advancetax").val();
            var advancetaxamount = cost * (advancetax/100);
            $("#advancetaxamount").val(advancetaxamount);
        }
    $(document).ready(function () {
        iziToast.settings({
    timeout: 2500,
    resetOnHover: true,
    animateInside: true,
    transitionIn: 'bounceInUp',
    transitionOut: 'flipOutX'
});
        up($("#sale_price").val());
        
        $("#sale_price").keyup(function () {
            var cost = $(this).val();
            up(cost);
            
        });
        
        $("#advancetax").keyup(function () {
            var advancetax = $(this).val();
            var sale_price = $("#sale_price").val();
            var res = sale_price * (advancetax/100);
            $("#advancetaxamount").val(res);
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
          url : "<?php echo $action_url; ?>update_<?=$title?>.php",
          data: formData,
          beforeSend: function() {
                $('#submit').attr('disabled', true);                
                $("#submit").html("<i id='sub' class='fad fa-sync-alt fa-spin fa-lg'></i>").addClass("btn-success");
            },
          complete: function() {
                $('#submit').empty().addClass('btn btn-gradient-info').html('Updated');
            $('#submit').attr('disabled', false);
            },
          success: function (response) {
            if (response == "Success") {
              iziToast.success({
                                title: 'Succes',
                                message: '<?=$Title?> Updated'
                            });
             window.setTimeout(function() {
                        window.location.href = '<?php echo $base_url; ?>list-sub-product.php';
                    }, 3000);
              
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