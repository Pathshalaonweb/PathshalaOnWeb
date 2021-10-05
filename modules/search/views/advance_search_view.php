<div class="sidebar-style">
  <?php echo form_open('search',array("style"=>"width: 62%;margin: 0 auto;",'method'=>'get')); ?>
  <form>
    <div class="sidebar-search mb-40">
      <div class="sidebar-title mb-40">
        <h4>Select Category</h4>
        <select id="category" name="category" onChange="searchFilter()" class="form-control">
          <option value="">Select Category</option><br>
          <?php 
							$sql="SELECT * FROM `wl_categories`  where status='1' AND parent_id='0' ORDER BY sort_order";
              $query=$this->db->query($sql);
							foreach($query->result_array() as $val):
							?>
      <option value="<?php echo $val['category_id']?>"><?php echo $val['category_name']?></option>
          <?php endforeach;?>
        </select>
      </div>
    </div>
<!-------------CLASS--------------->

    <div class="sidebar-search mb-40">
      <div class="sidebar-title mb-40">
        <br><h4>Select Class</h4>
        <select id="classes" name="classes" onChange="searchFilter()" class="form-control">
          <option value="">Select Class</option>
        </select>
      </div>
</div>

<!-------------CLASS--------------->
<!-------------SUBJECT--------------->
    <div class="sidebar-search mb-40">
      <div class="sidebar-title mb-40">
        <br><h4>Select Subject</h4>
        <select id="subject" name="subject" onChange="searchFilter()" class="form-control">
          <option value="">Select Subject</option>
        </select>
      </div>
</div>
<!-------------SUBJECT--------------->
    <div class="sidebar-search mb-40">
      <div class="sidebar-title mb-40">
        <br><h4>Select State</h4>
        <select id="state" name="state" onChange="searchFilter()" class="form-control">
          <option value="">Select State</option><br>
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
    </div>

    <div class="sidebar-search mb-40">
      <div class="sidebar-title mb-40">
        <br><h4>Select City</h4>
        <select id="city" name="city" onChange="searchFilter()" class="form-control">
          <option value="">Select state first</option>
        </select>
      </div>
    </div>

    <div class="sidebar-search mb-40">
      <div class="sidebar-title mb-40">
        <br><h4>Search Pincode</h4><br>
      </div>
      <input type="text" placeholder="Search Pincode" id="pincode">
    </div>

    <div class="sidebar-search mb-40">
      <div class="sidebar-title mb-40">
        <br><h4>Price Range</h4>
        <input type="hidden" class="price1" value="0" >
        <input type="hidden" class="price2" value="30000"  >
        <p id="priceshow"></p>
        <div id="slider-range"></div>
      </div>
    </div>

    <div class="sidebar-search mb-40">
      <div class="sidebar-title mb-40">
        <br><h4>Select Time</h4>
        <select name="bath_time" id="bath_time"  onchange="searchFilter()" class="form-control">
          <option value="">Select Time</option>
          <option value="Any Time">Any Time</option>
          <option value="morning">Morning</option>
          <option value="afternoon">Afternoon</option>
          <option value="evening">Evening</option>
          <option value="night">Night</option>
        </select>
      </div>
    </div>
	
	<?php echo form_close();?>
  </div>

           

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
