<?php require_once 'config/config.php';
   
   
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Import Customer</title>
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
                    
            
                            <h5 class="hk-sec-title">Upload Customer CSV</h5>
                            
                            <div class="row">
                                <div class="col-sm">
                                    <form id="myform" enctype="multipart/form-data">             
                                        
                                        <div class="form-group">
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                                <div class="form-control text-truncate" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                                <span class="input-group-append">
                                                        <span class=" btn btn-primary btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span>
                                                <input type="file" id="file" name="file" accept=".csv">
                                                </span>
                                                <a href="#" class="btn btn-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                </span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row mb-0">
                                            <div class="col-sm-10">
                                                <button type="submit" id="submit" name="import" class="btn btn-gradient-info">Import CSV</button>
                                                
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
     
     <!-- Jasny-bootstrap  JavaScript -->
    <script src="<?=$base_url?>vendors/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
    <script type="text/javascript">
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
          
        $.ajax({
          type: "POST",
          url : "<?php echo $action_url; ?>Import_Customer.php",
          data: new FormData(this),
          contentType: false,
          cache: false,
          enctype: 'multipart/form-data',
          processData: false,
          beforeSend: function() {
                $('#submit').attr('disabled', true);                
                $("#submit").html("<i id='sub' class='fad fa-sync-alt fa-spin fa-lg'></i>").addClass("btn-success");
            },
          complete: function() {
                $('#submit').empty().addClass('btn btn-gradient-info').html('Import CSV');
            $('#submit').attr('disabled', false);
            },
          success: function (response) {
            if (response == "Success") {
              iziToast.success({
                                title: 'Succes',
                                message: 'Data Imported'
                            });
              
              $(".fileinput").fileinput("clear");
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