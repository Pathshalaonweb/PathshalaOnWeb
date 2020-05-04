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
  				<strong>Worning!</strong> Your EmailId is not verified .
			</div>
            <?php }?>
              <div class="login-register-tab-list nav"> <a class="active" data-toggle="tab" href="#lg1">
                <h4> Add Profile Information </h4>
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
                		<select name="subject">
                        	<?php 
							$sql="SELECT * FROM `wl_subjects`  where status='1' ORDER BY sort_order";
							$query=$this->db->query($sql);
							foreach($query->result_array() as $val):
							?>
                            <option value="<?php echo $val['subjects_id']?>" <?php echo set_select('subject',$val['subjects_id'], ( !empty($subj) && $subj == $val['subjects_id'] ? TRUE : FALSE )); ?> <?php if($res['subject']===$val['subjects_id']){echo"selected";}?>><?php echo $val['subjects']?></option>
                            <?php endforeach;?>
                        </select>
                        <select name="class">
                        	<?php 
							$sql="SELECT * FROM `wl_classes`  where status='1' ORDER BY sort_order";
							$query=$this->db->query($sql);
							foreach($query->result_array() as $val):
							?>
                            <option value="<?php echo $val['classes_id']?>" <?php echo set_select('class',
							$val['classes_id'], ( !empty($classes) && $classes == $val['classes_id'] ? TRUE : FALSE )); ?><?php if($res['class']===$val['classes_id']){echo"selected";}?>><?php echo $val['name']?></option>
                            <?php endforeach;?>
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
<script type="text/javascript">
$(document).ready(function(){
    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>teacherdashboard/profile/selectstate',
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
