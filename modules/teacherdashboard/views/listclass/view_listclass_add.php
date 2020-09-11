<?php $this->load->view('top_application'); ?>
<?php $ref=$this->input->get_post('ref');?>
<div class="event-area my-acc pt-20 pb-130">
  <div class="container">
    <div class="row">
	  <?php $this->load->view("teacher_myaccount_left");?>
	   <div class="col-xl-9 col-lg-4">
        <div class="blog-all-wrap mr-40">
      <div class="col-lg-7 col-md-12 ml-auto mr-auto">
	    <div class="login-register-wrapper">
          <div class="login-register-tab-list nav"> <a class="active" data-toggle="tab" href="#lg1">
            <h4> Add Live Class</h4>
            </a> 
		</div>
		
  <div class="tab-content">
                <div id="lg1" class="tab-pane active">
                  <div class="login-form-container">
                    <div class="login-register-form">

					<form action="<?php echo base_url(); ?>teacherdashboard/listclass/addlistclass" enctype="multipart/form-data" method="post" onsubmit="return validate()" accept-charset="utf-8">
 <!-- <form action="/action_page.php"> -->
 
  Class Title: <input type="text" id="class_title" name="class_title" value="">
  <br>
  <!-- <input type="text" id="class_name" name="class_title" style="background-color:#e6e6e6;" disabled> -->
  <p class="required" id="classTitleError" style="display: none;">Class Title is required</p>
  <br>
  
	<div class='time'> Class Schedule Time:  <br>
		<?php 
		$start = strtotime('12:00 AM');
		$end   = strtotime('11:59 PM');
		?>
		<select name="class_schedule_time" id="class_schedule_time" >
		<option value = "" selected disabled>Please Select a Time</option>
		<?php for($i = $start;$i<=$end;$i+=900){ ?>  
		<option value='<?php echo date('G:i', $i); ?>'><?php echo date('G:i', $i); ?></option>;
		<?php } ?>
		</select>
	</div>
	<p class="required" id="classScheduleTimeError" style="display: none;">Class Schedule Time is required</p>
	<br>


	<div class='time' > Class Duration(Mins):   
		<select style="width:190px;" name="class_duration" id="class_duration" required>
		<option value="" selected disabled>Select Class Duration</option>
		<option value="30">30 Mins</option>
		<option value="45">45 Mins</option>
		<option value="60">60 Mins</option>
		<option value="90">90 Mins</option>
		</select>
	</div>		
	<br>
 
 Category :

<div class="row">
   </a> </div>                		
	<select name="category" onChange="getSubcat(this.value);" id="category" required>
	<option value="" selected disabled>Select category</option>
		<?php 
		$sql="SELECT * FROM `wl_categories` where status='1' AND parent_id='0' ORDER BY sort_order";
		$query=$this->db->query($sql);
		foreach($query->result_array() as $val):
		?>
		<option value="<?php echo $val['category_id']?>" <?php echo set_select('category',$val['category_id'], ( !empty($category) && $category == $val['category_id'] ? TRUE : FALSE )); ?>><?php echo $val['category_name']?></option>
		<?php endforeach;?>
	</select>
	
	<select name="class" id="sub-list" onChange="getSubcatNext(this.value);">
		<option value="">Select Category first</option>
	</select>
	<p class="required" id="sub-list-error" style="display: none;">Please Select a sub category.</p>   
<br>

<p> Class Date : <input type="date" id="class_date" min="<?php echo date("Y-m-d") ?>" name="class_date" style="width: 160px"; required> 
<br>
<br>

<div class='time' > Select Your Per Class Fees (1 Credit = Rs75):
		<select style="width:250px;" name="class_credit_amount" id="class_credit_amount" required>
			<option value="" selected disabled>Select Class Credit Amount</option>
			<option value="0">0 Credit - For Demo Class</option>
			<option value="1">1 Credit</option>
			<option value="2">2 Credit</option>
			<option value="3">3 Credit</option>
			<option value="4">4 Credit</option>
			<option value="5">5 Credit</option>
			<option value="6">6 Credit</option>	
			<option value="7">7 Credit</option>
			<option value="8">8 Credit</option>
			<option value="9">9 Credit</option>
			<option value="10">10 Credit</option>
		</select>
	</div>		
	
	<br>
	
  
  
  <div class="button-box">
                    <div class="login-toggle-btn">
					              
                  
				   <button class="default-btn" type="submit"><span>Submit</span></button> 
                                        
                  </div>
                  <?php echo form_close();?>
  
  <!-- </form>  -->
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
</div>
<?php $this->load->view('bottom_application'); ?>
<html>    

<script>
function getSubcat(val) {
	$("#wait").css("display", "block");
	$.ajax({
	type: "POST",
	url: "<?php echo base_url();?>teacherdashboard/listclass/getSubcat",
	data:'category_id='+val,
	success: function(data){
		$("#sub-list").html(data);
		$("#wait").css("display", "none");
		//getSubcatNext();
	}
	});
}
function getSubcatNext(val) {
	$("#wait").css("display", "block");
	$.ajax({
	type: "POST",
	url: "<?php echo base_url();?>teacherdashboard/listclass/getSubcatNext",
	data:'category_id_next='+val,
	success: function(data){
		$("#next-list").html(data);
		$("#wait").css("display", "none");
	}
	});
}
</script>
<script>
$(document).ready(function(){
  $("#class_title").change(function(){
  var valuef = $("#class_title").val();
  valuef.trim();
  var abc = valuef.trim().replaceAll(' ', '-');
  //console.log(abc);
    $("#class_title").val(abc);
  });
});
</script>
<script>
function validate()
{
	var classtitle = document.querySelector('#class_title').value;
	if(classtitle.trim() == "")
	{
		document.querySelector("#classTitleError").style.display = "block";
		return false;
	}
	var classscheduletime = document.querySelector('#class_schedule_time').value;
	//alert(classscheduletime);
	if(classscheduletime.trim() == "")
	{
		//alert('works');
		document.querySelector("#classScheduleTimeError").style.display = "block";
		return false;
	}
	var x = document.getElementById("sub-list").value;
    if(x=='' || x=='377' || x=='373' || x=="374" || x=='375' || x== '530' || x== '432' || x== '376' || x== '526')
    {
      //alert('Select class ');
      document.getElementById("sub-list-error").style.display = "block";
      
      return false;
    }
	//return false;

}
</script>

</html>