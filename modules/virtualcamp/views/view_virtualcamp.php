<?php $this->load->view('top_application'); ?>

<div class="breadcrumb-area">
  <div class="breadcrumb-top bg-img breadcrumb-overly-3 pt-100 pb-95" style="background-image:url(<?php echo theme_url();?>lms_searchbg.jpg);">
    <div class="container">
    <div class="row">
    <div class="col-md-5">
    </div>
      <div class="col-2 text-center" align="center">
      <button class="btn btn-default" onclick="window.location.href='<?php echo base_url(); ?>virtualcamp/register'">Register For Virtual Camp</button>
      </div>
      </div>
      <br>
    </div>
  </div>
</div>
                <?php
				//print_r($res);
				$db2 = $this->load->database('database2', TRUE); 
				$sql="SELECT * FROM `tbl_courses`where `category_id` = '24' and `courses_id` <>'349' ORDER BY `courses_id` ASC";
				$query=$db2->query($sql);
				
				foreach($query->result_array() as $val)
				{
				if($val['category_id'] != 24)
				{ 
				}
				else { } 
				} ?>
              </ul>
            
   		   
      
          <div class="row">
            <div class="container">
              <h3 class="proTitle">Upcoming Virtual Camp</h3>
            </div>
           
               <?php
                if(is_array($res) && !empty($res)) {
                foreach($res as $val) {
               ?>
			    <form method="post">
              <div class="container" id="postList" >
                <div class="row" style="height:300px ; margin:20px">
			           <div class="blog-img"> <a href="javascript:void(0)""  data-id="<?php echo $val['courses_id']?>">
                        <?php if(!empty($val['image'])) {?>
                        <a href="<?php echo base_url();?>virtualcamp/detail/<?php echo $val['courses_friendly_url']?>"> <img src="<?php echo base_url();?>lms/uploaded_files/courses/<?php echo $val['image']?>" alt=""  style="float:left;width:250px;height:250px; data-href="<?php echo base_url();?>virtualcamp/coursedetail/<?php echo $val['courses_id'];?>" data-name="<?php echo $val['courses_name']?>"></a>
                        <?php } else {?>
                        <a href="<?php echo base_url();?>virtualcamp/detail/<?php echo $val['courses_friendly_url']?>"> <img src="https://pathshala.co/uploaded_files/thumb_cache/thumb_190_190_noimg1.gif" style="float:left;width:250px;height:250px; data-href="/><!--class="openPopup"--></a>
											
						<?php }?>
						<h4 class="topicTitle"  ><a href="<?php echo base_url();?>virtualcamp/detail/<?php echo $val['courses_friendly_url']?>">Session: <?php echo $val['courses_name']?></a></h4>
						<div class="text" style="height: 400px; width: 1400px"> 
                        <h4 class="topicTitle"  ><a href="<?php echo base_url();?>virtualcamp/detail/<?php echo $val['courses_friendly_url']?>">About Educator: <?php echo $val['courses_description']?></a></h4>
                        <?php 
						$mem_info=get_db_single_row('wl_teacher',$fields="first_name,teacher_id,status",$condition="WHERE status='1' AND teacher_id='".$val['teacher_id']."'");
						?>
                          <h4 class="topicTitle"> <a href="<?php echo base_url();?>teacher/profile/<?php echo $val['teacher_id'];?>/<?php echo url_title($val['first_name']);?>">Educator: <b><?php echo $mem_info['first_name']?></b></a> </h4>
                          <p></p>
                          
                    
							<div class="ex1" style="height: 100px; width: 350px">
							<ul> <li>  <a href="<?php echo base_url();?>/virtualcamp/Detail/<?php echo $val['courses_friendly_url']?>" >
							</i> <h4> Know More </h4></a>&nbsp;</li>
                      
							</div> 
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } }?>
                  <?php echo $this->ajax_pagination->create_links(); ?> </div>
              </div>
            </form>
          </div>
  
</div>
<div class="login-register-area pt-130 pb-130">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 col-md-12 ml-auto mr-auto">
        <div class="login-register-wrapper">
          <div class="login-register-tab-list nav"> <a class="active" data-toggle="tab" href="#lg2">
            <h4> Register for the Upcoming Virtual Camp!</h4>
            </a> </div>
          <div class="tab-content">
            <div id="lg2" class="tab-pane active">
              <div class="login-form-container">
                <div class="login-register-form"> 
				<?php echo validation_message();?> 
				<?php echo error_message(); ?> 
        <?php //echo form_open('users/register'); ?>
        <form action="<?php echo base_url(); ?>virtualcamp/virtualcampRegister" method="post" accept-charset="utf-8" onsubmit="return validate()">
                  <input type="text" name="first_name" placeholder="Name" id="name" value="<?php echo set_value('first_name'); ?>">
                  <?php echo form_error('first_name');?>
                 <input type="number" name="phone_number" placeholder="Phone" id="phone" value="<?php echo set_value('phone_number'); ?>" min="5000000000" max="9999999999" step=1>
                  <?php echo form_error('phone_number');?>
                  <input type="email" name="user_name" placeholder="Email" id="email" value="<?php echo set_value('user_name');?>">
                  <input type="password" name="password" id="password" placeholder="Password(Your Virtual Camp Password)" value="<?php echo set_value('password');?>">
                  <br>
                  <h4 style="font-family: 'Roboto', sans-serif; color: #1b68b5;">Upcoming Virtual Camp</h4>
                  <select name="virtualcamp" id="virtualcampDetails" required>
                  <option value="" selected disabled>Please Select a Virtual Camp</option>
                  <?php 
                  $db2 = $this->load->database('database2', TRUE);
                  $sql="SELECT courses_name, courses_id FROM `tbl_courses` where category_id='24' AND courses_id='349' ORDER BY courses_name";
                  $query=$db2->query($sql);
                  if($query->num_rows()>0){
                  foreach($query->result_array() as $val):
                  ?>                  
                  <option value="<?php echo $val['courses_id']; ?>"><?php echo $val['courses_name']; ?></option>
                  <?php  endforeach;  } ?>
                  </select>         
                  <div id="result" style="font-family: 'Roboto', sans-serif; color: #1b68b5;"></div>  
                  <br>    
                  <div class="button-box">
                    <button class="default-btn" type="submit"><span>Register</span></button>
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
$('#virtualcampDetails').on('change',function(){
  $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>virtualcamp/virtualcampInfo/'+$(this).val(),
        success: function (html) {
            $('#result').html(html);
        }
    });  
});
</script>
</body></html>


<?php $this->load->view('bottom_application'); ?>
<div id="wait" style="display:none;"><br>
  Loading..</div>
<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel ="stylesheet">
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> 
<script>
function searchFilter(page_num) {
    page_num = page_num?page_num:0;
	var category =$('#category').val();
	$("#wait").css("display", "block");
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>virtualcamp/ajaxPaginationData/'+page_num,
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
            url:'<?php echo base_url();?>virtualcamp/getcourses',
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
	padding: 7px;
	font-weight: bold;
}
.lms_right .listAll {
	border-radius: 10px;
	border: 3px solid #28407a;
	padding: 0;
	margin-right: 3px;
}
.lms_right .proTitle {
	text-align: center;
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
p.ex1 {
  border: 1px solid red; 
  padding-left: 50px;
}

@media (min-width: 250px) {
.listAll {
	object-fit: cover;
	width: 200px;
  height: 400px;
	
}
}
</style>

