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
                  <li><a href="<?php echo base_url();?>search">Search Tutor</a></li>
                  <li><a href="<?php echo base_url();?>courses">Search Courses</a></li>
                  <li><a href="<?php echo base_url();?>webinars">Webinars</a></li>
                  <?php if($this->session->userdata('user_id') > 0 ) {} 
                        elseif($this->session->userdata('teacher_id') > 0 ) {} else {?>
                  <li><a href="<?php echo base_url();?>liveclasses">Live Classes</a></li>
                  <?php }?>
                  <?php if($this->session->userdata('user_id') > 0 ){?>
                  <li><a href="<?php echo base_url();?>members/liveclass" target="_blank">Live Classes</a></li>
                  <li><a href="<?php echo base_url();?>members/myaccount">My Account</a></li>
                  <li><a href="<?php echo base_url();?>lms">Pathshala Lms</a></li>
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
                    <li><a href="<?php echo base_url(); ?>teacherdashboard/liveclass" target="_blank">Live Classes</a></li>
                      <?php } else { ?>
                    <li><a href="<?php echo base_url(); ?>teacherdashboard/plan">Live Classes</a></li>
                      <?php } ?>
                  <?php  }else{?>
                  <li><a href="<?php echo base_url();?>users/login">Student Login</a></li>
                  <?php }?>
                  <?php }?>
                  <?php if($this->session->userdata('teacher_id') > 0 ){?>
                  <li><a href="<?php echo base_url();?>teacherdashboard/myaccount">My Account</a></li>
                  <li><a href=""> Welcome <?php echo $this->session->userdata('first_name');?></a></li>
                  <?php }else{?>
                  <?php if($this->session->userdata('user_id') > 0 ){}else{?>
                  <li><a href="<?php echo base_url();?>teacher/login">Teacher Login</a></li>
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
              <?php if($this->session->userdata('user_id') > 0 ) {} 
                        elseif($this->session->userdata('teacher_id') > 0 ) {} else {?>
                  <li><a href="<?php echo base_url();?>liveclasses">Live Classes</a></li>
                  <?php }?>
              <?php if($this->session->userdata('user_id') > 0 ){?>
                <li><a href="<?php echo base_url();?>members/liveclass" target="_blank">Live Classes</a></li>
              <li><a href="<?php echo base_url();?>members/myaccount">My Account</a></li>
              <?php }else{?>
              <li><a href="<?php echo base_url();?>users/login">Student Login</a></li>
              <?php }?>
              <?php if($this->session->userdata('teacher_id') > 0 ){?>
              <li><a href="<?php echo base_url();?>teacherdashboard/myaccount">My Account</a></li>
                    <li><a href="<?php echo base_url(); ?>teacherdashboard/liveclass" target="_blank">Live Classes</a></li>
              <li><a href=""> Welcome <?php echo $this->session->userdata('first_name');?></a></li>
              <?php }else{?>
              <li><a href="<?php echo base_url();?>teacher/login">Teacher Login</a></li>
              <?php }?>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>
