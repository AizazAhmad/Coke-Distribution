<?php require_once 'config/config.php';
$Title = "Product";
$title = "product";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit <?=$Title?></title>
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
                <div class="hk-pg-header align-items-top">
                    <div>
                        <h2 class="hk-pg-title font-weight-600 mb-10">UPDATE <?=$Title?>!</h2>
                    </div>
                </div>
                <!-- /Title -->

                <!-- Row -->
                <?php
                $row = fetchRecord($_POST['id'],'product');

                ?>
                <div class="row">
                    <div class="col-xl-12">
                    <section class="hk-sec-wrapper">
                            
                            <div class="row">
                                <div class="col-sm">
                                    <form id="myformm">
                                    
                                        <input type="hidden" name="Id" value="<?php echo $row->Id; ?>">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Code</label>
                                            <div class="col-sm-5">
                                                <input type="number" name="Code" class="form-control" id="code" value="<?php echo $row->Code; ?>" placeholder="Code">
                                            </div>
                                            <div class="col-sm-5">
                                                <button type="submit" id="submitt" class="btn btn-gradient-info">Update</button>
                                            </div>
                                        </div>
                                        </form>
                                        <form id="myform">
                                            <input type="hidden" name="Id" value="<?php echo $row->Id; ?>">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                                            <div class="col-sm-5">
                                                <input type="text"  name="Name" class="form-control" id="title" value="<?php echo $row->Name; ?>" placeholder="Title">
                                            </div>
                                            <div class="col-sm-5">
                                                <button type="submit" id="submit" class="btn btn-gradient-info">Update</button>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                    </form>
                                </div>
                            </div>
                        </section>
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

   <?php require_once $include_path.'foot.php'; ?>
	<script type="text/javascript">
    $(document).ready(function () {
        iziToast.settings({
    timeout: 2500,
    resetOnHover: true,
    animateInside: true,
    transitionIn: 'bounceInUp',
    transitionOut: 'flipOutX'
});
        
      $("#myformm").submit(function (e) {
        e.preventDefault();
               
        var formData = $("#myformm").serialize();
        
        $.ajax({
          type: "POST",
          url : "<?php echo $action_url; ?>update_code.php",
          data: formData,
          beforeSend: function() {
                $('#submitt').attr('disabled', true);                
                $("#submitt").html("<i id='sub' class='fad fa-sync-alt fa-spin fa-lg'></i>").addClass("btn-success");
            },
          complete: function() {
                $('#submitt').empty().addClass('btn btn-gradient-info').html('Add <?=$Title?>');
            $('#submitt').attr('disabled', false);
            },
          success: function (response) {
            if (response == "Success") {
              iziToast.success({
                                title: 'Succes',
                                message: 'Product Updated'
                            });
             window.setTimeout(function() {
                        window.location.href = '<?php echo $base_url; ?>list-product.php';
                    }, 3000);
              
            }else if(response == "Existed"){
              iziToast.info({
                        title: 'Existed',
                        message: 'Already Existed'
                    });
              
            }else if (response == "Invalid") {
              iziToast.error({
                        title: 'Invalid',
                        message: 'Something Went Wrong'
                    });
            }
            
          }
        });
      });
      $("#myform").submit(function (e) {
        e.preventDefault();
               
        var formData = $("#myform").serialize();
        
        $.ajax({
          type: "POST",
          url : "<?php echo $action_url; ?>update_product.php",
          data: formData,
          beforeSend: function() {
                $('#submit').attr('disabled', true);                
                $("#submit").html("<i id='sub' class='fad fa-sync-alt fa-spin fa-lg'></i>").addClass("btn-success");
            },
          complete: function() {
                $('#submit').empty().addClass('btn btn-gradient-info').html('Add <?=$Title?>');
            $('#submit').attr('disabled', false);
            },
          success: function (response) {
            if (response == "Success") {
              iziToast.success({
                                title: 'Succes',
                                message: 'Product Updated'
                            });
             window.setTimeout(function() {
                        window.location.href = '<?php echo $base_url; ?>list-product.php';
                    }, 3000);
              
            }else if(response == "Existed"){
              iziToast.info({
                        title: 'Existed',
                        message: 'Already Existed'
                    });
              
            }else if (response == "Invalid") {
              iziToast.error({
                        title: 'Invalid',
                        message: 'Something Went Wrong'
                    });
            }
            
          }
        });
      });
    });
  </script>

</body>

</html>