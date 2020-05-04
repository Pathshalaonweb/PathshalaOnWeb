<header class="header">
    <a href="<?php echo base_url();?>" class="logo">
        <img src="<?php echo theme_url();?>img/logo.png" style="width:80px">
    </a>
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top" role="navigation">
		<!-- Sidebar toggle button--> 
		<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>  
		<div class="width_bar">
			<h2 class="text-center fsb darkperpol mt10">LMS</h2>
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
						<li class="user-body"><a href="<?php echo base_url();?>users/logout">Logout</a> </li> 
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

          