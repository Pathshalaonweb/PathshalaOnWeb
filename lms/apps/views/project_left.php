
<div class="wrapper row-offcanvas row-offcanvas-left">
	<aside class="left-side sidebar-offcanvas">  
		<?php 
		switch($active)
		{	
		      case 'dashboard':
			  $dash="active";
			  $mock_test='';
			  $online_exam='';
			  $exam_result='';
			  $test_result='';
			  $course_material='';
			  $profile="";
			  break;
			  case 'mock_test':
			  $mock_test="active";
			  $dash='';
			  $online_exam='';
			  $exam_result='';
			  $test_result='';
			  $course_material='';
			  $profile="";
			  break;
			  case 'online_exam':
			  $online_exam="active";
			  $dash='';
			  $mock_test='';
			  $exam_result='';
			  $test_result='';
			  $course_material='';
			  $profile="";
			  break;
			  case 'exam_result':
			  $exam_result="active";
			  $online_exam='';
			  $mock_test='';
		      $dash='';
			  $test_result='';
			  $course_material='';
			  $profile="";
			  break;
			  case 'test_result':
			  $test_result="active";
			  $online_exam='';
			  $mock_test='';
			  $dash='';
			  $exam_result='';
			  $course_material='';
			  $profile="";
			  break;
			  case 'crs_mat':
			  $mock_test='';
			  $online_exam='';
			  $profile="";
			  $test_result="";
			  $course_material="active";
			  $dash='';
			  $exam_result='';
			  break;
			  case 'profile':
			  $mock_test='';
			  $online_exam='';
			  $profile="active";
			  $test_result="";
			  $course_material='';
			  $dash='';
			  $exam_result='';
			  break;
		}
		?>
		<!-- sidebar: style can be found in sidebar.less -->
		<nav class="sidebar-menu" role="sidebar" style="background: #3b589e;">
		<section class="sidebar">
			<!-- Sidebar user panel -->
			<!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu"> 
				<li class="<?php echo $dash?>">
					<a href="<?php echo base_url();?>">
						<i class="fa fa-dashboard"></i> <span>Dashboard</span><small class="badge pull-right bg-green"></small>
					</a>
				</li>
                <li class="<?php echo $course_material;?>">
					<a href="<?php echo base_url();?>course_material">
						<i class="fa fa-book"></i> <span>Courses Material</span>
					</a>
				</li>
                <li class="<?php echo $online_exam?>">
					<a href="<?php echo base_url();?>home/online_exam/">
						<i class="fa fa-book"></i> <span>Online Exam</span>
					</a>
				</li>
                <li class="<?php echo $mock_test?>">
					<a href="<?php echo base_url();?>home/">
						<i class="fa fa-book"></i> <span>Mock Test</span>
					</a>
				</li>
				 <li class="<?php echo $test_result?>">
					<a href="<?php echo base_url();?>exam/test_result">
						<i class="fa fa-book"></i> <span>Test Result</span>
					</a>
				</li>
                <li class="<?php echo $exam_result;?>">
					<a href="<?php echo base_url();?>exam/exam_result">
						<i class="fa fa-book"></i> <span>Exam Result</span>
					</a>
				</li>
				<li class="<?php echo $profile;?>">
					<a href="https://www.pathshala.co/members/myaccount">
					   <i class="fa fa-user"></i> <span>Pathshala Profile</span>
						<small class="badge pull-right bg-green"></small>
					</a>
				</li>
                <li class="<?php echo $profile;?>">
					<a href="https://www.pathshala.co/users/logout">
					   <i class="fa fa-user"></i> <span>Logout</span>
						<small class="badge pull-right bg-green"></small>
					</a>
				</li>
            </ul>
        </section>
    </aside>