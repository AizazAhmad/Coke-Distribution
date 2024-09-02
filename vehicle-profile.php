<?php require_once 'config/config.php';
// $row = fetchRecord($_POST['id'],"deliveryman");
$Title = "Vehicle Profile";
$ProfileQuery = "SELECT * FROM vehicle WHERE Id = {$_POST['id']} AND UserId = {$_SESSION['user_id']}";

$Result = $db->query($ProfileQuery);
$rows = $Result->fetch_object();

$ExpenseQuery = "SELECT vx.Date,vx.Amount,vx.Description,vt.Name AS Type FROM vehexpense vx INNER JOIN vehexpmaintype vt ON vx.VMTypeId = vt.Id WHERE YEAR(Date) = YEAR(CURRENT_DATE()) AND 
      MONTH(Date) = MONTH(CURRENT_DATE()) AND vx.VehicleId = {$_POST['id']} AND vx.UserId = {$_SESSION['user_id']}";

$XpResult = $db->query($ExpenseQuery);



$class = "text-success";
if (!$rows->Status)
$class = "text-dark";

$Satitics = "SELECT  (                
                    SELECT SUM(Amount) FROM vehexpense WHERE MONTH(Date) = MONTH(CURRENT_DATE())
AND YEAR(Date) = YEAR(CURRENT_DATE()) AND VehicleId = {$_POST['id']} AND UserId = {$_SESSION['user_id']}
                    ) AS Expenses";
           
$STResult = $db->query($Satitics);
$strows = $STResult->fetch_object();


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
                          <img src="<?=$base_url?>dist/img/deliveryman.png" alt="user" class="avatar-img rounded-circle">
                        </div>
                      </div>
                      <div class="media-body">
                        <div class="text-white text-capitalize display-6 mb-5 font-weight-400"><?=$rows->Number?></div>
                        <div class="font-14 text-white">
                          <span class="mr-5"><span class="font-weight-500 pr-5"><?=$rows->Type?></span></span>
                          
                        </div>
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
                                        <h6>Expenses</h6>
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
                                                            <th>Type</th>
                                                            <th>Description</th>
                                                            <th>Amount</th>                                              
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ($xrows = $XpResult->fetch_object()) {
                                                          
                                                          ?>
                                                        <tr>
                                                            <td><?=$xrows->Date?></td>
                                                            <td><?=$xrows->Type?></td>
                                                            <td><?=$xrows->Description?></td>
                                                            <td><?=$xrows->Amount?></td>
                                                                                                             
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
                              <div class="text-capitalize font-weight-500 text-dark"><?=$rows->Number?></div>
                              <div class="font-13"><?=$rows->Type?></div>
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
                              <span class="d-block display-6 text-dark mb-5"><?=round($strows->Expenses,0)?></span>
                              <span class="d-block text-capitalize font-14">Expenses</span>
                            </div>
                          </div>
                          
                        </div>
                        <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><span><i class="ion ion-md-calendar font-18 text-light-20 mr-10"></i><span>Join Date:</span></span><span class="ml-5 text-dark"><?php 
                                                    $Date = date_format(date_create($rows->Date),"F j, Y");
                                                    echo $Date;

                                                    ?></span></li>
                                                    <li class="list-group-item"><span><i class="ion ion-md-briefcase font-18 text-light-20 mr-10"></i><span>Value</span></span><span class="ml-5 text-dark"><?=$rows->Value?></span></li>
                                                    
                                                    <li class="list-group-item"><span><i class="ion ion-md-pin font-18 text-light-20 mr-10"></i><span>Status</span></span><span class="ml-5 <?=$class?>"><?php if ($rows->Status) echo "Active"; else echo "Inactive"; ?></span></li>
                                                </ul>
                       </div>
                      
                      
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>  
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
   
  
</body>
</html>
