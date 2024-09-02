<?php require_once 'config/config.php';
$Title = "Customer";
$title = "customer";
$row = fetchRecord($_POST['id'],'customer');
$vpo = fetchBySess($_SESSION['user_id'],'vpo');
$q = "SELECT * FROM customersubroot Where CustomerId = {$_POST['id']}";
$r = $db->query($q);
$ow = $r->fetch_object();
$root = fetchBySess($_SESSION['user_id'],'root');
$Qr = "SELECT DISTINCT
  subroot.Name
FROM subroot
  INNER JOIN customersubroot
    ON subroot.Id = customersubroot.SubRootId WHERE customersubroot.CustomerId = {$_POST['id']}";
$res = $db->query($Qr);
// $booker = fetchBySess($_SESSION['user_id'],'booker');
// if ($row->RootId == NULL) {
//     echo "Its Null";
// }
// else{
//     echo "OK";
// }
// exit();
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
                                    <fieldset>
                                        <input type="hidden" name="Id" value="<?php echo $row->Id; ?>">
                                        <!-- <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Booker</label>
                                            <div class="col-sm-10">
                                                
                                                <select class="form-control" id="bookerid" name="BookerId">
                                                    <?php //for ($i=0; $i < count($booker); $i++) {
                                                         ?>
                                                    <option value="<?=$booker[$i]->Id?>" <?php //if ($row->BookerId != null) {
                                                        //if ($booker[$i]->Id == $row->BookerId)
                                                       //echo "selected";
                                                    //} ?>><?=$booker[$i]->Name?></option>                                        <?php //} ?>            
                                                </select>
                                            </div>
                                        </div> -->
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Route</label>
                                            <div class="col-sm-10">
                                                
                                                <select class="form-control" id="rootid" name="RootId">
                                                           <?php for ($i=0; $i < count($root); $i++) {
                                                         ?>
                                                    <option value="<?=$root[$i]->Id?>" <?php if ($root[$i]->Id == $ow->RootId) {
                                                        echo "selected";
                                                    } ?>><?=$root[$i]->Name?></option>                                        <?php } ?>  
                                                </select>

                                            </div>
                                        </div>
                                        <!-- <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Day</label>
                                            <div class="col-sm-10">
                                                
                                                <select class="form-control" id="subrootid" name="SubRootId">
                                                              
                                                </select>
                                            </div>
                                        </div> -->
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Current Days</label>
                                            <div class="col-sm-10">
                                            <?php 
                                                while ( $subr = $res->fetch_object()) {                                                 
                                             ?>
                                             <label class="form-label btn btn-sm btn-success"><?=$subr->Name?></label>
                                         <?php } ?>
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
                                                <input type="number" name="Code" class="form-control" id="code" value="<?php echo $row->Code; ?>" placeholder="Code" Disabled>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Voyage Code</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="VoyageCode" class="form-control" id="voyagecode" value="<?php echo $row->VoyageCode; ?>" placeholder="VoyageCode Optional" >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Outlet Name</label>
                                            <div class="col-sm-10">
                                                <input type="text"  name="Name" class="form-control" id="name" value="<?php echo $row->Name; ?>" placeholder="name">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Person Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?php echo $row->PersonName; ?>" name="PersonName" class="form-control" id="personname" placeholder="Person Name">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">VPO</label>
                                            <div class="col-sm-10">
                                                
                                                <select class="form-control" name="VpoId">
                                                    <?php for ($i=0; $i < count($vpo); $i++) {
                                                         ?>
                                                    <option value="<?=$vpo[$i]->Id?>" <?php if ($vpo[$i]->Id == $row->VpoId) {
                                                        echo "selected";
                                                    } ?>><?=$vpo[$i]->Name?></option>                                        <?php } ?>            
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Mobile</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="Mobile" class="form-control" id="mobile" value="<?php echo $row->Mobile; ?>" placeholder="Mobile">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
                                            <div class="col-sm-10">
                                                <input type="text"  name="Address" class="form-control" id="address" value="<?php echo $row->Address; ?>" placeholder="Address">
                                            </div>
                                        </div>                                     
                                        
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Credit Limit</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="CreditLimit" class="form-control" id="creditlimit" value="<?php echo $row->CreditLimit; ?>" placeholder="CreditLimit">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row mb-0">
                                            <div class="col-sm-10">
                                                <button type="submit" id="submit" class="btn btn-gradient-info">Update</button>
                                            </div>
                                        </div>
                                    </fieldset>
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

 $(document).ajaxStart(function() {
    $( "#myform fieldset" ).prop("disabled", true);
});
$(document).ajaxStop(function() {
   $( "#myform fieldset" ).prop("disabled", false);
});
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
                    routelist += '<option value=' + value.Id + ' ';
                    
                                
                                    if (value.Id == 0) {
                                                                    routelist +=  'selected' 
                                                                }
                                
                    routelist +='>' + value.Name + '</option>';
                });
                // $("#rootid").html(routelist);
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
                    subroutelist += '<option value=' + value.Id + ' ';
                                if (value.Id == 0) {
                                                                    subroutelist +=  'selected' 
                                                                }
                    subroutelist +='>' + value.Name + '</option>';
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

      // $("#bookerid").change(function(){

      //         start();
             
      //    });
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