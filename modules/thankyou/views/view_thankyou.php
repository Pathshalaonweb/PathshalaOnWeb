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
<div class="container">
     
        <div class="row justify-content-center text-center mb-5" data-aos="fade-up">
          
            <h2 class="section-heading mb-8">Registration Successful</h2>
			<h4 class="section-heading mb-10">Thank You for Registering, Explore the world of Online Education at Pathshala</h4>
          
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

<!-- Vendor JS Files -->
  <script src="<?php echo base_url(); ?>softland/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>softland/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>softland/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url(); ?>softland/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo base_url(); ?>softland/assets/vendor/aos/aos.js"></script>
  <script src="<?php echo base_url(); ?>softland/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?php echo base_url(); ?>softland/assets/vendor/jquery-sticky/jquery.sticky.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url(); ?>softland/assets/js/main.js"></script>
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
