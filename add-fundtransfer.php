<?php require_once 'config/config.php';
$Title = "FundTransfer";
$title = "fundtransfer";
$accounts = fetchBySess($_SESSION['user_id'],'accounts');
$ID = $_GET['id'];
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
                                        <input type="hidden" name="AccountId" value="<?=$ID?>">
                                        <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
                                            <div class="col-sm-10">
                                               <input class="form-control" id="date" type="text" name="Date" />
                                            </div>                                          
                                        </div>
                                       <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Accounts</label>
                                            <div class="col-sm-10">
                                                
                                                <select class="form-control" id="accountid" name="TAccountId">
                                                    <?php for ($i=0; $i < count($accounts); $i++) {
                                                        
                                                        if ($ID == $accounts[$i]->Id) {
                                                            continue;
                                                        }
                                                         ?>
                                                    <option value="<?=$accounts[$i]->Id?>"><?=$accounts[$i]->Name?></option>                                        <?php } ?>            
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                                            <div class="col-sm-10">
                                                <input type="text"  name="Description" class="form-control" id="description" placeholder="Description">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Fund</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="Amount" class="form-control" id="amount" placeholder="Amount">
                                            </div>
                                        </div>
                                                                              
                                        <div class="form-group row mb-0">
                                            <div class="col-sm-6">
                                                <button type="submit" id="submit" class="btn btn-gradient-info"><i id='sub' class='spinner-grow spinner-grow-sm mr-1'></i>Add <?=$Title?></button> 
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
        $("#sub").hide();
    $(document).ajaxStart(function() {
    $('#sub').show(); // show the gif image when ajax starts
});
    $('input[name="Date"]').daterangepicker({
             singleDatePicker: true,
             showDropdowns: true,
             minYear: 2010,
             maxYear: 2028,
             locale: {
               format: 'YYYY-MM-DD'
             },        
             "cancelClass": "btn-secondary"
             });
$(document).ajaxStop(function() {
   $("#sub").hide();
});
    $(document).ready(function () {
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
          url : "<?php echo $action_url; ?>add_fundtransfer.php",
          data: formData,
          beforeSend: function() {
                $('#submit').attr('disabled', true);                
                
            },
          complete: function() {
                
            $('#submit').attr('disabled', false);
            },
          success: function (response) {
            if (response == "Success") {
              iziToast.success({
                                title: 'Success',
                                message: 'Fund Transfered!'
                            });
              $('#myform').trigger("reset");
              
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
