<?php $this->load->view('top_application'); ?>

<!-- Trial Code -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Mentor Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url(); ?>mentor/img/favicon.png" rel="icon">
  <link href="<?php echo base_url(); ?>mentor/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url(); ?>mentor/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>mentor/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>mentor/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>mentor/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>mentor/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>mentor/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>mentor/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url(); ?>mentor/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mentor - v2.2.0
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<!--  <!-- ======= Header ======= -->
<!--  <header id="header" class="fixed-top">
<!--    <div class="container d-flex align-items-center">
<!--
<!--      <h1 class="logo mr-auto"><a href="index.html">Mentor</a></h1>
<!--      <!-- Uncomment below if you prefer to use an image logo -->
<!--      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
<!--
<!--      <nav class="nav-menu d-none d-lg-block">
<!--        <ul>
<!--          <li class="active"><a href="index.html">Home</a></li>
<!--          <li><a href="about.html">About</a></li>
<!--          <li><a href="courses.html">Courses</a></li>
<!--          <li><a href="trainers.html">Trainers</a></li>
<!--          <li><a href="events.html">Events</a></li>
<!--          <li><a href="pricing.html">Pricing</a></li>
<!--          <li class="drop-down"><a href="">Drop Down</a>
<!--            <ul>
<!--              <li><a href="#">Drop Down 1</a></li>
<!--              <li class="drop-down"><a href="#">Deep Drop Down</a>
<!--                <ul>
<!--                  <li><a href="#">Deep Drop Down 1</a></li>
<!--                  <li><a href="#">Deep Drop Down 2</a></li>
<!--                  <li><a href="#">Deep Drop Down 3</a></li>
<!--                  <li><a href="#">Deep Drop Down 4</a></li>
<!--                  <li><a href="#">Deep Drop Down 5</a></li>
<!--                </ul>
<!--              </li>
<!--              <li><a href="#">Drop Down 2</a></li>
<!--              <li><a href="#">Drop Down 3</a></li>
<!--              <li><a href="#">Drop Down 4</a></li>
<!--            </ul>
<!--          </li>
<!--          <li><a href="contact.html">Contact</a></li>
<!--
<!--        </ul>
<!--      </nav><!-- .nav-menu -->
<!--
<!--      <a href="courses.html" class="get-started-btn">Get Started</a>
<!--
<!--    </div>
<!--  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>Learning Today,<br>Leading Tomorrow</h1>
      <h2>We are team of talanted designers making websites with Bootstrap</h2>
      <a href="courses.html" class="btn-get-started">Get Started</a>
	  
	   <form style="width: 100%;margin: 0 auto;" class="lms_search">
     
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-3 btn-get-started">
            <select name="category" onChange="searchFilter()" id="category" class="form-control">
              <option value="">Select category</option>
              <?php 
	  		$db2 = $this->load->database('database2', TRUE);
			$sql="SELECT * FROM `tbl_department`  where status='1' AND parent_id='0' ORDER BY sort_order";
			$query=$db2->query($sql);
      foreach($query->result_array() as $val): 
        if($val['category_id'] != 23)
        { }
        else {
	  		?>
              <option value="<?php echo $val['category_id']?>"><?php echo $val['category_name']?></option>
              <?php } endforeach;?>
            </select>
          </div>
          <div class="col-md-3 btn-get-started">
            <select id="subject" name="subject" onChange="searchFilter()" class="form-control">
              <option value="">Select Subject</option>
            </select>
          </div>
          <div class="col-md-3"></div>
          <!--<div class="col-md-3">
            <input type="text" name="" placeholder="Experience" style="background:#ffffff">
          </div>--> 
          <!--<div class="col-md-3">
            <input type="submit" class="btn btn-success btn-sm bold" value="search">
          </div>--> 
        </div>
      </form>
	  
	  
	  
	  
    </div>
  </section><!-- End Hero -->

  

<!--    <!-- ======= About Section ======= -->
<!--    <section id="about" class="about">
<!--      <div class="container" data-aos="fade-up">
<!--
<!--        <div class="section-title">
<!--          <h2>About</h2>
<!--          <p>About Us</p>
<!--        </div>
<!--
<!--        <div class="row">
<!--          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
<!--            <img src="<?php echo base_url(); ?>mentor/assets/img/about.jpg" class="img-fluid" alt="">
<!--          </div>
<!--          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
<!--            <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
<!--            <p class="font-italic">
<!--              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
<!--              magna aliqua.
<!--            </p>
<!--            <ul>
<!--              <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
<!--              <li><i class="icofont-check-circled"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
<!--              <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
<!--            </ul>
<!--            <p>
<!--              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
<!--            </p>
<!--            <a href="about.html" class="learn-more-btn">Learn More</a>
<!--          </div>
<!--        </div>
<!--
<!--      </div>
<!--    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">1232</span>
            <p>Students</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">64</span>
            <p>Courses</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">42</span>
            <p>Events</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">15</span>
            <p>Trainers</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->
	
	 <!-- ======= Popular Courses Section ======= -->
    <section id="popular-courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Courses</h2>
          <p>Popular Courses</p>
        </div>

<form method="post">
            <!--  <div class="container" id="postList"> -->
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
               <?php
                if(is_array($res) && !empty($res)) {
                foreach($res as $val) {
               ?>  

      <div class="col-xl-4 col-lg-6 col-md-6 col-sm-4 listAll">
                    <div class="single-blog">
                      <div class="blog-img">
        
              <!--<img src="<a href="javascript:void(0)" data-id="<?php echo $val['courses_id']?>">
                        <?php if(!empty($val['image'])) {?> -->
                        <a href="<?php echo base_url();?>tests/detail/<?php echo $val['courses_friendly_url']?>"> <img src="<?php echo base_url();?>lms/uploaded_files/courses/<?php echo $val['image']?>" alt="" data-href="<?php echo base_url();?>tests/coursedetail/<?php echo $val['courses_id'];?>" data-name="<?php echo $val['courses_name']?>"></a>
                        <?php } else {?>
                        <a href="<?php echo base_url();?>tests/detail/<?php echo $val['courses_friendly_url']?>"> <img src="https://pathshala.co/uploaded_files/thumb_cache/thumb_190_190_noimg1.gif"/><!--class="openPopup"--></a>
                        <?php }?>
                      </div>
			   <div class="course-content">
                <div class=" mb-3">
                  <p class="price"><ul>
                              <li>
							  <div>
							  <span class="d-flex justify-content-between align-items-center mb-3">
							  <h3><a href="course-details.html">
                               <?php if($val['price']==1){?>
                                Free</a>                                <?php }else{ ?>
                                <a href="course-details.html">&#x20B9;<?php echo $val['price'];?></a> 
                                <a href="course-details.html">Credit Point :<?php echo $val['credit_price'];?></a></h3>
                                <?php }?>
								 </div>
                               </span></li>
                            </ul></p>
                </div>

                <h3><a href="course-details.html"><a href="<?php echo base_url();?>tests/detail/<?php echo $val['courses_friendly_url']?>">Topic: <b><?php echo $val['courses_name']?></b></a></h4>
                        <?php 
						$mem_info=get_db_single_row('wl_teacher',$fields="first_name,teacher_id,status",$condition="WHERE status='1' AND teacher_id='".$val['teacher_id']."'");
						?></a></h3>
						
				<div class="default-btn">
                        
                      <?php if($this->session->userdata('user_id') > 0 ){?>
                     <ul> 
                     <li><a href="<?php echo base_url();?>/tests/enrollDetail/<?php echo $val['courses_id']?>" ><button class="default-btn"></i> Buy Now</a>&nbsp;</li>
                     
                       <?php if($val['price']!=1){?>
                       
                     <li><a href="<?php echo base_url();?>/tests/enrollDetailStoreCredit/<?php echo $val['courses_id']?>" ><button class="default-btn"></i>Use credit Points</a></li>
                      <?php }?>
                      </ul>
                      <?php }else{?>
                     <ul> <li>  <a href="<?php echo base_url();?>users/login" ></i>Buy Now</a></li></ul>
                      <?php }?>                      
                        </div>		
						
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <div class="thumb-lg member-thumb mx-auto"><img src="<?php echo get_image('teacher',$val['picture'],190,190,'AR');?>" alt="img" class="rounded-circle img-thumbnail" alt="profile-image" class="img-fluid" alt=""> </div>
                   <h3><a href="course-details.html">  <a href="<?php echo base_url();?>teacher/profile/<?php echo $val['teacher_id'];?>/<?php echo url_title($val['first_name']);?>">Teacher: <b><?php echo $mem_info['first_name']?></b></a> </h3>
                  </div>
<!--                  <div class="trainer-rank d-flex align-items-center">
<!--                    <i class="bx bx-user"></i>&nbsp;50
<!--                    &nbsp;&nbsp;
<!--                    <i class="bx bx-heart"></i>&nbsp;65
<!--                  </div> -->
</div>
				  <?php $rating = get_rating('',$val['teacher_id'])?>
          <div class="row rate" data-target="form-rate-instructor">
                 <div class="col-md-4"> <label>Rating : </label></div>
              <div class="row">
              <?php for ($x = 1; $x <= 5; $x++) {?>
                <i class="fa fa-star<?php if($x > $rating){echo "-o";}?> text-info"></i>
              <?php }?>  
              </div>
              <input type="hidden" name="form-rate-instructor" value="<?php echo $rating;?>">
            </div>
                </div>
              
            </div>
          </div> <!-- End Course Item-->

	   <?php } }?>
                  <?php echo $this->ajax_pagination->create_links(); ?> </div>
				  </div>
              </div>
            </form>
    </section> <!-- End Popular Courses Section -->
	
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Why Choose Mentor?</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad corporis.
              </p>
              <div class="text-center">
                <a href="about.html" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Corporis voluptates sit</h4>
                    <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>Ullamco laboris ladore pan</h4>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>Labore consequatur</h4>
                    <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-lg-3 col-md-4">
            <div class="icon-box">
              <i class="ri-store-line" style="color: #ffbb2c;"></i>
              <h3><a href="">Lorem Ipsum</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
              <h3><a href="">Dolor Sitema</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
              <h3><a href="">Sed perspiciatis</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
            <div class="icon-box">
              <i class="ri-paint-brush-line" style="color: #e361ff;"></i>
              <h3><a href="">Magni Dolores</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-database-2-line" style="color: #47aeff;"></i>
              <h3><a href="">Nemo Enim</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-gradienter-line" style="color: #ffa76e;"></i>
              <h3><a href="">Eiusmod Tempor</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
              <h3><a href="">Midela Teren</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-price-tag-2-line" style="color: #4233ff;"></i>
              <h3><a href="">Pira Neve</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-anchor-line" style="color: #b2904f;"></i>
              <h3><a href="">Dirada Pack</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-disc-line" style="color: #b20969;"></i>
              <h3><a href="">Moton Ideal</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-base-station-line" style="color: #ff5828;"></i>
              <h3><a href="">Verdo Park</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-fingerprint-line" style="color: #29cc61;"></i>
              <h3><a href="">Flavor Nivelanda</a></h3>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->

   
    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Trainers</h2>
          <p>Our Professional Trainers</p>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="<?php echo base_url(); ?>mentor/assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
              <div class="member-content">
                <h4>Walter White</h4>
                <span>Web Development</span>
                <p>
                  Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut
                </p>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="<?php echo base_url(); ?>mentor/assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="">
              <div class="member-content">
                <h4>Sarah Jhinson</h4>
                <span>Marketing</span>
                <p>
                  Repellat fugiat adipisci nemo illum nesciunt voluptas repellendus. In architecto rerum rerum temporibus
                </p>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="<?php echo base_url(); ?>mentor/assets/img/trainers/trainer-3.jpg" class="img-fluid" alt="">
              <div class="member-content">
                <h4>William Anderson</h4>
                <span>Content</span>
                <p>
                  Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara
                </p>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Trainers Section -->

  </main><!-- End #main -->

 
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url(); ?>mentor/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>mentor/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>mentor/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url(); ?>mentor/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo base_url(); ?>mentor/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="<?php echo base_url(); ?>mentor/assets/vendor/counterup/counterup.min.js"></script>
  <script src="<?php echo base_url(); ?>mentor/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?php echo base_url(); ?>mentor/assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url(); ?>mentor/assets/js/main.js"></script>

</body>

</html>
<!-- trial code end here -->

<?php $this->load->view('bottom_application'); ?>
<div id="wait" style="display:none;"><br>
  Loading..</div>
<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel ="stylesheet">
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> 
<script>
function searchFilter(page_num) {
    page_num = page_num?page_num:0;
	var category =$('#category').val();
	$("#wait").css("display", "block");
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>tests/ajaxPaginationData/'+page_num,
        data:{page:page_num,category:category},
        beforeSend: function () {
            $('.loading').show();
        },
        success: function (html) {
            $('#postList').html(html);
            $('.loading').fadeOut("slow");
			$("#wait").css("display", "none");
        }
    });
}
</script> 
<script type="text/javascript">
$(document).ready(function(){
    $('#category').on('change',function(){
    var categoryID = $(this).val();
    $("#subject").val("");
	$("#wait").css("display", "block");
	//searchFilter();
    if(categoryID){
       $.ajax({
          type:'POST',
            url:'<?php echo base_url();?>tests/getcourses',
              data:'category_id='+categoryID,
               success:function(html){
                   $('#subject').html(html);
					$("#wait").css("display", "none");
               }
            }); 
        }else{
          $('#city').html('<option value="">Select Category</option>'); 
        }
    });
	
$(document).ready(function(){
    $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
        $('.modal-body').load(dataURL,function(){
            $('#myModal').modal({show:true});
        });
    }); 
});	
	
 });
</script>
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog"> 
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Courses Detail</h4>
      </div>
      <div class="modal-body"> </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<style>
#wait {
    background: url("<?php echo base_url();?>assets/demo_wait.gif") no-repeat scroll center center #FFF;
    position: absolute;
    height: 100%;
    width: 100%;
}
div.pagination {
    font-family: "Lucida Sans", Geneva, Verdana, sans-serif;
    padding:20px;
    margin:7px;
}

div.pagination a {
    margin: 2px;
    padding: 0.5em 0.64em 0.43em 0.64em;
    text-decoration: none;
    color: #fff;

  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
}
div.pagination a:hover, div.pagination a:active {
  
    background-color: #de1818;
    color: #fff;
}
div.pagination span.current {
    padding: 0.5em 0.64em 0.43em 0.64em;
    margin: 2px;
    background-color: #f6efcc;
    color: #6d643c;
}
div.pagination span.disabled {
    display:none;
}
.pagination b{
  background-color: #1b68b5;
  color: white;
  border: 1px solid #4CAF50;
  padding: 8px 16px;
}
.pagination a:hover:not(.active) {background-color: #ddd;}
</style>
<style>
.lms_search input[type="text"] {
	border-radius: 5px;
	border: 1px solid #fff;
}
.left_lms {
	background-color: #e7eaf0;
	border-top-left-radius: 5px;
	padding-top: 5px;
}
.left_lms .left_lms_heading {
	border-radius: 5px;
	border: 1px solid #28407a;
	text-align: center;
	padding-top: 12px;
	color: #28407a;
}
.left_lms .sidebar-category ul li a {
	color: #28407a;
	font-weight: bold;
	font-size: 16px;
	text-align: center;
}
.lms_right .product-title h3 {
	font-weight: normal;
	color: #28407a;
	line-height: 1;
	font-size: 15px;
}
.lms_right .product-title h3 a {
	font-weight: 500;
	line-height: 1;
	font-size: 18px;
}
.lms_right .listAll {
	margin-bottom: 12px;
}
.lms_right .lms_price {
	background-color: #28407a;
	color: #ffffff !important;
	border-radius: 5px;
	border: 1px solid #28407a;
	text-align: center;
	padding: 5px;
	font-weight: bold;
}
.lms_right .lms_buy {
	text-align: center;
	padding: 5px;
	font-weight: bold;
}
.lms_right .listAll {
	border-radius: 10px;
	border: 3px solid #28407a;
	padding: 0;
	margin-right: 3px;
}
.lms_right .proTitle {
	color: #28407a;
	font-weight: bold;
}
.lms_right .topicTitle b {
	color: #28407a;
	font-weight: bold;
}
.lms_right .topicTitle a {
	color: #28407a;
	font-weight: normal
}
.lms_right .product-rating i {
	color: #28407a;
}

@media (min-width: 1200px) {
.listAll {
	max-width: 32.33%;
}
.default-btn{ padding: 6px 18px;
background-color:28407a;
border:2px solid #ffffff;
text-align: center;}
}
</style>
