<?php require_once 'config/config.php';
$Title = "Product";
$title = "product";
$Code = code($_SESSION['user_id'],'product');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add <?=$Title?></title>
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
                            <h5 class="hk-sec-title">Add <?=$Title?></h5>
                            
                            <div class="row">
                                <div class="col-sm">
                                    <form id="myform">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Product Code</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="Code" class="form-control" id="code" value="<?=$Code?>" placeholder="Code" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Product Name</label>
                                            <div class="col-sm-10">
                                                <input type="text"  name="Name" class="form-control" id="name" placeholder="Name">
                                            </div>
                                        </div>                               

                                        <div class="form-group row mb-0">
                                            <div class="col-sm-6">
                                                <button type="submit" id="submit" class="btn btn-gradient-info">Add <?=$Title?></button> 
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

   
   
   <!-- jQuery -->
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
        //$('.toggle').toggles({on:false});

//         var empty = 0;
// $('.toggle').click(function(){
//     // $(".toggle").trigger("click");
//      //$(this).trigger("click");
//      var flag = true;
     
//     $(".toggle").each(function(i) {
//     var btn = $(this);
//     if($(btn).data('toggles').active){
//         flag = false;
//         return;
//     }
//     if (flag) {
//             setTimeout(btn.trigger.bind(btn, "click"), i * 100);
//         }
    
// });
   
// });
//         $('.toggle').on('toggle', function(e, active) {
//             if(!$('.toggle').data('toggles').active){

//             }
//             $(".toggle").trigger("click");
//             $(this).trigger("click");
//             // $(this).toggles({on:true});
//   // if (active) {
//   //   empty = 1;
//   // } else {
//   //   empty = 0;
//   // }
// });


      $("#myform").submit(function (e) {
        e.preventDefault();
               
        var formData = $("#myform").serialize();
        $.ajax({
          type: "POST",
          url : "<?=$action_url?>add_product.php",
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
                                message: 'Product Added'
                            });
              var data = $("#code").val();
              $('#myform').trigger("reset");
              $("#code").val(Number(data)+1);
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