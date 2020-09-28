<?php $this->load->view('top_application'); ?>
<?php //$this->load->view('home_banner'); ?>
<?php  //echo get_static_content(13);?>
<?php  //echo get_static_content(20);?>
<?php /*?><div class="teacher-area pt-20 pb-20">
  <div class="container">
    <div class="section-title mb-75">
      <h2>Our<span> Current Teachers</span></h2>
      <p>Reach out to the current tutors registered on our Online platform </p>
    </div>
    <div class="custom-row">
    <?php 
		if(is_array($teacher) && !empty($teacher)){
		foreach($teacher as $key_fea=>$val_tea){
	?>
      <div class="custom-col-5">
        <div class="single-teacher mb-30">
          <div class="teacher-img"> <img src="<?php echo get_image('teacher',$val_tea['picture'],200,257,'AR');?>" alt="" class="img-responsive"> </div>
          <div class="teacher-content-visible">
            <h4><?php echo $val_tea['first_name'];?></h4>
          </div>
          <div class="teacher-content-wrap">
            <div class="teacher-content">
              <h4><a href="#"><?php echo $val_tea['first_name'];?></a></h4>
            <div class="teacher-social">
                <a href="#" class="btn">View Profile</a>
              </div>
            </div>
          </div>
        </div>
      </div>
     <?php }}?>  
    </div>
  </div>
</div><?php */?>
<?php  //echo get_static_content(21);?>
<?php /*?><div class="blog-area bg-img pt-130 pb-100" style="background-image:url(<?php echo theme_url()?>img/Pathshala_Img/parallax1-1024x576_2.jpg);">
  <div class="container">
    <div class="section-title mb-75">
      <h2>Our <span>Blog</span></h2>
    </div>
    <div class="row">
    <?php 
	if(is_array($blog) && !empty($blog)){
	foreach($blog as $key_fea=>$val){
	$url=base_url().'blog/details/'.$val['url'];
	$catName=get_category_by_id($val['category_id']);
	?>
      <div class="col-lg-3 col-md-6">
        <div class="single-blog mb-30">
          <div class="blog-img">  <a href="<?php echo $url;?>"><img src="<?php echo base_url();?>uploaded_files/blog/<?php echo $val['blog_image_thumbnail']?>" alt=""></a></div>
          <div class="blog-content-wrap"> <span><?php echo $catName[0]['name'];?></span>
            <div class="blog-content">
              <h4><a href="<?php echo $url;?>"> <?php echo $val['title'];?></a></h4>
              <div class="blog-meta">
             </div>
            </div>
            <div class="blog-date"> <a href="#"><i class="fa fa-calendar-o"></i> <?php echo getDateFormat($val['blog_date_added'],3);?></a> </div>
          </div>
        </div>
      </div>
    <?php }}?>   
    </div>
  </div>
</div><?php */?>

<div id="startheader">
  <h1 class="heading mb-30">Find the best teachers near you.</h1>
  <form action="<?php echo base_url();?>search">
    <div class="container-fluid">
      <div class="row no-gutters">
        <div class="col-lg-4 col-md-4">
        <select name="category"  id="category" class="form-control" required>
         <option value="">Select category</option>
      	<?php 
			$sql="SELECT * FROM `wl_categories`  where status='1' AND parent_id='0' ORDER BY sort_order";
			$query=$this->db->query($sql);
			foreach($query->result_array() as $val):
		?>
      <option value="<?php echo $val['category_id']?>"><?php echo $val['category_name']?></option>
      <?php endforeach;?>
        </select>
          
        </div>
        <div class="col-lg-4 col-md-4">
          <select id="classes" name="classes"  class="form-control">
      			<option value="">Select Class</option>
    	  </select>
        </div>
        <div class="col-lg-4 col-md-4 subbtn">
          <select id="subject" name="subject"  class="form-control">
     		 <option value="">Select Subject</option>
    	  </select>
          <input type="hidden" name="search" value="home">
          <button><i class="fa fa-search"></i></button>
        </div>
      </div>
    </div>
  </form>
  <div class="slider-btn" align="center">
    <div class="container-fluid">
      <div class="row no-gutters">
        <div class="col-lg-12 col-md-12">
          <h2 class="mt-45 mb-30" style="color:#fff;font-size: 3.2em;">OR</h2>
        </div>
        <div class="col-lg-2 col-md-2"></div>
        <div class="col-lg-4 col-md-4"> <a class="animated default-btn btn-green-color" href="<?php echo base_url()?>users/register" target="_blank">Register as Student</a> </div>
        <div class="col-lg-4 col-md-4"> <a class="animated default-btn btn-green-color" href="<?php echo base_url()?>teacher/register" target="_blank">Register as Teacher</a> </div>
        <div class="col-lg-2 col-md-2"></div>
      </div>
    </div>
  </div>
</div>

<?php  echo get_static_content(26);?>
<?php  //echo get_static_content(27);?>
<div class="about-us pt-130 pb-130 pathStud" style="background-image:url(<?php echo theme_url()?>images/works.jpg);">
  <div class="container">
    <div class="section-title-3 section-shape-hm2-1 text-center mb-100">
      <h2>How Pathshala Works - <span>Student</span></h2>
    </div>
    <div class="row align-items-center"> 
     <div class="col-lg-4 col-md-12">
        <div class="single-choose-us2 mb-45 text-center"> <img src="<?php echo theme_url()?>images/works1.png" alt="">
          <h4>Register as Student & Fill Enquiry</h4>
          <p>Register and Fill the Enquiry as per your<br>
            requirement with necessary information</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-12">
        <div class="single-choose-us2 mb-45 text-center"> <img src="<?php echo theme_url()?>images/works2.png" alt="">
          <h4>Get Customized Response</h4>
          <p>Start receiving the responses from <br>
            the registered tutor<br>
            with respect to your requirements</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-12"> 
      <div class="single-choose-us2 mb-45 text-center"> <img src="<?php echo theme_url()?>images/works3.png" alt="">
          <h4>Select the best match</h4>
          <p>Select the suitable one that fits<br>
            your requirement & start learning.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="event-details-area galwidBenefits">
  <div class="container">
    <div class="row">
      <div class="col-xl-3 col-lg-4">
        <div class="benefits" style=""> <a href="javascript:void(0)">Benefits</a> </div>
      </div>
      <div class="col-xl-3 col-lg-2"></div>
      <div class="col-xl-6 col-lg-6">
        <div class="event-left-wrap">
          <div class="event-description">
            <div class="event-gallery text-center mt-40">
              <div class="event-gallery-active nav-style-3 owl-carousel"> 
            <?php 
                $sql="SELECT * FROM wl_slide_banners WHERE status='1' AND banner_image!='' AND type='2'";
                $banner_query=$this->db->query($sql);
                if($banner_query->num_rows()>0):
                $list_banner=$banner_query->result_array();
                foreach($list_banner as $key_ban=>$val_ban):
                $product_path = "banner/".$val_ban['banner_image'];
            ?>
          <img src="<?php echo base_url().'uploaded_files/'.$product_path;?>" alt="<?php echo $val_ban['banner_title'];?>"> 
            <?php endforeach;?>
            <?php endif;?>  
             </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="about-us pt-130 pb-130 pathTeach" style="background-image:url(<?php echo theme_url()?>images/works-teachers.jpg);">
  <div class="container">
    <div class="section-title-3 section-shape-hm2-1 text-center mb-100">
      <h2>How Pathshala Works - <span>Teacher</span></h2>
     </div>
    <div class="row align-items-center"> 
    <div class="col-lg-4 col-md-12">
        <div class="single-choose-us2 mb-45 text-center"> <img src="<?php echo theme_url()?>images/teacher1.png" alt="">
          <h4>Register As Teacher</h4>
          <p>Join our Team as an expert of<br>
            your field</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-12">
        <div class="single-choose-us2 mb-45 text-center"> <img src="<?php echo theme_url()?>images/teacher2.png" alt="">
          <h4>Update Your Profile</h4>
          <p>Update your profile <br>
            with necessary details</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-12"> 
       <div class="single-choose-us2 mb-45 text-center"> <img src="<?php echo theme_url()?>images/teacher3.png" alt="">
           <h4>Connect With Students</h4>
          <p>Start your journey of teaching<br>
            by connecting with students</p>
        </div>
      </div>
    </div>
 <div class="single-choose-us2 text-center">
      <h4>Other Services</h4>
     <p>Pathshala has partner with ED<sub>trunk</sub> learning solution to cater the need of  course/ </br>
        Content Development and Marketing.</p>
    </div>
    <div class="row align-items-center mt-45"> 
      <div class="col-lg-4 col-md-12">
        <div class="single-choose-us2 mb-45 text-center"> <img src="<?php echo theme_url()?>images/os1.png" alt="">
           <h4>Digital Course Development service</h4>
          <p>Production/Post production.<p>
        </div>
      </div>
      <div class="col-lg-4 col-md-12">
        <div class="single-choose-us2 mb-45 text-center"> <img src="<?php echo theme_url()?>images/os2.png" alt="">
         <h4>Marketing and sales</h4>
          <p>Sales  throughout  platform/ <br>
            course selling through<br>
            our trusted marketing partners.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-12"> 
        <div class="single-choose-us2 mb-45 text-center"> <img src="<?php echo theme_url()?>images/os3.png" alt="">
           <h4>Technical assistance from our<br> technical partners.</h4>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="event-details-area galwidBenefits">
  <div class="container">
    <div class="row">
      <div class="col-xl-3 col-lg-4">
        <div class="benefits" style=""> <a href="javascript:void(0)">Benefits</a> </div>
      </div>
      <div class="col-xl-3 col-lg-2"></div>
      <div class="col-xl-6 col-lg-6">
        <div class="event-left-wrap">
          <div class="event-description">
            <div class="event-gallery text-center mt-40">
              <div class="event-gallery-active nav-style-3 owl-carousel"> 
			<?php 
                $sql="SELECT * FROM wl_slide_banners WHERE status='1' AND banner_image!='' AND type='3'";
                $banner_query=$this->db->query($sql);
                if($banner_query->num_rows()>0):
                $list_banner=$banner_query->result_array();
                foreach($list_banner as $key_ban=>$val_ban):
                $product_path = "banner/".$val_ban['banner_image'];
            ?>
          <img src="<?php echo base_url().'uploaded_files/'.$product_path;?>" alt="<?php echo $val_ban['banner_title'];?>"> 
            <?php endforeach;?>
            <?php endif;?>             
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="teacher-area pt-30 pb-100">
  <div class="container">
    <div class="teacherSection">
      <h2>Recent <span>Teachers</span></h2>
    </div>
    <div class="custom-row">
    <?php 
		if(is_array($teacher) && !empty($teacher)){
		foreach($teacher as $key_fea=>$val_tea){
	?>
      <div class="custom-col-5">
        <div class="single-teacher mb-30">
          <div class="teacher-img"> <img src="<?php echo get_image('teacher',$val_tea['picture'],200,257,'AR');?>" alt="" class="img-responsive"> </div>
          <div class="teacher-content-visible">
            <h4><?php echo $val_tea['first_name'];?></h4>
            <!--<h5>Lecturer</h5>-->
          </div>
          <div class="teacher-content-wrap">
            <div class="teacher-content">
              <h4><a href="<?php echo base_url();?>teacher/profile/<?php echo $val_tea['teacher_id'];?>/<?php echo url_title($val_tea['first_name']);?>"><?php echo $val_tea['first_name'];?></a></h4>
              <!--<h5><a href="#">Lecturer</a></h5>-->
              <!--<p><a href="#">Tempor incididunt magna aliqua.</a></p>-->
              <div class="teacher-social">
                <ul>
                  <li><a href="<?php echo base_url();?>teacher/profile/<?php echo $val_tea['teacher_id'];?>/<?php echo url_title($val_tea['first_name']);?>"><?php echo "View Profile";?></a></li>
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php }}?>  
    </div>
  </div>
</div>
<div class="blog-area bg-img pt-30 pb-100" style="background-image:url(<?php echo theme_url()?>images/blogbg.jpg);">
  <div class="container">
    <div class="teacherSection">
      <h2>Our <span>Blog</span></h2>
    </div>
    <div class="row">
     <?php 
		if(is_array($blog) && !empty($blog)){
		foreach($blog as $key_fea=>$val){
		$url=base_url().'blog/details/'.$val['url'];
		$catName=get_category_by_id($val['category_id']);
	?>
      <div class="col-lg-3 col-md-6">
        <div class="single-blog mb-30">
          <div class="blog-img"> <a href="<?php echo $url;?>"><img src="<?php echo base_url();?>uploaded_files/blog/<?php echo $val['blog_image_thumbnail']?>"></a> </div>
          <div class="blog-content-wrap"> <span><?php echo $catName[0]['name'];?></span>
            <div class="blog-content">
              <h4><a href="<?php echo $url;?>"><?php echo $val['title'];?></a></h4>
            </div>
            <div class="blog-date"> <a href="<?php echo $url;?>"><i class="fa fa-calendar-o"></i> <?php echo getDateFormat($val['blog_date_added'],3);?></a> </div>
          </div>
        </div>
      </div>
    <?php }}?>  
    </div>
  </div>
</div>
<?php $this->load->view('bottom_application'); ?>
<script type="text/javascript">
$(document).ready(function(){
    $('#state').on('change',function(){
        var stateID = $(this).val();
		$("#wait").css("display", "block");
		//searchFilter();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>search/selectstate',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
					$("#wait").css("display", "none");
                }
            }); 
        }else{
           // $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>'); 
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
<script type="text/javascript">
$(document).ready(function(){
    $('#classes').on('change',function(){
    var classesID = $(this).val();
    $("#subject").val("");
	$("#wait").css("display", "block");
	//searchFilter();
    if(classesID){
       $.ajax({
          type:'POST',
            url:'<?php echo base_url();?>search/getSubcat',
              data:'category_id='+classesID,
               success:function(html){
                   $('#subject').html(html);
					$("#wait").css("display", "none");
               }
            }); 
        }else{
          $('#city').html('<option value="">Select Category</option>'); 
        }
    });
 });
</script>
