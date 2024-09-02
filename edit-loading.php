<?php require_once 'config/config.php';

$Title = "Loading";
$title = "loading";
$query = "SELECT
  loadout.Id,
  loadout.Date,
  loadout.Qty,
  loadout.Price,
  loadout.Total,
  vehicle.Number as VehicleNumber,
  deliveryman.Code as DeliveryManCode,
  deliveryman.Name as DeliveryManName,
  sub_product.Code as SubProductCode,
  sub_product.Name as SubProductName,
  sub_product.Is_Empty as Empty
FROM loadout
  INNER JOIN vehicle
    ON loadout.VehicleId = vehicle.Id
  INNER JOIN deliveryman
    ON loadout.DeliveryManId = deliveryman.Id
  INNER JOIN sub_product
    ON loadout.SubProductId = sub_product.Id
   WHERE loadout.Id = {$_POST['id']} AND loadout.UserId = {$_SESSION['user_id']}";

$result = $db->query($query);
$row = $result->fetch_object();
// $row = fetchRecord($_POST['id'],$title);
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
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Delivery Man</label>
                                            <div class="col-sm-10">
                                                <label for="inputEmail3" class="col-form-label"><?php echo $row->DeliveryManCode." ".$row->DeliveryManName; ?></label>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">VehicleNumber</label>
                                            <div class="col-sm-10">
                                               
                                                <label for="inputEmail3" class="col-form-label"><?php echo $row->VehicleNumber; ?></label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Sub Product</label>
                                            <div class="col-sm-10">
                                                
                                                <label for="inputEmail3" class="col-form-label"><?php echo $row->SubProductName; ?></label>
                                            </div>
                                        </div>                                      
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Qty</label>
                                            <div class="col-sm-10">
                                                <input type="number"  name="Qty" class="form-control" id="qty" value="<?php echo $row->Qty; ?>" placeholder="Qty">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Price</label>
                                            <div class="col-sm-10">
                                                <input type="hidden" id="price" name="Price" value="<?php echo $row->Price; ?>">
                                                <input type="number" class="form-control"  value="<?php echo $row->Price; ?>" placeholder="Price" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Total Price</label>
                                            <div class="col-sm-10">
                                                <input type="number"  class="form-control" id="total" value="<?php echo $row->Total; ?>" step="0.01" placeholder="Total">
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
    $(document).ready(function () {
        iziToast.settings({
    timeout: 2500,
    resetOnHover: true,
    animateInside: true,
    transitionIn: 'bounceInUp',
    transitionOut: 'flipOutX'
});
        $("#qty").on("keyup",function(){
            var price = $("#price").val();
            var qty = $("#qty").val();
            var res = Number(qty) * Number(price);
            $("#total").val(res.toFixed(2));
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
                $('#submit').empty().addClass('btn btn-gradient-info').html('Update');
            $('#submit').attr('disabled', false);
            },
          success: function (response) {
            if (response == "Success") {
              iziToast.success({
                                title: 'Succes',
                                message: '<?=$Title?> Updated'
                            });
             window.setTimeout(function() {
                        window.location.href = '<?php echo $base_url; ?>list-<?=$title?>.php';
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
