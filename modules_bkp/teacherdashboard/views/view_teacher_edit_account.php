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
                <h4> Edit Profile Information </h4>
                </a> </div>
              <div class="tab-content">
                <div id="lg1" class="tab-pane active">
                  <div class="login-form-container">
                    <div class="login-register-form">
                  	<?php echo validation_message();?>
					<?php echo error_message(); ?>
      				<?php echo form_open_multipart('teacherdashboard/edit_account'); ?>
                    <input type="text" name="first_name" placeholder="Name" value="<?php echo set_value('first_name',$mres['first_name']); ?>">
                    <input type="text" name="phone_number" placeholder="Phone" value="<?php echo set_value('phone_number',$mres['phone_number']); ?>">
                    <div class="file">
                      <label for="files">Upload photo</label>
                      <input type="file" id="files" class="" name="userimage"/>
                    </div>
                    <textarea placeholder="Address" name="address"><?php echo set_value('address',$mres['address']);?></textarea>
                    <input type="text" name="pincode" placeholder="pincode" value="<?php echo set_value('pincode',$mres['pincode']);?>">
                    <textarea placeholder="Description" name="description"> <?php echo set_value('description',$mres['description']);?></textarea>
                  <?php /*  <select name="class" name="class">
                    <option value="<?php echo $mres['class'];?>"><?php echo $mres['class'];?></option>
                      <optgroup>
                      <option>Select Class</option>
                      <option>Class 6</option>
                      <option>Class 7</option>
                      </optgroup>
                    </select>
                    <select name="subject"  name="subject">
                    <option value="<?php echo $mres['subject'];?>"><?php echo $mres['subject'];?></option>
                      <optgroup>
                      <option>Select Subject</option>
                      <option>Maths</option>
                      <option>Science</option>
                      </optgroup>
                    </select> */?>
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