<?php require_once 'config/ConfigL.php';

?>
<!DOCTYPE html>

<html lang="en">
	<head>
		<?php require_once $include_path.'head.php'; ?>
		<link rel="stylesheet" type="text/css" href="<?=$base_url?>dist/css/loginstyle.css">
</head>
	<body>
		<!-- Preloader -->
		
		<!-- /Preloader -->
		
		<!-- HK Wrapper -->
		<div class="hk-wrapper hk-pg-wrapperr">
			
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
									<h1 class="display-4 text-center">Booker Login</h1>
									<form id="myform">										
										

										<div class="form-group">
											<input class="form-control" name="Username" placeholder="Username" value="UmerHussain" type="text">
										</div>
										<div class="form-group">
											<div class="input-group">
												<input class="form-control" name="Password" value="1122" placeholder="Password" type="password">
												<div class="input-group-append">
													<span class="input-group-text"><span class="feather-icon"><i data-feather="eye-off"></i></span></span>
												</div>
											</div>
										</div>
										
										<button class="btn btn-gradient-warning btn-block" type="submit" id="submit"><i id='sub' class='spinner-grow spinner-grow-sm mr-1'></i>Login</button>
										
										
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

		<script type="text/javascript">
$("#sub").hide();
			 iziToast.settings({
    timeout: 2500,
    resetOnHover: true,
    animateInside: true,
    transitionIn: 'bounceInUp',
    transitionOut: 'flipOutX'
});
			$("#myform").submit(function (e) {
        e.preventDefault();
        
        var formData = $("#myform").serialize();
        $.ajax({
          type: "POST",
          url : "<?php echo $action_url; ?>login.php",
          data: formData,
          beforeSend: function() {
                $('#submit').attr('disabled', true);                
                $('#sub').show();
            },
          complete: function() {
                $('#sub').hide();
                // $('#submit2').empty().addClass('btn btn-gradient-info').html('Bank Transfer');
            $('#submit').attr('disabled', false);
            },
          success: function (response) {
            if (response == "Success") {
              iziToast.success({
                                title: 'Success',
                                message: 'Login Succeeded!'
                            });
              location.href = '<?php echo $base_url ?>';
              
            }else if (response == "Invalid") {
              iziToast.error({
                        title: 'Invalid',
                        message: 'Invalid Credientials!'
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