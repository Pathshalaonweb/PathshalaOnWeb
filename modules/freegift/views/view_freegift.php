<?php $this->load->view('top_application'); ?>


<!DOCTYPE html>
<html lang="en">
<head>

  </head>

<body>




<div class="login-register-area pt-130 pb-130">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 col-md-12 ml-auto mr-auto">
        <div class="login-register-wrapper">
          <div class="login-register-tab-list nav"> <a class="active" data-toggle="tab" href="#lg2">
            <h2 class="section-heading" align="center"> Grab Your Chance Here</h2>
            </a> </div>
          <div class="tab-content">
            <div id="lg2" class="tab-pane active">
              <div class="login-form-container">
                <div class="login-register-form"> 
				<?php echo validation_message();?> 
				<?php echo error_message(); ?> 
        <?php //echo form_open('users/register'); ?>
        <form action="<?php echo base_url(); ?>freegift/studentRegister" method="post" accept-charset="utf-8" onsubmit="return validate()">
                  <input type="text" name="first_name" placeholder="Name" id="name" value="<?php echo set_value('first_name'); ?>">
                  <?php echo form_error('first_name');?>Name should be of minimum 5 Characters
                 <input type="number" name="phone_number" placeholder="Phone" id="phone" value="<?php echo set_value('phone_number'); ?>" min="5000000000" max="9999999999" step=1>Number should be of 10 Digits
                  <?php echo form_error('phone_number');?>
                  <input type="email" name="user_name" placeholder="Email" id="email" value="<?php echo set_value('user_name');?>">
                  <input type="password" name="password" id="password" placeholder="Password(Set Your Password)" value="<?php echo set_value('password');?>">Password should be of minimum 6 Characters
				  <input type="referralcode" name="referralcode" id="referralcode" placeholder="Referral Code(Enter Referral Code)" value="<?php echo set_value('referralcode');?>FREEGIFT">
                  <input type="checkbox" name="terms_conditions" id="terms_conditions" >
                  <label for="check"> I have read and agreed with the terms & conditions and privacy policy.</label>
                  <?php echo form_error('terms_conditions');?>
                  <div class="button-box">
                    <button class="btn btn-primary btn-rounded" type="submit"><span>Register</span></button>
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

<?php $this->load->view('bottom_application'); ?>
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
