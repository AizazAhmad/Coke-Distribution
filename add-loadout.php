<?php require_once 'config/config.php';
$Title = "Loading";
$title = "loading";
$deliveryman = fetchBySess($_SESSION['user_id'],'deliveryman');
$root = fetchBySess($_SESSION['user_id'],'root');
$vehicle = fetchBySess($_SESSION['user_id'],'vehicle');
$query = "SELECT
  sub_product.Id,
  sub_product.Sale + sub_product.CompanyTax AS Price,
  sub_product.Name,
  sub_product.Code,
  sub_product.Is_Empty,
  stock.Stock
FROM stock
  INNER JOIN sub_product
    ON stock.SubProductId = sub_product.Id
WHERE sub_product.UserId = {$_SESSION['user_id']} ORDER By sub_product.Code DESC";
   $res = $db->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add <?=$Title?></title>
    <?php require_once $include_path.'head.php'; ?>
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
                <div class="row">
                    <div class="col-xl-12">
                    <section class="hk-sec-wrapper">
                    
            
                            <h5 class="hk-sec-title">Add LoadOut</h5>
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <form id="myform">
                                 <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-2 col-sm-2 col-form-label">Date</label>
                                    <div class="col-sm-2">
                                       <input class="form-control" id="Date" type="text" name="day" />
                                    </div>
                                    <label for="inputEmail3" class="col-md-1 col-sm-2 col-form-label">LoadNo</label>
                                     <div class="col-sm-3">
                                       <input class="form-control" type="text" placeholder="LoadNo" name="LoadNo" id="loadno">
                                    </div>
                                    <label for="inputEmail3" class="col-md-1 col-sm-2 col-form-label">Root</label>
                                     <div class="col-sm-3">
                                       <select class="form-control select2" id="rootid" name="RootId">
                                            <?php for ($i=0; $i < count($root); $i++) {
                                                 ?>
                                            <option value="<?=$root[$i]->Id?>"><?=$root[$i]->Name?></option>                                        <?php } ?>            
                                        </select>
                                    </div>
                                 </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">DeliveryMan</label>
                                            <div class="col-sm-4">
                                                
                                                <select class="form-control select2" id="deliverymanid" name="DeliveryManId">
                                                    <?php for ($i=0; $i < count($deliveryman); $i++) {
                                                         ?>
                                                    <option value="<?=$deliveryman[$i]->Id?>"><?=$deliveryman[$i]->Code." ".$deliveryman[$i]->Name?></option>                                        <?php } ?>            
                                                </select>
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Vehicle</label>
                                            <div class="col-sm-4">
                                                
                                                <select class="form-control select2" id="vehicleid" name="VehicleId">
                                                    <?php for ($i=0; $i < count($vehicle); $i++) {
                                                         ?>
                                                    <option value="<?=$vehicle[$i]->Id?>"><?=$vehicle[$i]->Number?></option>                                        <?php } ?>            
                                                </select>
                                            </div>
                                        </div>
                                       
                                       <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                                          <div class="col-sm-10">
                                             <input class="form-control" type="text" placeholder="Description" name="Description" id="description">
                                          </div>
                                          
                                       </div>
                                        <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Sub Product</label>
                                        <div class="col-sm-8">
                                           <select id="sel" class="select2 select2-multiple" multiple="multiple" data-placeholder="Choose" name="SubProId[]" required>
                                              <?php while ($row = $res->fetch_object()) {
                                                 ?>
                                              <option data-stock="<?=$row->Stock?>" value="<?=$row->Id?>" data-empty="<?=$row->Is_Empty?>" data-price="<?=$row->Price?>"><?=$row->Code." ".$row->Name."   --   Stock ( ".intval($row->Stock)." )"?></option>
                                              <?php } ?> 
                                           </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="scheckbo">
                                                <label class="custom-control-label" for="scheckbo"></label>
                                            </div>
                                        </div>
                                     </div>
                                        
                                        
                                        <!-- start -->
                                
                                 <!-- <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Total Bottles</label>
                                     <div class="col-sm-4">
                                       
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Total Shells</label>
                                    
                                 <div class="col-sm-4">
                                      
                                    </div>
                                 </div> -->
                                  <input class="form-control" type="hidden" placeholder="Shell" name="TFShell" id="totalshell">
                                  <input class="form-control" type="hidden" placeholder="Bottles" name="TFBottles" id="totalbottle">

                                  <!-- end -->
                                
                                 <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Total Inv</label>
                                    <div class="col-sm-10">
                                       <input class="form-control" type="text" placeholder="Total Inv" name="TotalInv" id="totalinv">
                                    </div>
                                    
                                 </div>
                                        
                                        <div class="form-group row mb-0">
                                            <div class="col-sm-12">
                                                <button type="submit" id="submit" class="btn btn-gradient-info btn-block">Add LoadOut</button> 
                                            </div>
                                            
                                        </div>
                                        
                                    </form>
                                    
                                </div>
                                <!-- <div class="col-sm-4">
                            
                                <style type="text/css">
                                    .clss{
                                        display: block !important;
                                      height: 330px !important;
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
                                                            <tbody id="DevInvo">
                                                                
                                                                
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
                                      
                           </div> -->
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
   
   
   <!-- jQuery -->
     <?php require_once $include_path.'foot.php'; ?>
   
    <script type="text/javascript">
      
// $("#sel").select2
//   theme: "bootstrap"
//   templateResult: (data) ->
//     badge = $(data.element).data('badge')
//     if badge
//       return $(document.createTextNode(data.text)).add($('<span class="badge pull-right">').text(badge))
//     data.text
function chunk(id,text,empty,price) {
           

             var abc = `<div id="cardform${id}" class="col-lg-4 col-sm-12">
                                                 <div class="card">
                                                         <span class="btn btn-gradient-info btn-block">${text}</span>
         
                                                     <form id='form${id}' price="${price}" class="allforms">
                                                     <input type="hidden" Name="SubProductId" value="${id}">                                                   
                                                     <div id="collapse_${id}" class="collapse show">
                                                         <div class="card-body">
                                                         <table style="width:100%">
                                                             <tr>
                                                                 <th>Qty</th>
                                                                 <th>Rate</th>
                                                                 `;
                                                                 if (empty == "1") {
                                                                    abc+=`<th>Bottles</th>
                                                                         <th>Shell</th>`;
                                                                 }
                                                                 abc +=`             
                                                             </tr>
                                                             <tr>
                                                             <td><input type="number" id="qtyform${id}" class="w-50p" data-empty="${empty}" onInput="updatePrice(this.id);" price="${price}" name="Qty"></td>
                                                             <input type="hidden" name="Price" id="actualprice${id}" value="${price}">
                                                             <input type="hidden" class="TTP" name="Total" id="totalPrice${id}" value="">
                                                          <td id="price${id}">${price}</td> 
                                                          `;
                                                                 if (empty == "1") {
                                                                    abc+=`<td id="bot${id}">0</td>
                                                                         <td id="shel${id}">0</td>
                                                                         <input type="hidden" name="FBottles" class="TFB" id="fbot${id}">
                                                                         <input type="hidden"  name="FShell" class="TFS" id="fshel${id}">`;
                                                                 }
                                                                 abc +=`               
                                                             </tr>
                                                         </table>
                                                         </div>                                             
                                                     </div>
                                                     </form>
                                                 </div>
                                             </div>`;
                                             return abc;
            
         }
         
 $("#scheckbo").click(function(){
    if($("#scheckbo").is(':checked') ){
        $("#sel > option").prop("selected","selected");// Select All Options
        $("#sel").trigger("change");// Trigger change to select 2
        $("#sel option").each(function(i,el){
    // $(this).attr('selected', true);
        var price = el.attributes['data-price'].value;
        var empty = el.attributes['data-empty'].value;
        var id = el.value;
        var text = el.text; 
             
        $("#resp").prepend(chunk(id,text,empty,price));

});
    }else{
      $("#resp").empty();
       $("#sel").val(null).trigger("change");
        
     }
});
function getallt(){
    var mvar = 0;
    $(".TTP").each(function() {
    
    mvar += Number($(this).val());
});
    $("#totalinv").val(mvar.toFixed(2));
}
function getallbs(){
    var fb = 0;
    $(".TFB").each(function() {
    
    fb += Number($(this).val());
});
    var fs = 0;
    $(".TFS").each(function() {
    
    fs += Number($(this).val());
});
    $("#totalbottle").val(fb.toFixed(2));
    $("#totalshell").val(fs.toFixed(2));
}


var totalinv = 0;
updatePrice = function(id) {

    var id = id.replace(/\D/g,'');
    var qtyform = "#qtyform"+id;
    
    

    var qty = $(qtyform).val(); 
     im = $(qtyform).data('empty');
    if (im) {
        var bot = "#bot"+id;
        var shel = "#shel"+id;
        var fbot = "#fbot"+id;
        var fshel = "#fshel"+id;
        $(fbot).val(qty*24);
        $(fshel).val(qty);
        $(bot).text(qty*24);        
        $(shel).text(qty);
        getallbs();
    }
    
    totalinv += Number($("#totalinv").val());
    
   
    var mainprice = "#price"+id;
    
    var price = "#actualprice"+id;
    var tot = "#totalPrice"+id;
    var pr = $(price).val();
    if (qty == 0 || qty == "") {

         $(mainprice).html(pr);
         $(tot).val("0");
         return;
    }  
  
  var res = pr * qty ;
  
  $(mainprice).text(res.toFixed(2));
  $(tot).val(res.toFixed(2));
  getallt();
}
         $(document).ready(function () {
           

            var price = 0;
            var bottle = 0;            
            // var totalGrand = 0;

            
        
                     iziToast.settings({
         timeout: 2500,
         resetOnHover: true,
         animateInside: true,
         transitionIn: 'bounceInUp',
         transitionOut: 'flipOutX'
         });
        
             $("#submit").click(function (e){
                  
                e.preventDefault();
                if (jQuery('#vehicleid :selected').val() == null) {
                     iziToast.error({
                             title: 'Empty',
                             message: 'Please Select the Vehicle'
                         });
                     return;
                 }
                 if (jQuery("#sel").val() == "") {
                     iziToast.error({
                             title: 'Empty',
                             message: 'Please Choose the Sub Product'
                         });
                     return;
                 }
                 if (jQuery("#loadno").val() == "") {
                     iziToast.error({
                             title: 'Load Numer',
                             message: 'Please Add Number of Load'
                         });
                     return;
                 }
                 if (jQuery("#deliverymanid :selected").val() == "") {
                     iziToast.error({
                             title: 'No DeliveryMan',
                             message: 'Please Select Delivery Man'
                         });
                     return;
                 }
                
                 var date = $("#Date").val(); 
                 var loadno = $("#loadno").val();
                 var description = $("#description").val();
                 var deliveryman = $("#deliverymanid option:selected").val();
                 var vehicleid = $("#vehicleid").select2().val();
                 var rootid = $("#rootid").select2().val();
                
                 var flag = 1;
                  
                 $(".allforms").each(function(){                 
                 var id = $(this).attr("id").replace(/\D/g,'');
                 var pri = "#totalPrice"+id; 
                 var bot = "#fbot"+id; 
                 var pr = parseFloat($(pri).val());               
                 var fbot = Number($(bot).val());               
                 var card = "#cardform"+id;
                 var qty = "#qtyform"+id;
                 var selecteditem = "#sel option[value="+id+"]";
                 
                 if ($(qty).val() == "") {
                    iziToast.error({
                             title: 'Empty',
                             message: 'Please Fill the Quantity'
                         });
                    flag = 0;
                     return;
                 }
                price += pr;
                bottle += fbot;
                
                 $.ajax({
               type: "POST",
               url : "<?php echo $action_url; ?>add_loadout.php",
               data: $(this).serialize() + "&Date=" + date + "&LoadNo=" + loadno + "&DeliveryManId=" + deliveryman + "&VehicleId=" + vehicleid + "&Description=" + description + "&RootId=" + rootid,
                beforeSend: function() {
                 $("#submit").attr("disabled", true);                
                $("#submit").html("<i id='subf' class='fad fa-sync-alt fa-spin fa-lg'></i>");
            },complete: function() {
                $("#submit").empty().html('Add LoadOut');
                $("#submit").attr('disabled', false);
                $(selecteditem).prop("selected", false).parent().trigger("change");
            },
               success: function (response) {
                 if (response == "Success") {
                   iziToast.success({
                                     title: 'Succes',
                                     message: 'Order Placed'
                                 });
                   

                  $(card).remove();
                 }else if (response == "Invalid") {
                   iziToast.error({
                             title: 'Invalid',
                             message: 'Something Went Wrong'
                         });
                   
                 }
                 
               }
            });
        });
                 if (flag == 1) {
                                     
                    
                    // $("#DevInvo").append("<tr><td class='w-60'>"+deliverymanname+"</td><td class='w-20'>"+price.toFixed(2)+"</td><td class='w-20'>"+price.toFixed(2)+"</td></tr>");
                    // totalGrand +=price;
                    // $("#GRND").text(totalGrand.toFixed(2));
                    $("#totalinv").val("");
                    $("#loadno").val("");
                    $("#totalbottle").val("");
                    $("#totalshell").val("");
                    //$("#deliverymanid option:selected").remove();
                    //$("#vehicleid option:selected").remove();
                    
                    totalinv = 0;
                    bottle = 0;
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
           // console.log(e.params.data.id); 
           // console.log(e.params.data.text); 
           var stock = $(e.params.data.element).data('stock'); 
            var price = $(e.params.data.element).data('price'); 
            var empty = $(e.params.data.element).data('empty');
            var id = e.params.data.id; 
            var text = e.params.data.text; 
           
         
           $("#resp").prepend(chunk(id,text,empty,price));
           
                     
           // var data = parseInt($('#sel option:selected').attr('empty'));
           //   if (data == 1) {
           //       alert("Yes"+data);
           //   }else if (data == 0) {
           //        alert("No"+data);
           //   }
         })
         
         

         
            /* Predefind range*/
            /* Single table*/
            
         $('input[name="day"]').daterangepicker({
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
      </script>
  
</body>
</html>
