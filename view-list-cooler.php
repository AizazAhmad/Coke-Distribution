<?php require_once 'config/config.php';
$Title = "Cooler";
$title = "normal_cooler";
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>List <?=$Title?></title>
      
      <!-- Data Table CSS -->
      <link href="<?=$base_url?>vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
      <link href="<?=$base_url?>vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet"
         type="text/css" />      
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
                     <div class="row mb-3">
                          <div class="col">
                            <h5 class="hk-sec-title"><?=$Title?> List</h5>
                          </div>
                          <div class="col">

                          </div>
                          <div class="col">
                            <a class="btn btn-gradient-info" href="list-cooler.php">Edit Cooler</a> 
                            <a class="btn btn-gradient-info float-right" href="add-cooler.php">Add Cooler</a>                  
                          </div>

                      </div>
                     <div class="row">
                        <div class="col-sm">
                           <div class="table-wrap">
                              <?php require_once $action_path.$title.'_view_list.php'; ?>
                           </div>
                        </div>
                     </div>
                  </section>
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
      <?php require_once $include_path.'footTable.php'; ?>
     
   </body>
</html>
