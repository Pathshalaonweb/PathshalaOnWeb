<?php $this->load->view("top_application");?>
<div class="event-area my-acc pt-20 pb-130">
  <div class="container">
    <div class="row">
      <?php $this->load->view("teacher_myaccount_left");?>
      <div class="col-xl-9 col-lg-4">
        <div class="blog-all-wrap mr-40">
          <div class="col-lg-9 col-md-12 ml-auto mr-auto">
            <div class="login-register-wrapper">
            <?php $mem_info=get_db_single_row('wl_teacher',$fields="first_name,is_verified,profile_edit,plan_expire,email_verify",$condition="WHERE 1 AND teacher_id='".$this->session->userdata('teacher_id')."'");
			if($mem_info['email_verify']=='0'){
			?>
         <div class="alert alert-danger">
  				Your <strong>Email Id </strong> is not verified .
			</div>
            <?php }?>
              <div class="login-register-tab-list nav"> <a class="active" data-toggle="tab" href="#lg1">
                <h4> Add Live Class </h4>
                </a> </div>
              <div class="tab-content">
                <div id="lg1" class="tab-pane active">
                  <div class="login-form-container">
                    <div class="login-register-form">
                  	<?php echo validation_message();?>
					<?php echo error_message(); 
					//print_r($res);
					?>
      				<?php echo form_open_multipart(current_url_query_string());?>    
                		
                         <select name="category" onChange="getSubcat(this.value);" id="category">
                        <option value="">Select category</option>
                        	<?php 
							$sql="SELECT * FROM `wl_categories`  where status='1' AND parent_id='0' ORDER BY sort_order";
							$query=$this->db->query($sql);
							foreach($query->result_array() as $val):
							?>
                            <option value="<?php echo $val['category_id']?>" <?php echo set_select('category',$val['category_id'], ( !empty($category) && $category == $val['category_id'] ? TRUE : FALSE )); ?> <?php if($res['category']===$val['category_id']){echo"selected";}?>><?php echo $val['category_name']?></option>
                            <?php endforeach;?>
                        </select>
                        <select name="class" id="sub-list" onChange="getSubcatNext(this.value);">
                        <option value="<?php echo $res['category']?>"><?php echo get_cat_name($res['category']);?></option>
                        	<option value="">Select Category first</option>
                        </select>
                        
                        <select name="subject" id="next-list">
                        <option value="<?php echo $res['category']?>"><?php echo get_cat_name($res['category']);?></option>
                        	<option value="">Select Subject</option>
                        </select>
                        
                        <select name="state_id" id="state">
                        	<?php 
							$sql="SELECT * FROM `tbl_states`  where country_id='101'  ORDER BY name";
							$query=$this->db->query($sql);
							foreach($query->result_array() as $val):
							?>
                            <option value="<?php echo $val['id']?>" <?php echo set_select('state_id',
							$val['id'], ( !empty($state) && $state == $val['id'] ? TRUE : FALSE )); ?><?php if($res['state_id']===$val['id']){echo"selected";}?>><?php echo $val['name']?></option>
                            <?php endforeach;?>
                        </select>
                        <select name="bath_time">
                        	<option value="<?php echo $res['bath_time'];?>"><?php echo $res['bath_time'];?></option>
                            <option value="">Select Batch Time</option>
                            <option value="Any Time">Any Time</option>
                            <option value="morning">morning</option>
                            <option value="afternoon">afternoon</option>
                            <option value="evening">evening</option>
                            <option value="night">night</option>
                        </select>
                        <select id="city" name="city">
                        	<option value="<?php echo $res['city_id']?>"><?php echo get_city($res['city_id']);?></option>
    						<option value="">Select state first</option>
						</select>
                        <input type="text" name="location" value="<?php echo set_value('location',$res['location']);?>" placeholder="Specific location">
                                  <input type="text" name="fee" value="<?php echo set_value('fee',$res['fee']);?>" placeholder="fee per hour">
             
                	<div class="button-box">
                      <button class="default-btn" type="submit"><span>Update</span></button>
                    </div>
                <?php echo form_close();?>
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
<?php $this->load->view("bottom_application");?>
<style>.button-box {
    text-align: center;
}</style>
<div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src='<?php echo base_url();?>assets/demo_wait.gif' width="64" height="64" /><br>Loading..</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#state').on('change',function(){
        var stateID = $(this).val();
		$("#wait").css("display", "block");
        if(stateID){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>teacherdashboard/listclass/selectstate',
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
