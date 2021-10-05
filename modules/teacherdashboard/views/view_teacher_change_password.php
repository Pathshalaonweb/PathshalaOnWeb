<?php $this->load->view("top_application");?>
<?php $mem_info=get_db_single_row('wl_teacher',$fields="first_name,is_verified,current_credit,profile_edit,plan_expire,email_verify",$condition="WHERE 1 AND teacher_id='".$this->session->userdata('teacher_id')."'");?>
<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>matdashboard/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>matdashboard/assets/img/favicon.png">
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url(); ?>matdashboard/assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url(); ?>matdashboard/assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="<?php echo base_url(); ?>matdashboard/assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      
      <div class="sidebar-wrapper">
	  
        <?php 
		$date = new DateTime('now');
		$currentDate = $date->format('Y-m-d h:i:s');
		$expireDate =  $mem_info['plan_expire'];
		if($expireDate > $currentDate && $mem_info['current_credit']!=0){
		?>
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="<?php echo base_url();?>teacherdashboard/myaccount">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url();?>teacherdashboard/edit_account">
              <i class="material-icons">person</i>
              <p>User Profile</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url();?>teacherdashboard/profile">
              <i class="material-icons">content_paste</i>
              <p>List Yourself</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url();?>teacherdashboard/listclass">
              <i class="material-icons">library_books</i>
              <p>List Your Class</p>
            </a>
          </li>
		<?php $idds = $this->session->userdata('teacher_id');
		$dbes = $this->load->database('default', TRUE);
		$sqs = "SELECT liveplan FROM `wl_teacher` WHERE teacher_id='".$idds."'";
		$qus=$dbes->query($sqs);
		$values= $qus->result_array();
		$liveplans = $values[0]['liveplan'];
		if($liveplans == 1){ ?>
			<li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url(); ?>teacherdashboard/liveclass" target="_blank">
              <i class="material-icons">bubble_chart</i>
              <p>Live Classes</p>
            </a>
          </li>
		<?php } else { ?>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url(); ?>teacherdashboard/plan">
              <i class="material-icons">bubble_chart</i>
              <p>Live Classes</p>
            </a>
          </li>
		<?php } ?>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url();?>teacherdashboard/credit">
              <i class="material-icons">location_ons</i>
              <p>Wallet/Credit History: <span style="color:#F00;">(<?php echo ($mem_info['current_credit']==0)?"0":$mem_info['current_credit'];?>)</span></p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url();?>teacherdashboard/courses/">
              <i class="material-icons">notifications</i>
              <p>My Courses</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url();?>teacherdashboard/credit/history/">
              <i class="material-icons">language</i>
              <p>Payment History</p>
            </a>
          </li>
          <li class="nav-item active-pro ">
            <a class="nav-link" href="<?php echo base_url();?>teacherdashboard/plan">
              <i class="material-icons">unarchive</i>
              <p>Upgrade to PRO</p>
            </a>
          </li>
        </ul>
		<?php }else{ ?>
		<li class="nav-item active  ">
            <a class="nav-link" href="<?php echo base_url();?>teacherdashboard/myaccount">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url();?>teacherdashboard/edit_account">
              <i class="material-icons">person</i>
              <p>User Profile</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url();?>teacherdashboard/profile">
              <i class="material-icons">content_paste</i>
              <p>List Yourself</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url();?>teacherdashboard/listclass">
              <i class="material-icons">library_books</i>
              <p>List Your Class</p>
            </a>
          </li>
		<?php $idds = $this->session->userdata('teacher_id');
		$dbes = $this->load->database('default', TRUE);
		$sqs = "SELECT liveplan FROM `wl_teacher` WHERE teacher_id='".$idds."'";
		$qus=$dbes->query($sqs);
		$values= $qus->result_array();
		$liveplans = $values[0]['liveplan'];
		if($liveplans == 1){ ?>
			<li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url(); ?>teacherdashboard/liveclass" target="_blank">
              <i class="material-icons">bubble_chart</i>
              <p>Live Classes</p>
            </a>
          </li>
		
		<?php } else { ?>
		
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url(); ?>teacherdashboard/plan">
              <i class="material-icons">bubble_chart</i>
              <p>Live Classes</p>
            </a>
          </li>
		<?php } ?>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url();?>teacherdashboard/credit">
              <i class="material-icons">location_ons</i>
              <p>Wallet/Credit History: <span style="color:#F00;">(<?php echo ($mem_info['current_credit']==0)?"0":$mem_info['current_credit'];?>)</span></p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url();?>teacherdashboard/courses/">
              <i class="material-icons">notifications</i>
              <p>My Courses</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url();?>teacherdashboard/credit/history/">
              <i class="material-icons">language</i>
              <p>Payment History</p>
            </a>
          </li>
          <li class="nav-item active-pro ">
            <a class="nav-link" href="<?php echo base_url();?>teacherdashboard/plan">
              <i class="material-icons">unarchive</i>
              <p>Upgrade to PRO</p>
            </a>
          </li>
        </ul>
		<?php } ?>
      </div>
    </div>
	
     
  <!--   Core JS Files   -->
  <script src="<?php echo base_url(); ?>matdashboard/assets/js/core/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>matdashboard/assets/js/core/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>matdashboard/assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="<?php echo base_url(); ?>matdashboard/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="<?php echo base_url(); ?>matdashboard/assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="<?php echo base_url(); ?>matdashboard/assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="<?php echo base_url(); ?>matdashboard/assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="<?php echo base_url(); ?>matdashboard/assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="<?php echo base_url(); ?>matdashboard/assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="<?php echo base_url(); ?>matdashboard/assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="<?php echo base_url(); ?>matdashboard/assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="<?php echo base_url(); ?>matdashboard/assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="<?php echo base_url(); ?>matdashboard/assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="<?php echo base_url(); ?>matdashboard/assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="<?php echo base_url(); ?>matdashboard/assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?php echo base_url(); ?>matdashboard/assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="<?php echo base_url(); ?>matdashboard/assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="<?php echo base_url(); ?>matdashboard/assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url(); ?>matdashboard/assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url(); ?>matdashboard/assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo base_url(); ?>matdashboard/assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
</body>

</html>


<div class="event-area my-acc pt-20 pb-130">
  <div class="container">
    <div class="row">
      <?php $this->load->view("teacher_myaccount_left");?>
      <div class="col-xl-9 col-lg-4">
        <div class="blog-all-wrap mr-40">
          <div class="col-lg-9 col-md-12 ml-auto mr-auto">
            <div class="login-register-wrapper">
              <div class="login-register-tab-list nav"> <a class="active" data-toggle="tab" href="#lg1">
                <h4> Change Password </h4>
                </a> </div>
              <div class="tab-content">
                <div id="lg1" class="tab-pane active">
                  <div class="login-form-container">
                    <div class="login-register-form">   <?php echo form_open('teacherdashboard/change_password'); ?>
 <?php echo validation_message();?>
  <?php echo error_message(); ?>
                      <input type="password" name="old_password" id="old_password" placeholder="Old Password">
                      <input type="password" name="new_password" id="new_password" placeholder="New Password" >
                      <input type="password" name="confirm_password" id="confirm_password" placeholder="Conform Password" >
                      <div class="button-box">
                        
                        <button class="default-btn" type="submit"><span>Update</span></button>
                      </div>
                      <?php echo form_close();?> </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view("bottom_application");?>
<style>.button-box {
    text-align: center;
}</style>