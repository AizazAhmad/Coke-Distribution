<?php require_once 'config/config.php';
   $Title = "Sub Product";
   $title = "sub_product";
   //$deliveryman = fetchBySess($_SESSION['user_id'],'deliveryman');
   // $query = "SELECT
   //   sub_product.Id,
   //   sub_product.Code,
   //   sub_product.Name,
   //   sub_product.Sale+sub_product.CompanyTax as Price,     
   //   sub_product.Is_Empty
   // FROM sub_product WHERE sub_product.UserId = {$_SESSION['user_id']}";
   // $res = $db->query($query);
  
   //$sub_product = fetchBySess($_SESSION['user_id'],'sub_product');
   $accounts = fetchBySess($_SESSION['user_id'],'accounts');
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Secendary Sale</title>
      <!-- select2 CSS -->
      
      <!-- Pickr CSS -->
      
      <link href="<?=$base_url?>dist/izi-toast/css/iziToast.min.css" rel="stylesheet" type="text/css">
      <?php require_once $include_path.'head.php'; ?>
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-sanitize.js"></script> -->
      <style type="text/css">
          
.container {
    max-width: 1240px;
} 
      </style>
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
               <div class="row" ng-app="">
                  <div class="col-xl-12">
                     <section class="hk-sec-wrapper">
                       <div class="row mb-3">
                          <div class="col">
                            <h5 class="hk-sec-title">Secondary Sales</h5>
                          </div>
                          <!-- <div class="col">
                            <button class="btn btn-danger float-right" href="javascript:void(0)" id="closing" onclick="closing()">Closing</button>
                          </div>  -->                             
                      </div>
                        <div class="row">
                           <div class="col-sm-8">
                              <form  action="<?php echo $base_url; ?>submit-sale.php" method="POST">
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-2 col-form-label">Total Credit Limit</label>
                                    <div class="col-sm">                                       
                                       <input class="form-control filled-input" id="creditlimit" type="text" placeholder="00.00" readonly>
                                    </div>
                                    
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Remaining Credit Limit</label>
                                    <div class="col-sm">                                       
                                       <input class="form-control filled-input" id="remcl" type="text" placeholder="00.00" readonly>
                                    </div>
                                   <label for="inputEmail3" class="col-sm-2 col-form-label">Credit Amount</label>
                                    <div class="col-sm">                                       
                                       <input class="form-control filled-input" id="balance" type="text" placeholder="00.00" readonly>
                                    </div>
                                   
                                 </div>
                                 <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Booking Date</label>
                                    <div class="col-sm-4">
                                       <input class="form-control DTE" id="BDate" type="text" name="lday" />
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Sale Date</label>
                                    <div class="col-sm-4">
                                       <input class="form-control DTE" id="Date" type="text" name="day" />
                                    </div>
                                 </div>

                                 <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Root</label>
                                    <div class="col-sm-10">
                                       <select class="form-control" id="rootid" name="RootId" required>
                                               
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Delivery Man</label>
                                    <div class="col-sm-10">
                                       <select class="form-control" id="deliveryman" name="DeliveryManId" required>
                                               
                                       </select>
                                    </div>
                                 </div>
                                 
                                 <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Outlet Name</label>
                                    <div class="col-sm-10">
                                       <select class="form-control select2" id="CustomerId" name="CustomerId">
                                       </select>
                                    </div>
                                    
                                 </div>
                                 
                                 <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Sub Product</label>
                                    <div class="col-sm-10">
                                       <select id="sel" class="select2 select2-multiple" multiple="multiple" data-placeholder="Choose" name="SubProId[]" required>
                                         
                                       </select>
                                    </div>
                                    <!-- <div class="col-sm-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="scheckbo">
                                            <label class="custom-control-label" for="scheckbo"></label>
                                        </div>
                                    </div> -->
                                 </div>
                                 <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Total Inv</label>
                                    <div class="col-sm-10">
                                       <input class="form-control" type="text" placeholder="Total Inv" name="TotalInv" id="totalinv" readonly>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Credit</label>
                                    <div class="col-sm-4">
                                       <select class="form-control" id="onCredit">
                                         <option value="0">No</option>
                                         <option value="1">Yes</option>
                                       </select>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Credit Payment</label>
                                    <div class="col-sm-4">
                                       <input class="form-control filled-input" type="text" placeholder="On Credit" name="Credit" id="oncredit" disabled>
                                    </div>
                                 </div>

                                 <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Credit Recovery</label>
                                    <div class="col-sm-4">
                                       <select class="form-control" id="creditRecovery">
                                         <option value="0">No</option>
                                         <option value="1">Yes</option>
                                       </select>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Recovery</label>
                                    <div class="col-sm-4">
                                       <input class="form-control filled-input" type="text" placeholder="Credit Recovery" name="Debit" id="creditrecovery" disabled>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                   <label for="inputEmail3" class="col-sm-2 col-form-label">Empty Returned</label>
                                    <div class="col-sm-4">
                                       <select class="form-control" id="return" name="IsReturn">
                                         <option value="0">No</option>
                                         <option value="1">Yes</option>
                                       </select>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Account</label>
                                    <div class="col-sm-4">
                                       <select class="form-control filled-input" id="account" name="AccountId">
                                                  
                                                    <?php for ($i=0; $i < count($accounts); $i++) {
                                                         ?>
                                                    <option value="<?=$accounts[$i]->Id?>"><?=$accounts[$i]->Name." ".$accounts[$i]->Number." [Balance: ".$accounts[$i]->Balance."]"?></option>                                        <?php } ?>            
                                                </select>
                                    </div>
                                 </div>
                                 
                              </form>
                              
                           </div>
                           
                           <div class="col-sm-4">
                            
                                <style type="text/css">
                                    .clss{
                                        display: block !important;
                                      height: 430px !important;
                                      overflow-y: auto !important;
                                      width: 100% !important;
                                    }
                                </style>
                                <div class="card clss">
                                            <h6 class="card-header border-0">
                                                <i class="ion ion-md-clipboard font-21 mr-10"></i>Summary
                                            </h6>
                                            <div class="card-body pa-0">
                                                <div class="table-wrap">
                                                    <div class="table-responsive" style="height: 200px;">
                                                        <table class="table table-sm mb-0">
                                                            <tbody id="CusInvo">
                                                                
                                                                
                                                            </tbody>
                                                            <tfoot>
                                                                <tr class="bg-light">
                                                                    <th class="text-dark text-uppercase" scope="row">Grand</th>
                                                                    <th class="text-dark font-18" scope="row" id="GRND"></th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div id="PET">
                                          <i class="fad fa-money-check-alt fa-3x" id="Credit"></i><span class="display-5">On Credit</span>
                                        </div> -->
                                        <div class="form-group row">
                                    
                                 </div>
                                      
                           </div>
                           <div class="col-sm-12">
                                 <button type="submit" id="allsubmit" class="btn btn-block btn-gradient-info"><i id='sub' class='spinner-grow spinner-grow-sm mr-1'></i>Submit</button> 
                            </div>
                        </div>
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
        $('.DTE').daterangepicker({
             singleDatePicker: true,
             showDropdowns: true,
             minYear: 2010,
             maxYear: 2028,
             locale: {
               format: 'YYYY-MM-DD'
             },        
             "cancelClass": "btn-secondary"
             });

       

function automate() {
  $("#sel > option").prop("selected","selected");// Select All Options
    $("#sel").trigger("change");// Trigger change to select 2
    $("#sel option").each(function(i,el){
      // $(this).attr('selected', true);
      var stock = el.attributes['data-stock'].value;
      var price = el.attributes['data-price'].value;
      var empty = el.attributes['data-empty'].value;
      var bprice = el.attributes['data-bprice'].value;
      var cusqty = el.attributes['data-customerqty'].value;
      var promo = el.attributes['data-promo'].value;
      var extrashare = el.attributes['data-extrashare'].value;
      var id = el.value;
      var text = el.text;   
     
      $("#resp").prepend(chunk(id,el.text,empty,price,stock,bprice,cusqty,promo,extrashare));
      
     
});
}
function chunk(id,text,empty,price,stock,bprice,cusqty,promo,extrashare) {
           

             var abc = `<div id="cardform${id}" class="col-lg-6 col-sm-12">
                                                 <div class="card">
                                                         <span class="btn btn-gradient-info btn-block">${text}</span>
         
                                                     <form id='form${id}' price="${price}" class="allforms">
                                                     <input type="hidden" Name="SubProductId" value="${id}">
                                                     
                                                     <div id="collapse_${id}" class="collapse show">
                                                         <div class="card-body">
                                                         <table style="width:100%">
                                                             <tr>
                                                                 <th>Qty</th>
                                                                 <th>Promo</th>
                                                                 <th>ExtraShare</th>
                                                                 <th>Before Tax Rate</th>
                                                                 `;
                                                             //     if (empty == "1") {
                                                             //        abc +=  `
                                                                 
                                                             //     `
                                                             // }
                                                             abc +=`
                                                                 
                                                                 <th>After Tax Rate</th>
                                                                 
                                                                 
                                                                 
                                                             </tr>
                                                             <tr>
                                                                 <td><input type="number" id="qtyform${id}" class="w-50p Triggered" max="${stock}" onInput="updatePrice(this.id,this.value,this.max,this);" price="${price}" name="Qty" value="${cusqty}"></td>
                                                                 <input type="hidden" id="actualprice${id}" value="${price}">
                                                                 <input type="hidden" id="actualbprice${id}" value="${bprice}">
                                                                 <input type="hidden" class="TTP" name="Total" id="totalPrice${id}" value="">
                                                                 <td><input type="number" onInput="updatePrice(this.id);" id="promo${id}" class="w-50p Triggered" value="${promo}" name="Promo"></td>
                                                                 <td><input type="number" value="${extrashare}" onInput="updatePrice(this.id);" id="extra${id}" class="w-50p Triggered" name="ExtraShare"></td>
                                                                  `;
                                                                 if (empty == "1") {
                                                                    abc +=  `
                                                                 
                                                                 <input type="hidden" value="1" Name="Empty">
                                                                 `
                                                             }
                                                             if (empty == "0") {
                                                                    abc +=  `
                                                                 
                                                                 <input type="hidden" value="0" Name="Empty">
                                                                 `
                                                             }
                                                             abc +=`

                                                                 <td id="bprice${id}">${bprice}</td>
                                                                 <td id="price${id}">${price}</td>
                                                                  
                                                    
                                                    
                                        </div></td>
                                                             </tr>
                                                         </table>
                                                         </div>                                                
                                                         
                                                     </div>
                                                     </form>
                                                 </div>
                                             </div>`;
                                             return abc;
            
         }
        
// $("#scheckbo").click(function(){
//     if($("#scheckbo").is(':checked') ){
//         automate();
//     }else{
//       $("#resp").empty();
//        $("#sel").val(null).trigger("change");
        
//      }
// });
 // $("#semptyqty").keyup(function () {
 //            var qty = $(this).val();
 //            var res = qty * Number($("#semptyrate").val());
 //            $("#set").text(res);                        
 //        });
 // $("#sshellqty").keyup(function () {
 //            var qty = $(this).val();
 //            var res = qty * Number($("#sshellrate").val());
 //            $("#sst").text(res);            
 //        });
 // $("#pemptyqty").keyup(function () {
 //            var qty = $(this).val();
 //            var res = qty * Number($("#pemptyrate").val());
 //            $("#pet").text(res);
 //        });
 // $("#pshellqty").keyup(function () {
 //            var qty = $(this).val();
 //            var res = qty * Number($("#pshellrate").val());
 //            $("#pst").text(res);
 //        });
 var prevent = false;
 $(document).ajaxStart(function() {
    $('#sub').show(); // show the gif image when ajax starts
});
$(document).ajaxStop(function() {
   $("#sub").hide();
});
// function closing() {
//   var date = $("#LDate").val(); 
//   $.post('<?php echo $action_url; ?>/closing.php', {Date: date}, function(response) {
    
//     if (response == "Success") {
//       iziToast.success({
//                                      title: 'Success',
//                                      message: 'Record Closed'
//                                  });
//       $("#closing").prop('disabled',true);

//     }
//     if (response == "Existed") {
//       $("#closing").prop('disabled',true);
//     }
//     if (response == "Null") {
//        iziToast.error({
//                                      title: 'No Record',
//                                      message: 'Null Records Found'
//                                  });
//     }
// });
// }

// function checkclosing() {
//   var date = $("#LDate").val(); 
//   $.post('<?php echo $action_url; ?>/checkclosing.php', {Date: date}, function(response) {
    
//     if (response == "Existed") {
//       iziToast.success({
//                                      title: 'Record',
//                                      message: 'Record Closed On This Date!'
//                                  });
//       $("#closing").prop('disabled',true);

//     }
//     if (response == "Success") {
//       $("#closing").prop('disabled',false);
//     }
// });
// }

 function getstart(){
  var BDate = $("#BDate").val(); 
             $.ajax({
            type: "POST",
            dataType : "json",
            url: "<?php echo $action_url; ?>fetch_booking_root.php",
            data: { BDate : BDate },
            success: function(data){
              if (data.length === 0) {
                prevent = true;
                $("#deliveryman").empty();
                $("#CustomerId").empty();
                $("#rootid").empty();
                return;
              }
            var rootlist = '';
                $.each(data, function(key, value){
                    rootlist += '<option value=' + value.Id + '>' + value.Name + '</option>';
                });
                $("#rootid").html(rootlist);

        // call next ajax function
              start();
          } 
            });
 }
 function start(){

             $.ajax({
            type: "POST",
            dataType : "json",
            url: "<?php echo $action_url; ?>fetch_deliveryman.php",
            success: function(data){
              if (data.length === 0) {
                prevent = true;
                $("#deliveryman").empty();
                $("#CustomerId").empty();
                $("#rootid").empty();
                return;
              }
            var deliverymanlist = '';
                $.each(data, function(key, value){
                    deliverymanlist += '<option value=' + value.Id + '>' + value.Name + '</option>';
                });
                $("#deliveryman").html(deliverymanlist);

        // call next ajax function
              rootcustomer();
          } 
            });
 }
 function remcl(){
  var credit = $("#balance").val();
  var limit = $("#creditlimit").val();
  $("#remcl").val(limit-credit);
 }
 function rootcustomer(){
  var BDate = $("#BDate").val(); 
  var rootid = $("#rootid option:selected").val();
  $.ajax({
                 type: "POST",
                 dataType : "json",
                 url: "<?php echo $action_url; ?>fetch_bookingcustomer.php",
                 data: { RootId : rootid, BDate, BDate },
                 success: function(data){

                  var customerlist = '';
                  $.each(data, function(key, value){
                      customerlist += '<option value=' + value.Id + '>' + value.Name + '</option>';
                  });
                  $("#CustomerId").html(customerlist);
        // call next ajax function
               getbalance();
               getCreditLimit();
               loadoutsubproduct();

       }
             });
 }
 function loadoutsubproduct(){
  var BDate = $("#BDate").val();  
  var CustomerId = $("#CustomerId option:selected").val();
             
              $.ajax({
                 type: "POST",
                 dataType : "json",
                 url: "<?php echo $action_url; ?>fetch_loadout_subproduct.php",
                 data: { CustomerId : CustomerId, BDate: BDate },
                 success: function(data){
                  $("#resp").empty();
                  $("#sel").empty().trigger('change');
                  
                  if (data.length === 0) {
                      prevent = true;
                      $("#deliveryman").empty();
                      $("#CustomerId").empty();
                      $("#rootid").empty();
                      return;
                  }
                  
                  var productlist = '';
                  $.each(data, function(key, value){
                      productlist += '<option value=' + value.Id + ' data-customerqty=' + value.CustomerQty + ' data-promo=' + value.Promo + ' data-extrashare=' + value.ExtraShare + ' data-empty=' + value.Is_Empty + ' data-price=' + value.Price + ' data-stock=' + value.Stock + ' data-bprice=' + value.BPrice + '>' + value.Name + '  --   Stock ( ' + value.Stock + ' )</option>';
                  
                  });
                   
                  $("#sel").append(productlist);
                  automate();

                  $(".Triggered").each(function() {    
                  $(this).trigger("input");
              });

                  prevent = true;
      
               }
             });
 }
 // function getloadno(){
 //  var LDate = $("#Date").val(); 
 //  var rootid = $("#rootid option:selected").val();
 //             $.ajax({
 //            type: "POST",
 //            dataType : "json",
 //            url: "<?php echo $action_url; ?>fetch_load_no.php",
 //            data: { RootId : rootid, ldate: LDate },
 //            success: function(data){
 //                var listitems = '';
 //                $.each(data, function(key, value){
 //                    listitems += '<option value=' + value.LoadNo + '>' + value.LoadNo + '</option>';
 //                });
 //                $("#loadno").html(listitems);
 //        // call next ajax function                 
             

              

 //          } 
 //       }); 
             
  
 // }



function getbalance(){
  var CustomerId = $("#CustomerId option:selected").val();
         if (jQuery('#CustomerId').val() == null) {
          $("#remcl").val("00.00");
          return;
         }
             $.ajax({
                 type: "POST",
                 url: "<?php echo $action_url; ?>fetch_balance.php",
                 data: { id : CustomerId } 
             }).done(function(data){
                 $("#balance").val(data);
                 remcl();
             });
 }
function getCreditLimit(){
  var CustomerId = $("#CustomerId option:selected").val();
         if (jQuery('#CustomerId').val() == null) {
          $("#remcl").val("00.00");
          return;
         }
             $.ajax({
                 type: "POST",
                 url: "<?php echo $action_url; ?>fetch_credit_limit.php",
                 data: { id : CustomerId } 
             }).done(function(data){
              
                 $("#creditlimit").val(data);
                 remcl();
             });
 }

function getallt(){
    var mvar = 0;
    $(".TTP").each(function() {
    //console.log($(this).val());
    mvar += Number($(this).val());
});
    $("#totalinv").val(mvar.toFixed(2));
}

function isEmpty(item){
    if(item){
        return item;
    }else{
        return 0;
    }
}

var totalinv = 0;

updatePrice = function(id,value,max,el) {
 

    var id = id.replace(/\D/g,'');
    var qtyform = "#qtyform"+id;
    
    var promo = "#promo"+id;
    var extra = "#extra"+id;
    

    var qty = $(qtyform).val();   
    var pro = isEmpty($(promo).val()); 
    var ext = isEmpty($(extra).val());
    
     
   if (parseInt(value) > parseInt(max)) {
   
      $(el).val(max)
      qty = max;
      
 }
    
    totalinv += Number($("#totalinv").val());
    
    //console.log("Qty: "+qty+" HTH: "+hth+" pro: "+pro+" extra: "+ext);
    var deduct = Number(pro) + Number(ext);
    var deduct = deduct*qty;
    
    var bdeduct = Number(pro)*qty;
    //console.log(deduct);
    var mainprice = "#price"+id;
    
    var price = "#actualprice"+id;
    var abprice = "#actualbprice"+id;
    var tot = "#totalPrice"+id;
    var bprice = "#bprice"+id;
    var pr = $(price).val();
    var bpr = $(abprice).val();
   
    if (qty == 0 || qty == "") {

         $(mainprice).html(pr);
         $(bprice).html(bpr);
         $(tot).val("0");
         return;
    }  
  
  var re = pr * qty ;
  var bre = bpr * qty ;
  var res = re - deduct; 
  var bres = bre - bdeduct; 
  $(mainprice).text(res.toFixed(2));
  $(bprice).text(bres.toFixed(2));
  $(tot).val(res.toFixed(2));
  getallt();
}
function addcredit(payment,customerid,deliverymanid){
  var date = $("#Date").val();
  $.ajax({
                 type: "POST",
                 url: "<?php echo $action_url; ?>add_credit.php",
                 data: { Credit : payment, CustomerId : customerid, DeliveryManId : deliverymanid, Date: date } 
             }).done(function(data){
                 console.log(data);
             });
}

function addRecovery(payment,customerid,deliverymanid,accountid){
  var date = $("#Date").val();
  $.ajax({
                 type: "POST",
                 url: "<?php echo $action_url; ?>add_recovery.php",
                 data: { Debit : payment, CustomerId : customerid, DeliveryManId : deliverymanid, AccountId : accountid, Date: date } 
             }).done(function(data){
                 console.log(data);
             });
}
function addInv(payment,customerid,deliverymanid,accountid){
  var date = $("#Date").val();
  if (!$('#oncredit').is(':disabled')) {
    var crdt = Number($("#oncredit").val());
    payment = payment - crdt;
  }
  $.ajax({
                 type: "POST",
                 url: "<?php echo $action_url; ?>add_salecash.php",
                 data: { Debit : payment, CustomerId : customerid, DeliveryManId : deliverymanid, AccountId : accountid, Date: date } 
             }).done(function(data){
                 console.log(data);
             });
}
//  $(document).on('input change keyup paste', '.ismax', function () {
//     // console.log('Max value: ' + parseInt(this.max) + ' Qty Is: '+ parseInt(this.value));

//     if (this.max) this.value = Math.min(parseInt(this.max), parseInt(this.value) || 0);
// });
         $(document).ready(function () {
           //getcustomers();
          
           
            var price = 0;
            var totalGrand = 0;

                     iziToast.settings({
         timeout: 2500,
         resetOnHover: true,
         animateInside: true,
         transitionIn: 'bounceInUp',
         transitionOut: 'flipOutX'
         });
         
             $("#allsubmit").click(function (){

              addInv($("#totalinv").val(),$("#CustomerId").val(),$("#deliveryman option:selected").val(),$("#account option:selected").val());

              if(!$('#oncredit').is(':disabled')){

                
                if (jQuery('#CustomerId').val() == null) {
                     iziToast.error({
                             title: 'Empty',
                             message: 'Please Select the Customer'
                         });
                     flag = 0;
                     return;
                 }
                 if (jQuery("#sel").val() == "") {
                     iziToast.error({
                             title: 'Empty',
                             message: 'Please Choose the Sub Product'
                         });
                     flag = 0;
                     return;
                 }

                 addcredit($("#oncredit").val(),$("#CustomerId").val(),$("#deliveryman option:selected").val());
                 $("#oncredit").val("");                
                $("#oncredit").prop('disabled',true);
                $("#oncredit").toggleClass("filled-input");
}
if(!$('#creditrecovery').is(':disabled')){

  addRecovery($("#creditrecovery").val(),$("#CustomerId").val(),$("#deliveryman option:selected").val(),$("#account option:selected").val());
                $("#creditrecovery").val("");                
                $("#creditrecovery").prop('disabled',true);
                $("#creditrecovery").toggleClass("filled-input");
}
                  
                 var deliveryman = $("#deliveryman").val();
                 var customer = $("#CustomerId").val();
                 var customerName = $("#CustomerId option:selected").text();
                 var date = $("#Date").val();
                 var BDate = $("#BDate").val();
                 var rootid = $("#rootid option:selected").val();
                 var account = $("#account option:selected").val();
                 var returned = $("#return option:selected").val();

                 var flag = 1;
                  
                 $(".allforms").each(function(){                 
                 var id = $(this).attr("id").replace(/\D/g,'');
                 var pri = "#totalPrice"+id; 
                 var pr = parseFloat($(pri).val());               
                 var card = "#cardform"+id;
                 var qty = "#qtyform"+id;
                 var crr = "#cr"+id;
                 var max = $(qty).attr("max");
                 var selecteditem = "#sel option[value="+id+"]";
                 
                 if ($(qty).val() == "") {
                    iziToast.error({
                             title: 'Empty',
                             message: 'Please Fill the Quantity'
                         });
                    flag = 0;
                     return;
                 }
                 var stockcheck = Number($(qty).val());
                 max = Number(max);
                 // console.log(typeof stockcheck);
                 // return;
                 if (stockcheck > max) {
                    
                    iziToast.error({
                             title: 'Stock',
                             message: 'Please Fill the Available Stock'
                         });
                    flag = 0;
                     return;
                 }

                 if(!$(crr).is(':checked')){
                  price += pr;
                 }
                
                 $.ajax({
               type: "POST",
               url : "<?php echo $action_url; ?>sales.php",
               data: $(this).serialize() + "&LDate=" + date + "&DeliveryManId=" + deliveryman + "&CustomerId=" + customer + "&IsReturned=" + returned + "&BDate=" + BDate + "&RootId=" + rootid + "&AccountId=" + account,
                beforeSend: function() {
                 $("#allsubmit").attr("disabled", true);                
                $("#sub").show();
            },complete: function() {
                $("#sub").hide();
                $("#allsubmit").attr('disabled', false);
                $(selecteditem).prop("selected", false).parent().trigger("change");
            },
               success: function (response) {
                 if (response == "Success") {
                   iziToast.success({
                                     title: 'Succes',
                                     message: 'Order Placed'
                                 });
                   // $(this).trigger("reset");

                  $(card).empty();
                 }else if (response == "Invalid") {
                   iziToast.error({
                             title: 'Invalid',
                             message: 'Something Went Wrong'
                         });
                   flag = 0;

                 }
                 // else if (response == "Limited") {
                 //   iziToast.error({
                 //             title: 'Limited',
                 //             message: 'Stock Limited'
                 //         });
                 //   flag = 0;
                 // }else if (response == "No Stock") {
                 //   iziToast.error({
                 //             title: 'Stock',
                 //             message: 'No Stock Available'
                 //         });
                 //   flag = 0;
                 // }
                 
               }
             });
             });
                 if (flag == 1) {
                  
                    
                    $("#CustomerId option:selected").remove();
                    $("#CusInvo").append("<tr><td class='w-70'>"+customerName+"</td><td class='w-30'>"+price.toFixed(2)+"</td></tr>");
                    totalGrand +=price;
                    $("#GRND").text(totalGrand.toFixed(2));
                    $("#totalinv").val("");
                    
                    setTimeout(loadoutsubproduct, 3000);
                    
                    getbalance();
                    totalinv = 0;
                    price = 0;
                 }
                 
                 //$("#resp").empty();
                 //$("#sel").val(null).trigger("change");
                
                 
             });
             

         
        
         
        
         var $eventSelect = $('#sel'); //select your select2 input
         $eventSelect.on('select2:unselect', function(e) {
           // console.log('unselect');
           // console.log(e.params.data.id); 
           // console.log(e.params.data.text); 
           $("#cardform"+e.params.data.id).remove();
         })
         $eventSelect.on('select2:select', function(e) {
           // console.log('select');
            var stock = el.attributes['data-stock'].value;
            var price = el.attributes['data-price'].value;
            var empty = el.attributes['data-empty'].value;
            var bprice = el.attributes['data-bprice'].value;
            var cusqty = el.attributes['data-customerqty'].value;
            var promo = el.attributes['data-promo'].value;
            var extrashare = el.attributes['data-extrashare'].value;
            var id = el.value;
            var text = el.text;   
           
            $("#resp").prepend(chunk(id,el.text,empty,price,stock,bprice,cusqty,promo,extrashare));
                 
           
         })

          $("#BDate").change(function(){
            if (prevent) {
              //$('form').each(function() { this.reset() });
              getstart();
              //checkclosing();
            }
              

         });

         
         
         $("#rootid").change(function(){
          if (prevent) {
             start();

           }
         });

         $("#onCredit").change(function(){
            var isCredit = Number($("#onCredit option:selected").val());
            if (isCredit) {
              $("#oncredit").prop('disabled', false);
              $("#oncredit").toggleClass("filled-input");
            }else{
              $("#oncredit").prop('disabled', true);
              $("#oncredit").toggleClass("filled-input");

            }

         });

         $("#creditRecovery").change(function(){
            var isCreditRecovery = Number($("#creditRecovery option:selected").val());
            if (isCreditRecovery) {
              $("#creditrecovery").prop('disabled', false);
              $("#creditrecovery").toggleClass("filled-input");
              

            }else{
              $("#creditrecovery").prop('disabled', true);
              $("#creditrecovery").toggleClass("filled-input");
              

            }

         });

        

         $("#CustomerId").change(function(){
          if (prevent) {
              getbalance();
              getCreditLimit();
              loadoutsubproduct();
           }
         });
            /* Predefind range*/
            /* Single table*/
            
         
          
         
         });
         


      </script>
      <script type="text/javascript">
  $(window).bind("load", function () {
    getstart();
  });
</script>
   </body>
</html>