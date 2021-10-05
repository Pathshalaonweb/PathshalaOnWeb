<?php $this->load->view('top_application'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
 <!-- Vendor CSS Files -->
  <link href="<?php echo base_url(); ?>softland/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>softland/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>softland/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>softland/assets/vendor/line-awesome/css/line-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>softland/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url(); ?>softland/assets/css/style.css" rel="stylesheet">
  </head>

<body>
<br>
<br>
<h3 class="section-heading" align="center">Register as Educator/Institute/Counsellor</h3>
<div class="container">
    <section class="section">

<!--      <div class="container">
<!--        <div class="row justify-content-center text-center mb-5" data-aos="fade">
<!--          <div class="col-md-6 mb-2">
<!--            <img src="<?php echo base_url(); ?>softland/assets/img/undraw_svg_1.svg" alt="Image" class="img-fluid">
<!--          </div>
<!--        </div>-->
       <div class="row">
          <div class="col-md-3">
            <div class="step">
              <span class="number">01</span>
              <h4>Sign Up</h4>
              <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, optio.</p> -->
            </div>
          </div>
          <div class="col-md-3">
            <div class="step">
              <span class="number">02</span>
              <h4>Create Profile</h4>
             <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, optio.</p>-->
            </div>
          </div>
		  <div class="col-md-3">
            <div class="step">
              <span class="number">03</span>
              <h4>List Yourself</h4>
             <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, optio.</p>-->
            </div>
          </div>
          <div class="col-md-3">
            <div class="step">
              <span class="number">04</span>
              <h4>Join the Club</h4>
            <!--  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, optio.</p>-->
            </div>
          </div>
        </div>

    </section>

   </div>


 <!-- Add on Start Section -->
  <!--  <section class="section pb-0">
	        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-lg-5 offset-lg-1 mb-40">
                    <img src="<?php echo base_url();?>uploaded_files/userfiles/images/using-software.png" class="img-fluid" alt="Using Software" />
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

    <!-- Add on Start Section -->
   <!-- <section class="section pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-40">
                    <img src="<?php echo base_url();?>uploaded_files/userfiles/images/businessman-with-laptop.png" class="img-fluid" alt="Business Man with Laptop" />
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
    </section>-->
<div class="login-register-area pt-130 pb-130">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 col-md-12 ml-auto mr-auto">
        <div class="login-register-wrapper">
          <div class="login-register-tab-list nav"> <a class="active" data-toggle="tab" href="#lg2">
            <h2 class="section-heading" align="center">Register Here</h2>
            </a> </div>
          <div class="tab-content">
            <div id="lg2" class="tab-pane active">
              <div class="login-form-container">
                <div class="login-register-form">
                  <?php echo validation_message();?> <?php echo error_message(); ?>
      				 <?php echo form_open('teacher/register'); ?>
                     <select name="account_type">
                     	<option value="">Select account type</option>
                        <option value="0">Teacher</option>
                        <option value="1">Institute</option>
                     </select>
                     <?php echo form_error('account_type');?>
                     <input type="text" name="first_name" placeholder="Name*" value="<?php echo set_value('first_name'); ?>">
                     <?php echo form_error('first_name');?>
                     <input type="text" name="phone_number" placeholder="Phone*" value="<?php echo set_value('phone_number'); ?>"><?php echo form_error('phone_number');?>
                     <input type="text" name="user_name" placeholder="Email*" value="<?php echo set_value('user_name');?>">
                     <?php echo form_error('user_name');?>
                     <input type="password" name="password" placeholder="Password*">
                      <?php echo form_error('password');?>
                      <textarea type="text" name="message" placeholder="Message">Message
					  <?php echo set_value('message');?></textarea>
                      <?php echo form_error('message');?>
                     <input type="checkbox" name="terms_conditions" id="check"> <label for="check"> By signing up, you agree to our <a href="<?php echo base_url();?>pages/terms-and-conditions"><u>terms &amp; conditions</u></a> and <a href="<?php echo base_url();?>">privacy policy</a>.</label>
                      <?php echo form_error('terms_conditions');?>
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

 <!-- Add on Start Section -->
   <!-- <section class="section pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-3">
                    <h2 class="section__heading section__heading-center">We are build awesome market place of education</h2>
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

    <!-- Add on Start Section -->
   <!-- <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="section__column section__column-top--left">
                        <span class="icon icon-gift"></span>
                        <h4>All in one package</h4>
                        <p>
                            Unum liber commune in mel, ut pri tritani propriae menandri. Cum et magna porro intellegat.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="section__column section__column-top--left">
                        <span class="icon icon-paper-plane"></span>
                        <h4>Send Campaign</h4>
                        <p>
                            Unum liber commune in mel, ut pri tritani propriae menandri. Cum et magna porro intellegat.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="section__column section__column-top--left">
                        <span class="icon icon-cogs"></span>
                        <h4>Easy to use</h4>
                        <p>
                            Unum liber commune in mel, ut pri tritani propriae menandri. Cum et magna porro intellegat.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="section__column section__column-top--left">
                        <span class="icon icon-flask"></span>
                        <h4>New Technology</h4>
                        <p>
                            Unum liber commune in mel, ut pri tritani propriae menandri. Cum et magna porro intellegat.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="section__column section__column-top--left">
                        <span class="icon icon-tree"></span>
                        <h4>Branch system</h4>
                        <p>
                            Unum liber commune in mel, ut pri tritani propriae menandri. Cum et magna porro intellegat.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="section__column section__column-top--left">
                        <span class="icon icon-hard-disk"></span>
                        <h4>Large Storage</h4>
                        <p>
                            Unum liber commune in mel, ut pri tritani propriae menandri. Cum et magna porro intellegat.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="section__column section__column-top--left">
                        <span class="icon icon-book"></span>
                        <h4>Manual Guide</h4>
                        <p>
                            Unum liber commune in mel, ut pri tritani propriae menandri. Cum et magna porro intellegat.
                        </p>
                    </div>
                </div>
				
                <div class="col-lg-3">
                    <div class="section__column section__column-top--left">
                        <span class="icon icon-chart"></span>
                        <h4>Actual Report</h4>
                        <p>
                            Unum liber commune in mel, ut pri tritani propriae menandri. Cum et magna porro intellegat.
                        </p>
                    </div>
                </div>
            </div>
			<br>
<!--            <div class="row">
<!--                <div class="col-12 text-center">
<!--                        <a href="#" class="btn btn-primary btn-rounded">View More Features</a>
<!--                </div>
<!--            </div> -->
  <!--      </div>
    </section>
    <!-- End Section -->

	<!--<div class="col-lg-8">
                    <img src="<?php echo base_url();?>uploaded_files/userfiles/images/business-looking.png" class="img-fluid" alt="Business Looking" />
                </div>-->



<?php $this->load->view('bottom_application'); ?>
