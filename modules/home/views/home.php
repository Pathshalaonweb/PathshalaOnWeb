<?php $con = mysqli_connect("localhost", "root","Pathshala@1a", "pathshal_pathshala"); ?>

<header><?php $this->load->view('top_application');
        ?></header>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/modules/home/views/slick.css">

  <!--
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>-->

</head>

<body>
  <div class="newsec_sa">
    <section id="intro_sa" class="intro_sa">
      <div class="container container_sa" data-aos="fade-up">
        <div class="row row_sa">
          <div class="col-lg-5 content_sa">
            <h2>India's Largest Online</h2>
            <h1>Education Market Place</h1>   
            <hr style="width:90%;text-align:left;margin-left:0;border-width:5px;">

            <h3>Trusted by students, parents & educators</h3>
            <p><span class="glyphicon glyphicon-check" aria-hidden="true"></span> Interactive classes by best teachers</p>
            <p><span class="glyphicon glyphicon-check" aria-hidden="true"></span> Concept videos & downladable revision notes</p>
            <p><span class="glyphicon glyphicon-check" aria-hidden="true"></span> Chapter tests, sample papers & smart reports</p>
            <p><span class="glyphicon glyphicon-check" aria-hidden="true"></span> 24/7 doubt resolution with experts</p>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 or_sa" data-aos="fade-left" data-aos-delay="100">
            <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/intro.png" height="500px" class="img-fluid" alt="">
          </div>
        </div>
      </div>
    </section>
  </div>


  <section id="hero_sa" class="d-flex justify-content-center align-items-center" style=" background-color: #0f75be;">
    <div class="container-fluid cf_sa" data-aos="zoom-in" data-aos-delay="100">
      <!--<div id="startheader">-->
      <h1 align="center" class="heading h_sa mb-20" style="color: #fff">Find the best teachers near you.</h1><br>
      <form action="<?php echo base_url(); ?>search">
        <div class="container-fluid cf_sa">
          <div class="row r_sa">
            <div class="col-lg-4 col-md-4">
              <select name="category" id="category" class="form-control form-control-new_sa" required>
                <option value="">Select category</option>
                <?php
                $sql = "SELECT * FROM `wl_categories`  where status='1' AND parent_id='0' ORDER BY sort_order";
                $query = $this->db->query($sql);
                foreach ($query->result_array() as $val) :
                ?>


                  <option value="<?php echo $val['category_id'] ?>"><?php echo $val['category_name'] ?></option>
                <?php endforeach; ?>
              </select>

            </div>
            <div class="col-lg-3 col-md-4">
              <select id="classes" name="classes" class="form-control form-control-new_sa">
                <option value="">Select Class</option>
              </select>
            </div>
            <div class="col-lg-4 col-md-4">
              <select id="subject" name="subject" class="form-control form-control-new_sa">
                <option value="">Select Subject</option>
              </select>
            </div>
            <input type="hidden" name="search" value="home">
            <center>
              <button><i class="fa fa-search" style="color: 0f75be"></i></button>
            </center>
          </div>
        </div>
      </form>
      <div class="slider-btn" align="center">
        <div class="container-fluid cf_sa">
          <div class="row no-gutters">
            <div class="col-lg-12 col-md-12">
              <h2 class="mt-45 mb-30" style="color:#fff;font-size: 2.2em;">OR</h2><br>
            </div>
            <div class="col-lg-2 col-md-2"></div>
			<div class="row r10_sa">
            <div class="col-lg-4 col-md-4" style="margin-bottom:20px;"> <a class="animated default-btn btn-green-color" href="<?php echo base_url(); ?>account/welcome/student" target="_blank">Register as a Student</a> </div>
            <div class="col-lg-4 col-md-4"> <a class="animated default-btn btn-green-color" href="<?php echo base_url(); ?>account/welcome/teacher" target="_blank">Register as a Teacher</a> </div>
            <div class="col-lg-2 col-md-2"></div>
			</div>
          </div>
        </div>
      </div>
    </div>

    <!--  </div>-->

  </section><!-- End Hero -->

  <section id="services">
    <div class="container co_sa">

      <div class="description-container_sa">
        <div class="row r1_sa">
          <div class="col-md-14 col-md-10">
            <h1>Pathshala Mantra</h1>
            <p>"Education is essential to all & the lack of availablity and 
			<br> accessibility of basics is the birth place of us - Pathshala"</p>
            <a href="<?php echo base_url(); ?>search"><button class="blue-btn"> Find Tutor </button></a><br><br><br><br>
          </div>
        </div>
        <div class="row r1_sa">
          <div class="col-md-12 col-md-12">
            <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/1.png" alt="" height="300px" width="500px" class="img-responive floating-image_sa left">
            <br><br><br>
            <h1>Lessons from Rs 75/hour</h1>
            <p>Start your online learning in 650+ subject categories starting at Rs 75/hour. You can learn new topics, revise old ones, and be guided through experienced & affordable teachers available on Pathshala.</p>
          </div>
        </div>
        <div class="row r1_sa">
          <div class="col-md-12 col-md-12">
            <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/2.jpg" alt="" class="img-responive floating-image_sa right">
            <br><br><br>
            <h1>Handpicked tutors, wherever you live</h1>
            <p>Easy access to wide number of Top online tutors from pan India in every course offering offline and online learning at anytime, anywhere </p>
          </div>
        </div>
        <div class="row r1_sa">
          <div class="col-md-12 col-md-12">
            <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/3.png" alt="" class="img-responive floating-image_sa left">
            <br><br><br>
            <h1>Our online lesson space makes learning</h1>
            <p>Enhance & easy e-learning experience on Pathshala by quick search result to your teacher requirement near you. Schedule classes on demand and learn anytime, anywhere on Pathshala.</p>
          </div>
        </div>
        <div class="row r1_sa">
          <div class="col-md-12 col-md-12">
            <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/4.png" alt="" class="img-responive floating-image_sa right">
            <br><br><br>
            <h1>We're trusted by teachers</h1>
            <p>We create employment opportunities for all by providing digital presence to teachers, part timers, freelancer, hobby experts from across the country.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php $con = mysqli_connect("localhost", "root","Pathshala@1a", "pathshal_pathshala");
              $sql2 = "SELECT count(category_id) FROM `wl_categories` ";
              $result2 = mysqli_query($con, $sql2);
              $row2 = mysqli_fetch_row($result2);
              $str2 = implode($row2);
              ?>


  <section id="mu-latest-courses">
    <div class="container c1_sa">
      <div class="row r2_sa">
        <div class="col-lg-12 col-md-12">
          <div class="mu-latest-courses-area">
            <!-- Start Title -->
            <div class="mu-title">
              <h1 align=center>Explore <?php echo $str2 ?>+ Categories</h1>
            </div>
            <!-- End Title -->
            <!-- Start latest course content -->
            <div id="mu-latest-course-slide" class="mu-latest-courses-content">
              <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="mu-latest-course-single">
                  <figure class="mu-latest-course-img">
                    <a href="#"><img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/bcd.jpg" alt="img"></a>
                    <figcaption class="mu-latest-course-imgcaption">
                      <a href="<?php echo base_url(); ?>search?category=30&search=home">School Tutions K-12</a>
                    </figcaption>
                  </figure>
                  <div class="mu-latest-course-single-content">
                    <div class="row r3_sa">
                      <h4><a href="<?php echo base_url(); ?>search?category=30&classes=45&search=home">Class 12</a></h4>
				  <h4><a href="<?php echo base_url(); ?>search?category=30&classes=44&search=home">Class 11</a></h4>
				  <h4><a href="<?php echo base_url(); ?>search?category=30&classes=37&search=home">Class 10</a></h4>
				  <h4><a href="<?php echo base_url(); ?>search?category=30&classes=36&search=home">Class 9</a></h4>
				  <h4><a href="<?php echo base_url(); ?>search?category=30&classes=35&search=home">Class 8</a></h4>
				  <h4><a href="<?php echo base_url(); ?>search?category=30&classes=34&search=home">Class 7</a></h4>
				  <h4><a href="<?php echo base_url(); ?>search?category=30&classes=33&search=home">Class 6</a></h4>
				  <h4><a href="<?php echo base_url(); ?>search?category=30&classes=32&search=home">Class 5</a></h4>
				  <h4><a href="<?php echo base_url(); ?>search?category=30&classes=687&search=home">Class 4</a></h4>
				  <h4><a href="<?php echo base_url(); ?>search?category=30&classes=686search=home">Class 3</a></h4>
				  <h4><a href="<?php echo base_url(); ?>search?category=30&classes=685search=home">Class 2</a></h4>
                  <h4><a href="<?php echo base_url(); ?>search?category=30&classes=684&search=home">Class 1</a></h4>
                    </div>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet quod nisi quisquam modi dolore, dicta obcaecati architecto quidem ullam quia.</p>-->
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="mu-latest-course-single">
                  <figure class="mu-latest-course-img">
                    <a href="#"><img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/bcd.jpg" alt="img"></a>
                    <figcaption class="mu-latest-course-imgcaption">
                      <a href="<?php echo base_url(); ?>search?category=170&search=home">College/University</a>
                    </figcaption>
                  </figure>
                  <div class="mu-latest-course-single-content">
                    <div class="row r3_sa">
                      <h4><a href="<?php echo base_url(); ?>search?category=170&classes=172&search=home">Law (B.A LLB/ BBA LLB)</a></h4>
					 <h4><a href="<?php echo base_url(); ?>search?category=170&classes=171&search=home">B.Tech</a></h4>
					 <h4><a href="<?php echo base_url(); ?>search?category=170&classes=334&search=home">MBA</a></h4>
					 <h4><a href="<?php echo base_url(); ?>search?category=170&classes=173&search=home">B.com</a></h4>
                     <h4><a href="<?php echo base_url(); ?>search?category=170&classes=177&search=home">BBA</a></h4>
                     <h4><a href="<?php echo base_url(); ?>search?category=170&classes=174&search=home">BCA</a></h4>
                     <h4><a href="<?php echo base_url(); ?>search?category=170&classes=176&search=home">MCA</a></h4>
                    </div>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet quod nisi quisquam modi dolore, dicta obcaecati architecto quidem ullam quia.</p>-->

                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="mu-latest-course-single">
                  <figure class="mu-latest-course-img">
                    <a href="#"><img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/bcd.jpg" alt="img"></a>
                    <figcaption class="mu-latest-course-imgcaption">
                      <a href="<?php echo base_url(); ?>search?category=31&search=home">Competitive Coaching</a>
                    </figcaption>
                  </figure>
                  <div class="mu-latest-course-single-content">
                    <div class="row r3_sa">
                      <h4><a href="<?php echo base_url(); ?>search?category=31&classes=38&search=home">IIT-JEE Coaching</a></h4>
				   <h4><a href="<?php echo base_url(); ?>search?category=31&classes=46&search=home">NEET Coaching</a></h4>
				   <h4><a href="<?php echo base_url(); ?>search?category=31&classes=440&search=home">CS Coaching</a></h4>
				   <h4><a href="<?php echo base_url(); ?>search?category=31&classes=126&search=home">CLAT Coaching</a></h4>
				   <h4><a href="<?php echo base_url(); ?>search?category=31&classes=436&search=home">CA Coaching</a></h4>
				   <h4><a href="<?php echo base_url(); ?>search?category=31&classes=450&search=home">BANK PO Coaching</a></h4>
				   <h4><a href="<?php echo base_url(); ?>search?category=31&classes=451&search=home">AFCAT Coaching</a></h4>
                    <!--<h4><a href="<?php echo base_url(); ?>search?category=31&classes=39&search=home">AIIMS Coaching</a></h4>
                    <h4><a href="<?php echo base_url(); ?>search?category=31&classes=666&search=home">CAT Coaching</a></h4>
                    <h4><a href="<?php echo base_url(); ?>search?category=31&classes=667&search=home">CDS Coaching</a></h4>
                    <h4><a href="<?php echo base_url(); ?>search?category=31&classes=40&search=home">IAS Coaching</a></h4>
                    <h4><a href="<?php echo base_url(); ?>search?category=31&classes=476&search=home">IELTS Coaching</a></h4>
                    <h4><a href="<?php echo base_url(); ?>search?category=31&classes=41&search=home">IPS Coaching</a></h4>
                    <h4><a href="<?php echo base_url(); ?>search?category=31&classes=452&search=home">NDA Coaching</a></h4>
                    <h4><a href="<?php echo base_url(); ?>search?category=31&classes=668&search=home">SAT Coaching</a></h4>
                    <h4><a href="<?php echo base_url(); ?>search?category=31&classes=477&search=home">UGC NET Coaching</a></h4>-->
                    </div>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet quod nisi quisquam modi dolore, dicta obcaecati architecto quidem ullam quia.</p>-->

                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="mu-latest-course-single">
                  <figure class="mu-latest-course-img">
                    <a href="#"><img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/bcd.jpg" alt="img"></a>
                    <figcaption class="mu-latest-course-imgcaption">
                      <a href="<?php echo base_url(); ?>search?category=7&search=home">Hobbies</a>
                    </figcaption>
                  </figure>
                  <div class="mu-latest-course-single-content">
                    <div class="row r3_sa">
                      <h4><a href="<?php echo base_url(); ?>search?category=7&classes=629&search=home">Astronomy</a></h4>
					<h4><a href="<?php echo base_url(); ?>search?category=7&classes=49&search=home">Painting</a></h4>
                    <h4><a href="<?php echo base_url(); ?>search?category=7&classes=633&search=home">Acting & Drama</a></h4>
                    <!--<h4><a href="<?php echo base_url(); ?>search?category=7&classes=48&search=home">Dancing</a></h4>
                    <h4><a href="<?php echo base_url(); ?>search?category=7&classes=50&search=home">Instruments</a></h4>
                    <h4><a href="<?php echo base_url(); ?>search?category=7&classes=660&search=home">Rubic Cube</a></h4>
                    <h4><a href="<?php echo base_url(); ?>search?category=7&classes=47&search=home">Singing</a></h4>
                    <h4><a href="<?php echo base_url(); ?>search?category=7&classes=710&search=home">Virtual Camp</a></h4>-->
                    </div>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet quod nisi quisquam modi dolore, dicta obcaecati architecto quidem ullam quia.</p>-->

                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="mu-latest-course-single">
                  <figure class="mu-latest-course-img">
                    <a href="#"><img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/bcd.jpg" alt="img"></a>
                    <figcaption class="mu-latest-course-imgcaption">
                      <a href="<?php echo base_url(); ?>search?category=514&search=home">Professional Learning</a>
                    </figcaption>
                  </figure>
                  <div class="mu-latest-course-single-content">
                    <div class="row r3_sa">
                      <h4><a href="<?php echo base_url(); ?>search?category=514&classes=515&search=home">Professional Training</a></h4>
                      <h4><a href="<?php echo base_url(); ?>search?category=514&classes=542&search=home">Programming Learning</a></h4>
                    </div>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet quod nisi quisquam modi dolore, dicta obcaecati architecto quidem ullam quia.</p>-->

                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="mu-latest-course-single">
                  <figure class="mu-latest-course-img">
                    <a href="#"><img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/bcd.jpg" alt="img"></a>
                    <figcaption class="mu-latest-course-imgcaption">
                      <a href="<?php echo base_url(); ?>search?category=407&search=home">Languages</a>
                    </figcaption>
                  </figure>
                  <div class="mu-latest-course-single-content">
                    <div class="row r3_sa">
                      <h4><a href="<?php echo base_url(); ?>search?category=407&classes=444&search=home">English Language</a></h4>
				   <h4><a href="<?php echo base_url(); ?>search?category=407&classes=408&search=home">French Language</a></h4>
				   <h4><a href="<?php echo base_url(); ?>search?category=407&classes=409&search=home">German Language</a></h4>
				   <h4><a href="<?php echo base_url(); ?>search?category=407&classes=410&search=home">Spanish Language</a></h4>
		      <!--  <h4><a href="<?php echo base_url(); ?>search?category=407&classes=412&search=home">Arabic Language</a></h4>
                    <h4><a href="<?php echo base_url(); ?>search?category=407&classes=488&search=home">Bengali Language</a></h4>
                    <h4><a href="<?php echo base_url(); ?>search?category=407&classes=411&search=home">Chinese Language</a></h4>
                    <h4><a href="<?php echo base_url(); ?>search?category=407&classes=696&search=home">Italian Language</a></h4>
                    <h4><a href="<?php echo base_url(); ?>search?category=407&classes=486&search=home">Cannada Language</a></h4>
                    <h4><a href="<?php echo base_url(); ?>search?category=407&classes=487&search=home">Marathi Language</a></h4>
                    <h4><a href="<?php echo base_url(); ?>search?category=407&classes=489&search=home">Punjabi Language</a></h4>
                    <h4><a href="<?php echo base_url(); ?>search?category=407&classes=484&search=home">Tamil Language</a></h4>
                    <h4><a href="<?php echo base_url(); ?>search?category=407&classes=485&search=home">Telugu Language</a></h4>-->
                    </div>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet quod nisi quisquam modi dolore, dicta obcaecati architecto quidem ullam quia.</p>-->

                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="mu-latest-course-single">
                  <figure class="mu-latest-course-img">
                    <a href="#"><img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/bcd.jpg" alt="img"></a>
                    <figcaption class="mu-latest-course-imgcaption">
                      <a href="<?php echo base_url(); ?>search?category=12&search=home">Sports</a>
                    </figcaption>
                  </figure>
                  <div class="mu-latest-course-single-content">
                    <div class="row r3_sa">
                      <h4><a href="<?php echo base_url(); ?>search?category=12&classes=51&search=home">Indoor</a></h4>
                      <h4><a href="<?php echo base_url(); ?>search?category=12&classes=52&search=home">Outdoor</a></h4>
                    </div>

                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet quod nisi quisquam modi dolore, dicta obcaecati architecto quidem ullam quia.</p>-->

                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="mu-latest-course-single">
                  <figure class="mu-latest-course-img">
                    <a href="#"><img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/bcd.jpg" alt="img"></a>
                    <figcaption class="mu-latest-course-imgcaption">
                      <a href="<?php echo base_url(); ?>search?category=516&search=home">Voactional Learning</a>
                    </figcaption>
                  </figure>
                  <div class="mu-latest-course-single-content">
                    <div class="row r3_sa">
                      <h4><a href="<?php echo base_url(); ?>search?category=516&classes=702&search=home">Vedic Maths</a></h4>
				    <h4><a href="<?php echo base_url(); ?>search?category=516&classes=707&search=home">Hand Writing</a></h4>
					<h4><a href="<?php echo base_url(); ?>search?category=516&classes=523&search=home">Marketing/Advertisements</a></h4>
                    <h4><a href="<?php echo base_url(); ?>search?category=516&classes=525&search=home">Beauty Course</a></h4>
					<h4><a href="<?php echo base_url(); ?>search?category=516&classes=521&search=home">Fianance & Banking</a></h4>
                    <!--<h4><a href="<?php echo base_url(); ?>search?category=516&classes=524&search=home">Catering Management</a></h4>
                    <h4><a href="<?php echo base_url(); ?>search?category=516&classes=517&search=home">Content Writing</a></h4>
                    <h4><a href="<?php echo base_url(); ?>search?category=516&classes=520&search=home">Gym/Physical Education</a></h4>
                    <h4><a href="<?php echo base_url(); ?>search?category=516&classes=647&search=home">Personality Development</a></h4>
                    <h4><a href="<?php echo base_url(); ?>search?category=516&classes=522&search=home">Public Relations</a></h4>
                    <h4><a href="<?php echo base_url(); ?>search?category=516&classes=518&search=home">Animation</a></h4>-->
                    </div>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet quod nisi quisquam modi dolore, dicta obcaecati architecto quidem ullam quia.</p>-->

                  </div>
                </div>
              </div>
            </div>
            <!-- End latest course content -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End latest course section -->
  <section id="num"style=" background-color: #fff;">
    
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
      <div class="container count_sa">
        <div class="row text-center">
          <div class="col-md-3">
            <div class="counter">
              <?php $con = mysqli_connect("localhost", "root","Pathshala@1a", "pathshal_pathshala");
              $sql1 = "SELECT count(teacher_id) FROM `wl_teacher`";
              $result1 = mysqli_query($con, $sql1);
              $row1 = mysqli_fetch_row($result1);
              $str1 = implode($row1);
              ?>
              <h2 class="timer count-title count-number" data-to="<?php echo $str1 ?>" data-speed="1500"></h2>
              <p class="count-text ">Tutors</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="counter">
              <?php $con = mysqli_connect("localhost", "root","Pathshala@1a", "pathshal_pathshala");
              $sql2 = "SELECT count(category_id) FROM `wl_categories` ";
              $result2 = mysqli_query($con, $sql2);
              $row2 = mysqli_fetch_row($result2);
              $str2 = implode($row2);
              ?>
              <h2 class="timer count-title count-number" data-to="<?php echo $str2 ?>" data-speed="1500"></h2>
              <p class="count-text ">Categories</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="counter">
              <?php $con = mysqli_connect("localhost", "root","Pathshala@1a", "pathshal_newlms");
              $sql3 = "SELECT count(courses_id) FROM `tbl_courses` ";
              $result3 = mysqli_query($con, $sql3);
              $row3 = mysqli_fetch_row($result3);
              $str3 = implode($row3);
              ?>
              <h2 class="timer count-title count-number" data-to="<?php echo $str3 ?>" data-speed="1500"></h2>
              <p class="count-text ">Learning Content</p>
            </div>
          </div>

          <div class="col-md-3">
            <div class="counter">
              <?php $con = mysqli_connect("localhost", "root","Pathshala@1a", "pathshal_pathshala");
              $sql4 = "SELECT count(distinct city_id) FROM `wl_teacher_profile`";
              $result4 = mysqli_query($con, $sql4);
              $row4 = mysqli_fetch_row($result4);
              $str4 = implode($row4);
              ?>
              <h2 class="timer count-title count-number" data-to="<?php echo $str4 ?>" data-speed="1500"></h2>
              <p class="count-text ">Cities Reached</p>
            </div>

          </div>
        </div>
      </div>
      
  </section>

  <section id="states" style=" background-color: #0f75be;">
    <div class="description d_sa">
      <h1 style="color: #fff">The Top Teachers from pan India<br> Explore them now...</h1>
      <p style="color: #fff">Are you looking for the best tutors in India?<br>Don't waste further time. Let us know your<br>requirements and learn from the best teachers in India. Let's get started. </p>
    </div>
    <div class="s2_sa">

      <div class="card c2_sa">
        <div class="card-image ci_sa">
          <a href="#">
            <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/newdelhi.jpg" alt="img">
          </a>
        </div>
        <div class="card-description cd_sa">
          <h3>New Delhi</h3>
          <?php
          $sql1 = "SELECT count(teacher_id) FROM `wl_teacher_profile` where state_id='10'";
          $result1 = mysqli_query($con, $sql1);
          $row1 = mysqli_fetch_row($result1);
          $str1 = implode($row1);
          ?>
          <h3><?php echo $str1 ?></h3>
          <a href="<?php echo base_url(); ?>search?state=10&search=home">Search Now</a>
        </div>
      </div>
      <div class="card c2_sa">
        <div class="card-image ci_sa">
          <a href="#">
            <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/kolkata.jpg" alt="img">
          </a>
        </div>
        <div class="card-description cd_sa">
          <h3>West Bengal</h3>
          <?php
          $sql2 = "SELECT count(teacher_id) FROM `wl_teacher_profile` where state_id='41'";
          $result2 = mysqli_query($con, $sql2);
          $row2 = mysqli_fetch_row($result2);
          $str2 = implode($row2);
          ?>
          <h3><?php echo $str2 ?></h3>
          <a href="<?php echo base_url(); ?>search?state=41&search=home">Search Now</a>
        </div>
      </div>


      <div class="card c2_sa">
        <div class="card-image ci_sa">
          <a href="#">
            <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/uttarpradesh.jpg" alt="img">
          </a>
        </div>
        <div class="card-description cd_sa">
          <h3>Uttar Pradesh</h3>
          <?php
          $sql3 = "SELECT count(teacher_id) FROM `wl_teacher_profile` where state_id='38'";
          $result3 = mysqli_query($con, $sql3);
          $row3 = mysqli_fetch_row($result3);
          $str3 = implode($row3);
          ?>
          <h3><?php echo $str3 ?></h3>
          <a href="<?php echo base_url(); ?>search?state=38&search=home">Search Now</a>
        </div>
      </div>
      <div class="card c2_sa">
        <div class="card-image ci_sa">
          <a href="#">
            <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/karnataka.jpg" alt="img">
          </a>
        </div>
        <div class="card-description cd_sa">
          <h3>Karnataka</h3>
          <?php
          $sql4 = "SELECT count(teacher_id) FROM `wl_teacher_profile` where state_id='17'";
          $result4 = mysqli_query($con, $sql4);
          $row4 = mysqli_fetch_row($result4);
          $str4 = implode($row4);
          ?>
          <h3><?php echo $str4 ?></h3>
          <a href="<?php echo base_url(); ?>search?state=17&search=home">Search Now</a>
        </div>
      </div>
    </div>
  </section>


  <section id="states1" style=" background-color: #0f75be;">


    <div class="row-states">

      <div class="card c3_sa">
        <div class="card-image cii_sa">
          <a href="#">
            <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/rajasthan.jpg" alt="img">
          </a>
        </div>
        <div class="card-description cdd_sa">
          <h3>Rajasthan</h3>
          <?php
          $sql5 = "SELECT count(teacher_id) FROM `wl_teacher_profile` where state_id='33'";
          $result5 = mysqli_query($con, $sql5);
          $row5 = mysqli_fetch_row($result5);
          $str5 = implode($row5);
          ?>
          <h3><?php echo $str5 ?></h3>
          <a href="<?php echo base_url(); ?>search?state=33&search=home">Search Now</a>
        </div>
      </div>
      <div class="card c3_sa">
        <div class="card-image cii_sa">
          <a href="#">
            <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/maharashtra.jpg" alt="img">
          </a>
        </div>
        <div class="card-description cdd_sa">
          <h3>Maharashtra</h3>
          <?php
          $sql6 = "SELECT count(teacher_id) FROM `wl_teacher_profile` where state_id='22'";
          $result6 = mysqli_query($con, $sql6);
          $row6 = mysqli_fetch_row($result6);
          $str6 = implode($row6);
          ?>
          <h3><?php echo $str6 ?></h3>
          <a href="<?php echo base_url(); ?>search?state=22&search=home">Search Now</a>
        </div>
      </div>


      <div class="card c3_sa">
        <div class="card-image cii_sa">
          <a href="#">
            <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/punjab.jpg" alt="img">
          </a>
        </div>
        <div class="card-description cdd_sa">
          <h3>Punjab</h3>
          <?php
          $sql7 = "SELECT count(teacher_id) FROM `wl_teacher_profile` where state_id='32'";
          $result7 = mysqli_query($con, $sql7);
          $row7 = mysqli_fetch_row($result7);
          $str7 = implode($row7);
          ?>
          <h3><?php echo $str7 ?></h3>
          <a href="<?php echo base_url(); ?>search?state=32&search=home">Search Now</a>
        </div>
      </div>
      <div class="card c3_sa">
        <div class="card-image cii_sa">
          <a href="#">
            <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/telangana.jpg" alt="img">
          </a>
        </div>
        <div class="card-description cdd_sa">
          <h3>Telangana</h3>
          <?php
          $sql8 = "SELECT count(teacher_id) FROM `wl_teacher_profile` where state_id='36'";
          $result8 = mysqli_query($con, $sql8);
          $row8 = mysqli_fetch_row($result8);
          $str8 = implode($row8);
          ?>
          <h3><?php echo $str8 ?></h3>
          <a href="<?php echo base_url(); ?>search?state=36&search=home">Search Now</a>
        </div>
      </div>
    </div>
  </section>
  <!--
  <section id="educators">
  <div class="d-flex flex-row courseMain mb-3">
  <? php // $con=mysqli_connect("localhost","root","","pathshal_pathshala");
  ?>
		<?php

    //if(is_array($teacher) && !empty($teacher)){
    // foreach($teacher as $key_fea=>$val_tea){
    ?>
		
		<div class="d-flex flex-column coursePage shadow p-2 m-2">
		<a href=""><img class="courseThumbnail mb-2 ml-1" src="<?php //echo get_image('teacher',$val_tea['picture'],200,257,'AR');
                                                            ?>" alt=""></a>
	
		<div style="height:50px;">
		<h4 class="courseHeading"><a href="">abc</a></h4>
		</div>
		<div style="height:25px;">
		<p class="courseInstructor"><a href="">abcd</a></p>
		</div>
		<div style="height:35px;">
		<p class="starRating"><span class="starCount">4.6 <span >
		  <? php // for ($x = 1; $x <= 5; $x++) {
      ?>
                <i class="fa fa-star <?php //if($x > $rating){echo "-o";}
                                      ?> starcolor"></i>
              <?php //}
              ?> 
                </span></span> (42998)</p>
	    </div>
	
		</div>
    <? php // }}
    ?> 
		</div>

  </section>--->
  <!---

  <section id="mu-testimonial">
    <div class="container c4_sa">
      <div class="row r4_sa">
        <div class="col-md-12">
          <div class="mu-testimonial-area">
            <div id="mu-testimonial-slide" class="mu-testimonial-content" style="width: 100%;">
              <!-- start testimonial single item --
              <div class="mu-testimonial-item">
                <div class="mu-testimonial-img">
                  <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/a.png" alt="img">
                </div>
                <div class="mu-testimonial-quote">
                  <blockquote>
                    <p>Verified and Approved Tutors</p>
                  </blockquote>
                </div>
              </div>
              <div class="mu-testimonial-item">
                <div class="mu-testimonial-img">
                  <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/a.png" alt="img">
                </div>
                <div class="mu-testimonial-quote">
                  <blockquote>
                    <p>Compare and choose the suited Tutor</p>
                  </blockquote>
                </div>
              </div>
              <div class="mu-testimonial-item">
                <div class="mu-testimonial-img">
                  <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/a.png" alt="img">
                </div>
                <div class="mu-testimonial-quote">
                  <blockquote>
                    <p>Perfect Tutor to your Requirement</p>
                  </blockquote>
                </div>
              </div>
              <div class="mu-testimonial-item">
                <div class="mu-testimonial-img">
                  <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/a.png" alt="img">
                </div>
                <div class="mu-testimonial-quote">
                  <blockquote>
                    <p>Search the best coaching institute near you</p>
                  </blockquote>
                </div>
              </div>
              <div class="mu-testimonial-item">
                <div class="mu-testimonial-img">
                  <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/a.png" alt="img">
                </div>
                <div class="mu-testimonial-quote">
                  <blockquote>
                    <p>Flexible timing that suits you the best</p>
                  </blockquote>
                </div>
              </div>
              <div class="mu-testimonial-item">
                <div class="mu-testimonial-img">
                  <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/a.png" alt="img">
                </div>
                <div class="mu-testimonial-quote">
                  <blockquote>
                    <p>Online Tutors from PAN India</p>
                  </blockquote>
                </div>
              </div>
              <div class="mu-testimonial-item">
                <div class="mu-testimonial-img">
                  <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/a.png" alt="img">
                </div>
                <div class="mu-testimonial-quote">
                  <blockquote>
                    <p>Online and Offline Tutions</p>
                  </blockquote>
                </div>
              </div>
              <div class="mu-testimonial-item">
                <div class="mu-testimonial-img">
                  <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/a.png" alt="img">
                </div>
                <div class="mu-testimonial-quote">
                  <blockquote>
                    <p>Affordable Tutions</p>
                  </blockquote>
                </div>
              </div>
              <div class="mu-testimonial-item">
                <div class="mu-testimonial-img">
                  <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/a.png" alt="img">
                </div>
                <div class="mu-testimonial-quote">
                  <blockquote>
                    <p>Content from Renowned Tutor/Institue</p>
                  </blockquote>
                </div>
              </div>
              <div class="mu-testimonial-item">
                <div class="mu-testimonial-img">
                  <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/a.png" alt="img">
                </div>
                <div class="mu-testimonial-quote">
                  <blockquote>
                    <p>Tailor-Made content for all Grade students</p>
                  </blockquote>
                </div>
              </div>
              <div class="mu-testimonial-item">
                <div class="mu-testimonial-img">
                  <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/a.png" alt="img">
                </div>
                <div class="mu-testimonial-quote">
                  <blockquote>
                    <p>Compare on the basis of Ratings & Reviews</p>
                  </blockquote>
                </div>
              </div>
              <div class="mu-testimonial-item">
                <div class="mu-testimonial-img">
                  <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/a.png" alt="img">
                </div>
                <div class="mu-testimonial-quote">
                  <blockquote>
                    <p>Affordable Quality Education to All</p>
                  </blockquote>
                </div>
              </div>
              <div class="mu-testimonial-item">
                <div class="mu-testimonial-img">
                  <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/a.png" alt="img">
                </div>
                <div class="mu-testimonial-quote">
                  <blockquote>
                    <p>Video Content for Better Learning</p>
                  </blockquote>
                </div>
              </div>
              <div class="mu-testimonial-item">
                <div class="mu-testimonial-img">
                  <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/a.png" alt="img">
                </div>
                <div class="mu-testimonial-quote">
                  <blockquote>
                    <p>Online Assessments, Quizzes & Tests for regular growth</p>
                  </blockquote>
                </div>
              </div>
              <!-- end testimonial single item --
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>-->
  <section id="partners">
  <h1 align="center" style="color:0f75be"> Our Verticals </h1>
    <div class="wrapper wr_sa">
	
  
      <div class="box b_sa">
        
      <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/Search-course-logo.png" alt="img" class="i_sa">
      <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/acadex-logo.png" alt="img" class="i_sa">
    </div>
  <!--  <div class="hand">
    <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/hand.png" alt="img" class="hand_sa" id="optionalstuff" style="width: 350px; margin: auto; display: block; margin-top: 90px; align-items: center;">
    </div>-->

      <div class="box b_sa">
     
      <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/Search-Tutor-logo.png" alt="img" class="i_sa">
      <img src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/EdMeetUp-Logon.png" alt="img" class="i_sa">
    </div>
    </div>


  </section>
</body>

</html>
<!-- Slick slider -->
<script type="text/javascript" src="<?php echo base_url(); ?>/modules/home/views/slick.js"></script>
<!-- Custom js -->
<script src="<?php echo base_url(); ?>/modules/home/views/custom.js"></script>
<?php $this->load->view('bottom_applicationsakshi');
?>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap');

  header {
    height: 100px;
    width: 100%;

  }

  body {
    font-family: 'Ubuntu', sans-serif;
  }

  .newsec_sa {
    margin-top: 70px;
  }

  .row_sa {
    display: flex;
  }

  #partners .wr_sa {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    grid-gap: 20px;
    width: 100%;
  }

  #partners .wr_sa .b_sa {
    padding: 5px;
    margin: auto;
    place-content: center;
  }

  #partners .wr_sa .b_sa img {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 400px;
    height: 300px;
    border-radius: 20px;

  }
  
  .counter {
    background-color:;
    padding: 20px 0;
    border-radius: 5px;
}

.count-title {
    font-size: 40px;
    font-weight: normal;
    margin-top: 10px;
    margin-bottom: 0;
    text-align: center;
	color: #0f75be;
}

.count-text {
    font-size: 13px;
    font-weight: normal;
    margin-top: 10px;
    margin-bottom: 0;
    text-align: center;
	color: #0f75be;
}

.fa-2x {
    margin: 0 auto;
    float: none;
    display: table;
    color: #4ad1e5;
}


  /*==================
 testimonial SECTION
====================*/

  #mu-testimonial {
    background-attachment: fixed;
    
    background-position: center center;
    background-size: cover;
    display: inline;
    background-color: #DBE6FD;
    padding: 100px 0;
    position: relative;
    width: 100%;
    z-index: 10;
  }

  #mu-testimonial:after {

    clear: both;
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    right: 0;
  }

  #mu-testimonial .mu-testimonial-area {
    display: inline;

    padding: 0 150px;
    position: relative;
    width: 100%;
    z-index: 99;
  }

  #mu-testimonial .mu-testimonial-area .mu-testimonial-content {
    display: inline;
    float: left;
    width: 100%;
  }

  #mu-testimonial .mu-testimonial-area .mu-testimonial-content .mu-testimonial-item {

    display: flex;
    float: left;
    width: 100%;
    outline: none;
  }

  #mu-testimonial .mu-testimonial-area .mu-testimonial-content .mu-testimonial-item .mu-testimonial-img {
    display: inline;
    width: 30%;
    float: left;
  }

  #mu-testimonial .mu-testimonial-area .mu-testimonial-content .mu-testimonial-item .mu-testimonial-quote {
    width: 60%;
    background-color: #333;
    border-radius: 4px;
    display: inline;
    float: right;
    padding: 60px 30px;
    margin-left: 10px;
    margin-right: 10px;
    height: 330px;


  }

  #mu-testimonial .mu-testimonial-area .mu-testimonial-content .mu-testimonial-item .mu-testimonial-quote blockquote {
    border: none;
    text-align: center;
    margin-bottom: 0;
    position: relative;
  }

  #mu-testimonial .mu-testimonial-area .mu-testimonial-content .mu-testimonial-item .mu-testimonial-quote blockquote:before {
    content: '\f10d';
    color: #fff;
    font-family: fontAwesome;
    font-style: italic;
    left: 2%;
    position: absolute;
    top: 0;

  }

  #mu-testimonial .mu-testimonial-area .mu-testimonial-content .mu-testimonial-item .mu-testimonial-quote blockquote p {
    color: #fff;
    font-size: 16px;
    font-style: italic;
    letter-spacing: 0.5px;
    line-height: 1.8;
    margin-bottom: 0;
  }

  #mu-testimonial .mu-testimonial-area .mu-testimonial-content .mu-testimonial-item .mu-testimonial-img {
    display: block;
    float: left;
    width: 30%;

  }

  #mu-testimonial .mu-testimonial-area .mu-testimonial-content .mu-testimonial-item .mu-testimonial-img img {
    background-color: #555;
    width: 100%;
  }

  #mu-testimonial .mu-testimonial-area .mu-testimonial-content .mu-testimonial-item .mu-testimonial-info {
    display: inline;
    float: left;
    width: 100%;
    text-align: center;
  }

  #mu-testimonial .mu-testimonial-area .mu-testimonial-content .mu-testimonial-item .mu-testimonial-info h4 {
    color: #fff;
    font-size: 20px;
    margin-bottom: 0px;
  }

  #mu-testimonial .mu-testimonial-area .mu-testimonial-content .mu-testimonial-item .mu-testimonial-info span {
    font-size: 14px;
    letter-spacing: 0.3px;
  }

  #mu-testimonial .mu-testimonial-area .mu-testimonial-content .slick-dots li {
    background-color: #333;
    height: 8px;
    width: 20px;
  }

  #mu-testimonial .mu-testimonial-area .mu-testimonial-content .slick-dots .slick-active {
    background-color: whitesmoke;
  }

  #mu-testimonial .mu-testimonial-area .mu-testimonial-content .slick-dots li button {
    display: none;
  }

  @media (max-width: 768px) {


    #mu-testimonial .mu-testimonial-area {
      padding: 0 20px;
    }

    #mu-testimonial .mu-testimonial-area .mu-testimonial-content .mu-testimonial-item {
      flex-direction: column;
    }

    #mu-testimonial .mu-testimonial-area .mu-testimonial-content .mu-testimonial-item .mu-testimonial-quote {
      width: 100%;
      text-align: center;
      height: 300px;
    }

    #mu-testimonial .mu-testimonial-area .mu-testimonial-content .mu-testimonial-item .mu-testimonial-quote .mu-testimonial-img {

      text-align: center;
      height: 300px;
      width: 100%;
    }

    #mu-testimonial .mu-testimonial-area .mu-testimonial-content .mu-testimonial-item .mu-testimonial-quote blockquote::before {
      left: 0;
    }

  }

  }

  /*==================
 STATES SECTION SECTION
====================*/


  #states {
    width: 100%;
    margin: 10% padding: 0;
    box-sizing: border-box;
  }

  #states .d_sa {
    float: left;
    width: 50%;
  }

  #states .s2_sa {
    float: right;
    width: 40%;
    display: inline-block;
  }


  #states {
    margin-left: 0px;
    padding: 0;


    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;

  }

  #states .s2_sa .c2_sa {
    width: 180px;
    background-color: #f0f0f0;
    border-radius: 5px;
    box-shadow: 0 2px 4px #1b1b1b33;
    margin: 15px;
    transition: all 0.3s;
    display: inline-block;
  }

  #states .s2_sa .c2_sa .card-image {
    width: 100%;
    height: 100px;
    border-radius: 5px 5px 0 0;
  }

  #states .s2_sa .c2_sa .ci_sa img {
    width: 100%;
    max-width: 100%;
    height: 100px;
    border-radius: 5px 5px 0 0;
    transition: all 0.3s;
  }

  #states .s2_sa .c2_sa .cd_sa {
    width: 100%;

    background-color: #ffffff;
    border-radius: 0 0 5px 5px;
    padding: 25px;
  }

  #states .s2_sa .c2_sa .cd_sa h3 {
    color: #222222;
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 6px;
	text-align: center;
  }

  #states .s2_sa .c2_sa .cd_sa p {
    color: #89ba16;
    font-size: 14px;
    margin-bottom: 16px;
	
  }

  #states .s2_sa .c2_sa .cd_sa a {
    color: #0f75be;
    font-weight: 500;
    text-decoration: none;
    text-transform: uppercase;
    text-align: center;
  }

  #states .s2_sa .card:hover {
    transform: scale(1.03);
    box-shadow: 0 10px 30px -5px rgba(10, 16, 34, 0.2);
  }

  #states .s2_sa .c2_sa .ci_sa img:hover {
    opacity: 0.8;
  }



  #states1 {
    display: flex;
    align-items: center;
    flex-wrap: wrap;

  }

  #states1 .row-states{
    margin: auto;
    padding-left: 30px;
    padding-right: 30px;
  }

  #states1 .row-states .c3_sa {
    margin-left: 30px;
    
  }

  #states1 .c3_sa {
    width: 180px;

    background-color: #f0f0f0;
    border-radius: 5px;
    box-shadow: 0 2px 4px #1b1b1b33;
    margin: 15px;
    transition: all 0.3s;
    display: inline-block;
  }

  #states1 .c3_sa .cii_sa {
    width: 100%;
    height: 100px;
    border-radius: 5px 5px 0 0;
  }

  #states1 .c3_sa .cii_sa img {
    width: 100%;
    max-width: 100%;
    height: 100px;
    border-radius: 5px 5px 0 0;
    transition: all 0.3s;
  }

  #states1 .c3_sa .cdd_sa {
    width: 100%;
    height: auto;
    background-color: #ffffff;
    border-radius: 0 0 5px 5px;
    padding: 25px;
	align-items: center;
  }

  #states1 .c3_sa .cdd_sa h3 {
    color: #222222;
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 6px;
	text-align: center;
  }

  #states1 .c3_sa .cdd_sa p {
    color: #89ba16;
    font-size: 14px;
    margin-bottom: 16px;
  }

  #states1 .c3_sa .cdd_sa a {
    color: #0f75be;
    font-weight: 500;
    text-decoration: none;
    text-transform: uppercase;
	align-items: center;
  }

  #states1 .c3_sa:hover {
    transform: scale(1.03);
    box-shadow: 0 10px 30px -5px rgba(10, 16, 34, 0.2);
  }

  #states1 .c3_sa .cii_sa img:hover {
    opacity: 0.8;
  }

  @media (max-width: 768px) {
    #intro_sa .img-fluid {
      float: none;
      width: 100%;
    }

    #intro_sa .content_sa {
      float: none;
      width: 100%;
    }

    #states .d_sa {
      float: none;
      width: 100%;
    }

    #states .s2_sa {
      float: none;
      width: 100%;
    }

    #states1 .row-states .c3_sa {
      margin-left: 0px;
    }
  }

  /*==================
 LATEST COURSES SECTION
====================*/
  #mu-latest-courses {
    background-color: #0f75be;
    display: inline;
    float: left;
    padding: 100px 0;
    width: 100%;


  }

  #mu-latest-courses-area {
    display: inline;
    float: left;
    width: 100%;
  }

  #mu-latest-courses .mu-latest-courses-area .mu-title h1 {
    color: #fff;
  }

  #mu-latest-courses .mu-latest-courses-area .mu-title p {
    color: #fff;
  }

  #mu-latest-courses .mu-latest-courses-area .mu-latest-courses-content {
    display: inline;
    float: left;
    margin-top: 50px;
    width: 100%;
  }

  #mu-latest-courses .mu-latest-courses-area .mu-latest-courses-content .slick-slide {
    outline: none;
  }

  #mu-latest-courses .mu-latest-courses-area .mu-latest-courses-content .slick-dots li {
    background-color: #333;
    border-radius: 4px;
    height: 8px;
    width: 20px;
  }

  #mu-latest-courses .mu-latest-courses-area .mu-latest-courses-content .slick-dots li button {
    display: none;
  }

  .mu-latest-course-single {
    background-color: #fff;
    display: inline;
    float: left;
    width: 100%;
    height: 750px;
  }

  .mu-latest-course-single .mu-latest-course-img {
    display: inline;
    float: left;
    width: 100%;
  }

  .mu-latest-course-single .mu-latest-course-img a {
    display: block;
  }

  .mu-latest-course-single .mu-latest-course-img a img {
    width: 100%;
  }

  .mu-latest-course-single .mu-latest-course-img .mu-latest-course-imgcaption {
    background-color: #f8f8f8;
    display: inline;
    float: left;
    padding: 10px 15px;
    width: 100%;
  }

  .mu-latest-course-single .mu-latest-course-img .mu-latest-course-imgcaption a {
    display: inline-block;
    float: left;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
    -ms-transition: all 0.5s;
    -o-transition: all 0.5s;
    transition: all 0.5s;
  }

  .mu-latest-course-single .mu-latest-course-img .mu-latest-course-imgcaption span {
    float: right;
  }

  .mu-latest-course-single .mu-latest-course-img .mu-latest-course-imgcaption span i {
    margin-right: 5px;
  }

  .mu-latest-course-single .mu-latest-course-single-content {
    display: inline;
    float: left;
    width: 100%;
    padding: 15px;
  }

  .mu-latest-course-single .mu-latest-course-single-content h4 {
    color: #333;
    font-size: 14px;
    letter-spacing: 0.3px;

  }

  .mu-latest-course-single .mu-latest-course-single-content h4 a {
    line-height: 2;
    border-radius: 20px;
    color: white;
    background: #0f75be;
    font-weight: bold;
    letter-spacing: 2px;
    padding: 10px 20px 10px 20px;
	


    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
    -ms-transition: all 0.5s;
    -o-transition: all 0.5s;
    transition: all 0.5s;
  }

  .mu-latest-course-single .mu-latest-course-single-content p {
    font-size: 14px;
    letter-spacing: 0.3px;
    line-height: 1.7;
  }

  .mu-latest-course-single .mu-latest-course-single-content {
    border-top: 1px solid #ccc;
    display: inline;
    float: left;
    margin-top: 15px;
    padding-top: 15px;
    width: 100%;
  }

  #mu-latest-courses .mu-latest-courses-area .mu-latest-courses-content .slick-dots .slick-active {
    background-color: whitesmoke;
  }

  .mu-latest-course-single .mu-latest-course-single-content {
    display: inline-block;
    float: left;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
    -ms-transition: all 0.5s;
    -o-transition: all 0.5s;
    transition: all 0.5s;
  }

  .mu-latest-course-single .mu-latest-course-single-content,
  .mu-latest-course-single .mu-latest-course-single-content {
    color: #333;
  }

  .mu-latest-course-single .mu-latest-course-single-content {
    display: inline-block;
    float: right;
  }

  @media (max-width: 767px) {


    #mu-latest-courses .mu-latest-courses-area .mu-latest-courses-content .mu-latest-course-single .mu-latest-course-img .mu-latest-course-imgcaption a {
      font-size: 14px;
    }

    #mu-latest-courses .mu-latest-courses-area .mu-latest-courses-content .mu-latest-course-single .mu-latest-course-img .mu-latest-course-imgcaption span {
      font-size: 14px;
    }

    .row_sa {
      flex-direction: column-reverse;
      align-items: center;
    }

    .content_sa {
      align-items: center;
    }

    .or_sa img {
      height: 350px;
      width: 300px;
      align-items: center;
    }

    #mu-course-content {
      padding: 50px 0;
    }
  }

  #services {

  }

  #services p {
    text-align: justify;
    font-size: 15px;
    letter-spacing: 1px;
    font-family: 'Ubuntu', sans-serif;
  }

  #services .blue-btn {
    float: right;
    border-radius: 5px;
    color: white;
    background-color: #185ADB;
    font-size: 1.8rem;
    font-weight: bold;
    width: 140px;
    height: 50px;
    margin-top: -90px;
    margin-right: 40px;
  }

  #services .description-container_sa {
    max-width: 100%;
    margin: 20px auto 10px;

  }

  #services .description-container_sa p {

    font-size: 15px;
    letter-spacing: 1px;
    font-family: 'Ubuntu', sans-serif;
  }

  #services .description-container_sa .floating-image_sa {
    max-width: 400px;
  }

  #services .description-container_sa .floating-image_sa.right {
    float: right;
    margin-left: 35px;
    margin-bottom: 10px;
  }

  #services .description-container_sa .floating-image_sa.left {
    float: left;
    margin-right: 35px;
    margin-bottom: 10px;
  }


  .form-control-new_sa {
    border-radius: 20px;
    border: 1px solid black;
    background-color: #fff;
    color: #0f75be;
    width: 80%;
    margin-left: 30px;
    height: 50px;
    font-size: 1.6rem;
    padding: 7px;

  }

  .row button {
    border-radius: 10px;
    width: 35px;
    height: 40px;
    background: #fff;
    color: black;
    font-size: 17px;
    border: 1px solid grey;
    cursor: pointer;
    align-items: center;
  }


  /*--------------------------------------------------------------
# Hero Section
--------------------------------------------------------------*/
  @media screen and (max-width: 520px) {
    .btn-green-color {
      padding: 0px 0px 0px 0px;
	  margin-bottom:10px;
      width: 100%;
    }
    .reg_teacher{
    
    }

 
 .r1_sa img{
	 width: 300px;
	 height: 200px;
 }

.r10_sa {
	margin-bottom: 20px;
	
}
	
  }
  
 

  .no-gutters{
    height: auto;
  }
  #hero_sa {
    margin-top: 50px;
    width: 100%;
    position: relative;
  }

  #hero_sa .cf_sa {
    padding-top: 10px;
    padding-bottom: 10px;
  }


  #hero_sa .cf_sa .r_sa {
    width: 100%;
    display: inline-block;
  }
 .btn-green-color{

    border-radius:20px;
  color:white;
    background: rgb(250,0,0);
    font-weight: bold;
    letter-spacing: 2px;
    padding: 10px 20px 10px 20px;
  }
  

  #hero_sa .cf_sa #hero_sa .cf_sa h1 {
    margin: 0;
    font-size: 48px;
    font-weight: 700;
    line-height: 56px;
    color: #000000;
  }

  #hero_sa h2 {
    color: #eee;
    margin: 10px 0 0 0;
    font-size: 24px;
  }

  #hero_sa .btn-get-started {
    font-family: "Raleway", sans-serif;
    font-weight: 500;
    font-size: 15px;
    letter-spacing: 1px;
    display: inline-block;
    padding: 10px 35px;
    border-radius: 50px;
    transition: 0.5s;
    margin-top: 30px;
    border: 2px solid #fff;
    color: #fff;
  }

  #hero_sa .btn-get-started:hover {
    background: #0f75bc;
    border: 2px solid #5fcf80;
  }
  
  #partners .wr_sa .b_sa img {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 300px;
    height: 200px;
    border-radius: 20px;

  }

 

  @media (max-width: 768px) {
    #services .blue-btn {
      float: none;
      margin-top: 0px;
      text-align: center;
    }

  }



  /*--------------------------------------------------------------
# intro_sa
--------------------------------------------------------------*/
  .intro_sa .content_sa h3 {
    font-weight: 600;
    font-size: 26px;
  }

  .intro_sa .content_sa h3 {
    font-weight: 60;
    font-size: 16px;
  }

  .intro_sa .content_sa ul {
    list-style: none;
    padding: 0;
  }

  .intro_sa .content_sa ul li {
    padding-bottom: 0px;
  }

  .intro_sa .content_sa ul i {
    font-size: 20px;
    padding-right: 4px;
    color: #5fcf80;
  }

  .intro_sa .content_sa .learn-more-btn {
    background: #5fcf80;
    color: #fff;
    border-radius: 50px;
    padding: 8px 25px 9px 25px;
    white-space: nowrap;
    transition: 0.3s;
    font-size: 14px;
    display: inline-block;
  }

  .intro_sa .content_sa .learn-more-btn:hover {
    background: #0f75bc;
    color: #fff;
  }

  @media (max-width: 768px) {
    .intro_sa .content_sa .learn-more-btn {
      margin: 0 48px 0 0;
      padding: 6px 18px;
    }
  }

  #form-control {
    margin-right: -200px;
  }

  #num {
    margin-top: 900px;
    background-color: #FF616D;
  }

  #num .nu {
    width: 100%;
    height: 100px;

  }
</style>
<script type="text/javascript">
  $(document).ready(function() {
    $('#state').on('change', function() {
      var stateID = $(this).val();
      $("#wait").css("display", "block");
      //searchFilter();
      if (stateID) {
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>search/selectstate',
          data: 'state_id=' + stateID,
          success: function(html) {
            $('#city').html(html);
            $("#wait").css("display", "none");
          }
        });
      } else {
        // $('#state').html('<option value="">Select country first</option>');
        $('#city').html('<option value="">Select state first</option>');
      }
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#category').on('change', function() {
      var categoryID = $(this).val();
      $("#subject").val("");
      $("#wait").css("display", "block");
      //searchFilter();
      if (categoryID) {
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>search/getSubcat',
          data: 'category_id=' + categoryID,
          success: function(html) {
            $('#classes').html(html);
            $("#wait").css("display", "none");
          }
        });
      } else {
        $('#city').html('<option value="">Select Category</option>');
      }
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#classes').on('change', function() {
      var classesID = $(this).val();
      $("#subject").val("");
      $("#wait").css("display", "block");
      //searchFilter();
      if (classesID) {
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>search/getSubcat',
          data: 'category_id=' + classesID,
          success: function(html) {
            $('#subject').html(html);
            $("#wait").css("display", "none");
          }
        });
      } else {
        $('#city').html('<option value="">Select Category</option>');
      }
    });
  });
</script>
<script>
(function ($) {
	$.fn.countTo = function (options) {
		options = options || {};
		
		return $(this).each(function () {
			// set options for current element
			var settings = $.extend({}, $.fn.countTo.defaults, {
				from:            $(this).data('from'),
				to:              $(this).data('to'),
				speed:           $(this).data('speed'),
				refreshInterval: $(this).data('refresh-interval'),
				decimals:        $(this).data('decimals')
			}, options);
			
			// how many times to update the value, and how much to increment the value on each update
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
				increment = (settings.to - settings.from) / loops;
			
			// references & variables that will change with each update
			var self = this,
				$self = $(this),
				loopCount = 0,
				value = settings.from,
				data = $self.data('countTo') || {};
			
			$self.data('countTo', data);
			
			// if an existing interval can be found, clear it first
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);
			
			// initialize the element with the starting value
			render(value);
			
			function updateTimer() {
				value += increment;
				loopCount++;
				
				render(value);
				
				if (typeof(settings.onUpdate) == 'function') {
					settings.onUpdate.call(self, value);
				}
				
				if (loopCount >= loops) {
					// remove the interval
					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;
					
					if (typeof(settings.onComplete) == 'function') {
						settings.onComplete.call(self, value);
					}
				}
			}
			
			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.html(formattedValue);
			}
		});
	};
	
	$.fn.countTo.defaults = {
		from: 0,               // the number the element should start at
		to: 0,                 // the number the element should end at
		speed: 1000,           // how long it should take to count between the target numbers
		refreshInterval: 100,  // how often the element should be updated
		decimals: 0,           // the number of decimal places to show
		formatter: formatter,  // handler for formatting the value before rendering
		onUpdate: null,        // callback method for every time the element is updated
		onComplete: null       // callback method for when the element finishes updating
	};
	
	function formatter(value, settings) {
		return value.toFixed(settings.decimals);
	}
}(jQuery));

jQuery(function ($) {
  // custom formatting example
  $('.count-number').data('countToOptions', {
	formatter: function (value, options) {
	  return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
	}
  });
  
  // start all the timers
  $('.timer').each(count);  
  
  function count(options) {
	var $this = $(this);
	options = $.extend({}, options || {}, $this.data('countToOptions') || {});
	$this.countTo(options);
  }
});
</script>
