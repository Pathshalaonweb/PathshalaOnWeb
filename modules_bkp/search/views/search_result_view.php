<?php $this->load->view("top_application");?>

<div class="breadcrumb-area">
<div class="breadcrumb-top bg-img breadcrumb-overly-3 pt-100 pb-95" style="background-image:url(<?php echo theme_url();?>img/search-tutor/search-banner.jpg);">
<div class="container">
<?php echo form_open('search',array("style"=>"width: 62%;margin: 0 auto;",'method'=>'get')); ?>
<form >
<div class="row">
  <div class="col-md-3">
    <select id="state" name="state" onChange="searchFilter()">
      <option value="">Select State</option>
      <?php 
	  $sql="SELECT * FROM `tbl_states`  where country_id='101'  ORDER BY name";
	  $query=$this->db->query($sql);
	  foreach($query->result_array() as $val):
	 ?>
      <option value="<?php echo $val['id']?>" <?php echo set_select('state_id',
							$val['id'], ( !empty($state) && $state == $val['id'] ? TRUE : FALSE )); ?>><?php echo $val['name']?></option>
      <?php endforeach;?>
    </select>
  </div>
  <div class="col-md-3">
    <select id="city" name="city" onChange="searchFilter()">
      <option value="">Select state first</option>
    </select>
  </div>
  <div class="col-md-3">
    <select id="classes" name="classes" onChange="searchFilter()">
      <option value="">Select Class</option>
      <?php 
							$sql="SELECT * FROM `wl_classes`  where status='1' ORDER BY sort_order";
							$query=$this->db->query($sql);
							foreach($query->result_array() as $val):
							?>
      <option value="<?php echo $val['classes_id']?>" <?php echo set_select('class',
							$val['classes_id'], ( !empty($classes) && $classes == $val['classes_id'] ? TRUE : FALSE )); ?>><?php echo $val['name']?></option>
      <?php endforeach;?>
    </select>
  </div>
  <div class="col-md-3">
    <select id="subject" name="subject" onChange="searchFilter()">
      <option value="">Select Subject</option>
      <?php   $sql="SELECT * FROM `wl_subjects`  where status='1' ORDER BY sort_order";
							$query=$this->db->query($sql);
							foreach($query->result_array() as $val):
							?>
      <option value="<?php echo $val['subjects_id']?>" <?php echo set_select('subject',$val['subjects_id'], ( !empty($subj) && $subj == $val['subjects_id'] ? TRUE : FALSE )); ?>><?php echo $val['subjects']?></option>
      <?php endforeach;?>
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
    <h3>Tution near You</h3><div class="loading" style="display: none;">
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
        <div class="add-image"> <a href="#">
          <p>
            <?php //echo $val['teacher_id']?>
          </p>
          <img class="thumbnail no-margin" src="<?php echo get_image('userfiles',$val['picture'],190,190,'AR');?>" alt="img" class="img-responsive img-rounded"></a> </div>
      </div>
      <!--/.photobox-->
      <div class="col-md-6 add-desc-box">
        <div class="ads-details">
          <h5 class="add-title"><a href="#"> <?php echo $val['first_name'];?></a></h5>
          <span class="info-row"><i class="fa fa-map-marker"></i> <span class="item-location"><?php echo $val['location']?></span> </span>
          <div class="prop-info-box">
            <div class="prop-info">
              <div class="clearfix prop-info-block"> <span class="title title-tutor">Class:</span> <span class="text"><?php echo get_classes($val['class'])?></span> </div>
              <div class="clearfix prop-info-block middle"> <span class="title prop-area title-tutor">Class Time:</span> <span class="text">Morning</span> </div>
              <div class="clearfix prop-info-block"> <span class="title prop-room title-tutor">Experience:</span> <span class="text">2 yrs </span> </div>
              <div class="clearfix prop-info-block"> <span class="title prop-room title-tutor">Subject:</span> <span class="text"><?php echo get_subject($val['subject']);?></span> </div>
              <div class="clearfix prop-info-block"> <span class="title prop-room title-tutor">Fee:</span> <span class="text"><?php echo $val['fee'];?></span> </div>
              <p><?php echo $val['description'];?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 text-right  price-box">
        <?php /*?> <!--/.add-desc-box-->
     <a class="btn btn-border-thin  btn-save"   title="save ads"  data-toggle="tooltip" data-placement="left"> <i class="icon icon-heart"></i> </a> <a class="btn btn-border-thin  btn-share "> <i class="icon icon-export" data-toggle="tooltip" data-placement="left"  title="share"></i> </a> <?php */?>
        
        <!-- <h3 class="item-price "> <strong>$2400 - $4260 </strong></h3> -->
        <div style="clear: both"></div>
        <a class="btn btn-success btn-sm bold" href="#" data-toggle="modal" data-target="#myModalmessage"> Message </a></div>
      <!--/.add-desc-box--> 
    </div>
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
<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel ="stylesheet">
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> 
<script>
function searchFilter(page_num) {
    page_num = page_num?page_num:0;
	var state = $('#state').val();
	var city  = $('#city').val();
	var classes  = $('#classes').val();
	var subject  = $('#subject').val();
	var keyword  = $('#keyword').val();
	var pincode  = $('#pincode').val();
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>search/ajaxPaginationData/'+page_num,
        data:{page_num:page_num,state:state,city:city,classes:classes,subject:subject,keyword:keyword,pincode:pincode},
        beforeSend: function () {
            $('.loading').show();
        },
        success: function (html) {
            $('#postList').html(html);
            $('.loading').fadeOut("slow");
        }
    });
}
</script> 
<script>
	var brand;
	$(function(){
		$('.item_filter').click(function(){
			$('.product-data').html('<div id="loaderpro" style="" ></div>');
			  brand  = multiple_values('brand');
			 // alert(brand);
			  var page_num = 0;
			  var keywords = $('#keywords').val();
   			  var sortBy = $('#sortBy').val();
			  $.ajax({
				
				
				url:"<?php echo base_url(); ?>search/ajaxPaginationData/"+page_num,
				type:'post',
				data:{brand:brand,keywords:keywords,sortBy:sortBy,sprice:$(".price1" ).val(),eprice:$( ".price2" ).val()},
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
			//brand  = multiple_values('brand');
			// size   = multiple_values('size');
			
			var page_num = 0;
			 
            $.ajax({
				url:"<?php echo base_url(); ?>search/ajaxPaginationData/"+page_num,
				type:'post',
				data:{sprice:ui.values[ 0 ],eprice:ui.values[ 1 ]},
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
		//searchFilter();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>search/selectstate',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
           // $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>'); 
        }
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
    background-color: #ee4e4e;
    text-decoration: none;
    color: #fff;
}
div.pagination a:hover, div.pagination a:active {
    padding: 0.5em 0.64em 0.43em 0.64em;
    margin: 2px;
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
</style>
