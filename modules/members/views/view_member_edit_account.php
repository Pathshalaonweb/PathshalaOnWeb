<?php $mem_info=get_db_single_row('wl_customers',$fields="phone_number,referral_code,login_type,credit_point,user_name",$condition="WHERE 1 AND customers_id='".$this->session->userdata('user_id')."'");?>

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
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url();?>members/myaccount">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url();?>members/edit_account">
              <i class="material-icons">person</i>
              <p>User Profile</p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">content_paste</i>
              <p>My LMS</p>
            </a>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
				  <a class="dropdown-item" href="<?php echo base_url();?>lms/course_material">Your Course</a>
                  <a class="dropdown-item" href="<?php echo base_url();?>lms/home">Mock Exam Test</a>
                  <a class="dropdown-item" href="<?php echo base_url();?>lms/home/online_exam">Online Exam Test</a>
				  <a class="dropdown-item" href="<?php echo base_url();?>lms/exam/test_result">Mock Test Result</a>
				  <a class="dropdown-item" href="<?php echo base_url();?>lms/exam/exam_result">Exam Test Result</a>
                </div>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url();?>members/liveclass">
              <i class="material-icons">library_books</i>
              <p>Live Classes</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url();?>members/credithistory">
              <i class="material-icons">money</i>
              <p>Wallet/Credit History :</p><?php if(!empty($mem_info['credit_point'])){echo "<strong>(".$mem_info['credit_point'].")</strong>";}else{echo "<strong>(00)</strong>";}?>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url();?>members/change_password">
              <i class="material-icons">bubble_chart</i>
              <p>Change Password</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url();?>members/credit_list">
              <i class="material-icons">money</i>
              <p>Payment History</p>
            </a>
          </li>
          <li class="nav-item active-pro ">
            <a class="nav-link" href="<?php echo base_url();?>members/credit">
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
                    $dbe = $this->load->database('default', TRUE);
                    $sq = "SELECT referral_code FROM `wl_customers` WHERE customers_id='".$idds."'";
                    $qu=$dbe->query($sq);
                    $value= $qu->result_array();
                    $referral_code = $value[0]['referral_code'];
                    ?>
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Edit User Profile</a>
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
                <a class="nav-link" href="<?php echo base_url()?>">
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
				  <a class="dropdown-item" href="<?php echo base_url();?>search">Search Tutor</a>
                  <a class="dropdown-item" href="<?php echo base_url();?>courses">Search Courses</a>
                  <a class="dropdown-item" href="<?php echo base_url();?>liveclasses">Search Live Tutor</a>
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
				  <a class="dropdown-item" href="<?php echo base_url();?>acadex">AcadeX</a>
                  <a class="dropdown-item" href="<?php echo base_url();?>searchliveclasses">Master Classes</a>
                  <a class="dropdown-item" href="<?php echo base_url();?>webinars">Webinars</a>
                  <a class="dropdown-item" href="<?php echo base_url();?>virtualcamp">Virtual Camp</a>
                </div>
              </li>
			  <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>scholarship/register/student">
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
				  <a class="dropdown-item" href="<?php echo base_url();?>competition/register/parent">Foreign Language Olympiad</a>
                </div>
              </li>
			  
			  <?php 
                    $idd = $this->session->userdata('user_id');
                    $dbe = $this->load->database('default', TRUE);
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
                          <p class="dropdown-item" onclick="window.location.href='<?php echo base_url(); ?>members/edit_account'">User Profile</p>
                          <p class="dropdown-item" onclick="window.location.href='<?php echo base_url(); ?>members/liveclass'">Live Classes Portal</p>
                         <!-- <p class="dropdown-item" onclick="window.location.href='<?php //echo base_url(); ?>#'">Webinars/Workshops</p> -->
                          <p class="dropdown-item" onclick="window.location.href='<?php echo base_url(); ?>lms'">My Learning Management System (LMS)</p>
                          <p class="dropdown-item" onclick="window.location.href='<?php echo base_url(); ?>members/credit'">Upgrade to Pro</p>
                          <p class="dropdown-item" onclick="window.location.href='<?php echo base_url(); ?>members/change_password'">Change Password</p>
                          
                          <div class="dropdown-divider"></div>
                          <p class="dropdown-item" onclick="window.location.href='<?php echo base_url(); ?>users/logout'">Logout</p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
				<div class="login-register-wrapper">
              <div class="login-register-tab-list nav"> <a class="active" data-toggle="tab" href="#lg1">
			  <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                  <form action="<?php echo base_url(); ?>members/edit_account" enctype="multipart/form-data" method="post" onsubmit ="return validate()">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username/Email address(Disabled)</label>
						  <input type="text" class="form-control" disabled name="user_name"  value="<?php echo set_value('user_name',$mres['user_name']); ?>">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
						  <input type="text" class="form-control" name="first_name" value="<?php echo set_value('first_name',$mres['first_name']); ?>">
                        </div>
                      </div>
					  <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Phone Number</label>
						  <input type="text" class="form-control" name="phone_number" placeholder="Phone" value="<?php echo set_value('phone_number',$mres['phone_number']); ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Adress</label>
						  <input type="text" class="form-control" name="address" value="<?php echo set_value('address',$mres['address']);?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">State*</label>
						 <select name="state_id" id="state" class="form-control">
                    	<option value="">Select State</option>
                        	<?php 
							$sql="SELECT * FROM `tbl_states`  where country_id='101'  ORDER BY name";
							$query=$this->db->query($sql);
							foreach($query->result_array() as $val):
							?>
                            <option value="<?php echo $val['id']?>" <?php echo set_select('state_id',
							$val['id'], ( !empty($state) && $state == $val['id'] ? TRUE : FALSE )); ?>><?php echo $val['name']?></option>
                            <?php endforeach;?>
                    </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                         <label class="bmd-label-floating">City*</label>
						   <select id="city" name="city" class="form-control">
    						<option value="">Select state first</option>
						</select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Postal Code</label>
						  <input type="text" class="form-control" name="pincode" placeholder="pincode" value="<?php echo set_value('pincode',$mres['pincode']);?>">
                        </div>
                      </div>
                    </div>
					<div class="row">
					<div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Category</label>
						  <?php $class_dropdown = $mres['class_dropdown'];
                    //$db2 = $this->load->database('default', TRUE);
                     $sql2="SELECT * FROM `wl_categories`  WHERE `category_id` = '$class_dropdown'";
                            $query=$this->db->query($sql2);
                            $row=$query->result_array();
                            //print_r($row);
                           $parent_id = $row[0]['parent_id'];
                      
                     ?>
					<select name="category" id="category" class="form-control" required>
					 <option value="">Select Category</option>
                       <?php 
                       $sqll="SELECT * FROM `wl_categories`  WHERE `category_id` = '$parent_id'";
                       $queryy=$this->db->query($sqll);
                            $roww=$queryy->result_array();
                       ?>
                       <?php
                         $sql="SELECT * FROM `wl_categories`  where status='1' AND parent_id='0' ORDER BY sort_order";
                         $querys=$this->db->query($sql);
                         if($row[0]['category_id'] == "")
                         {?>
                         <option value="" selected="selected" disabled>Please Select a Category</option>
                         <?php }
                         foreach($querys->result_array() as $val):
                          if($val['category_id'] == $roww[0]['category_id'])
                          {
                       ?>
                       <option value="<?php echo $val['category_id']?>" selected="selected"><?php echo $val['category_name']; ?></option>
                          <?php } else {?>
                       <option value="<?php echo $val['category_id']?>"><?php echo $val['category_name']; ?></option>
                          <?php }?>
                         <?php endforeach; ?>
                     </select>
					 </div>
					 </div>
					  <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Class</label>
                      <select name="classes" id="classes" class="form-control">
					  <option value="" selected="selected">Select Category first</option>
                      </select>
                      <div class="requried" id="classeserror" style="display:none; color:red;">Please Select an Option.</div>
                        </div>
                      </div>
					  </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>About Me</label>
                          <div class="form-group">
							<textarea class="form-control" rows="5" placeholder="Description" name="description"> <?php echo set_value('description',$mres['description']);?></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
					<div class="form-group">
					<div class="button-box">
                    <button type="submit" class="default-btn">Update Profile</button>
					</div>
					</div>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
			</div>
			</div>
          <!-- <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="javascript:;">
                    <img class="img" src="<?php echo base_url(); ?>/uploaded_files/thumb_cache/thumb_190_190_noimg1.gif" />
                  </a>
                </div>
                <div class="card-body">
				<div class="file">
                      <label for="files">Upload photo</label>
                      <input type="file" id="files" class="" name="userimage"/>
                    </div>
                    <?php //echo UPLOAD_DIR; ?>
                </div>
              </div>
            </div>-->
          </div>
        </div>
      </div>
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
  <script type="text/javascript">
$(document).ready(function(){
    $('#state').on('change',function(){
        var stateID = $(this).val();
		$("#wait").css("display", "block");
        if(stateID){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>members/edit_account/selectstate',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
					$("#wait").css("display", "none");
                }
            }); 
        }else{
           // $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
 });
</script>
<script>
function getSubcat(val) {
	$("#wait").css("display", "block");
	$.ajax({
	type: "POST",
	url: "<?php echo base_url();?>members/edit_account/getSubcat",
	data:'category_id='+val,
	success: function(data){
		$("#sub-list").html(data);
		$("#wait").css("display", "none");
		//getSubcatNext();
	}
	});
}
function getSubcatNext(val) {
	$("#wait").css("display", "block");
	$.ajax({
	type: "POST",
	url: "<?php echo base_url();?>members/edit_account/getSubcatNext",
	data:'category_id_next='+val,
	success: function(data){
		$("#next-list").html(data);
		$("#wait").css("display", "none");
	}
	});
}
</script>
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
</body>

</html>

<div class="event-area my-acc pt-20 pb-130">
  <div class="container">
    <div class="row">
      <?php $this->load->view("myaccount_left");?>
      <div class="col-xl-9 col-lg-4">
        <div class="blog-all-wrap mr-40">
          <div class="col-lg-9 col-md-12 ml-auto mr-auto">
            <div class="login-register-wrapper">
              <div class="login-register-tab-list nav"> <a class="active" data-toggle="tab" href="#lg1">
                <h4> Edit Profile Information </h4>
                </a> </div>
              <div class="tab-content">
                <div id="lg1" class="tab-pane active">
                  <div class="login-form-container">
                    <div class="login-register-form">
                  	<?php echo validation_message();?>
					<?php echo error_message(); ?>
          <form action="<?php echo base_url(); ?>members/edit_account" enctype="multipart/form-data" method="post" onsubmit ="return validate()">
                    <input type="text" name="first_name" placeholder="Name" value="<?php echo set_value('first_name',$mres['first_name']); ?>">
                    <input type="text" name="phone_number" placeholder="Phone" value="<?php echo set_value('phone_number',$mres['phone_number']); ?>">
                    <div class="file">
                      <label for="files">Upload photo</label>
                      <input type="file" id="files" class="" name="userimage"/>
                    </div>
                    <?php //echo UPLOAD_DIR; ?>
                    <?php $class_dropdown = $mres['class_dropdown'];
                    //$db2 = $this->load->database('default', TRUE);
                     $sql2="SELECT * FROM `wl_categories`  WHERE `category_id` = '$class_dropdown'";
                            $query=$this->db->query($sql2);
                            $row=$query->result_array();
                            //print_r($row);
                           $parent_id = $row[0]['parent_id'];
                      
                     ?>
                     <select name="category" id="category" required>
					 <option value="">Select Category</option>
                       <?php 
                       $sqll="SELECT * FROM `wl_categories`  WHERE `category_id` = '$parent_id'";
                       $queryy=$this->db->query($sqll);
                            $roww=$queryy->result_array();
                       ?>
                       <!-- <option value ="<?php //echo $roww[0]['category_id'] ?>" selected="selected"><?php //echo $roww[0]['category_name'];?> </option> -->
                       <?php
                         $sql="SELECT * FROM `wl_categories`  where status='1' AND parent_id='0' ORDER BY sort_order";
                         $querys=$this->db->query($sql);
                         if($row[0]['category_id'] == "")
                         {?>
                         <option value=""selected="selected" disabled>Please Select a Category</option>
                         <?php }
                         foreach($querys->result_array() as $val):
                          if($val['category_id'] == $roww[0]['category_id'])
                          {
                       ?>
                       <option value="<?php echo $val['category_id']?>" selected="selected"><?php echo $val['category_name']; ?></option>
                          <?php } else {?>
                       <option value="<?php echo $val['category_id']?>"><?php echo $val['category_name']; ?></option>
                          <?php }?>
                         <?php endforeach; ?>
                     </select>
                      <select name="classes" id="classes">
                     <option value="<?php echo $class_dropdown; ?>" selected="selected"><?php echo $row[0]['category_name']; ?></option>
                      </select>
                      <div class="requried" id="classeserror" style="display:none; color:red;">Please Select an Option.</div>
                    <textarea placeholder="Address" name="address"><?php echo set_value('address',$mres['address']);?></textarea>
                    <input type="text" name="pincode" placeholder="pincode" value="<?php echo set_value('pincode',$mres['pincode']);?>">
                    <!-- <p>Description:</p> -->
                    <textarea placeholder="Description" name="description"> <?php echo set_value('description',$mres['description']);?></textarea>
                  
                	<div class="button-box">
                      <button class="default-btn" type="submit"><span>Update</span></button>
                    </div>
                  </form>
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
</div>

<style>.button-box {
    text-align: center;
}</style>

<script>
  function validate()
  {
    var x = document.getElementById("classes").value;
    if(x=='' || x=='377' || x=='373' || x=="374" || x=='375' || x== '530' || x== '432' || x== '376' || x== '526')
    {
      //alert('Select class ');
      document.getElementById("classeserror").style.display = "block";
      
      return false;
    }
  }
</script> 
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