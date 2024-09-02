<?php require_once 'config/config.php';
$Title = "Customer";
$title = "customer";
$Code = code($_SESSION['user_id'],'customer');
$outlettype = fetchBySess($_SESSION['user_id'],'outlettype');
$vpo = fetchBySess($_SESSION['user_id'],'vpo');
// $booker = fetchBySess($_SESSION['user_id'],'booker');
// $root = fetchBySess($_SESSION['user_id'],'root');
// $subroot = fetchBySess($_SESSION['user_id'],'subroot');
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
                                        <!-- <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Booker</label>
                                            <div class="col-sm-10">
                                                
                                                <select class="form-control" id="bookerid" name="BookerId">
                                                    <?php //for ($i=0; $i < count($booker); $i++) {                      ?>
                                                    <option value="<?=$booker[$i]->Id?>"><?=$booker[$i]->Name?></option>                                        <?php// } ?>            
                                                </select>
                                            </div>
                                        </div> -->
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Route</label>
                                            <div class="col-sm-10">
                                                
                                                <select class="form-control" id="rootid" name="RootId">
                                                            
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Day</label>
                                            <div class="col-sm-10">
                                                
                                                <select class="form-control select2 select2-multiple" multiple="multiple" id="subrootid" name="SubRootId[]">
                                                              
                                                </select>
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">DMS Code</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="Code" class="form-control" id="code" value="<?=$Code?>" placeholder="Code" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Voyage Code</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="VoyageCode" class="form-control" id="voyagecode" placeholder="VoyageCode Optional" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Outlet Name</label>
                                            <div class="col-sm-10">
                                                <input type="text"  name="Name" class="form-control" id="name" placeholder="Name">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Person Name</label>
                                            <div class="col-sm-10">
                                                <input type="text"  name="PersonName" class="form-control" id="personname" placeholder="Person Name">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Outlet Type</label>
                                            <div class="col-sm-10">
                                                
                                                <select class="form-control" name="OutletTypeId">
                                                    <?php for ($i=0; $i < count($outlettype); $i++) {
                                                         ?>
                                                    <option value="<?=$outlettype[$i]->Id?>"><?=$outlettype[$i]->Name?></option>                                        <?php } ?>            
                                                </select>
                                            </div>
                                        </div>                                        

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">VPO</label>
                                            <div class="col-sm-10">
                                                
                                                <select class="form-control" name="VpoId">
                                                    <?php for ($i=0; $i < count($vpo); $i++) {
                                                         ?>
                                                    <option value="<?=$vpo[$i]->Id?>"><?=$vpo[$i]->Name?></option>                                        <?php } ?>            
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Mobile</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="Mobile" class="form-control" id="mobile" placeholder="Mobile">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
                                            <div class="col-sm-10">
                                                <input type="text"  name="Address" class="form-control" id="address" placeholder="Address">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Credit Limit</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="CreditLimit" class="form-control" id="creditlimit" placeholder="CreditLimit">
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
			<!-- Modal forms-->
                                    <div class="modal fade" id="exampleModalForms" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Cooler Assign</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="assignform">
                                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Customer</label>
                                            <div class="col-sm-10">
                                                
                                                <select class="form-control" id="customerjson" name="CustomerId">
                                                                
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Cooler</label>
                                            <div class="col-sm-10">
                                                
                                                <select class="form-control" id="coolerjson" name="CoolerId">
                                                               
                                                </select>
                                            </div>
                                        </div>
                                                        
                                                        <button type="submit" id="submitcooler" class="btn btn-gradient-info">Assign</button> 
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
$(document).ajaxStop(function() {
   $("#sub").hide();
});
    function customers(){            
    $.ajax({          

          dataType : "json",
          url : "<?php echo $action_url; ?>fetch_customer.php",          
          success: function (response) {            
             
            var list = '';
                $.each(response, function(key, value){
                    list += '<option value=' + value.Id + '>' + value.Name + '</option>';
                });
                $("#customerjson").html(list); 
          }

        });
    }
    function coolers(){            
    $.ajax({          
          url : "<?php echo $action_url; ?>fetch_cooler.php",          
          success: function (response) {            
            $('#coolerjson').html(response);    
          }
        });
    }
    function start(){
// var bookerid = $("#bookerid option:selected").val();
             $.ajax({
            type: "POST",
            dataType : "json",
            url: "<?php echo $action_url; ?>fetch_root.php",
            success: function(data){
              // if (data.length === 0) {                
              //   $("#subroute").empty();
              //   return;
              // }
            var routelist = '';
                $.each(data, function(key, value){
                    routelist += '<option value=' + value.Id + '>' + value.Name + '</option>';
                });
                $("#rootid").html(routelist);
                getday();
        // call next ajax function
              
          } 
            });
 }
 function getday(){
var rootid = $("#rootid option:selected").val();
             $.ajax({
            type: "POST",
            dataType : "json",
            url: "<?php echo $action_url; ?>fetch_subroot.php",
            data: { RootId : rootid },
            success: function(data){
              if (data.length === 0) {                
                $("#subrootid").empty();
                return;
              }
            var subroutelist = '';
                $.each(data, function(key, value){
                    subroutelist += '<option value=' + value.Id + '>' + value.Name + '</option>';
                });
                $("#subrootid").html(subroutelist);

        // call next ajax function
              
          } 
            });
 }
    $(document).ready(function () {
        iziToast.settings({
    timeout: 2500,
    resetOnHover: true,
    animateInside: true,
    transitionIn: 'bounceInUp',
    transitionOut: 'flipOutX'
});
      $("#assignform").submit(function (e) {
        e.preventDefault();
               
        var formData = $("#assignform").serialize();
        $.ajax({
          type: "POST",
          url : "<?php echo $action_url; ?>add_coolerdistribution.php",
          data: formData,
          beforeSend: function() {
                $('#submitcooler').attr('disabled', true);                
                $("#submitcooler").html("<i id='sub' class='fad fa-sync-alt fa-spin fa-lg'></i>").addClass("btn-success");
            },
          complete: function() {
                $('#submitcooler').empty().addClass('btn btn-gradient-info').html('Assigned');
            $('#submitcooler').attr('disabled', false);
            },
          success: function (response) {
            if (response == "Success") {
              iziToast.success({
                                title: 'Succes',
                                message: 'Cooler Assigned'
                            });
              
              coolers();
              var data = $("#code").val();
             
              $("#code").val(Number(data)+1);
            }else if(response == "Existed"){
              iziToast.info({
                        title: 'Existed',
                        message: 'Already Assigned'
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
              customers();
              coolers();
              $('#exampleModalForms').modal('show');
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

      $("#bookerid").change(function(){

              start();
             
         });
      $("#rootid").change(function(){

              getday();
             
         });

    });
  </script>
  <script type="text/javascript">
  $(window).bind("load", function () {
    start();
  });
</script>
</body>

</html>