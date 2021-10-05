<?php $this->load->view('top_application'); ?>

<!-- Trial Code -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url(); ?>mentor/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>mentor/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>mentor/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>mentor/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>mentor/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>mentor/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>mentor/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url(); ?>mentor/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mentor - v2.2.0
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>

<body>
<?php
			$userid=$userid = $this->session->userdata('user_id');
			$id=$res['teacher_id']; 
			//User rating
       		$this->db->select('rating');
			$this->db->from('wl_rating');
			$this->db->where('rating!=0');
			$this->db->where("status='1'");
			$this->db->where("customer_id", $userid);
			$this->db->where("entity_id", $id);
			$userRatingquery = $this->db->get();
	       	$userpostResult = $userRatingquery->result_array();
			$userRating = 0;
			if(count($userpostResult)>0){
					$rating = $userpostResult[0]['rating'];
			}
			// Average rating
       		$this->db->select('ROUND(AVG(rating),1) as averageRating');
			$this->db->from('wl_rating');
			$this->db->where('rating!=0');
			$this->db->where("status='1'");
			$this->db->where("entity_id", $id);
			$ratingquery = $this->db->get();
	       	$postResult  = $ratingquery->result_array();
			$averagerating = $postResult[0]['averageRating'];
			//echo_sql();
	       	if($averagerating == ''){
	       		$averagerating = 0;
	       	}
			$averagerating;
			?>
<?php 
		 	//Teachin Rating
			//User rating
       		$this->db->select('teachingstyle');
			$this->db->from('wl_rating');
			$this->db->where("status='1'");
			$this->db->where('teachingstyle!=0');
			$this->db->where("customer_id", $userid);
			$this->db->where("entity_id", $id);
			$teachingRatingquery = $this->db->get();
	       	$teachingpostResult = $teachingRatingquery->result_array();
			$userRating = 0;
			if(count($teachingpostResult)>0){
					$teachingrating = $teachingpostResult[0]['teachingstyle'];
			}
			// Average rating
       		$this->db->select('ROUND(AVG(teachingstyle),1) as teachingRating');
			$this->db->from('wl_rating');
			$this->db->where("status='1'");
			$this->db->where('teachingstyle!=0');
			$this->db->where("entity_id", $id);
			$teachingratingquery = $this->db->get();
	       	$teachingpostResult = $teachingratingquery->result_array();
			//echo_sql();
			$teachingaveragerating = $teachingpostResult[0]['teachingRating'];
	       	if($teachingaveragerating == ''){
	       		$teachingaveragerating = 0;
	       	}
		 ?>
<?php 
		 	//Discipline Rating
			//User rating
       		$this->db->select('discipline');
			$this->db->from('wl_rating');
			$this->db->where("status='1'");
			$this->db->where('discipline!=0');
			$this->db->where("customer_id", $userid);
			$this->db->where("entity_id", $id);
			$disciplineRatingquery = $this->db->get();
	       	$disciplinepostResult = $disciplineRatingquery->result_array();
			//echo_sql();
			$userRating = 0;
			if(count($disciplinepostResult)>0){
					$disciplinerating = $disciplinepostResult[0]['discipline'];
			}
			// Average rating
       		$this->db->select('ROUND(AVG(discipline),1) as disciplineRating');
			$this->db->from('wl_rating');
			$this->db->where("status='1'");
			$this->db->where('discipline!=0');
			$this->db->where("entity_id", $id);
			$disciplineratingquery = $this->db->get();
	       	$disciplinepostResult = $disciplineratingquery->result_array();
			//echo_sql();
			$disciplineaveragerating = $disciplinepostResult[0]['disciplineRating'];
	       	if($disciplineaveragerating == ''){
	       		$disciplineaveragerating = 0;
	       	}
		 ?>
<?php 
		 	//Discipline Rating
			//User rating
       		$this->db->select('studymaterial');
			$this->db->from('wl_rating');
			$this->db->where("status='1'");
			$this->db->where('studymaterial!=0');
			$this->db->where("customer_id", $userid);
			$this->db->where("entity_id", $id);
			$studymaterialRatingquery = $this->db->get();
	       	$studymaterialpostResult = $studymaterialRatingquery->result_array();
			$userRating = 0;
			if(count($studymaterialpostResult)>0){
					$studymaterialrating = $studymaterialpostResult[0]['studymaterial'];
			}
			// Average rating
       		// Average rating
       		$this->db->select('ROUND(AVG(studymaterial),1) as studymaterialRating');
			$this->db->from('wl_rating');
			$this->db->where("status='1'");
			$this->db->where('studymaterial!=0');
			$this->db->where("entity_id", $id);
			$studymaterialratingquery = $this->db->get();
	       	$studymaterialpostResult = $studymaterialratingquery->result_array();
			//echo_sql();
			$studymaterialaveragerating = $studymaterialpostResult[0]['studymaterialRating'];
	       	if($studymaterialaveragerating == ''){
	       		$studymaterialaveragerating = 0;
	       	}
		 ?>
<?php 
		 	//locations Rating
			//User rating
       		$this->db->select('locations');
			$this->db->from('wl_rating');
			$this->db->where('locations!=0');
			$this->db->where("status='1'");
			$this->db->where("customer_id", $userid);
			$this->db->where("entity_id", $id);
			$locationsRatingquery = $this->db->get();
	       	$locationspostResult = $locationsRatingquery->result_array();
			$userRating = 0;
			if(count($locationspostResult)>0){
					$locationsrating = $locationspostResult[0]['locations'];
			}
			// Average rating
       		$this->db->select('ROUND(AVG(locations),1) as locationsRating');
			$this->db->from('wl_rating');
			$this->db->where('locations!=0');
			$this->db->where("status='1'");
			$this->db->where("entity_id", $id);
			$locationsratingquery = $this->db->get();
	       	$locationspostResult = $locationsratingquery->result_array();
			//echo_sql();
			$locationsaveragerating = $locationspostResult[0]['locationsRating'];
	       	if($locationsaveragerating == ''){
	       		$locationsaveragerating = 0;
	       	}
		 ?>
<?php 
		 	//locations Rating
			//User rating
       		$this->db->select('infrastructure');
			$this->db->from('wl_rating');
			$this->db->where('infrastructure!=0');
			$this->db->where("status='1'");
			$this->db->where("customer_id", $userid);
			$this->db->where("entity_id", $id);
			$infrastructureRatingquery = $this->db->get();
	       	$infrastructurepostResult = $infrastructureRatingquery->result_array();
			$userRating = 0;
			if(count($infrastructurepostResult)>0){
					$infrastructurerating = $infrastructurepostResult[0]['infrastructure'];
			}
			// Average rating
       		$this->db->select('ROUND(AVG(infrastructure),1) as infrastructureRating');
			$this->db->from('wl_rating');
			$this->db->where("status='1'");
			$this->db->where('infrastructure!=0');
			$this->db->where("entity_id", $id);
			$infrastructureratingquery = $this->db->get();
	       	$infrastructurepostResult = $infrastructureratingquery->result_array();
			//echo_sql();
			$infrastructureaveragerating = $infrastructurepostResult[0]['infrastructureRating'];
	       	if($infrastructureaveragerating == ''){
	       		$infrastructureaveragerating = 0;
	       	}
		 ?>
<?php 
			 $this->db->select('customer_id, COUNT(customer_id) as total');
			 $this->db->where("status='1'");
			 $this->db->where("entity_id", $id);
			 $this->db->group_by('customer_id'); 
			 $result=$this->db->get('wl_rating');
			 $row = $result->result_array();
			 $total=$row[0]['total'];
			// echo_sql();
			 //get over alll rating
			 $allratingAveragerating=$averagerating+$teachingaveragerating+$disciplineaveragerating+$studymaterialaveragerating+$locationsaveragerating+$infrastructureaveragerating;
			 
		 ?>

  <!-- ======= Hero Section ======= -->
  <section  id="hero" class="d-flex justify-content-center align-items-center">
    <div class="row">
	<div class="container position-relative text-center" data-aos="zoom-in" data-aos-delay="100" >
	<div class="col-md-3 no-padding photobox ">
            <div class="add-image"> <a href="JavaScript:Void(0);"><img
                                                        class="thumbnail no-margin" src="<?php echo get_image('teacher',$res['picture'],190,190,'AR');?>"
                                                        alt="img"></a></div>
            <h5 class="add-title" style="font-size:22px;color:#FFFFFF;font-weight: bold;"><a href="javascript:void(0)"></a> <?php echo $res['first_name']?></h5>
           
                <h5 style="color:#FFFFFF;font-weight:bold; text-center">About : <?php echo $res['description'];?></h5>
				<tr>                  
				  <?php 
				  
            $dbe = $this->load->database('default', TRUE);
            $idd = $this->session->userdata('user_id');
            $sq = "SELECT `id` FROM `wl_teacher_follow_record` WHERE `student_id`='".$idd."'";
            $qu=$dbe->query($sq);
            $numrows = $qu->num_rows();
            //echo $numrows;
          ?>
		  <?php if($this->session->userdata('user_id') > 0 ){?>
                 <?php if($numrows == 0) { ?>
                  <a class="btn btn-primary" href="<?php echo base_url();?>teacher/follow/<?php echo $val['id'];?>" onclick="return confirm('Are you sure, you want to follow <?= $res['first_name']?>')" class="btn ">Follow Me</a>
                 
                 <?php } elseif($numrows == 1) { ?>
                  <a class="btn btn-success" href="" class="btn">Following</a>
                 <?php } ?>
				 <?php }else{?>
                  <a class="btn btn-primary" href="<?php echo base_url();?>users/login" class="btn">Follow Me</a>
				  <?php } ?>
                  
					</tr>
              
          </div>
		  <div class="col-lg-4  text-center">
            <div class="number asap-font">
             <?php $con=mysqli_connect("localhost","root","Pathshala@1a","pathshal_pathshala");
			$sql3="SELECT count(teacher_id) FROM `wl_teacher_profile` WHERE teacher_id='$res[teacher_id]'" ;
			$result3=mysqli_query($con,$sql3);
			$row3=mysqli_fetch_row($result3);
			$str3 = implode($row3);  
			 ?>
              <b><span data-toggle="counter-up" style="color:#FFFFFF;font-weight:bold;font-size: 24px;">  <?php echo $str3?></b></span>
            </div>
            <p style="color:#FFFFFF;font-weight:bold;font-size: 24px;">Subjects Listed</p>
          </div>
		  <div class="col-lg-4  text-center">
            <div class="number asap-font">
             <?php $con=mysqli_connect("localhost","root","Pathshala@1a","pathshal_newlms");
			$sql2="SELECT count(teacher_id) FROM `tbl_courses` WHERE teacher_id='$res[teacher_id]' && status='1'" ;
			$result2=mysqli_query($con,$sql2);
			$row2=mysqli_fetch_row($result2);
			$str2 = implode($row2); 
			 ?>
              <b><span data-toggle="counter-up" style="color:#FFFFFF;font-weight:bold;font-size: 24px;">  <?php echo $str2?></b></span>
            </div>
            <p style="color:#FFFFFF;font-weight:bold;font-size: 24px;">Courses Listed</p>
          </div>
		  <div class="col-lg-4  text-center">
            <div class="number asap-font">
             <?php $con=mysqli_connect("localhost","root","Pathshala@1a","pathshal_pathshala");
			$sql1="SELECT count(teacher_id) FROM `wl_addclass` WHERE teacher_id='$res[teacher_id]'" ;
			$result1=mysqli_query($con,$sql1);
			$row1=mysqli_fetch_row($result1);
			$str1 = implode($row1); 
			 ?>
              <b><span data-toggle="counter-up" style="color:#FFFFFF;font-weight:bold;font-size: 24px;">  <?php echo $str1?></b></span>
            </div>
            <p style="color:#FFFFFF;font-weight:bold;font-size: 24px;">Classes Conducted & Scheduled</p>
          </div>

          <div class="col-lg-4 text-center">
            <div class="number asap-font">
             <?php $con=mysqli_connect("localhost","root","Pathshala@1a","pathshal_pathshala");
			$sql4="SELECT count(teacher_id) FROM `wl_teacher_follow_record` WHERE teacher_id='$res[teacher_id]'" ;
			$result4=mysqli_query($con,$sql4);
			$row4=mysqli_fetch_row($result4);
			$str4 = implode($row4); 
			 ?>
              <b><span data-toggle="counter-up" style="color:#FFFFFF;font-weight:bold;font-size: 24px;"> <?php echo $str4?></b></span>
            </div>
            <p style="color:#FFFFFF;font-weight:bold;font-size: 24px;">Followers</p>
          </div>
    </div>
	</div>
  </section><!-- End Hero -->
<div class="container">

</div>
  

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <div class="number asap-font">
             <?php $con=mysqli_connect("localhost","root","Pathshala@1a","pathshal_pathshala");
			$sql3="SELECT count(teacher_id) FROM `wl_teacher_profile` WHERE teacher_id='$res[teacher_id]'" ;
			$result3=mysqli_query($con,$sql3);
			$row3=mysqli_fetch_row($result3);
			$str3 = implode($row3);  
			 ?>
              <b><span data-toggle="counter-up">  <?php echo $str3?></b></span>
            </div>
            <p>Subjects Listed</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <div class="number asap-font">
            <?php $con=mysqli_connect("localhost","root","Pathshala@1a","pathshal_newlms");
			$sql2="SELECT count(teacher_id) FROM `tbl_courses` WHERE teacher_id='$res[teacher_id]' && status='1'" ;
			$result2=mysqli_query($con,$sql2);
			$row2=mysqli_fetch_row($result2);
			$str2 = implode($row2); 
			 ?>
              <b><span data-toggle="counter-up">  <?php echo $str2?></b></span>
            </div>
            <p>Courses Listed</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <div class="number asap-font">
             <?php $con=mysqli_connect("localhost","root","Pathshala@1a","pathshal_pathshala");
			$sql1="SELECT count(teacher_id) FROM `wl_addclass` WHERE teacher_id='$res[teacher_id]'" ;
			$result1=mysqli_query($con,$sql1);
			$row1=mysqli_fetch_row($result1);
			$str1 = implode($row1); 
			 ?>
              <b><span data-toggle="counter-up">  <?php echo $str1?></b></span>
            </div>
            <p>Classes Conducted & Scheduled</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <div class="number asap-font">
             <?php $con=mysqli_connect("localhost","root","Pathshala@1a","pathshal_pathshala");
			$sql4="SELECT count(teacher_id) FROM `wl_teacher_follow_record` WHERE teacher_id='$res[teacher_id]'" ;
			$result4=mysqli_query($con,$sql4);
			$row4=mysqli_fetch_row($result4);
			$str4 = implode($row4); 
			 ?>
              <b><span data-toggle="counter-up"> <?php echo $str4?></b></span>
            </div>
            <p>Followers</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section --><br>
	<div class="container">
	<div class="col-md-12 add-desc-box">
            <div class="ads-details">
			<div class="breadcrumb-area">
                <div class="breadcrumb-bottom">
                  <ul>
                    <li style="padding:0 5px;"><a href="JavaScript:Void(0);"> Rating's</a> <span><i class="fa fa-angle-double-right"></i>Based on <span style="color:#F90;font-weight:bold;"><?php echo round($total/6);?> students</span> rating</span> <span><i class="fa fa-angle-double-right"></i><span style="color:#F90;font-size: 18px;">
                    
                     <?php echo number_format($allratingAveragerating/6, 1, '.', '');//echo round($allratingAveragerating/6);?></span>/ 5</span></li>
                  </ul>
                </div>
              </div>
			<?php 
		 $accountType=$res['account_type'];
		 if($accountType=='0'){
			 $heading1="Conceptual Clarity";
			 $heading2="Teaching Style";
			 $heading3="Discipline";
			 $heading4="Study Material";
			 $heading5="Location (Female Friendly)";
			 $heading6="Infrastructure";
			 }else{
			 $heading1="Conceptual Clarity";
			 $heading2="Student Friendly Teaching Style";
			 $heading3="Time Flexibility";
			 $heading4="Study Material";
			 $heading5="Student Safety";
			 $heading6="Feedback Session";
			 }
		 ?>
              <div class="row" style="border:1px solid #ccc;margin-left:0;margin-right:0;">
                <div class="col-md-4 pb-10 pt-10">
                  <div class="col-md-3"><!--<i class="fa fa-2x fa-university"></i>--><img src="<?php echo theme_url(); ?>/tutor_img/Conceptual-Clarity.png" /></div>
                  <div class="col-md-9">
                    <label> <?php echo $heading1;?> : </label>
                    <!--<br><span class="item-location"><span style="color:#F90;font-size: 18px;">4.5</span>/ 5</span>--></div>
                  <div class="post-action"> 
                    <!-- Rating Bar -->
                    <?php if($this->session->userdata('user_id') > 0 ){?>
                    <input id="post_<?= $id ?>" value='<?= $rating ?>' class="rating-loading ratingbar" data-min="0" data-max="5" data-step="1">
                    <!-- Average Rating -->
                    <div>Average Rating: <span style="color:#F90;font-weight:bold;" id='averagerating_<?= $id ?>'>
                      <?= $averagerating  ?>
                      </span></div>
                    <?php }else{?>
                    <a onclick="location.href = '<?php echo base_url();?>users/login';">
                    <input id="post_<?= $id ?>" value='<?= $averagerating ?>' class="rating-loading ratingbar pass" data-min="0" data-max="5" data-step="1"  disabled title="Your have to login first" onclick="location.href = '<?php echo base_url();?>users/login';">
                    
                    <!-- Average Rating -->
                    <div>Average Rating: <span style="color:#F90;font-weight:bold;" id='averagerating_<?= $id ?>'>
                      <?= $averagerating  ?>
                      </span></div>
                    </a>
                    <?php }?>
                  </div>
                </div>
                <div class="col-md-4 pb-10 pt-10">
                  <div class="col-md-3"><!--<i class="fa fa-2x fa-users"></i>--><img src="<?php echo theme_url(); ?>/tutor_img/Teaching-Style.png" /></div>
                  <div class="col-md-9">
                    <label> <?php echo $heading2;?> : </label>
                    <!--<br><span class="item-location"><span style="color:#F90;font-size: 18px;">4.5</span>/ 5</span>--></div>
                  <div class="post-action">
                    <?php if($this->session->userdata('user_id') > 0 ){?>
                    <!-- Rating Bar -->
                    <input id="post_<?= $id ?>" value='<?= $teachingrating ?>' class="rating-loading ratingbars" data-min="0" data-max="5" data-step="1" >
                    <!-- Average Rating -->
                    <div >Average Rating: <span style="color:#F90;font-weight:bold;" id='teachingstyle_<?= $id ?>'>
                      <?= $teachingaveragerating ?>
                      </span></div>
                    <?php }else{?>
                    <a onclick="location.href = '<?php echo base_url();?>users/login';">
                    <input id="post_<?= $id ?>" value='<?= $teachingaveragerating ?>' class="rating-loading pass ratingbars" data-min="0" data-max="5" data-step="1" disabled title="Your have to login first">
                    <!-- Average Rating -->
                    <div >Average Rating: <span style="color:#F90;font-weight:bold;" id='teachingstyle_<?= $id ?>'>
                      <?= $teachingaveragerating ?>
                      </span></div>
                    </a>
                    <?php }?>
                  </div>
                </div>
                <div class="col-md-4 pb-10 pt-10">
                  <div class="col-md-3"><img src="<?php echo theme_url(); ?>/tutor_img/Discipline.png" /><!--<i class="fa fa-2x fa-child"></i>--></div>
                  <div class="col-md-9">
                    <label> <?php echo $heading3;?> :</label>
                    <!--<br><span class="item-location"><span style="color:#F90;font-size: 18px;">4.5</span>/ 5</span>--></div>
                  <div class="post-action">
                    <?php if($this->session->userdata('user_id') > 0 ){?>
                    <!-- Rating Bar -->
                    <input id="post_<?= $id ?>" value='<?= $disciplineaveragerating ?>' class="rating-loading pass ratingbarss" data-min="0" data-max="5" data-step="1" >
                    <!-- Average Rating -->
                    <div >Average Rating: <span style="color:#F90;font-weight:bold;" id='discipline_<?= $id ?>'>
                      <?= $disciplineaveragerating ?>
                      </span></div>
                    <?php }else{?>
                    <a onclick="location.href = '<?php echo base_url();?>users/login';">
                    <input id="post_<?= $id ?>" value='<?= $disciplineaveragerating ?>' class="rating-loading pass ratingbarss" data-min="0" data-max="5" data-step="1" disabled title="Your have to login first">
                    <!-- Average Rating -->
                    <div >Average Rating: <span style="color:#F90;font-weight:bold;" id='discipline_<?= $id ?>'>
                      <?= $disciplineaveragerating ?>
                      </span></div>
                    </a>
                    <?php }?>
                  </div>
                </div>
                <div class="col-md-4 pb-10 pt-10">
                  <div class="col-md-3"><!--<i class="fa fa-2x fa-graduation-cap"></i>--><img src="<?php echo theme_url(); ?>/tutor_img/Study-Material.png" /></div>
                  <div class="col-md-9">
                    <label> <?php echo $heading4;?> :</label>
                    <!--<br><span class="item-location"><span style="color:#F90;font-size: 18px;">4.5</span>/ 5</span>--></div>
                  <div class="post-action">
                    <?php if($this->session->userdata('user_id') > 0 ){?>
                    <!-- Rating Bar -->
                    <input id="post_<?= $id ?>" value='<?= $studymaterialaveragerating ?>' class="rating-loading studymaterial pass " data-min="0" data-max="5" data-step="1" >
                    <!-- Average Rating -->
                    <div >Average Rating: <span style="color:#F90;font-weight:bold;" id='studymaterial_<?= $id ?>'>
                      <?= $studymaterialaveragerating ?>
                      </span></div>
                    <?php }else{?>
                    <a onclick="location.href = '<?php echo base_url();?>users/login';">
                    <input id="post_<?= $id ?>" value='<?= $studymaterialaveragerating ?>' class="rating-loading studymaterial" data-min="0" data-max="5" data-step="1" disabled title="Your have to login first">
                    <!-- Average Rating -->
                    <div >Average Rating: <span style="color:#F90;font-weight:bold;" id='studymaterial_<?= $id ?>'>
                      <?= $studymaterialaveragerating ?>
                      </span></div>
                    </a>
                    
                    <?php }?>
                  </div>
                </div>
                <div class="col-md-4 pb-10 pt-10">
                  <div class="col-md-3"><!--<i class="fa fa-2x fa-map-marker"></i>--><img src="<?php echo theme_url(); ?>/tutor_img/Female-Friendly-Location.png" /></div>
                  <div class="col-md-9">
                    <label> <?php echo $heading5;?> :</label>
                    <!--<br><span class="item-location"><span style="color:#F90;font-size: 18px;">4.5</span>/ 5</span>--></div>
                  <div class="post-action">
                    <?php if($this->session->userdata('user_id') > 0 ){?>
                    <!-- Rating Bar -->
                    <input id="post_<?= $id ?>" value='<?= $locationsrating ?>' class="rating-loading locations" data-min="0" data-max="5" data-step="1" >
                    <!-- Average Rating -->
                    <div >Average Rating: <span style="color:#F90;font-weight:bold;" id='locations_<?= $id ?>'>
                      <?= $locationsaveragerating ?>
                      </span></div>
                    <?php }else{?>
                    <a onclick="location.href = '<?php echo base_url();?>users/login';">
                    <input id="post_<?= $id ?>" value='<?= $locationsaveragerating ?>' class="rating-loading locations" data-min="0" data-max="5" data-step="1" disabled title="Your have to login first">
                    <!-- Average Rating -->
                    <div >Average Rating: <span style="color:#F90;font-weight:bold;" id='locations_<?= $id ?>'>
                      <?= $locationsaveragerating ?>
                      </span></div>
                    </a>
                    <?php }?>
                  </div>
                </div>
                <div class="col-md-4 pb-10 pt-10">
                  <div class="col-md-3"><!--<i class="fa fa-2x fa-industry"></i>--><img src="<?php echo theme_url(); ?>/tutor_img/Infrastructure.png" /></div>
                  <div class="col-md-9">
                    <label> <?php echo $heading6;?> :</label>
                    <!--<br><span class="item-location"><span style="color:#F90;font-size: 18px;">4.5</span>/ 5</span>--></div>
                  <div class="post-action">
                    <?php if($this->session->userdata('user_id') > 0 ){?>
                    <!-- Rating Bar -->
                    <input id="post_<?= $id ?>" value='<?= $infrastructurerating ?>' class="rating-loading infrastructure" data-min="0" data-max="5" data-step="1" >
                    <!-- Average Rating -->
                    <div >Average Rating: <span style="color:#F90;font-weight:bold;" id='infrastructure_<?= $id ?>'>
                      <?= $infrastructureaveragerating ?>
                      </span></div>
                    <?php }else{?>
                    <a onclick="location.href = '<?php echo base_url();?>users/login';">
                    <input id="post_<?= $id ?>" value='<?= $infrastructureaveragerating ?>' class="rating-loading infrastructure loginActive" data-min="0" data-max="5" data-step="1" disabled title="Your have to login first" >
                    <!-- Average Rating -->
                    <div >Average Rating: <span style="color:#F90;font-weight:bold;" id='infrastructure_<?= $id ?>'>
                      <?= $infrastructureaveragerating ?>
                      </span></div>
                    </a>
                    <?php }?>
                  </div>
                </div>
              </div>
			<p>&nbsp;</p>
              <?php if(!empty($res['youtube'])){?>
              <div class="row">
                <div class="col-md-12">
                  <iframe width="100%" height="345" src="https://www.youtube.com/embed/<?php echo $res['youtube'];?>?autoplay=1"> </iframe>
                </div>
              </div>
              <?php }?>
              <p>&nbsp;</p>
              <div class="row">
                <?php if(!empty($res['image1'])){?>
                <div class="col-md-6"> <img class="image-link" src="<?php echo get_image('gallery',$res['image1'],400,250,'AR');?>"/> </div><br>
                <?php }?>
                <?php if(!empty($res['image2'])){?>
                <div class="col-md-6"> <img class="image-link" src="<?php echo get_image('gallery',$res['image2'],400,250,'AR');?>"/> </div><br>
                <?php }?>
				</div><br><div class="row">
                <?php if(!empty($res['image3'])){?>
                <div class="col-md-6"> <img class="image-link" src="<?php echo get_image('gallery',$res['image3'],400,250,'AR');?>"/> </div><br>
                <?php }?>
                <?php if(!empty($res['image4'])){?>
                <div class="col-md-6"> <img class="image-link" src="<?php echo get_image('gallery',$res['image4'],400,250,'AR');?>"/> </div><br>
                <?php }?>
              </div>
              <h3>Download PDF</h3>
              <?php if(!empty($res['pdf'])){?>
              <div class="row">
                <div class="col-md-4"><span>File 1:</span> <a  href="<?php echo base_url();?>uploaded_files/teacher/<?php echo $res['pdf'];?>" target="_blank" download><img src="<?php echo theme_url(); ?>/tutor_img/pdficon.png"></a></div>
              <?php }?>
              <?php if(!empty($res['pdf1'])){?>
                <div class="col-md-4"><span>File 2:</span> <a  href="<?php echo base_url();?>uploaded_files/teacher/<?php echo $res['pdf1'];?>" target="_blank" download><img src="<?php echo theme_url(); ?>/tutor_img/pdficon.png"></a></div>
              <?php }?>
              <?php if(!empty($res['pdf2'])){?>
                <div class="col-md-4"><span>File 3:</span> <a  href="<?php echo base_url();?>uploaded_files/teacher/<?php echo $res['pdf2'];?>" target="_blank" download><img src="<?php echo theme_url(); ?>/tutor_img/pdficon.png"></a></div>
              </div><br>
              <?php }?>
			</div>
			</div>
			</div>
			 <!--/.add-desc-box-->
<div class="container">         
		 <div class="table-responsive">
            <?php 
    if(is_array($res_array) && !empty($res_array)) { 
   ?>
            <table class="table">
              <thead>
                <tr>
                  <th></th>
                  <th>Category</th>
                  <th>Subject</th>
                  <th>Class</th>
                  <th>City</th>
                  <th>Location</th>
                  <th>Fee</th>
                  <th>Send Connection Request</th>
                </tr>
              </thead>
              <tbody>
                <?php 
	 $s=$sn;	
	 foreach($res_array as $val) {
	?>
                <tr>
                  <td><?php echo $sno++;?></td>
                  <td><?php echo get_cat_name($val['category']);?></td>
                  <td><?php echo get_cat_name($val['subject']);?></td>
                  <td><?php echo get_cat_name($val['class']);?></td>
                  <td><?php echo get_city($val['city_id']);?></td>
                  <td><?php echo $val['location'];?></td>
                  <td><?php echo $val['fee'];?></td>
                  <td><?php if($this->session->userdata('user_id') > 0 ){?>
                    <a href="<?= base_url();?>teacher/notified/<?= $val['id']?>" onclick="return confirm('Are you sure  notified <?= $res['first_name']?>')" class="btn-success btn-sm bold">Send Request</a>
                    <?php }else{?>
                    <a href="<?= base_url();?>users/login" class="btn-success btn-sm bold">Send Request</a>
                    <?php }?></td>
				
                </tr>
                <?php } ?>
              </tbody>
            </table>
            <?php } ?>
          </div>
		  </div>
	

	
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url(); ?>mentor/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>mentor/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>mentor/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url(); ?>mentor/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo base_url(); ?>mentor/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="<?php echo base_url(); ?>mentor/assets/vendor/counterup/counterup.min.js"></script>
  <script src="<?php echo base_url(); ?>mentor/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?php echo base_url(); ?>mentor/assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url(); ?>mentor/assets/js/main.js"></script>
  
</body>

</html>
<!-- trial code end here -->
<?php $this->load->view('bottom_application'); ?>
<div id="wait" style="display:none;"><br>
  Loading..</div>
<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel ="stylesheet">
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> 






<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<link href='<?php echo theme_url();?>bootstrap-star-rating/css/star-rating.min.css' type='text/css' rel='stylesheet'>
<script src='<?php echo theme_url();?>bootstrap-star-rating/js/star-rating.min.js' type='text/javascript'></script> 
<script type="text/javascript">
    document.getElementsByClassName("loginActive").onclick = function () {
        location.href = "<?php echo base_url();?>users/login";
    };
</script> 
<script type='text/javascript'>
	$('.pass').click(function () {
		location.href = "<?php echo base_url();?>/users/login"
	});
	$(document).ready(function(){
		// Initialize
		$('.ratingbar').rating({
	    	showCaption:false,
	    	showClear: false,
	    	size: 'sm'
	    });
		// Rating change
	    $('.ratingbar').on('rating:change', function(event, value, caption) {
	    	var id = this.id;
	    	var splitid = id.split('_');
	    	var entity_id = splitid[1];
	    	
		   	$.ajax({
		   		url: '<?php echo base_url(); ?>teacher/updateRating',
		   		type: 'post',
		   		data: {entity_id: entity_id, rating: value},
		   		success: function(response){
		   			$('#averagerating_'+entity_id).text(response);
		   		}
		   	});
		});
	});
</script> 
<script type='text/javascript'>
	$(document).ready(function(){
		// Initialize
		$('.ratingbars').rating({
	    	showCaption:false,
	    	showClear: false,
	    	size: 'sm'
	    });
		// Rating change
	    $('.ratingbars').on('rating:change', function(event, value, caption) {
	    	var id = this.id;
	    	var splitid = id.split('_');
	    	var entity_id = splitid[1];
	    	$.ajax({
		   		url : '<?php echo base_url(); ?>teacher/teachingUpdateRating',
		   		type: 'post',
		   		data: {entity_id: entity_id, rating: value},
		   		success: function(response){
		   			$('#teachingstyle_'+entity_id).text(response);
		   		}
		   	});
		});
	});
</script> 
<script type='text/javascript'>
	$(document).ready(function(){
		// Initialize
		$('.ratingbarss').rating({
	    	showCaption:false,
	    	showClear: false,
	    	size: 'sm'
	    });
		// Rating change
	    $('.ratingbarss').on('rating:change', function(event, value, caption) {
	    	var id = this.id;
	    	var splitid = id.split('_');
	    	var entity_id = splitid[1];
	    	$.ajax({
		   		url : '<?php echo base_url(); ?>teacher/disciplineUpdateRating',
		   		type: 'post',


		   		data: {entity_id: entity_id, rating: value},
		   		success: function(response){
		   			$('#discipline_'+entity_id).text(response);
		   		}
		   	});
		});
	});
</script> 
<script type='text/javascript'>
	$(document).ready(function(){
		// Initialize
		$('.studymaterial').rating({
	    	showCaption:false,
	    	showClear: false,
	    	size: 'sm'
	    });
		// Rating change
	    $('.studymaterial').on('rating:change', function(event, value, caption) {
	    	var id = this.id;
	    	var splitid = id.split('_');
	    	var entity_id = splitid[1];
	    	$.ajax({
		   		url : '<?php echo base_url(); ?>teacher/studymaterialUpdateRating',
		   		type: 'post',
		   		data: {entity_id: entity_id, rating: value},
		   		success: function(response){
		   			$('#studymaterial_'+entity_id).text(response);
		   		}
		   	});
		});
	});
</script> 
<script type='text/javascript'>
	$(document).ready(function(){
		// Initialize
		$('.locations').rating({
	    	showCaption:false,
	    	showClear: false,
	    	size: 'sm'
	    });
		// Rating change
	    $('.locations').on('rating:change', function(event, value, caption) {
	    	var id = this.id;
	    	var splitid = id.split('_');
	    	var entity_id = splitid[1];
	    	$.ajax({
		   		url : '<?php echo base_url(); ?>teacher/locationsUpdateRating',
		   		type: 'post',
		   		data: {entity_id: entity_id, rating: value},
		   		success: function(response){
		   			$('#locations_'+entity_id).text(response);
		   		}
		   	});
		});
	});
</script> 
<script type='text/javascript'>
	$(document).ready(function(){
		// Initialize
		$('.infrastructure').rating({
	    	showCaption:false,
	    	showClear: false,
	    	size: 'sm'
	    });
		// Rating change
	    $('.infrastructure').on('rating:change', function(event, value, caption) {
	    	var id = this.id;
	    	var splitid = id.split('_');
	    	var entity_id = splitid[1];
	    	$.ajax({
		   		url : '<?php echo base_url(); ?>teacher/infrastructureUpdateRating',
		   		type: 'post',
		   		data: {entity_id: entity_id, rating: value},
		   		success: function(response){
		   			$('#infrastructure_'+entity_id).text(response);
		   		}
		   	});
		});
	});
</script> 
<script type='text/javascript'>
	$(document).ready(function(){
		//$(".filled-stars").css('width',"100%");
	});
</script>
<script>
$(document).ready(function() {
  $('.image-link').magnificPopup({type:'image'});
});
</script>
<style>
    .rating-container .filled-stars {
    position: absolute;
    left: 0;
    top: 0;
    margin: auto;
    color: #fde16d;
    white-space: nowrap;
    overflow: hidden;
    -webkit-text-stroke: 1px #777;
    text-shadow: 1px 1px #999;
}.glyphicon {
    position: relative;
    top: 1px;
    display: inline-block;
    font-family: 'Glyphicons Halflings';
    font-style: normal;
    font-weight: 400;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
</style>
