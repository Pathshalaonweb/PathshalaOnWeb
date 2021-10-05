<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Document</title>
  <style>
    footer {
      background-color: #183661;
      padding: 1.5rem 2rem 1rem 1rem;
	  width: 100%;
    }

    .one_left {
      float: left;
    }

    .imglogo {
      margin-top: 15px;
      width: 300px;
      height: 80px;

    }

    .footer-socialic .a .b {
      display: inline-block;
      padding: 0px 10px 0px 10px;

    }

    .footer-socialic .a .b a {
      text-decoration: none;
      display: inline-block;
      color: inherit;

    }

    .fa {
      padding: 5px;
      font-size: 20px;
      width: 30px;
      text-align: center;
      text-decoration: none;
      border-radius: 50%;
    }

    .fa:hover {
      opacity: 0.7;
    }

    .fa-facebook {
      background: #3B5998;
      color: white;
    }

    .fa-linkedin {
      background: #007bb5;
      color: white;
    }

    .fa-twitter {
      background: #55ACEE;
      color: white;
    }

    .fa-instagram {
      background: #125688;
      color: white;
    }
    .one_right{
      float: right;
    }
    .one_right p{
      float: left;
      color: white;
    }

    footer hr {
      color: #C8C2BC;
      background-color: #C8C2BC;
      border-color: #C8C2BC;
    }

    .head-sb {
      color: red;
    }

    

    ul#lista-ho .list1 {
      display: inline-block;
      max-width: 500px;
      color: whitesmoke;
      font-size: 1.2em;
      padding: 0px 10px;
      margin: 15px;
      text-shadow: 1px 1px 3px #181818;
      text-decoration: none;
    }

    ul#lista-ho .list1 a {

      color: whitesmoke;

    }

    .three {
      max-width: 1500px;
    }

    .bycity {
      float: left;
      margin-left: 50px;
    }

    .bycate {
      float: right;
    }

    .bycity h5 , .bycate h5{
      color: #E98580;

      margin-top: -10px;
      font-size: 17px;
    }

    #vertical {
      columns: 2;
      -webkit-columns: 2;
      -moz-columns: 2;
    }

    #vertical .list1 {
      display: block;
      color: whitesmoke;
      font-size: 1.2em;
      padding: 0px 10px;
      margin: 0px 20px 18px 10px;
      text-shadow: 1px 1px 3px #181818;
      text-decoration: none;

    }

    #vertical .list1 a {
      display: block;
      color: whitesmoke;
      font-size: 1.2em;
      padding: 0px 10px;
      margin: 0px 20px 18px 10px;
      text-shadow: 1px 1px 3px #181818;
      text-decoration: none;

    }

    #vertwo li {
      display: block;
      color: whitesmoke;
      font-size: 1.2em;
      padding: 0px 10px;
      margin: 0px 10px 10px 10px;
      text-shadow: 1px 1px 3px #181818;
      text-decoration: none;
    }

    .hr-c{
      margin-top: 240px;
    }
    @media screen and (max-width:1270px) {
      
      .bycity {
        margin-top:40px;
      float:none;
      margin-left: 50px;
    }
    .hr-c{
      margin-top: 80px;
    }
    .bycate {
      margin-top:20px;
      float: none;
      margin-left: 50px;
    }
    


    }
    
    
    @media screen and (max-width:1000px) {
      .bycity{
        margin-left:0px;
        font-size: 0.8rem;
      }
      .bycate{
        margin-left:0px;
        font-size: 0.8rem;
      }
      .one_right{
        margin-top: -80px;
        
      }
      .imglogo{
        width:250px;
      }
    }
    @media screen and (max-width:700px) {
      .one_right{
        margin-top:-30px;
      }
      
    }
  </style>
</head>

<footer>
  <div class="one">
    <div class="one_left">
      <a href="<?php echo base_url(); ?>"> <img alt="" src="<?php echo theme_url(); ?>images/logo_rest.png"> </a>
    </div>

    <div class="one_right">
      <div class="footer-socialic">
        <ul class="a">
          <li class="b"><a class="facebook" href="https://www.facebook.com/pathshalaonweb" target="_blank"><i class="fa fa-facebook"></i></a></li>
          <li class="b"><a class="youtube" href="https://www.instagram.com/pathshalaonline/" target="_blank"><i class="fa fa-instagram"></i></a></li>
          <li class="b"><a class="twitter" href="https://twitter.com/pathshalaonweb" target="_blank"><i class="fa fa-twitter"></i></a></li>
          <li class="b"><a class="linkedin" href="https://www.linkedin.com/company/pathshalaonweb" target="_blank"><i class="fa fa-linkedin"></i></a></li>
        </ul>
      </div>
     <!-- <p><b>Whatsapp </b>: +91-7895187971 (Mon-Sun : 9am - 11pm IST)</p><br>
      <p style="margin-top:-9px;"><b>Mail</b>: info@pathshala.co</p> -->
    </div>
  </div>
  <hr class="hr-a" style="width:100%;margin-top:100px;" , size="1">
  <div class="two">
    <h4 class="head-sb"> QUICK LINKS </h4>
    <ul id="lista-ho">
      <li class="list1"><a href="<?php echo base_url(); ?>search">Search Tutors</a></li>
      <li class="list1"><a href="<?php echo base_url(); ?>courses">Courses</a></li>
      <li class="list1"><a href="<?php echo base_url(); ?>acadex">AcadeX</a></li>
      <li class="list1"><a href="<?php echo base_url(); ?>searchliveclasses">Master Classes</a></li>
      <li class="list1"><a href="<?php echo base_url(); ?>affiliate/register/teacher">Become a Tutor</a></li>
      <li class="list1"><a href="<?php echo base_url(); ?>affiliate/register/student">Register as a Student</a></li>
    </ul>
    <h4 class="head-sb"> OTHER LINKS </h4>
    <ul id="lista-ho">
      <li class="list1">Why Pathshala</li>
      <li class="list1">Child Safety</li>
      <li class="list1"><a href="<?php echo base_url() ?>About/aboutus.html">About Us</a></li>
      <li class="list1"><a href="<?php echo base_url(); ?>pages/privecy-policy">Privacy Policy</a></li>
      <li class="list1"><a href="<?php echo base_url() ?>blog">Pathshala Blog</a></li>
      <li class="list1">Benefits</li>
      <li class="list1"><a href="<?php echo base_url() ?>contactus">Contact Us</a></li>
      <li class="list1"><a href="<?php echo base_url(); ?>pages/terms-and-conditions">Terms & Conditions</a></li>
      <li class="list1"><a href="<?php echo base_url(); ?>pages/refund-and-cancellation-policy" target="_blank">Refund & Cancellation</a></li>
    </ul>
  </div>
  <hr class="hr-b" style="width:100%" , size="3">
  <div class="three">
    <h4 class="head-sb"> SEARCH TUTORS </h4>
    <div class="bycity">
      <h5><i>Search by State</i></h5>
      <ul id="vertical">
        <li class="list1"><a href="<?php echo base_url(); ?>search?state=10&search=home">New Delhi</a></li>
        <li class="list1"><a href="<?php echo base_url(); ?>search?state=41&search=home">West Bengal</a></li>
        <li class="list1"><a href="<?php echo base_url(); ?>search?state=38&search=home">Uttar Pradesh</a></li>
        <li class="list1"><a href="<?php echo base_url(); ?>search?state=17&search=home">Karnataka</a></li>
        <li class="list1"><a href="<?php echo base_url(); ?>search?state=33&search=home">Rajasthan</a></li>
        <li class="list1"><a href="<?php echo base_url(); ?>search?state=22&search=home">Maharashtra</a></li>
        <li class="list1"><a href="<?php echo base_url(); ?>search?state=36&search=home">Telangana</a></li>
        <li class="list1"><a href="<?php echo base_url(); ?>search?state=32&search=home">Punjab</a></li>
      </ul>
    </div>
    <div class="bycate">
      <h5><i>Search by Category</i></h5>
      <ul id="vertical">
        <li class="list1"><a href="<?php echo base_url(); ?>search?category=30&search=home">School Tution K-12</a></li>
        <li class="list1"><a href="<?php echo base_url(); ?>search?category=170&search=home">College / University</a></li>
        <li class="list1"><a href="<?php echo base_url(); ?>search?category=31&search=home">Competitive Coaching</a></li>
        <li class="list1"><a href="<?php echo base_url(); ?>search?category=7&search=home">Hobbies</a></li>
        <li class="list1"><a href="<?php echo base_url(); ?>search?category=514&search=home">Professional Learning</a></li>
        <li class="list1"><a href="<?php echo base_url(); ?>search?category=407&search=home">Language</a></li>
        <li class="list1"><a href="<?php echo base_url(); ?>search?category=12&search=home">Sports</a></li>
        <li class="list1"><a href="<?php echo base_url(); ?>search?category=516&search=home">Vocational Learning</a></li>
      </ul>
    </div>
  </div>
  <hr class="hr-c" style="width:100%;" , size="3">
  <h4 class="head-sb">About Us - Pathshala </h4>
  <div class="four">
    <ul id="vertwo">
      <li> India's Education Market Place to Search, Manage, Advertise & Sell, also connecting students from everywhere of every course to the teachers around the country on just a click & catering other educational needs. Students of classes K-12 can register and look for trusted tuition centres, verified home tutors, highly rated online tutors, can find answers to NCERT questions or other questions, hand-written notes on various topics and subjects, and so on. It caters the students to connect with the teachers or professionals involved into imparting their expertise. This platform bridges the gap between the two and allow exploring the new ideas and eventually learn by the subject experts.</li>
  </div>
  <div class="five">
  <ul id="vertwo">
    <li> Copyright © <?php echo date('Y'); ?> <a href="<?php echo base_url(); ?>">Pathshala &nbsp;</a>(Brainchild Smart Ventures Private Limited). All Right Reserved. </li>
  </ul>
  </div>


</footer>


</html>
