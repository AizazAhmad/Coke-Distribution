<?php require_once 'config/ConfigL.php';

?>
<!DOCTYPE html>

<html lang="en">
	<head>
		<?php require_once $include_path.'head.php'; ?>
</head>
	<body>
		<!-- Preloader -->
		
		<!-- /Preloader -->
		
		<!-- HK Wrapper -->
		<div class="hk-wrapper">
			
			<!-- Main Content -->
			<div class="hk-pg-wrapper hk-auth-wrapper">
				
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-12 pa-0">
							<div class="auth-form-wrap pt-xl-0 pt-70">
								<div class="auth-form w-xl-30 w-lg-55 w-sm-75 w-100 animate7 bounceIn">
									<a class="auth-brand text-center d-block mb-20" href="#">
										<img class="brand-img" src="dist/img/logo-light.png" alt="brand"/>
									</a>
									<form action="<?php echo $action_url; ?>login.php" method="POST">
										
										
										<?php
            
							            if (isset($_SESSION['notify'])) {
							               if ($_SESSION['notify']){
							               	error_alert("Invalid Credentials!");
							               }
							                unset($_SESSION['notify']);
							            }
							            ?>
										<div class="form-group">
											<input class="form-control" name="Username" value="UmerHussain" placeholder="Email" type="text">
										</div>
										<div class="form-group">
											<div class="input-group">
												<input class="form-control" name="Password" value="1122" placeholder="Password" type="password">
												<div class="input-group-append">
													<span class="input-group-text"><span class="feather-icon"><i data-feather="eye-off"></i></span></span>
												</div>
											</div>
										</div>
										
										<button class="btn btn-gradient-info btn-block" type="submit">Login</button>
										
										
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Main Content -->
		
		</div>
		<!-- /HK Wrapper -->
		
		<?php require_once $include_path.'foot.php'; ?>
</head>
	</body>
</html>