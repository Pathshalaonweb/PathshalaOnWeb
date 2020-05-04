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
  				<strong>Warning!</strong> Your Email Id is not verified .
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
                      <input type="file" id="files" class="" name="userimage" accept=".jpeg,.png,.jpg"/>
                    </div>
                      <div class="file">
                      <label for="files">Higher education certificate</label>
                      <input type="file" id="files" class="" name="certificate" accept=".pdf,.doc,.jpg"/>
                    </div>
                    <p class="title">Upload Sample Work as JPG</p>
                    <div class="file">
                      <label for="files">Upload Gallery Image</label>
                      <input type="file" id="files" class="" name="image1" accept=".jpeg,.png,.jpg"/>
                    </div>
                    <div class="file">
                      <label for="files">Upload Gallery Image</label>
                      <input type="file" id="files" class="" name="image2" accept=".jpeg,.png,.jpg">
                    </div>
                    <div class="file">
                      <label for="files">Upload Gallery Image</label>
                      <input type="file" id="files" class="" name="image3" accept=".jpeg,.png,.jpg">
                    </div>
                    <div class="file">
                      <label for="files">Upload Gallery Image</label>
                      <input type="file" id="files" class="" name="image4" accept=".jpeg,.png,.jpg">
                    </div>
                    <p class="title">Upload Sample Work as PDF</p>
                     <div class="file">
                      <label for="files">Upload PDF</label>
                      <input type="file" id="files" class="" name="pdf" accept=".pdf"/>
                    </div>
                     <div class="file">
                      <label for="files">Upload PDF</label>
                      <input type="file" id="files" class="" name="pdf1" accept=".pdf"/>
                    </div>
                      <div class="file">
                      <label for="files">Upload PDF</label>
                      <input type="file" id="files" class="" name="pdf2" accept=".pdf"/>
                    </div>
                    <select name="experience_month">
                    	<option value="">Select Experience Months</option>
                        <?php for($i=01;$i<=20;$i++){?>
                        <option value="<?php echo $i;?>" <?php echo set_select('experience_month',
							$i, ( !empty($Em) && $Em == $i? TRUE : FALSE )); ?><?php if($mres['experience_month']==$i){echo"selected";}?>><?php echo $i;?> Month</option>
                        <?php }?>
                    </select>
                    <select name="experience_year">
                    	<option value="">Select Experience Years</option>
                        <?php for($i=01;$i<=20;$i++){?>
                        <option value="<?php echo $i;?>" <?php echo set_select('experience_year',
							$i, ( !empty($Ey) && $Ey == $i? TRUE : FALSE )); ?><?php if($mres['experience_year']==$i){echo"selected";}?>><?php echo $i;?> Year</option>
                        <?php }?>
                    </select>
                    <textarea placeholder="Address" name="address"><?php echo set_value('address',$mres['address']);?></textarea>
                    <input type="text" name="pincode" placeholder="pincode" value="<?php echo set_value('pincode',$mres['pincode']);?>">
                    <textarea placeholder="Description" name="description"> <?php echo set_value('description',$mres['description']);?></textarea>
                    
                  <input type="text" name="youtube" placeholder="youtube Link(?v=abc)" value="<?php echo set_value('youtube',$mres['youtube']); ?>">
                  <p>Please use video code only (https://www.youtube.com/watch?v=<u><strong style="color:red;">z-ZEHL4Df-A</strong></u>)</p>
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
