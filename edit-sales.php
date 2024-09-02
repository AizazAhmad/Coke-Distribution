<?php require_once 'config/config.php';
$Title = "Sales";
$title = "sales";
$id = $_POST['id'];
$row = fetchRecord($_POST['id'],'secondarysale');
$customer = fetchRecord($row->CustomerId,'customer');
$sub_product = fetchRecord($row->SubProductId,'sub_product');

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
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Customer</label>
                                            <div class="col-sm-10">                                                
                                                <label for="inputEmail3" class="col-form-label"><?=$customer->Code." ".$customer->Name?></label>
                                            </div>
                                           
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Sub Product</label>
                                            <div class="col-sm-10">                                                
                                                <label for="inputEmail3" class="col-form-label"><?=$sub_product->Code." ".$sub_product->Name?>
                                                    
                                                </label>
                                            </div>
                                        </div>
                                        <input type="hidden" name="SubProductId" value="<?php echo $row->SubProductId; ?>">
                                        <input type="hidden" name="Id" value="<?php echo $row->Id; ?>">
                                        <input type="hidden" name="Price" value="<?php echo $sub_product->Sale+$sub_product->CompanyTax; ?>" id="Price">
                                        
                                        <div class="form-group row">
                                            <input type="hidden" name="PreviousQty" value="<?=$row->Qty?>">
                                            <label for="inputEmail3"  class="col-sm-2 col-form-label">Qty</label>
                                            <div class="col-sm-10">
                                                <input type="number" onInput="updatePrice(this.id);" value="<?=$row->Qty?>" name="Qty" class="form-control" id="qty<?=$id?>" placeholder="Qty">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">HTHDiscount</label>
                                            <div class="col-sm-10">
                                                <input type="number" value="<?=$row->HTHDiscount?>" name="HTHDiscount" class="form-control" onInput="updatePrice(this.id);" id="hthdiscount<?=$id?>" placeholder="HTHDiscount" step="0.01">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Promo</label>
                                            <div class="col-sm-10">
                                                <input type="number" value="<?=$row->Promo?>" name="Promo" class="form-control" onInput="updatePrice(this.id);" id="promo<?=$id?>" placeholder="Promo" step="0.01">
                                            </div>
                                        </div>                                    
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Extra Share</label>
                                            <div class="col-sm-10">
                                                <input type="number" value="<?=$row->ExtraShare?>" name="ExtraShare" class="form-control" onInput="updatePrice(this.id);" id="extrashare<?=$id?>" placeholder="Extra Share" step="0.01">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <input type="hidden" name="PreviousTotal" value="<?=$row->Total?>">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Total</label>
                                            <div class="col-sm-10">
                                                <input type="number" value="<?=$row->Total?>" name="Total" class="form-control" id="total<?=$id?>" placeholder="Total" step="0.01">
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
        updatePrice = function(id) {

    var id = id.replace(/\D/g,'');
    var qtyform = "#qty"+id;
    var hthd = "#hthdiscount"+id;
    var promo = "#promo"+id;
    var extra = "#extrashare"+id;

    var qty = $(qtyform).val(); 
    var hth = $(hthd).val(); 
    var pro = $(promo).val(); 
    var ext = $(extra).val();
    
    
   
    var tt = "#total"+id;
    //console.log("Qty: "+qty+" HTH: "+hth+" pro: "+pro+" extra: "+ext);
    var deduct = (Number(pro)*qty) + (Number(ext)*qty) + (Number(hth)*qty);
   
    var Price = $("#Price").val();
  
  var re = Price * qty ;
  var res = re - deduct; 
  $(tt).val(res.toFixed(2));
 
}
        iziToast.settings({
    timeout: 2500,
    resetOnHover: true,
    animateInside: true,
    transitionIn: 'bounceInUp',
    transitionOut: 'flipOutX'
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
            
          }
        });
      });
    });
  </script>

</body>

</html>