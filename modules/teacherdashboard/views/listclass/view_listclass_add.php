<?php $ref=$this->input->get_post('ref');?>
<?php $mem_info=get_db_single_row('wl_teacher',$fields="first_name,is_verified,current_credit,referral_code,profile_edit,plan_expire,email_verify",$condition="WHERE 1 AND teacher_id='".$this->session->userdata('teacher_id')."'");?>
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
	  
        <?php 
		$date = new DateTime('now');
		$currentDate = $date->format('Y-m-d h:i:s');
		$expireDate =  $mem_info['plan_expire'];
		if($expireDate > $currentDate && $mem_info['current_credit']!=0){
		?>
        <ul class="nav">
          <li class="nav-item   ">
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
          <li class="nav-item active">
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
              <i class="material-icons">money</i>
              <p>Wallet/Credit History: <span style="color:#F00;">(<?php echo ($mem_info['current_credit']==0)?"0":$mem_info['current_credit'];?>)</span></p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url();?>teacherdashboard/courses/">
              <i class="material-icons">content_copy</i>
              <p>My Courses</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url();?>teacherdashboard/credit/history/">
              <i class="material-icons">money</i>
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
		<li class="nav-item   ">
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
          <li class="nav-item active">
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
              <i class="material-icons">money</i>
              <p>Wallet/Credit History: <span style="color:#F00;">(<?php echo ($mem_info['current_credit']==0)?"0":$mem_info['current_credit'];?>)</span></p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url();?>teacherdashboard/courses/">
              <i class="material-icons">content_copy</i>
              <p>My Courses</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url();?>teacherdashboard/credit/history/">
              <i class="material-icons">money</i>
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
	<div class="main-panel">
      <!-- Navbar -->
	  <?php 
                    $idds = $this->session->userdata('teacher_id');
                    $dbe = $this->load->database('default', TRUE);
                    $sq = "SELECT referral_code FROM `wl_teacher` WHERE teacher_id='".$idds."'";
                    $qu=$dbe->query($sq);
                    $value= $qu->result_array();
                    $referral_code = $value[0]['referral_code'];
                    ?>
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">List Your Class</a>
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
                <a class="nav-link" href="<?php echo base_url()?>scholarship/register/student">
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
			  <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>scholarship/register/student">
                  <i class="material-icons">content_paste</i>
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
                    $idd = $this->session->userdata('teacher_id');
                    $dbe = $this->load->database('default', TRUE);
                    $sq = "SELECT current_credit, plan_expire, liveplan  FROM `wl_teacher` WHERE teacher_id='".$idd."'";
                    $qu=$dbe->query($sq);
                    $value= $qu->result_array();
                    $credit_point = $value[0]['current_credit'];
                    $planExpire = $value[0]['plan_expire'];
					$liveplan = $value[0]['liveplan'];
                    $date = new DateTime('now');
                    $currentDate = $date->format('Y-m-d h:i:s');
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
                          <?php if($credit_point =='0' || $credit_point == '' || ($planExpire<$currentDate)){ ?>
                          <p class="dropdown-item" style="font-size:11px; color:red;">Credit Exhausted. Buy Now. <?php //echo $credit_point; ?></p>
                          <?php } else{ ?>
                          <p class="dropdown-item" style="font-size:11px;">Remaining Credits: <?php echo $credit_point; ?><br>Plan Expires: <?php echo $planExpire; ?></p>
                          <?php } ?>
                          <div class="dropdown-divider"></div>
                          <p class="dropdown-item" onclick="window.location.href='<?php echo base_url(); ?>teacherdashboard/edit_account'">User Profile</p>
						  <p class="dropdown-item" onclick="window.location.href='<?php echo base_url(); ?>teacherdashboard/student'">Search Student Online</p>
                          <p class="dropdown-item" onclick="window.location.href='<?php echo base_url(); ?>teacherdashboard/liveclass'">Live Classes Portal</p>
                          <!--<p class="dropdown-item" onclick="window.location.href='<?php //echo base_url(); ?>#'">Webinars/Workshops</p>-->
                          <p class="dropdown-item" onclick="window.location.href='<?php echo base_url(); ?>teacherdashboard/courses'">My Courses</p>
                          <p class="dropdown-item" onclick="window.location.href='<?php echo base_url(); ?>teacherdashboard/profile'">Your Subject Listing</p>
                          <p class="dropdown-item" onclick="window.location.href='<?php echo base_url(); ?>teacherdashboard/plan'">Upgrade to Pro</p>
                          <p class="dropdown-item" onclick="window.location.href='<?php echo base_url(); ?>teacherdashboard/change_password'">Change Password</p>
                          
                          <div class="dropdown-divider"></div>
                          <p class="dropdown-item" onclick="window.location.href='<?php echo base_url(); ?>teacher/logout'">Logout</p>
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
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add New Listing Information </h4>
                  <p class="card-category"></p>
                </div>
				<div class="login-form-container">
                    <div class="login-register-form">

					<form action="<?php echo base_url(); ?>teacherdashboard/listclass/addlistclass" enctype="multipart/form-data" method="post" onsubmit="return validate()" accept-charset="utf-8">
 <!-- <form action="/action_page.php"> -->
                <div class="card-body">
					<div class="row">
					<div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Class Title*</label>
						  <div class='extra'>
						    <input type="text" id="class_title" class="form-control" name="class_title" value="" placeholder="Enter Class Title">
  <!-- <input type="text" id="class_name" name="class_title" style="background-color:#e6e6e6;" disabled> -->
  <p class="required" id="classTitleError" style="display: none;">Class Title is required</p>
                        </div>
                      </div>
					   </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Class Schedule Time:*</label>
                    	<div class='time'>  
		<?php 
		$start = strtotime('12:00 AM');
		$end   = strtotime('11:59 PM');
		?>
		<select name="class_schedule_time" id="class_schedule_time" class="form-control" >
		<option value = "" selected disabled>Please Select a Time</option>
		<?php for($i = $start;$i<=$end;$i+=900){ ?>  
		<option value='<?php echo date('G:i', $i); ?>'><?php echo date('G:i', $i); ?></option>;
		<?php } ?>
		</select>
		<p class="required" id="classScheduleTimeError" style="display: none;">Class Schedule Time is required</p>
	</div>
	
	
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Class Duration(Mins):*</label>
		<select style="width:190px;" name="class_duration" class="form-control" id="class_duration" required>
		<option value="" selected disabled>Select Class Duration</option>
		<option value="30">30 Mins</option>
		<option value="45">45 Mins</option>
		<option value="60">60 Mins</option>
		<option value="90">90 Mins</option>
		</select>
			
                        </div>
                      </div>
                    </div>
					
					<div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Category*</label>
						  <select name="category" onChange="getSubcat(this.value);" id="category" class="form-control">
                    	<option value="">Select category</option>
                        <?php 
							$sql="SELECT * FROM `wl_categories`  where status='1' AND parent_id='0' ORDER BY sort_order";
							$query=$this->db->query($sql);
							foreach($query->result_array() as $val):
							?>
                            <option value="<?php echo $val['category_id']?>" <?php echo set_select('category',$val['category_id'], ( !empty($category) && $category == $val['category_id'] ? TRUE : FALSE )); ?>><?php echo $val['category_name']?></option>
                            <?php endforeach;?>
                    </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Class*</label>
						  <select name="class" id="sub-list" onChange="getSubcatNext(this.value);" class="form-control">
                    	<option value="">Select Category first</option>
						
                    </select>
                        </div>
                      </div>
					  
                    </div>
					
					
					<div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Class Date*</label>
<input type="date" id="class_date" min="<?php echo date("Y-m-d") ?>" class="form-control" name="class_date" style="width: 160px"; required> 
                        </div>
                      </div>
                     
					  
					   <div class="col-md-6">
                        <div class="form-group">			
						<?php
		 $dbe = $this->load->database('default', TRUE);
		 $sqs = "SELECT plan_expire FROM `wl_teacher` WHERE teacher_id='".$this->session->userdata('teacher_id')."'";
		 $qus=$dbe->query($sqs);
		 $values= $qus->result_array();
		 //echo $values[0]['plan_expire'];
		 $plan_expire = $values[0]['plan_expire'];
		 $date = new DateTime('now');
		$currentDate = $date->format('Y-m-d');
		$flag = false;
		if($currentDate < $plan_expire)
		{
			$flag = true;
		}
		//echo $flag."<br>".$currentDate."<br>".$plan_expire;
		 ?>
		 <?php 
		 if($flag === true)
		 {
		 ?>
<div class='time' > Select Your Per Class Fees (1 Credit = Rs75):
		<select style="width:250px;" name="class_credit_amount" class="form-control" id="class_credit_amount" required>
		
			<option value="" selected disabled>Select Class Credit Amount</option>
			<option value="0">0 Credit - For Demo Class</option>
			<option value="1">1 Credit</option>
			<option value="2">2 Credit</option>
			<option value="3">3 Credit</option>
			<option value="4">4 Credit</option>
			<option value="5">5 Credit</option>
			<option value="6">6 Credit</option>	
			<option value="7">7 Credit</option>
			<option value="8">8 Credit</option>
			<option value="9">9 Credit</option>
			<option value="10">10 Credit</option>
		</select>
	</div>
		 <?php }
		 else{ ?>
		 <div class='time' > Select Your Per Class Fees (1 Credit = Rs75):
		<select style="width:250px;" name="class_credit_amount" class="form-control" id="class_credit_amount" required>
		
			<option value="" selected disabled>Select Class Credit Amount</option>
			<option value="0">0 Credit - For Demo Class</option>
			<option value="1" disabled>1 Credit</option>
			<option value="2" disabled>2 Credit</option>
			<option value="3" disabled>3 Credit</option>
			<option value="4" disabled>4 Credit</option>
			<option value="5" disabled>5 Credit</option>
			<option value="6" disabled>6 Credit</option>	
			<option value="7" disabled>7 Credit</option>
			<option value="8" disabled>8 Credit</option>
			<option value="9" disabled>9 Credit</option>
			<option value="10" disabled>10 Credit</option>
		</select>
	</div>
		 <?php } ?>	
						
						</div>
                        </div>
                      </div>
					<div class="button-box">
                    <div class="login-toggle-btn">
					              
                   <div class="form-group">	
				   <button class="default-btn" type="submit"><span>Submit</span></button> 
                     </div>                   
                  </div>
				  
				  
                  <?php echo form_close();?>
  
  <!-- </form>  -->
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
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-151377731-1');
</script>
<script data-ad-client="ca-pub-9034141091044478" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<script>
function getSubcat(val) {
	$("#wait").css("display", "block");
	$.ajax({
	type: "POST",
	url: "<?php echo base_url();?>teacherdashboard/listclass/getSubcat",
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
	url: "<?php echo base_url();?>teacherdashboard/listclass/getSubcatNext",
	data:'category_id_next='+val,
	success: function(data){
		$("#next-list").html(data);
		$("#wait").css("display", "none");
	}
	});
}
</script>
<script>
$(document).ready(function(){
  $("#class_title").change(function(){
  var valuef = $("#class_title").val();
  valuef.trim();
  var abc = valuef.trim().replaceAll(' ', '-');
  //console.log(abc);
    $("#class_title").val(abc);
  });
});
</script>
<script>
function validate()
{
	var classtitle = document.querySelector('#class_title').value;
	if(classtitle.trim() == "")
	{
		document.querySelector("#classTitleError").style.display = "block";
		return false;
	}
	var classscheduletime = document.querySelector('#class_schedule_time').value;
	//alert(classscheduletime);
	if(classscheduletime.trim() == "")
	{
		//alert('works');
		document.querySelector("#classScheduleTimeError").style.display = "block";
		return false;
	}
	var x = document.getElementById("sub-list").value;
    if(x=='' || x=='377' || x=='373' || x=="374" || x=='375' || x== '530' || x== '432' || x== '376' || x== '526')
    {
      //alert('Select class ');
      document.getElementById("sub-list-error").style.display = "block";
      
      return false;
    }
	//return false;

}
</script>
</body>

</html>