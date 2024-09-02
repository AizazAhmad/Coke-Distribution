 <!-- jQuery -->
    <script src="<?=$base_url?>vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=$base_url?>vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?=$base_url?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Jasny-bootstrap  JavaScript -->
    <script src="<?=$base_url?>vendors/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>

    <!-- Ion JavaScript -->
    <script src="<?=$base_url?>vendors/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
    <script src="<?=$base_url?>dist/js/rangeslider-data.js"></script>
    <!-- Slimscroll JavaScript -->
    <script src="<?=$base_url?>dist/js/jquery.slimscroll.js"></script>

    <!-- Fancy Dropdown JS -->
    <script src="<?=$base_url?>dist/js/dropdown-bootstrap-extended.js"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="<?=$base_url?>dist/js/feather.min.js"></script>

    <!-- Toggles JavaScript -->
    <script src="<?=$base_url?>vendors/jquery-toggles/toggles.min.js"></script>
    <script src="<?=$base_url?>dist/js/toggle-data.js"></script>
     <!-- Bootstrap Tagsinput JavaScript -->
    

    <script src="<?=$base_url?>vendors/select2/dist/js/select2.full.min.js"></script>
    <script src="<?=$base_url?>dist/js/select2-data.js"></script>
	
	<!-- Counter Animation JavaScript -->
	<script src="<?=$base_url?>vendors/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="<?=$base_url?>vendors/jquery.counterup/jquery.counterup.min.js"></script>
	
	<!-- EChartJS JavaScript -->
    <script src="<?=$base_url?>vendors/echarts/dist/echarts-en.min.js"></script>
    
	
	<!-- Vector Maps JavaScript -->
    <script src="<?=$base_url?>vendors/vectormap/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="<?=$base_url?>vendors/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?=$base_url?>dist/js/vectormap-data.js"></script>

	<!-- Owl JavaScript -->
    <script src="<?=$base_url?>vendors/owl.carousel/dist/owl.carousel.min.js"></script>
	
	<!-- Toastr JS -->
    <script src="<?=$base_url?>vendors/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
    <script src="<?=$base_url?>dist/izi-toast/js/iziToast.min.js"></script>
   
   <!-- Daterangepicker JavaScript -->
    <script src="<?=$base_url?>vendors/moment/min/moment.min.js"></script>
    <script src="<?=$base_url?>vendors/daterangepicker/daterangepicker.js"></script>
    <script src="<?=$base_url?>dist/js/daterangepicker-data.js"></script>
    <!-- Init JavaScript -->
    <script src="<?=$base_url?>dist/js/init.js"></script>
	<script src="<?=$base_url?>dist/js/dashboard-data.js"></script>
    <script type="text/javascript">
    $(".hk-vertical-nav").addClass("hk-icon-nav");
        
    $(':input[type=number]').on('wheel',function(e){ $(this).blur(); });
    
    var invalidChars = ["-", "e", "+", "E"];
    $("input[type='number']").on("keydown", function(e){ 
        if(invalidChars.includes(e.key)){
             e.preventDefault();
        }
    });
    </script>