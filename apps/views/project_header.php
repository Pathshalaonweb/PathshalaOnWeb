<header class="header-area">
  <?php if ($this->router->fetch_class()=='home') {?>
  <div class="header-top bg-img">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-7 col-12 col-sm-8">
          <div class="header-contact">
            <ul>
              <li><i class="fa fa-envelope-o"></i><a href="#">info@pathshala.co</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6 col-md-5 col-12 col-sm-4">
          <div class="login-register">
            <div class="description-social">
              <ul>
                <li><a class="facebook" href="https://www.facebook.com/pathshalaonweb" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a class="instagram" href="https://www.instagram.com/pathshalaonline/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <li><a class="twitter" href="https://twitter.com/pathshalaonweb" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a class="google" href="https://www.linkedin.com/company/pathshalaonweb" target="_blank"><i class="fa fa-google-plus"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php }?>
  <div class="header-bottom sticky-bar clearfix">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-md-6 col-4">
          <?php if ($this->router->fetch_class()=='home') {?>
          <div class="logo"> <a href="<?php echo base_url();?>"> <img alt="" src="<?php echo theme_url();?>images/logo_new.png"> </div>
          <?php } else {?>
          <div class="logo"> <a href="<?php echo base_url();?>"> <img alt="" src="<?php echo theme_url();?>images/logo_path.png"> </a> </div>
          <?php } ?>
        </div>
        <div class="col-lg-10 col-md-6 col-8">
          <div class="menu-cart-wrap">
            <div class="main-menu">
              <nav>
                <ul>
                  <li><a href="<?php echo base_url()?>">HOME</a></li>
                  <div class="dropdown">
                  <li>
                  <a href="#" style="color:#ffffff;">SEARCH</a>
                  </li>
                  <div class="dropdown-content" style="z-index:10;">
                  <a href="<?php echo base_url();?>search">Tutor</a>
                  <a href="<?php echo base_url();?>courses">Courses</a>
                  <a href="<?php echo base_url();?>liveclasses">Live Tutor</a>
                  </div>
                  </div>
                  <div class="dropdown">
                  <li>
                  <a href="#" style="color:#ffffff;">PATHSHALA LIVE</a>
                  </li>
                  <div class="dropdown-content" style="z-index:10;">
                  <a href="<?php echo base_url();?>acadex">AcadeX</a>
                  <a href="<?php echo base_url();?>searchliveclasses">Master Classes</a>
                  <a href="<?php echo base_url();?>webinars">Webinars</a>
                  <a href="<?php echo base_url();?>virtualcamp">Virtual Camp</a>
                  </div>
                  </div>
                  <div class="dropdown">
                  <li>
                  <a href="#" style="color:#ffffff;">ONLINE COMPETITION</a>
                  </li>
                  <div class="dropdown-content" style="z-index:10;">
                  <a href="<?php echo base_url();?>competition/register/parent">Parent's Competition</a>
                  <a href="<?php echo base_url();?>competition/register/student">Student's Competition</a>
                  <a href="<?php echo base_url();?>competition/register/teacher">Teacher's Competition</a>
                  </div>
                  </div>
                  <?php if($this->session->userdata('user_id') > 0 ) {} 
                        elseif($this->session->userdata('teacher_id') > 0 ) {} else {?>
                  <!-- <li><a href="<?php //echo base_url();?>liveclasses">Live Classes</a></li> -->
                  <?php }?>
                  <?php if($this->session->userdata('user_id') > 0 ){?>
                  <!-- <li><a href="<?php //echo base_url();?>liveclasses">Live Classes</a></li> -->
                  <li><a href="<?php echo base_url();?>members/myaccount">My Account</a></li>
                  <li>
                    <?php 
                    $idd = $this->session->userdata('user_id');
                    $dbe = $this->load->database('default', TRUE);
                    $sq = "SELECT credit_point  FROM `wl_customers` WHERE customers_id='".$idd."'";
                    $qu=$dbe->query($sq);
                    $value= $qu->result_array();
                    $credit_point = $value[0]['credit_point'];
                    ?>
                  <div class="dropdown">
                        <a data-toggle="dropdown"><i class="fa fa-user-circle"  style="font-size:28px;"></i></a>
                        <div class="dropdown-menu">
                          <p class="dropdown-item" style="font-size: 16px;">Hola, <?php echo $this->session->userdata('first_name');?></p>
                          <?php if($credit_point =='0' || $credit_point == ''){ ?>
                          <p class="dropdown-item" style="font-size:11px; color:red;">Credit Exhausted. Buy Now. <?php //echo $credit_point; ?></p>
                          <?php } else{ ?>
                          <p class="dropdown-item" style="font-size:11px;">Remaining Credits: <?php echo $credit_point; ?></p>
                          <?php } ?>
                          <div class="dropdown-divider"></div>
                          <p class="dropdown-item" onclick="window.location.href='<?php echo base_url(); ?>members/edit_account'">Edit Account</p>
                          <p class="dropdown-item" onclick="window.location.href='<?php echo base_url(); ?>members/liveclass'">Live Classes</p>
                          <p class="dropdown-item" onclick="window.location.href='<?php //echo base_url(); ?>#'">Webinars/Workshops</p>
                          <p class="dropdown-item" onclick="window.location.href='<?php echo base_url(); ?>lms'">Learning Management System (LMS)</p>
                          <p class="dropdown-item" onclick="window.location.href='<?php echo base_url(); ?>members/credit'">Buy Subscription</p>
                          <p class="dropdown-item" onclick="window.location.href='<?php echo base_url(); ?>members/change_password'">Change Password</p>
                          
                          <div class="dropdown-divider"></div>
                          <p class="dropdown-item" onclick="window.location.href='<?php echo base_url(); ?>users/logout'">Logout</p>
                        </div>
                      </div>
                  </li>
                  <?php }else{?>
                  <?php if($this->session->userdata('teacher_id') > 0 ){?>
                  <?php $idd = $this->session->userdata('teacher_id');
                      $dbe = $this->load->database('default', TRUE);
                      $sq = "SELECT liveplan FROM `wl_teacher` WHERE teacher_id='".$idd."'";
                      $qu=$dbe->query($sq);
                      $value= $qu->result_array();
                      $liveplan = $value[0]['liveplan'];
                      if($liveplan == 1)
                      {
                  ?>
                    <!-- <li><a href="<?php //echo base_url(); ?>liveclasses">Live Classes</a></li> -->
                      <?php } else { ?>
                    <!-- <li><a href="<?php //echo base_url(); ?>liveclasses">Live Classes</a></li> -->
                      <?php } ?>
                  <?php  }else{?>
                  <div class="dropdown">
                  <li>
                  <a href="#" style="color:#ffffff;">LOGIN</a>
                  </li>
                  <div class="dropdown-content" style="z-index:10;">
                  <a href="<?php echo base_url();?>users/login">Student Login</a>
                  <?php }?>
                  <?php }?>
                  <?php if($this->session->userdata('teacher_id') > 0 ){?>
                  <li><a href="<?php echo base_url();?>teacherdashboard/myaccount">My Account</a></li>
                  <li>
                  <?php 
                    $idd = $this->session->userdata('teacher_id');
                    $dbe = $this->load->database('default', TRUE);
                    $sq = "SELECT current_credit, plan_expire  FROM `wl_teacher` WHERE teacher_id='".$idd."'";
                    $qu=$dbe->query($sq);
                    $value= $qu->result_array();
                    $credit_point = $value[0]['current_credit'];
                    $planExpire = $value[0]['plan_expire'];
                    $date = new DateTime('now');
                    $currentDate = $date->format('Y-m-d h:i:s');
                    ?>
                  <div class="dropdown">
                        <a data-toggle="dropdown"><i class="fa fa-user-circle"  style="font-size:28px;"></i></a>
                        <div class="dropdown-menu">
                          <p class="dropdown-item" style="font-size: 16px;">Hola, <?php echo $this->session->userdata('first_name');?></p>
                          <?php if($credit_point =='0' || $credit_point == '' || ($planExpire<$currentDate)){ ?>
                          <p class="dropdown-item" style="font-size:11px; color:red;">Credit Exhausted. Buy Now. <?php //echo $credit_point; ?></p>
                          <?php } else{ ?>
                          <p class="dropdown-item" style="font-size:11px;">Remaining Credits: <?php echo $credit_point; ?><br>Plan Expires: <?php echo $planExpire; ?></p>
                          <?php } ?>
                          <div class="dropdown-divider"></div>
                          <p class="dropdown-item" onclick="window.location.href='<?php echo base_url(); ?>teacherdashboard/edit_account'">Edit Account</p>
                          <p class="dropdown-item" onclick="window.location.href='<?php echo base_url(); ?>teacherdashboard/liveclass'">Live Classes</p>
                          <p class="dropdown-item" onclick="window.location.href='<?php //echo base_url(); ?>#'">Webinars/Workshops</p>
                          <p class="dropdown-item" onclick="window.location.href='<?php echo base_url(); ?>teacherdashboard/courses'">Courses</p>
                          <p class="dropdown-item" onclick="window.location.href='<?php echo base_url(); ?>teacherdashboard/student'">Search Student Online</p>
                          <p class="dropdown-item" onclick="window.location.href='<?php echo base_url(); ?>teacherdashboard/profile'">List Yourself</p>
                          <p class="dropdown-item" onclick="window.location.href='<?php echo base_url(); ?>teacherdashboard/plan'">Buy Subscription</p>
                          <p class="dropdown-item" onclick="window.location.href='<?php echo base_url(); ?>teacherdashboard/change_password'">Change Password</p>
                          
                          <div class="dropdown-divider"></div>
                          <p class="dropdown-item" onclick="window.location.href='<?php echo base_url(); ?>teacher/logout'">Logout</p>
                        </div>
                      </div>
                  
                  </li>
                  <?php }else{?>
                  <?php if($this->session->userdata('user_id') > 0 ){}else{?>
                  <a href="<?php echo base_url();?>teacher/login">Teacher Login</a>
                  </div>
                  </div>
                  <?php }?>
                  <?php }?>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <div class="mobile-menu-area">
        <div class="mobile-menu">
          <nav id="mobile-menu-active">
            <ul class="menu-overflow">
              <li><a href="<?php echo base_url()?>">HOME</a></li>
              <li><a href="<?php echo base_url();?>search">Search Tutor</a></li>
              <li><a href="<?php echo base_url();?>courses">Search Courses</a></li>
              <li><a href="<?php echo base_url();?>webinars">Webinars</a></li>
              <li><a href="<?php echo base_url();?>virtualcamp">Virtual Camp</a></li>
              <?php if($this->session->userdata('user_id') > 0 ) {} 
                        elseif($this->session->userdata('teacher_id') > 0 ) {} else {?>
                  <li><a href="<?php echo base_url();?>liveclasses">Live Classes</a></li>
                  <?php }?>
              <?php if($this->session->userdata('user_id') > 0 ){?>
                <li><a href="<?php echo base_url();?>liveclasses">Live Classes</a></li>
              <li><a href="<?php echo base_url();?>members/myaccount">My Account</a></li>
              <?php }elseif(!($this->session->userdata('teacher_id') > 0) ){?>
              <li><a href="<?php echo base_url();?>users/login">Student Login</a></li>
              <?php } else{?>
                <li><a href="<?php echo base_url();?>teacher/logout">Logout</a></li>
              <?php } ?>
              <?php if($this->session->userdata('teacher_id') > 0 ){?>
              <li><a href="<?php echo base_url();?>teacherdashboard/myaccount">My Account</a></li>
                    <li><a href="<?php echo base_url(); ?>liveclasses">Live Classes</a></li>
              <li><a href=""> Welcome <?php echo $this->session->userdata('first_name');?></a></li>
              <?php }elseif(!($this->session->userdata('user_id') > 0)){?>
                <li><a href="<?php echo base_url();?>teacher/login">Teacher Login</a></li>
              <?php } else{?>
                <li><a href="<?php echo base_url();?>users/logout">Logout</a></li>
              <?php }?>

            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>
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
