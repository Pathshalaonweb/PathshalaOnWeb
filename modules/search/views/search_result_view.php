<?php $this->load->view("top_application");?>

<div class="breadcrumb-area">
<div class="breadcrumb-top bg-img breadcrumb-overly-3 pt-100 pb-95" style="background-image:url(<?php echo theme_url();?>img/search-tutor/search-banner.jpg);">
<div class="container">
<?php echo form_open('search',array("style"=>"width: 62%;margin: 0 auto;",'method'=>'get')); ?>
<form >
<div class="row">
  <div class="col-md-3">
    <select name="category" onChange="searchFilter()" id="category" class="form-control">
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
  <div class="col-md-3">
    <select id="classes" name="classes" onChange="searchFilter()" class="form-control">
      <option value="">Select Class</option>
    </select>
  </div>
  <div class="col-md-3">
    <select id="subject" name="subject" onChange="searchFilter()" class="form-control">
      <option value="">Select Subject</option>
    </select>
  </div>
</div>
<?php echo form_close();?>
</div>
</div>
<div class="breadcrumb-bottom">
  <div class="container">
    <ul>
      <li><a href="<?php echo base_url();?>">Home</a> <span><i class="fa fa-angle-double-right"></i>Search Tutor</span></li>
    </ul>
  </div>
</div>
</div>
<div class="event-area my-acc pt-20 pb-130">
<div class="container">
<div class="row">
<?php $this->load->view("advance_search_view");?>
<div class="col-xl-9 col-lg-4">
<div class="row">
  <div class="col-md-12 pt-15 pb-15">
    <p id="msg"></p>
    <h3>Tutors Near You</h3>
    <div class="loading" style="display: none;">
      <div class="content"> <img src="<?php echo base_url().'assets/developers/images/loader2.gif'; ?>"/></div>
    </div>
  </div>
</div>
<form method="post">
  <div  id="postList">
    <?php
if(is_array($res) && !empty($res)) {
	foreach($res as $val)
	{
?>
    <div class="row">
      <div class="col-md-3 no-padding photobox">
        <div class="add-image"> <a href="<?php echo base_url();?>teacher/profile/<?php echo $val['teacher_id'];?>/<?php echo url_title($val['first_name']);?>">
          <p>
            <?php //echo $val['teacher_id']?>
          </p>
          <img class="thumbnail no-margin" src="<?php echo get_image('teacher',$val['picture'],190,190,'AR');?>" alt="img" class="img-responsive img-rounded"></a> </div>
          <?php $rating = get_rating('',$val['teacher_id'])?>
          <div class="row rate" data-target="form-rate-instructor">
              <div class="col-md-6">
                <label>Rating : </label>
              </div>
              <div class="col-md-6">
              <?php for ($x = 1; $x <= 5; $x++) {?>
                <i class="fa fa-star<?php if($x > $rating){echo "-o";}?> text-info"></i>
              <?php }?>  
              </div>
              <input type="hidden" name="form-rate-instructor" value="<?php echo $rating;?>">
            </div>
      	   </div>
      
      <!--/.photobox-->
      <div class="col-md-6 add-desc-box">
        <div class="ads-details">
          <h5 class="add-title" style="font-size: 20px;font-weight: bold;"><a href="<?php echo base_url();?>teacher/profile/<?php echo $val['teacher_id'];?>/<?php echo url_title($val['first_name']);?>"> <?php echo $val['first_name'];?></a></h5>
          <span class="info-row"><i class="fa fa-map-marker"></i> <span class="item-location"><?php echo $val['location']?></span> </span>
          <div class="prop-info-box">
            <div class="prop-info">
              <div class="clearfix prop-info-block"> <span class="title title-tutor">Class:</span> <span class="text"><?php echo get_cat_name($val['class'])?></span> </div>
              <div class="clearfix prop-info-block middle"> <span class="title prop-area title-tutor">Class Time:</span> <span class="text"><?php echo $val['bath_time']?></span> </div>
              <div class="clearfix prop-info-block"> <span class="title prop-room title-tutor">Experience:</span> <span class="text">
                <?php if(!empty($val['experience_year'])){ echo $val['experience_year'];?>
                Years
                <?php }?>
                <?php if(!empty($val['experience_month'])){ echo $val['experience_month']?>
                Months
                <?php }?>
                </span> </div>
              <div class="clearfix prop-info-block"> <span class="title prop-room title-tutor">Subject:</span> <span class="text"><?php echo get_cat_name($val['subject']);?></span> </div>
              <div class="clearfix prop-info-block"> <span class="title prop-room title-tutor">Fee:</span> <span class="text"><?php echo $val['fee'];?></span> </div>
              <p><?php echo char_limiter(strip_tags($val['description']),150);?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 text-right  price-box"> 
        
        <!-- <h3 class="item-price "> <strong>$2400 - $4260 </strong></h3> -->
        <div style="clear: both"></div>
        <?php if($this->session->userdata('user_id') > 0 ){?>
        <a class="btn btn-success btn-sm bold notified" href="javascript:void(0)" onclick="return confirm('Are you sure to send notification to <?php echo $val['first_name'];?> ?')" data-href="<?php echo base_url();?>search/getContent/<?php echo $val['teacher_id']?>" data-teacher="<?php echo $val['teacher_id']?>"> Message </a>
        <?php }else{?>
        <a class="btn btn-success btn-sm bold" href="<?php echo base_url();?>users/login"> Show Interest </a>
        <?php }?>
      </div>
      <!--/.add-desc-box--> 
    </div>
    <hr>
    <?php } }?>
    <?php echo $this->ajax_pagination->create_links(); ?> </div>
</form>
<div class="loading" style="display: none;">
  <div class="content"> <img src="<?php echo base_url().'assets/developers/images/loader2.gif'; ?>"/></div>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">var Page=''; /*  | detail */</script>
<?php $this->load->view("bottom_application");?>
<div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src='<?php echo base_url();?>assets/demo_wait.gif' width="64" height="64" /><br>
  Loading..</div>
<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel ="stylesheet">
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> 
<script>
function searchFilter(page_num) {
    page_num = page_num?page_num:0;
	var state 	 = $('#state').val();
	var city  	 = $('#city').val();
	var classes  = $('#classes').val();
	var subject  = $('#subject').val();
	var keyword  = $('#keyword').val();
	var pincode  = $('#pincode').val();
	var bath_time =$('#bath_time').val();
	var category =$('#category').val();
	$("#wait").css("display", "block");
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>search/ajaxPaginationData/'+page_num,
        data:{page:page_num,state:state,city:city,classes:classes,subject:subject,keyword:keyword,pincode:pincode,sprice:$(".price1" ).val(),eprice:$( ".price2" ).val(),bath_time:bath_time,category:category},
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
<script>
	var batchtime;
	$(function(){
		$('.item_filter').click(function(){
			$('.product-data').html('<div id="loaderpro" style="" ></div>');
			  batchtime  = multiple_values('batchtime');
			 	page_num 	 = 0;
				var state 	 = $('#state').val();
				var city  	 = $('#city').val();
				var classes  = $('#classes').val();
				var subject  = $('#subject').val();
				var keyword  = $('#keyword').val();
				var pincode  = $('#pincode').val();
				var category =$('#category').val();
			  $.ajax({
				url:"<?php echo base_url(); ?>search/ajaxPaginationData/"+page_num,
				type:'post',
				data:{batchtime:batchtime,page_num:page_num,state:state,city:city,classes:classes,subject:subject,keyword:keyword,pincode:pincode,sprice:$(".price1" ).val(),eprice:$( ".price2" ).val(),category:category},
				beforeSend: function () {
            		$('.loading').show();
        		},
				success: function (html) {
					//alert(html);
					$('#postList').html(html);
					$('.loading').fadeOut("slow");
				}
			});
		});
		
	});
function multiple_values(inputclass){
		var val = new Array();
		$("."+inputclass+":checked").each(function() {
		    val.push($(this).val());
		});
		return val;
	}
	
	$(function() {
		$( "#slider-range" ).slider({
		  range: true,
		  min: 0,
		  max: 3000,
		  values: [ 000, 3000 ],
		  slide: function( event, ui ) {
			$( "#priceshow" ).html( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
			$( ".price1" ).val(ui.values[ 0 ]);
			$( ".price2" ).val(ui.values[ 1 ]);
			$('.product-data').html('<div id="loaderpro" style="" ></div>');
			
			// colour = multiple_values('colour');
			//batchtime  = multiple_values('batchtime');
			// size   = multiple_values('size');
			
			var page_num = 0;
			 	var state 	 = $('#state').val();
				var city  	 = $('#city').val();
				var classes  = $('#classes').val();
				var subject  = $('#subject').val();
				var keyword  = $('#keyword').val();
				var pincode  = $('#pincode').val();
				var bath_time =$('#bath_time').val();
				var category =$('#category').val();
            $.ajax({
				url:"<?php echo base_url(); ?>search/ajaxPaginationData/"+page_num,
				type:'post',
				data:{sprice:ui.values[ 0 ],eprice:ui.values[ 1 ],batchtime:batchtime,page_num:page_num,state:state,city:city,classes:classes,subject:subject,keyword:keyword,pincode:pincode,bath_time:bath_time,category:category},
				beforeSend: function () {
            		$('.loading').show();
        		},
				success: function (html) {
					//alert(html);
					$('#postList').html(html);
					$('.loading').fadeOut("slow");
				}
			});
		  }
		});
		$("#priceshow").html( "" + $( "#slider-range" ).slider( "values", 0 ) +
		 " - " + $( "#slider-range" ).slider( "values", 1 ) );
    });	
</script> 
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
<script>
	
    $(document).ready(function(){
	$("body").on("click", ".notified", function(event){	
    //$(".notified").click(function(e){
	//alert();
	$("#wait").css("display", "block");
	var state = $('#state').val();
	var city  = $('#city').val();
	var classes  = $('#classes').val();
	var subject  = $('#subject').val();
	var keyword  = $('#keyword').val();
	var pincode  = $('#pincode').val();
	var teacher  = $(this).attr('data-teacher');
	var category = $('#category').val();
    $.ajax({
		  		type: "POST",
				dataType: 'JSON',
                url: "<?php echo base_url();?>search/getContent",
                data: {state:state,city:city,classes:classes,subject:subject,keyword:keyword,pincode:pincode,teacher:teacher,category:category},
                success:function(result){
				if(result.sucuess=='1'){
          		$("#msg").html(result.msg);
				$("#wait").css("display", "none");
				}else{
					$("#msg").html(result.msg);
					$("#wait").css("display", "none");
				}
        }});
      });
    
	});
    </script>
<style>
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
