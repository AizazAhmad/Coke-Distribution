<?php require_once 'config/config.php';
$Title = "Empty Purchase";

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
                
            
                            <h5 class="hk-sec-title">Add Empty Purchase</h5>
                            
                            <div class="row">
                                <div class="col-sm">
                                    
                                <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-1 col-form-label">Account</label>
                                            <div class="col-sm-10">
                                                
                                                <select class="form-control" id="accountid" name="AccountId">
                                                    <?php for ($i=0; $i < count($accounts); $i++) {
                                                         ?>
                                                    <option value="<?=$accounts[$i]->Id?>"><?=$accounts[$i]->Name." ".$accounts[$i]->Number." [Balance: ".$accounts[$i]->Balance."]"?></option>                                        <?php } ?>            
                                                </select>
                                            </div>
                                        </div>
                              <form id="bmyform">
                                 <div class="form-group row">
                                                                
                                    <label for="inputEmail3" class="col-sm-1 col-form-label">Bottle</label>
                                    <div class="col-sm-2">
                                       <input class="form-control" type="number" placeholder="Rate" name="BottleRate" id="brate">
                                    </div>
                                    <div class="col-sm-2">
                                       <input class="form-control" type="number" placeholder="Qty" name="FBottles" id="bqty">
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 col-form-label" id="bt">00.00</label>
                                    <div class="col-sm-2">
                                        <button type="button" id="bsubmit" onclick="process('#bmyform','bottle_purchase.php','#bsubmit','Bottle')" class="btn btn-gradient-info">Add Bottle</button> 
                                    </div>
                                 </div>
                               </form>
                               <form id="smyform">
                                 <div class="form-group row">
                                   <label for="inputEmail3" class="col-sm-1 col-form-label" >Shell</label>
                                    <div class="col-sm-2">
                                       <input class="form-control" type="number" placeholder="Rate" name="ShellRate" id="srate">
                                    </div>
                                    <div class="col-sm-2">
                                       <input class="form-control" type="number" placeholder="Qty" name="FShell" id="sqty">
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 col-form-label" id="st">00.00</label>
                                    <div class="col-sm-2">
                                        <button type="button" id="ssubmit" onclick="process('#smyform','shell_purchase.php','#ssubmit','Shell')" class="btn btn-gradient-info">Add Shell</button> 
                                    </div>
                                 </div>
                               </form>
                               <form id="pmyform">
                               <div class="form-group row">
                                   <label for="inputEmail3" class="col-sm-1 col-form-label" >Pallet</label>
                                    <div class="col-sm-2">
                                       <input class="form-control" type="number" placeholder="Rate" name="PalletRate" id="prate">
                                    </div>
                                    <div class="col-sm-2">
                                       <input class="form-control" type="number" placeholder="Qty" name="FPallet" id="pqty">
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 col-form-label" id="pt">00.00</label>
                                    <div class="col-sm-2">
                                        <button type="button" id="psubmit" onclick="process('#pmyform','pallet_purchase.php','#psubmit','Pallet')" class="btn btn-gradient-info">Add Pallet</button> 
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
        
        $("#bqty").keyup(function () {
            var qty = $(this).val();            
            var rate = $("#brate").val();            
            $("#bt").text(qty*rate);
            
        });
        $("#sqty").keyup(function () {
            var qty = $(this).val();            
            var rate = $("#srate").val();            
            $("#st").text(qty*rate);
            
        });
        $("#pqty").keyup(function () {
            var qty = $(this).val();            
            var rate = $("#prate").val();            
            $("#pt").text(qty*rate);
            
        });

      
    });
    
function process(formid,url,btnid,btntitle){


        
        var formData = $(formid).serialize();
        AccId = $("#accountid option:selected").val();
        $.ajax({
          type: "POST",
          url : "<?php echo $action_url; ?>"+url,
          data: formData+ "&AccountId=" + AccId,
          beforeSend: function() {
                $(btnid).attr('disabled', true);                
                $(btnid).html("<i class='fad fa-sync-alt fa-spin fa-lg'></i>").addClass("btn-success");
            },
          complete: function() {
                $(btnid).empty().html('Add '+btntitle);
            $(btnid).attr('disabled', false);
            },
          success: function (response) {
            if (response == "Success") {
              iziToast.success({
                                title: 'Succes',
                                message: btntitle + ' Added'
                            });
             $(formid).trigger("reset");
             $("#bt").text("00.00");
             $("#st").text("00.00");
             $("#pt").text("00.00");
            }else if (response == "Invalid") {
              iziToast.error({
                        title: 'Invalid',
                        message: 'Something Went Wrong'
                    });
            }
            
          }
        });
     
}


  </script>
  
</body>

</html>