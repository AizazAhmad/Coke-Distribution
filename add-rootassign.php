<?php require_once 'config/config.php';
$Title = "RootAssign";
$title = "rootassign";
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
                    
            
                            <h5 class="hk-sec-title">Route Assign</h5>
                            
                            <div class="row">
                                <div class="col-sm">
                                    <form id="myform">

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Booker</label>
                                            <div class="col-sm-10">
                                               <select class="form-control" id="bookerid" name="BookerId" required>
                                                       
                                               </select>
                                            </div>
                                         </div>
                                        
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Route</label>
                                            <div class="col-sm-10">
                                               <select class="form-control" id="rootid" name="RootId" required>
                                                       
                                               </select>
                                            </div>
                                         </div>
                                        
                                        
                                        
                                        <div class="form-group row mb-0">
                                            <div class="col-sm-6">
                                                <button type="submit" id="submit" class="btn btn-gradient-info">Route Assign</button> 
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

function root(){
            $.ajax({
                 type: "POST",
                 dataType : "json",
                 url: "<?php echo $action_url; ?>fetch_root.php",
                 success: function(data){

                  var rootlist = '';
                  $.each(data, function(key, value){
                      rootlist += '<option value=' + value.Id + '>' + value.Name + '</option>';
                  });
            $("#rootid").html(rootlist);
        // call next ajax function
               

       }
             });
 }

 function booker(){
            $.ajax({
                 type: "POST",
                 dataType : "json",
                 url: "<?php echo $action_url; ?>fetch_booker.php",
                 success: function(data){

                  var bookerlist = '';
                  $.each(data, function(key, value){
                      bookerlist += '<option value=' + value.Id + '>' + value.Name + '</option>';
                  });
            $("#bookerid").html(bookerlist);
        // call next ajax function
               

       }
             });
 }

    $(document).ready(function () {
        
    root();
    booker();

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
          url : "<?php echo $action_url; ?>add_<?=$title?>.php",
          data: formData,
          beforeSend: function() {
                $('#submit').attr('disabled', true);                
                $("#submit").html("<i id='sub' class='fad fa-sync-alt fa-spin fa-lg'></i>").addClass("btn-success");
            },
          complete: function() {
                $('#submit').empty().addClass('btn btn-gradient-info').html('Route Assign');
            $('#submit').attr('disabled', false);
            },
          success: function (response) {
            if (response == "Success") {
              iziToast.success({
                                title: 'Succes',
                                message: 'Route Assigned'
                            });

              $("#bookerid option:selected").remove();
              $("#rootid option:selected").remove();
              
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
