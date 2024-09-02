<?php require_once 'config/config.php';
   // $row = fetchRecord($_POST['id'],"deliveryman");
   $Title = "Customer Profile";
   $ProfileQuery = "SELECT
     customer.Id,
     customer.Date,
     customer.VoyageCode,
     customer.Code,
     customer.Name AS ShopName,
     customer.PersonName,
     customer.Mobile,
     customer.Address,
     customer.CreditLimit,
     customer.Status,
     vpo.Name AS Vpo,
     outlettype.Name AS Outlet
   FROM customer
     INNER JOIN outlettype
       ON customer.OutletTypeId = outlettype.Id
     INNER JOIN vpo
       ON customer.VpoId = vpo.Id WHERE customer.Id = {$_POST['id']} AND customer.UserId = {$_SESSION['user_id']}";
   
   $Result = $db->query($ProfileQuery);
   $rows = $Result->fetch_object();
   
   $SalesQuery = "SELECT
  sub_product.Date,
  sub_product.Name,
  secondarysale.Qty,
  secondarysale.Total
FROM secondarysale
  INNER JOIN sub_product
    ON secondarysale.SubProductId = sub_product.Id WHERE MONTH(secondarysale.Date) = MONTH(CURRENT_DATE())
AND YEAR(secondarysale.Date) = YEAR(CURRENT_DATE()) AND customerId = {$_POST['id']} AND secondarysale.UserId = {$_SESSION['user_id']}";
   
   $XpResult = $db->query($SalesQuery);
   
   
   
   $class = "text-success";
   if (!$rows->Status)
   $class = "text-dark";
   
   $Satitics = "SELECT  (                
                       SELECT (SUM(Debit) - SUM(Credit)) FROM customerledger WHERE CustomerId = {$_POST['id']} AND UserId = {$_SESSION['user_id']}
                       ) AS Credit,
                       (
                       SELECT SUM(Total) FROM secondarysale WHERE CustomerId = {$_POST['id']} AND UserId = {$_SESSION['user_id']}
                       ) AS Sales
               FROM    dual";
              
   $STResult = $db->query($Satitics);
   $strows = $STResult->fetch_object();
   $accounts = fetchBySess($_SESSION['user_id'],'accounts');
  $dquery = "SELECT * FROM deliveryman Where RoleId = 1";
    $dresult = $db->query($dquery);

    $crquery = "SELECT * FROM cashrecoverylog Where CustomerId = {$_POST['id']} order by Id DESC Limit 13";
    $crresult = $db->query($crquery);

    $clquery = "SELECT * FROM customerledger Where CustomerId = {$_POST['id']} order by Id DESC Limit 13";
    $clresult = $db->query($clquery);
    
   
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
            <div class="container-fluid">
               <!-- Row -->
               <div class="row">
                  <div class="col-xl-12 pa-0">
                     <div class="profile-cover-wrap overlay-wrap">
                        <div class="profile-cover-img" style="background-image:url('<?=$base_url?>dist/img/delivery.jpg')"></div>
                        <div class="bg-overlay bg-trans-dark-60"></div>
                        <div class="container profile-cover-content py-50">
                           <div class="hk-row">
                              <div class="col-lg-6">
                                 <div class="media align-items-center">
                                    <div class="media-img-wrap  d-flex">
                                       <div class="avatar">
                                          <img src="<?=$base_url?>dist/img/person.png" alt="user" class="avatar-img rounded-circle">
                                       </div>
                                    </div>
                                    <div class="media-body">
                                       <div class="text-white text-capitalize display-6 mb-5 font-weight-400"><?=$rows->ShopName?></div>
                                       <!-- <div class="font-14 text-white"><span class="mr-5"><span class="font-weight-500 pr-5">124</span><span class="mr-5">Followers</span></span><span><span class="font-weight-500 pr-5">45</span><span>Following</span></span></div> -->
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="bg-white shadow-bottom">
                        <div class="container">
                           <ul class="nav nav-light nav-tabs" role="tablist">
                              <li class="nav-item">
                                 <a href="#" class="d-flex h-60p align-items-center nav-link active">Profile</a>
                              </li>
                              <li class="nav-item">
                                 <a href="#" class="d-flex h-60p align-items-center nav-link" onclick="mod()">Recovery</a>
                              </li>
                              
                           </ul>
                           
                        </div>
                     </div>
                     <div class="tab-content mt-sm-60 mt-30">
                        <div class="tab-pane fade show active" role="tabpanel">
                           <div class="container">
                              <div class="hk-row">
                                 <div class="col-lg-6">
                                    <div class="card">
                                       <div class="card-header card-header-action">
                                          <h6>Sales</h6>
                                          <div class="d-flex align-items-center card-action-wrap">
                                             <a href="#" class="inline-block refresh mr-15">
                                             <i class="ion ion-md-arrow-down"></i>
                                             </a>
                                             <a href="#" class="inline-block full-screen mr-15">
                                             <i class="ion ion-md-expand"></i>
                                             </a>
                                             <a class="inline-block card-close" href="#" data-effect="fadeOut">
                                             <i class="ion ion-md-close"></i>
                                             </a>
                                          </div>
                                       </div>
                                       <div class="card-body pa-0">
                                          <div class="table-wrap">
                                             <div class="table-responsive">
                                                <table class="table table-sm mb-0">
                                                   <thead>
                                                      <tr>
                                                         <th>Date</th>
                                                         <th>SubProduct</th>
                                                         <th>Qty</th>
                                                         <th>Total</th>
                                                      </tr>
                                                   </thead>
                                                   <tbody>
                                                      <?php 
                                                          while ($xrows = $XpResult->fetch_object()) {
                                                           
                                                           ?>
                                                      <tr>
                                                            <td><?=$xrows->Date?></td>
                                                            <td><?=$xrows->Name?></td>
                                                            <td><?=$xrows->Qty?></td>
                                                            <td><?=$xrows->Total?></td>              
                                                      </tr>
                                                      <?php } ?>
                                                   </tbody>
                                                </table>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="card card-profile-feed">
                                       <div class="card-header card-header-action">
                                          <div class="media align-items-center">
                                             <div class="media-img-wrap d-flex mr-10">
                                                <div class="avatar avatar-sm">
                                                   <img src="<?=$base_url?>dist/img/deliveryman.png" alt="user" class="avatar-img rounded-circle">
                                                </div>
                                             </div>
                                             <div class="media-body">
                                                <div class="text-capitalize font-weight-500 text-dark"><?=$rows->PersonName?></div>
                                                <div class="font-13"><?=$rows->Outlet?></div>
                                             </div>
                                          </div>
                                          <!-- <div class="d-flex align-items-center card-action-wrap">
                                             <div class="inline-block dropdown">
                                               <a class="dropdown-toggle no-caret" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="ion ion-ios-settings"></i></a>
                                               <div class="dropdown-menu dropdown-menu-right">
                                                 <a class="dropdown-item" href="#">Action</a>
                                                 <a class="dropdown-item" href="#">Another action</a>
                                                 <a class="dropdown-item" href="#">Something else here</a>
                                                 <div class="dropdown-divider"></div>
                                                 <a class="dropdown-item" href="#">Separated link</a>
                                               </div>
                                             </div>
                                             </div> -->
                                       </div>
                                      
                                       <div class="row text-center">
                                          <!-- <div class="col-4 border-right pr-0">
                                             <div class="pa-15">
                                               <span class="d-block display-6 text-dark mb-5"><?=$strows->TotalCustomer?></span>
                                               <span class="d-block text-capitalize font-14">Customer</span>
                                             </div>
                                             </div> -->
                                          <div class="col-6 border-right px-0">
                                             <div class="pa-15">
                                                <span class="d-block display-6 text-dark mb-5"><?=round($strows->Sales,0)?></span>
                                                <span class="d-block text-capitalize font-14">Sales</span>
                                             </div>
                                          </div>
                                          <div class="col-6 pl-0">
                                             <div class="pa-15">
                                                <span class="d-block display-6 text-dark mb-5"><?=round($strows->Credit,0)?></span>
                                                <span class="d-block text-capitalize font-14">Credit</span>
                                             </div>
                                          </div>
                                       </div>
                                       <ul class="list-group list-group-flush">
  <li class="list-group-item"><span><i class="ion ion-md-calendar font-18 text-light-20 mr-10"></i><span>Join Date:</span></span><span class="ml-5 text-dark"><?php echo date_format(date_create($rows->Date),"F j, Y");?></span></li>
  <li class="list-group-item"><span><i class="ion ion-md-briefcase font-18 text-light-20 mr-10"></i><span>Code</span></span><span class="ml-5 text-dark"><?=$rows->Code?></span></li>
  <li class="list-group-item"><span><i class="ion ion-md-briefcase font-18 text-light-20 mr-10"></i><span>VoyageCode</span></span><span class="ml-5 text-dark"><?=$rows->VoyageCode?></span></li>
  <li class="list-group-item"><span><i class="ion ion-md-briefcase font-18 text-light-20 mr-10"></i><span>Credit Limit</span></span><span class="ml-5 text-dark"><?=$rows->CreditLimit?></span></li>
  <li class="list-group-item"><span><i class="ion ion-md-briefcase font-18 text-light-20 mr-10"></i><span>VPO</span></span><span class="ml-5 text-dark"><?=$rows->Vpo?></span></li>
  <li class="list-group-item"><span><i class="ion ion-md-home font-18 text-light-20 mr-10"></i><span>Mobile</span></span><span class="ml-5 text-dark"><?=$rows->Mobile?></span></li>
  <li class="list-group-item"><span><i class="ion ion-md-pin font-18 text-light-20 mr-10"></i><span>Status</span></span><span class="ml-5 <?=$class?>"><?php if ($rows->Status) echo "Active"; else echo "Inactive"; ?></span></li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                              <!-- Start -->
                              <div class="hk-row">
                                 <div class="col-lg-6">
                                    <div class="card">
                                       <div class="card-header card-header-action">
                                          <h6>Recovery</h6>
                                          <div class="d-flex align-items-center card-action-wrap">
                                             <a href="#" class="inline-block refresh mr-15">
                                             <i class="ion ion-md-arrow-down"></i>
                                             </a>
                                             <a href="#" class="inline-block full-screen mr-15">
                                             <i class="ion ion-md-expand"></i>
                                             </a>
                                             <a class="inline-block card-close" href="#" data-effect="fadeOut">
                                             <i class="ion ion-md-close"></i>
                                             </a>
                                          </div>
                                       </div>
                                       <div class="card-body pa-0">
                                          <div class="table-wrap">
                                             <div class="table-responsive">
                                                <table class="table table-sm mb-0">
                                                   <thead>
                                                      <tr>
                                                         <th>Date</th>
                                                         <th>Debit</th>
                                                      </tr>
                                                   </thead>
                                                   <tbody>
                                                      <?php 
                                                          while ($crows = $crresult->fetch_object()) {
                                                           
                                                           ?>
                                                      <tr>
                                                            <td><?=$crows->Date?></td>
                                                            <td><?=$crows->Debit?></td>              
                                                      </tr>
                                                      <?php } ?>
                                                   </tbody>
                                                </table>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="card">
                                       <div class="card-header card-header-action">
                                          <h6>Ledger</h6>
                                          <div class="d-flex align-items-center card-action-wrap">
                                             <a href="#" class="inline-block refresh mr-15">
                                             <i class="ion ion-md-arrow-down"></i>
                                             </a>
                                             <a href="#" class="inline-block full-screen mr-15">
                                             <i class="ion ion-md-expand"></i>
                                             </a>
                                             <a class="inline-block card-close" href="#" data-effect="fadeOut">
                                             <i class="ion ion-md-close"></i>
                                             </a>
                                          </div>
                                       </div>
                                       <div class="card-body pa-0">
                                          <div class="table-wrap">
                                             <div class="table-responsive">
                                                <table class="table table-sm mb-0">
                                                   <thead>
                                                      <tr>
                                                         <th>Date</th>
                                                         <th>Credit</th>
                                                         <th>Debit</th>
                                                      </tr>
                                                   </thead>
                                                   <tbody>
                                                      <?php 
                                                          while ($clrows = $clresult->fetch_object()) {
                                                           
                                                           ?>
                                                      <tr>
                                                            <td><?=$clrows->Date?></td>
                                                            <td><?=$clrows->Credit?></td>
                                                            <td><?=$clrows->Debit?></td>             
                                                      </tr>
                                                      <?php } ?>
                                                   </tbody>
                                                </table>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- END -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /Row -->
            </div>

            <div class="modal fade" id="exampleModalForms" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Recovery</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="myform">
                               <input type="hidden" name="CustomerId" id="customerid" value="<?=$_POST['id']?>">
                               <div class="form-group row">                                    
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
                                    <div class="col-sm-10">
                                       <input class="form-control DTE" id="date" type="text" name="Date" />
                                    </div>
                                 </div>
                    <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Delivery Man</label>
                          <div class="col-sm-10">
                             <select class="form-control" id="deliveryman" name="DeliveryManId" required>
                                     <?php 
                                     while ($row = $dresult->fetch_object()) {                                       
                                      ?>
                                      <option value="<?=$row->Id?>"><?=$row->Name?></option>
                                    <?php } ?>
                             </select>
                          </div>
                       </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Account</label>
                    <div class="col-sm-10">
                        
                        <select class="form-control" id="account" name="AccountId">
                                                  
                            <?php for ($i=0; $i < count($accounts); $i++) {
                                 ?>
                            <option value="<?=$accounts[$i]->Id?>"><?=$accounts[$i]->Name." ".$accounts[$i]->Number." [Balance: ".$accounts[$i]->Balance."]"?></option>                                        <?php } ?>            
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Amount</label>
                    <div class="col-sm-10">                        
                        <input class="form-control" type="text" placeholder="Recovery" name="Debit" id="creditrecovery">
                    </div>
                </div>
                                
                                <button type="submit" id="submit" class="btn btn-gradient-info">Add</button> 
                            </form>
                        </div>
                    </div>
                </div>
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
       $('.DTE').daterangepicker({
             singleDatePicker: true,
             showDropdowns: true,
             minYear: 2010,
             maxYear: 2028,
             locale: {
               format: 'YYYY-MM-DD'
             },        
             "cancelClass": "btn-secondary"
             });
 
        function mod() {
          $('#exampleModalForms').modal('show');
        }
       
$("#myform").submit(function (e) {
        e.preventDefault();
               
        var formData = $("#myform").serialize();
        $.ajax({
          type: "POST",
          url : "<?php echo $action_url; ?>add_recovery.php",
          data: formData,
          beforeSend: function() {
                $('#submit').attr('disabled', true);                
                $("#submit").html("<i id='sub' class='fad fa-sync-alt fa-spin fa-lg'></i>").addClass("btn-success");
            },
          complete: function() {
                $('#submit').empty().addClass('btn btn-gradient-info').html('Add <?=$Title?>');
                // $('#submit2').empty().addClass('btn btn-gradient-info').html('Bank Transfer');
            $('#submit').attr('disabled', false);
            },
          success: function (response) {
            if (response == "Success") {
              iziToast.success({
                                title: 'Success',
                                message: 'Recovery Added'
                            });
              $('#myform').trigger("reset");
              
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

     </script>
   </body>
</html>