<?php require_once 'config/config.php';
$Title = "Stock";
$title = "stock";
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Stock Adjustment</title>
      
      <!-- Data Table CSS -->
      <link href="<?=$base_url?>vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
      <link href="<?=$base_url?>vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet"
         type="text/css" />      
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
                     <h5 class="hk-sec-title" style="margin-top: 10px">Stock Adjustment</h5>

                     <div class="row">
                        <div class="col-sm">
                           <div class="table-wrap">
                              
                              <?php require_once $action_path.$title.'_view_list.php'; ?>
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
      <script type="text/javascript">
         function sample(mech_id,row_index){
            var form = document.createElement("form");
            form.method = 'post';
            form.action = '<?=$base_url?>add-sample.php';
            var input = document.createElement('input');
            input.type = "hidden";
            input.name = "id";
            input.value = mech_id;
            form.appendChild(input);
            $(document.body).append(form);
            form.submit();
         }

         function waterloss(mech_id,row_index){
            var form = document.createElement("form");
            form.method = 'post';
            form.action = '<?=$base_url?>add-water-loss.php';
            var input = document.createElement('input');
            input.type = "hidden";
            input.name = "id";
            input.value = mech_id;
            form.appendChild(input);
            $(document.body).append(form);
            form.submit();
         }

        
         
      </script>
   </body>
</html>
