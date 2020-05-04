<?php $this->load->view('top_application'); ?>

<div class="login-register-area pt-130 pb-130">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 col-md-12 ml-auto mr-auto">
        <div class="login-register-wrapper">
          <div class="login-register-tab-list nav"> <a class="active" data-toggle="tab" href="#lg2">
            <h4> Register as Student</h4>
            </a> </div>
          <div class="tab-content">
            <div id="lg2" class="tab-pane active">
              <div class="login-form-container">
                <div class="login-register-form">
                  <?php echo validation_message();?> <?php echo error_message(); ?>
      				<?php echo form_open('users/register'); ?>
                    <input type="text" name="first_name" placeholder="Name" value="<?php echo set_value('first_name'); ?>">
                    <input type="text" name="phone_number" placeholder="Phone" value="<?php echo set_value('phone_number'); ?>">
                    <input type="email" name="user_name" placeholder="Email" value="<?php echo set_value('user_name');?>">
                    <div class="file">
                      <label for="files">Upload photo</label>
                      <input type="file" id="files" class="" name="userimage"/>
                    </div>
                    <textarea placeholder="Address" name="address"><?php echo set_value('address');?></textarea>
                    <input type="text" name="pincode" placeholder="pincode" value="<?php echo set_value('pincode');?>">
                    <textarea placeholder="Description" name="description"></textarea> <?php echo set_value('description');?></textarea>
                    <select name="class" name="class">
                      <optgroup>
                      <option>Select Class</option>
                      <option>Class 6</option>
                      <option>Class 7</option>
                      </optgroup>
                    </select>
                    <select name="subject"  name="subject">
                      <optgroup>
                      <option>Select Subject</option>
                      <option>Maths</option>
                      <option>Science</option>
                      </optgroup>
                    </select>
                    <input type="password" name="password" placeholder="Password">
                    <div class="button-box">
                      <button class="default-btn" type="submit"><span>Register</span></button>
                    </div>
                  </form>
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
