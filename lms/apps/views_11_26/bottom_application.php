<?php //$this->load->view('project_footer'); ?> 
<script>
function test_mock(){
	
	document.getElementById("mocktest").style.display = "block";
}


function text1(){
	document.getElementById("mocktest").style.display = "none";
	document.getElementById("mathstest").style.display = "block";
}

function myFunction() {
    document.getElementById("content_box").style.display = "none";
	document.getElementById("show_demo").style.display = "block";
}

function myFunction1() {
    document.getElementById("show_demo").style.display = "none";
	document.getElementById("text_ques").style.display = "block";
}

</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<!-- jQuery 2.0.2 -->
	
	<!-- jQuery UI 1.10.3 -->
	<script src="<?php echo theme_url();?>js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
	<!-- Bootstrap -->
	<script src="<?php echo theme_url();?>js/bootstrap.min.js" type="text/javascript"></script>
	<!-- Morris.js charts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="<?php echo theme_url();?>js/plugins/morris/morris.min.js" type="text/javascript"></script>
	<!-- Sparkline -->
	<script src="<?php echo theme_url();?>js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
	<!-- jvectormap -->
	<script src="<?php echo theme_url();?>js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
	<script src="<?php echo theme_url();?>js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
	<!-- fullCalendar -->
	<script src="<?php echo theme_url();?>js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
	<!-- jQuery Knob Chart -->
	<script src="<?php echo theme_url();?>js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
	<!-- daterangepicker -->
	<script src="<?php echo theme_url();?>js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
	<!-- Bootstrap WYSIHTML5 -->
	<script src="<?php echo theme_url();?>js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
	<!-- iCheck -->
	<script src="<?php echo theme_url();?>js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

	<!-- AdminLTE App -->
	<!-- <script src="<?php echo theme_url();?>js/AdminLTE/app.js" type="text/javascript"></script>-->
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="<?php echo theme_url();?>js/AdminLTE/dashboard.js" type="text/javascript"></script>        	
    </body>
</html>