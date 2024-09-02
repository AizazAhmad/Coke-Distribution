<?php require_once 'config/config.php';

 ?>
<!DOCTYPE html>
<!-- 
Template Name: Brunette - Responsive Bootstrap 4 Admin Dashboard Template
Author: Hencework
Contact: https://hencework.ticksy.com/

License: You must have a valid license purchased only from templatemonster to legally use the template for your project.
-->
<html lang="en">

<head>
    <title>Home</title>
    <link href="<?=$base_url?>vendors/vectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" type="text/css" />
     <link href="<?=$base_url?>vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="<?=$base_url?>vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
    
    <!-- Toastr CSS -->
    <link href="<?=$base_url?>vendors/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="<?=$base_url?>dist/css/style.css" rel="stylesheet" type="text/css">
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
        
        <!-- /Setting Panel -->
<?php               
$currentdate = date("m/d/Y");


// $Money = "SELECT  (                
//                     SELECT FORMAT(SUM(Credit)-SUM(Debit),2)
//                     FROM   cash WHERE UserId = {$_SESSION['user_id']}
//                     ) AS Cash,
//                     (
//                     SELECT FORMAT(SUM(Credit)-SUM(Debit),2)
//                     FROM   securitydeposit WHERE UserId = {$_SESSION['user_id']}
//                     ) AS Security
//             FROM    dual";
$Satitics = "SELECT  (                
                    SELECT COUNT(Id) FROM customer WHERE UserId = {$_SESSION['user_id']}
                    ) AS Retailers,
                    (                
                    SELECT COUNT(Id) FROM vehicle WHERE UserId = {$_SESSION['user_id']}
                    ) AS Vehicles,
                    (
                    SELECT COUNT(Id) FROM loadoutlog l WHERE Qty > 0 AND l.Date = CURDATE()
                    ) AS LoadOuts,
                    (
                    SELECT COUNT(Id) FROM deliveryman WHERE UserId = {$_SESSION['user_id']}
                    ) AS DeliveryMens
            FROM    dual";

// $CashQuery = "SELECT *,date_format(date,'%a %b %e') AS Day,
// COALESCE(((SELECT SUM(Credit) FROM cash ) - (SELECT SUM(Debit) FROM cash )), 0) as Balance
// FROM cash WHERE UserId = {$_SESSION['user_id']} ORDER BY Id DESC LIMIT 5;";
$CashQuery = "SELECT * FROM
(
  SELECT b.Id,date_format(b.Date,'%a %b %e') AS Day,b.Description, b.Credit, b.Debit,
         @Balance := @Balance + b.Debit - b.Credit AS Balance
  FROM cash b, (SELECT @Balance := 0) AS variableInit 
  ORDER BY b.ID DESC
  LIMIT 10
) m
ORDER BY m.Id ASC";

$BankQuery = "SELECT t.* FROM (SELECT *,date_format(Date,'%a %b %e') AS Day
FROM accountslog WHERE Date >= ( CURDATE() - INTERVAL 4 DAY ) AND AccountId = 1 AND UserId = {$_SESSION['user_id']} ORDER BY Id DESC LIMIT 7) t ORDER BY t.Date;";

$RemU = "SELECT
  UFShell as URS,
  UFBottle as URB,
  UFPallet as URP
FROM unfilled WHERE UserId = {$_SESSION['user_id']};";
$RemF = "SELECT
  FShell as FRS,
  FBottle as FRB,
  FPallet as FRP
FROM filled WHERE UserId = {$_SESSION['user_id']};";
$REMU = $db->query($RemU);
$ro = $REMU->fetch_object();
$URS = $ro->URS;
$URB = $ro->URB;
$URP = $ro->URP;

$REMF = $db->query($RemF);
$ros = $REMF->fetch_object();
$FRS = $ros->FRS;
$FRB = $ros->FRB;
$FRP = $ros->FRP;

$STResult = $db->query($Satitics);
$strows = $STResult->fetch_object();
$Retailers = $strows->Retailers;
$Vehicles = $strows->Vehicles;
$DeliveryMens = $strows->DeliveryMens;
$LoadOuts = $strows->LoadOuts;
            
// $resultt = $db->query($Money);
// $rows = $resultt->fetch_object();
// $Cash = $rows->Cash;
// $Security = $rows->Security;

$CashResult = $db->query($CashQuery);
$BankResult = $db->query($BankQuery);

                

                ?>
        <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <!-- Container -->
            <div class="container mt-xl-50 mt-sm-30 mt-15">
                <!-- Title Dashboard -->
                <?php if ($_SESSION['RoleTitle'] == "Admin") {
                    
                 ?> 

                <div class="row">
                    <div class="col-xl-12">
                        <div class="hk-row">
                            <div class="col-sm-12">
                                <div class="card-group hk-dash-type-2">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500">Retailers</span>
                                                </div>
                                                
                                            </div>
                                            <div>
                                                <span class="d-block display-4 text-dark mb-5"><?=$Retailers?></span>
                                                
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500">Delivery Mens</span>
                                                </div>
                                                
                                            </div>
                                            <div>
                                                <span class="d-block display-4 text-dark mb-5"><span class="counter-anim"><?=$DeliveryMens?></span></span>
                                                
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500">Vehicle</span>
                                                </div>
                                                
                                            </div>
                                            <div>
                                                <span class="d-block display-4 text-dark mb-5"><?=$Vehicles?></span>
                                                
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500">Load Outs</span>
                                                </div>
                                                
                                            </div>
                                            <div>
                                                <span class="d-block display-4 text-dark mb-5"><?=$LoadOuts?></span>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <div class="hk-row">
                            <div class="col-xl-6">
                                <section class="hk-sec-wrapper">
                                    <h6 class="hk-sec-title">Top DeliveryMens</h6>
                                    <div class="row">
                                        <div class="col-sm">
                                            <div id="top_deliverymen_chart" class="echart" style="height:294px;"></div>
                                        </div>
                                    </div>
                                </section> 
                            </div>
                            <div class="col-xl-6">
                                <section class="hk-sec-wrapper">
                                    <h6 class="hk-sec-title">Top Customers</h6>
                                    <div class="row">
                                        <div class="col-sm">
                                            <div id="top_customer_chart" class="echart" style="height:294px;"></div>
                                        </div>
                                    </div>
                                </section>                        
                            </div>
                        </div>

                        <div class="hk-row">
                            <div class="col-xl-6">
                                <section class="hk-sec-wrapper">
                                    <h6 class="hk-sec-title">Top 5 Trending Product</h6>
                                    <div class="row">
                                        <div class="col-sm">
                                            <div id="pro_trend_chart" class="echart" style="height:294px;"></div>
                                        </div>
                                    </div>
                                </section> 
                            </div>
                            <div class="col-xl-6">
                                <section class="hk-sec-wrapper">
                                    <h6 class="hk-sec-title">Top 5 Trending SubProduct</h6>
                                    <div class="row">
                                        <div class="col-sm">
                                            <div id="subpro_trend_chart" class="echart" style="height:294px;"></div>
                                        </div>
                                    </div>
                                </section>                        
                            </div>
                        </div>

                        <div class="hk-row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header card-header-action">
                                        <h6>Cash</h6>
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
                                                            <th>Description</th>
                                                            <th>Credit</th>
                                                            <th>Debit</th>                                               
                                                            <th>Balance</th>                                               
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ($cashrow = $CashResult->fetch_object()) {
                                                          
                                                          ?>
                                                        <tr>
                                                            <td><?=$cashrow->Day?></td>
                                                            <td><?=$cashrow->Description?></td>
                                                            <td><?=$cashrow->Credit?></td>
                                                            <td><?=$cashrow->Debit?></td>
                                                            <td><?=bcdiv($cashrow->Balance,1,2)?></td>                                                 
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
                                        <h6>Bank</h6>
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
                                                            <th>Day</th>
                                                            <th>Description</th>
                                                            <th>Debit</th>
                                                            <th>Credit</th>                                               
                                                            <th>Balance</th>                                               
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ($bankrow = $BankResult->fetch_object()) {
                                                          
                                                          ?>
                                                        <tr>
                                                            <td><?=$bankrow->Day?></td>
                                                            <td><?=$bankrow->Description?></td>
                                                            <td><?=$bankrow->Debit?></td>
                                                            <td><?=$bankrow->Credit?></td>
                                                            <td><?=$bankrow->Amount?></td>                                                 
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

                        
                        <div class="hk-row">
                                
                                <div class="col-lg-12">
                                    <section class="hk-sec-wrapper">
                                        <h6 class="hk-sec-title text-danger font-weight-bold">Low Stock</h6>
                                        <div class="row">
                                            <div class="col-sm">
                                                <div id="stock_chart" class="echart" style="height:400px;"></div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                        </div>
                       <div class="hk-row">
                                
                                <div class="col-lg-12">
                                <section class="hk-sec-wrapper">
                                    <h6 class="hk-sec-title">Filled Unfilled Stock</h6>
                                    <div class="row">
                                        <div class="col-sm">
                                            <div id="filled_stock_chart" class="echart" style="height:294px;"></div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>


                    </div>
                </div>              

               
                <!-- /Title -->
                <!-- Row -->
                
                   
                <!-- Row -->
                <div class="hk-pg-header align-items-top">
                    <div>
                        <h3 class="hk-pg-title font-weight-500 mb-10">Filled Stock</h3>
                        
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hk-row">
                            <div class="col-sm-12">
                                <div class="card-group hk-dash-type-2">                                   
                                    <div class="card card-sm ">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500">Bottles</span>
                                                </div>
                                                
                                            </div>
                                            <div>
                                                <span class="d-block display-4 text-dark mb-5"><?=number_format($FRB)?></span>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card card-sm ">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500">Shells</span>
                                                </div>
                                                
                                            </div>
                                            <div>
                                                <span class="d-block display-4 text-dark mb-5"><?=number_format($FRS)?></span>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card card-sm ">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500">Pallets</span>
                                                </div>
                                                
                                            </div>
                                            <div>
                                                <span class="d-block display-4 text-dark mb-5"><?=number_format($FRP)?></span>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card card-sm ">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500">BMS</span>
                                                </div>
                                                
                                            </div>
                                            <div>
                                                <span class="d-block display-4 text-dark mb-5"><?php //echo $rows->TotalTest; ?></span>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-sm ">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500"> BMS</span>
                                                </div>
                                                
                                            </div>
                                            <div>
                                                <span class="d-block display-4 text-dark mb-5"><?php //echo $rows->TTSales; ?></span>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>  
                        </div>
                        
                    </div>
                </div>
                <div class="hk-pg-header align-items-top">
                    <div>
                        <h3 class="hk-pg-title font-weight-500 mb-10">UnFilled FStock</h3>
                        
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hk-row">
                            <div class="col-sm-12">
                                <div class="card-group hk-dash-type-2">                                   
                                    <div class="card card-sm ">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500">Bottles</span>
                                                </div>
                                                
                                            </div>
                                            <div>
                                                <span class="d-block display-4 text-dark mb-5"><?=number_format($URB)?></span>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card card-sm ">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500">Shells</span>
                                                </div>
                                                
                                            </div>
                                            <div>
                                                <span class="d-block display-4 text-dark mb-5"><?=number_format($URS)?></span>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card card-sm ">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500">Pallets</span>
                                                </div>
                                                
                                            </div>
                                            <div>
                                                <span class="d-block display-4 text-dark mb-5"><?=number_format($URP)?></span>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card card-sm ">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500">BMS</span>
                                                </div>
                                                
                                            </div>
                                            <div>
                                                <span class="d-block display-4 text-dark mb-5"><?php //echo $rows->TotalTest; ?></span>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-sm ">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500"> BMS</span>
                                                </div>
                                                
                                            </div>
                                            <div>
                                                <span class="d-block display-4 text-dark mb-5"><?php //echo $rows->TTSales; ?></span>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>  
                        </div>
                        
                    </div>
                </div>
                
                <div class="hk-pg-header align-items-top">
                    <div>
                        <h3 class="hk-pg-title font-weight-500 mb-10">Total Stock</h3>                        
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hk-row">
                            <div class="col-sm-12">
                                <div class="card-group hk-dash-type-2">                                   
                                    <div class="card card-sm ">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500">Total Bottles</span>
                                                </div>
                                                
                                            </div>
                                            <div>
                                                <span class="d-block display-4 text-dark mb-5"><?=number_format($FRB+$URB)?></span>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card card-sm ">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500">Total Shells</span>
                                                </div>
                                                
                                            </div>
                                            <div>
                                                <span class="d-block display-4 text-dark mb-5"><?=number_format($FRS+$URS)?></span>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card card-sm ">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500">Total Pallets</span>
                                                </div>
                                                
                                            </div>
                                            <div>
                                                <span class="d-block display-4 text-dark mb-5"><?=number_format($FRP+$URP)?></span>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card card-sm ">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500">BMS</span>
                                                </div>
                                                
                                            </div>
                                            <div>
                                                <span class="d-block display-4 text-dark mb-5"><?php //echo $rows->TotalTest; ?></span>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-sm ">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500"> BMS</span>
                                                </div>
                                                
                                            </div>
                                            <div>
                                                <span class="d-block display-4 text-dark mb-5"><?php //echo $rows->TTSales; ?></span>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>  
                        </div>
                        
                    </div>
                </div>
                <?php } ?>
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
    
   <script src="<?=$base_url?>vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=$base_url?>vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?=$base_url?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="<?=$base_url?>dist/js/jquery.slimscroll.js"></script>

    <!-- Fancy Dropdown JS -->
    <script src="<?=$base_url?>dist/js/dropdown-bootstrap-extended.js"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="<?=$base_url?>dist/js/feather.min.js"></script>

    <!-- Toggles JavaScript -->
    <script src="<?=$base_url?>vendors/jquery-toggles/toggles.min.js"></script>
    <script src="<?=$base_url?>dist/js/toggle-data.js"></script>
    
    <!-- Counter Animation JavaScript -->
    <script src="<?=$base_url?>vendors/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="<?=$base_url?>vendors/jquery.counterup/jquery.counterup.min.js"></script>
    
    <!-- EChartJS JavaScript -->
    <script src="<?=$base_url?>vendors/echarts/dist/echarts-en.min.js"></script>

    <!-- EChartJS JavaScript -->
    <script src="<?=$base_url?>vendors/echarts/dist/echarts-en.min.js"></script>
    <script>

        var stock_qty = [];
        var stock_name = [];

        var filled_stock_FRS = [];
        var unfilled_stock_FRS = [];

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo $action_url; ?>fetch_top_deliverymen.php",
             success: function(data){             
           
          bms_chart('top_deliverymen_chart',data);

        }
    });

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo $action_url; ?>fetch_top_customer.php",
             success: function(data){             
           
          bms_chart('top_customer_chart',data);

        }
    });

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo $action_url; ?>fetch_trending_product.php",
             success: function(data){             
                 bms_chart('pro_trend_chart',data);
        }
    });

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo $action_url; ?>fetch_trending_subproduct.php",
             success: function(data){
                       
          bms_chart('subpro_trend_chart',data);
        }
    });

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo $action_url; ?>fetch_stock_product.php",
             success: function(data){
             
            for (var i = 0; i < data.length; i++) {
                stock_qty.push(data[i].Qty);
                stock_name.push(data[i].Name);
            }           
          stock_chart(stock_name, stock_qty);
        }
    });

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo $action_url; ?>fetch_filled_stock.php",
             success: function(data){
             
            for (var i = 0; i < data.length; i++) {
                filled_stock_FRS.push(data[i].FRS);
                filled_stock_FRS.push(data[i].FRB);
                filled_stock_FRS.push(data[i].FRP);
            }  

            $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo $action_url; ?>fetch_unfilled_stock.php",
             success: function(data){
             
            for (var i = 0; i < data.length; i++) {
                unfilled_stock_FRS.push(data[i].FRS);
                unfilled_stock_FRS.push(data[i].FRB);
                unfilled_stock_FRS.push(data[i].FRP);
            }           
          filled_stock_Chart(filled_stock_FRS,unfilled_stock_FRS);
        }
    });         
          
        }
    });

        

        function bms_chart(id,data) {
            var chart = echarts.init(document.getElementById(id));
        
        var option1 = {
            tooltip: {
                show: true,
                backgroundColor: '#fff',
                borderRadius:6,
                padding:6,
                axisPointer:{
                    lineStyle:{
                        width:0,
                    }
                },
                textStyle: {
                    color: '#324148',
                    fontFamily: '"Roboto", sans-serif',
                    fontSize: 12
                }   
            },
            series: [
                {
                    name:'',
                    type:'pie',
                    radius : '55%',
                    color: ['#7a5449', '#a58b84', '#bca9a4', '#f6f3f2'],
                    data:data,
                    label: {
                        normal: {
                            formatter: '{b}\n{d}%'
                        },
                  
                    }
                }
            ]
        };
        chart.setOption(option1);
        chart.resize();
        }

        

        function stock_chart(name,qty) {
           var stock_chart = echarts.init(document.getElementById('stock_chart'));
        var option10 = {
            color: ['#7a5449'],
            tooltip: {
                show: true,
                trigger: 'axis',
                backgroundColor: '#fff',
                borderRadius:6,
                padding:6,
                axisPointer:{
                    lineStyle:{
                        width:0,
                    }
                },
                textStyle: {
                    color: '#324148',
                    fontFamily: '"Roboto", sans-serif',
                    fontSize: 12
                }   
            },
            
            xAxis: [{
                type: 'category',                
                data: name,
                axisLine: {
                    show:false
                },
                axisTick: {
                    show:false
                },
                axisLabel: {
                    textStyle: {
                        color: '#5e7d8a'
                    }
                }
            }],
            yAxis: {
                type: 'value',
                axisLine: {
                    show:false
                },
                axisTick: {
                    show:false
                },
                axisLabel: {
                    textStyle: {
                        color: '#5e7d8a'
                    }
                },
                splitLine: {
                    lineStyle: {
                        color: '#eaecec',
                    }
                }
            },
            grid: {
                top: '3%',
                left: '3%',
                right: '3%',
                bottom: '3%',
                containLabel: true
            },
            series: [{                
                data: qty,
                type: 'bar',
                barMaxWidth: 30,
                itemStyle: {
                    normal: {
                        barBorderRadius: [6, 6, 0, 0] ,
                    }
                },
                label: {
                    normal: {
                        show: true,
                        position: 'inside'
                    }
                },
            }]
        };
        stock_chart.setOption(option10);
        stock_chart.resize();
        }

        function filled_stock_Chart(filled,unfilled) {
            var filled_stock_Chart = echarts.init(document.getElementById('filled_stock_chart'));
        var option4 = {
            color: ['#7a5449','#bca9a4'],      
            tooltip: {
                show: true,
                trigger: 'axis',
                backgroundColor: '#fff',
                borderRadius:6,
                padding:6,
                axisPointer:{
                    lineStyle:{
                        width:0,
                    }
                },
                textStyle: {
                    color: '#324148',
                    fontFamily: '"Roboto", sans-serif',
                    fontSize: 12
                }
            },
            
            grid: {
                top: '3%',
                left: '3%',
                right: '3%',
                bottom: '3%',
                containLabel: true
            },
            xAxis : [
                {
                    type : 'category',
                    data : ['Shell', 'Bottle', 'Pallet'],
                    axisLine: {
                        show:false
                    },
                    axisTick: {
                        show:false
                    },
                    axisLabel: {
                        textStyle: {
                            color: '#5e7d8a'
                        }
                    }
                }
            ],
            yAxis : [
                {
                    type : 'value',
                    axisLine: {
                        show:false
                    },
                    axisTick: {
                        show:false
                    },
                    axisLabel: {
                        textStyle: {
                            color: '#5e7d8a'
                        }
                    },
                    splitLine: {
                        lineStyle: {
                            color: '#eaecec',
                        }
                    }
                }
            ],
            series : [
                {
                    name:'1',
                    type:'bar',
                    barMaxWidth: 30,
                    data:filled,
                    itemStyle: {
                        normal: {
                            barBorderRadius: [6, 6, 0, 0] ,
                        }
                    },
                    label: {
                        normal: {
                            show: true,
                            position: 'inside'
                        }
                    }
                },
                {
                    name:'2',
                    type:'bar',
                    barMaxWidth: 30,
                    data:unfilled,
                    itemStyle: {
                        normal: {
                            barBorderRadius: [6, 6, 0, 0] ,
                        }
                    },
                    label: {
                        normal: {
                            show: true,
                            position: 'inside'
                        }
                    }
                }
            ]
        };

        filled_stock_Chart.setOption(option4);
        filled_stock_Chart.resize();
        }
        
    </script>
    
    <!-- Sparkline JavaScript -->
    <script src="<?=$base_url?>vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>
    
    <!-- Vector Maps JavaScript -->
    <script src="<?=$base_url?>vendors/vectormap/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="<?=$base_url?>vendors/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?=$base_url?>dist/js/vectormap-data.js"></script>

    <!-- Owl JavaScript -->
    <script src="<?=$base_url?>vendors/owl.carousel/dist/owl.carousel.min.js"></script>
    
    <!-- Toastr JS -->
    <script src="<?=$base_url?>vendors/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
    
    <!-- Init JavaScript -->
    <script src="<?=$base_url?>dist/js/init.js"></script>
    <script src="<?=$base_url?>dist/js/dashboard-data.js"></script>

	
</body>

</html>