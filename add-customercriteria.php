<?php require_once 'config/config.php';
$Title = "Customer Criteria";
$title = "customercriteria";

$deliveryman = fetchBySess($_SESSION['user_id'],'deliveryman');
$sub_product = fetchBySess($_SESSION['user_id'],'sub_product');
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
                    
            
                            <h5 class="hk-sec-title">Add <?=$Title?></h5>
                            
                            <div class="row">
                                <div class="col-sm">
                                    <form id="myform">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Delivery Man</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="deliveryman" name="DeliveryManId">
                                                <?php for ($i=0; $i < count($deliveryman); $i++) {
                                                        
                                                        ?>
                                                            <option value="<?=$deliveryman[$i]->Id?>"><?php echo $deliveryman[$i]->Code." ".$deliveryman[$i]->Name; ?></option> 
                                                  <?php } ?>            
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Customer</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="response" name="CustomerId">
                                                          
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Sub Product</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="SubProductId">
                                                <?php for ($i=0; $i < count($sub_product); $i++) {
                                                        
                                                        ?>
                                                            <option value="<?=$sub_product[$i]->Id?>"><?php echo $sub_product[$i]->Code." ".$sub_product[$i]->Name; ?></option> 
                                                  <?php } ?>            
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">HTHDiscount</label>
                                            <div class="col-sm-10">
                                                <input type="number"  name="HTHDiscount" class="form-control" id="hthdiscount" placeholder="HTHDiscount">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">HTHShare</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="HTHShare" class="form-control" id="hthshare" placeholder="HTHShare">
                                            </div>
                                        </div>                                       
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">RGB Scheme</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="RGB" class="form-control" id="rgb" placeholder="RGB">
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
        $("#deliveryman").change(function(){
        var deliverymanid = $("#deliveryman option:selected").val();
        
        $.ajax({
            type: "POST",
            url: "<?php echo $action_url; ?>fetch_deliverymancustomer.php",
            data: { id : deliverymanid } 
        }).done(function(data){
            $("#response").html(data);
        });
    });
      $("#myform").submit(function (e) {
        e.preventDefault();
               
        var formData = $("#myform").serialize();
        $.ajax({
          type: "POST",
          url : "<?php echo $action_url; ?>add_<?=$title?>.php",
          data: formData,
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
              
              $('#myform').find('input').not('select').val('');
            }else if(response == "Existed"){
              iziToast.info({
                        title: 'Existed',
                        message: 'Customer Existed ON Sub Product'
                    });
            }else if (response == "Invalid") {
              iziToast.error({
                        title: 'Invalid',
                        message: 'Something Went Wrong'
                    });
            }
            
          },
          error: function(e) {
                iziToast.warning({
                        title: 'Request Error',
                        message: e.statusText
                    });
            }
        });
      });
    });
  </script>
  
</body>

</html>