<?php require_once 'config/config.php'; ?>
<!DOCTYPE html>
<html>

<head>
  <?php require_once $include_path.'head.php'; ?>
  <link rel="stylesheet" href="<?=$assets_url?>css/animate.css">
</head>

<body class="bg-default">
  <!-- Navbar -->
  
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
      <div class="container">
        
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0 wow bounceInLeft">
            <div class="card-header bg-transparent pb-5">
              
              <div class="btn-wrapper text-center">
                <?php
            
            if (isset($_SESSION['notify'])) {
               if (!$_SESSION['notify']) 
                  error_alert("Invalid Crediential!");
                
                unset($_SESSION['notify']);
            }
            ?>
                          <img src="assets/img/logo.png" >
                
              </div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              
              <form role="form" action="<?php echo $action_url; ?>login.php" method="POST">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Username" type="text" name="Username" autocomplete="off">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" name="Password" type="Password" autocomplete="off">
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                  
                </div>
                <div class="text-center">
                  <input type="submit" class="btn btn-primary my-4" value="Login">
                </div>
              </form>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; 2019 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Dazolutions</a>
          </div>
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">
              <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Dazolutions</a>
            </li>
            <li class="nav-item">
              <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
            </li>
            <li class="nav-item">
              <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
            </li>
            <li class="nav-item">
              <a href="https://www.creative-tim.com/license" class="nav-link" target="_blank">License</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- Argon Scripts -->
  <!-- Core -->
  <?php require_once $include_path.'foot.php'; ?>
  <script src="assets/js/wow.min.js"></script>
              <script>
              new WOW().init();
              </script>
</body>

</html>