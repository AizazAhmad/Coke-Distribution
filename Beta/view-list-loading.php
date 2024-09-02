<?php require_once 'config/config.php';
$Title = "Loading";
$title = "loading";
// $deliveryman = fetchBySess($_SESSION['user_id'],'deliveryman');
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>List <?=$Title?></title>
      
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
                     <div class="row mb-3">
                          <div class="col">
                            <h5 class="hk-sec-title">Load Report</h5>
                          </div>
                          <div class="col">
                            <a class="btn btn-gradient-info float-right" href="add-loadout.php">Add LoadOut</a>
                          </div>                              
                      </div> 
                   <form id="myform" action="<?php echo $base_url; ?>list-loadout.php" method="POST">
                     <div class="row mt-2">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Select Date</label>
                        <div class="col-sm-9">
                           <input class="form-control" id="StartDate" type="text" name="Date" />                           
                        </div>
                     </div>
                     <div class="row mt-2">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Select DeliveryMan</label>
                        <div class="col-sm-9">
                           <select class="form-control" id="deliveryman" name="DeliveryManId">
                                        
                        </select>
                        
                        </div>
                     </div>
                   <div class="row mt-2 mb-4">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Select LoadNO</label>
                        <div class="col-sm-9">
                              <select class="form-control select2" id="loadno" name="LoadNo" required>
                                      
                              </select>
                              
                        </div>
                   </div>
                   <div class="row mb-1">
                      <div class="col-sm-12">
                         <button type="button" class="btn btn-gradient-info float-right" id="submit">fetch</button>
                         <button type="submit" class="btn btn-gradient-info float-right" id="submitedit">Edit</button> 
                      </div>
                   </div>
                   </form>
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
         // function edit(mech_id,row_index){
         //    var form = document.createElement("form");
         //    form.method = 'post';
         //    form.action = '<?=$base_url?>edit-<?=$title?>.php';
         //    var input = document.createElement('input');
         //    input.type = "hidden";
         //    input.name = "id";
         //    input.value = mech_id;
         //    form.appendChild(input);
         //    $(document.body).append(form);
         //    form.submit();
         // }

        // this is the id of the form
// $("#submitedit").click(function() {

    
//     $.ajax({
//            type: "POST",
//            url: "<?php echo $action_url; ?>list_loadout.php",
//            data: $("#myform").serialize()
//          });


// });

         $('#StartDate').daterangepicker({
             singleDatePicker: true,
             showDropdowns: true,
             minYear: 2010,
             maxYear: 2028,
             locale: {
               format: 'YYYY-MM-DD'
             },        
             "cancelClass": "btn-secondary"
             });

         $("#submit").click(function (){

             $.ajax({
                 type: "POST",
                 dataType : "json",
                 url: "<?php echo $action_url; ?>fetch_loadout_list.php",
                 data: $("#myform").serialize()
             }).done(function(data){
                $('#datable_1').DataTable().clear().draw();
                 var listitems = '';
                 var BS = 0;
                 table = $('#datable_1').DataTable();
                $.each(data, function(key, value){
                  if (value.Empty == "1") {
                        BS = value.Qty*24;
                  }else{
                     BS = "<div class='badge badge-warning'>No return</div>";
                  }
                    listitems = `<tr>
            <td>${value.Date}</td>            
            <td>${value.SubProductName}</td>
            <td>${value.Qty}</td>           
            <td>${value.Price}</td>           
            <td>${value.Total}</td>           
            <td>${BS}</td>          
            
        </tr>`;
        table.rows.add( $(listitems) ).draw();
                });
                
                
             });
         });

        function getstart(){
  var ldate = $("#StartDate").val(); 
             $.ajax({
            type: "POST",
            dataType : "json",
            url: "<?php echo $action_url; ?>fetch_loadout_deliveryman.php",
            data: { Date : ldate },
            success: function(data){
              if (data.length === 0) {
                return;
              }
            var deliverymanlist = '';
                $.each(data, function(key, value){
                    deliverymanlist += '<option value=' + value.Id + '>' + value.Name + '</option>';
                });
                $("#deliveryman").html(deliverymanlist);

              getloadno();
          } 
            });
 }

 function getloadno(){
  var ldate = $("#StartDate").val(); 
  var deliverymanid = $("#deliveryman option:selected").val();
             $.ajax({
            type: "POST",
            dataType : "json",
            url: "<?php echo $action_url; ?>fetch_load_no.php",
            data: { id : deliverymanid, ldate: ldate },
            success: function(data){
                var listitems = '';
                $.each(data, function(key, value){
                    listitems += '<option value=' + value.LoadNo + '>' + value.LoadNo + '</option>';
                });
                $("#loadno").html(listitems);
               
          } 
       }); 
             
  
 }

 $("#StartDate").change(function(){
            
              getstart();
          
         });

 $(window).bind("load", function () {
    getstart();
    
  });
         
      </script>
   </body>
</html>
