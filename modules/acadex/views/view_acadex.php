<?php $this->load->view('top_application'); ?>

<div class="breadcrumb-area">
  <div class="breadcrumb-top bg-img breadcrumb-overly-3 pt-100 pb-95" style="background-image:url(<?php echo theme_url();?>lms_searchbg.jpg);">
    <div class="container">
        <div class="row">
          <div class="col-md-3"></div>
       <div class="container" align="center">
		<div class="text-center" align="center">
		<button class="btn btn-default" onclick="window.location.href='<?php //echo base_url(); ?>liveclasses'">Register as Trainee</button>
        <button class="btn btn-default" onclick="window.location.href='<?php //echo base_url(); ?>searchliveclasses'">Register as Speaker</button>
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
      <div class="col-xl-12 col-lg-12 lms_right">
        <div class="blog-all-wrap mr-40">
          <div class="row">
            <div class="container">
              <h3 class="proTitle" style="text-align:center;">Featured</h3><br>
            </div>
            <form method="post">
              <div class="container" id="postList">
                <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <p style="font-size:22px; color:#28407A;" align="center">
                <?php 
                // INSERT Featured post here
                $dbe = $this->load->database('default', TRUE);
                $sqs = "SELECT * FROM `wl_acadex` WHERE `featured`='1' AND `status`='1'";
                $qus=$dbe->query($sqs);
                $values= $qus->result_array();
                echo $values[0]['name'];
                echo $values[0]['iframe-url'];
                ?>
                </p>
                </div>
              </div>
            </form>
            <br><br>
                <ul class="nav nav-pills center-pills" id="myTab" role="tablist">
  <li class="nav-item">
    <a style="font-size:17px;" class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Upcoming</a>
  </li>
  <li class="nav-item">
    <a style="font-size:17px;" class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Past</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <div class="container">
  <div class="row">
                <?php
                // LOOP through other posts
                $sqs1 = "SELECT * FROM `wl_acadex` WHERE `featured`='0' AND `status`='1' AND upcoming='1' ORDER BY `time`";
                $qus1=$dbe->query($sqs1);
                //$query->result_array() as $val
                foreach($qus1->result_array() as $val)
                {
                  echo "<div class='col-xl-4 col-lg-4 col-md-6 col-sm-12'>";
                  echo "<p style='font-size:15px; color:#28407A;'>".$val['name']."</p>";
                  echo $val['iframe-url'];
                  echo "</div>";
                }
                ?>
                </div>
                </div>
  
  
  
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  
  <div class="container">
  <div class="row">
                <?php
                // LOOP through other posts
                $sqs1 = "SELECT * FROM `wl_acadex` WHERE `featured`='0' AND `status`='1' AND upcoming='0' ORDER BY `time`";
                $qus1=$dbe->query($sqs1);
                //$query->result_array() as $val
                foreach($qus1->result_array() as $val)
                {
                  echo "<div class='col-xl-4 col-lg-4 col-md-6 col-sm-12'>";
                  echo "<p style='font-size:15px; color:#28407A;'>".$val['name']."</p>";
                  echo $val['iframe-url'];
                  echo "</div>";
                }
                ?>
                </div>
                </div>
  
  
  </div>
</div>
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
        url: '<?php echo base_url(); ?>acadex/ajaxPaginationData/'+page_num,
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
<style>
.featuredPost {
  position: relative;
  width: 100%;
  overflow: hidden;
  padding-top: 56.25%; /* 16:9 Aspect Ratio */
}

.responsive-iframe {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 100%;
  border: none;
}
[style*="--aspect-ratio"] > :first-child {
  width: 100%;
}
[style*="--aspect-ratio"] > img {  
  height: auto;
} 
@supports (--custom:property) {
  [style*="--aspect-ratio"] {
    position: relative;
  }
  [style*="--aspect-ratio"]::before {
    content: "";
    display: block;
    padding-bottom: calc(100% / (var(--aspect-ratio)));
  }  
  [style*="--aspect-ratio"] > :first-child {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
  }  
}
.center-pills {
    display: flex;
    justify-content: center;
}
</style>
