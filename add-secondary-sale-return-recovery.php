<?php require_once 'config/config.php';
$Title = "Empty Return";
$title = "emptyreturn";
$query = "SELECT DISTINCT
  deliveryman.Id,
  CONCAT (deliveryman.Code, deliveryman.Name) as DeliveryMan
FROM customeremptycredit
  INNER JOIN deliveryman
    ON customeremptycredit.DeliveryManId = deliveryman.Id WHERE customeremptycredit.UserId = {$_SESSION['user_id']} AND customeremptycredit.Credit>0";

    

    $result = $db->query($query);  
    $accounts = fetchBySess($_SESSION['user_id'],'accounts');  
    
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
                
            
                            
                             <div class="row">
                              <div class="col">
                                <h5 class="hk-sec-title">Add Empty Recovery</h5>
                              </div>
                              <div class="col">
                                <a class="btn btn-gradient-info float-right" href="add-secondary-sale-return.php">Back</a>
                              </div>
                              
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm">
                                    <form id="myform">
                                   <!--  <input type="hidden" name="PartyId" id="partyid"> -->
                                   <!--  <input type="hidden" name="SalesId" id="emptyid"> -->
                                 
                                 <div class="non">
                                     
                                 
                                 <div class="form-group row">
                                    
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
                                    <div class="col-sm-10">
                                       <input class="form-control" id="date" type="text" name="Date" />
                                    </div>
                                 </div>
                                 <div class="form-group row rec">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Recovery By</label>
                                    <div class="col-sm-4">
                                       <select class="form-control" id="onRecovery" name="IsRecovery">
                                         <!-- <option value="No">No</option> -->
                                         <option value="By Qty">By Qty</option>
                                         <option value="By Cash">By Account</option>
                                       </select>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Account</label>
                                    <div class="col-sm-4">
                                       <select class="form-control" id="account" name="AccountId" disabled>
                                                  
                                                    <?php for ($i=0; $i < count($accounts); $i++) {
                                                         ?>
                                                    <option value="<?=$accounts[$i]->Id?>"><?=$accounts[$i]->Name." ".$accounts[$i]->Number." [Balance: ".$accounts[$i]->Balance."]"?></option>                                        <?php } ?>            
                                                </select>
                                    </div>
                                 </div>
                                 <!-- start -->
                                 
                                
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">DeliveryMan</label>
                                            <div class="col-sm-10">
                                                
                                                <select class="form-control" id="deliverymanid" name="DeliveryManId">
                                                        <?php while ($row = $result->fetch_object()) {
                                                     ?>
                                                     <option value="<?=$row->Id?>"><?php echo $row->DeliveryMan ?></option>
                                                     <?php } ?> 
                                                </select>
                                            </div>
                                    </div>

                                 <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Customer</label>
                                            <div class="col-sm-10">
                                                
                                                <select class="form-control" id="customerid" name="CustomerId">
                                                               
                                                </select>
                                            </div>
                                    </div>
                                 <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Qty</label>
                                    <div class="col-sm-4">
                                       <input class="form-control" min="1" max="0" type="number" placeholder="Qty" name="Qty" id="qty" onInput="Update();">
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Empty On Credit</label>
                                    <div class="col-sm-4">
                                      <input type="number" class="form-control filled-input" id="rem" placeholder="0" readonly>
                                      <input type="hidden" name="RemCredit" type="number" id="remains">
                                    </div>
                                 </div>
                                 

                                  <div class="form-group row">
                                    
                                    <label for="inputEmail3" class="col-sm col-form-label">Bottles</label>
                                    <label for="inputEmail3" class="col-sm col-form-label">Shells</label>
                                    
                                 </div>
                                  <div class="form-group row">
                                    
                                    <div class="col-sm">
                                       <input type="number" name="FBottles" class="form-control filled-input" id="fbottle" placeholder="Bottles" readonly>
                                    </div>
                                    <div class="col-sm">
                                       <input type="number" name="FShell" class="form-control filled-input" id="fshell" placeholder="Shells" readonly>
                                    </div>
                                    
                                  </div>
                              
                                   </div>                                                                                   
                                      
                                        <div class="form-group row mb-0">
                                            <div class="col-sm-12">
                                                <button type="submit" id="submit" class="btn btn-gradient-info btn-block">Add <?=$Title?></button> 
                                            </div>
                                            
                                        </div>
                                
                                    </form>
                                   
                                     <div class="row">
                           <div id="loading" class="col-sm">
                              <div id="resp" class="row pt-3">
                                
                                 <style>                                            
                                    th, td {
                                    padding: 5px;
                                    }
                                 </style>
                              </div>
                           </div>
                        </div>
                                   <!--  <div class="form-group row mt-3">
                                            <div class="col-sm-12">
                                               <style type="text/css">
                                    .clss{
                                        display: block !important;
                                      height: 230px !important;
                                      overflow-y: auto !important;
                                      width: 100% !important;
                                    }
                                </style> -->
                                
                                <!-- <div class="card">
                                            <h6 class="card-header border-0">
                                                <i class="ion ion-md-clipboard font-21 mr-10"></i>Summary
                                            </h6>
                                            <div class="card-body pa-0">
                                                <div class="table-wrap">
                                                    <div class="table-responsive" style="height: 200px;">
                                                        <table class="table table-sm mb-0">
                                                          <thead>
                                                                <tr class="bg-light">
                                                                    <th class="text-dark text-uppercase" scope="row">Customer</th>
                                                                    
                                                                    <th class="text-dark text-uppercase" scope="row">Bottles</th>                                 
                                                                    <th class="text-dark font-18" scope="row">Shells</th>                                          
                                                                    <th class="text-dark font-18" scope="row">Action</th>                                          
                                                                </tr>
                                                            </thead>
                                                            <tbody id="CusInvo">
                                                                
                                                                
                                                            </tbody>
                                                            <tfoot>
                                                                <tr class="bg-light">
                                                                    <th class="text-dark text-uppercase" scope="row">Customer</th>
                                                                    
                                                                    <th class="text-dark text-uppercase" scope="row">Bottles</th>
                                                                    <th class="text-dark font-18" scope="row">Shells</th>                                         
                                                                    <th class="text-dark font-18" scope="row">Action</th>                                         
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  -->
                                          <!--   </div>
                                            
                                    </div> -->
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
      <!-- Toggles JavaScript -->
      
            <!-- /Footer -->
        </div>
        <!-- /Main Content -->

    </div>
    <!-- /HK Wrapper -->

   
   
   <!-- jQuery -->
     <?php require_once $include_path.'foot.php'; ?>
    <script type="text/javascript">    

      
      function Dcheck(){
        $('.custom-control-input').each(function () {
            $(':checkbox:checked').prop('disabled', true);
                
            });
      }
      function Ocheck(){
        $('.custom-control-input').each(function () {
            $(':checkbox:checked').prop('disabled', false);
                
            });
      }
      function Clear(){
        $("#fbottle").val("");
        $("#fshell").val("");
        $("#rem").val("");
        $("#qty").val("");

        // $("#emptyid").val("");

      }
      var ConditionOK = true;
      
       
    function getstart(){
  var ldate = $("#date").val(); 
             $.ajax({
            type: "POST",
            dataType : "json",
            url: "<?php echo $action_url; ?>fetch_sec_sale.php",
            data: { Date : ldate },
            success: function(data){
                
                
              if (data.length === 0) {
                prevent = true;
                $("#deliverymanid").empty();
                return;
              }
            var deliverymanlist = '';
                $.each(data, function(key, value){
                    deliverymanlist += '<option value=' + value.DeliveryManId + '>' + value.Name + '</option>';
                });

                $("#deliverymanid").html(deliverymanlist);

        // call next ajax function
              getcus();
          } 
            });
 }

 function getcus(){
  var ldate = $("#date").val(); 
  var deliverymanid = $("#deliverymanid option:selected").val();
             $.ajax({
            type: "POST",
            dataType : "json",
            url: "<?php echo $action_url; ?>fetch_sec_sale_cus.php",
            data: { deliverymanid : deliverymanid, Date: ldate },
            success: function(data){
                var listitems = '';
                $.each(data, function(key, value){
                    listitems += '<option value=' + value.CustomerId + '>' + value.Name + '</option>';
                });
                $("#customerid").html(listitems);
        // call next ajax function                 
             // deliverymancustomer();

              loadEmpty();

          } 
       }); 
             
  
 }

 // function loadEmpty(){
 //  var ldate = $("#date").val(); 
 //  var deliverymanid = $("#deliverymanid option:selected").val();
 //  var customerid = $("#customerid option:selected").val();
 //             $.ajax({
 //            type: "POST",
 //            dataType : "json",
 //            url: "<?php echo $action_url; ?>fetch_sec_sale_rec.php",
 //            data: { deliverymanid : deliverymanid, Date: ldate, CustomerId: customerid },
 //            success: function(data){
 //               console.log(data);
 //        // call next ajax function               
 //              var Qty = data.TQty;
 //          // if (Qty == 0 || Qty == null) {
 //          //   getdeliverymens();
 //          // }
          
 //           // $("#emptyid").val(data.Id);
 //           $("#qty").prop('max',Qty);           
 //           $("#rem").val(Qty);
           
 //           Update();

 //          } 
 //       }); 
             
  
 // }

      function getdeliverymens(){

        var deliverymanid = $("#deliverymanid option:selected").val();
        if (deliverymanid == null) {
          return;
        }
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo $action_url; ?>fetch_deliveryman_active_customers.php",
            data: { deliverymanid : deliverymanid },
                 success: function(data){
                    console.log(data);
                  if (data.length === 0) {
                  $("#customerid").empty();                
                  return;
                }
                  var customerlist = '';
                  $.each(data, function(key, value){
                      customerlist += '<option value=' + value.Id + '>' + value.Name + '</option>';
                  });
                                    
                  $("#customerid").html(customerlist);
        
              fetchproducts();               
               

       }
        });
      }

      function fetchproducts(){
       var customerid = $("#customerid option:selected").val();
       
        $('#resp').empty();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo $action_url; ?>fetch_empty_remaining.php",
            data: { Id : customerid } 
        }).done(function(data){
          
          var Qty = data.Credit;
          // if (Qty == 0 || Qty == null) {
          //   getdeliverymens();
          // }
          
           // $("#emptyid").val(data.Id);
           $("#qty").prop('max',Qty);           
           $("#rem").val(Qty);
           $("#remains").val(Qty);
           Update();
            

        });
      }

      function Update(){
       var Qty = $("#qty").val();
       $("#fbottle").val(Qty*24);
       $("#fshell").val(Qty);
      }

    // $(".emp").hide();
    // $(".non").hide();
    $(document).ready(function () {
        iziToast.settings({
    timeout: 2500,
    resetOnHover: true,
    animateInside: true,
    transitionIn: 'bounceInUp',
    transitionOut: 'flipOutX'
});
        

        $("#deliverymanid").change(function(){
            $('input[type=checkbox]').each(function() 
{ 
        this.checked = false; 
});
            //getstart();
        getdeliverymens();
       
        
    });
        $("#customerid").change(function(){
            $('input[type=checkbox]').each(function() 
{ 
        this.checked = false; 
});
            //loadEmpty();
        fetchproducts();
        
    });

//         if(!$('#emptyrecovery').is(':disabled')){
//                 //addcredit($("#emptyrecovery").val(),$("#CustomerId").val());
//                  $("#emptyrecovery").val("");                
//                 $("#emptyrecovery").prop('disabled',true);
//                 $("#emptyrecovery").toggleClass("filled-input");
// }



$("#onRecovery").change(function(){
            var onRecovery = $("#onRecovery option:selected").val();
            
            if(onRecovery == "By Qty"){
                           
              $("#account").addClass("filled-input");
              $("#account").prop('disabled', true); 
              $("#qty").prop('disabled', false);
              $("#qty").removeClass("filled-input");             
              
              Dcheck();
            }if(onRecovery == "By Cash"){
              Dcheck();
              
              $("#account").prop('disabled', false);
              $("#account").removeClass("filled-input");
              $("#qty").addClass("filled-input");
              $("#qty").prop('disabled', true);
              $("#qty").val('0');
              
            }

         });

// $("#returnType").change(function(){
//             var returnType = $("#returnType option:selected").val();
            
//             if (returnType == "Current Sale") {
//                 $(".non").show();
//                 $(".rec").hide();
//               $("#emptyrecovery").prop('disabled', true);
//               $("#emptyrecovery").addClass("filled-input");
//               $(".emp").show();                
//                       Ocheck();
//             }
//             if (returnType == "Recovery") {
//                 $(".non").show();
//                 $(".rec").show();
//                 $(".emp").hide();
//             }
//             if (returnType == "None") {
//                 $(".non").hide();
//             }

//          });



      $("#myform").submit(function (e) {
        e.preventDefault();     
           // if ($("#salesid").val() == "") {
           //  iziToast.error({
           //                      title: 'None',
           //                      message: 'None Item Selected'
           //                  });
           //  return;
           // }
        var formData = $("#myform").serialize();
        
        
        if ($("#qty").val() == "") {

          iziToast.error({
                                title: 'Empty Fieled',
                                message: 'Enter The Qty'
                            });

          return;
        }

        $.ajax({
          type: "POST",
          url : "<?php echo $action_url; ?>add_secondary_empty_return_recovery.php",
          data: formData + "&DeliverManName=" + $("#deliverymanid option:selected").text(),
          beforeSend: function() {
                $("#submit").attr('disabled', true);                
                $("#submit").html("<i class='fad fa-sync-alt fa-spin fa-lg'></i>").addClass("btn-success");
            },
          complete: function() {
                $("#submit").empty().html('Add <?=$Title?>');
            $("#submit").attr('disabled', false);
            },
          success: function (response) {
            if (response == "Success") {
              iziToast.success({
                                title: 'Succes',
                                message: '<?=$Title?> Added'
                            });
              //$("#customerid option:selected").remove();
              Clear();
              fetchproducts();
              //loadEmpty();
              //chunk();
              // var card = "#card" + $("#salesid").val();
              
  //             setTimeout( function(){ 
  //   //fetchproducts(); 
  // }  , 1000 );
              
              // $(card).remove();
             //$("#CustomerId option:selected").remove();
              //$('#subproduct').children().remove();
             
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

      $('input[name="Date"]').daterangepicker({
             singleDatePicker: true,
             showDropdowns: true,
             minYear: 2010,
             maxYear: 2028,
             locale: {
               format: 'YYYY-MM-DD'
             },        
             "cancelClass": "btn-secondary"
             });


    });
    
    // var otal = 0;
    function chunk(){

              // otal += Number($("#payable").val());
              // $("#GRND").text(otal.toFixed(2));
              var customer = $("#customerid option:selected").text();
              var qty = $("#qty").val();              
              var bottle = $("#fbottle").val();
              var shell = $("#fshell").val();
             
             if ($('#BER').is(':checked')) {
                var action = "Returned";
             }
             if ($('#BPC').is(':checked')) {
                var action = "Cash Added";
             }
             if ($('#BPL').is(':checked')) {
                var action = "Credited";
             }
                // $("#CusInvo").append("<tr><td class='w-70'>"+customer+"</td><td class='w-10'>"+bottle+"</td><td class='w-10'>"+shell+"</td><td class='w-10'>"+action+"</td></tr>");
                          
              
    }
    // function sett(id){
    
    //   $.ajax({
    //         type: "POST",
    //         dataType: "json",
    //         url: "<?php echo $action_url; ?>fetch_sec_record.php",
    //         data: { Id : id } 
    //     }).done(function(data){

           
            
    //         });

    // }
    // function chunking(id,text,Qty,Total) {
           

    //          var abc = `<div id="card${id}" class="col-lg-4 col-sm-12">
    //                                              <div class="card">
    //                                                      <span id="${id}" onclick="sett(this.id)" class="btn btn-gradient-info btn-block">${text}</span>
    //                                                  <div id="collapse_${id}" class="collapse show">
    //                                                      <div class="card-body">
    //                                                      <table style="width:100%">
    //                                                          <tr>
    //                                                              <th>Qty</th>
    //                                                              <th>Total</th>                                  
    //                                                          </tr>
    //                                                          <tr>
    //                                                              <td>${Qty}</td>
                                                                                                                             
    //                                                              <td>${Total}</td> 

    //                                                          </tr>
    //                                                      </table>
    //                                                      </div>                                              
    //                                                  </div>                                                     
    //                                              </div>
    //                                          </div>`;
    //                                          return abc;
            
    //      }
    
  </script>

  <script type="text/javascript">
  $(window).bind("load", function () {
    getdeliverymens();
    //getstart();
  });
</script>
</body>

</html>