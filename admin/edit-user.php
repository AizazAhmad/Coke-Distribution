<?php require_once 'config/config.php';
if(!isset($_SESSION['admin_login'])){
  header('location: '.$base_url.'login.php');
}
$row = getById($_GET['id'],'users');
?>
<!DOCTYPE html>
<html>

<head>
  <?php require_once $include_path.'head.php'; ?>
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
      
      <div class="row">
        <div class="col-lg-12">
          <div class="card-wrapper">
            
            <!-- HTML5 inputs -->
            <div class="card">
              <!-- Card header -->
              <?php
            
            if (isset($_SESSION['notify'])) {
               if ($_SESSION['notify']) {
                    success_alert("User Updated Successfuly!");
                }else{
                    error_alert("Some Thing Went Wrong!");
                }
                unset($_SESSION['notify']);
            }
            ?>
              <div class="card-header">
                <h3 class="mb-0">Edit User</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
                <form id="myform" action="<?php echo $action_url; ?>update_user_details.php" method="POST">
                  <div class="form-group row">
                    <input type="hidden" name="id" value="<?=$row->Id?>">
                    <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Full Name</label>
                    <div class="col-md-10">
                      <div class="input-group input-group-merge">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                          </div>
                          <input class="form-control" value="<?=$row->Name?>" placeholder="Name" name="Name" type="text">
                      </div>
                    </div>
                  </div>
                                 
                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Username</label>
                    <div class="col-md-10">
                      <div class="input-group input-group-merge">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                          </div>
                          <input class="form-control" placeholder="Username" value="<?=$row->Username?>" name="Username" type="text">
                      </div>
                    </div>
                  </div>                  
                  
                  <div class="form-group row">
                    <label for="example-password-input" class="col-md-2 col-form-label form-control-label">Contact NO</label>
                    <div class="col-md-10">
                      <div class="input-group input-group-merge">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                          </div>
                          <input class="form-control" value="<?=$row->Mobile?>" placeholder="Phone number" name="Mobile" type="number">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                          </div>
                        </div>
                    </div>
                  </div>
                  <input type="submit" class="btn btn-success" value="Update">                  
                </form>
              </div>
            </div>
          </div>
        </div>
        
      </div>
      <!-- Footer -->
      <?php require_once $include_path.'footer.php'; ?>
    </div>
  </div>

  <!-- Argon Scripts -->
  <!-- Core -->
  <?php require_once $include_path.'foot.php'; ?>
  
</body>

</html>