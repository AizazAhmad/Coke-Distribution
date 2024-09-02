<?php require_once 'config/config.php';
$Title = "SecurityDeposit";
$title = "securitydeposit";
// $party = fetchBySess($_SESSION['user_id'],'party');

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
                    
            
                            <h5 class="hk-sec-title">Add Bank Deposit</h5>
                            
                            <div class="row">
                                <div class="col-sm">
                                    <form id="myform">
                                     <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
                                        <div class="col-sm-10">
                                           <input class="form-control" id="Date" type="text" name="Date"/>
                                        </div>
                                     </div>
                                        <!-- <div class="form-group row">
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
                                         -->
                                        
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Deposit Amount</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="Credit" class="form-control" id="credit" placeholder="Deposit Amount">
                                            </div>
                                        </div>                                        
                                        
                                        <div class="form-group row mb-0">
                                            <div class="col-sm-6">
                                                <button type="submit" id="submit" class="btn btn-gradient-info">Deposit</button> 
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
   <script src="<?=$base_url?>vendors/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
      <!-- Daterangepicker JavaScript -->
      <script src="<?=$base_url?>vendors/moment/min/moment.min.js"></script>
      <script src="<?=$base_url?>vendors/daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        iziToast.settings({
    timeout: 2500,
    resetOnHover: true,
    animateInside: true,
    transitionIn: 'bounceInUp',
    transitionOut: 'flipOutX'
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
