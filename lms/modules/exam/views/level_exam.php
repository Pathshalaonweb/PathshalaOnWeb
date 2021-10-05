<?php //$this->load->view("top_application");?>
<?php //$this->load->view("project_left");?>
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
                  <a class="dropdown-item active" href="<?php echo base_url();?>home/online_exam">Online Exam Test</a>
				  <a class="dropdown-item" href="<?php echo base_url();?>exam/test_result">Mock Test Result</a>
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
            <a class="navbar-brand" href="javascript:;">My LMS - Online Exams</a>
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
  <?php  
	foreach($lession as $k1=>$v1)
	{ 
		$sel_q ="SELECT lession FROM `tbl_lession` where lession_id=".$v1['lession_id'];
		$sub_res	=	$this->db->query($sel_q);
		$list_sub	=	$sub_res->result_array();
		$sub_res	=	$list_sub[0];
		$t_time		= 	explode(':',$v1['str_total_time']);

	?>
  <section class="content" id="main" style="display:block">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="row frame frame-padding frame-shadow-raised p20">
            <h3 class="ac darkperpol" style="border-bottom: 2px dotted #941f78;"><?php echo $v1['lession'];?></h3>
            <h4 class="mb5 pl15"><?php echo $v1['lession'];  ?> Test</h4>
            <div class="content_box" id="con_box<?php echo $v1['lession_id'];?>">
              <div class="col-xs-12 col-sm-6 col-md-6 ">
                <h5 class="darkperpol mb0">General Instructions</h5>
                <ol class="p11 list_bar">
                  <li>There are Four options with each question.</li>
                  <li>Please choose your option by clicking the mouse.</li>
                  <li>There are four buttons / keys at the bottom.</li>
                  <li>"Clear Selection" button will clear the selected option for that question.</li>
                  <li>"Previous" button will take you to the previous question.</li>
                  <li>"Next" button will take you to the next question.</li>
                  <li>"Finish" button will finish the exam, and take you to the result page. 
                    
                    (This will take some time, so please wait).</li>
                  <li>You can re-open your saved exam from My Exam history page.</li>
                  <li>We have <b>"Questions Dashboard"</b> on the right side of the page, once you click on it, you can view all your attempted and un-attempted questions.</li>
                  <li>You can go back or forward by clicking on the serial number of the question displayed on the Dashboard</li>
                  <li>The attempted questions will be displayed in green colour and the un-attempted questions will be displayed in white colour.</li>
                  <li>You can see the time clock on the top right corner of the exam page.</li>
                </ol>
              </div>
              <?php 

							$mark=$v1['str_total_mark']/$v1['total_question'];

							if($t_time[0] == '0')

							{

								$t_hour=0;

							}else{

								$t_hour=$t_time[0];

							}

							?>
              <div class="col-xs-12 col-sm-6 col-md-6 ">
                <h5 class="darkperpol mb10">Test Specific Instructions</h5>
                <ol class="list_bar">
                  <li>Duration of this Demo Test is <?php echo $t_hour;?> hour <?php echo $t_time[1];?> minutes</li>
                  <li>Total No. of Questions are <?php echo $v1['total_question'];?>.</li>
                  <li>There is only ONE correct answer.</li>
                  <li>For each correct answer there will be <?php echo $mark;?> marks.</li>
                </ol>
                <p><span class="darkperpol fs18 fsb">Disclaimer :</span>This exam is only for demo purpose to indicate the online test environment & style and is not indicative of any actual performance. You will need to purchase actual exam to prepare and experience the detailed analytic reports.</p>
                <div class="fl pt30">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" id='check<?php echo $v1['lession_id'];?>' value="1">
                      I have read all instructions. </label>
                  </div>
                  <a href="javascript:void(0);" class="btn login_bar mt5 fr" id="startdemo" onClick="con_box(<?php echo $v1['lession_id'];?>)">Start Exam Test</a> </div>
              </div>
            </div>
            <div class="demotext mt20" id="show_test<?php echo $v1['lession_id'];?>" style="display:none;">
              <div class=" col-sm-12 text-center">
                <p>Time to complete your test is <?php echo $t_hour;?> hour <?php echo $t_time[1];?> minutes
                  
                  Please check the time clock.</p>
                <a href="javascript:void(0);" class="btn  login_bar" onclick ="exam_start(<?php echo $v1['lession_id'];?>); start_timer()" id="ok">Ok</a> </div>
            </div>
            <div class="questext" id="exam_start<?php echo $v1['lession_id'];?>" style="display:none"> <?php echo form_open('','role="form"');?>
              <div style="border-bottom:1px solid #ccc;" class="pb36">
                <div class="col-sm-4">
                  <h6>Question
                    <label id='c_que'>1</label>
                    of <?php echo $v1['total_question'];?></h6>
                </div>
                <div class="col-sm-4">
                  <h4 class="ac"><span id="countdown" class="timer"></span> </h4>
                </div>
                <div class="col-sm-4">
                  <h6 class="darkperpol fr">Questions Dashboard</h6>
                </div>
              </div>
              <?php   

							$sel_q ="SELECT * FROM `tbl_question` where lession_id='".$v1['lession_id']."'";

							$fetch_que=$this->db->query($sel_q);

							//echo_sql();

							$fetch_que=$fetch_que->result_array();

							$q_no= count($fetch_que); $i=1;

							?>
              <div class="pt10">
                <?php  foreach($fetch_que as $k2=>$v2){?>
                <div class="col-xs-12 col-sm-7" id="que<?php echo $i;?>" style="display:none">
                  <div class="heightbar">
                    <div id="quesion1">
                      <?php if($v2['question'] !=''){ ?>
                      <p class="fs16">Q .<?php echo $i.' ' . $v2['question'];?></p>
                      <?php } else{ ?>
                      <p class="fs16">Q .<?php echo $i;?></p>
                      <img src="<?php echo base_url();?>uploaded_files/question/<?php echo $v2['que_img'];?>" >
                      <?php } ?>
                      <br>
                      <ol>
                        <li>
                          <div class="">
                            <label>
                              <input type="radio" name="options<?php echo $i;?>" value="<?php echo $v2['option_i'];?>" onclick="makegreen(<?php echo $i;?>);">
                              <?php echo $v2['option_i'];?> </label>
                          </div>
                        </li>
                        <li>
                          <div class="">
                            <label>
                              <input type="radio" name="options<?php echo $i;?>"value="<?php echo $v2['option_ii'];?>"onclick="makegreen(<?php echo $i;?>);" >
                              <?php echo $v2['option_ii'];?> </label>
                          </div>
                        </li>
                        <li>
                          <div class="">
                            <label>
                              <input type="radio" name="options<?php echo $i;?>" value="<?php echo $v2['option_iii'];?>"onclick="makegreen(<?php echo $i;?>);" >
                              <?php echo $v2['option_iii'];?> </label>
                          </div>
                        </li>
                        <li>
                          <div class="">
                            <label>
                              <input type="radio" name="options<?php echo $i;?>"  value="<?php echo $v2['option_iv'];?>" onclick="makegreen(<?php echo $i;?>);" >
                              <?php echo $v2['option_iv'];?> </label>
                          </div>
                        </li>
                      </ol>
                    </div>
                  </div>
                </div>
                <?php $i++; } ?>
                <div class="col-xs-12 col-sm-5">
                  <p class="darkperpol w100 mb10" style="text-align:right;">Attempted <span class="text-danger">(Green)</span></p>
                  <div class="ques_no pt20">
                    <ul>
                      <?php $i=1; foreach($fetch_que as $k2=>$v2){ ?>
                      <li><a href="javascript:void(0);" onclick="go(<?php echo $i;?>)" id="que_no<?php echo $i;?>">Q <?php echo $i; ?></a></li>
                      <?php $i++; }?>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
              <?php $i=1;

							$t_que= count($fetch_que);

							foreach($fetch_que as $k2=>$v2){ ?>
              <div id="page<?php echo $i;?>" style = "display:none" > 
                
                <!--<input type="reset"class="btn login_bar" value="Clear Option"  onclick="cleard(<?php echo $t_que;?>);" >--> 
                
                <!--<a href="javascript:void(0);" class="btn login_bar">Clear Option</a>--> 
                
                <a href="javascript:void(0);" class="previous btn prev_bar" id="pre<?php echo $i;?>" onclick="previous(<?php echo $i;?>,<?php echo $t_que;?>)">Previous</a> <a href="javascript:void(0);" class="next btn login_bar" onclick="next(<?php echo $i;?>,<?php echo $t_que;?>)">Next</a> </div>
              <?php $i++; }?>
              
              <!-- <a href="#." class="fr btn login_bar" >Finish &amp; Exit</a>-->
              
              <input type="submit" name="sub" value="Finish &amp; Exit" id="examsub" class="fr btn login_bar">
              <?php echo form_close();?> </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- #main --> 
  
</aside>
</div>
<form>
  <input type="hidden" id="run" value ="1" name="txt">
</form>
<?php }?>
<?php 
	$th= $t_time[0];
	$tm= $t_time[1];
	$th=$th*60*60;
	$tm=$tm*60;
	$t=$th+$tm;
	?>
<?php //echo $t;?>
<script  type="text/javascript">
var upgradeTime = <?php echo $t;?>;
var seconds = upgradeTime;
function timer() 

{

    var days        = Math.floor(seconds/24/60/60);

    var hoursLeft   = Math.floor((seconds) - (days*86400));

    var hours       = Math.floor(hoursLeft/3600);

    var minutesLeft = Math.floor((hoursLeft) - (hours*3600));

    var minutes     = Math.floor(minutesLeft/60);

    var remainingSeconds = seconds % 60;

    if (remainingSeconds < 10) {

        remainingSeconds = "0" + remainingSeconds; 

    }

    document.getElementById('countdown').innerHTML =  hours + ":" + minutes + ":" + remainingSeconds;

    if (seconds == 0) {   

		start_timer(1);

		document.getElementById("examsub").click();       

    }

	else

	{

        seconds--;

    }

}

function start_timer(id=0)

{

	if(id==1)

	{

		clearInterval(countdownTimer);

	}

	var countdownTimer = setInterval('timer()', 1000);		

}

</script> 
<script  type="text/javascript">

function start_exam(id)

{

	var str1 = "detail";

	var str2 = id;

	var str3 = "main";

	var res1 = str1.concat(str2);

	var res2 = str3.concat(str2);

	document.getElementById("" + res1.toString() + "").style.display = "none";

	document.getElementById("" + res2.toString() + "").style.display = "block";

	//document.getElementById("main").style.display = "block";

}			

function con_box(id)

{

	var str1 = id;

	var str2 = "check";

	var str3 = "show_test";

	var str4 = "con_box";				

	var res1 = str2.concat(str1); 

	var res2 = str3.concat(str1); 

	var res3 = str4.concat(str1); 

					

	if(document.getElementById("" + res1.toString() + "").checked)

	{

		document.getElementById("" + res3.toString() + "").style.display = "none";

		document.getElementById("" + res2.toString() + "").style.display = "block";

	}

	else

	{

		alert('Please select the checkbox !!!');

	}			

}

				

function exam_start(id)

{

		var str1 = id;

		var str2 = "show_test";

		var str3 = "exam_start";

		var str4 = "que";

		var str5 = "page";

	

		var res1 = str2.concat(str1); 

		var res2 = str3.concat(str1); 

		var res3 = str4.concat("1");

		var res4 = str5.concat("1");

		

		 document.getElementById("" + res1.toString() + "").style.display = "none";

		 document.getElementById("" + res2.toString() + "").style.display = "block";

		 document.getElementById("" + res3.toString() + "").style.display = "block";

		 document.getElementById("" + res4.toString() + "").style.display = "block";		   

}

function next(id,t_que)

{ 

	var str = id;

	var str1 = ++str;

	var str2 = "que";

	var str3 = "page";

	var str4 = "pre";

	

	var res1 = str2.concat(str1); 

	var res2 = str3.concat(str1); 

	var res3 = str2.concat(id); 

	var res4 = str3.concat(id); 

	var res5 = str4.concat(str1);

	

	if(id < t_que)

	{

		document.getElementById("" + res3.toString() + "").style.display = "none";

		document.getElementById("" + res4.toString() + "").style.display = "none";

		document.getElementById("" + res1.toString() + "").style.display = "block";

		document.getElementById("" + res2.toString() + "").style.display = "block";

		document.getElementById('run').value = str1;

	}	

}

function previous(id,t_que)

{ 

	var str = id;

	var str1 = --str;

	var str2 = "que";

	var str3 = "page";

	var str4 = "pre";

	var res1 = str2.concat(str1); 

	var res2 = str3.concat(str1); 

	var res3 = str2.concat(id); 

	var res4 = str3.concat(id); 

	var res5 = str4.concat(str1);

	if(id > 1)

	{

		document.getElementById("" + res3.toString() + "").style.display = "none";

		document.getElementById("" + res4.toString() + "").style.display = "none";

		document.getElementById("" + res1.toString() + "").style.display = "block";

		document.getElementById("" + res2.toString() + "").style.display = "block";

		document.getElementById('run').value = str1;

	}	

}

function makegreen(id)
{
	var str = id;		
	var str1 = "que_no";
	var res1 = str1.concat(str); 
	document.getElementById("" + res1.toString() + "").style.background = "green";
}

function cleard(total)
{
	var i;
	for(i=1; i<=total; i++)
	{			
		var str1 = "que_no";
		var res1 = str1.concat(i); 
		//alert("" + res1.toString() + "");
		document.getElementById("" + res1.toString() + "").style.background = "white";
	}
}		
function go(id)
{ 
	var run = document.getElementById("run").value;
	var str2 = "que";
	var str3 = "page";
	var res1 = str2.concat(run); 
	var res2 = str3.concat(run);
	var res3 = str2.concat(id); 
	var res4 = str3.concat(id); 
	document.getElementById("run").value = id;
	document.getElementById("c_que").value = id;	
	document.getElementById("" + res1.toString() + "").style.display = "none";
	document.getElementById("" + res2.toString() + "").style.display = "none";
	document.getElementById("" + res3.toString() + "").style.display = "block";
	document.getElementById("" + res4.toString() + "").style.display = "block";

}
</script>
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


