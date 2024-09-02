<?php require_once 'config/config.php';

$Title = "Sub Product";
$title = "sub_product";
$deliveryman = fetchRecord($_POST['DeliveryManId'],'deliveryman');

// $product = fetchBySess($_SESSION['user_id'],'deliveryman');
// $party = fetchBySess($_SESSION['user_id'],'party');
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
                            <h5 class="hk-sec-title">Record</h5>
                            <p class="mb-40">Name : <?php echo $deliveryman->Name; ?></p>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <div class="table-responsive">
                                            <table id="edit_datable_1" class="table  table-bordered table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <?php 
                                                        foreach ($_POST['SubProId'] as $sub) {
                                                        $SubProduct = fetchRecord($sub,'sub_product');
                                                    ?>
                                                        <th><?=$SubProduct->Name?></th>
                                                        <?php } ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $query = "SELECT
                                                    deliverymancustomer.*,
                                                      customer.Id as CustomersId,
                                                      customer.VoyageCode,
                                                      customer.Name  
                                                    FROM deliverymancustomer
                                                      INNER JOIN customer
                                                        ON deliverymancustomer.CustomerId = customer.Id
                                                        WHERE deliverymancustomer.DeliveryManId = {$_POST['DeliveryManId']}";
                                                    $result = $db->query($query);
                                                    while ($row = $result->fetch_object()) {
                                                        
                                                    ?>
                                                    <tr>
                                                        <td><?=$row->VoyageCode." ".$row->Name?></td>
                                                        <td>23</td>
                                                        <td>23</td>
                                                        <td>23</td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th><strong>TOTAL</strong></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
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
     <?php require_once $include_path.'footTable.php'; ?>
    <script type="text/javascript">
    $(document).ready(function () {
        iziToast.settings({
    timeout: 2500,
    resetOnHover: true,
    animateInside: true,
    transitionIn: 'bounceInUp',
    transitionOut: 'flipOutX'
});
        $('.toggle').toggles({on:false});

        var empty = 0;
        $('.toggle').on('toggle', function(e, active) {
  if (active) {
    empty = 1;
  } else {
    empty = 0;
  }
});
        $("#sale_price").keyup(function () {
            var cost = $(this).val();
            var res = cost * (0.1/100);
            $("#companytax").val(res);
        });
      $("#myform").submit(function (e) {
        e.preventDefault();
               
        var formData = $("#myform").serialize();
        $.ajax({
          type: "POST",
          url : "<?php echo $action_url; ?>add_<?=$title?>.php",
          data: formData + "&Is_Empty=" + empty,
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
                                message: '<?=$Title?> Added'
                            });
              $('#myform').trigger("reset");
              $('.toggle').toggles({on:false});
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