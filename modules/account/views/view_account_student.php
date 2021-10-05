<header><?php $this->load->view('top_application'); ?></header>
<?php $ref=$this->input->get_post('ref');?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

<body>
<div class="signinpage">
<h1 class="educatorheading">Welcome to Pathshala - Student</h1>
<div class="container-02">
		<div class="glassmorphic-card">
			<div class="contentBox">
				<h3>01</h3>
				<p>Sign Up</p>
				
			</div>
		</div>
        <div class="glassmorphic-card">
			<div class="contentBox">
				<h3>02</h3>
				<p>Create Profile</p>
				
			</div>
		</div>
        <div class="glassmorphic-card">
			<div class="contentBox">
				<h3>03</h3>
				<p>Search Engine</p>
				
			</div>
		</div>
        <div class="glassmorphic-card">
			<div class="contentBox">
				<h3>04</h3>
				<p>Join the Club</p>
				
			</div>
		</div>
        </div>
<div class="container right-panel-active">
	<!-- Sign Up -->
	<div class="container__form container--signup">
	
		
			<div class="login-form-container">
                <div class="login-register-form"> 
			<?php echo validation_message();?> 
				<?php echo error_message(); ?> 
        <?php echo form_open('account/studentRegister', 'class="form", id="form1", method="post", accept-charset="utf-8", onsubmit="return validate()"'); ?>
		<h2 class="form__title">Sign Up</h2>
      
                  <input type="text" class="input" name="first_name" placeholder="Name" id="name" value="<?php echo set_value('first_name'); ?>">
                  <?php echo form_error('first_name');?>
                 <input type="number" class="input" name="phone_number" placeholder="Phone" id="phone" value="<?php echo set_value('phone_number'); ?>" min="5000000000" max="9999999999" step=1>
                  <?php echo form_error('phone_number');?>
                  <input type="email" class="input" name="user_name" placeholder="Email" id="email" value="<?php echo set_value('user_name');?>">
                  <input type="password" class="input" name="password" id="password" placeholder="Password(Set Your Password)" value="<?php echo set_value('password');?>">
				  <input type="referralcode" class="input" name="referralcode" id="referralcode" placeholder="Referral Code(Enter Referral Code)" value="<?php echo set_value('referralcode');?>">
				  
                  <div class="button-box">
                    <button class="btn" type="submit"><span>Sign Up</span></button>
                  </div>
				  By Signing Up, you agrees to the <a href="<?php echo base_url(); ?>pages/terms-and-conditions">Terms & Conditions</a>and<a href="<?php echo base_url(); ?>pages/privecy-policy">Privacy Policy</a>
		<?php echo form_close();?> 
		</div>
              </div>
	</div>

	<!-- Sign In -->
	<div class="container__form container--signin">
		<div class="login-form-container">
                <div class="login-register-form"> 
				
				<?php echo validation_message();?> 
				<?php echo error_message(); ?> 
				<?php echo form_open('users/login','class="form",id="form2"');?>
				<h2 class="form__title">Sign In</h2>
                  <input type="email" class="input"  name="user_name" id="user_name" placeholder="Email" value="<?php if(get_cookie('userName')!=""){ echo get_cookie('userName'); } ?>">
                  <input type="password" class="input"  name="password" id="password" placeholder="Password" value="<?php if(get_cookie('pwd')!=""){ echo get_cookie('pwd'); } ?>" >
				  <div class="link">
                     <a href="<?php echo base_url();?>users/forgotten_password"> Forgot Password</a></div>
                <input type="hidden" name="action" value="Add">
                    <input type="hidden" name="ref" value="<?php echo $ref;?>" />
                    <button class="btn" type="submit">Sign In</button> 
                     <?php if(!empty($authURL)){ ?>
            <a style="margin-left: 20px;" href="<?php echo $authURL; ?>"><img  style="width: 137px;
    height: 43px;"src="<?php echo base_url('uploaded_files/icon-img/login-with-facebook.png'); ?>"> </a>
            <?php }?>
                  <?php echo form_close();?> </div>
              </div>
		
	</div>

	<!-- Overlay -->
	<div class="container__overlay">
		<div class="overlay">
			<div class="overlay__panel overlay--left">
				<button class="btn" id="signIn">Sign In</button>
			</div>
			<div class="overlay__panel overlay--right">
				<button class="btn" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
</div>
</body>
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
<script>
const signInBtn = document.getElementById("signIn");
const signUpBtn = document.getElementById("signUp");
const fistForm = document.getElementById("form1");
const secondForm = document.getElementById("form2");
const container = document.querySelector(".container");

signInBtn.addEventListener("click", () => {
	container.classList.remove("right-panel-active");
});

signUpBtn.addEventListener("click", () => {
	container.classList.add("right-panel-active");
});



</script>
<style>
        @import url('https://fonts.googleapis.com/css2?family=Karla:wght@500&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Encode+Sans+SC:wght@300;400&display=swap');
    :root {
	/* COLORS */
	--white: #e9e9e9;
	--gray: #333;
	--blue: #0367a6;
	--lightblue: #008997;

	/* RADII */
	--button-radius: 0.7rem;

	/* SIZES */
	--max-width: 778px;
	--max-height: 720px;

	font-size: 16px;
	font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
		Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
}

body .signinpage{
	align-items: center;
width:100%;
	background-attachment: fixed;
	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
	display: grid;
	height: auto;
	place-items: center;
}

.form__title {
	font-weight: 300;
	margin: 0;
	margin-bottom: 1.25rem;
}

.link {
	color: var(--gray);
	font-size: 0.9rem;
	margin: 1.5rem 0;
	text-decoration: none;
}

.container {
	background-color: var(--white);
	border-radius: var(--button-radius);
	box-shadow: 0 0.9rem 1.7rem rgba(0, 0, 0, 0.25),
		0 0.7rem 0.7rem rgba(0, 0, 0, 0.22);
	height: var(--max-height);
	max-width: var(--max-width);
	overflow: hidden;
	position: relative;
	width: 100%;
	margin-bottom:40px;
}

.container__form {
	height: 100%;
	position: absolute;
	top: 0;
	transition: all 0.6s ease-in-out;
}

.container--signin {
	left: 0;
	width: 50%;
	z-index: 2;
}

.container.right-panel-active .container--signin {
	transform: translateX(100%);
}

.container--signup {
	left: 0;
	opacity: 0;
	width: 50%;
	z-index: 1;
}

.container.right-panel-active .container--signup {
	animation: show 0.6s;
	opacity: 1;
	transform: translateX(100%);
	z-index: 5;
}

.container__overlay {
	height: 100%;
	left: 50%;
	overflow: hidden;
	position: absolute;
	top: 0;
	transition: transform 0.6s ease-in-out;
	width: 50%;
	z-index: 100;
}

.container.right-panel-active .container__overlay {
	transform: translateX(-100%);
}

.overlay {
	background-color: var(--lightblue);
	background: url("<?php echo base_url();?>/uploaded_files/userfiles/images/student_login.jpg");
	background-attachment: fixed;
	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
	height: 100%;
	left: -100%;
	position: relative;
	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
	width: 200%;
}

.container.right-panel-active .overlay {
	transform: translateX(50%);
}

.overlay__panel {
	align-items: center;
	display: flex;
	flex-direction: column;
	height: 100%;
	justify-content: center;
	position: absolute;
	text-align: center;
	top: 0;
	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
	width: 50%;
}

.overlay--left {
	transform: translateX(-20%);
}

.container.right-panel-active .overlay--left {
	transform: translateX(0);
}

.overlay--right {
	right: 0;
	transform: translateX(0);
}

.container.right-panel-active .overlay--right {
	transform: translateX(20%);
}

.btn {
	background-color: var(--blue);
	background-image: linear-gradient(90deg, var(--blue) 0%, var(--lightblue) 74%);
	border-radius: 20px;
	border: 1px solid var(--blue);
	color: var(--white);
	cursor: pointer;
	font-size: 0.8rem;
	font-weight: bold;
	letter-spacing: 0.1rem;
	padding: 0.9rem 4rem;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}

.form > .btn {
	margin-top: 1.5rem;
}

.btn:active {
	transform: scale(0.95);
}

.btn:focus {
	outline: none;
}

.form {
	background-color: var(--white);
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 3rem;
	height: 100%;
	text-align: center;
}

.input {
	background-color: #fff;
	border: none;
	padding: 0.9rem 0.9rem;
	margin: 0.5rem 0;
	width: 100%;
}

@keyframes show {
	0%,
	49.99% {
		opacity: 0;
		z-index: 1;
	}

	50%,
	100% {
		opacity: 1;
		z-index: 5;
	}
}

h1{
    font-family: 'Karla', sans-serif;
}


.container-02 .glassmorphic-card {
	float:left;
	width: 150px;
	height: 150px;
	padding: 20px 50px;
	margin: 28px;
	box-shadow: 20px 20px 50px rgba(0,0,0, 0.5);
	border-radius: 15px;
	border-top: 1px solid rgba(255,255,255,0.5);
	border-left: 1px solid rgba(255,255,255,0.5);
	background: rgba(255,255,255,0.1);
	backdrop-filter: blur(5px);
	overflow: hidden;
    font-family: 'Encode Sans SC', sans-serif;
}

.container-02 p{
    font-size: 20px;
    font-family: 'Encode Sans SC', sans-serif;
}

@media screen and (max-width: 520px) {
	 
	 .educatorheading {
		 font-size:20px;
		 
	 }
	 .container-02 .glassmorphic-card {
		 float:none;
	 }
	 

.container-02 p{
    font-size: 18px;
    font-family: 'Encode Sans SC', sans-serif;
}
.container-02 h3{
    font-size: 20px;
    font-family: 'Encode Sans SC', sans-serif;
}
.input {
	background-color: #fff;
	border: none;
	font-size: 1rem;
	margin: 0.5rem 0;
	width: 100%;
}

.login-form-container{
	padding:0px;
}
.container {
	background-color: var(--white);
	border-radius: var(--button-radius);
	box-shadow: 0 0.9rem 1.7rem rgba(0, 0, 0, 0.25),
		0 0.7rem 0.7rem rgba(0, 0, 0, 0.22);
	height: var(--max-height);
	max-width: 480px;
	overflow: hidden;
	position: relative;
	width: 100%;
	margin-bottom:40px;
}
.btn {
	background-color: var(--blue);
	background-image: linear-gradient(90deg, var(--blue) 0%, var(--lightblue) 74%);
	border-radius: 20px;
	border: 1px solid var(--blue);
	color: var(--white);
	cursor: pointer;
	font-size: 0.5rem;
	font-weight: bold;
	letter-spacing: 0.1rem;
	padding: 0.2rem 2rem;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}
.form{
	margin: 0px;
}

 }

    </style>
</html>
