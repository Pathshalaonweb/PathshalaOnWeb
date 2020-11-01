<?php $this->load->view('top_application'); ?>
<div class="login-register-area pt-130 pb-130">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 col-md-12 ml-auto mr-auto">
        <div class="login-register-wrapper">
          <div class="login-register-tab-list nav"> <a class="active" data-toggle="tab" href="#lg2">
            <h4>Register as Attendee for Upcoming AcadeX Session</h4>
            </a> </div>
          <div class="tab-content">
            <div id="lg2" class="tab-pane active">
              <div class="login-form-container">
                <div class="login-register-form"> 
				<?php echo validation_message();?> 
				<?php echo error_message(); ?> 
        <?php //echo form_open('users/register'); ?>
        <form action="<?php echo base_url(); ?>acadex/acadexRegister" method="post" accept-charset="utf-8" onsubmit="return validate()">
                  <input type="text" name="first_name" placeholder="Name" id="name" value="<?php echo set_value('first_name'); ?>">
                  <?php echo form_error('first_name');?>
                 <input type="number" name="phone_number" placeholder="Phone" id="phone" value="<?php echo set_value('phone_number'); ?>" min="5000000000" max="9999999999" step=1>
                  <?php echo form_error('phone_number');?>
                  <input type="email" name="user_name" placeholder="Email" id="email" value="<?php echo set_value('user_name');?>">
                  <input type="password" name="password" id="password" placeholder="Password" value="<?php echo set_value('password');?>">
                  <br>
                  <h4 style="font-family: 'Roboto', sans-serif; color: #1b68b5;">Upcoming Sessions</h4>
                  <select name="acadex[]" id="acadexDetails" multiple required>
                  <option value="" selected disabled>Please Select a Session</option>
                  <?php 
                  $db2 = $this->load->database('default', TRUE);
                  $sql="SELECT `name`, `id` FROM `wl_acadex` where `status`='1' AND `upcoming`='1' ORDER BY `time`";
                  $query=$db2->query($sql);
                  if($query->num_rows()>0){
                  foreach($query->result_array() as $val):
                  ?>                  
                  <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
                  <?php  endforeach;  } ?>
                  </select>         
                  <!-- <div id="result" style="font-family: 'Roboto', sans-serif; color: #1b68b5;"></div>   -->
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
<!-- <script>
$('#acadexDetails').on('change',function(){
  $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>webinars/webinarInfo/'+$(this).val(),
        success: function (html) {
            $('#result').html(html);
        }
    });  
});
</script> -->
<script>
var width = document.getElementById("name").offsetWidth+'px';
$('#acadexDetails').multiselect(
                      {
                        includeSelectAllOption: true,
                        maxHeight: 400,
                        buttonWidth: width,
                        dropDown: true,
                        inheritClass: true
                      });
</script>
</body></html>
