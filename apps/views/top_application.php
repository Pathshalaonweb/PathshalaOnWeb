<!DOCTYPE html>
<html>

<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '139740021453826');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=139740021453826&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-151377731-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-151377731-1');
</script>
<script data-ad-client="ca-pub-9034141091044478" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <?php 
$meta_rec = getMeta();
if ( array_key_exists('dynamic_meta',$meta_rec) && @is_array($meta_array) && !empty($meta_array) ) {
	if(  array_key_exists('meta_title',$meta_array) && $meta_array['meta_title']!='')
	{
		echo '<title>'.$meta_array['meta_title'].'</title>';
	}
	if( array_key_exists('meta_description',$meta_array) && $meta_array['meta_description']!='')
	{
		echo '<meta name="description" content="'.$meta_array['meta_description'].'" />';
	}
	if( array_key_exists('meta_keyword',$meta_array) && $meta_array['meta_keyword']!='')
	{
	   echo '<meta  name="keywords" content="'.$meta_array['meta_keyword'].'" />';
	}
	} else {	
?>
<title><?php echo $meta_rec['meta_title'];?></title>
<meta name="description" content="<?php echo $meta_rec['meta_description'];?>" />
<meta  name="keywords" content="<?php echo $meta_rec['meta_keyword'];?>" />
<?php } ?>
  
  
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@400;500&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700;800;900&family=Quicksand:wght@300;400;500;600;700&display=swap');

    body {
      margin: 0;
    }

    .topnav {
      overflow: hidden;
      background-color: #fff;
      padding: 16px 15px 26px 15px;
      width: 100%;
    }

    .topnav img {
      width: 300px;
      height: 80px;
      float: left;
      margin-right: 100px;
    }

    .topnav {
      float: left;
      font-family: 'Raleway', sans-serif;
      font-weight: bold;
    }

    .topnav a {

      float: left;
      display: block;
      color: #3c393d;
      text-align: center;

      text-decoration: none;
      font-size: 20px;
    }

    .topnav .icon {
      display: none;
    }

    .dropdown1 {
      float: left;
      overflow: hidden;
      margin-left: 25px;
    }

    .dropbtn {
      font-family: 'Raleway', sans-serif;
    }

    .dropdown1 .dropbtn {
      font-size: 20px;
      border: none;
      outline: none;
      color: #3c393d;
      padding: 14px 16px;
      background-color: inherit;
      font-family: inherit;
      margin: 0;
      font-weight: bold;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      min-width: 120px;
      border-bottom: 3px solid #34495e;
      background-color: #fff;
      z-index: 1;

    }

    .dropdown-content a {
      float: none;
      color: #0F3460;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;

    }
    .menu-right{
      float: right;
    }


    .topnav a:hover,
    .dropdown1:hover .dropbtn {
      color: #E98580;
    }

    .dropdown-content a:hover {
      background-color: #ddd;
      color: black;
    }

    .dropdown1:hover .dropdown-content {
      display: block;
    }

    @media screen and (max-width: 700px) {
      .topnav .dropdown1 .dropbtn {
        display: none;
        font-weight: bold;
      }
      .menu-right{
      float: none;
    }
     
      .topnav a.icon {
        float: right;
        display: block;
        margin:0px 0px 0px 0px;
      }

      .topnav img {
        width: 100px;
        height: 30px;
        margin-right:20px;
        float:left;
        
      }
    }

    #signin {
      border-radius: 20px;
      color: white;
      background: rgb(250, 0, 0);
      font-weight: bold;
      letter-spacing: 2px;
      padding: 10px 20px 10px 20px;
    }

    @media screen and (max-width: 1000px){
      .topnav.responsive {
        position: relative;
      }

      .topnav.responsive .icon {
        position: absolute;
       
      }
      .menu-right{
      float: none;
    }
      .topnav.responsive a {
        float: none;
        display: block;
        
        font-size: 16px;
      }

      .topnav.responsive .dropdown1 {
        float: none;
        
      }
      .img{
        margin-right:10px;
      }
      .topnav.responsive .dropdown-content {
        position: relative;
        font-weight: bold;
        min-width: 0.1px;
        border-right: 3px solid #B2B1B9;
      }

      .topnav.responsive .dropdown1 .dropbtn {
        font-size: 16px;
        display: block;
        width: 100%;
        text-align: right;
        min-width: 10px;
      }
    }
  </style>
</head>

<body>
  <header>

    <div class="topnav" id="myTopnav">
      <a href="<?php echo base_url(); ?>"> <img alt="" src="<?php echo theme_url(); ?>images/logo_home.png"></a>
      <div class="menu-right">
      <div class="dropdown1">
      <a href="<?php echo base_url(); ?>" class="active"> <button class="dropbtn">Home</button></a>
        
      </div>
      <div class="dropdown1">
        <button class="dropbtn">Browse
        </button>
        <div class="dropdown-content">
          <a href="<?php echo base_url(); ?>search">Tutor</a>
          <a href="<?php echo base_url(); ?>courses">Courses</a>
          <!--<a href="<?php echo base_url(); ?>liveclasses">Live Tutor</a>-->
        </div>
      </div>
      <div class="dropdown1">
        <button class="dropbtn">Pathshala Live
        </button>
        <div class="dropdown-content">
          <a href="<?php echo base_url(); ?>acadex">AcadeX</a>
         <!-- <a href="<?php echo base_url(); ?>searchliveclasses">Master Classes</a>
          <a href="<?php echo base_url(); ?>webinars">Webinars</a>
          <a href="<?php echo base_url(); ?>virtualcamp">Virtual Camp</a>-->
        </div>
      </div>
      <div class="dropdown1">
        <button class="dropbtn">Our Partners
        </button>
        <div class="dropdown-content">
		<a href="#">Coming Soon</a>
          <!--<a href="<?php echo base_url(); ?>ourpartner/foreignlanguage">Foreign Language Olympiad</a>-->
        </div>
      </div>


      <?php if ($this->session->userdata('user_id') > 0) {
      } elseif ($this->session->userdata('teacher_id') > 0) {
      } else { ?>
        <!-- <li><a href="<?php //echo base_url();
                          ?>liveclasses">Live Classes</a></li> -->
      <?php } ?>
      <?php if ($this->session->userdata('user_id') > 0) { ?>
        <!-- <li><a href="<?php //echo base_url();
                          ?>liveclasses">Live Classes</a></li> -->
        <div class="dropdown1">
          <button class="dropbtn" id="signin">My Account</button>
          <a>
            <?php
            $idd = $this->session->userdata('user_id');
            $dbe = $this->load->database('default', TRUE);
            $sq = "SELECT credit_point  FROM `wl_customers` WHERE customers_id='" . $idd . "'";
            $qu = $dbe->query($sq);
            $value = $qu->result_array();
            $credit_point = $value[0]['credit_point'];
            ?>

            <div class="dropdown-content">

              <p style="font-size: 16px;">Hola, <?php echo $this->session->userdata('first_name'); ?></p>
              <?php if ($credit_point == '0' || $credit_point == '') { ?>
                <p style="font-size:11px; color:red;">Credit Exhausted. Buy Now. <?php //echo $credit_point; 
                                                                                  ?></p>
              <?php } else { ?>
                <p style="font-size:11px;">Remaining Credits: <?php echo $credit_point; ?></p>
              <?php } ?>
              <div class="dropdown-divider"></div>
              <a onclick="window.location.href='<?php echo base_url(); ?>members/myaccount'">My Account</a>
              <a onclick="window.location.href='<?php echo base_url(); ?>members/edit_account'">Edit Account</a>
              <a onclick="window.location.href='<?php echo base_url(); ?>members/liveclass'">Live Classes</a>
              <a onclick="window.location.href='<?php echo base_url(); ?>lms'">Learning Management System (LMS)</a>
              <a onclick="window.location.href='<?php echo base_url(); ?>members/credit'">Buy Subscription</a>
              <a onclick="window.location.href='<?php echo base_url(); ?>members/change_password'">Change Password</a>

              <div class="dropdown-divider"></div>

              <a onclick="window.location.href='<?php echo base_url(); ?>users/logout'" style="color:#000000;">LOGOUT</a>
          </a>
        </div>
    </div>

  <?php } else { ?>
    <?php if ($this->session->userdata('teacher_id') > 0) { ?>
      <?php $idd = $this->session->userdata('teacher_id');
          $dbe = $this->load->database('default', TRUE);
          $sq = "SELECT liveplan FROM `wl_teacher` WHERE teacher_id='" . $idd . "'";
          $qu = $dbe->query($sq);
          $value = $qu->result_array();
          $liveplan = $value[0]['liveplan'];
          if ($liveplan == 1) {
      ?>
        <!-- <li><a href="<?php //echo base_url(); 
                          ?>liveclasses">Live Classes</a></li> -->
      <?php } else { ?>
        <!-- <li><a href="<?php //echo base_url(); 
                          ?>liveclasses">Live Classes</a></li> -->
      <?php } ?>
    <?php  } else { ?>
      <div class="dropdown1">

        <button class="dropbtn" id="signin">Sign In
        </button>

        <div class="dropdown-content" style="z-index:10;">
          <a href="<?php echo base_url(); ?>account/welcome/student">Student Login</a>
        <?php } ?>
      <?php } ?>
      <?php if ($this->session->userdata('teacher_id') > 0) { ?>
        <div class="dropdown1">
          <button class="dropbtn" id="signin">My Account</button>
          <a>
            <?php
            $idd = $this->session->userdata('teacher_id');
            $dbe = $this->load->database('default', TRUE);
            $sq = "SELECT current_credit, plan_expire  FROM `wl_teacher` WHERE teacher_id='" . $idd . "'";
            $qu = $dbe->query($sq);
            $value = $qu->result_array();
            $credit_point = $value[0]['current_credit'];
            $planExpire = $value[0]['plan_expire'];
            $date = new DateTime('now');
            $currentDate = $date->format('Y-m-d h:i:s');
            ?>


            <div class="dropdown-content">

              <p style="font-size: 16px;">Hola, <?php echo $this->session->userdata('first_name'); ?></p>
              <?php if ($credit_point == '0' || $credit_point == '' || ($planExpire < $currentDate)) { ?>
                <p style="font-size:11px; color:red;">Credit Exhausted. Buy Now. <?php //echo $credit_point; 
                                                                                  ?></p>
              <?php } else { ?>
                <p style="font-size:11px;">Remaining Credits: <?php echo $credit_point; ?><br>Plan Expires: <?php echo $planExpire; ?></p>
              <?php } ?>
              <div class="dropdown-divider"></div>
              <a onclick="window.location.href='<?php echo base_url(); ?>teacherdashboard/myaccount'">My Account</a>
              <a onclick="window.location.href='<?php echo base_url(); ?>teacherdashboard/edit_account'">Edit Account</a>
              <a onclick="window.location.href='<?php echo base_url(); ?>teacherdashboard/liveclass'">Live Classes</a>
              <a onclick="window.location.href='<?php echo base_url(); ?>teacherdashboard/courses'">Courses</a>
              <a onclick="window.location.href='<?php echo base_url(); ?>teacherdashboard/student'">Search Student Online</a>
              <a onclick="window.location.href='<?php echo base_url(); ?>teacherdashboard/profile'">List Yourself</a>
              <a onclick="window.location.href='<?php echo base_url(); ?>teacherdashboard/plan'">Buy Subscription</a>
              <a onclick="window.location.href='<?php echo base_url(); ?>teacherdashboard/change_password'">Change Password</a>

              <div class="dropdown-divider"></div>

              <a onclick="window.location.href='<?php echo base_url(); ?>teacher/logout'" style="color:#000000;">Logout</a>
          </a>
        </div>
        </div>


      <?php } else { ?>
        <?php if ($this->session->userdata('user_id') > 0) {
        } else { ?>
          <a href="<?php echo base_url(); ?>account/welcome/teacher">Teacher Login</a>
      </div>
      </div>
    <?php } ?>
  <?php } ?>

  <a href="javascript:void(0);" style="font-size:15px;color:black;" class="icon" onclick="myFunction()">&#9776;</a>
  </div>
        </div>
  </header>
</body>

</html>
<script>
  function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }
</script>
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