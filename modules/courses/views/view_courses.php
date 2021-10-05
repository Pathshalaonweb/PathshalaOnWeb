<?php 
						$mem_info=get_db_single_row('wl_teacher',$fields="first_name,description,is_verified,current_credit,profile_edit,plan_expire,email_verify,teacher_id",$condition="WHERE 1 AND teacher_id='".$val[teacher_id]."'");
						
						?>
						
						<?php $con=mysqli_connect("localhost", "root","Pathshala@1a", "pathshal_newlms");?>

<!-- Trial Code -->

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
<header><?php $this->load->view('top_application');?></header>

	<div class="container-fluid" >
	<div class="row">
		<div class="d-flex flex-column col-12 col-lg-6 column_m1 ">
			<h1 class="heading">Find the Best Course & Become Master</h1>
			<p class="aboutp">School K-12 Subjects | NCERT Solutions | Competitve Coaching | College Courses</p>
			<div class="d-flex flex-row">
				<select name="category" onChange="searchFilter()" id="category" class="form-control form-control-new">
              <option value="">Select category</option>
              <?php 
	  		$db2 = $this->load->database('database2', TRUE);
			$sql="SELECT * FROM `tbl_department`  where status='1' AND parent_id='0' ORDER BY sort_order";
			$query=$db2->query($sql);
      foreach($query->result_array() as $val): 
        if($val['category_id'] == 23 || $val['category_id'] == 24)
        { }
        else {
	  		?>
              <option value="<?php echo $val['category_id']?>"><?php echo $val['category_name']?></option>
              <?php } endforeach;?>
            </select>
     
            <select id="subject" name="subject" onChange="searchFilter()" class="form-control form-control-new">
              <option value="">Select Subject</option>
            </select>
			
		</div>	
	</div>
	<div class="columnImage col-12 col-lg-6">
		<img class="main_img" src="<?php echo base_url();?>uploaded_files/userfiles/images/10516.jpg" alt="courses">	
	</div>
	</div>
	<?php $con=mysqli_connect("localhost", "root","Pathshala@1a", "pathshal_newlms");
			$sql2="SELECT count(courses_id) FROM `tbl_courses`" ;
			$result2=mysqli_query($con,$sql2);
			$row2=mysqli_fetch_row($result2);
			$str2 = implode($row2); 
				
			$sql4="SELECT count(distinct teacher_id) FROM `tbl_courses` " ;
			$result4=mysqli_query($con,$sql4);
			$row4=mysqli_fetch_row($result4);
			$str4 = implode($row4); 
			 ?>
	<div class="d-flex flex-row mb-2 m-lg-3">
	<div class="d-flex flex-column m-1">
	<h1 class="subheading">The India's largest Selection of Pathshala courses</h1>
	<p class="subabout">Choose from <?php echo $str2?>+ online courses with new additions published every month.<br>Courses uploaded by <?php echo $str4?>+ teachers available on Pathshala</p>
	</div>
	<input class="ml-auto searchCourses" placeholder="&#x1F50E;&#xFE0E; Search Courses"></input>
	</div>
	<?php $conn=mysqli_connect("localhost", "root","Pathshala@1a", "pathshal_pathshala");
			$sql1="SELECT count(customers_id) FROM `wl_customers`" ;
			$result1=mysqli_query($conn,$sql1);
			$row1=mysqli_fetch_row($result1);
			$str1 = implode($row1); 
			?>
			
		<?php
			$sql3="SELECT count(customers_id) FROM `wl_order` WHERE customers_id<>0 & payment_status='paid'" ;
			$result3=mysqli_query($conn,$sql3);
			$row3=mysqli_fetch_row($result3);
			$str3 = implode($row3); 
			 ?>
	<div class="d-flex flex-column column2 shadow mb-4 pb-3">
		<div class="d-flex flex-column m-1 m-lg-3">
		<div class="d-flex flex-row">`
		<div style="width:90vw;">
		<h1 class="subheading2">Expand your career opportunities with Pathshala Learning</h1>
		</div>
		<div class="ml-auto courseButtonCon mr-2" style="width:15vw;">
		<button class="btn btn-outline-primary courseButton">Explore Courses</button>
		</div>
		</div>
		<p class="subabout2"><?php echo $str1?>+ learners have already enrolled with <?php echo $str3?>+ courses. Whether you are in academic field, arts, dance or any extra-curricular courses. <br>We offer variety of courses to widen your area of interest, knowledge & skills you can learn from Pathshala courses.</p>
		
		 
		
		<div class="d-flex flex-row courseMain mb-3">
		<?php
			
			$scccat=$val['category_id'];
			$scc="SELECT * FROM `tbl_courses` where `category_id`='$scccat' ORDER BY courses_id desc limit 10";
			$query=mysqli_query($con,$scc);
      foreach($query as $sccr){
	  		?>
		
		<div class="d-flex flex-column coursePage shadow p-2 m-2">
		<?php if(!empty($sccr['image'])) {?>
		<a href="<?php echo base_url();?>courses/detail/<?php echo $sccr['courses_friendly_url']?>"><img class="courseThumbnail mb-2 ml-1" src="<?php echo base_url();?>lms/uploaded_files/courses/<?php echo $sccr['image']?>" alt="img"/></a>
		<?php } else {?>
                    <a href="<?php echo base_url();?>courses/detail/<?php echo $sccr['courses_friendly_url']?>">   <img class="courseThumbnail mb-2 ml-1" src="https://pathshala.co/uploaded_files/thumb_cache/thumb_190_190_noimg1.gif"/><!--class="openPopup"--></a>
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
		  <div class="mb-2" style="height:40px;">
				<p class="fees"><span class="rupeeIcon"></span><?php if($sccr['price']==1){?>&#x20B9; Free</p> 
							   <?php }else{ ?>
							   <div class="d-flex flex-row pb-2">
                                <p class="pricedetail1 mr-auto ml-1">&#x20B9; <?php echo $sccr['price'];?></p> 
                                <p class="pricedetail1 ml-auto mr-3">Credit Point :<?php echo $sccr['credit_price'];?></p></div>
                                <?php }?>
					</div>
			

				 <div style="height:30px;">
		<div class="d-flex flex-row">
			
			
			<?php if($this->session->userdata('user_id') > 0 ){?>
                     <a href="<?php echo base_url();?>/courses/enrollDetail/<?php echo $sccr['courses_id']?>" ><button class="btn btn-outline-info buyButton">Pay Now</button></a>
                     
                       <?php if($sccr['price']!=1){?>
                       
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
	</div>
	<div class="d-none d-lg-inline">
	<hr class="hrline">
	<div class="d-flex flex-row">
	<div class="d-flex flex-row col-4">
	<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-play-fill icons mt-auto mb-auto" viewBox="0 0 16 16">
  <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/>
</svg>
	<p class="playText ml-3 mt-auto mb-auto">Over <?php echo $str2?> courses on career, personal skills and many more.</p>
	</div>
	<div class="d-flex flex-row col-4">
	<p class="infinityicon mt-auto mb-auto" >&#8734;</p>
	<p class="playText ml-3 mt-auto mb-auto">Learn at your own pace, with lifetime access on mobile and desktop</p>
	</div>
	<div class="d-flex flex-row col-4">
	<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-star-fill icons mt-auto mb-auto" viewBox="0 0 16 16">
  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
</svg>
	<p class="playText ml-3 mt-auto mb-auto">Choose from top teachers instruction's across the country</p>
	</div>
	</div>
	<hr class="hrline">
	</div>
	
	<div class="d-lg-none">
	<div class="d-flex flex-column">
	<hr class="hrline">
	<div class="d-flex flex-row col-12">
	<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-play-fill icons mt-auto mb-auto" viewBox="0 0 16 16">
  <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/>
</svg>
	<p class="playText ml-3 mt-auto mb-auto">Over 155,000 video courses on career and personal skills</p>
	</div>
	<hr class="hrline">
	<div class="d-flex flex-row col-12">
	<p class="infinityicon mt-auto mb-auto" width="40" height="40" >&#8734;</p>
	<p class="playText ml-3 mt-auto mb-auto">Learn at your own pace, with lifetime access on mobile and desktop</p>
	</div>
	<hr class="hrline">
	<div class="d-flex flex-row col-12">
	<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-star-fill icons mt-auto mb-auto" viewBox="0 0 16 16">
  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
</svg>
	<p class="playText ml-3 mt-auto mb-auto">Choose from top industry instructions across the world</p>
	</div>
	</div>
	<hr class="hrline">
	</div>
	
	<h1 class="subheading m-4">Similar Courses</h1>

	
		<form method="post">
  <div class=" bg-light" id="postList">


<div class="row ml-auto mr-auto" data-aos="zoom-in" data-aos-delay="100">
   <?php
                if(is_array($res) && !empty($res)) {
                foreach($res as $val) {
               ?> 
		  
	   
       <div class="col-xl-4 col-lg-6 col-md-6 col-sm-4 listAll">
         <div class="d-flex flex-column coursePage2 shadow p-2 m-1">
		 <?php if(!empty($val['image'])) {?>
		<img class="courseThumbnail2 mb-2 ml-1" src="<?php echo base_url();?>lms/uploaded_files/courses/<?php echo $val['image']?>" alt="img"/>
		<?php } else {?>
                        <a href="<?php echo base_url();?>courses/detail/<?php echo $val['courses_friendly_url']?>"> <img class="courseThumbnail2 mb-2 ml-1" src="https://pathshala.co/uploaded_files/thumb_cache/thumb_190_190_noimg1.gif"/><!--class="openPopup"--></a>
                        <?php }?>
		<div style="height:60px;">
		<h4 class="courseHeading2 ml-1"><a href="<?php echo base_url();?>courses/detail/<?php echo $val['courses_friendly_url']?>"><?php echo $val['courses_name']?></a></h4>
		</div>
		<div style="height:30px;">
		<p class="courseInstructor2 ml-1"><a href="<?php echo base_url();?>teacher/profile/<?php echo $mem_info['teacher_id'];?>/<?php echo url_title($mem_info['first_name']);?>" target="_blank"><?php echo $mem_info['first_name']?></a></p>
		</div>
	  <!-- <div style="height:40px;">
		<p class="starRating2 ml-1"><span class="starCount2">4.6 <span >
		  <//?php for ($x = 1; $x <= 5; $x++) {?>
                <i class="fa fa-star <//?php if($x > $rating){echo "-o";}?> starcolor"></i>
              <//?php }?> 
                </span></span> (42998)</p>
		</div>-->
			   <div class="mb-2" style="height:40px;">
				<p class="fees"><span class="rupeeIcon"></span><?php if($val['price']==1){?>&#x20B9; Free</p> 
							   <?php }else{ ?>
							   <div class="d-flex flex-row pb-2">
                                <p class="pricedetail1 mr-auto ml-1">&#x20B9; <?php echo $val['price'];?></p> 
                                <p class="pricedetail1 ml-auto mr-3">Credit Point : <?php echo $val['credit_price'];?></p></div>
                                <?php }?>
					</div>
		<div class="d-flex flex-row ml-1" style="height:40px;">
			<?php if($this->session->userdata('user_id') > 0 ){?>
                     <a href="<?php echo base_url();?>/courses/enrollDetail/<?php echo $val['courses_id']?>" ><button class="btn btn-outline-info buyButton">Pay Now</button></a>
                     
                       <?php if($val['price']!=1){?>
                       
                     <a href="<?php echo base_url();?>/courses/enrollDetailStoreCredit/<?php echo $val['courses_id']?>" ><button class="btn btn-outline-info buyButton">Use credit Points </button></a>
                      <?php }?>
                      
                      <?php }else{?>
                     <a href="<?php echo base_url();?>users/login" ><button class="btn btn-outline-info buyButton">Login Now</button></a>
                      <?php }?>    
			
        </div>	
		</div>
		
        </div>
            
	 <?php } }?>
	<hr>
	
	<div class="createLinks">
    <?php echo $this->ajax_pagination->create_links(); ?> 
	</div>
	
	</div>
	
	</div>


</form>

	<div class="row justify-content-center teacherImageContainer mt-2 mb-2">
		<img class="teacherImage m-3" src="<?php echo base_url(); ?>/uploaded_files/userfiles/images/Sahilwadhwa.jpg"/>
		
		<div class="d-flex flex-column text-center justify-content-center ml-2 ml-lg-4" >
			<h2 class="becomeIns">Become an Instructor</h2>
			<p class="insText">. Best Teachers from around the country <br>. Teach millions of students on Pathshala. </p>
			<a href="<?php echo base_url(); ?>account/welcome/teacher"><button class="btn btn-danger ml-auto mr-auto buyButton mb-2">Start Teaching Today</button></a>
		
		</div>
	</div>
	</div>
	

</body>

</html>
<!-- trial code end here -->
<?php $this->load->view('bottom_application'); ?>
<div id="wait" style="display:none;"><br>
  Loading..</div>
<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel ="stylesheet">
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
    </script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

<script>
function searchFilter(page_num) {
    page_num = page_num?page_num:0;
	var category =$('#category').val();
	$("#wait").css("display", "block");
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>courses/ajaxPaginationData/'+page_num,
        data:{page:page_num,category:category},
        beforeSend: function () {
            $('.loading').show();
        },
        success: function (html) {
            $('#postList').html(html);
            $('.loading').fadeOut("slow");
			$("#wait").css("display", "none");
        }
    });
}
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
            url:'<?php echo base_url();?>courses/getcourses',
              data:'category_id='+categoryID,
               success:function(html){
                   $('#subject').html(html);
					$("#wait").css("display", "none");
               }
            }); 
        }else{
          $('#city').html('<option value="">Select Category</option>'); 
        }
    });
	
$(document).ready(function(){
    $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
        $('.modal-body').load(dataURL,function(){
            $('#myModal').modal({show:true});
        });
    }); 
});	
	
 });
</script>
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog"> 
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Courses Detail</h4>
      </div>
      <div class="modal-body"> </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<style>
header{
	height: 100px;
}

.container-fluid{
	margin-top:30px;
}

#wait {
    background: url("<?php echo base_url();?>assets/demo_wait.gif") no-repeat scroll center center #FFF;
    position: absolute;
    height: 100%;
    width: 100%;
}
div.pagination {
    font-family: "Lucida Sans", Geneva, Verdana, sans-serif;
    padding:20px;
    margin:7px;
}

div.pagination a {
    margin: 2px;
    padding: 0.5em 0.64em 0.43em 0.64em;
    text-decoration: none;
    color: #fff;

  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
}
div.pagination a:hover, div.pagination a:active {
  
    background-color: #de1818;
    color: #fff;
}
div.pagination span.current {
    padding: 0.5em 0.64em 0.43em 0.64em;
    margin: 2px;
    background-color: #f6efcc;
    color: #6d643c;
}
div.pagination span.disabled {
    display:none;
}
.pagination b{
  background-color: #1b68b5;
  color: white;
  border: 1px solid #4CAF50;
  padding: 8px 16px;
}
.pagination a:hover:not(.active) {background-color: #ddd;}
</style>
<style>
.lms_search input[type="text"] {
	border-radius: 5px;
	border: 1px solid #fff;
}
.left_lms {
	background-color: #e7eaf0;
	border-top-left-radius: 5px;
	padding-top: 5px;
}
.left_lms .left_lms_heading {
	border-radius: 5px;
	border: 1px solid #28407a;
	text-align: center;
	padding-top: 12px;
	color: #28407a;
}
.left_lms .sidebar-category ul li a {
	color: #28407a;
	font-weight: bold;
	font-size: 16px;
	text-align: center;
}
.lms_right .product-title h3 {
	font-weight: normal;
	color: #28407a;
	line-height: 1;
	font-size: 15px;
}
.lms_right .product-title h3 a {
	font-weight: 500;
	line-height: 1;
	font-size: 18px;
}
.lms_right .listAll {
	margin-bottom: 8px;
}
.lms_right .lms_price {
	background-color: #28407a;
	color: #ffffff !important;
	border-radius: 5px;
	border: 1px solid #28407a;
	text-align: center;
	padding: 5px;
	font-weight: bold;
}
.lms_right .lms_buy {
	text-align: center;
	padding: 5px;
	font-weight: bold;
}
.lms_right .listAll {
	border-radius: 10px;
	border: 3px solid #28407a;
	padding: 0;
	margin-right: 3px;
}
.lms_right .proTitle {
	color: #28407a;
	font-weight: bold;
}
.lms_right .topicTitle b {
	color: #28407a;
	font-weight: bold;
}
.lms_right .topicTitle a {
	color: #28407a;
	font-weight: normal
}
.lms_right .product-rating i {
	color: #28407a;
}

@media (min-width: 1200px) {
.listAll {
	max-width: 32.33%;
}
}
</style>
<style>
.heading{
	color:red;
	font-weight:bold;
	font-size:35px;
	font-family:"Georgia";
}
.aboutp{
	color:black;
	font-weight:bold;
	font-size:15px;
	font-family:"Georgia";
}
.form-control-new{
	border-radius:20px;
	border:1px solid black;
	background-color:green;
	color:white;
	width:180px;
	margin-right:20px;
	margin-top:20px;
	padding:7px;
}
.column_m1{
	height:50vh;
	width:50vw;
	padding:140px;
}
.main_img{
	width:580px;
	height:450px;
}
.columnImage{
	padding-top:10px;
}
.searchCourses{
	border:1px solid black;
	border-radius:30px;
	background-color:white;
	width:250px;
	height:50px;
}
.subheading{
	font-weight:bold;
	font-family:"Georgia";
	font-size:30px;
}
.subabout{
	font-weight:bold;
	font-family:"Georgia";
	color:grey;
}
.subheading2{
	font-weight:bold;
	font-family:"Georgia";
	font-size:30px;
	color:red;
}
.subabout2{
	font-weight:bold;
	font-family:"Georgia";
	color:grey;
	font-size:16px;
}
.column2{
	border-radius:10px;
}
.courseButton{
	padding:12px;
	border-radius:30px;
	font-weight:bold;
	font-family:"Georgia";	
}
.icons{
	color:green;
}
.infinityicon{
	color:green;
	font-weight:bold;
	font-size:60px;
}
.rupeeIcon{
	color:black;
	background-color:white;
}
.playText{
	font-weight:bold;
	font-family:"Georgia";
	font-size:18px;
}
.coursePage{
	width:290px;
	height:300px;
}
.coursePage2{
	width:380px;
	height:430px;
}
.courseThumbnail{
	width:265px;
	height:110px;
}
.courseThumbnail2{
	width:360px;
	height:180px;
}
.courseHeading{
	font-size:13px;
	color:black;
	font-weight:bold;
	font-family:"Georgia";
	margin-bottom:0px;
}
.courseHeading2{
	font-size:18px;
	color:black;
	font-weight:bold;
	font-family:"Georgia";
	margin-bottom:5px;
}
.courseInstructor{
	font-size:13px;
	color:black;
	font-family:"Georgia";
	margin-bottom:0px;
}
.pricedetail1{
	font-size:18px;
	color:black;
	font-family:"Georgia";
}
.courseInstructor2{
	font-size:18px;
	color:black;
	font-family:"Georgia";
	margin-bottom:4px;
}
.starRating{
	font-family:"Georgia";
	margin-bottom:10px;
}
.starRating2{
	font-family:"Georgia";
	margin-bottom:15px;
}
.starCount{
	color:red;
}
.buyButton{
	border-radius:10px;
	padding-left:20px;
	padding-right:20px;
	padding-top:2px;
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
.hrline{
	color:grey;
	width:100%;
}
.courseMain{
	overflow-x:scroll;
	width:cover;
}
.teacherImage{
	width:20vw;
	height:40vh;	
	border-radius:5px;
	
}
.teacherImageContainer{
	background-image:linear-gradient(to right,#A9A9A9,white);
	width:cover;
}
.becomeIns{
	font-family:"Georgia";
	font-weight:bold;
	color:black;
}
.insText{
	font-family:"Georgia";
	font-weight:bold;
	font-size:16px; 
}

@media (max-width: 700px) {
.teacherImage{
	width:35vw;
	height:35vh;	
	border-radius:5px;
	
}
.becomeIns{
	font-family:"Georgia";
	font-weight:bold;
	color:black;
	font-size:20px;
}
.column_m1{
	height:50vh;
	width:100vw;
	padding:40px;
}
.main_img{
	display:none;
}
.heading{
	color:red;
	font-weight:bold;
	font-size:30px;
	font-family:"Georgia";
}
.searchCourses{
	border:1px solid black;
	border-radius:30px;
	background-color:white;
	width:120px;
	display:none;
}
.subheading{
	font-weight:bold;
	font-family:"Georgia";
	font-size:17px;
	margin:0px;
}
.subabout{
	font-weight:bold;
	font-family:"Georgia";
	color:grey;
	font-size:14px;
}
.subheading2{
	font-weight:bold;
	font-family:"Georgia";
	font-size:20px;
	color:red;
}
.subabout2{
	font-weight:bold;
	font-family:"Georgia";
	color:grey;
	font-size:15px;
}
.courseButton{
	padding:10px;
	border-radius:30px;
	font-weight:bold;
	font-family:"Georgia";	
	display:none;
}
.courseButtonCon{
	display:none;

}
.coursePage2{
	width:300px;
	height:430px;
}
.courseThumbnail2{
	width:280px;
	height:180px;
}
.createLinks{
	overflow:hidden;
	padding-left:0px;
	margin-left:0px;
}
.form-control-new{
	border-radius:20px;
	border:1px solid black;
	background-color:green;
	color:white;
	width:140px;
	font-size:13px;
	margin-right:10px;
	margin-top:10px;
	padding:7px;
}
}
</style>
