<!-- Footer -->
<footer class="sticky-footer">
    <div class="container">
        <div class="text-center">
            <small class="font-15">Copyright © chefaa   <i class="fa fa-heart cl-danger"></i> In Egypt</small>
        </div>
    </div>
</footer>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded cl-white gredient-bg" href="#page-top">
    <i class="ti-angle-double-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('admin_en/assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin_en/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('admin_en/assets/plugins/jquery-easing/jquery.easing.min.js')}}"></script>
	 <!-- Slick Slider Js -->
			<script src="{{asset('admin_en/assets/plugins/slick-slider/slick.js')}}"></script>
<!-- Slick Slider Js -->
<script src="{{asset('admin_en/assets/plugins/slick-slider/slick.js')}}"></script>

<!-- Slim Scroll -->
<script src="{{asset('admin_en/assets/plugins/slim-scroll/jquery.slimscroll.min.js')}}"></script>
<!-- Data Table Js -->
<script src="{{asset('admin_en/assets/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin_en/assets/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<!-- Angular Tooltip -->
	<!-- ChartJS -->
			<script src="{{asset('admin_en/assets/plugins/chart.js/Chart.bundle.js')}}"></script>
			<script src="{{asset('admin_en/assets/plugins/chart.js/Chart.js')}}"></script>
<script src="{{asset('admin_en/assets/plugins/angular-tooltip/angular.js')}}"></script>
<script src="{{asset('admin_en/assets/plugins/angular-tooltip/angular-tooltips.js')}}"></script>
<script src="{{asset('admin_en/assets/plugins/angular-tooltip/index.js')}}"></script>
<!-- jQuery Knob -->
			<script src="{{asset('admin_en/assets/plugins/jquery-knob/js/jquery.knob.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{asset('admin_en/assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('admin_en/assets/plugins/morris.js/morris.min.js')}}"></script>

<!-- Custom Chart JavaScript -->
        <script src="{{asset('admin_en/js/custom/dashboard/dashboard.js')}}"></script>
		<script src="{{asset('admin_en/js/custom/chart/inline.js')}}"></script>
			
			<!-- Custom Chartjs JavaScript -->
			<script src="{{asset('admin_en/js/custom/chart/chartjs.js')}}"></script>
			
		
            <script src="{{asset('admin_en/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js')}}"></script>
            <!-- Custom scripts for all pages -->
            <script src="{{asset('admin_en/js/glovia.js')}}"></script>

	

<script>
    $('.dropdown-toggle').dropdown()
</script>
<script>
    $(document).ready(function() {
        $('#data-table-advance').DataTable();
    } );

    $(document).ready(function() {
        $('#data-table-simple').DataTable();
    } );
</script>
<script>
    $(function () {
        //Add text editor
        $("#compose-textarea").wysihtml5();
        $("#compose-textarea3").wysihtml5();
        $("#compose-textarea4").wysihtml5();
    });
</script>
@yield('js')
</div>
<!-- Wrapper -->

</body>
</html>