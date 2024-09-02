<?php require_once 'config/config.php';
if(!isset($_SESSION['admin_login'])){
  header('location: '.$base_url.'login.php');
} ?>
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
              <div class="card-header">
                <h3 class="mb-0">Add User</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
                <form id="myform">
                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Full Name</label>
                    <div class="col-md-10">
                      <div class="input-group input-group-merge">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                          </div>
                          <input class="form-control" placeholder="Name" name="Name" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Role</label>
                    <div class="col-md-10">
                      <select class="form-control" name="Role" id="exampleFormControlSelect1">
                      <option value="1">Super Admin</option>
                      <option value="2">Industrial Admin</option>                      
                    </select>
                    </div>
                  </div>                  
                  <div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Username</label>
                    <div class="col-md-10">
                      <div class="input-group input-group-merge">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                          </div>
                          <input class="form-control" placeholder="Username" name="Username" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-password-input" class="col-md-2 col-form-label form-control-label">Password</label>
                    <div class="col-md-10">
                      <div class="input-group input-group-merge">
                          <input class="form-control" placeholder="Password" id="Password" name="Password" type="password">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-eye"></i></span>
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-password-input" class="col-md-2 col-form-label form-control-label">Confirm Password</label>
                    <div class="col-md-10">
                      <div class="input-group input-group-merge">
                          <input class="form-control" id="ConfirmPassword" placeholder="Confirm Password" name="ConfirmPassword" type="password">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-eye"></i></span>
                          </div>
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
                          <input class="form-control" placeholder="Phone number" name="Mobile" type="number">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                          </div>
                        </div>
                    </div>
                  </div>
                  <input type="submit" class="btn btn-success" value="Add">
                  <input type="reset" class="btn btn-success" value="reset">
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      $("#myform").submit(function (e) {
        e.preventDefault();
        var pass = $("#Password").val();
        var cpass = $("#ConfirmPassword").val();
        if (pass != cpass) {
          Swal.fire(
                          'Password Error!',
                          'Password is not matched!',
                          'error'
                        );
          $("#Password").val('');  
          $("#ConfirmPassword").val('');        
          return;
        }
        var formData = $("#myform").serialize();
        $.ajax({
          type: "POST",
          url : "<?=$action_url?>add_user.php",
          data: formData,
          success: function (response) {
            if (response == "Success") {
              Swal.fire(
                          'Success!',
                          'User Added Successfully!',
                          'success'
                        );
              $('#myform').trigger("reset");
            }else if(response == "Existed"){
              Swal.fire(
                          'Username Existed!',
                          'Username Already Existed Try Other One!',
                          'warning'
                        )
            }else if (response == "Invalid") {
              Swal.fire(
                          'Error!',
                          'Some thing went wrong!',
                          'error'
                        )
            }
          }
        });
      });
    });
  </script>
</body>

</html>