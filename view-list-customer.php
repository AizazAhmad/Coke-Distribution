<?php require_once 'config/config.php';
$Title = "Customer";
$title = "normal_customer";
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
      <style type="text/css">
          
.container {
    max-width: 1240px;
} 
      </style>
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
                            <a class="btn btn-gradient-info" href="list-customer.php">Edit Customer</a> 
                            <a class="btn btn-gradient-info" href="add-customer.php">Add Customer</a>                  
                            <a class="btn btn-gradient-warning" href="Import-Customer.php">Upload Customer</a>                  
                            <a class="btn btn-gradient-success" href="<?=$base_url?>Import-Customer.csv">DownloadFile</a>                  
                          </div>                              
                      </div>
                     
                     <div class="row">
                        <div class="col-sm">
                           <div class="table-wrap">
                              

<table id="datable_1" class="table table-bordered w-100 display pb-30">
    <thead>
        <tr>
            <th>Code</th>
            <th>Voyage</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>VPO</th>
            <th>Limit</th>
            <th>Route</th>
            <th>Days</th>
                      
        </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT
  customer.*,
  vpo.Name as Badge
FROM customer
  INNER JOIN vpo
    ON customer.VpoId = vpo.Id
 WHERE customer.UserId = {$_SESSION['user_id']} AND customer.Status = 1;";
$result = $db->query($query);

while ($row = $result->fetch_object()) {
    $Q = "SELECT subroot.Name FROM customersubroot 
    INNER JOIN subroot ON customersubroot.SubRootId = subroot.Id 
    WHERE customersubroot.CustomerId = {$row->Id} AND customersubroot.UserId = {$_SESSION['user_id']}";
    $Result = $db->query($Q);    
    $q = "SELECT * FROM customersubroot Where CustomerId = {$row->Id}";
    $r = $db->query($q);
    $ow = $r->fetch_object();
   
   
    ?>

        <tr>
            
            <td><?php echo $row->Code; ?></td>
            <td><?php echo $row->VoyageCode; ?></td>
            <td><?php echo $row->Name; ?></td>
            <td><?php echo $row->Mobile; ?></td>
            <td><?php echo $row->Badge; ?></td>
            <td><?php echo $row->CreditLimit; ?></td>
            <td><?php echo fetchRecord($ow->RootId,"root")->Name; ?></td>           
            <td><?php while ($Row = $Result->fetch_object()) {  ?>
            <span class="badge badge-info"><?=$Row->Name?></span>
                <?php } ?>
            </td>           
           
        </tr>

    
<?php
} ?>
</tbody>
    <tfoot>
        <tr>
            <th>Code</th>
            <th>Voyage</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>VPO</th>
            <th>Limit</th>
            <th>Route</th>
            <th>Days</th>            
        </tr>
    </tfoot>
</table>
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