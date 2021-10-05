<?php $this->load->view('top_application'); ?>
<div class="login-register-area pt-130 pb-130">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 col-md-12 ml-auto mr-auto">
        <div class="login-register-wrapper">
          <div class="login-register-tab-list nav"> <a class="active" data-toggle="tab" href="#lg2">
            <h4>Parent Contest Registration</h4>
            </a> </div>
          <div class="tab-content">
            <div id="lg2" class="tab-pane active">
              <div class="login-form-container">
                <div class="login-register-form"> 
				<?php echo validation_message();?> 
				<?php echo error_message(); ?> 
        <?php //echo form_open('users/register'); ?>
        <form action="<?php echo base_url(); ?>competition/parentRegister" method="post" accept-charset="utf-8" onsubmit="return validate()">
                  <input type="text" name="first_name" placeholder="Name" id="name" value="<?php echo set_value('first_name'); ?>">
                  <?php echo form_error('first_name');?>
                 <input type="number" name="phone_number" placeholder="Phone" id="phone" value="<?php echo set_value('phone_number'); ?>" min="5000000000" max="9999999999" step=1>
                  <?php echo form_error('phone_number');?>
                  <input type="email" name="user_name" placeholder="Email" id="email" value="<?php echo set_value('user_name');?>">
                  <input type="password" name="password" id="password" placeholder="Password(Set Your Online Competition Password)" value="<?php echo set_value('password');?>">
                  <h4 style="font-family: 'Roboto', sans-serif; color: #1b68b5;">Competitions</h4>
                  <select id="category" name="category[]" multiple required>
                  <?php 
                  $dbe = $this->load->database('default', TRUE);
                  $sql="SELECT * FROM `wl_competition` WHERE user_category='1' ORDER BY id";
                  $query=$dbe->query($sql);
                  if($query->num_rows()>0){
                  foreach($query->result_array() as $val):
                  ?>                  
                   <option value="<?php echo $val['id']; ?>"><?php echo $val['competition_name']; ?></option>
                  <?php  endforeach;  } ?>
                  </select>
                  
                  <!-- <select id="classes" name="classes[]" multiple>
                  <option value="" selected disabled>Select Class</option>
                </select>    -->
                <br>     
                <!-- <div class="requried" id="classeserror" style="display:none; color:red;">Please Select an Option.</div> -->   
                  <!-- <div class="required" style="color:#1b68b5;">Please refresh the page for a new category.</div> -->
                  <br>
                  <div class="button-box">
                    <button class="default-btn" type="submit"><span>Register</span></button>
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

<footer class="footer-area">
  <div class="footer-top bg-img default-overlay pt-20 pb-20" style="background-image:url(<?php echo base_url(); ?>/assets/designer/themes/default/img/bg/bg-4.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="footer-widget mb-40">
            <div class="footer-title">
              <h4>ABOUT US</h4>
            </div>
            <div class="footer-about">
              <p>Pathshala is India's Latest Upcoming Online Marketplace connecting students from everywhere of every course to the teachers around the country on just a click & catering other educational needs.</p>
              <div class="f-contact-info">
                <div class="single-f-contact-info"> <i class="fa fa-home"></i> <span>Delhi</span> </div>
                <div class="single-f-contact-info"> <i class="fa fa-envelope-o"></i> <span><a href="#">info@pathshala.co</a></span> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="footer-widget mb-40">
            <div class="footer-title">
              <h4>QUICK LINK</h4>
            </div>
            <div class="footer-list">
              <ul>
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li><a href="<?php echo base_url(); ?>/About/aboutus.html">About</a></li>
                <li><a href="<?php echo base_url(); ?>/blog">Blog</a></li>
                <li><a href="<?php echo base_url(); ?>/contactus">Contact</a></li>
                <li><a href="<?php echo base_url(); ?>/users/register">Register as Student</a></li>
                <li><a href="<?php echo base_url(); ?>/teacher/register">Register as Teacher</a></li>
                <li><a href="<?php echo base_url(); ?>/teacher/login">Login</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom pt-15 pb-15">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-4 col-md-12">
          <div class="copyright" style=" width: max-content;">
            <p> Copyright © 2020 <a href="<?php echo base_url(); ?>/">Pathshala &nbsp;</a>(Brainchild Ventures LLP). All Right Reserved. </p>
          </div>
        </div>
        <div class="col-lg-8 col-md-12">
          <div class="footer-menu-social">
            <div class="footer-menu">
              <ul>
                <li><a href="<?php echo base_url(); ?>/pages/privecy-policy">Privacy Policy</a></li>
                <li><a href="<?php echo base_url(); ?>/pages/terms-and-conditions">Terms & Conditions of Use</a></li>
              </ul>
            </div>
            <div class="footer-social">
              <ul>
                <li><a class="facebook" href="https://www.facebook.com/pathshalaonweb" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a class="youtube" href="https://www.instagram.com/pathshalaonline/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <li><a class="twitter" href="https://twitter.com/pathshalaonweb" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a class="google-plus" href="https://www.linkedin.com/company/pathshalaonweb" target="_blank"><i class="fa fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- JS============================================ --> 
<!-- jQuery JS --> 
<script src="<?php echo base_url(); ?>/assets/designer/themes/default/js/vendor/jquery-1.12.4.min.js"></script> 
<!-- Popper JS --> 
<script src="<?php echo base_url(); ?>/assets/designer/themes/default/js/popper.min.js"></script> 
<!-- Bootstrap JS --> 
<script src="<?php echo base_url(); ?>/assets/designer/themes/default/js/bootstrap.min.js"></script> 
<!-- Plugins JS --> 
<script src="<?php echo base_url(); ?>/assets/designer/themes/default/js/plugins.js"></script> 
<script src="<?php echo base_url(); ?>/assets/designer/themes/default/js/main.js"></script>
<script type="text/javascript" src="https://pathshala007.s3.ap-south-1.amazonaws.com/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="https://pathshala007.s3.ap-south-1.amazonaws.com/bootstrap-multiselect.css" type="text/css"/>
<script>
  function validate()
  {
    var name = document.getElementById("name").value;
    var password = document.getElementById("password").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    // console.log(name+" "+password+" "+" "+email+" "+phone);
    
    if(name.trim() == "" || name.length <= 5)
    {
      alert('Please enter Name');
      document.getElementById("name").focus();
      return false;
    }
    if(password.length < 6 || password == "")
    {
      alert('Please enter Password');
      document.getElementById("password").focus();
      return false;
    }
    if(email == "")
    {
      alert('Please enter Email');
      document.getElementById("email").focus();
      return false;
    }
    if(phone.length != 10 || isNaN(phone) || phone.trim() == "")
    {
      alert('Please enter Valid Phone Number');
      document.getElementById("phone").focus();
      return false;
    } 
    var x = document.getElementById("classes").value;
    if(x=='')
    {
      //alert('Select class ');
      document.getElementById("classeserror").style.display = "block";
      
      return false;
    }   
  }
  </script>
<script type="text/javascript">
$(document).ready(function() {
        // Transition effect for navbar 
        $(window).scroll(function() {
          // checks if window is scrolled more than 500px, adds/removes solid class
          if($(this).scrollTop() > 500) { 
              $('.navbar').addClass('solid');
          } else {
              $('.navbar').removeClass('solid');
          }
        });
});
</script>
<!-- <script type="text/javascript">
$(document).ready(function(){
    $('#category').on('change',function(){
    var categoryID = $(this).val();
    var width = document.getElementById("category").offsetWidth+'px';
    $("#subject").val("");
	$("#wait").css("display", "block");
	//searchFilter();
    if(categoryID){
       $.ajax({
          type:'POST',
            url:'<?php echo base_url();?>liveclasses/getSubcat',
              data:'category_id='+categoryID,
               success:function(html){
                   $('#classes').html(html);
                    $('#classes').multiselect(
                      {
                        includeSelectAllOption: true,
                        maxHeight: 400,
                        buttonWidth: width,
                        dropUp: true,
                        inheritClass: true
                      });
    					$("#wait").css("display", "none");
               }
            }); 
        }else{
          $('#city').html('<option value="">Select Category</option>'); 
        }
    });
 });
</script> -->
<script>
var width = document.getElementById("phone").offsetWidth+'px';
$('#category').multiselect(
                      {
                        includeSelectAllOption: true,
                        maxHeight: 400,
                        buttonWidth: width,
                        dropDown: true,
                        inheritClass: true
                      });
</script>
</body></html>

<!doctype html>
<html lang="en">
    <head>
    <title>Smooth software company landing page</title>

    <meta charset="utf-8">
    <meta name="keywords" content="Landing page, software, (SaaS) services, Bootstrap 4 template, plugins, app, SEO friendly, business, Sass, Gulp">
    <meta name="description" content="Smooth is a HTML5 Landing Page Build using Gulp, SCSS, and Bootstrap4. It was designed to promote your App, services or business projects.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="99webpage">
    
    <link rel="icon" type="image/png" href="favicon/smooth-favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="favicon/smooth-favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="favicon/smooth-favicon-144x144.png" sizes="144x144">
    <link rel="icon" type="image/png" href="favicon/smooth-favicon-196x196.png" sizes="196x196">

    <link rel="apple-touch-icon" href="favicon/smooth-favicon-196x196.png">

    <!-- Template stylesheet -->
    <link rel="stylesheet" href="assets/css/style.min.css">
    </head>
    <body>

    <!-- Start Header -->
    <header class="header js-header-scroll">
        <nav hidden>
            <div class="nav-header">
                <a href="#" class="brand">
                    <img src="assets/brand/logo.png" class="logo" alt="Smooth" />
                </a>
                <button class="toggle-bar">
                    <span class="fa fa-bars"></span>
                </button>
            </div>		
            <!-- Start Header menu for mobile -->
            <div class="header__mobile js-header-menu">
                <a href="#" class="header__mobile-brand">Menu</a>
                <button class="toggle-bar header__mobile-toggle">
                    <span class="fa fa-remove"></span>
                </button>
            </div>
            <!-- End Header menu for mobile -->	
            <ul class="menu">
                <li class="active"><a href="index.html">Home</a></li>
                <li><a href="about-us.html">About Smooth</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="pricing.html">Pricing</a></li>
                <li class="megamenu"><a href="#">Megamenu</a>
                    <div class="megamenu-content megamenu-product">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-megamenu">
                                    <div class="megamenu__widget">
                                        <h6 class="megamenu__widget-title">Products</h6>
                                        <div class="megamenu__widget-group">
                                            <a href="https://themeforest.net/item/bacotna-creative-agency-and-corporate-template/20789432" class="megamenu__widget-group-link">
                                                Bacotna
                                                <span>Creative Agency and Corporate Template</span>
                                            </a>
                                        </div>

                                        <div class="megamenu__widget-group">
                                            <a href="https://themeforest.net/item/anakual-multipurpose-and-responsive-corporate-template/19504220" class="megamenu__widget-group-link">
                                                Anakual
                                                <span>Multipurpose and responsive corporate</span>
                                            </a>
                                        </div>

                                        <div class="megamenu__widget-group">
                                            <a href="https://themeforest.net/item/creativica-multiple-creative-html5-template/19061883" class="megamenu__widget-group-link">
                                                Creativica
                                                <span>Multiple Creative HTML5 Template</span>
                                            </a>
                                        </div>

                                        <div class="megamenu__widget-group">
                                            <a href="https://themeforest.net/item/inspired-multipurpose-corporate-and-creative-template/18412306" class="megamenu__widget-group-link">
                                                Inspired
                                                <span>Multipurpose corporate and creative template</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-megamenu">
                                    <div class="megamenu__widget">
                                        <h6 class="megamenu__widget-title">Corporate site</h6>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="megamenu__widget-group">
                                                    <a href="about-us.html" class="megamenu__widget-group-link">
                                                        About us
                                                        <span>Premium Landing page and HTML template</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="megamenu__widget-group">
                                                    <a href="gallery.html" class="megamenu__widget-group-link">
                                                        Gallery
                                                        <span>Photo, image and assets</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="megamenu__widget-group">
                                                    <a href="services.html" class="megamenu__widget-group-link">
                                                        Our services
                                                        <span>Dicit decore numquam ei vel eos ex feugait albucius</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="megamenu__widget-group">
                                                    <a href="faq.html" class="megamenu__widget-group-link">
                                                        F.A.Q
                                                        <span>Eu pertinax referrentur definitiones ius</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="megamenu__widget-group">
                                                    <a href="team.html" class="megamenu__widget-group-link">
                                                        Our team
                                                        <span>Meet our professional teams</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="megamenu__widget-group">
                                                    <a href="career.html" class="megamenu__widget-group-link">
                                                        Career
                                                        <span>Join with our team</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="megamenu__widget-group">
                                                    <a href="blog-left-sidebar.html" class="megamenu__widget-group-link">
                                                        Blog
                                                        <span>News, article, and events</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="megamenu__widget-group">
                                                    <a href="testimoni.html" class="megamenu__widget-group-link">
                                                        Testimoni
                                                        <span>The client is talking about us</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </li>
                <li class="dropdown"><a href="blog-left-sidebar.html">Blog</a>
                    <ul class="dropdown-menu">
                        <li><a href="blog-left-sidebar.html">Single Post Left Sidebar</a></li>
                        <li><a href="blog-right-sidebar.html">Single Post Right Sidebar</a></li>
                        <li class="dropdown">
                            <a href="blog-grid-left-sidebar.html">Blog Grid</a>
                            <ul class="dropdown-menu">
                                <li><a href="blog-grid-left-sidebar.html">Blog Left Sidebar</a></li>
                                <li><a href="blog-grid-right-sidebar.html">Blog Right Sidebar</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="blog-single-post-left-sidebar.html">Blog Listing</a>
                            <ul class="dropdown-menu">
                                <li><a href="blog-single-post-left-sidebar.html">Blog Left Sidebar</a></li>
                                <li><a href="blog-single-post-right-sidebar.html">Blog Right Sidebar</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#">Dropdown Lavel</a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Level 2</a></li>
                                <li><a href="#">Level 2</a></li>
                                <li><a href="#">Level 2</a></li>
                                <li class="dropdown">
                                    <a href="#">Dropdown 3</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Level 3</a></li>                                    
                                         <li><a href="#">Level 3</a></li>                                    
                                         <li><a href="#">Level 3</a></li>
                                    </ul>                                 
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="contact-us.html">Contact</a></li>
            </ul>
            <ul class="attributes">
                <li class="header__button"><a href="https://themeforest.net/user/99webpage/portfolio" class="btn btn-primary btn-rounded btn-xs btn-header">Try free</a></li>
                <li class="header__download-icon"><a href="https://themeforest.net/user/99webpage/portfolio"><i class="fa fa-download"></i></a></li>
            </ul>
        </nav>
    </header>
    <!-- End Header -->

    <!-- Start Masthead -->
    <section class="masthead js-masthead-height pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-40">
                    <div class="masthead__content">
                        <h1 class="masthead__content-title">Save Your Money Use One Template</h1>
                        <p class="masthead__content-subtitle">Top marketing template in the bigest market place</p>
                    </div>
                    <div class="masthead__form">
                        <form name="register" action="">
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" class="form-control" id="inputName" placeholder="Enter your full name">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input type="email" class="form-control" id="inputEmail" placeholder="Enter your emali address">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Password</label>
                                <input type="password" class="form-control" id="inputPassword" placeholder="Type Password">
                            </div>
                            <div class="masthead__form-action">
                                <button type="button" class="btn btn-rounded btn-orange btn-icon-right">Get started <i class="fa fa-long-arrow-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8">
                    <img src="assets/images/business-looking.png" class="img-fluid" alt="Business Looking" />
                </div>
            </div>
        </div>
    </section>
    <!-- End Masthead -->

    <!-- Start Section -->
    <section class="section section__purple">
        <div class="container">
            <idv class="row">
                <div class="col-12">
                    <div class="owl-active-nav">
                        <div class="owl-carousel js-owl-clients">
                            <!-- Start client 01 -->
                            <div class="item">
                                <a href="#" class="client">
                                        <img src="assets/images/clients/white/client_01.png" class="client_logo-hover" alt="Client name" />
                                    <img src="assets/images/clients/white/client_01.png" class="client_logo" alt="Client name" />
                                </a>
                            </div>
                            <!-- End client 01 -->

                            <!-- Start client 02 -->
                            <div class="item">
                                <a href="#" class="client">
                                    <img src="assets/images/clients/white/client_02.png" class="client_logo-hover" alt="Client name" />
                                    <img src="assets/images/clients/white/client_02.png" class="client_logo" alt="Client name" />
                                </a>
                            </div>
                            <!-- End client 02 -->

                            <!-- Start client 03 -->
                            <div class="item">
                                <a href="#" class="client">
                                    <img src="assets/images/clients/white/client_03.png" class="client_logo-hover" alt="Client name" />
                                    <img src="assets/images/clients/white/client_03.png" class="client_logo" alt="Client name" />
                                </a>
                            </div>
                            <!-- End client 03 -->

                            <!-- Start client 04 -->
                            <div class="item">
                                <a href="#" class="client">
                                    <img src="assets/images/clients/white/client_04.png" class="client_logo-hover" alt="Client name" />
                                    <img src="assets/images/clients/white/client_04.png" class="client_logo" alt="Client name" />
                                </a>
                            </div>
                            <!-- End client 04 -->

                            <!-- Start client 05 -->
                            <div class="item">
                                <a href="#" class="client">
                                    <img src="assets/images/clients/white/client_06.png" class="client_logo-hover" alt="Client name" />
                                    <img src="assets/images/clients/white/client_06.png" class="client_logo" alt="Client name" />
                                </a>
                            </div>
                            <!-- End client 05 -->

                            <!-- Start client 06 -->
                            <div class="item">
                                <a href="#" class="client">
                                    <img src="assets/images/clients/white/client_05.png" class="client_logo-hover" alt="Client name" />
                                    <img src="assets/images/clients/white/client_05.png" class="client_logo" alt="Client name" />
                                </a>
                            </div>
                            <!-- End client 06 -->
                        </div>
                    </div>
                </div>
            </idv>
        </div>
    </section>
   <!-- End Section -->

    <!-- Start Section -->
    <section class="section pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <h2 class="section__heading section__heading-center">We are build awesome marketing template</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center mb-40">
                    <p>
                     Et odio honestatis ius. Exerci numquam consequuntur no mei. Ut sed ornatus tibique, fabellas pertinax est cu. Te odio omittam mea, ea tractatos dissentiunt complectitur nec. Liber voluptatum ad vis.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div id="player" poster="assets/images/video-cover@2x.png" data-plyr-provider="youtube" data-plyr-embed-id="mcvqOUtcAJg"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section -->

    <!-- Start Section -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="section__column section__column-top--left">
                        <span class="icon icon-gift"></span>
                        <h4>All in one package</h4>
                        <p>
                            Unum liber commune in mel, ut pri tritani propriae menandri. Cum et magna porro intellegat.
                        </p>
                        <div class="section__column-top--left-action">
                            <a href="#" class="btn-link btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="section__column section__column-top--left">
                        <span class="icon icon-paper-plane"></span>
                        <h4>Send Campaign</h4>
                        <p>
                            Unum liber commune in mel, ut pri tritani propriae menandri. Cum et magna porro intellegat.
                        </p>
                        <div class="section__column-top--left-action">
                            <a href="#" class="btn-link btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="section__column section__column-top--left">
                        <span class="icon icon-cogs"></span>
                        <h4>Easy to use</h4>
                        <p>
                            Unum liber commune in mel, ut pri tritani propriae menandri. Cum et magna porro intellegat.
                        </p>
                        <div class="section__column-top--left-action">
                            <a href="#" class="btn-link btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="section__column section__column-top--left">
                        <span class="icon icon-flask"></span>
                        <h4>New Technology</h4>
                        <p>
                            Unum liber commune in mel, ut pri tritani propriae menandri. Cum et magna porro intellegat.
                        </p>
                        <div class="section__column-top--left-action">
                            <a href="#" class="btn-link btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="section__column section__column-top--left">
                        <span class="icon icon-tree"></span>
                        <h4>Branch system</h4>
                        <p>
                            Unum liber commune in mel, ut pri tritani propriae menandri. Cum et magna porro intellegat.
                        </p>
                        <div class="section__column-top--left-action">
                            <a href="#" class="btn-link btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="section__column section__column-top--left">
                        <span class="icon icon-hard-disk"></span>
                        <h4>Large Storage</h4>
                        <p>
                            Unum liber commune in mel, ut pri tritani propriae menandri. Cum et magna porro intellegat.
                        </p>
                        <div class="section__column-top--left-action">
                            <a href="#" class="btn-link btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="section__column section__column-top--left">
                        <span class="icon icon-book"></span>
                        <h4>Manual Guide</h4>
                        <p>
                            Unum liber commune in mel, ut pri tritani propriae menandri. Cum et magna porro intellegat.
                        </p>
                        <div class="section__column-top--left-action">
                            <a href="#" class="btn-link btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="section__column section__column-top--left">
                        <span class="icon icon-chart"></span>
                        <h4>Actual Report</h4>
                        <p>
                            Unum liber commune in mel, ut pri tritani propriae menandri. Cum et magna porro intellegat.
                        </p>
                        <div class="section__column-top--left-action">
                            <a href="#" class="btn-link btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                        <a href="#" class="btn btn-primary btn-rounded">View More Features</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section -->

    <!-- Start Section -->
    <section class="section section__gray pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <h2 class="section__heading section__heading-center">Product screenshot</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-active-nav">
                        <div class="owl-carousel js-owl-screenshot">
                            <!-- Start screenhot 01 -->
                            <div class="item">
                                <img src="assets/images/video-cover-app.png" class="img-fluid" alt="App dashboard" />
                            </div>
                            <!-- End screenhot 01 -->

                            <!-- Start screenhot 02 -->
                            <div class="item">
                                <img src="assets/images/thumbnail-cover-app.png" class="img-fluid" alt="App dashboard" />
                            </div>
                            <!-- End screenhot 02 -->

                            <!-- Start screenhot 03 -->
                            <div class="item">
                                <img src="assets/images/zoom-cover-app.png" class="img-fluid" alt="App dashboard" />
                            </div>
                            <!-- End screenhot 03 -->

                            <!-- Start screenhot 04 -->
                            <div class="item">
                                <img src="assets/images/video-cover-app.png" class="img-fluid" alt="App dashboard" />
                            </div>
                            <!-- End screenhot 04 -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section -->

    <!-- Start Section -->
    <section class="section pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-lg-5 offset-lg-1 mb-40">
                    <img src="assets/images/using-software.png" class="img-fluid" alt="Using Software" />
                </div>
                <div class="col-lg-5 mb-40">
                    <h2>Customizable Landing page</h2>
                    <p>
                    Hinc intellegebat ex eos, pro duis vidit graecis at, adhuc dolor consectetuer has at. Libris laboramus an eos, invidunt temporibus ut mel, illud urbanitas in eos. Eos no illud atqui, pri dicunt explicari interpretaris ne, no sit harum meliore. Esse cibo officiis ea nec.
                    </p>
                    <a href="#" class="btn btn-primary btn-stroke btn-rounded">Learn more </a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section -->

    <!-- Start Section -->
    <section class="section pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-40">
                    <img src="assets/images/businessman-with-laptop.png" class="img-fluid" alt="Business Man with Laptop" />
                </div>
                <div class="col-lg-5 offset-lg-1 mb-40">
                    <h2>Save your money and time</h2>
                    <p>
                    At sit veniam evertitur democritum, ex modo tacimates nec, et inani regione abhorreant mel. Mei denique atomorum argumentum in, dicant recteque maiestatis ei mea. Vix dolorem dissentiet ex, ut ullum viderer pri. Principes complectitur et vim, quo ad quod tractatos mnesarchum.
                    </p>
                    <a href="#" class="btn btn-primary btn-stroke btn-rounded">Learn more </a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section -->
    
    <!-- Start Section -->
    <section class="section pt-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <h2 class="section__heading section__heading-center">Choose our package & Acteved to premium</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="pricing__grid">
                        <div class="pricing__grid-header">
                            <div class="pricing__grid-header--icon">
                                <span class="fa fa-tree"></span>
                            </div>
                            <h2 class="pricing__grid-header-title">Besic</h2>
                            <div class="pricing__grid-price">
								<p>
                                    From
                                    <span class="pricing__grid-price--number"><em class="pricing__grid-price--currency">$</em>59</span>
                                    <small class="pricing__content-muted">/mo</small>
                                </p>                           
                            </div>
                        </div>
                        <div class="pricing__grid-content">
                            <ul>
                                <li class="included"><i class="fa fa-check"></i> 5 HTML Template</li>
                                <li class="included"><i class="fa fa-check"></i> 2 Free Vector</li>
                                <li class="unincluded"><i class="fa fa-times"></i> PSD File</li>
                                <li class="unincluded"><i class="fa fa-times"></i> Support</li>
                                <li class="unincluded"><i class="fa fa-times"></i> Documentation</li>
                            </ul>
                        </div>          
                        <div class="pricing__grid-action">
                            <button type="button" class="btn btn-default btn-rounded btn-icon-right">Choose Plan <i class="fa fa-long-arrow-right"></i></button>
                        </div>          
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="pricing__grid pricing__grid-blue">
                        <div class="pricing__grid-header">
                            <div class="pricing__grid-header--icon">
                                <span class="fa fa-shield"></span>
                            </div>
                            <h2 class="pricing__grid-header-title">Premium</h2>
                            <div class="pricing__grid-price">
								<p>
                                    From
                                    <span class="pricing__grid-price--number"><em class="pricing__grid-price--currency">$</em>120</span>
                                    <small class="pricing__content-muted">/mo</small>
                                </p>                           
                            </div>
                        </div>
                        <div class="pricing__grid-content">
                            <ul>
                                <li class="included"><i class="fa fa-check"></i> 5 Free Vector</li>
                                <li class="included"><i class="fa fa-times"></i> PSD File</li>
                                <li class="included"><i class="fa fa-check"></i> 10 Free Vector</li>
                                <li class="unincluded"><i class="fa fa-times"></i> Support</li>
                                <li class="unincluded"><i class="fa fa-times"></i> Documentation</li>
                            </ul>
                        </div>          
                        <div class="pricing__grid-action">
                            <button type="button" class="btn btn-primary btn-rounded btn-icon-right">Choose Plan <i class="fa fa-long-arrow-right"></i></button>
                        </div>          
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="pricing__grid pricing__grid-orange">
                        <div class="pricing__grid-header">
                            <div class="pricing__grid-header--icon">
                                <span class="fa fa-rocket"></span>
                            </div>
                            <h2 class="pricing__grid-header-title">Business</h2>
                            <div class="pricing__grid-price">
								<p>
                                    From
                                    <span class="pricing__grid-price--number"><em class="pricing__grid-price--currency">$</em>299</span>
                                    <small class="pricing__content-muted">/mo</small>
                                </p>                           
                            </div>
                        </div>
                        <div class="pricing__grid-content">
                            <ul>
                                <li class="included"><i class="fa fa-check"></i> 20 HTML Template</li>
                                <li class="included"><i class="fa fa-check"></i> 10 Free Vector</li>
                                <li class="included"><i class="fa fa-times"></i> PSD File</li>
                                <li class="included"><i class="fa fa-times"></i> Support</li>
                                <li class="unincluded"><i class="fa fa-times"></i> Documentation</li>
                            </ul>
                        </div>          
                        <div class="pricing__grid-action">
                            <button type="button" class="btn btn-orange btn-rounded btn-icon-right">Choose Plan <i class="fa fa-long-arrow-right"></i></button>
                        </div>          
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section -->

    <!-- Start Section -->
    <section class="section section__gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <h2 class="section__heading section__heading-center">Recommended reading</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="owl-carousel js-owl-article">
                        <!-- Start testimoni 01 -->
                        <div class="item">
                            <div class="article__card">
                                <div class="article__card-heading">
                                    <a href="#" class="article__card-label">News & Article</a>
                                    <a href="#" class="article__card-comment"><i class="fa fa-comments"></i> 23</a>
                                    <h4 class="article__card-title"><a href="#">Sit in pertinax petentium est ne mucius</a></h4>
                                </div>
                                <div class="article__card-image">
                                    <img src="assets/images/blog/thumbnail/img-blog-thumbnail-01.jpg" class="img-fluid" alt="Image article" />
                                </div>
                                <div class="article__card-footer">
                                    <div class="article__card-author">
                                        <img src="assets/images/avatar-man.jpg" class="article__card-avatar" alt="Author Avatar" />
                                        <p><strong>Posted by :</strong> <i class="fa fa-user"></i> <a href="#">Ence iif</a></p>
                                        <a href="#">29 Des 2018</a>
                                    </div>
                                    <a href="#" class="article__card-action btn-link">Read more</a>
                                </div>         
                            </div>
                        </div>
                        <!-- End testimoni 01 -->

                        <!-- Start testimoni 02 -->
                        <div class="item">
                            <div class="article__card">
                                <div class="article__card-heading">
                                    <a href="#" class="article__card-label">News & Article</a>
                                    <a href="#" class="article__card-comment"><i class="fa fa-comments"></i> 10</a>
                                    <h4 class="article__card-title"><a href="#">Mei ne audire fabulas ea mea quas putent</a></h4>
                                </div>
                                <div class="article__card-image">
                                    <img src="assets/images/blog/thumbnail/img-blog-thumbnail-02.jpg" class="img-fluid" alt="Image article" />
                                </div>
                                <div class="article__card-footer">
                                    <div class="article__card-author">
                                        <img src="assets/images/avatar-women.jpg" class="article__card-avatar" alt="Author Avatar" />
                                        <p><strong>Posted by :</strong> <i class="fa fa-user"></i> <a href="#">Rinna noor</a></p>
                                        <a href="#">29 Des 2018</a>
                                    </div>
                                    <a href="#" class="article__card-action btn-link">Read more</a>
                                </div>         
                            </div>
                        </div>
                        <!-- End testimoni 02 -->

                        <!-- Start testimoni 03 -->
                        <div class="item">
                            <div class="article__card">
                                <div class="article__card-heading">
                                    <a href="#" class="article__card-label">News & Article</a>
                                    <a href="#" class="article__card-comment"><i class="fa fa-comments"></i> 23</a>
                                    <h4 class="article__card-title"><a href="#">Sit in pertinax petentium est ne mucius</a></h4>
                                </div>
                                <div class="article__card-image">
                                    <img src="assets/images/blog/thumbnail/img-blog-thumbnail-03.jpg" class="img-fluid" alt="Image article" />
                                </div>
                                <div class="article__card-footer">
                                    <div class="article__card-author">
                                        <img src="assets/images/avatar-man.jpg" class="article__card-avatar" alt="Author Avatar" />
                                        <p><strong>Posted by :</strong> <i class="fa fa-user"></i> <a href="#">Ence iif</a></p>
                                        <a href="#">29 Des 2018</a>
                                    </div>
                                    <a href="#" class="article__card-action btn-link">Read more</a>
                                </div>         
                            </div>
                        </div>
                        <!-- End testimoni 03 -->

                        <!-- Start testimoni 01 -->
                        <div class="item">
                            <div class="article__card">
                                <div class="article__card-heading">
                                    <a href="#" class="article__card-label">News & Article</a>
                                    <a href="#" class="article__card-comment"><i class="fa fa-comments"></i> 23</a>
                                    <h4 class="article__card-title"><a href="#">Sit in pertinax petentium est ne mucius</a></h4>
                                </div>
                                <div class="article__card-image">
                                    <img src="assets/images/blog/thumbnail/img-blog-thumbnail-01.jpg" class="img-fluid" alt="Image article" />
                                </div>
                                <div class="article__card-footer">
                                    <div class="article__card-author">
                                        <img src="assets/images/avatar-man.jpg" class="article__card-avatar" alt="Author Avatar" />
                                        <p><strong>Posted by :</strong> <i class="fa fa-user"></i> <a href="#">Ence iif</a></p>
                                        <a href="#">29 Des 2018</a>
                                    </div>
                                    <a href="#" class="article__card-action btn-link">Read more</a>
                                </div>         
                            </div>
                        </div>
                        <!-- End testimoni 01 -->

                        <!-- Start testimoni 02 -->
                        <div class="item">
                            <div class="article__card">
                                <div class="article__card-heading">
                                    <a href="#" class="article__card-label">News & Article</a>
                                    <a href="#" class="article__card-comment"><i class="fa fa-comments"></i> 10</a>
                                    <h4 class="article__card-title"><a href="#">Mei ne audire fabulas ea mea quas putent</a></h4>
                                </div>
                                <div class="article__card-image">
                                    <img src="assets/images/blog/thumbnail/img-blog-thumbnail-02.jpg" class="img-fluid" alt="Image article" />
                                </div>
                                <div class="article__card-footer">
                                    <div class="article__card-author">
                                        <img src="assets/images/avatar-women.jpg" class="article__card-avatar" alt="Author Avatar" />
                                        <p><strong>Posted by :</strong> <i class="fa fa-user"></i> <a href="#">Rinna noor</a></p>
                                        <a href="#">29 Des 2018</a>
                                    </div>
                                    <a href="#" class="article__card-action btn-link">Read more</a>
                                </div>         
                            </div>
                        </div>
                        <!-- End testimoni 02 -->

                        <!-- Start testimoni 03 -->
                        <div class="item">
                            <div class="article__card">
                                <div class="article__card-heading">
                                    <a href="#" class="article__card-label">News & Article</a>
                                    <a href="#" class="article__card-comment"><i class="fa fa-comments"></i> 23</a>
                                    <h4 class="article__card-title"><a href="#">Sit in pertinax petentium est ne mucius</a></h4>
                                </div>
                                <div class="article__card-image">
                                    <img src="assets/images/blog/thumbnail/img-blog-thumbnail-03.jpg" class="img-fluid" alt="Image article" />
                                </div>
                                <div class="article__card-footer">
                                    <div class="article__card-author">
                                        <img src="assets/images/avatar-man.jpg" class="article__card-avatar" alt="Author Avatar" />
                                        <p><strong>Posted by :</strong> <i class="fa fa-user"></i> <a href="#">Ence iif</a></p>
                                        <a href="#">29 Des 2018</a>
                                    </div>
                                    <a href="#" class="article__card-action btn-link">Read more</a>
                                </div>         
                            </div>
                        </div>
                        <!-- End testimoni 03 -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section -->

    <!-- Start Section -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <h2 class="section__heading section__heading-center">User testimoni</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 offset-lg-3 text-center mb-20">
                    <div class="owl-carousel js-owl-testimoni">
                        <!-- Start testimoni 01 -->
                        <div class="item">
                            <div class="testimoni">
                                <blockquote>Mei ne audire fabulas. Ea mea quas putent, sit an lucilius <strong>repudiandae</strong>, mei ut appetere electram maluisset.</blockquote>
                                <p class="testimoni__author"><a href="#">Alexandro Oddol</a></p>
                                <a href="#" class="testimoni__avatar"><img src="./assets/images/testimoni-avatar01.png" class="testimoni__avatar-image" alt="Alexandro Oddol" /></a>
                            </div>
                        </div>
                        <!-- End testimoni 01 -->

                        <!-- Start testimoni 02 -->
                        <div class="item">
                            <div class="testimoni">
                                <blockquote>Ea est molestie tincidunt, eam partem facete at. <strong>Mea in modo</strong> dolores concludaturque, euismod liberavisse</blockquote>
                                <p class="testimoni__author"><a href="#">Alexandro Oddol</a></p>
                                <a href="#" class="testimoni__avatar"><img src="./assets/images/testimoni-avatar02.png" class="testimoni__avatar-image" alt="Alexandro Oddol" /></a>
                            </div>
                        </div>
                        <!-- End testimoni 02 -->

                        <!-- Start testimoni 03 -->
                        <div class="item">
                            <div class="testimoni">
                                <blockquote>Homero sapientem per id, id sonet veniam commune vis, <strong>ei nam nonumy</strong> fuisset pro primis consequat.</blockquote>
                                <p class="testimoni__author"><a href="#">Alexandro Oddol</a></p>
                                <a href="#" class="testimoni__avatar"><img src="./assets/images/testimoni-avatar03.png" class="testimoni__avatar-image" alt="Alexandro Oddol" /></a>
                            </div>
                        </div>
                        <!-- End testimoni 03 -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section -->

    <!-- Start Section -->
    <section class="section section__cta">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h2>Let's try it's free trail for 30 days</h2>
                    <a href="#" class="btn btn-white btn-rounded btn-lg btn-icon-right">Get started <i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section -->

    <!-- Start Back to top -->
    <div class="back-to-top js-back-to-top">
        <span class="fa fa-angle-double-up back-to-top__icon"></span>
        <span class="back-to-top__text">TOP</span>
    </div>
    <!-- End Back to top -->

    <!-- Start Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer__widget">
                        <img src="assets/brand/logo.png" class="footer__widget-logo" alt="Smooth" />
                        <p>St.Kemacetan timur No.13 Block Q2 Jakarta - Indonesia</p>
                        <div class="footer__widget-contact">
                            <i class="fa fa-phone"></i>
                            <p>(021) 111-222-333-44</p>
                        </div>
                        <div class="footer__widget-contact">
                            <i class="fa fa-envelope"></i>
                            <p>info@yourdomain.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-2 col-sm-3">
                    <div class="footer__widget">
                        <h4 class="footer__widget-title">Product</h4>
                        <ul class="footer__widget-linklist">
                            <li><a href="#">Landing page</a></li>
                            <li><a href="#">Email marketing</a></li>
                            <li><a href="#">HTML template</a></li>
                            <li><a href="#">Angular builder</a></li>
                            <li><a href="#">Worpress theme</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 col-lg-2 col-sm-3">
                    <div class="footer__widget">
                        <h4 class="footer__widget-title">Company</h4>
                        <ul class="footer__widget-linklist">
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Career</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 col-lg-2 col-sm-3">
                    <div class="footer__widget">
                        <h4 class="footer__widget-title">Resources</h4>
                        <ul class="footer__widget-linklist">
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">F.A.Q</a></li>
                            <li><a href="#">Testimoni</a></li>
                            <li><a href="#">Site map</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-sm-3">
                    <div class="footer__widget">
                        <h4 class="footer__widget-title">Follow us</h4>
                        <ul class="footer__widget-network">
                            <li><a href="#" class="footer__widget-network-link"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="footer__widget-network-link"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="footer__widget-network-link"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" class="footer__widget-network-link"><i class="fa fa-youtube-play"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="footer__subfooter">
                        <div class="row">
                            <div class="col-md-6">
                                <p>© <a href="#">99webpage</a> | Web Design Indonesia 2020. All Rights Reserved.</p>
                            </div>
                            <div class="col-md-6 text-right">
                                <ul class="footer__subfooter-liststyle">
                                    <li><a href="#">Terms Of Service</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Help</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="assets/js/jquery.min.js"></script>

	<!-- Template main JavaScript -->
    <script src="assets/js/main.min.js"></script>
    
    <script>const player = new Plyr('#player');</script>

	<!-- Template custome JavaScript -->
    <script src="assets/js/scripts.min.js"></script>

    </body>
</html>
