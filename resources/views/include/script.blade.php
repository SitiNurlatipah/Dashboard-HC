    <!-- jQuery -->
    <script src="{{ asset('droopy/vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('droopy/vendors/jqueryy.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('droopy/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<!-- Vector Maps JavaScript -->
    <script src="{{ asset('droopy/vendors/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('droopy/vendors/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
	<script src="{{ asset('droopy/dist/js/vectormap-data.js') }}"></script>
	
	<!-- Data table JavaScript -->
	<script src="{{ asset('droopy/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('droopy/vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{asset('droopy/dist/js/dataTables-data.js')}}"></script>

	<!-- Flot Charts JavaScript -->
	
	<!-- Charts js -->
	<script src="{{ asset('droopy/vendors/charts/accessibility.js') }}" type="text/javascript"></script>
	<script src="{{ asset('droopy/vendors/charts/highcharts.js') }}" type="text/javascript"></script>
	<script src="{{ asset('droopy/vendors/charts/exporting.js') }}" type="text/javascript"></script>
	<script src="{{ asset('droopy/vendors/charts/export-data.js') }}" type="text/javascript"></script>
	<!-- Slimscroll JavaScript -->
	<script src="{{ asset('droopy/dist/js/jquery.slimscroll.js') }}"></script>
	
	<!-- simpleWeather JavaScript -->
	<script src="{{ asset('droopy/vendors/bower_components/moment/min/moment.min.js') }}"></script>
	<script src="{{ asset('droopy/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js') }}"></script>
	<script src="{{ asset('droopy/dist/js/simpleweather-data.js') }}"></script>
	
	<!-- Progressbar Animation JavaScript -->
	<script src="{{ asset('droopy/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js') }}"></script>
	<script src="{{ asset('droopy/vendors/bower_components/jquery.counterup/jquery.counterup.min.js') }}"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="{{ asset('droopy/dist/js/dropdown-bootstrap-extended.js') }}"></script>
	
	<!-- Sparkline JavaScript -->
	<!-- <script src="{{ asset('droopy/vendors/jquery.sparkline/dist/jquery.sparkline.min.js') }}"></script> -->
	
	<!-- Owl JavaScript -->
	<script src="{{ asset('droopy/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js') }}"></script>
	
	<!-- EChartJS JavaScript -->
	<script src="{{ asset('droopy/vendors/bower_components/echarts/dist/echarts-en.min.js') }}"></script>
	<script src="{{ asset('droopy/vendors/echarts-liquidfill.min.js') }}"></script>
	
	<!-- Toast JavaScript -->
	<script src="{{ asset('droopy/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>
		
	<!-- Switchery JavaScript -->
	<script src="{{ asset('droopy/vendors/bower_components/switchery/dist/switchery.min.js') }}"></script>
	
	<!-- Bootstrap Select JavaScript -->
	<!-- <script src="{{ asset('droopy/vendors/bower_components/multiselect/js/jquery.multi-select.js')}}"></script>
	<script src="{{ asset('droopy/vendors/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
	<script src="{{ asset('droopy/vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js')}}"></script>
	<script src="{{ asset('droopy/vendors/bower_components/multiselect/js/jquery.multi-select.js')}}"></script> -->
	<!-- <script type="text/javascript" src="{{ asset('front/js/bootstrap-select.min.js') }}"></script> -->
	
	<!-- Init JavaScript -->
	<script src="{{ asset('droopy/dist/js/init.js') }}"></script>
	<script src="{{ asset('droopy/dist/js/dashboard2-data.js') }}"></script>


	{{-- DASHBOARD PAGE --}}
	<script type="text/javascript" src="{{ asset('droopy/vendors/bower_components/moment/min/moment-with-locales.min.js')}}"></script>
	
	<!-- Bootstrap Colorpicker JavaScript -->
	<script src="{{ asset('droopy/vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
			
	<!-- Bootstrap Datetimepicker JavaScript -->
	<script type="text/javascript" src="{{ asset('droopy/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
	
	<!-- Bootstrap Daterangepicker JavaScript -->
	<script type="text/javascript" src="{{ asset('droopy/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
	<script type="text/javascript" src="{{ asset('droopy/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('droopy/vendors/bower_components/bootstrap-daterangepicker/moment.min.js')}}"></script>
	
	<!-- Form Picker Init JavaScript -->
	<script src="{{ asset('droopy/dist/js/form-picker-data.js') }}"></script>
	
	{{-- CDN MQTT PAHO --}}
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js" type="text/javascript"></script> -->
	<!-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" type="text/javascript"></script> -->
	<!-- delete -->
	<script src="{{asset('droopy/vendors/sweetalert.min.js')}}" type="text/javascript"></script>
	<script type="text/javascript" src="{{ asset('droopy/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

	@stack('script')
		