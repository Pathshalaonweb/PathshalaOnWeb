<!DOCTYPE html>
<html>


<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/d1c2ea8b80.js" crossorigin="anonymous"></script>
	<style>
@import url('https://fonts.googleapis.com/css2?family=Bree+Serif&family=Caveat:wght@400;700&family=Lobster&family=Monoton&family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Playfair+Display+SC:ital,wght@0,400;0,700;1,700&family=Playfair+Display:ital,wght@0,400;0,700;1,700&family=Roboto:ital,wght@0,400;0,700;1,400;1,700&family=Source+Sans+Pro:ital,wght@0,400;0,700;1,700&family=Work+Sans:ital,wght@0,400;0,700;1,700&display=swap');

.background {
    background-color: #183661;
    font-family: "Roboto";
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
.logo {
    height: 60px;
    width: 170px;
}

.hrlineFooter {
    background-color: #5a7184;
    height: 1px;

}

.longd {
    color: whitesmoke;
    font-size: 18px;
   
    margin: 4px;
}

.heading-longd {
    font-size: 25px;
    color: red;
}

.heading-longd-p {
	margin-right: 15px;
}

.icon {
    border-radius: 90px;
    padding: 10px;
	
	margin-left: 5px;
}
.list1 {
      display: block;
      color: whitesmoke;
      font-size: 1 em;
      text-shadow: 1px 1px 3px #181818;
      text-decoration: none;

    }
	.address1{
		display: block;
      color: whitesmoke;
      font-size: 1 em;
      text-shadow: 1px 1px 3px #181818;
      text-decoration: none;

	}
	
	 @media screen and (max-width:520px) {
		 .longd {
    color: whitesmoke;
    font-size: 12px;
    margin: 4px;
}

.heading-longd {
    font-size: 14px;
    color: red;
}

.heading-longd-p {
	margin-right: 12px;
	font-size: 10px;
}
		
.list1 {
      display: block;
      color: whitesmoke;
      font-size: 1 em;
      text-shadow: 1px 1px 3px #181818;
      text-decoration: none;
	 

    }	

.address1{
	font-size:10px;
}

	
	 }
</style>

</head>
<!--footer-->
<?php //$this->load->view('project_footer'); ?>
<!--footer end-->
<?php if ($this->router->fetch_class()=='home') {?> 
<footer class="footer-area">
  <div class="background pt-3 pb-3">
        <div class="container-fluid p-2">
            <div class="row">
                <div class="col-6 text-center text-md-left">
                    <div class="d-flex flex-row">
                        <div class="d-flex flex-row justify-content-center justify-content-md-start">
                            <img alt="" src="<?php echo theme_url(); ?>images/logo_rest.png" class="logo mb-2" />
                        </div>
						</div>
						</div>
						<div class="col-6 text-center text-md-right pr-2">
                        <div class="d-flex flex-row justify-content-right justify-content-md-end ">
                            <a class="facebook" href="https://www.facebook.com/pathshalaonweb" target="_blank"><i class="fa fa-facebook icon"></i></a>
                           <a class="youtube" href="https://www.instagram.com/pathshalaonline/" target="_blank"> <i class="fa fa-instagram icon"></i></a>
                            <a class="twitter" href="https://www.twitter.com/pathshalaonweb" target="_blank"><i class="fa fa-twitter icon"></i></a>
                            <a class="linkedin" href="https://www.linkedin.com/company/pathshalaonweb" target="_blank"><i class="fa fa-linkedin icon"></i></a>
                        </div>
                       <!-- <p class="address1"><b>Mail</b>: info@pathshala.co<br><b>Whatsapp </b>: +91-7895187971 (Mon-Sun : 9am - 11pm IST)</p>-->
                    </div>

                </div>
                <div class="col-12 p-3">
				 <h1 class="heading-longd">QUICK LINKS</h1>
                    <div class="d-flex flex-row">
                       
                        <p class="heading-longd-p"><a class="list1" href="<?php echo base_url(); ?>search">Search Tutors</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>courses">Courses</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>acadex">AcadeX</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>searchliveclasses">Master Classes</a></p>
						<p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>account/welcome/teacher">Become a Tutor</a></p>
						<p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>account/welcome/student">Register as a Student</a></p>
                    </div>

                </div>
                <div class="col-12  p-3">
				 <h1 class="heading-longd">OTHER LINKS</h1>
                    <div class="d-flex flex-row">
                       
                        <p class="heading-longd-p"><a class="list1"href="#">Why Pathshala</a></p>
                        <p class="heading-longd-p"><a class="list1"href="#">Child Safety</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url() ?>About/aboutus.html">About Us</a></p>
						<p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>pages/privecy-policy">Privacy Policy</a></p>
						<p class="heading-longd-p"><a class="list1"href="<?php echo base_url() ?>blog">Pathshala Blog</a></p>
						<p class="heading-longd-p"><a class="list1"href="#">Benefits</a></p>
					    <p class="heading-longd-p"><a class="list1"href="<?php echo base_url() ?>contactus">Contact Us</a></p>
						
                    </div>

                </div>
				
				<div class="d-flex flex-row">
                <div class="col-6 p-3">
				<h1 class="heading-longd">Search by State</h1>
				<div class="d-flex flex-row">
                    <div class="col-6 d-flex flex-column">
                        
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?state=10&search=home">New Delhi</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?state=41&search=home">West Bengal</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?state=38&search=home">Uttar Pradesh</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?state=17&search=home">Karnataka</a></p>
						</div>
						<div class="col-6 d-flex flex-column">
						<p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?state=33&search=home">Rajasthan</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?state=22&search=home">Maharashtra</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?state=36&search=home">Telangana</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?state=32&search=home">Punjab</a></p>
						
                    </div>
</div>
                </div>
				
				<div class="col-6 p-3">
				<h1 class="heading-longd">Search by Category</h1>
                    <div class="d-flex flex-row">
                    <div class="col-6 d-flex flex-column">
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?category=30&search=home">School Tution K-12</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?category=170&search=home">College / University</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?category=31&search=home">Competitive Coaching</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?category=7&search=home">Hobbies</a></p>
						</div>
						<div class="col-6 d-flex flex-column">
						<p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?category=514&search=home">Professional Learning</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?category=407&search=home">Language</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?category=12&search=home">Sports</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?category=516&search=home">Vocational Learning</a></p>
                    </div>
</div>
                </div>
				</div>
				<div class="col-12">
                    <hr class="hrlineFooter">
					<h1 class="heading-longd">About Pathshala</h1>
					<div class="d-flex flex-row">
                    <p class="mb-4 longd">India's Education Market Place to Search, Manage, Advertise & Sell, also connecting students from everywhere of every course to the teachers around the country on just a click & catering other educational needs. Students of classes K-12 can register and look for trusted tuition centres, verified home tutors, highly rated online tutors, can find answers to NCERT questions or other questions, hand-written notes on various topics and subjects, and so on. It caters the students to connect with the teachers or professionals involved into imparting their expertise. This platform bridges the gap between the two and allow exploring the new ideas and eventually learn by the subject experts.</p>
						</div>
                </div>
				

                <div class="col-12">
                    <hr class="hrlineFooter">
					<div class="d-flex flex-row">
                    <p class="mb-4 longd">Copyright © <?php echo date('Y'); ?> <a href="<?php echo base_url(); ?>">Pathshala &nbsp;</a>(Brainchild Smart Ventures Private Limited). All Right Reserved. </p>
					
					<p class="longd ml-auto"><a class="list1" href="<?php echo base_url(); ?>pages/terms-and-conditions">Terms & Conditions</a></p>
						<p class="longd"><a class="list1" href="<?php echo base_url(); ?>pages/refund-and-cancellation-policy" target="_blank">Refund & Cancellation</a></p>
			
						</div>
                </div>
			
            </div>
        </div>
    </div>
</footer>
<?php } else { ?>
<footer class="footer-area">
  <div class="background pt-3 pb-3">
        <div class="container-fluid p-2">
            <div class="row">
                <div class="col-6 text-center text-md-left">
                    <div class="d-flex flex-row">
                        <div class="d-flex flex-row justify-content-center justify-content-md-start">
                            <img alt="" src="<?php echo theme_url(); ?>images/logo_rest.png" class="logo mb-2" />
                        </div>
						</div>
						</div>
						<div class="col-6 text-center text-md-right pr-2">
                        <div class="d-flex flex-row justify-content-right justify-content-md-end ">
                            <a class="facebook" href="https://www.facebook.com/pathshalaonweb" target="_blank"><i class="fa fa-facebook icon"></i></a>
                           <a class="youtube" href="https://www.instagram.com/pathshalaonline/" target="_blank"> <i class="fa fa-instagram icon"></i></a>
                            <a class="twitter" href="https://twitter.com/pathshalaonweb" target="_blank"><i class="fa fa-twitter icon"></i></a>
                            <a class="linkedin" href="https://www.linkedin.com/company/pathshalaonweb" target="_blank"><i class="fa fa-linkedin icon"></i></a>
                        </div>
                        <p class="address1"> 37, Ayur Vigyan Nagar, New Delhi, India</p>
                    </div>

                </div>
                <div class="col-12 p-3">
				 <h1 class="heading-longd">QUICK LINKS</h1>
                    <div class="d-flex flex-row">
                       
                        <p class="heading-longd-p"><a class="list1" href="<?php echo base_url(); ?>search">Search Tutors</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>courses">Courses</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>acadex">AcadeX</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>searchliveclasses">Master Classes</a></p>
						<p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>account/welcome/teacher">Become a Tutor</a></p>
						<p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>account/welcome/student">Register as a Student</a></p>
                    </div>

                </div>
                <div class="col-12  p-3">
				 <h1 class="heading-longd">OTHER LINKS</h1>
                    <div class="d-flex flex-row">
                       
                        <p class="heading-longd-p"><a class="list1"href="#">Why Pathshala</a></p>
                        <p class="heading-longd-p"><a class="list1"href="#">Child Safety</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url() ?>About/aboutus.html">About Us</a></p>
						<p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>pages/privecy-policy">Privacy Policy</a></p>
						<p class="heading-longd-p"><a class="list1"href="<?php echo base_url() ?>blog">Pathshala Blog</a></p>
						<p class="heading-longd-p"><a class="list1"href="#">Benefits</a></p>
					    <p class="heading-longd-p"><a class="list1"href="<?php echo base_url() ?>contactus">Contact Us</a></p>
						
                    </div>

                </div>
				
				<div class="d-flex flex-row">
                <div class="col-6 p-3">
				<h1 class="heading-longd">Search by State</h1>
				<div class="d-flex flex-row">
                    <div class="col-6 d-flex flex-column">
                        
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?state=10&search=home">New Delhi</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?state=41&search=home">West Bengal</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?state=38&search=home">Uttar Pradesh</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?state=17&search=home">Karnataka</a></p>
						</div>
						<div class="col-6 d-flex flex-column">
						<p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?state=33&search=home">Rajasthan</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?state=22&search=home">Maharashtra</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?state=36&search=home">Telangana</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?state=32&search=home">Punjab</a></p>
						
                    </div>
</div>
                </div>
				
				<div class="col-6 p-3">
				<h1 class="heading-longd">Search by Category</h1>
                    <div class="d-flex flex-row">
                    <div class="col-6 d-flex flex-column">
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?category=30&search=home">School Tution K-12</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?category=170&search=home">College / University</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?category=31&search=home">Competitive Coaching</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?category=7&search=home">Hobbies</a></p>
						</div>
						<div class="col-6 d-flex flex-column">
						<p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?category=514&search=home">Professional Learning</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?category=407&search=home">Language</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?category=12&search=home">Sports</a></p>
                        <p class="heading-longd-p"><a class="list1"href="<?php echo base_url(); ?>search?category=516&search=home">Vocational Learning</a></p>
                    </div>
</div>
                </div>
				</div>
				<div class="col-12">
                    <hr class="hrlineFooter">
					<h1 class="heading-longd">About Pathshala</h1>
					<div class="d-flex flex-row">
                    <p class="mb-4 longd">India's Education Market Place to Search, Manage, Advertise & Sell, also connecting students from everywhere of every course to the teachers around the country on just a click & catering other educational needs. Students of classes K-12 can register and look for trusted tuition centres, verified home tutors, highly rated online tutors, can find answers to NCERT questions or other questions, hand-written notes on various topics and subjects, and so on. It caters the students to connect with the teachers or professionals involved into imparting their expertise. This platform bridges the gap between the two and allow exploring the new ideas and eventually learn by the subject experts.</p>
						</div>
                </div>
				

                <div class="col-12">
                    <hr class="hrlineFooter">
					<div class="d-flex flex-row">
                    <p class="mb-4 longd">Copyright © <?php echo date('Y'); ?> <a href="<?php echo base_url(); ?>">Pathshala &nbsp;</a>(Brainchild Smart Ventures Private Limited). All Right Reserved. </p>
					
					<p class="longd ml-auto"><a class="list1" href="<?php echo base_url(); ?>pages/terms-and-conditions">Terms & Conditions</a></p>
						<p class="longd"><a class="list1" href="<?php echo base_url(); ?>pages/refund-and-cancellation-policy" target="_blank">Refund & Cancellation</a></p>
			
						</div>
                </div>
			
            </div>
        </div>
    </div>
</footer>
<?php }?>
<!-- JS============================================ --> 
<!-- jQuery JS --> 
<script src="<?php echo theme_url()?>js/vendor/jquery-1.12.4.min.js"></script> 
<!-- Popper JS --> 
<script src="<?php echo theme_url()?>js/popper.min.js"></script> 
<!-- Bootstrap JS --> 
<script src="<?php echo theme_url()?>js/bootstrap.min.js"></script> 
<!-- Plugins JS --> 
<script src="<?php echo theme_url()?>js/plugins.js"></script> 
<script src="<?php echo theme_url()?>js/main.js"></script>
<?php /*?><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">$(function(){$("#datepicker").datepicker({autoclose:!0,todayHighlight:!0})});</script><?php */?>
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
</body></html>
