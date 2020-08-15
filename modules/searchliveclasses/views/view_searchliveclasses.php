<?php $this->load->view('top_application'); ?>

<div class="breadcrumb-area">
  <div class="breadcrumb-top bg-img breadcrumb-overly-3 pt-100 pb-95" style="background-image:url(<?php echo theme_url();?>lms_searchbg.jpg);">
    <div class="container">
        <div class="row">
          <div class="col-md-3"></div>
       <div class="container" align="center">
		<div class="text-center" align="center">
		<button class="btn btn-default" onclick="window.location.href='<?php echo base_url(); ?>liveclasses'">Live Class Teacher List</button>
        <button class="btn btn-default" onclick="window.location.href='<?php echo base_url(); ?>searchliveclasses'">Search Live Classes</button>
      </div>
	  </div>      
          <div class="col-md-3"></div>
          <!--<div class="col-md-3">
            <input type="text" name="" placeholder="Experience" style="background:#ffffff">
          </div>--> 
          <!--<div class="col-md-3">
            <input type="submit" class="btn btn-success btn-sm bold" value="search">
          </div>--> 
        </div>
      </form>
    </div>
  </div>
</div>
<div class="event-area my-acc pt-20 pb-130">
  <div class="container">
    <div class="row">
      <div class="col-xl-3 col-lg-8 left_lms">
        <div class="sidebar-style">
          <div class="sidebar-search mb-40">
            <div class="sidebar-title mb-40">
              <h4 class="left_lms_heading">Popular Teachers</h4>
            </div>
          </div>
          <div class="sidebar-category mb-40">
            <div class="category-list">
              <ul>
                <?php
				//print_r($res);
				//$db2 = $this->load->database('database2', TRUE); 
				//$sql="SELECT * FROM `tbl_department` where status='1' and `category_id` Not in ('23','24') AND  parent_id='0'";
				//$query=$db2->query($sql);
				//foreach($query->result_array() as $val){
          //if(($val['category_id'] == 23) or ($val['category_id'] == 24))
          //{ }
          //else { 
				?>
                <!--<li><a href="#"><?php //echo $val['category_name']?></a></li>-->
          <?php //} ?>
                <?php  //}?>
              </ul>
            </div>
          </div>
        </div>
      </div>
	  
      <div class="col-xl-9 col-lg-8 lms_right">
        <div class="blog-all-wrap mr-40">
          <div class="row">
            <div class="container">
              <h3 class="proTitle">Live Classes List</h3>
            </div>
            <form method="post">
              <div class="container" id="postList">
                <div class="row">
               <?php
                if(is_array($res) && !empty($res)) {
                foreach($res as $val) {
               ?>
               
			   <div class="col-xl-4 col-lg-6 col-md-6 col-sm-4 listAll">
                    <div class="single-blog">
                      <div class="blog-img"> <a href="javascript:void(0)" data-id="<?php echo $val['addclass_id']?>">
                       <?php if(!empty($val['picture'])) {?><a href="<?php echo base_url();?>teacher/profile/<?php echo $val['teacher_id'];?>/<?php echo url_title($val['first_name']);?>">
                      <img src="<?php echo base_url();?>/uploaded_files/teacher/<?php echo $val['picture']?>" alt="" data-href="<?php echo base_url();?>courses/coursedetail/<?php echo $val['courses_id'];?>" data-name="<?php echo $val['courses_name']?>"></a>
                      <?php } else {?>
					  <a href="<?php echo base_url();?>teacher/profile/<?php echo $val['teacher_id'];?>/<?php echo url_title($val['first_name']);?>"><!--class="openPopup"--></a>
                        <?php }?>
                      </div>
                      <div class="blog-content-wrap">
                        <div class="blog-content"> 
						<?php 
						$mem_info=get_db_single_row('wl_teacher',$fields="first_name,teacher_id,status",$condition="WHERE status='1' AND teacher_id='".$val['teacher_id']."'");
						?>
                          <h4 class="topicTitle"> <a href="<?php echo base_url();?>teacher/profile/<?php echo $val['teacher_id'];?>/<?php echo url_title($val['first_name']);?>">Teacher:<b><?php echo $mem_info['first_name']?></b></a> </h4>
                          <?php 
						$mem_info=get_db_single_row('wl_addclass',$fields="class_title,class_schedule_time,class_date",$condition="WHERE teacher_id='".$val['teacher_id']."'");
						?>
						  <h4 class="topicTitle"><a href="<?php echo base_url();?>courses/detail/<?php echo $val['class_title']?>">Class Topic:<?php echo $val['class_title']?></a></h4>
                        <h4 class="topicTitle"><a href="<?php echo base_url();?>courses/detail/<?php echo $val['class_schedule_time']?>">Class Time:<?php echo $val['class_schedule_time']?></a></h4>
                       <h4 class="topicTitle"><a href="<?php echo base_url();?>courses/detail/<?php echo $val['class_date']?>">Class Date:<?php echo $val['class_date']?></a></h4>
                          <div class="blog-meta">
                            <ul>
                              <li><span class="lms_price"><a href="javascript:void(0)" class="lms_cpp">
                               <?php if($val['price']==1){?>
                                Free</a>
                                <?php }else{ ?>
                                <a href="javascript:void(0)" class="lms_cp">&#x20B9;<?php echo $val['price'];?></a> 
                                <a href="javascript:void(0)" class="lms_cp">Credit Point :<?php echo $val['credit_price'];?></a>
                                <?php }?>
                               </span></li>
                            </ul>
                          </div>
                        </div> 
                        <div class="blog-meta lms-meta">
                        
                      <?php if($this->session->userdata('user_id') > 0 ){?>
                     <ul> 
                     <li> <a href="<?php echo base_url();?>/courses/enrollDetail/<?php echo $val['courses_id']?>" class="lms_buy"><i class="fa fa-money"></i> Buy Now</a>&nbsp;</li>
                     
                       <?php if($val['price']!=1){?>
                       
                     <li> <a href="<?php echo base_url();?>/courses/enrollDetailStoreCredit/<?php echo $val['courses_id']?>" class="lms_buy"><i class="fa fa-money"></i>Use credit Points</a></li>
                      <?php }?>
                      </ul>
                      <?php }else{?>
                     <ul> <li>  <a href="<?php echo base_url();?>users/login" class="lms_buy"> <i class="fa fa-money"></i> Buy Now</a></li></ul>
                      <?php }?>
                      
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
      </div>
    </div>
  </div>
</div>
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
