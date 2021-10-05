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
<link rel="shortcut icon" type="image/x-icon" href="<?php echo theme_url();?>img/favicon.png">
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
        <ul class="nav">
          <li class="nav-item   ">
            <a class="nav-link" href="https://www.pathshala.co/members/myaccount">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="https://www.pathshala.co/members/edit_account">
              <i class="material-icons">person</i>
              <p>User Profile</p>
            </a>
          </li>
          <li class="nav-item active dropdown">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">content_paste</i>
              <p>My LMS</p>
            </a>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
				  <a class="dropdown-item" href="<?php echo base_url();?>course_material">Your Course</a>
                  <a class="dropdown-item" href="<?php echo base_url();?>home">Mock Exam Test</a>
                  <a class="dropdown-item" href="<?php echo base_url();?>home/online_exam">Online Exam Test</a>
				  <a class="dropdown-item active" href="<?php echo base_url();?>exam/test_result">Mock Test Result</a>
				  <a class="dropdown-item" href="<?php echo base_url();?>exam/exam_result">Exam Test Result</a>
                </div>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="https://www.pathshala.co/members/liveclass">
              <i class="material-icons">library_books</i>
              <p>Live Classes</p>
            </a>
          </li>
		  <?php 
                    $idd = $this->session->userdata('user_id');
                    $dbe = $this->load->database('database2', TRUE);
                    $sq = "SELECT credit_point  FROM `wl_customers` WHERE customers_id='".$idd."'";
                    $qu=$dbe->query($sq);
                    $value= $qu->result_array();
                    $credit_point = $value[0]['credit_point'];
                    ?>
          <li class="nav-item ">
            <a class="nav-link" href="https://www.pathshala.co/members/credithistory">
              <i class="material-icons">money</i>
              <p>Wallet/Credit History :</p><?php if(!empty($mem_info['credit_point'])){echo "<strong>(".$mem_info['credit_point'].")</strong>";}else{echo "<strong>(00)</strong>";}?>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="https://www.pathshala.co/members/change_password">
              <i class="material-icons">bubble_chart</i>
              <p>Change Password</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="https://www.pathshala.co/members/credit_list">
              <i class="material-icons">money</i>
              <p>Payment History</p>
            </a>
          </li>
          <li class="nav-item active-pro ">
            <a class="nav-link" href="https://www.pathshala.co/members/credit">
              <i class="material-icons">unarchive</i>
              <p>Upgrade to PRO</p>
            </a><br>
          </li>		  
		<!--  <li class="nav-item active-pro ">
            <a class="nav-link" onclick="window.location.href='<?php echo base_url(); ?>users/logout'">
              <i class="material-icons">person</i>
              <p>Logout</p>
            </a><br>
          </li>-->
        </ul>
      </div>
    </div>
	<div class="main-panel">
      <!-- Navbar -->
	   <?php 
                    $idds = $this->session->userdata('user_id');
                    $dbe = $this->load->database('database2', TRUE);
                    $sq = "SELECT referral_code FROM `wl_customers` WHERE customers_id='".$idds."'";
                    $qu=$dbe->query($sq);
                    $value= $qu->result_array();
                    $referral_code = $value[0]['referral_code'];
                    ?>
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">My LMS - Mock Exams Result</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <!--<div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>-->
            </form>
            <ul class="navbar-nav">
			<li class="nav-item">
                <a class="nav-link" href="https://www.pathshala.co/">
                  <i class="material-icons">home</i>
                  <p class="d-lg-none d-md-block">
                    Home
                  </p>
                </a>
              </li>
			 <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">share</i>
			<p class="d-lg-none d-md-block">Share Referral</p></a>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
				  <a class="dropdown-item" href="#"><p>Earn More,<br>Share Referral Code:- <span style="color:#0f75bc;"><?php echo $referral_code;?></span></p></a>
                </div>
			</li>
			
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">search</i>
                 <!-- <span class="notification">5</span>-->
                  <p class="d-lg-none d-md-block">
                    Search
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
				  <a class="dropdown-item" href="https://www.pathshala.co/search">Search Tutor</a>
                  <a class="dropdown-item" href="https://www.pathshala.co/courses">Search Courses</a>
                  <a class="dropdown-item" href="https://www.pathshala.co/liveclasses">Search Live Tutor</a>
                </div>
              </li>
			  <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">content_paste</i>
                 <!-- <span class="notification">5</span>-->
                  <p class="d-lg-none d-md-block">
                    Pathshala Live
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
				  <a class="dropdown-item" href="https://www.pathshala.co/acadex">AcadeX</a>
                  <a class="dropdown-item" href="https://www.pathshala.co/searchliveclasses">Master Classes</a>
                  <a class="dropdown-item" href="https://www.pathshala.co/webinars">Webinars</a>
                  <a class="dropdown-item" href="https://www.pathshala.co/virtualcamp">Virtual Camp</a>
                </div>
              </li>
			  <li class="nav-item">
                <a class="nav-link" href="https://www.pathshala.co/scholarship/register/student">
                  <i class="material-icons">class</i>
                  <p class="d-lg-none d-md-block">
                    Pathshala Scholarship Test(NEW)
                  </p>
                </a>
              </li>
			  <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">bubble_chart</i>
                 <!-- <span class="notification">5</span>-->
                  <p class="d-lg-none d-md-block">
                    Our Partners
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
				  <a class="dropdown-item" href="https://www.pathshala.co/competition/register/parent">Foreign Language Olympiad</a>
                </div>
              </li>
			  
			  <?php 
                    $idd = $this->session->userdata('user_id');
                    $dbe = $this->load->database('database2', TRUE);
                    $sq = "SELECT credit_point  FROM `wl_customers` WHERE customers_id='".$idd."'";
                    $qu=$dbe->query($sq);
                    $value= $qu->result_array();
                    $credit_point = $value[0]['credit_point'];
                    ?>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
				<p class="dropdown-item" style="font-size: 16px;">Hola, <?php echo $this->session->userdata('first_name');?></p>
                          <?php if($credit_point =='0' || $credit_point == ''){ ?>
                          <p class="dropdown-item" style="font-size:11px; color:red;">Credit Exhausted. Buy Now. <?php //echo $credit_point; ?></p>
                          <?php } else{ ?>
                          <p class="dropdown-item" style="font-size:11px;">Remaining Credits: <?php echo $credit_point; ?></p>
                          <?php } ?>
                          <div class="dropdown-divider"></div>
                          <p class="dropdown-item" onclick="window.location.href='https://www.pathshala.co/members/edit_account'">User Profile</p>
                          <p class="dropdown-item" onclick="window.location.href='https://www.pathshala.co/members/liveclass'">Live Classes Portal</p>
                         <!-- <p class="dropdown-item" onclick="window.location.href='<?php //echo base_url(); ?>#'">Webinars/Workshops</p> -->
                          <p class="dropdown-item" onclick="window.location.href='https://www.pathshala.co/lms'">My Learning Management System (LMS)</p>
                          <p class="dropdown-item" onclick="window.location.href='https://www.pathshala.co/members/credit'">Upgrade to Pro</p>
                          <p class="dropdown-item" onclick="window.location.href='https://www.pathshala.co/members/change_password'">Change Password</p>
                          
                          <div class="dropdown-divider"></div>
                          <p class="dropdown-item" onclick="window.location.href='https://www.pathshala.co/users/logout'">Logout</p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
<div class="content">
<aside class="right-side">
  <section class="content" id="main" style="display:block">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="mock_tab" >
              <div class="list_test">
                <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                  <thead>
                    <tr>
                      <th width="10%"> S.No.</th>
                        </th>
                      <th width="90%">Question</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;foreach($res as $key =>$val){ 
					$q = pathinfo($val['question'], PATHINFO_EXTENSION);  
					$ans = pathinfo($val['ans'], PATHINFO_EXTENSION); 
					$uans = pathinfo($val['user_ans'], PATHINFO_EXTENSION); 
					if($val['ans']==$val['user_ans']){
					?>
                    <tr >
                      <td rowspan='2'>Question <?php echo $i;?></td>
                      <td ><?php //echo $val['question'];?>
                        <?php   if($q =='jpg'||$q =='jpeg'||$q =='gif'||$q =='png')	 { ?>
                        <img src="<?php echo base_url();?>uploaded_files/question/<?php echo $val['question'];?>"style="width:200px;height:100px;" >
                        <?php }else{

							echo $val['question'];

						}	

								

								?></td>
                    </tr>
                    <tr>
                      <td ><?php //echo $val['user_ans'];?>
                        <?php   if($uans =='jpg'||$uans =='jpeg'||$uans =='gif'||$uans =='png')	 { ?>
                        <img src="<?php echo base_url();?>uploaded_files/option/<?php echo $val['user_ans'];?>" style="width:200px;height:100px;">
                        <?php }else{

							echo $val['user_ans'];

						}	

								

								?>
                        &nbsp;&nbsp;<i class="fa fa-check " style="color:green" aria-hidden="true" ></i></td>
                    </tr>
                    <?php } else if($val['ans']!=$val['user_ans'] && $val['user_ans'] !=''){?>
                    <tr  >
                      <td rowspan='2' >Question <?php echo $i;?></td>
                      <td ><?php //echo $val['question'];?>
                        <?php   if($q =='jpg'||$q =='jpeg'||$q =='gif'||$q =='png')	 { ?>
                        <img src="<?php echo base_url();?>uploaded_files/question/<?php echo $val['question'];?>" style="width:200px;height:100px;">
                        <?php }else{

							echo $val['question'];

						}	

								

								?></td>
                    </tr>
                    <tr>
                      <td ><?php //echo $val['ans'];?>
                        <?php   if($ans =='jpg'||$ans =='jpeg'||$ans =='gif'||$ans =='png')	 { ?>
                        <img src="<?php echo base_url();?>uploaded_files/option/<?php echo $val['ans'];?>" style="width:200px;height:100px;">
                        <?php }else{

							echo $val['ans'];

						}	

								

								?>
                        &nbsp;&nbsp;<i class="fa fa-check " style="color:green" aria-hidden="true" ></i><br>
                        <br>
                        <?php //echo $val['user_ans'];?>
                        <?php   if($uans =='jpg'||$uans =='jpeg'||$uans =='gif'||$uans =='png')	 { ?>
                        <img src="<?php echo base_url();?>uploaded_files/option/<?php echo $val['user_ans'];?>" style="width:200px;height:100px;">
                        <?php }else{

							echo $val['user_ans'];

						}	

								

								?>
                        &nbsp;&nbsp;<i class="fa fa-times " style="color:red" aria-hidden="true" ></i></td>
                    </tr>
                    <?php } else { ?>
                    <tr >
                      <td rowspan='2' >Question <?php echo $i;?></td>
                      <td ><?php //echo $val['question'];?>
                        <?php   if($q =='jpg'||$q =='jpeg'||$q =='gif'||$q =='png')	 { ?>
                        <img src="<?php echo base_url();?>uploaded_files/question/<?php echo $val['question'];?>" style="width:200px;height:100px;">
                        <?php }else{

							echo $val['question'];

						}	

								

								?></td>
                        </td>
                    </tr>
                    <tr >
                      <td ><?php //echo $val['ans'];?>
                        <?php   if($ans =='jpg'||$ans =='jpeg'||$ans =='gif'||$ans =='png')	 { ?>
                        <img src="<?php echo base_url();?>uploaded_files/option/<?php echo $val['ans'];?>" style="width:200px;height:100px;">
                        <?php }else{

							echo $val['ans'];

						}	

								

								?>
                        &nbsp;&nbsp;<i class="icon-circle-blank"></i></td>
                    </tr>
                    <?php } $i++;
												} ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</aside>
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
  <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5f71a438f0e7167d00145220/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-151377731-1"></script>
