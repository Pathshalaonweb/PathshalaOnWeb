<?php $this->load->view('top_application'); ?>
<div class="login-register-area pt-130 pb-130">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 col-md-12 ml-auto mr-auto">
        <div class="login-register-wrapper">
          <div class="login-register-tab-list nav"> <a class="active" data-toggle="tab" href="#lg2">
            <h4> Register as Student</h4>
            </a> </div>
          <div class="tab-content">
            <div id="lg2" class="tab-pane active">
              <div class="login-form-container">
                <div class="login-register-form"> 
				<?php echo validation_message();?> 
				<?php echo error_message(); ?> 
        <?php //echo form_open('users/register'); ?>
        <form action="<?php echo base_url(); ?>/users/register" method="post" accept-charset="utf-8" onsubmit="return validate()">
                  <input type="text" name="first_name" placeholder="Name" value="<?php echo set_value('first_name'); ?>">
                  <?php echo form_error('first_name');?>
                 <input type="text" name="phone_number" placeholder="Phone" value="<?php echo set_value('phone_number'); ?>">
                  <?php echo form_error('phone_number');?>
                  <input type="text" name="user_name" placeholder="Email" value="<?php echo set_value('user_name');?>">
                  <!-- <select name="category" required style="margin: 0px 0px 10px 0px">
                      <option value=""selected="selected" disabled>Please Select a Category</option>
                      <option value="30">School Tuition (5th to 12th Class)</option>
                      <option value="170">College/University</option>
                      <option value="31">Coaching Center</option>
                      <option value="7">Hobbies</option>
                      <option value="514">Professional Learning</option>
                      <option value="407">Language</option>
                      <option value="12">Sports</option>
                      <option value="516">Vocational Learning</option>
                    </select>
                    <select name="category_course" required style="margin: 0px 0px 10px 0px">
                    </select>   -->
                    <select name="category" id="category" required style="margin: 0px 0px 10px 0px">
                    <option value="" selected="selected" disabled>Please Select a Category</option>
                    <?php 
                            $sql="SELECT * FROM `wl_categories`  where status='1' AND parent_id='0' ORDER BY sort_order";
                            $query=$this->db->query($sql);
                            foreach($query->result_array() as $val):
                            ?>
                    <option value="<?php echo $val['category_id']?>"><?php echo $val['category_name']?></option>
                    <?php endforeach;?>
                  </select>
                  <select id="classes" name="classes" required style="margin: 0px 0px 10px 0px">
                  <option value="" selected="selected" disabled>Please Select a Class</option>
                </select>
                <div class="requried" id="classeserror" style="display:none; color:red;">Please Select an Option.</div>
                  <?php //echo form_error('classes');?>
                  <input type="password" name="password" placeholder="Password">
                  <?php echo form_error('password');?>
                  <input type="text" name="referral" placeholder="Referral Code (Optional)" value="">
                  <input type="checkbox" name="terms_conditions" id="terms_conditions" >
                  <label for="check"> I have read and agreed with the terms & conditions and privacy policy.</label>
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
<footer class="footer-area">
  <div class="footer-top bg-img default-overlay pt-20 pb-20" style="background-image:url(https://www.localhost/pathshala/assets/designer/themes/default/img/bg/bg-4.jpg);">
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
                <li><a href="https://www.localhost/pathshala/">Home</a></li>
                <li><a href="https://www.localhost/pathshala/About/aboutus.html">About</a></li>
                <li><a href="https://www.localhost/pathshala/blog">Blog</a></li>
                <li><a href="https://www.localhost/pathshala/contactus">Contact</a></li>
                <li><a href="https://www.localhost/pathshala/users/register">Register as Student</a></li>
                <li><a href="https://www.localhost/pathshala/teacher/register">Register as Teacher</a></li>
                <li><a href="https://www.localhost/pathshala/teacher/login">Login</a></li>
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
            <p> Copyright © 2020 <a href="https://www.localhost/pathshala/">Pathshala &nbsp;</a>(Brainchild Ventures LLP). All Right Reserved. </p>
          </div>
        </div>
        <div class="col-lg-8 col-md-12">
          <div class="footer-menu-social">
            <div class="footer-menu">
              <ul>
                <li><a href="https://www.localhost/pathshala/pages/privecy-policy">Privacy Policy</a></li>
                <li><a href="https://www.localhost/pathshala/pages/terms-and-conditions">Terms & Conditions of Use</a></li>
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
<script src="https://www.localhost/pathshala/assets/designer/themes/default/js/vendor/jquery-1.12.4.min.js"></script> 
<!-- Popper JS --> 
<script src="https://www.localhost/pathshala/assets/designer/themes/default/js/popper.min.js"></script> 
<!-- Bootstrap JS --> 
<script src="https://www.localhost/pathshala/assets/designer/themes/default/js/bootstrap.min.js"></script> 
<!-- Plugins JS --> 
<script src="https://www.localhost/pathshala/assets/designer/themes/default/js/plugins.js"></script> 
<script src="https://www.localhost/pathshala/assets/designer/themes/default/js/main.js"></script>
<script>
  function validate()
  {
    var x = document.getElementById("classes").value;
    if(x=='' || x=='377' || x=='373' || x=="374" || x=='375' || x== '530' || x== '432' || x== '376' || x== '526')
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
            url:'<?php echo base_url();?>search/getSubcat',
              data:'category_id='+categoryID,
               success:function(html){
                   $('#classes').html(html);
					$("#wait").css("display", "none");
               }
            }); 
        }else{
          $('#city').html('<option value="">Select Category</option>'); 
        }
    });
 });
</script> 
</body></html>
