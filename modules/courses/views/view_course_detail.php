 
<?php $mem_info=get_db_single_row('wl_teacher',$fields="first_name,description,is_verified,current_credit,profile_edit,plan_expire,email_verify,teacher_id",$condition="WHERE 1 AND teacher_id='".$res[teacher_id]."'");
$con=mysqli_connect("localhost", "root","Pathshala@1a", "pathshal_newlms");
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	
	
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

 
</head>

<body>
<header><?php $this->load->view("top_application");?></header>
	<div class="container-fluid">
		<div class="row courseContainer mb-3 ">
			<div class="d-flex flex-column p-2 col-12 col-lg-7">
			<?php 
			$cat=$res['category_id'];
			$sql1="SELECT category_name FROM `tbl_department`  where `category_id`='$cat'";
			$result1=mysqli_query($con, $sql1);
			$row1=mysqli_fetch_row($result1);
			$cat1 = implode($row1);
	  		?>
				<h4 class="typeofcourse">Courses > <?php echo $cat1?> </h4>
				<!-- <?php echo $res['courses_name']?>-->
			<div class="d-flex flex-column mainCourseContainer">
				<h1 class="maincourseHeading"><?php echo $res['courses_name']?></h1>
					<p class="mainCourseDetail"><?php echo substr($res['courses_description'],0,50)?></p>
					<p class="mainCourseInstructor"><a href="<?php echo base_url();?>teacher/profile/<?php echo $mem_info['teacher_id'];?>/<?php echo url_title($mem_info['first_name']);?>" target="_blank"><?php echo $mem_info[first_name]?></a></p>
					<!--<p class="mainStarRating"><span class="mainStarCount">4.6 <span class="starmargin" >
						<//?php for ($x = 1; $x <= 5; $x++) {?>
							<i class="fa fa-star <//?php if($x > $rating){echo "-o";}?> starcolor"></i>
						<//?php }?> 
							</span></span> (42998)</p>-->
					<p class="mainfees"><?php if($res['price']==1){?> &#x20B9; Free</p> 
							   <?php }else{ ?>
							   <div class="d-flex flex-row">
                                <p class="pricedetail2 mr-5 ml-1">&#x20B9; <?php echo $res['price'];?> </p>
                                <p class="pricedetail2 ml-5">Credit Point : <?php echo $res['credit_price'];?></p></div>
                                <?php }?>
								
								
		<div class="d-flex flex-row">
			<!--<button class="btn addToCartButton mr-3">Add to Cart</button>
			<button class="btn btn-outline-info mainbuyButton">Buy Now</button>-->
			
			<?php if($this->session->userdata('user_id') > 0 ){?>
                     <a href="<?php echo base_url();?>/courses/enrollDetail/<?php echo $val['courses_id']?>" ><button class="btn btn-outline-info mainbuyButton">Pay Now</button></a>
                     
                       <?php if($val['price']!=1){?>
                       
                     <a href="<?php echo base_url();?>/courses/enrollDetailStoreCredit/<?php echo $val['courses_id']?>" ><button class="btn btn-outline-info mainbuyButton">Use credit Points</button></a>
                      <?php }?>
                      <?php }else{?>
                     <a href="<?php echo base_url();?>users/login" ><button class="btn btn-outline-info mainbuyButton">Login Now</button></a>
                      <?php }?>    
			
			
        </div>		
		</div> 
		</div>
	<div class="columnImage d-none d-lg-block p-5 col-5">
		<?php if(!empty($res['image'])) {?>
		<img class="main_img " src="<?php echo base_url();?>lms/uploaded_files/courses/<?php echo $res['image']?>" alt="img"/>
		<?php } else {?>
                   <img class="main_img" src="https://pathshala.co/uploaded_files/thumb_cache/thumb_190_190_noimg1.gif"/><!--class="openPopup"-->
                        <?php }?>
	</div>
	</div>
	<div class="row">
		<div class="col-12 col-lg-6">
		<div class="d-flex flex-column pr-5">
		<h1 class="heading_m">Description</h1>
		<b class="desc"><?php echo $res['courses_description']?></b>
		</div>
		</div>
		<div class="col-12 col-lg-6">
		<div class="d-flex flex-column p-3">
		<h1 class="heading_m">Instructor</h1>
		<div class="d-flex flex-row mb-lg-3">
		<div class="d-flex flex-column instructorAboutContainer pt-lg-3">
		
		<img class="instructorImage ml-4 mb-2" src="<?php echo get_image('teacher',$val['picture'],190,190,'AR');?>" alt="instructor"/>
		<p class="instructorName"><a href="<?php echo base_url();?>teacher/profile/<?php echo $mem_info['teacher_id'];?>/<?php echo url_title($mem_info['first_name']);?>" target="_blank"><?php echo $mem_info[first_name]?></a></p>
		</div>
		<div class="d-flex flex-column instructorIconsContainer pt-3">
		<p class="iconText"><span class="mr-3">
		<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-star-fill starIcon mt-auto mb-auto" viewBox="0 0 16 16">
  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
</svg></span><?php $rating = get_rating('',$mem_info['teacher_id'])?><?php echo $rating;?>/5 Rating</p>

<!--<p class="iconText">
		<span class="mr-2 reviewIcon mt-auto mb-auto" width="22" height="22">&#129351;</span> 120 reviews</p>-->

<!--<p class="iconText"><span class="mr-3">
		<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-people-fill studentsIcon mt-auto mb-auto" viewBox="0 0 16 16">
  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
  <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
</svg></span>25 Students</p>-->

<?php 
			$id1=$mem_info['teacher_id'];
			$sql2="SELECT count(courses_id) FROM `tbl_courses` where `teacher_id`='$id1'" ;
			$result2=mysqli_query($con,$sql2);
			$row2=mysqli_fetch_row($result2);
			$str2 = implode($row2); 
			 ?>

<p class="iconText"><span class="mr-3">
		<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-play-circle-fill videoIcon mt-auto mb-auto" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z"/>
</svg></span><?php echo $str2?> Courses</p>
		
		</div>
		</div>
		<h2 class="description2">About Instructor</h2>
		<p class="instructorDescription"><?php echo substr($mem_info['description'],0,80);?>...</p>
		</div>
		</div>
		</div>
		
		<h1 class="headings">Similiar <?php echo $cat1?></h1>
		<div class="col-12">
		<div class="d-flex flex-row courseMain mb-3">
		<?php
			
			$scccat=$res['category_id'];
			$scc="SELECT * FROM `tbl_courses` where `category_id`='$scccat' ORDER BY courses_id desc limit 10";
			$query=mysqli_query($con,$scc);
      foreach($query as $sccr){
	  		?>
		
		<div class="d-flex flex-column coursePage shadow p-2 m-2">
		<?php if(!empty($sccr['image'])) {?>
		<a href="<?php echo base_url();?>courses/detail/<?php echo $sccr['courses_friendly_url']?>"><img class="courseThumbnail mb-2" src="<?php echo base_url();?>lms/uploaded_files/courses/<?php echo $sccr['image']?>" alt="img"/></a>
		<?php } else {?>
                       <a href="<?php echo base_url();?>courses/detail/<?php echo $sccr['courses_friendly_url']?>"><img class="courseThumbnail mb-2" src="https://pathshala.co/uploaded_files/thumb_cache/thumb_190_190_noimg1.gif"/></a><!--class="openPopup"-->
                        <?php }?>
	  <div style="height:50px;">
		<h4 class="courseHeading"><a href="<?php echo base_url();?>courses/detail/<?php echo $sccr['courses_friendly_url']?>"><?php echo $sccr['courses_name']?></a></h4>
		</div>
		<div style="height:25px;">
		<p class="courseInstructor"><a href="<?php echo base_url();?>teacher/profile/<?php echo $mem_info['teacher_id'];?>/<?php echo url_title($mem_info['first_name']);?>" target="_blank"><?php echo $mem_info['first_name']?></a></p>
		</div>
		<!--<div style="height:35px;">
		<p class="starRating"><span class="starCount">4.6 <span >
		  <//?php for ($x = 1; $x <= 5; $x++) {?>
                <i class="fa fa-star <//?php if($x > $rating){echo "-o";}?> starcolor"></i>
              <//?php }?> 
                </span></span> (42998)</p>
				</div>-->
				<div class="mb-2" style="height:35px;">
				<p class="fees"><span class="rupeeIcon"></span><?php if($sccr['price']==1){?> &#x20B9; Free</p> 
							   <?php }else{ ?>
							   <div class="d-flex flex-row">
                                <p class="mr-auto ml-1 pricedetail3">&#x20B9;<?php echo $sccr['price'];?></p>    
                                <p class="pricedetail3  ml-auto mr-3">Credit Point :<?php echo $sccr['credit_price'];?></p></div>
                                <?php }?>
					</div>
								
	 <div style="height:30px;">
		<div class="d-flex flex-row">
			
			
			<?php if($this->session->userdata('user_id') > 0 ){?>
                     <a href="<?php echo base_url();?>/courses/enrollDetail/<?php echo $sccr['courses_id']?>" ><button class="btn btn-outline-info buyButton">Pay Now</button></a>
                     
                       <?php if($val['price']!=1){?>
                       
                       <a href="<?php echo base_url();?>/courses/enrollDetailStoreCredit/<?php echo $sccr['courses_id']?>" ><button class="btn btn-outline-info buyButton">Use credit Points</button></a>
                      <?php }?>
                
                      <?php }else{?>
                     <a href="<?php echo base_url();?>users/login" ><button class="btn btn-outline-info buyButton">Login Now</button></a>
                      <?php }?>     
			
        </div>	
		</div>
	
		</div> 
		<?php } ?>
		</div>
		</div>
		
		
		<!--<h1 class="heading_m">Reviews</h1>
	 <div class="row mb-3">
	 <div class="col-12 col-lg-6">
		<div class="d-flex flex-column ml-auto mr-auto p-3 ">
			<div class="d-flex flex-column mb-3">
			<div class="d-flex flex-row">
			<img class="reviewerImage ml-3"src="https://pathshala.co/uploaded_files/thumb_cache/thumb_190_190_noimg1.gif" alt="review"/>
			<div class="d-flex flex-column ml-2 mt-auto mb-auto w-50">
			<h1 class="reviewerName">Shaik Afreen</h1>
			<p class="reviewDate">June 16, 2020</p>
			<p class="reviewText d-none d-md-inline mt-2">Review: Excellent course for my child</p>
			</div>
			</div>
			<p class="reviewText d-md-none mt-2">Review: Excellent course for my child</p> 
			</div>
			<hr class="hrline">
			<div class="d-flex flex-column mb-3">
			<div class="d-flex flex-row">
			<img class="reviewerImage ml-3"src="https://pathshala.co/uploaded_files/thumb_cache/thumb_190_190_noimg1.gif" alt="review"/>
			<div class="d-flex flex-column ml-2 mt-auto mb-auto w-50">
			<h1 class="reviewerName">Shaik Afreen</h1>
			<p class="reviewDate">June 16, 2020</p>
			<p class="reviewText d-none d-md-inline mt-2">Review: Excellent course for my child</p>
			</div>
			</div>
			<p class="reviewText d-md-none mt-2">Review: Excellent course for my child</p> 
			</div>
			<a href="" class="more text-center">More +</a>
		</div>
		</div>
		<div class="col-12 col-lg-6">
		<div class="d-flex flex-column ml-auto mr-auto">
		<h1 class="reviewName">Name</h1>
		<div class="d-flex flex-row mb-3">
		<input class="inputName mr-3" type="text" placeholder="Name"> </input>
		<button class="btn btn-warning addPhoto">ADD PHOTO</button>
		</div>
		<h1 class="reviewName">Your Review</h1>
		<textarea class="inputText mb-2" cols="20" rows="5" type="text" placeholder="Write Your Review"></textarea>
		<button class="btn btn-danger ml-auto mr-3 submitButton">SUBMIT</button>
		</div>
		</div>
		</div>-->
		
	</div>
	</div>
	</body>
</html>
<?php $this->load->view("bottom_application");?>

<style>
header{
	height: 100px;
}
.courseContainer{
	background-image:linear-gradient(to right,#9B2424,#F62A2A);
	
	margin-top:30px;
	background-size:cover;
}
.mainCourseContainer{
	padding-top:5px;
	padding-left:50px;
	background-size:cover;
}
.main_img{
	width:30vw;
	height:35vh;
}
.typeofcourse{
	padding-left:40px;
	padding-top:10px;
	font-weight:bold;
	font-family:"Georgia";
	color:grey;
}
.maincourseHeading{
	font-size:30px;
	color:white;
	font-weight:bold;
	font-family:"Georgia";
	margin-bottom:5px;
}
.mainCourseDetail{
	color:black;
	font-weight:bold;
	font-family:"Georgia";
	margin-bottom:5px;
}
.mainCourseInstructor{
	font-size:17px;
	color:grey;
	font-weight:bold;
	font-family:"Georgia";
	margin-bottom:5px;
}

.mainStarRating{
	font-family:"Georgia";
	margin-bottom:10px;
	font-size:17px;
	font-weight:bold;

}
.mainStarCount{
	color:#EF861E;
	margin-right:10px;
}
.starmargin{
	margin-left:10px;
}
.addToCartButton{
	border-radius:10px;
	padding-left:50px;
	padding-right:50px;
	padding-top:5px;
	padding-bottom:5px;
	background-color:black;
	color:white;
	font-weight:bold;
	font-family:"Georgia";
}
.mainbuyButton{
	border-radius:10px;
	padding-left:40px;
	padding-right:40px;
	padding-top:5px;
	padding-bottom:5px;
	font-weight:bold;
	margin-right:5px;
	margin-left:5px;
	font-family:"Georgia";
}
.mainfees{
	color:white;
	font-family:"Georgia";
	font-size:32px;
	font-weight:bold;
	margin-bottom:20px;
	
}
.courseMain{
	overflow-x:scroll;
	width:cover;
}
.coursePage{
	width:290px;
	height:300px;
}
.courseThumbnail{
	width:270px;
	height:110px;
}
.courseHeading{
	font-size:13px;
	color:black;
	font-weight:bold;
	font-family:"Georgia";
	margin-bottom:0px;
}
.courseInstructor{
	font-size:15px;
	color:black;
	font-family:"Georgia";
	margin-bottom:0px;
}
.starRating{
	font-family:"Georgia";
	margin-bottom:10px;
}
.starCount{
	color:red;
}
.rupeeIcon{
	color:black;
	background-color:white;
}
.pricedetail2{
	font-size:20px;
	color:black;
	font-family:"Georgia";
}
.pricedetail3{
	font-size:18px;
	color:black;
	font-family:"Georgia";
}
.buyButton{
	border-radius:10px;
	padding-left:15px;
	padding-right:15px;
	padding-top:2px;
	margin-left:5px;
	margin-right:5px;
	padding-bottom:2px;
}
.fees{
	color:red;
	font-family:"Georgia";
	font-size:20px;
	font-weight:bold;
}
.starcolor{
	color:yellow;
}

.heading_m,.headings{
	font-family:"Georgia";
	font-size:35px;
	font-weight:bold;
	color:black;
	margin-bottom:10px;
}
.desc{
	font-weight:bold;
	font-family:"Georgia";
	color:grey;
	font-size:17px;
}
.instructorImage{
	height:120px;
	width:120px;
	border:1px solid grey;
	border-radius:100px;
	align:center;
}
.instructorName{
	font-weight:bold;
	font-family:"Georgia";
	color:grey;
	padding-left:0px;
	font-size:20px;
}
.description2{
	font-weight:bold;
	font-family:"Georgia";
	color:grey;
	font-size:20px;
	text-decoration:underline;
}
.instructorDescription{
	font-weight:bold;
	font-family:"Georgia";
	color:grey;
	font-size:15px;
}
.iconText{
	font-weight:bold;
	font-family:"Georgia";
	color:grey;
	font-size:18px;
	margin-bottom:7px;
}
.reviewName{
	font-weight:bold;
	font-family:"Georgia";
	font-size:20px;
	
}
.inputName{
	border-radius:10px;
	border:1px solid black;
	width:70%;
}
.inputText{
	border-radius:10px;
	border:1px solid black;
	width:cover;
}
.addPhoto{
	border-radius:10px;
	font-family:"Georgia";
	font-weight:bold;
	width:30%;
}
.submitButton{
	border-radius:20px;
	padding:5px 30px 5px 30px;
	font-family:"Georgia";
	font-weight:bold;
}
.reviewerImage{
	height:100px;
	width:100px;
	border:1px solid grey;
	border-radius:100px;
}
.reviewerName{
	font-weight:bold;
	font-family:"Georgia";
	color:black;
	font-size:20px;
	margin:0px;
}
.reviewDate{
	font-weight:bold;
	font-family:"Georgia";
	color:black;
	font-size:12px;
	margin:0px;
}
.reviewText{
	font-weight:bold;
	font-family:"Georgia";
	color:black;
	font-size:18px;
	margin:0px;
}
.more{
	font-weight:bold;
	font-family:"Georgia";
	color:blue;
	font-size:18px;
}
.hrline{
	color:black;
	width:80%;
	margin-left:0px;
	height:1px;
}
.videoIcon{
	color:red;
}
.studentsIcon{
	color:black;
}
.starIcon,.reviewIcon{
	color:#F5CA2B ;
}

@media (max-width: 700px) {
.typeofcourse{
	padding-left:20px;
	padding-top:15px;
	font-weight:bold;
	font-family:"Georgia";
	color:grey;
}
.mainCourseContainer{
	padding-top:5px;
	padding-left:30px;
	background-size:cover;
}
.maincourseHeading{
	font-size:20px;
	color:white;
	font-weight:bold;
	font-family:"Georgia";
	margin-bottom:5px;
}
.mainCourseDetail{
	color:black;
	font-weight:bold;
	font-family:"Georgia";
	margin-bottom:2px;
}
.mainCourseInstructor{
	font-size:15px;
	color:grey;
	font-weight:bold;
	font-family:"Georgia";
	margin-bottom:2px;
}

.mainStarRating{
	font-family:"Georgia";
	margin-bottom:15px;
	font-size:15px;
	font-weight:bold;
}
.mainfees{
	color:white;
	font-family:"Georgia";
	font-size:25px;
	font-weight:bold;
	margin-bottom:20px;	
}
.mainbuyButton{
	border-radius:10px;
	padding-left:15px;
	padding-right:15px;
	padding-top:5px;
	padding-bottom:5px;
	font-weight:bold;
	font-family:"Georgia";
}
.instructorImage{
	height:100px;
	width:100px;
	border:1px solid grey;
	border-radius:100px;
	align:center;
}
.instructorName{
	font-weight:bold;
	font-family:"Georgia";
	color:grey;
	padding-left:0px;
	font-size:15px;
}
.reviewerImage{
	height:120px;
	width:200px;
	border:1px solid grey;
	border-radius:100px;
}
.instructorAboutContainer{
	width:50%;
}
.instructorIconsContainer{
	width:50%;
}
.reviewerName{
	font-weight:bold;
	font-family:"Georgia";
	color:black;
	font-size:15px;
	margin:0px;
}
.reviewDate{
	font-weight:bold;
	font-family:"Georgia";
	color:black;
	font-size:10px;
	margin:0px;
}
.reviewText{
	font-weight:bold;
	font-family:"Georgia";
	color:black;
	font-size:12px;
	margin:0px;
}
.more{
	font-weight:bold;
	font-family:"Georgia";
	color:blue;
	font-size:18px;
}
.hrline{
	color:black;
	width:100%;
	margin-left:0px;
}
.headings{
	font-family:"Georgia";
	font-size:30px;
	font-weight:bold;
	color:black;
	margin-bottom:10px;
}
.iconText{
	font-weight:bold;
	font-family:"Georgia";
	color:grey;
	font-size:15px;
	margin-bottom:7px;
}
.reviewerImage{
	height:80px;
	width:100px;
	border:1px solid grey;
	border-radius:100px;
}
}
</style>
