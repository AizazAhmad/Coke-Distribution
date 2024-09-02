<?php require_once 'config/config.php';
if(!isset($_SESSION['admin_login'])){
  header('location: '.$base_url.'login.php');
} ?>
<!DOCTYPE html>
<html>

<head>
   <?php require_once $include_path.'head.php'; ?>
  <!-- Page plugins -->
  <link rel="stylesheet" href="<?=$assets_url?>vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=$assets_url?>vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=$assets_url?>vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
</head>

<body>
  <!-- Sidenav -->
  <?php require_once $include_path.'sidebar.php'; ?>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <?php require_once $include_path.'header.php'; ?>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <!-- Table -->
      <div class="row">
        <div class="col">
         
          <div class="card">
            <!-- Card header -->
            <?php
            
            if (isset($_SESSION['notify'])) {
               if ($_SESSION['notify']) {
                    success_alert("Action Performed Successfuly!");
                }else{
                    error_alert("Some Thing Went Wrong!");
                }
                unset($_SESSION['notify']);
            }
            ?>
            <div class="card-header">
              <h3 class="mb-0">Ban User List</h3>              
            </div>
            <div class="table-responsive py-4">              
              <table class="table table-flush" id="datatable-buttons">
                <thead class="thead-light">
                  <tr>
                    <th>Join Date</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Mobile</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Join Date</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Mobile</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
<?php
$query = "SELECT users.*, roles.Title as Role FROM users INNER JOIN roles ON users.RoleId = roles.Id WHERE Status = 0;";
$result = $db->query($query);

while ($row = $result->fetch_object()) {
    
    
    $activate_button = activate_button($row->Id, $action_url.'activate_user.php');

    ?>
                  <tr>
                    <td><?=$row->Date?></td>
                    <td><?=$row->Name?></td>
                    <td><?=$row->Username?></td>
                    <td><?=$row->Role?></td>
                    <td><?=$row->Mobile?></td>
                    <td><span class="text-danger"></i><?php echo $activate_button; ?> </span> </td>
                  </tr>
<?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <?php require_once $include_path.'footer.php'; ?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <script src="<?=$assets_url?>vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?=$assets_url?>vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?=$assets_url?>vendor/js-cookie/js.cookie.js"></script>
  <script src="<?=$assets_url?>vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?=$assets_url?>vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="<?=$assets_url?>vendor/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?=$assets_url?>vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?=$assets_url?>vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?=$assets_url?>vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
  <script src="<?=$assets_url?>vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="<?=$assets_url?>vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="<?=$assets_url?>vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="<?=$assets_url?>vendor/datatables.net-select/js/dataTables.select.min.js"></script>
  <!-- Argon JS -->
  <script src="<?=$assets_url?>js/argon.js?v=1.1.0"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="<?=$assets_url?>js/demo.min.js"></script>
</body>

</html>