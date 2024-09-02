<?php require_once 'config/config.php';
$Title = "Booking";
$title = "booking";
$root = fetchBySess($_SESSION['user_id'],'root');
$subroot = fetchBySessAttr('RootId',$_SESSION['root_id'],'subroot');
$Query = "SELECT
  root.Id,
  root.Name
FROM booker b
  INNER JOIN root
    ON b.RootId = root.Id WHERE b.RootId = {$_SESSION['root_id']} AND b.UserId = {$_SESSION['user_id']};";
$res = $db->query($Query);



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
        
        <!-- /Vertical Nav -->
        <?php require_once $include_path.'sidebar.php'; ?>
        <!-- Setting Panel -->
       
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
                                          <label for="inputEmail3" class="col-sm-2 col-form-label">Booking Date</label>
                                            <div class="col-sm-10">
                                               <input class="form-control" id="date" type="text" name="Date" />
                                            </div>                                          
                                        </div>
                                         <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Route</label>
                                            <div class="col-sm-10">
                                                
                                                <select class="form-control" id="rootid" name="RootId">
                                                    <?php while ($row = $res->fetch_object()) {
                                                      
                                                         ?>
                                                    <option value="<?=$row->Id?>"><?=$row->Name?></option>                                        <?php } ?>            
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Day</label>
                                            <div class="col-sm-10">
                                                
                                                <select class="form-control" id="subrootid" name="SubRootId">
                                                    <?php for ($i=0; $i < count($subroot); $i++) {
                                                         ?>
                                                    <option value="<?=$subroot[$i]->Id?>"><?=$subroot[$i]->Name?></option>                                        <?php } ?>             
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Customer</label>
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
                                        </div>
                                        
                                        
                                        <div class="form-group row mb-0">
                                            <div class="col-sm-2 col-md-2">
                                                <button type="submit" id="allsubmit" class="btn btn-gradient-warning btn-lg btn-block"><i id='sub' class='spinner-grow spinner-grow-sm mr-1'></i>Submit</button> 
                                            </div>
                                            
                                        </div>
                                        
                                    </form>
                                    
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
   
   
   <!-- jQuery -->
	 <?php require_once $include_path.'foot.php'; ?>
    <script type="text/javascript">
 var prevent = false;
  $(document).ajaxStart(function() {
    $('#sub').show(); // show the gif image when ajax starts
});
$(document).ajaxStop(function() {
   $("#sub").hide();
});
        $(window).bind("load", function () {
    rootcustomer();
    fetchsubproduct();
    
  });
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
updatePrice = function(id) {

    var id = id.replace(/\D/g,'');
    var qtyform = "#qtyform"+id;
    
    var promo = "#promo"+id;
    var extra = "#extra"+id;
    

    var qty = $(qtyform).val();   
    var pro = isEmpty($(promo).val()); 
    var ext = isEmpty($(extra).val());
   
    
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
        function rootcustomer(){

  var rootid = $("#rootid option:selected").val();
  var subrootid = $("#subrootid option:selected").val();
  $.ajax({
                 type: "POST",
                 dataType : "json",
                 url: "<?php echo $action_url; ?>fetch_rootcustomer.php",
                 data: { RootId : rootid, SubRootId : subrootid },
                 success: function(data){

                  var customerlist = '';
                  $.each(data, function(key, value){
                      customerlist += '<option value=' + value.Id + '>' + value.Name + '</option>';
                  });
                  $("#CustomerId").html(customerlist);
        // call next ajax function
                  prevent = true;
               

       }
             });
 }

     $("#subrootid").change(function(){
          if (prevent) {
             rootcustomer();

           }
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
function chunk(id,text,empty,price,bprice) {
           

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
                                                                 <td><input type="number" id="qtyform${id}" class="w-50p"  onInput="updatePrice(this.id);" price="${price}" name="Qty"></td>
                                                                 <input type="hidden" id="actualprice${id}" value="${price}">
                                                                 <input type="hidden" id="actualbprice${id}" value="${bprice}">
                                                                 <input type="hidden" class="TTP" name="Total" id="totalPrice${id}" value="">
                                                                 <td><input type="number" onInput="updatePrice(this.id);" id="promo${id}" class="w-50p" name="Promo"></td>
                                                                 <td><input type="number" onInput="updatePrice(this.id);" id="extra${id}" class="w-50p" name="ExtraShare"></td>
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
 function fetchsubproduct(){
  
             
              $.ajax({
                 type: "POST",
                 dataType : "json",
                 url: "<?php echo $action_url; ?>fetch_booker_subproduct.php",
                 success: function(data){

                  $("#sel").empty();
                  var productlist = '';
                  $.each(data, function(key, value){
                      productlist += '<option value=' + value.Id + ' data-empty=' + value.Is_Empty + ' data-price=' + value.Price + ' data-bprice=' + value.BPrice + '>' + value.Name + ' </option>';
                  
                  });
                   
                  $("#sel").append(productlist);
                  prevent = true;
      
               }
             });
 }
    $(document).ready(function () {
        iziToast.settings({
    timeout: 2500,
    resetOnHover: true,
    animateInside: true,
    transitionIn: 'bounceInUp',
    transitionOut: 'flipOutX'
});

         $("#allsubmit").click(function (){

             var date = $("#date").val();
             var rootid = $("#rootid option:selected").val();
             var customer = $("#CustomerId option:selected").val();

             var flag = 1;
             $(".allforms").each(function(){                 
                 var id = $(this).attr("id").replace(/\D/g,'');
                 var card = "#cardform"+id;
                 var qty = "#qtyform"+id;
                 var selecteditem = "#sel option[value="+id+"]";
                 
                 // if ($(qty).val() == "") {
                 //    iziToast.error({
                 //             title: 'Empty',
                 //             message: 'Please Fill the Quantity'
                 //         });
                 //    flag = 0;
                 //     return;
                 // }
                
               
                 $.ajax({
               type: "POST",
               url : "<?php echo $action_url; ?>add_booking.php",
               data: $(this).serialize() + "&Date=" + date + "&CustomerId=" + customer + "&RootId=" + rootid,
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
                 
               }
             });
             });
              if (flag == 1) {                  
                    
                    $("#CustomerId option:selected").remove();                    
                   
                 }

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
            
            var price = $(e.params.data.element).data('price'); 
            var empty = $(e.params.data.element).data('empty'); 
            var bprice = $(e.params.data.element).data('bprice'); 
            
            //console.log(e.options[[e.selectedIndex]].attributes["data-id"].value); 
           
           //console.log(e.params.data['element']);
         
           $("#resp").prepend(chunk(e.params.data.id,e.params.data.text,empty,price,bprice));
                 
           
         })

      
    });
  </script>
  
</body>
</html>