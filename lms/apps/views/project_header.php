<header class="header" style="background: #3b589e;">
    
    <a href="<?php echo base_url();?>" class="logo" style="background: #3b589e;">
        <img src="<?php echo theme_url();?>img/logo.png" style="width:80px">
    </a>
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top" role="navigation" style="background: #3b589e;">
		<!-- Sidebar toggle button--> 
		<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>  
		<div class="width_bar">
			<h2 class="text-center fsb darkperpol mt10" style="display: inline-block;
    float: left;
    width: 40%;">LMS</h2>
			<ul style="    margin: 0px;
    padding: 15px;
    float: right;
    width: 50%;">
      <li style="display:inline-block;padding:0 15px;"><a style="color: #fff;" href="https://www.pathshala.co/">HOME</a></li>
      <li style="display:inline-block;padding:0 15px;"><a style="color: #fff;" href="https://www.pathshala.co/search">Search Tutor</a></li>
      <li style="display:inline-block;padding:0 15px;"><a style="color: #fff;" href="https://www.pathshala.co/courses">Search Courses</a></li>
    </ul>
		</div>
		<div class="navbar-right">
			<ul class="nav navbar-nav">
				<!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu">
					<?php if($this->session->userdata('user_id') !='')
					{ ?>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="glyphicon glyphicon-user"></i>
						<span><?php echo $this->session->userdata('first_name');?> <i class="caret"></i></span>
					</a>
					<ul class="dropdown-menu">
						<li class="user-body"><a href="<?php echo base_url();?>members/myaccount">My Profile</a> </li> 
						<li class="user-body"><a href="https://www.pathshala.co/users/logout">Logout</a> </li> 
					</ul>
					<?php } else { ?> 
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="glyphicon glyphicon-user"></i>
						<span>Jane Doe <i class="caret"></i></span>
					</a>
					<ul class="dropdown-menu">
						<li class="user-body"><a href="<?php echo base_url();?>users/login">Login</a> </li>
						<li class="user-body"><a href="<?php echo base_url();?>users/register">Signup</a> </li> 
					</ul>
					<?php } ?>
				</li>
			</ul>
		</div>
	</nav>
</header>

          